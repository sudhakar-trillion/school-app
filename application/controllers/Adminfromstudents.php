<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Adminfromstudents extends CI_Controller 
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

		if( $this->uri->segment(1)=='view-students')
		{
			echo '<div style="height:1px; background-color:#1a2732"> </div>';

		}
		else
		{
			//echo $this->uri->segment(1);
			$this->session->set_userdata('ClassName','');
			$this->session->set_userdata('Section','');
			
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

	public function addstudent()
	{
		$this->load->view(HEADER);
		$data['classes'] = $this->Commonmodel->getrows($table='newclass',$cond=array(),$order_by='',$order_by_field='',$limit='');
		$this->load->view('Admin/add-student',$data);
		$this->load->view(FOOTER);	
	}
	
	
	//viewstudents starts from here
		
		public function viewstudents()
		{
			$this->load->view(HEADER);
			$cond= array();
			
			if($this->input->post('students_filter'))
			{
				
				if( $this->input->post('ClassName')!='0' )
				{
					
					$cond['std.ClassName'] = 	trim($this->input->post('ClassName'));
					$this->session->set_userdata('ClassName',$this->input->post('ClassName'));
					$class_sections = $this->Commonmodel->getrows($table='sections',array('ClassSlno'=>$this->input->post('ClassName')),$order_by='ASC',$order_by_field='SectionId',$limit='');
				}
				else
				{
					$this->session->set_userdata('ClassName','');
					$class_sections='0';
				}
				
				if( $this->input->post('sections')!='0' )
				{
					$cond['std.ClassSection'] = 	trim($this->input->post('sections'));
					$this->session->set_userdata('Section',$this->input->post('sections'));
					
				//	$class_sections = $this->Commonmodel->getrows($table='sections',array('ClassSlno'=>$this->input->post('sections')),$order_by='ASC',$order_by_field='SectionId',$limit='');
				}
				else
				{
					$this->session->set_userdata('Section','');
					$class_sections='0';
				}
				
				
					
			}
			else
			{
				if( $this->session->userdata('ClassName')!='' )
				{
					//echo "jey";
					
					$cond['std.ClassName'] = 	trim( $this->session->userdata('ClassName'));
					$this->session->set_userdata('ClassName',$this->session->userdata('ClassName'));
					
					$class_sections = $this->Commonmodel->getrows($table='sections',array('ClassSlno'=>$this->session->userdata('ClassName')),$order_by='ASC',$order_by_field='SectionId',$limit='');
					
					
				}
				else
				{
					$this->session->set_userdata('ClassName','');
					$class_sections='0';
				}
				
				if($this->session->userdata('Section')!='')	
				{
					$cond['std.ClassSection'] = 	trim($this->session->userdata('Section'));
					$this->session->set_userdata('Section',trim($this->session->userdata('Section')) );
					//$class_sections = $this->Commonmodel->getrows($table='sections',array('ClassSlno'=>$this->input->post('sections')),$order_by='ASC',$order_by_field='SectionId',$limit='');
				}
				else
				{
					$this->session->set_userdata('Section','');
					$class_sections=0;
				}
			}
			
			
			/*
			echo "<pre>";
			print_r($class_sections); 
			echo "</pre>";
			*/
			
			$baseurl='view-students';
			$perpage=15;
			$order_by_field='SLNO';
			$datastring='totalstudetns';
			$pagination_string = 'pagination_string';
			$check_uri_segment='yes';
			
			$data = $this->tsmpaginate->studentsPaginateion($cond,$baseurl,$perpage,$order_by_field,$datastring,$pagination_string);
			
			//call the Teacher
			$data['perpage'] = $perpage;
		
			$data['classes'] = $this->Commonmodel->getrows($table='newclass',$cond=array(),$order_by='ASC',$order_by_field='SLNO',$limit='');
			$data['class_sections'] = $class_sections;
			
			$this->load->view('Admin/view-students',$data);
										
			$this->load->view(FOOTER);
		}
	
	//viewstudents ends here

	public function editstucent()
	{
		$this->load->view(HEADER);
			$data['classes'] = $this->Commonmodel->getrows($table='newclass',$cond=array(),$order_by='',$order_by_field='',$limit='');
			
			$cond['StudentId'] =  $this->uri->segment(2);
			$table='students';
			
			$ClassSlno = $this->Commonmodel->getAfield($table,$cond,$field='ClassName',$order_by='',$order_by_field='',$limit='');
			
			
			$sections = $this->Commonmodel->getrows($table='sections',array('ClassSlno'=>$ClassSlno),$order_by='ASC',$order_by_field='SectionId',$limit='');
			$cond['StudentId'] =  $this->uri->segment(2);
			$table='students';
			
			$data['sections'] = $sections;
			$data['student_details'] = $this->Commonmodel->get_single_row($table,$cond,$order_by='',$order_by_field='',$limit='');

			
			$this->load->view('Admin/edit-student',$data);
		$this->load->view(FOOTER);
	}

public function addattendance()
{
	$this->load->view(HEADER);
	
	//get the classes
	
	$data['classes'] = $this->Commonmodel->getrows($table='newclass',$cond=array(),$order_by='',$order_by_field='',$limit='');
	
	
	if( ( $this->uri->segment(2)!='' &&  $this->uri->segment(3)!='' ) && ( $this->uri->segment(2)>0 &&  $this->uri->segment(3)>0 ) )
	{
			$cls = $this->uri->segment(2);
			$sec = $this->uri->segment(3);
	}
	else
	{
		//get the class and section 
		
		$qry = $this->db->select('cls.SLNO as SLNO, sec.SectionId as SectionId')->from('newclass as cls')->join('sections as sec','sec.ClassSlno=cls.SLNO')->order_by('SLNO','ASC')->limit(1)->get();
		
		foreach($qry->result() as $initial)
		{
			$cls =$initial->SLNO;
			$sec =$initial->SectionId;
		}
		
	}
	
	$data['SelectedCls'] = $cls;
	
	$data['SelectedSec'] = $sec;
	
	//get the sections for the class
	$cond = array();
	$cond['ClassSlno']  = $cls;
	$data['sections'] = $this->Commonmodel->getrows($table='sections',$cond,$order_by='ASC',$order_by_field='SectionId',$limit='');
	
	
	//get the students who belongs to the selected class and section
	
	$cond = array();
	$table = 'students';
	
	$cond['ClassName'] = $cls;
	$cond['ClassSection'] = $sec;
	
	
	$fields = 'StudentId, Student, ProfileIPic, Roll';
	
	$data['studentDetails'] = $this->Commonmodel->getRows_fields($table,$cond,$fields,$order_by='',$order_by_field='',$limit);
	
	
	
	
	$this->load->view('Admin/addattendance',$data);
	
	$this->load->view(FOOTER);
	
}

public function viewattendance()
{

	$this->load->view(HEADER);
	
	//get the classes
	
	$data['classes'] = $this->Commonmodel->getrows($table='newclass',$cond=array(),$order_by='',$order_by_field='',$limit='');
	
	
	if( ( $this->uri->segment(2)!='' &&  $this->uri->segment(3)!='' ) && ( $this->uri->segment(2)>0 &&  $this->uri->segment(3)>0 ) )
	{
			$cls = $this->uri->segment(2);
			$sec = $this->uri->segment(3);
	}
	else
	{
		//get the class and section 
		
		$qry = $this->db->select('cls.SLNO as SLNO, sec.SectionId as SectionId')->from('newclass as cls')->join('sections as sec','sec.ClassSlno=cls.SLNO')->order_by('SLNO','ASC')->limit(1)->get();
		
		foreach($qry->result() as $initial)
		{
			$cls =$initial->SLNO;
			$sec =$initial->SectionId;
		}
		
	}
	
	$data['SelectedCls'] = $cls;
	
	$data['SelectedSec'] = $sec;
	
	//get the sections for the class
	$cond = array();
	$cond['ClassSlno']  = $cls;
	$data['sections'] = $this->Commonmodel->getrows($table='sections',$cond,$order_by='ASC',$order_by_field='SectionId',$limit='');
	
	
	//get the students who belongs to the selected class and section
	
	$cond = array();
	$table = 'students';
	
	$cond['ClassName'] = $cls;
	$cond['ClassSection'] = $sec;
	
	
	$fields = 'StudentId, Student, ProfileIPic, Roll';
	
	$data['studentDetails'] = $this->Commonmodel->getRows_fields($table,$cond,$fields,$order_by='',$order_by_field='',$limit);
	
	
	//get the list of absentees
	
	
	$cond = array();
	$table = 'studentattendance';
	
	$cond['ClassId'] = $cls;
	$cond['SectionId'] = $sec;
	$cond['AttendanceOn'] = date('Y-m-d');
	
	
	$fields = 'StudentId, PresentAbsent';
	
	$data['AbsenteeDetails']= $this->Commonmodel->getRows_fields($table,$cond,$fields,$order_by='',$order_by_field='',$limit);
#echo $this->db->last_query(); exit; 
	
	
	$this->load->view('Admin/view-edit-attendance',$data);
	
	$this->load->view(FOOTER);
	
	
}

}//class ends here
