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
			
			if($data['totalstudetns']!='0')
				$this->load->view('Admin/view-students',$data);
			else
			{
				$data['routeto'] = 'view-students';
				$data['pgeno'] = $this->uri->segment(2); 
				$requrl = str_replace("-"," ",$this->uri->segment(1));
				$data['viewingPage'] = $requrl;
				$this->load->view('Admin/pagenotfound',$data);
			}
										
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
	
	if($data['classes']=='0')
	{
		$data['routeto'] = 'add-class';
		$data['pgeno'] = $this->uri->segment(2); 
		$requrl = str_replace("-"," ",$this->uri->segment(1));
		$data['viewingPage'] = $requrl;
		$this->load->view('Admin/pagenotfound',$data);
	}
	else
	{
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
}
	
	$this->load->view(FOOTER);
	
}

public function viewattendance()
{

	$this->load->view(HEADER);
	
	//get the classes
	
	$data['classes'] = $this->Commonmodel->getrows($table='newclass',$cond=array(),$order_by='',$order_by_field='',$limit='');
	if($data['classes']=='0')
	{
		$data['routeto'] = 'add-class';
		$data['pgeno'] = $this->uri->segment(2); 
		$requrl = str_replace("-"," ",$this->uri->segment(1));
		$data['viewingPage'] = $requrl;
		$this->load->view('Admin/pagenotfound',$data);
	}
	else
	{
	
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
	}
	$this->load->view(FOOTER);
	
	
}

//viewstudentattendance starts here

