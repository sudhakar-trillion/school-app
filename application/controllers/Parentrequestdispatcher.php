<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Parentrequestdispatcher extends CI_Controller 
{

	 public function __construct()
		{
			
//			echo $root_dir; 
			parent::__construct();
			date_default_timezone_set("Asia/Kolkata");
			
			$this->load->model('Commonmodel');
			
		}//constructor stARTS HERE
		
	

	public function striptags($posted_data)
		{
			
		
			$requested_from =  $_SERVER['HTTP_REFERER'];
			
			
		if( strpos($requested_from, 'localhost') !== false || strpos($requested_from, 'http://192.168.0.5') !== false || strpos($requested_from, 'trillionit.in') !== false || strpos($requested_from, 'adiakshara.in') !== false)
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

	public function parentloginvalidation()
	{
		$postdata = $this->striptags($_POST);
		extract($postdata);
		
		$cond = array();
		$table = 'students';
		
		$cond['ClassName']  = $ClassSlno;
		$cond['ClassSection']  = $section;
		$cond['Roll']  = $RollNo;
		//$cond['ParentPassword']  = md5($Password);
		
		if( $this->Commonmodel->checkexists($table,$cond))
		{
			//get the studnetId using the above conitiopns
			
			$StudentId = $this->Commonmodel->getAfield($table,$cond,$field='StudentId',$order_by='',$order_by_field='',$limit='');
			
			#echo $StudentId; exit; 
			
			//get the classname, section and student name
			
			$this->db->select('cls.ClassName, std.ClassName as ClassId, std.ClassSection as Secid, cls.SLNO, sec.Section,sec.SectionId, std.Student');
			$this->db->from('students as std');
			$this->db->join('newclass as cls',"cls.SLNO=$ClassSlno");
			$this->db->join('sections as sec',"sec.SectionId=$section");
			$this->db->where("std.StudentId",$StudentId);
			$qry = $this->db->get();
			
			/*
			echo "<Pre>";
			print_r($qry->result());
			exit;
			*/
			if($qry->num_rows()==1)
			{
				
				//SectionId,CLASS,StudentId
				foreach($qry->result() as $std_details)	
				{
					$this->session->set_userdata('CLASS',$std_details->SLNO);
					$this->session->set_userdata('SectionId',$std_details->SectionId);
					
					$this->session->set_userdata('ClassSlno',$std_details->SLNO);
					$this->session->set_userdata('ClassSection',$section);
					$this->session->set_userdata('StudentRoll',$RollNo);
					
					$this->session->set_userdata('ClassName',$std_details->ClassName);
					$this->session->set_userdata('ClassSection',$std_details->Section);
					$this->session->set_userdata('Student',$std_details->Student);
					
					$this->session->set_userdata('StudentId',$StudentId);
					
					//check whether the parent details are there 
					
					$cond = array();
					$table ='parentdetails';					
					$cond['StudentId']  = $StudentId;
					
					$ParentName = $this->Commonmodel->getAfield($table,$cond,$field='FatherName',$order_by='',$order_by_field='',$limit='');
					
					if($ParentName!='0')
						$this->session->set_userdata('parent',$ParentName);
					else
						$this->session->set_userdata('parent','');
						
						
						
						
				
					
				}
				echo "1";
			}
			else
				echo "-1";
			
			
		}
		else
		echo '0';
		
		
			
	}
	
	//updatestudentprofile starts here
	
	public function updatestudentprofile()
	{
		
		extract($_POST);
		
		$cond = array();
		$table = 'students';
		
		$cond['Studentid'] = $StudentId;
		
		//update the students table
		
		$setdata  = array();
		
		$setdata['Student'] = $FirstName;
		$setdata['LastName'] = $LastName;
		$setdata['BloodGroup'] = $BloodGroup;
		
		$Datebirth = $DOB;
		
		
		$DOB = date_create($Datebirth);
		
		$cnt=0;
		foreach( $DOB as $key)
		{
			$cnt++;
			if($cnt==1)
				$dateofBirth = $key;
		}
		
		$birthday = explode(" ",$dateofBirth);

		
		$setdata['DOB'] = $birthday[0];
		$setdata['Lastupdated'] = time();
		
		
		
		if( $this->Commonmodel->updatedata($table,$setdata,$cond)	)
		{
			
			//update or insert or delete the  hobbies
			
			//get the hobbies ids and store in an array so that later we can find the difference between this array and the array which will be prepared later for the hobbies which came from the request and we can remove the differed hobbies
			
			$table='studenthobbies';
			
			$hobbies_id_DB = array();
			
			$qry = $this->Commonmodel->getRows_fields($table,$cond,$fields='HobbyId',$order_by='',$order_by_field='',$limit='');
			
			if($qry!='0')
			{
				foreach($qry->result() as $hids)
				{
					$hobbies_id_DB[] = $hids->HobbyId;
				}
				
			}
			else
			{
				$hobbies_id_DB = array();
			}
			
			
			$total_hobbies =  sizeof($hobbies_ids);
			$sent_hobbies=array();
			
			for($i=0;$i<$total_hobbies;$i++)
			{
				//store the ids whic are non zero
				if($hobbies_ids[$i]['hobbyid']!='0')
					$sent_hobbies[] = $hobbies_ids[$i]['hobbyid'];
			}
		
			$tobe_del_hobbies  = array();
			
			if(!empty($hobbies_id_DB ))
			{
				//Find the difference in the two array
				$tobe_del_hobbies = array_diff($hobbies_id_DB,$sent_hobbies);
			}
			
			
			//delete the hobbies which are removed by the user
			
			if(!empty($tobe_del_hobbies))
			{
				foreach( $tobe_del_hobbies as $k=>$val)
				{
					$cond=array();
					$cond['HobbyId'] = $val;
					$table='studenthobbies';
					$this->Commonmodel->deleterow($table,$cond);
					//echo $this->db->last_query();
				}
				
			}
			
			$hobbies_update_insert = 0;
			
			for($i=0;$i<$total_hobbies;$i++)
			{
			
				// if the hobby id is zero then we need to insert if not then need to update
				
				if($hobbies_ids[$i]['hobbyid']=='0')
				{
					$table='studenthobbies';	
					$insertdata=array();
					
					$insertdata['StudentId']  = $StudentId;
					$insertdata['Hobby']  = $hobbies_arr[$i]['hobby'];
					$insertdata['Lastupdated']  = time();
					
					if( $this->Commonmodel->insertdata($table,$insertdata) )
					$hobbies_update_insert++;
				}
				else
				{
					$table='studenthobbies';	
					$setdata=array();
					$cond = array();
					$cond['HobbyId'] = $hobbies_ids[$i]['hobbyid'];
					$cond['StudentId']  = $StudentId;
					$setdata['Hobby']  = $hobbies_arr[$i]['hobby'];
					$setdata['Lastupdated']  = time();
					
					if( $this->Commonmodel->updatedata($table,$setdata,$cond))
					$hobbies_update_insert++;
						
				}
					
					
					
					
			}
			
			
			//get the extra curricular activities
			
			$cond = array();
			$table ='extracircularactivities';
			
			$cond['StudentId'] = $StudentId;
			
			$extra_acti_ids_DB = array();
			
			$qry = $this->Commonmodel->getRows_fields($table,$cond,$fields='ExtracActId',$order_by='',$order_by_field='',$limit='');
			
			if($qry!='0'){ 	foreach($qry->result() as $acti) { $extra_acti_ids_DB[] = $acti->ExtracActId; }	}
			else $extra_acti_ids_DB = array();
			
			
			if( isset($Extra_curr_ids) )
			$total_activities = sizeof($Extra_curr_ids);
			else
			{
				if(isset($Extra_curr_arr) )
					$total_activities = sizeof($Extra_curr_arr);
				else
					$total_activities = '0';
			}
			
			$sent_activities_id = array();
			
			for($i=0;$i<$total_activities;$i++)
			{
				//store the ids which are non zero
				if( isset($Extra_curr_ids) )
				{
					if($Extra_curr_ids[$i]['ExtraCircuid']!='0')
						$sent_activities_id[] = $Extra_curr_ids[$i]['ExtraCircuid'];
				}
			}
			
			
			$tobe_del_activities  = array();
			
			if(!empty($extra_acti_ids_DB ))
			{
				//Find the difference in the two array
				$tobe_del_activities = array_diff($extra_acti_ids_DB,$sent_activities_id);
			}
			
			if(!empty($tobe_del_activities))
			{
				foreach( $tobe_del_activities as $k=>$val)
				{
					$cond=array();
					$cond['ExtracActId'] = $val;
					$table='extracircularactivities';
					$this->Commonmodel->deleterow($table,$cond);
					//echo $this->db->last_query();
				}
				
			}
			
			$activities_update_insert = 0;

				for($i=0;$i<$total_activities;$i++)
				{
			
				// if the hobby id is zero then we need to insert if not then need to update
				
				if( !isset($Extra_curr_ids[$i]['ExtraCircuid']) )
				{
					$table='extracircularactivities';	
					$insertdata=array();
					
					$insertdata['StudentId']  = $StudentId;
					$insertdata['ExtraActivity']  = $Extra_curr_arr[$i]['ExtraCircu'];
					$insertdata['Lastupdated']  = time();
					
					if( $this->Commonmodel->insertdata($table,$insertdata) )
					$activities_update_insert++;
				}
				else
				{
					
					if($Extra_curr_ids[$i]['ExtraCircuid']!=0)
					{
						$table='extracircularactivities';	
						$setdata=array();
						$cond = array();
						$cond['ExtracActId'] = $Extra_curr_ids[$i]['ExtraCircuid'];
						$cond['StudentId']  = $StudentId;
						$setdata['ExtraActivity']  = $Extra_curr_arr[$i]['ExtraCircu'];
						$setdata['Lastupdated']  = time();
						
						if( $this->Commonmodel->updatedata($table,$setdata,$cond))
						$activities_update_insert++;
					}
					else
					{
						$table='extracircularactivities';	
						$insertdata=array();
						
						$insertdata['StudentId']  = $StudentId;
						$insertdata['ExtraActivity']  = $Extra_curr_arr[$i]['ExtraCircu'];
						$insertdata['Lastupdated']  = time();
						
						if( $this->Commonmodel->insertdata($table,$insertdata) )
						$activities_update_insert++;
					}
				}
				
					
			}
			
			
			//get the identification marks
			
			$cond = array();
			$table ='identificationmarks';
			
			$cond['StudentId'] = $StudentId;
			
			$idmarksids_DB = array();
			
			$qry = $this->Commonmodel->getRows_fields($table,$cond,$fields='Markid',$order_by='',$order_by_field='',$limit='');

			if($qry!='0'){ 	foreach($qry->result() as $acti) { $idmarksids_DB[] = $acti->Markid; }	}
			else $idmarksids_DB = array();
			
			
			$total_idmarks = sizeof($Moles_ids);
			$sent_idmarks_id = array();
			
			for($i=0;$i<$total_idmarks;$i++)
			{
				//store the ids which are non zero
				if($Moles_ids[$i]['Moleid']!='0')
					$sent_idmarks_id[] = $Moles_ids[$i]['Moleid'];
			}
			
			
			$tobe_del_idmarks  = array();
			
			if(!empty($idmarksids_DB ))
			{
				//Find the difference in the two array
				$tobe_del_idmarks = array_diff($idmarksids_DB,$sent_idmarks_id);
			}
			
			if(!empty($tobe_del_idmarks))
			{
				foreach( $tobe_del_idmarks as $k=>$val)
				{
					$cond=array();
					$cond['Markid'] = $val;
					$table='identificationmarks';
					$this->Commonmodel->deleterow($table,$cond);
					//echo $this->db->last_query();
				}
				
			}
			
			$idmarks_update_insert = 0;
			
				for($i=0;$i<$total_idmarks;$i++)
				{
			
				// if the hobby id is zero then we need to insert if not then need to update
				
				if($Moles_ids[$i]['Moleid']=='0')
				{
					$table='identificationmarks';	
					$insertdata=array();
					
					$insertdata['StudentId']  = $StudentId;
					$insertdata['IdentificationMark']  = $Moles_arr[$i]['Mole'];
					$insertdata['Lastupdated']  = time();
					
					if( $this->Commonmodel->insertdata($table,$insertdata) )
					$idmarks_update_insert++;
				}
				else
				{
					$table='identificationmarks';	
					$setdata=array();
					$cond = array();
					$cond['Markid'] = $Moles_ids[$i]['Moleid'];
					$cond['StudentId']  = $StudentId;
					$setdata['IdentificationMark']  = $Moles_arr[$i]['Mole'];
					$setdata['Lastupdated']  = time();
					
					if( $this->Commonmodel->updatedata($table,$setdata,$cond))
					$idmarks_update_insert++;
						
				}
				
				
					
			}
			
			$msg=" ";
				
				if($total_hobbies==$hobbies_update_insert)
					$msg.="1";
				else
					$msg.="0";
					
				if( $total_activities==$activities_update_insert)
					$msg.="-1";
				else
					$msg.="-0";
				
				if($idmarks_update_insert == $total_idmarks)
					$msg.="-1";
				else
					$msg.="-0";
					
			
			
		}///if ends here
		else
			$ms='0-0-0';
			
		echo $msg;

		
		
		
	}
	
	//updatestudentprofile ends here
	
	//setindividualnotification starts here
	
		
		public function setindividualnotification()
		{
			
			extract($_POST);
			
			if($collapse!='')
			$this->session->set_userdata('collapse',$collapse);
			else
			$this->session->set_userdata('collapse','');
			
		}
	
	//setindividualnotification ends here
	
//updateNotificationStatus stats here
	
	public function updateNotificationStatus()
	{
		$postdata = $this->striptags($_POST);
		
		extract($postdata);
		
		$cond = array();
		$table ='notifications';
		
		$cond['NotificationId'] = $NotificationId;
		
		if( $this->Commonmodel->checkexists($table,$cond) )
		{
			//get the status
			
			$Status = $this->Commonmodel->getAfield($table,$cond,$field='Status',$order_by='',$order_by_field='',$limit='');
			if($Status=='Unread')
			{
				$setdata = array();
				
				$setdata['Status'] = 	'Read';
				$this->Commonmodel->updatedata($table,$setdata,$cond);	
			}
		}
		
			
	}
	
//updateNotificationStatus ends hree
	
	


//addnotification starts here

	public function sendnotification()
	{
		$posted_data = $_POST;
		$postdata = $this->striptags($posted_data);
		extract($postdata);
		
		$table = 'notifications';
		$insertdata = array();
		
	/*	echo $this->session->userdata('StudentId'); exit;
		
		
		if( $this->session->userdata('StudentId')!='' )
			{
				$StudentId =  $this->session->userdata('StudentId');
				$cond = array();
				$cond['StudentId'] = $StudentId;
				
				$qry = $this->Commonmodel->getRows_fields($table='students',$cond,$fields='ClassName,ClassSection',$order_by='',$order_by_field='',$limit='');
				
				if($qry!='0')
				{
					foreach($qry->result() as $stdinfo)
					{
						
						$this->session->set_userdata('ClassSlno') 		= $stdinfo->ClassName;
						$this->session->set_userdata('ClassSection') 	= $stdinfo->ClassSection;
						$this->session->set_userdata('StudentRoll') 	= $this->session->userdata('StudentId');
					}
				}
			}
		*/
		//SectionId,CLASS,StudentId
		
		$ClassSlno 		=	$this->session->userdata('CLASS');
		$ClassSection 	=	$this->session->userdata('SectionId');
		$StudentId	=	$this->session->userdata('StudentId');
		
		
		
		
		$insertdata['ClassName']			=	$ClassSlno;
		$insertdata['ClassSection']			=	$ClassSection;
		
		$insertdata['StudentId']			=	$StudentId;
		
		$insertdata['NotificationTitle']	=	$NotificationTitle; 
		$insertdata['Notification']			=	$notif; 
		
		$insertdata['AddedOn']				=	date('Y-m-d H:i:s'); 
		$insertdata['AddedBy']				=	'Parent'; 
		$insertdata['LastUpdated']			=	time();	 
		$insertdata['AcademicYear'] 		=  $this->schedulinglib->getAcademicyear();
		
		$insertdata['Status']				= 	'Unread';
		
		if( $this->Commonmodel->insertdata($table,$insertdata) )
			echo "1";
		else
			echo "0";
		
		
	}	
	
	public function getSingleColumn($field,$table,$cond)
	{
		$Field = $this->Commonmodel->getAfield($table,$cond,$field,$order_by='',$order_by_field='',$limit='');
		return 	$Field;
	}
	
	//changeprofilepic starts here
	
	public function changeprofilepic()
	{


		$requested_from =  $_SERVER['HTTP_REFERER'];
		
		/*
		$this->session->set_userdata('ClassName',$std_details->ClassName);
					$this->session->set_userdata('ClassSection',$std_details->Section);
					$this->session->set_userdata('Student',$std_details->Student);
					
					$this->session->set_userdata('StudentId',$StudentId);
		
		*/
		//get the academic year of the student
		
		$cond = array();
		$table ='students';
		
		$cond['StudentId']= $this->session->userdata('StudentId');
		
		$field='AcademicYear';
		
		
		$AcademicYear = $this->getSingleColumn($field,$table,$cond);
		




if(strpos($requested_from, 'trillionit.in') !== false)
	$dir1="/home3/vsksamsu/public_html/school-app/resources/studentspics/".$AcademicYear;
else
	$dir1="resources/studentspics/".$AcademicYear;

		if(is_dir($dir1))
		{
			$dir2 = $dir1."/".$this->session->userdata('ClassName');
			if(is_dir($dir2))
			{
				$dir3=$dir2."/Section-".$this->session->userdata('ClassSection');
				if(is_dir($dir3))
				{
					
					$extr = explode(".",$_FILES['stdprofilepic']['name']);
					
					if(strpos($requested_from, 'trillionit.in') !== false)
					{
						$path = explode("resources",$dir3);
						
						$targetPath = "resources".$path[1]."/Student-".$this->session->userdata('StudentId').".".end($extr);
					}
						
					else
					$targetPath = $dir3."/Student-".$this->session->userdata('StudentId').".".end($extr);
					$sourcePath = $_FILES['stdprofilepic']['tmp_name'];       // Storing source path of the file in a variable
					
					
					
					if( move_uploaded_file($sourcePath,$targetPath) )
					{
						$table = 'students';
						$setdata = array();
						$setdata['ProfileIPic'] = 	$targetPath."?".time();
						$setdata['Lastupdated'] = time();
						
						$this->Commonmodel->updatedata($table,$setdata,$cond);
						
					}
				}
				else
				mkdir($dir3);
			}
			else
			mkdir($dir2);
		}
		else
		mkdir($dir1);
		
		
		/*
//		$dir='resources/studentspics/'
		
		$sourcePath = $_FILES['file']['tmp_name'];       // Storing source path of the file in a variable
		$targetPath = "resources/studentspics/2017-2018/class-I/Section-A/".$_FILES['file']['name']; // Target path where file is to be stored
		if(move_uploaded_file($sourcePath,$targetPath))
		{
				
		}
		*/
	}
	
	///changeprofilepic ends e
	
	public function getEventbasedpics()
	{
		extract($_POST);
		
		$cond = array();
		$table = 'activitypics';	
		
		$ActivityPicId = explode("_",$eventid);
		
		$cond['ActivityId'] = $ActivityPicId[1];

		$fields = 'Picture';
		$output_arr = array();
		
		$eventpics = $this->Commonmodel->getRows_fields($table,$cond,$fields,$order_by='ASC',$order_by_field='ActivityPicId',$limit='');
		
		if($eventpics!='0')
		{
			$output_arr['Pic_exists'] = "yes";
			foreach($eventpics->result() as $pics)			
			{
				$output_arr['Eventpics'][] = array("Picture"=>$pics->Picture);
			}
		}
		else
			$output_arr['Pic_exists'] = "no";
	
		echo json_encode($output_arr);	
		}
	
	
	//get the transportaiton details
	
	public function gettransportation()
	{
		$cond = array();

		$studentDetails = $this->schedulinglib->getstudemtSessiondetails();
	/*
		echo "<pre>";
		print_r($studentDetails);
		exit;
	*/
		$StudentId =  $studentDetails['studentId'];
		$ClassName = $studentDetails['classid'];
		$ClassSection = $studentDetails['sectionId'];
		
		$qry = $this->Commonmodel->getRows_fields($table='students',$cond,$fields='ClassName,ClassSection',$order_by='',$order_by_field='',$limit='');
		
		$output_arr = array();
		
		$output_arr['wrongstudent'] = "yes";
		$output_arr['Nodata'] = "yes";
		
		
			$details='';
			
			//get the route number
			
			$cond['StudentId'] = $StudentId;
			$cond['ClassId'] = $ClassName;
			$cond['SectionId'] = $ClassSection;
			
			$RouteId = $this->Commonmodel->getAfield($table='assignstdroute',$cond,$field='RouteId',$order_by='',$order_by_field='',$limit='');
			
			
			
			$this->db->select('staf.StaffName, rt.Routes, vh.VechileNumber, sd.ContactNumber');
		//	$this->db->select('rt.Routes,vh.VechileNumber');
			$this->db->from('assignstdroute as assign');
			$this->db->join('routes as rt','rt.RouteId=assign.RouteId');
			$this->db->join('vehicles as vh','vh.VehicleRoute=rt.RouteId');
			$this->db->join('staffdetails as sd','sd.StaffId=vh.Driver');
			$this->db->join('staff as staf','staf.StaffId=sd.StaffId');
			$this->db->where('assign.StudentId',$StudentId);
			$this->db->where('assign.ClassId',$ClassName);
			$this->db->where('assign.SectionId',$ClassSection);
			$this->db->where('assign.RouteId',$RouteId);
			
			$qry = $this->db->get('');
			
			if( $qry->num_rows()>0)
			{
				$output_arr['wrongstudent'] = "no";
				$output_arr['Nodata'] = "no";
					
				foreach($qry->result() as $routedetails)	
				{
					$output_arr['StaffName'] = $routedetails->StaffName;
					$output_arr['Routes'] = $routedetails->Routes;
					
					$output_arr['VechileNumber'] = $routedetails->VechileNumber;
					$output_arr['ContactNumber'] = $routedetails->ContactNumber;
					
					//$output_arr['ContactAddress'] = $routedetails->ContactAddress;
				}
			}
			
		
		echo json_encode($output_arr);
		
	}
	
	// transportation details ends here
	
	public function homeworksubmission()
	{
		//$studentDetails = $this->schedulinglib->getstudemtSessiondetails();
		
		if( isset($_POST['homeworkid'])  && isset($_POST['homeworkstatus']) &&  isset($_POST['homeworkcomments']) ) 
		{
			$cond = array();
			$table = 'homeworks';
			
			$cond['HomeworkId'] = $_POST['homeworkid'];
			
			$setdata = array();
			
			$setdata['Status'] = 'Completed';
			$setdata['Comments'] = @$_POST['homeworkcomments'];
			
			if( isset($_POST['homeworkstatus']) && $_POST['homeworkstatus']=='Completed' )
			{
				if( $this->Commonmodel->updatedata($table,$setdata,$cond) )
					echo "1";
				else
					echo "0";
			}
			else
				echo "-2";
		}
		else
			echo "-1";
		
		
		
		
	}
	
}//class ends here		