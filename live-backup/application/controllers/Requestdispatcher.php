<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Requestdispatcher extends CI_Controller 
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
			
			
		if( strpos($requested_from, 'localhost') !== false || strpos($requested_from, '192.168.0.5') !== false ||  strpos($requested_from, 'adiakshara.in') !== false)
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
			
	public function getsections()
	{
			$postdata = $this->striptags($_POST);
			
			extract($postdata);
			
			
			$cond = array();
			$table ='sections'; 
			
			$cond['ClassSlno']  = $ClassSLNO;
			
			$sections_output = array();
			
			
			if( $this->Commonmodel->checkexists($table,$cond))
			{
				//now get the sections
				
				$sections = $this->Commonmodel->getrows($table,$cond,$order_by='',$order_by_field='',$limit='');
				
				foreach($sections->result() as $section)
				{
					$sections_output[$section->SectionId] = $section->Section;
				}
				echo json_encode($sections_output);
			}
			else	
				echo  "0";
			
			
			
	}
	
	//asignteacher starts here
	
	public function asignteacher()
	{
		extract($_POST);
		
		$Totalassignedsubjects = sizeof($assignedSubjects['0']['subject']);
		
		$insertdata = array();
		$table='classteachers';
		$inserted_cnt=0;
		
		//insert class teacher
		
		if($classteacher=='Yes')
		{
			$insertdata['TeacherId'] = $TeacherName;
			$insertdata['ClassSlno'] = $ClassSLNO;
			$insertdata['Section'] = $sections;
			$insertdata['Lastupdated'] = time();
			
			$this->Commonmodel->insertdata($table,$insertdata);
		}
		
		
		$insertdata = array();
		$table ='assignteachers';		
		
		for( $i=0; $i<$Totalassignedsubjects; $i++)
		{
			$insertdata['TeacherId'] = $TeacherName;
			$insertdata['ClassSlno'] = $ClassSLNO;
			$insertdata['Section'] = $sections;
			$insertdata['Subject'] = $assignedSubjects[0]['subject'][$i];
			$insertdata['Lastupdated'] = $TeacherName;
			
			if( $this->Commonmodel->insertdata($table,$insertdata) )
			{
					$inserted_cnt++;
					
			}
			
			if($inserted_cnt== $Totalassignedsubjects)
			{
				echo "1";
			}	
			
		}
		
		
	}
	
	
	
	//asignteacher ends here
	
	//update_asignteacher starts here
	
	public function update_asignteacher()
	{
		extract($_POST);
		
		$Totalassignedsubjects =  sizeof($assignedSubjects['0']['subject']);
		$table='classteachers';
		$cond = array();
		$cond['TeacherId'] = $TeacherName;
		
		if($classteacher=='Yes')
		{
			if( $this->Commonmodel->checkexists($table,$cond))
			{
				$setdata = array();
				$setdata['TeacherId'] = $TeacherName;
				$setdata['ClassSlno'] = $ClassSLNO;
				$setdata['Section'] = $sections;
				$setdata['Lastupdated'] = time();
				
				$this->Commonmodel->updatedata($table,$setdata,$cond);
			}
			else
			{
				$insertdata['TeacherId'] = $TeacherName;
				$insertdata['ClassSlno'] = $ClassSLNO;
				$insertdata['Section'] = $sections;
				$insertdata['Lastupdated'] = time();
				
				$this->Commonmodel->insertdata($table,$insertdata);
			}
		}
		else
		{
			if( $this->Commonmodel->checkexists($table,$cond))
			{
				$this->Commonmodel->deleterow($table,$cond);	
			}
		}
		
		
		$insertdata = array();
		$setdata = array();

		$cond = array();
		$cond['SLNO'] = $teacherassigned_id;
		
		
		$table ='assignteachers';
		
		$inserted_cnt=0;
		for( $i=0; $i<$Totalassignedsubjects; $i++)
		{
			if($i==0)
			{
				$setdata['TeacherId'] 	= $TeacherName;
				$setdata['ClassSlno']	= $ClassSLNO;
				$setdata['Section'] 	= $sections;
				$setdata['Subject']		= $assignedSubjects[0]['subject'][$i];
				$setdata['Lastupdated'] = time();
					
				if( $this->Commonmodel->updatedata($table,$setdata,$cond) )
					$inserted_cnt++;
				
			}
			else
			{
					
				$insertdata['TeacherId'] = $TeacherName;
				$insertdata['ClassSlno'] = $ClassSLNO;
				$insertdata['Section'] = $sections;
				$insertdata['Subject'] = $assignedSubjects[0]['subject'][$i];
				$insertdata['Lastupdated'] = time();
				
				if( $this->Commonmodel->insertdata($table,$insertdata) )
				{
					$inserted_cnt++;
				}
			}
			
		}//foreach ends here
		
		if($inserted_cnt==$Totalassignedsubjects)
			echo "1";
		else
			echo "hey".$inserted_cnt.":".$Totalassignedsubjects;
		
	}
	
	//update_asignteacher ends here

