<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Schedulingdispatcher extends CI_Controller 
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
			
			
		if( strpos($requested_from, 'localhost') !== false || strpos($requested_from, 'adiakshara.in') !== false)
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
			
		public function addCelebration()
		{
			$postdata = $this->striptags($_POST);
			
			extract($postdata);
			
			
			$insertdata = array();
			$table = 'celebrations';
			
			$cel_date = date_create($cel_date);
			$cel_date = date_format($cel_date,'Y-m-d');
			
			
			$insertdata['Celebration_Date'] = $cel_date;
			$insertdata['Celebration_Text'] = $celebration;
			$insertdata['Lastupdated'] = time();
			
			if( $this->Commonmodel->insertdata($table,$insertdata))
				echo "1";
			else
				echo "0";
			
			
		}

		public function getcelebratation()
		{
			$postdata = $this->striptags($_POST);
			extract($postdata);
			
			$cond = array();
			$table ='celebrations';
			
			$cond['CelebId'] = $CelebId;
			$fields='date_format(Celebration_Date,"%d-%m-%Y") as Celebration_Date,Celebration_Text';
			$order_by='';
			$order_by_field='';
			$limit='';
			
			$data = $this->Commonmodel->getRows_fields($table,$cond,$fields,$order_by,$order_by_field,$limit);
			
			$output = array();
			
			if($data!='0')
			{
				foreach($data->result() as $res)
				{
					$output[] = array("Celebration_Date"=>$res->Celebration_Date,"Celebration_Text"=>$res->Celebration_Text,"CelebId"=>$CelebId);
				}
				echo json_encode($output);
			}
			else
			echo "0";
			
			
			
		}
		//getcelebrations ends here
		
		//updateCelebration starts here
		
		public function updateCelebration()
		{
			$postdata = $this->striptags($_POST);
			extract($postdata);
			
			$cond = array();
			$table ='celebrations';
			$insertdata = array();
			
			
			$cond['CelebId'] = $CelebId;
		
			$insertdata['Celebration_Text'] = $celebration;
			$insertdata['Lastupdated'] = time();
			
			if($this->Commonmodel->updatedata($table,$insertdata,$cond))
				echo "1";
			else
				echo "0";
			
		}
		
		//updateCelebration ends here
	
	public function addExam()
	{
		$postdata = $this->striptags($_POST);
		extract($postdata);
		
		//check whether same this examalready scheduled or not
		
		$cond = array();
		$table = 'examschedules';
		
		$cond['Exam'] =$ExamName;
		$cond['ClassName'] =$ClassName;
		$cond['ClassSection'] =$ClassSection;
		$cond['Subject'] =$Subject;
		
		$ExamDate = date_create($ExamDate);
		$ExamDate = date_format($ExamDate,'Y-m-d');
		$examscheduletime = $examscheduletime;
		
		$cond['ExamSchedule'] = $ExamDate;
		$cond['ScheduledTime'] = $examscheduletime;
		
		if( $this->Commonmodel->checkexists($table,$cond))
			echo "-1";
		else
		{
			$insertdata = array();
			
			$ExamDate = date_create($ExamDate);
			$ExamDate = date_format($ExamDate,'Y-m-d');
			
			$insertdata['Exam'] =$ExamName;
			$insertdata['ClassName'] =$ClassName;
			$insertdata['ClassSection'] =$ClassSection;
			$insertdata['Subject'] =$Subject;
			$insertdata['ExamSchedule'] = $ExamDate;
			$insertdata['ScheduledTime'] = $examscheduletime;
			
			$chkmonth = explode("-",$ExamDate); 
			$chkmnth = (int)$chkmonth[1];
			
			if($chkmnth>5 && $chkmnth<=12)
				$academicYear= $chkmonth[0]."-".($chkmonth[0]+1);
			else
				$academicYear= ($chkmonth[0]-1)."-".($chkmonth[0]);
			
			$insertdata['AcademicYear'] = $academicYear;
			
			$insertdata['LastUpdated'] = time();
			
			if( $this->Commonmodel->insertdata($table,$insertdata) )
				echo "1";
			else
				echo "0";
		}
	}//add exam ends here
	
	
