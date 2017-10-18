<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Managerequestdispatcher extends CI_Controller 
{

	 public function __construct()
		{
			parent::__construct();
			date_default_timezone_set("Asia/Kolkata");
			
			$this->load->model('Commonmodel');
			
		}//constructor stARTS HERE
		
	
	
	public function striptags($posted_data)
		{
			
		
			$requested_from =  $_SERVER['HTTP_REFERER'];
			
			
		if( strpos($requested_from, 'localhost') !== false || strpos($requested_from, '192.168.0.5') !== false ||  strpos($requested_from, 'trillionit.in') !== false || strpos($requested_from, 'adiakshara.in') !== false)
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
			
	
	

//password generator

	public function passwordgenerator($len)
	{
		$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()_-=+;:,.?";
		$password = substr( str_shuffle( $chars ), 0, $len );	
		return $password;
	}

//getstudents starts here
	
	public function getstudents()
	{
		$posted_data = $_POST;
		$postdata = $this->striptags($posted_data);
		
		$cond = array();
		$table = 'students';
		
		$cond['ClassName'] = $postdata['ClassName'];
		$cond['ClassSection'] = $postdata['section'];
		
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

//getstudents ends here


//addnotification starts here

	public function addnotification()
	{
		$posted_data = $_POST;
		$postdata = $this->striptags($posted_data);
		extract($postdata);
		
		$table = 'notifications';
		$insertdata = array();
		
		$insertdata['ClassName']			=	$ClassName;
		$insertdata['ClassSection']			=	$section;
		
		$insertdata['StudentId']			=	$student;
		$insertdata['NotificationTitle']	=	$NotificationTitle; 
		$insertdata['Notification']			=	$posted_data['Notification']; 
		
		$insertdata['AddedOn']				=	date('Y-m-d H:i:s'); 
		$insertdata['AcademicYear']			=	$this->schedulinglib->getAcademicyear();
		
		$insertdata['AddedBy']				=	'Admin'; 
		$insertdata['LastUpdated']			=	time();	 
		
		$insertdata['Status']				= 	'Unread';
		
		if( $this->Commonmodel->insertdata($table,$insertdata) )
			echo "1";
		else
			echo "0";
		
		
	}


//addnotification ends here

//updatenotification starts here
	
	public function updatenotification()
	{
		$posted_data = $_POST;
		$postdata = $this->striptags($posted_data);
		extract($postdata);
		
		$cond = array();
		$table= 'notifications';
		$setdata = array();
		
		$cond['NotificationId'] = $NotificationId;
		
		$setdata['ClassName'] = $ClassName;
		$setdata['ClassSection'] = $section;
		$setdata['StudentId'] = $student;
		$setdata['Notification'] = $Notification;
		$setdata['AcademicYear']			=	$this->schedulinglib->getAcademicyear();
		
		$setdata['LastUpdated'] = time();
		
		if( $this->Commonmodel->updatedata($table,$setdata,$cond))
			echo "1";
		else
			echo "0";
	}


//updatenotification ends here

	//addhomeworks starts here 
	
	public function addhomework()
	{
		
		$postdata = $this->striptags($_POST);
		
		extract($postdata);
		
		$table ='homeworks';
		$insertdata = array();
		
		$HomeWorkOn = date_create($HomeWorkOn);
		$HomeWorkOn = date_format($HomeWorkOn,'Y-m-d');
		
		
		$insertdata['ClassSlno'] = $ClassSlno;
		$insertdata['ClassSection'] = $ClassSection;
		$insertdata['StudentId'] = $StudentId;
		
		$insertdata['SubjectId'] =  $SubjectId;
		$insertdata['HomeWorkOn'] = $HomeWorkOn;
		$insertdata['HomeWork'] = $HomeWork;
		
		$insertdata['Status'] = "Assigned";
		$insertdata['Lastupdated'] = time();
		
		if( $this->Commonmodel->insertdata($table,$insertdata))
		{
			echo "1";
		}
		else
			echo "0";

		
	
	}
	
	
	//addhomeworks ends here 


///updatehomework starts here

	public function updatehomework()
	{
		
		$postdata = $this->striptags($_POST);
		
		extract($postdata);
		
		$table ='homeworks';
		$setdata = array();
		
		$HomeWorkOn = date_create($HomeWorkOn);
		$HomeWorkOn = date_format($HomeWorkOn,'Y-m-d');
		
		
		$setdata['ClassSlno'] = $ClassSlno;
		$setdata['ClassSection'] = $ClassSection;
		$setdata['StudentId'] = $StudentId;
		
		$setdata['SubjectId'] =  $SubjectId;
		$setdata['HomeWorkOn'] = $HomeWorkOn;
		$setdata['HomeWork'] = $HomeWork;

		$setdata['Lastupdated'] = time();
		
		$cond = array();
		$cond['HomeworkId'] = $assignedhomeworkid;
		
		if( $this->Commonmodel->updatedata($table,$setdata,$cond) )
		{
			echo "1";
		}
		else
			echo "0";
			
	}
	

//updatehomework ends here


	public function geteventpics()
	{
		$postdata = $this->striptags($_POST);
		extract($postdata);
		
		$cond= array();
		$table ='activitypics';
		
		$ActivityId = explode("_",$EventID);
		$cond['ActivityId'] = $ActivityId[1];
		
		$fields='Picture,ActivityPicId';
		
		
		$picdetails = $this->Commonmodel->getRows_fields($table,$cond,$fields,$order_by='',$order_by_field='',$limit='');
		
		$outout_arr = array();
		
		if($picdetails!='0')
		{
			$outout_arr['Datavailable'] = 'yes';
			
			foreach($picdetails->result() as $pics)
			{
				$outout_arr['Eventpics'][] = array(
												"ActivityPicId"=>$pics->ActivityPicId,
												"Picture"=>$pics->Picture
												);
			}
		}
		else
		{
			$outout_arr['Datavailable'] = 'no';
		}
		
		echo json_encode($outout_arr);
	}
	
//DeleteEventpic starts here

	public function DeleteEventpic()
	{
		$postdata = $this->striptags($_POST);
		extract($postdata);
		
		$cond = array();
		$table='activitypics';
		
		$picid = explode("_",$EventId);
		
		$cond['ActivityPicId'] = $picid[1];
		
		if( $this->Commonmodel->deleterow($table,$cond))
			echo "1";
		else
			echo "0";
		
		
			
	}

//DeleteEventpic ends her

//getClassfee starts here

	public function getClassfee()
	{
		$postdata = $this->striptags($_POST);
		extract($postdata);
		
		$cond = array();
		$table = 'schoolfee';
		
		$cond['Class'] = $Class;
		$cond['AcademicYear'] = $AcademicYr;
		
		$field = 'MonthlyFee';
		
		$MonthlyFee = $this->Commonmodel->getAfield($table,$cond,$field,$order_by='',$order_by_field='',$limit='');
		
		if($MonthlyFee)
			echo $MonthlyFee;
		else
			echo "0";
			
		
	}

//getClassfee ends hree

/*

$url = "http://onlinebulksmslogin.com/spanelv2/api.php";  
$request="username=adiakshara&password=preschool123&to=".$contactNumber."&from=$from&message=".urlencode($message);	

//return $request;  

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $request);
$resuponce=curl_exec($ch);
curl_close($ch);
return  $resuponce;


*/


}//class ends here		