//password generator

public function passwordgenerator($len)
{
	$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()_-=+;:,.?";
	$password = substr( str_shuffle( $chars ), 0, $len );	
	return $password;
}

//addstudents starts here

	public function addstudents()
	{
		extract($_POST);
		
		$cond = array();
		$table ='students';		
		
		$cond['ClassName'] =  $ClassName;
		$cond['ClassSection'] = $Section;
		
		$rollexists = array();
		
		
		$cnt=0;
		foreach($students as $key=>$val)
		{
			$cnt++;
			
			$cond['Roll'] = $rolls[$key]['rollnumber'];
			
			if( $this->Commonmodel->checkexists($table,$cond))
			{
				$rollexists[] = $cnt;
			}
			
			
		}
		
		if(empty($rollexists))
		{
			
			

			//now add the data to the database
			$insertdata = array();
			$student_cnt=0;
			$total_stds = sizeof($students);
			
			foreach($students as $key=>$val)
			{
				$insertdata['Student']  = ucwords($students[$key]['student']);
				$insertdata['Roll']  = $rolls[$key]['rollnumber'];
				$insertdata['ClassName']  = $ClassName;
				$insertdata['ClassSection']  = $Section;
				$insertdata['AcademicYear']  = $AcademicYear;
				$insertdata['Lastupdated']  = time();
				
				$password = $this->passwordgenerator(6);	
				
				
				$insertdata['ParentPassword'] = md5($password);
				
				if( $this->Commonmodel->insertdata($table,$insertdata))
				{
					$student_cnt++;
				}
			}
			if( $total_stds == $student_cnt )
			{
				$outout_arr["rollexists"] = 'no';
				$outout_arr["inserted"] = 'yes';
			}
			echo json_encode($outout_arr);
			
		}
		else
		{
			$outout_arr = array("rollexists"=>"yes","exist_rolls"=>$rollexists);
			echo json_encode($outout_arr);
		}
		
		
		
	}
	
//addstudents ends here

// updatestudent starts here 
	
	public function updatestudent()
	{
		extract($_POST);
		
		$cond = array();
		$table ='students';		
		
		$cond['ClassName'] =  $ClassName;
		$cond['ClassSection'] = $Section;
		
		$rollexists = array();
		$setdata = array();
		
		
		$cnt=0;
		foreach($students as $key=>$val)
		{
			$cnt++;
			
			$cond['Roll'] = $rolls[$key]['rollnumber'];
			
			$get_studentid = $this->Commonmodel->getAfield($table,$cond,$field='StudentId',$order_by='',$order_by_field='',$limit='');
			
			
			//if( $this->Commonmodel->checkexists($table,$cond) )
			if( $get_studentid != $stdid )
			{
				$rollexists[] = $cnt;
			}
			
			
			if(empty($rollexists))
				{
					//now add the data to the database
					$insertdata = array();
					$student_cnt=0;
					$total_stds = sizeof($students);
					
					foreach($students as $key=>$val)
					{
						$setdata['Student']  = ucwords($students[$key]['student']);
						$setdata['Roll']  = $rolls[$key]['rollnumber'];
						$setdata['ClassName']  = $ClassName;
						$setdata['ClassSection']  = $Section;
						$setdata['AcademicYear']  = $AcademicYear;
						$setdata['Lastupdated']  = time();
						
						if( $this->Commonmodel->updatedata($table,$setdata,$cond))
						{
							$student_cnt++;
						}
					}
					if( $total_stds == $student_cnt )
					{
						$outout_arr["rollexists"] = 'no';
						$outout_arr["inserted"] = 'yes';
					}
					echo json_encode($outout_arr);
					
				}
			else
				{
					$outout_arr = array("rollexists"=>"yes","exist_rolls"=>$rollexists);
					echo json_encode($outout_arr);
				}
			
			
		}
		
	}	