public function viewstudentattendance()
{
	
	$this->load->view(HEADER);
	
	$data=array();
	
	$months=array("05"=>"May","06"=>"Jun","07"=>"Jul","08"=>"Aug","09"=>"Sep","10"=>"Oct","11"=>"Nov","12"=>"Dec","01"=>"Jan","02"=>"Feb","03"=>"Mar","04"=>"Apr");
	
	$data['month'] = "0";
	$data['Attendance_selected_Month']= 0;
	$data['Attendance_selected_Class'] = 0;
	$data['Attendance_selected_Section'] = 0;
	
	
	$data['classes'] = $this->Commonmodel->getrows($table='newclass',array(),$order_by='',$order_by_field='',$limit='');

/*
				$isert = "INSERT INTO `studentattendance` (`AttendanceId`, `ClassId`, `SectionId`, `StudentId`, `PresentAbsent`, `AttendanceOn`, `AcademicYear`, `LastUpdated`) VALUES ";
			
			$atend=array("Present","Absent");
			

			for($i=1;$i<=31;$i++)
			{
				
				for($j=0;$j<=3;$j++)
				{
					if($j==0)	
						$f1 = $atend[array_rand($atend)];
					else if ($j==1)	
						$f2 = $atend[array_rand($atend)];
					else if ($j==2)	
						$f3 = $atend[array_rand($atend)];	
					else if ($j==3)	
						$f4 = $atend[array_rand($atend)];
						
				}
				$m = '05';
				
				$excludeArray = array("7","14","21","28");
								
				if( in_array($i,$excludeArray) )
				{
					
				}
				else
				{
				$isert.= " (NULL, '1', '2', '4', '".$f1."', '2017-".$m."-".$i."', '2017-2018', '12345646'), (NULL, '1', '2', '5', '".$f2."', '2017-".$m."-".$i."', '2017-2018', '12345646'), (NULL, '1', '2', '6', '".$f3."', '2017-".$m."-".$i."', '2017-2018', '12345646'),(NULL, '1', '2', '7', '".$f4."', '2017-".$m."-".$i."', '2017-2018', '12345646'),";	
				}
		
			}
			echo rtrim($isert,','); exit;
*/
	$cond = array();
	$AcademicYear = $this->schedulinglib->getAcademicyear();
	
	
	$table='studentattendance as att';
	$baseurl='view-attendance';
	$perpage=15;
	$order_by_field='';
	$datastring='attendancelist';
	$pagination_string = 'pagination_string';
	
	
	if( $this->input->post('studentattendance_filter') )
	{
		$cond['att.AcademicYear'] = $AcademicYear;
		if( $this->input->post('Month')>0 )
		{
			$Attendance_selected_Month = $this->input->post('Month');
			$cond['MONTH(att.AttendanceOn)'] = $Attendance_selected_Month;
			$this->session->set_userdata('Attendance_selected_Month',$Attendance_selected_Month);
			$data['Attendance_selected_Month']= $Attendance_selected_Month;
			
			$data['SelectedMonth']  = $months[$Attendance_selected_Month];
		}
		
		if( $this->input->post('ClassName')>0)
		{
			$Attendance_selected_Class = $this->input->post('ClassName');
			$cond['att.ClassId'] = $Attendance_selected_Class;
			$this->session->set_userdata('Attendance_selected_Class',$Attendance_selected_Class);
			$data['Attendance_selected_Class']= $Attendance_selected_Class;
			
			$data['SelectedClass']  = $this->Commonmodel->getAfield('newclass',array("SLNO"=>$Attendance_selected_Class),'ClassName',$order_by='',$order_by_field='',$limit='');
			
			$data['relatedsections'] = $this->Commonmodel->getrows('sections',array("ClassSlno"=>$Attendance_selected_Class),$order_by='',$order_by_field='',$limit='');
			
		}
		
		if( $this->input->post('sections')>0 )
		{
			$Attendance_selected_Section = $this->input->post('sections');
			$cond['att.SectionId'] = $Attendance_selected_Section;
			$this->session->set_userdata('Attendance_selected_Section',$Attendance_selected_Section);
			$data['Attendance_selected_Section']= $Attendance_selected_Section;
			
			$data['SelectedSection']  = $this->Commonmodel->getAfield('sections',array("ClassSlno"=>$Attendance_selected_Class),'Section',$order_by='',$order_by_field='',$limit='');
			
			
			$data['relatedstudents'] = $this->Commonmodel->getrows('students',array("ClassName"=>$Attendance_selected_Class,"ClassSection"=>$Attendance_selected_Section,"AcademicYear"=>$AcademicYear),$order_by='',$order_by_field='',$limit='');
			
		}
		
		if( $this->input->post('Rollno')>0 )
		{
			$Attendance_selected_Rollno = $this->input->post('Rollno');
			$cond['att.StudentId'] = $Attendance_selected_Rollno;
			$this->session->set_userdata('Attendance_selected_Rollno',$Attendance_selected_Rollno);
			$data['Attendance_selected_Rollno']= $Attendance_selected_Rollno;
			
			$data['Selectedstudent']  = $this->Commonmodel->getAfield('students',array("AcademicYear"=>$AcademicYear,"ClassName"=>$Attendance_selected_Class,"ClassSection"=>$Attendance_selected_Section,"StudentId"=>$Attendance_selected_Rollno),'Student',$order_by='',$order_by_field='',$limit='');
		}
		
	}
	else
	{
		$cond['att.AcademicYear'] = $AcademicYear;
		$selected="0";
		if( $this->session->userdata('Attendance_selected_Month')>0 )
		{
			$Attendance_selected_Month = $this->session->userdata('Attendance_selected_Month');
			$cond['MONTH(att.AttendanceOn)'] = $Attendance_selected_Month;
			$this->session->set_userdata('Attendance_selected_Month',$Attendance_selected_Month);
			$data['Attendance_selected_Month']= $Attendance_selected_Month;
			$data['SelectedMonth']  = $months[$Attendance_selected_Month];
			$selected="1";
		}
		
		if( $this->session->userdata('Attendance_selected_Class')>0)
		{
			$Attendance_selected_Class = $this->session->userdata('Attendance_selected_Class');
			$cond['att.ClassId'] = $Attendance_selected_Class;
			$this->session->set_userdata('Attendance_selected_Class',$Attendance_selected_Class);
			$data['Attendance_selected_Class']= $Attendance_selected_Class;
			
			$data['SelectedClass']  = $this->Commonmodel->getAfield('newclass',array("SLNO"=>$Attendance_selected_Class),'ClassName',$order_by='',$order_by_field='',$limit='');
			$data['relatedsections'] = $this->Commonmodel->getrows('sections',array("ClassSlno"=>$Attendance_selected_Class),$order_by='',$order_by_field='',$limit='');
			$selected="1";
		}
		
		if( $this->session->userdata('Attendance_selected_Section')>0)
		{
			$Attendance_selected_Section = $this->session->userdata('Attendance_selected_Section');
			$cond['att.SectionId'] = $Attendance_selected_Section;
			$this->session->set_userdata('Attendance_selected_Section',$Attendance_selected_Section);
			$data['Attendance_selected_Section']= $Attendance_selected_Section;
			
			$data['SelectedSection']  = $this->Commonmodel->getAfield('sections',array("ClassSlno"=>$Attendance_selected_Class),'Section',$order_by='',$order_by_field='',$limit='');
			
			$data['relatedstudents'] = $this->Commonmodel->getrows('students',array("ClassName"=>$Attendance_selected_Class,"ClassSection"=>$Attendance_selected_Section,"AcademicYear"=>$AcademicYear),$order_by='',$order_by_field='',$limit='');
		}
		
		if( $this->session->userdata('Attendance_selected_Rollno')>0 )
		{
			$Attendance_selected_Rollno = $this->session->userdata('Attendance_selected_Rollno');
			$cond['att.StudentId'] = $Attendance_selected_Rollno;
			$this->session->set_userdata('Attendance_selected_Rollno',$Attendance_selected_Rollno);
			$data['Attendance_selected_Rollno']= $Attendance_selected_Rollno;
			
			$data['Selectedstudent']  = $this->Commonmodel->getAfield('students',array("AcademicYear"=>$AcademicYear,"ClassName"=>$Attendance_selected_Class,"ClassSection"=>$Attendance_selected_Section,"StudentId"=>$Attendance_selected_Rollno),'Student',$order_by='',$order_by_field='',$limit='');
		}
		
		if($selected=="0")
			$cond['att.AttendanceOn'] = date('Y-m-d');
		
	}
		
	
	$qery = $this->tsmpaginate->getstudentattendancelist($table,$cond,$baseurl,$perpage,$order_by_field='',$datastring,$pagination_string);
	
	if( $this->input->post('studentattendance_filter') )
	{
		
	}
	else
	{
		$cond['att.AttendanceOn'] = date('Y-m-d');
	}
				
if( $qery['attendancelist']!='0')
	{
		$data['perpage']= $perpage;
		$data['attendancelist'] = $qery['attendancelist'];
		$data['pagination_string'] = $qery['pagination_string'];
	}
else
	$data['attendancelist']	='0';
	
/*	echo "<pre>";
	print_r($data['pagination_string']);
	exit;
	*/
	$this->load->view("Admin/showStudentattendance",$data);

	$this->load->view(FOOTER);
}

