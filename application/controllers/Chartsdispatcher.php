<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Chartsdispatcher extends CI_Controller 
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
			
			
		if( strpos($requested_from, 'localhost') !== false || strpos($requested_from, '192.168.0.3') !== false || strpos($requested_from, 'trillionit.in') !== false || strpos($requested_from, 'adiakshara.in') !== false)
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
		
	public function classattendance()
	{
		
		$postedData = $this->striptags($_POST);
		$postedData['Academicyear'] = $this->schedulinglib->getAcademicyear();
		extract($postedData);
		
		
		$relset = $this->Commonmodel->getMonthwiseStudentattendance($postedData);
		
		$outputarr = array();
		
		foreach( $relset->result() as $data )
		{
			
			$mnt = $data->MonthNumber;
			
			$startDate = date('Y-'.$mnt.'-01',strtotime(date('Y-m')));
			$endDate = date('Y-'.$mnt.'-t',strtotime(date('Y-m')));
		
			//$totaldays = explode("-",$endDate);
			
			$totaldays=cal_days_in_month(CAL_GREGORIAN,$mnt,date('Y'));
			

			$totalsundays = $this->db->query("select DATE_ADD('".$startDate."', INTERVAL ROW DAY) as Date,
row+1  as DayOfMonth from( SELECT @row := @row + 1 as row FROM  (select 0 union all select 1 union all select 3  union all select 4 union all select 5 union all select 6) t1, (select 0 union all select 1 union all select 3 union all select 4 union all select 5 union all select 6) t2,  (SELECT @row:=-1) t3 limit 31 ) b where  DATE_ADD('".$startDate."', INTERVAL ROW DAY) between '".$startDate."' and '".$endDate."' and DAYOFWEEK(DATE_ADD('".$startDate."', INTERVAL ROW DAY))=1"); 		
		
			$numsundays = $totalsundays->num_rows();
		
			$totalworkingdays = ($totaldays)-$numsundays;
			
			//get number of students in the class of a section
			
			if($Seciton>0 && $Class>0 ) // is for whole school
				$TotalStudents = $this->Commonmodel->getnumRows('students',array("ClassName"=>$Class,"ClassSection"=>$Seciton,"AcademicYear"=>$Academicyear) );
			else //is for the a class and section
				$TotalStudents = $this->Commonmodel->getnumRows('students',array("AcademicYear"=>$Academicyear) );
				
			
			$lastDayofmnth = date('Y-m-t', strtotime($data->MonthName.' 01, '.date('Y')));
			
			
			if( $lastDayofmnth == date('Y-m-d') )
					$totalRows = $totalworkingdays*$TotalStudents;
			else
				$totalRows = date('d')*$TotalStudents;
			
			$TotalPresents = $data->present;
			
			if( $TotalPresents>0)
				$attendancePercentage = (($TotalPresents)/$totalRows)*100;	
			else
				$attendancePercentage=0;
			
			if($attendancePercentage>0)
			{
				$outputarr[] = array(
										"Month"=>$data->MonthName,
										"Attendance" =>$attendancePercentage
										);	
			}
		}
	if( sizeof($outputarr)>0)
		echo json_encode($outputarr);
	else
		echo "0";
	
	
		
	
	
	
	}//getting student attendance ends here
	
	public function getTeacherAttendance()
	{
		
		
		$postedData = $this->striptags($_POST);
		
		$postedData['Academicyear'] = $this->schedulinglib->getAcademicyear();
		extract($postedData);
		
		
		$relset = $this->Commonmodel->getMonthwiseTeacherattendance($postedData);
		
		$outputarr = array();
		
			foreach( $relset->result() as $data )
			{
				
			
			$mnt = $data->MonthNumber;
			
			$startDate = date('Y-'.$mnt.'-01',strtotime(date('Y-m')));
			$endDate = date('Y-'.$mnt.'-t',strtotime(date('Y-m')));
		
			//$totaldays = explode("-",$endDate);
			
			$totaldays=cal_days_in_month(CAL_GREGORIAN,$mnt,date('Y'));
			

			$totalsundays = $this->db->query("select DATE_ADD('".$startDate."', INTERVAL ROW DAY) as Date,
row+1  as DayOfMonth from( SELECT @row := @row + 1 as row FROM  (select 0 union all select 1 union all select 3  union all select 4 union all select 5 union all select 6) t1, (select 0 union all select 1 union all select 3 union all select 4 union all select 5 union all select 6) t2,  (SELECT @row:=-1) t3 limit 31 ) b where  DATE_ADD('".$startDate."', INTERVAL ROW DAY) between '".$startDate."' and '".$endDate."' and DAYOFWEEK(DATE_ADD('".$startDate."', INTERVAL ROW DAY))=1"); 		
		
			$numsundays = $totalsundays->num_rows();
		
			$totalworkingdays = ($totaldays)-$numsundays;
			
			//get the total
			if( $teacherid<1)
			 {
					$this->db->select('count(TeacherId) as Totalteachers' );
					$this->db->from('teacher');
					$Totalteachers = $this->db->get()->row('Totalteachers');
					
			 }
			 else
			 	$Totalteachers=1;
				
			$TotalPresents = $data->present;
			
			$TotalPresents = $TotalPresents/$Totalteachers;
			
			if( $TotalPresents>0)
				$attendancePercentage = (($TotalPresents)/$totalworkingdays)*100;	
			else
				$attendancePercentage=0;
				
				if($attendancePercentage>0)
				{
					$outputarr[] = array(
										"Month"=>$data->MonthName,
										"Attendance" =>$attendancePercentage
										);	
				}
			}
		
	echo json_encode($outputarr);
		
		
		

	
	
		
	
			
		
	
	}// Getting teacher attendance ends here


	//staffpresentabsent starts here
	
	public function staffpresentabsent()
	{
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
		
		echo json_encode($output);
	}
	
	//staffpresentabsentends here	
			

}//class ends here		