//updatestudent ends here

// addsubjects starts here

	public function addsubjects()
	{
		extract($_POST);
		
		$table = 'subjects';
		
		$insertdata = array();
		
		$total_subjects = sizeof($subjects);
		$added_subjects = 0;
		$subject_exsts = array();
		$output_arr = array();
		
		$failedtoinsert = array();
		
		for($i=0;$i<$total_subjects;$i++)
		{
			$cond = array();
			$cond['SubjectName'] = ucwords(strtolower($subjects[$i]['subject']));
			
			if( $this->Commonmodel->checkexists($table,$cond))
			{
				$subject_exsts[]=$i;
			}
			else
			{
				$insertdata['SubjectName']	=	ucwords(strtolower($subjects[$i]['subject']));
				$insertdata['Lastupdate']	=	time();
				
				if( $this->Commonmodel->insertdata($table,$insertdata))
				{
					$added_subjects++;
				}
				else
				{
					$failedtoinsert[] = $i;
				}
			}
				
		}
		
		$output_arr['failedtoinsert']=$failedtoinsert;	
		
		$output_arr['subject_exsts']=$subject_exsts;
		
		if( empty($subject_exsts) )
				$output_arr['subectExists']="No";			
				
		else
			$output_arr['subectExists']="Yes";			
		
		echo json_encode($output_arr);
		
	}

//addsubjects ends here


	public function updatesubject()
	{
		extract($_POST);
		
		$cond = array();
		$table = 'subjects';	
		
		//$cond['SubjectId'] = $SubjectId;
		
		$cond['SubjectName'] =  ucwords(strtolower($SubjectName));

		$SubjectIde = $this->Commonmodel->getAfield($table,$cond,$field='SubjectId',$order_by='',$order_by_field='',$limit='');

		if($SubjectIde!='0')
		{
			if($SubjectId==$SubjectIde)
			{
				//echo $SubjectIde;
				$output_arr['subectExists']="No";
				$cond = array();
				
				$cond['SubjectId'] = $SubjectId;
				$setdata = array();
				
				$setdata['SubjectName'] =  ucwords(strtolower($SubjectName));
				$setdata['Lastupdate'] =  time();
				
				if( $this->Commonmodel->updatedata($table,$setdata,$cond)	)
				$output_arr['subectupdated']="Yes";
				else
				$output_arr['subectupdated']="no";
			}
			else
			{
				$output_arr['subectExists']="Yes";
			}
			
			
		}
		else
		{
		
			$output_arr['subectExists']="No";
			$cond = array();
			
			$cond['SubjectId'] = $SubjectId;
			$setdata = array();
			
			$setdata['SubjectName'] =  ucwords(strtolower($SubjectName));
			$setdata['Lastupdate'] =  time();
			
			if( $this->Commonmodel->updatedata($table,$setdata,$cond)	)
					$output_arr['subectupdated']="Yes";
			else
				$output_arr['subectupdated']="no";
		}
		
		echo json_encode( $output_arr );
		
		
	}
	
	public function assignsubjects()
	{
		extract($_POST);
		
		$insertdata = array();
		$table = 'assignedsubjects';
		
		$totalsubjects = sizeof($subjects);
		$succ_insert=0;
		
		for($i=0;$i<$totalsubjects;$i++)
		{
			$insertdata['ClassSlno'] 		= $ClassSlno;
			$insertdata['SubjectAssigned'] 	= $subjects[$i]['Subject'];
			$insertdata['Lastupdated'] 		= time();
			
			if( $this->Commonmodel->insertdata($table,$insertdata))
			$succ_insert++;
			
		}
		if($succ_insert==$totalsubjects)
			echo "1";
		else
			echo "0";
				
	}
	
	public function updateassignedsubjects()
	{
		extract($_POST)	;
		
		// get the subjects assigned to the class
		
		$cond = array();
		$table = 'assignedsubjects';
		$succ_insert=0;		
		$fields='SubjectAssigned';
		$updatingsubjcts = array();
		
		$cond['ClassSlno'] = $selectedclass;
		
		$sub_ids = $this->Commonmodel->getRows_fields($table,$cond,$fields,$order_by='',$order_by_field='',$limit='');
		if($sub_ids!='0')
		{
			$subject_ids = array();
			
			foreach($sub_ids->result() as $subj)
			{
				$subject_ids[] = $subj->SubjectAssigned;
			}
			
			$totalsubjects = sizeof($subjects);
			$succ_insert=0;
			
			for($i=0;$i<$totalsubjects;$i++)
			{
				$updatingsubjcts[] = $subjects[$i]['Subject'];
			}
			
			$deleted_subjects = array_diff($subject_ids,$updatingsubjcts);
			
			if( !empty($deleted_subjects))
			{
				$cond=array();
				$cond['ClassSlno'] = $selectedclass;
				foreach($deleted_subjects as $k=>$v)
				{
					$cond['SubjectAssigned'] = $v;
					$this->Commonmodel->deleterow($table,$cond);					
				}
					
			}
			
			$cond = array();
			
			$total_updating_subjects = sizeof($updatingsubjcts);
			
			foreach($updatingsubjcts as $k=>$v)
			{
					if(in_array($v,$subject_ids))
					{
						$setdata['Lastupdated'] 		= time();
						
						$cond['ClassSlno'] = $selectedclass;
						$cond['SubjectAssigned'] 	= $subjects[$k]['Subject'];
						
						if($this->Commonmodel->updatedata($table,$setdata,$cond))
						$succ_insert++;

					}
					else
					{
						$insertdata['ClassSlno'] 		= $selectedclass;
						$insertdata['SubjectAssigned'] 	= $subjects[$k]['Subject'];
						$insertdata['Lastupdated'] 		= time();
						
						if( $this->Commonmodel->insertdata($table,$insertdata))
						$succ_insert++;
					}
				
				if($total_updating_subjects==$succ_insert)
				echo "1";
			}
		}
		else
			echo "0";
		

		
	}