public function getexamschedules()
{
	$postdata = $this->striptags($_POST);
	extract($postdata);
	
	$this->db->select("whcexam.Exam as Exam, exmsch.ExamSchedueId, cls.ClassName, sec.Section, sub.SubjectName, date_format(exmsch.ExamSchedule,'%d-%m-%Y') as ExamSchedule, exmsch.ScheduledTime");
	$this->db->from("examschedules as exmsch");
	$this->db->join("newclass as cls","cls.SLNO=exmsch.ClassName");
	$this->db->join("sections as sec","sec.SectionId=exmsch.ClassSection");
	$this->db->join("subjects as sub","sub.SubjectId=exmsch.Subject");
	$this->db->join("whichexam as whcexam","whcexam.ExamId=exmsch.Exam");

	$this->db->group_start();
	$this->db->where("exmsch.ExamSchedule",$datedOn);
	$this->db->group_end();
	
		if( $this->session->userdata('parent')!='')
			{
				$this->db->group_start();
				$conde = array();
				
				$conde['exmsch.ClassName'] =  $this->session->userdata('CLASS');
				$conde['exmsch.ClassSection'] =  $this->session->userdata('SectionId');
				
				
				$this->db->where($conde);
				$this->db->group_end();
			}
	
	$qry = $this->db->get();
	
	
	$out_put = array();
	if( $qry->num_rows()>0)
	{
		$msg='';
		
		$msg = 	' <div class="Schedules">
                        <div class="schedule-header"><strong>Exam</strong></div>
                        <div class="schedule-header"><strong>Class</strong></div>
                        <div class="schedule-header"><strong>Section</strong></div>
                        
                        <div class="schedule-header"><strong>Subject</strong></div>
                        <div class="schedule-header"><strong>Date</strong></div>
                        <div class="schedule-header"><strong>Time</strong></div>';
	//			if( $this->session->userdata('parent')=='')	
	                $msg.='<div class="schedule-header"><strong>Actions</strong></div>';
	                $msg.='<div class="clearfix"></div>
					</div>';
					
					
		foreach($qry->result() as $schedules)
		{
			
			$msg.=' <div class="Schedules" scheduleide="'.$schedules->ExamSchedueId.'">';
			
			$msg.='<div class="schedule-header">'.$schedules->Exam.'</div>';
			$msg.='<div class="schedule-header">'.$schedules->ClassName.'</div>';
			$msg.='<div class="schedule-header">'.$schedules->Section.'</div>';
			
			$msg.='<div class="schedule-header">'.$schedules->SubjectName.'</div>';
			$msg.='<div class="schedule-header">'.$schedules->ExamSchedule.'</div>';
			$msg.='<div class="schedule-header">'.$schedules->ScheduledTime.'</div>';
			
			if( $this->session->userdata('parent')=='')
			{
			$msg.=' <div class="schedule-header"><a  style="cursor:pointer" data-toggle="modal" data-target="#editExamSchedule" class="view_exam_scedule" id="'.$schedules->ExamSchedueId.'"><i class="fa fa-pencil-square-o" aria-hidden="true" style="font-size:20px"></i></a>&nbsp;&nbsp;<a style="cursor:pointer" class="del_exam_schedule" id="'.$schedules->ExamSchedueId.'"><i style="color:#F00; font-size:20px; " class="fa fa-trash-o" aria-hidden="true"></i> </a></div>';
			}
			else
			{
				$msg.=' <div class="schedule-header" style="text-align:center"><a  style="cursor:pointer" data-toggle="modal" data-target="#editExamSchedule" class="view_exam_scedule" id="'.$schedules->ExamSchedueId.'"><i class="fa fa-eye" aria-hidden="true" style="font-size:20px"></i></a></div>';
			}
			$msg.='<div class="clearfix"></div> </div>';
					
		}
		echo '<div class="clearfix"></div>'.$msg;
		
	}
	else
	{
		echo "0";
	}
	
	
	
}//getexamschedules ends here
	


