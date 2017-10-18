<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Teacherrequestdispatcher extends CI_Controller 
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
			
			
		if( strpos($requested_from, 'localhost') !== false || strpos($requested_from, 'trillionit.in') !== false || strpos($requested_from, 'adiakshara.in') !== false)
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
			
	public function clearfilters()
	{
		$posteddata = $this->striptags($_POST);
		
		extract($posteddata);
		
		if( $which=="Class")
		{
				$this->session->set_userdata('class_marksfilter','0');
				$this->session->set_userdata('section_marksfilter','0');
				$this->session->set_userdata('Subject_marksfilter','0');
				$this->session->set_userdata('Exam_marksfilter','0');
		}
		elseif($which=="Section")
		{
				$this->session->set_userdata('class_marksfilter','0');
				$this->session->set_userdata('section_marksfilter','0');
				$this->session->set_userdata('Subject_marksfilter','0');
		}
		elseif($which=="Subject")
				$this->session->set_userdata('Subject_marksfilter','0');
		elseif($which=="Exam")
				$this->session->set_userdata('Exam_marksfilter','0');
		
		echo "1";
		
	}
	
	public function deletemark()
	{
		
		$posteddata = $this->striptags($_POST);
		
		extract($posteddata);
		
		$cond = array();
		$cond['AllocatedId'] = $AllocatedId;
		
		$table = 'allocatedmarks';
		
		if( $this->Commonmodel->deleterow($table,$cond) )
			echo "1";
		else
			echo "0";
		
	}//delete marks
	
	
	///update allocated marks starts here
	
	public function updateallocatedmarks()
	{
			
		$posteddata = $this->striptags($_POST);
		extract($posteddata);	
		
		
		$cond = array();
		$table ='allocatedmarks';
		
		$cond['AllocatedId'] = $MarksAllocatedId;
		
		$setdata = array();
		
		$setdata['TotalMarks'] = $TotalMarks;
		$setdata['SecuredMarks'] = $SecuredMarks;		
		$setdata['LastUpdated'] = time();
		
		if( $this->Commonmodel->updatedata($table,$setdata,$cond))
			echo "1";
		else
			echo "0";
		
			
	}
	
	//update allocated marks ends here
	
}//class ends here		