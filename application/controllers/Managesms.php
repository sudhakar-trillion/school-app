<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Managesms extends CI_Controller 
{

	 public function __construct()
		{
			parent::__construct();
			date_default_timezone_set("Asia/Kolkata");
			define('HEADER','Admin/header');
			define('FOOTER','Admin/footer');
			
			$this->load->model('Commonmodel');
			
			if( $this->session->userdata('Admin')!='' &&  $this->session->userdata('Role')!='' && $this->uri->segment(1)=='') { redirect(base_url()); }
			else if( $this->uri->segment(1)!='') 
					{ 

						if($this->session->userdata('Admin')=='' ||  $this->session->userdata('Role')=='')
						{
							redirect(base_url() );
						}
					}

		if( $this->uri->segment(1)=='view-assign-teachers')
		{
			echo '<div style="height:1px; background-color:#1a2732"> </div>';
		}
		else
		{
			//echo $this->uri->segment(1);
			$this->session->set_userdata('ClassSlno','');
			$this->session->set_userdata('Section','');
			$this->session->set_userdata('TeacherId','');
		}
		
		if($this->uri->segment(1)=='view-assigned-subjects')
		{
			echo '<div style="height:1px; background-color:#1a2732"> </div>';
		}
		else
		{
			$this->session->set_userdata('selectedClassSlno','');
		}
		
		
		}
		
	public function pagenotfound()
	{
		$this->load->view(HEADER);
		$this->load->view('Admin/pagenotfound');
		$this->load->view(FOOTER);	
	}

	public function loadformrules($configItem)
	{
		return $this->config->item($configItem);
	}
	
	
		
	public function striptags($posted_data)
		{
			
		
			$requested_from =  $_SERVER['HTTP_REFERER'];
			
			
		if( strpos($requested_from, 'localhost') !== false || strpos($requested_from, '192.168.0.3') !== false || strpos($requested_from, 'trillionit.in') !== false || strpos($requested_from, 'adiakshara.in') !== false )
			//if( strpos($requested_from, 'trillionit.in') !== false)
			{
			//foreach($posted_data as $key=>$val) { $_POST[$key] = htmlentities( stripslashes(strip_tags($val)), ENT_QUOTES | ENT_HTML5, 'UTF-8'); }
			foreach($posted_data as $key=>$val) 
			{ 
			$str = stripslashes(str_replace("'","",$val));
			//The following to sanitize a string. It will both remove all HTML tags, and all characters with ASCII value > 127, from the string:
			$_POST[$key] = filter_var($str, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH); 
			
			}
			return $_POST;	
			}
			else
			echo "!!!! Access denied !!!!"; exit; 
		
		}
	
	public function absentsms()
	{
		$this->load->view(HEADER);
		$cond=array();
	$data['classes'] = $this->Commonmodel->getrows($table='newclass',$cond,$order_by='',$order_by_field='',$limit='');
		
		
		$this->load->view('Admin/absent-sms',$data);
		$this->load->view(FOOTER);
	}
	
	
	//feeduesms starts here
	
	public function feeduesms()
	{
		$this->load->view(HEADER);
		$cond=array();
	$data['classes'] = $this->Commonmodel->getrows($table='newclass',$cond,$order_by='',$order_by_field='',$limit='');
		
		
		$this->load->view('Admin/fee-due-sms',$data);
		$this->load->view(FOOTER);
		
	}
	
	
	//feeduesms ends here
	
	//activitysms starts here
	
	public function activitysms()
	{
		$this->load->view(HEADER);
		$cond=array();
	$data['classes'] = $this->Commonmodel->getrows($table='newclass',$cond,$order_by='',$order_by_field='',$limit='');
		
		
		$this->load->view('Admin/send-activity-sms',$data);
		$this->load->view(FOOTER);
	}
	
	//activitysms starts here
	
	
	//bulksms starts here
	
	public function bulksms()
	{
		$this->load->view(HEADER);
		//$cond=array();
	//	$data['classes'] = $this->Commonmodel->getrows($table='newclass',$cond,$order_by='',$order_by_field='',$limit='');
		$this->load->view('Admin/send-bulk-sms');
		$this->load->view(FOOTER);
	}
	
	//bulksms ends here
	
	//this methid will get the students of a class and section
	
	public function getstudents()
	{
		
		$posted_data = $_POST;
		$postdata = $this->striptags($posted_data);
		
		$cond = array();
		$table = 'students';
		
		$cond['ClassName'] = $postdata['ClassName'];
		$cond['ClassSection'] = $postdata['Section'];
		
		$fields='StudentId,Student,LastName';
		$order_by='';
		$order_by_field='';
		$limit='';
		
		$output_arr = array();
		
		
		$students = $this->Commonmodel->getRows_fields($table,$cond,$fields,$order_by,$order_by_field,$limit);
		
		if($students!='0')
		{
			$output_arr['Nodata'] = "No";
			
			foreach($students->result() as $std)
			{
				$output_arr['std_details'][] = array(
														"Student"=>$std->Student,
														"LastName"=>$std->LastName,
														"StudentId"=>$std->StudentId,
														);
			}
		}
		else
		{
			$output_arr['Nodata'] = "Yes";
		}
		
		echo json_encode($output_arr);
		
	}
	
	
	//this method is used to sent sms
	
	
	public function sentsms()
	{
		$postdata = $_POST;
		extract($postdata);
		
		$url = "http://onlinebulksmslogin.com/spanelv2/api.php"; 
		$from='AdiAks';
		
		
		if($SMSTYPE=="Activity")
		{
			$SelectedStudents = $this->Commonmodel->getRows_fields('students',array("ClassName"=>$ClassName,"ClassSection"=>$sections,"AcademicYear"=>$this->schedulinglib->getAcademicyear()),$fields='StudentId',$order_by='',$order_by_field='',$limit='');
			$selected_students=array();
			
			foreach($SelectedStudents->result() as $std)
			{
				$selected_students[]=  $std->StudentId;	
			}
		}
		elseif($SMSTYPE=="BulkSMS")
		{
			$SelectedStudents = $this->Commonmodel->getRows_fields('students',array("AcademicYear"=>$this->schedulinglib->getAcademicyear()),$fields='StudentId',$order_by='',$order_by_field='',$limit='');
			$selected_students=array();
			
			foreach($SelectedStudents->result() as $std)
			{
				$selected_students[]=  $std->StudentId;	
			}
		}
		else
		{
			$selected_students = $Students[0]['stds'];
		}

		$table = 'parentdetails';
		$totalstds = sizeof($selected_students);
		$smssent=0;	
	
		foreach( $selected_students as $stdid)
		{
			$cond = array();
			$cond['StudentId'] = $stdid;
			$cond['AcademicYear'] = $this->schedulinglib->getAcademicyear();
			
			$field="ContactNumber2";
			
			$contactNumber = $this->Commonmodel->getAfield($table,$cond,$field,$order_by='',$order_by_field='',$limit='');

			$cond = array();
			$cond['StudentId'] = $stdid;
			$cond['AcademicYear'] = $this->schedulinglib->getAcademicyear();
		
			$field='Student';

			$Student = $this->Commonmodel->getAfield('students',$cond,$field,$order_by='',$order_by_field='',$limit='');
			
			if($Student!='0' && $contactNumber!='0')
			{
				if( $SMSTYPE=="Absent")
					$message = " Dear Parent, your child ".$Student." is absent today, Thank you. Adi Akashara ";
				else if( $SMSTYPE=="Feedue" )
					$message = $duesmscontent;
				else if( $SMSTYPE=="Activity" )
					$message = $activitycontent;	
				else if($SMSTYPE=="BulkSMS")
					$message = $bulksmscontent;
			
				
				$request="username=adiakshara&password=preschool123&to=".$contactNumber."&from=$from&message=".urlencode($message);	
								
				$ch = curl_init($url);
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
				curl_setopt($ch, CURLOPT_POST, true);
				curl_setopt($ch, CURLOPT_POSTFIELDS, $request);
				
				$response=curl_exec($ch);
				if($response!='')
				{
					$smssent++;
				}
				curl_close($ch);
			}
		}//foreach ends here
				
		if( $smssent == $totalstds)
			echo "1";
		else
		{
			if( $smssent<$totalstds && $smssent>0)
				echo "-1";
			else if( $smssent==0)
				echo "0";
				
		}
					
				
			
		
		
	} 
	//sentsms ends here


	//	send sms to the principal about the attendance of theachers
	
	public function sendTeacherAttendanceSMS()
	{
		$url = "http://onlinebulksmslogin.com/spanelv2/api.php"; 
		$from='AdiAks';	
		$message='';
		
		$output=array();
		
		$AcademicYear = $this->schedulinglib->getAcademicyear();
		
		$this->db->select('count(TeacherId) as Presents');
		$this->db->from('teacherattendance');
		$this->db->where('Present','Y');
		$this->db->where('AttendanceFor',date('Y-m-d'));
		$this->db->where('AcademicYear',$AcademicYear);
		$qry = $this->db->get();
		
		
		if($qry->num_rows()>0)
		{
			foreach($qry->result() as $data)
			{
				if(  $data->Presents==null)
					$output['Presents'] = 0;
				else
					$output['Presents'] = $data->Presents;	
			}
		}
		else
			$output['Presents'] = 0;

		$this->db->select('count(TeacherId) as Absents');
		$this->db->from('teacherattendance');
		$this->db->where('Present','N');
		$this->db->where('AttendanceFor',date('Y-m-d'));
		$this->db->where('AcademicYear',$AcademicYear);
		$qry = $this->db->get();
		
		if($qry->num_rows()>0)
		{
			foreach($qry->result() as $data)
			{
				if($data->Absents==null)
					$output['Absents'] = 0;
				else
					$output['Absents'] = $data->Absents;	
			}
		}
		else
			$output['Absents'] = 0;
			
			$message.= "Teacher Attendance of ".date("d-m-Y")." ";
			$message.= "Total Teachers Present ".$output['Presents']." ";
			$message.= "Total Teachers Absent ".$output['Absents'];
		
		
		$contactNumber = "8499032661";
		
		$request="username=adiakshara&password=preschool123&to=".$contactNumber."&from=$from&message=".urlencode($message);	
		
		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $request);
		
		$response=curl_exec($ch);
		
		if( $response!='' )
		{	
			$table = 'TeacherAttendancePrincipal';
			$insertdata = array();
			
			$insertdata['AttendanceFor'] = date('Y-m-d');
			$insertdata['Academicyear'] = $AcademicYear;
			$insertdata['Lastupdated'] = time();
			
			if( $this->Commonmodel->insertdata($table,$insertdata))
				echo "1";
			else
				echo "-1";
			
			
		}
		else
			echo "0";
		
		curl_close($ch);
	}
	//	send sms to the principal about the attendance of theachers ends here
	
	
}//class ends here