//getassignedsubjects starts here

	
	public function getassignedsubjects()
	{
		extract($_POST);
		
		$cond = array();
		$table = 'assignedsubjects';
		
		$fields='SubjectAssigned';
		
		$cond['ClassSlno'] = $ClassSLNO;
		
		$output_arr = array();
		
		$sub_ids = $this->Commonmodel->getRows_fields($table,$cond,$fields,$order_by='',$order_by_field='',$limit='');
		
		if($sub_ids!='0')
		{
			foreach($sub_ids->result() as $sub)
			{
				$cond = array();
				$table = 'subjects';
				
				$field='SubjectName';
				
				$cond['SubjectId'] = $sub->SubjectAssigned;
				$subject = $this->Commonmodel->getAfield($table,$cond,$field,$order_by='',$order_by_field='',$limit='');
				
				$output_arr[] = array(
										"SubjectId"=>$sub->SubjectAssigned,
										"Subject"=>$subject
										);
				
			}
			
			echo json_encode($output_arr);
		}
		else
			echo "0";
			
	}

//getassignedsubjects ends here

//deletenonteachingstaff starts here

	public function deletenonteachingstaff()
	{
		$postdata = $this->striptags($_POST);
		$postdata = extract($postdata);
		
		$cond=array();
		$table = 'staff';
		
		$cond['StaffId'] = $StaffId;
		
		if( $this->Commonmodel->deleterow($table,$cond))
			echo "1";
		else
			echo "0";
			
	}
//deletenonteachingstaffends here		


///getvendortitles

	public function getvendortitles()
	{
		$postdata = $this->striptags($_POST);
			
			extract($postdata);
			
			
			$postdata =  $this->striptags($_GET);
			$outputarr =array();
			
			$this->db->select('Title');
			$this->db->from('vendors');
			$this->db->like('Title',$postdata['term']);
			$qry = $this->db->get();
			
		if($qry!='0')
		{
			foreach($qry->result() as $data)
			{
				$outputarr[] = $data->Title;
			}
		}
		else
			$outputarr[] = "No data found";
		
		echo json_encode($outputarr);
	}	