// getExam starts here

	public function getExam()
	{
		$postdata = $this->striptags($_POST);
		extract($postdata);
		
		$table = 'examschedules';
		$cond = array();
		
		$cond['ExamSchedueId'] = $ExamSchedueId;
		
		$qry = $this->Commonmodel->getrows($table,$cond,$order_by='',$order_by_field='',$limit='');

		$output=array();

		if($qry!='0')
		{
			foreach($qry->result() as $exam)
			{
				
				// call classes 
				
				$classes = $this->Commonmodel->getrows($table='newclass',$cond=array(),$order_by='',$order_by_field='',$limit='');
				$cnt=0;
				$selected='';
				foreach($classes->result() as $cls)
				{
					if($cnt==0)
					{
						$output['ClassName'][] = "<option value='0'>Select Class</option>";
					}
					
					if($cls->SLNO==$exam->ClassName)
					{
						$selected=' selected="selected"';
					}
					else
						$selected='';
						
					$output['ClassName'][] = "<option value='".$cls->SLNO."' ".$selected.">".$cls->ClassName."</option>";
					
					$cnt++;
				}
				
				//getting class ends here
				
				//get the sections
					
					$cond = array();
					$selected='';
					$cnt=0;
					
					$table = 'sections';
					$cond['ClassSlno'] = $exam->ClassName;
					$cond['SectionId'] = $exam->ClassSection;
					
					$sections = $this->Commonmodel->getrows($table,$cond,$order_by='',$order_by_field='',$limit='');
					
					foreach($sections->result() as $sect)
					{
							if($cnt==0)
							$output['ClassSection'][] = "<option value='0'>Select Section</option>";
							
							if($sect->SectionId==$exam->ClassSection)
								$selected=' selected="selected"';
							else
								$selected='';
							
							$output['ClassSection'][] = "<option value='".$sect->SectionId."' ".$selected.">".$sect->Section."</option>";
							
							$cnt++;
					}
					
				
				//getting sections ends here
				
				//get the subjects
				
				//get the sections
					
					$cond = array();
					$selected='';
					$cnt=0;
					
					$table = 'assignedsubjects';
					$cond['ClassSlno'] = $exam->ClassName;
					
					$subjects = $this->Commonmodel->getrows($table,$cond,$order_by='',$order_by_field='',$limit='');
					
					foreach($subjects->result() as $subj)
					{
							if($cnt==0)
							$output['Subjects'][] = "<option value='0'>Select Subject</option>";
							
							if($subj->SubjectAssigned==$exam->Subject)
								$selected=' selected="selected"';
							else
								$selected='';
							
							$cond = array();
							$cond['SubjectId'] = $subj->SubjectAssigned;
							
							$table= 'subjects';
							
							$subjectName = $this->Commonmodel->getAfield($table,$cond,$field='SubjectName',$order_by='',$order_by_field='',$limit='');
							
							
							$output['Subjects'][] = "<option value='".$subj->SubjectAssigned."' ".$selected.">".$subjectName."</option>";
							
							$cnt++;
					}
				
				//getting subjects ends here
				
				
				//get the exam name
				
				$cond = array();
				$table = 'whichexam';
				
			//	$cond['ExamId']  = $exam->Exam;
				$cnt=0;
				
				$Exams = $this->Commonmodel->getrows($table,$cond,$order_by='',$order_by_field='',$limit='');
				
				foreach($Exams->result() as $xam)
				{
					if($cnt==0)
							$output['ExamName'][] = "<option value='0'>Select Exam</option>";
							
							if($xam->ExamId==$exam->Exam)
								$selected=' selected="selected"';
							else
								$selected='';
							
							$output['ExamName'][] = "<option value='".$xam->ExamId."' ".$selected.">".$xam->Exam."</option>";
							
							$cnt++;
				}
				
				$ExamSchedule = date_create($exam->ExamSchedule);
				$ExamSchedule = date_format($ExamSchedule,"d/m/Y");
				
				$output['ExamSchedule'] = $ExamSchedule;
				$am_pm='';
				
#				echo $exam->ScheduledTime; exit; 
				
				$ScheduledTime = explode(":",$exam->ScheduledTime);
				
				if($ScheduledTime[0]>9 && $ScheduledTime<12)
					$am_pm = "am";
				else
					$am_pm = 'pm';
					
				
				$output['ScheduledTime'] = $ScheduledTime[0].":".$ScheduledTime[1]."$am_pm";
				
				
				//getting exam names ends here
					
			}
			echo json_encode($output);
		}
		else
			echo "0";
		
		
			
	}

//getExam ends here		


//updateExamschedule starts here

	public function updateExamschedule()
	{
		$postdata = $this->striptags($_POST);
		extract($postdata);
		
		$cond = array();
		$table='examschedules';
		
		$cond['ExamSchedueId'] = $ExamSchedueId;
		
		$setdata = array();
		
		$setdata['Exam'] = $ExamName;
		$setdata['ClassName'] = $ClassName;
		$setdata['ClassSection'] = $ClassSection;
		
		$setdata['Subject'] = $Subject;
		
		$setdata['ScheduledTime'] = $examscheduletime;
		
		

		$examdata =date_create(str_replace("/","-",$ExamDate));
		$ExamDate = date_format($examdata,"Y-m-d"); 
		
		$setdata['ExamSchedule'] = $ExamDate;

		$chkmonth = explode("-",$ExamDate); 
		$chkmnth = (int)$chkmonth[1];
			
			if($chkmnth>5 && $chkmnth<=12)
				$academicYear= $chkmonth[0]."-".($chkmonth[0]+1);
			else
				$academicYear= ($chkmonth[0]-1)."-".($chkmonth[0]);
			
			$setdata['AcademicYear'] = $academicYear;
			
			$setdata['LastUpdated'] = time();
			
			if( $this->Commonmodel->updatedata($table,$setdata,$cond))
				echo "1";
			else
				echo "0";
			
	}

//updateExamschedule ends here			

//deleteexamschedule starts here
	
	public function deleteexamschedule()
	{
		$postdata = $this->striptags($_POST);
		extract($postdata);
		
		$cond = array();
		$table ='examschedules';
		
		$cond['ExamSchedueId']  = $schedid;

		if($this->Commonmodel->deleterow($table,$cond))
			echo "1";
		else
			echo "0";
			
		
	}

//deleteexamschedule ends here
					
}//class ends here		