//viewstudentattendance ends her


public function studentperformance()
{
	$this->load->view(HEADER);
	
	$data=array();
	$data['Exams'] = $this->Commonmodel->getrows($table='whichexam',array(),$order_by='',$order_by_field='',$limit='');
	$data['classes'] = $this->Commonmodel->getrows($table='newclass',array(),$order_by='',$order_by_field='',$limit='');
	
	$AcademicYear = $this->schedulinglib->getAcademicyear();
/*
		i have created a view called stdinfo with the resultset of the below query
		
		select `std`.`StudentId` AS `StudentId`,concat(`std`.`Student`,' ',`std`.`LastName`) AS `Student`,`cls`.`ClassName` AS `ClassName`,`cls`.`SLNO` AS `SLNO`,`sec`.`SectionId` AS `SectionId`,`sec`.`Section` AS `Section`,`std`.`AcademicYear` AS `AcademicYear` from ((`schoolappdbtesting`.`students` `std` join `schoolappdbtesting`.`newclass` `cls` on((`cls`.`SLNO` = `std`.`ClassName`))) join `schoolappdbtesting`.`sections` `sec` on((`sec`.`SectionId` = `std`.`ClassSection`))) order by `std`.`ClassName`,`std`.`ClassSection`,`std`.`Student`
	
	
	Also one more view called scheduleinfo with the resultset of the below query
	
	select `sch`.`ExamSchedueId` AS `ExamSchedueId`, sch.Exam as Examid,`sch`.`ClassName` AS `ClassName`,`sch`.`ClassSection` AS `ClassSection`,`sch`.`ExamSchedule` AS `ExamSchedule`,`sch`.`ScheduledTime` AS `ScheduledTime`,`exm`.`Exam` AS `Exam`,`sub`.`SubjectName` AS `SubjectName` from ((`schoolappdbtesting`.`examschedules` `sch` join `schoolappdbtesting`.`whichexam` `exm` on((`exm`.`ExamId` = `sch`.`Exam`))) join `schoolappdbtesting`.`subjects` `sub` on((`sub`.`SubjectId` = `sch`.`Subject`))) order by `sch`.`Exam`,`sch`.`ClassName`,`sch`.`ClassSection`,`sch`.`Subject`
	
	Also one more view studentexams with the result set of the below query
	
	select `std`.`Student` AS `Student`,`std`.`StudentId`,`std.`,`AcademicYear``std`.`ClassName` AS `ClassName`,`std`.`SLNO` AS `SLNO`,`std`.`Section` AS `Section`,`std`.`SectionId` AS `SectionId`,`sch`.`Exam` AS `Exam`,`sch`.`ExamSchedueId` AS `ExamSchedueId`,`sch`.`ExamId`,`sch`.`SubjectName` AS `SubjectName`,`sch`.`ExamSchedule` AS `ExamSchedule` from (`schoolappdbtesting`.`stdinfo` `std` join `schoolappdbtesting`.`scheduleinfo` `sch` on(((`sch`.`ClassName` = `std`.`SLNO`) and (`sch`.`ClassSection` = `std`.`SectionId`)))) 
	
*/
	
	$cond = array();
	$AcademicYear = $this->schedulinglib->getAcademicyear();
	
	
	$table='studentexams as std';
	$baseurl='students-performance';
	$perpage=15;
	$order_by_field='';
	$datastring='performancelist';
	$pagination_string = 'pagination_string';
	
	$cond['std.AcademicYear'] = $AcademicYear;
	
	if( $this->input->post('studentperformance_filter') ) 
	{

		if( $this->input->post('Exam')>0)
		{
			$performance_selected_Xam = $this->input->post('Exam');
			$cond['std.ExamId'] = $performance_selected_Xam;
			$this->session->set_userdata('performance_selected_Xam',$performance_selected_Xam);
			$data['performance_selected_Xam']= $performance_selected_Xam;
			
			$data['SelectedXam']  = $this->Commonmodel->getAfield('whichexam',array("ExamId"=>$performance_selected_Xam),'Exam',$order_by='',$order_by_field='',$limit='');
			
			
		}
		
		if( $this->input->post('ClassName')>0)
		{
			$performance_selected_Class = $this->input->post('ClassName');
			$cond['std.SLNO'] = $performance_selected_Class;
			$this->session->set_userdata('performance_selected_Class',$performance_selected_Class);
			$data['performance_selected_Class']= $performance_selected_Class;
			
			$data['SelectedClass']  = $this->Commonmodel->getAfield('newclass',array("SLNO"=>$performance_selected_Class),'ClassName',$order_by='',$order_by_field='',$limit='');
			
			$data['relatedsections'] = $this->Commonmodel->getrows('sections',array("ClassSlno"=>$performance_selected_Class),$order_by='',$order_by_field='',$limit='');
			
		}
		
		if( $this->input->post('sections')>0 )
		{
			$performance_selected_Section = $this->input->post('sections');
			$cond['std.SectionId'] = $performance_selected_Section;
			$this->session->set_userdata('performance_selected_Section',$performance_selected_Section);
			$data['performance_selected_Section']= $performance_selected_Section;
			
			$data['SelectedSection']  = $this->Commonmodel->getAfield('sections',array("ClassSlno"=>$performance_selected_Class),'Section',$order_by='',$order_by_field='',$limit='');
			
			
			$data['relatedstudents'] = $this->Commonmodel->getrows('students',array("ClassName"=>$performance_selected_Class,"ClassSection"=>$performance_selected_Section,"AcademicYear"=>$AcademicYear),$order_by='',$order_by_field='',$limit='');
			
		}
		
		if( $this->input->post('Rollno')>0 )
		{
			$performance_selected_Rollno = $this->input->post('Rollno');
			$cond['std.StudentId'] = $performance_selected_Rollno;
			$this->session->set_userdata('performance_selected_Rollno',$performance_selected_Rollno);
			$data['performance_selected_Rollno']= $performance_selected_Rollno;
			
			$data['Selectedstudent']  = $this->Commonmodel->getAfield('students',array("AcademicYear"=>$AcademicYear,"ClassName"=>$performance_selected_Class,"ClassSection"=>$performance_selected_Section,"StudentId"=>$performance_selected_Rollno),'Student',$order_by='',$order_by_field='',$limit='');
		}
		
	
	}
	else
	{
		
	}

	$qrey = $this->tsmpaginate->getstudentperformance($table,$cond,$baseurl,$perpage,$order_by_field='',$datastring,$pagination_string);

	 
	 if( $qrey['performancelist']!='0')
	{
		$data['perpage']= $perpage;
		$data['performancelist'] = $qrey['performancelist'];
		$data['pagination_string'] = $qrey['pagination_string'];
	}
else
	$data['attendancelist']	='0';


	$this->load->view("Admin/studentperformance",$data);

	$this->load->view(FOOTER);


/*
The following SMTP error was encountered: 111 Connection refused
Unable to send data: AUTH LOGIN
Failed to send AUTH LOGIN command. Error: 
Unable to send data: MAIL FROM:
*/
	
}



//clearfilters starts here

public function clearfilters()
{
	extract($_POST);
	//Attendance_selected_Month,Attendance_selected_Class,Attendance_selected_Section,Attendance_selected_Rollno
	if( trim($clearfilter)=="Attendance_selected_Month" )	
	{
		$this->session->set_userdata('Attendance_selected_Month','0');
		
		if( $this->session->userdata('Attendance_selected_Month')=='0')
			echo "1";
		else 
			echo "0";
			
	}
	
	if( trim($clearfilter)=="Attendance_selected_Class" )	
	{
		$this->session->set_userdata('Attendance_selected_Class','0');
		$this->session->set_userdata('Attendance_selected_Section','0');
		$this->session->set_userdata('Attendance_selected_Rollno','0');
		
		echo "1";
	}
	
	if( trim($clearfilter)=="Attendance_selected_Section" )	
	{
	
		$this->session->set_userdata('Attendance_selected_Section','0');
		$this->session->set_userdata('Attendance_selected_Rollno','0');
		
		echo "1";
	}
	
	if( trim($clearfilter)=="Attendance_selected_Rollno" )	
	{
	
		$this->session->set_userdata('Attendance_selected_Rollno','0');
		echo "1";
	}
	
}

//clearfilters ends here	






}//class ends here