//getvendortitles ends here

//getvendors starts here

	public function getvendors()
	{
			$postdata = $this->striptags($_POST);
			
			extract($postdata);
			
			
			$postdata =  $this->striptags($_GET);
			$outputarr =array();
			
			$this->db->select('CompanyName');
			$this->db->from('vendors');
			$this->db->like('CompanyName',$postdata['term']);
			$qry = $this->db->get();
			
		if($qry!='0')
		{
			foreach($qry->result() as $data)
			{
				$outputarr[] = $data->CompanyName;
			}
		}
		else
			$outputarr[] = "No data found";
		
		echo json_encode($outputarr);
			
			
	}

//getvendors ends here

//getvendorPerson starts here
	
	public function getvendorPerson()
	{
		$postdata = $this->striptags($_POST);
			
			extract($postdata);
			
			
			$postdata =  $this->striptags($_GET);
			$outputarr =array();
			
			$this->db->select('ContactPerson');
			$this->db->from('vendors');
			$this->db->like('ContactPerson',$postdata['term']);
			$qry = $this->db->get();
			
		if($qry!='0')
		{
			foreach($qry->result() as $data)
			{
				$outputarr[] = $data->ContactPerson;
			}
		}
		else
			$outputarr[] = "No data found";
		
		echo json_encode($outputarr);
	}


//getvendorPerson ends here

//make absent starts here

public function makeabsent()
{
//	print_r($_POST['absenteesList']);
	$cond = array();
	$table='studentattendance';
	
	$cond['ClassId'] 		= $_POST['ClassId'];
	$cond['SectionId'] 		= $_POST['SectionId'];
	$cond['AttendanceOn'] 	= date('Y-m-d');
	
	if( $this->Commonmodel->checkexists($table,$cond) )
	{
		echo "-1";
	}
	else
	{
		//get the student slno of the respective class and section
		
		$table = 'students';
		$cond = array();
		
		$cond['ClassName'] 		= $_POST['ClassId'];
		$cond['ClassSection'] 		= $_POST['SectionId'];
		
		$stdslnos = $this->Commonmodel->getRows_fields($table,$cond,$fields='StudentId',$order_by='ASC',$order_by_field='StudentId',$limit='');
		
		if( isset($_POST['absenteesList']) )
		{
			//echo "hey";
			
			$absenteesList = $_POST['absenteesList'];
			$cnt=0;
			$absentList = $_POST['absenteesList'];
			
			foreach( $stdslnos->result() as $stdId)
			{
				$insertdata = array();
				
				if( in_array($stdId->StudentId,$absentList ) )
				{
					$insertdata['PresentAbsent'] = 	"Absent";	
					$insertdata['StudentId'] 	 = $stdId->StudentId;
				}
				else
				{
					$insertdata['PresentAbsent'] = 	"Present";
					$insertdata['StudentId'] 	 = $stdId->StudentId;
				}
					
				$insertdata['ClassId'] 			 = $_POST['ClassId'];
				$insertdata['SectionId'] 		 = $_POST['SectionId'];
				
				
				$insertdata['AttendanceOn']		 = date('Y-m-d');
				$insertdata['LastUpdated'] 		 = time();
				
				$table = 'studentattendance';
				$this->Commonmodel->insertdata($table,$insertdata);
			$cnt++;			
			}
		
			
		}
		else
		{
			foreach( $stdslnos->result() as $stdId)
			{
				$insertdata = array();
				
				
				$insertdata['StudentId'] 	 = $stdId->StudentId;
					
				$insertdata['ClassId'] 			 = $_POST['ClassId'];
				$insertdata['SectionId'] 		 = $_POST['SectionId'];
				
				
				$insertdata['AttendanceOn']		 = date('Y-m-d');
				$insertdata['LastUpdated'] 		 = time();
				
				$table = 'studentattendance';
				
				$this->Commonmodel->insertdata($table,$insertdata);
			}
			
		}
			
			echo "1";
	}
	
	
}	

//mske absent ends here

		
}//class ends here		