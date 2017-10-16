<?PHP

defined('BASEPATH') OR exit('No direct script access allowed');

class Teacher extends CI_Controller 
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
	
	
	public function manageprofile()
	{
		
		$this->load->view(HEADER);
		
		//get the teacher details
		
		$this->db->select('TeacherId, TeacherName');
		$this->db->from("teacher");
		$this->db->order_by('TeacherName',"ASC");
		$teachers = $this->db->get();
		
		$data['Teachers'] = $teachers;
		$data['TeacherName'] = 'TeacherName';
		$data['Selectedteacher'] = 0;
		
		
		if( $this->input->post('SumitPic'))
		{
					extract($_POST);
		
		if( trim($teacher)>0 )
		{
			$data['Selectedteacher'] = $this->input->post('teacher');
			
				if( is_uploaded_file( $_FILES['TeacherPic']['tmp_name'] ) )
				{
				
				$size =  $_FILES['TeacherPic']['size'];
				$allowedSize = 1024*1024*2;
				
				
				$type =  $_FILES['TeacherPic']['type'];			
				
				if( $size<= $allowedSize)
				{
					if( $type=="image/jpeg" ||  $type=="image/png" )
					{
						
						$publicfolder = $this->config->item('publicfolder');
						
						//get the teacher login id
						
						$this->db->select('TeacherName');
						$this->db->from('teacher');
						$this->db->where('TeacherId',$teacher);
						$TeacherName = $this->db->get()->row('TeacherName');
						
						
						$teacherDir = $_SERVER['DOCUMENT_ROOT']."/".$publicfolder."/"."resources/teachers-profile-pics/".$TeacherName;
						
						if( !is_dir($teacherDir) )
								mkdir("resources/teachers-profile-pics/".$TeacherName);
						
						$picpath = "resources/teachers-profile-pics/".$TeacherName."/".time().$_FILES['TeacherPic']['name'];
						
						$docroot = $_SERVER['DOCUMENT_ROOT']."/".$publicfolder."/".$picpath;
						
						if( move_uploaded_file($_FILES['TeacherPic']['tmp_name'],$docroot) )
						{
							$msg = "<div class='alert alert-success picupdated'>Profile pic uploaded successfully</div>";
							
							
							//check whether teacher has profile pic already or not
							
							$this->db->select('ProfilePic');
							$this->db->from('TeacherPersonalDetails');
							$this->db->where('TeacherId',$teacher);
							$qry = $this->db->get();
							
#							echo $this->db->last_query().":".$qry->num_rows(); exit; 
							if($qry->num_rows()>0)
							{
								foreach( $qry->result() as $pic )
								{
									$ProfilePic = trim($pic->ProfilePic);
								}
							}
							else
								$ProfilePic = "Record Not Found";
						
						 if( $ProfilePic == '' || $ProfilePic != 'Record Not Found' )
						{
							
							$setdata = array();
							
							$table = "TeacherPersonalDetails";	
							
							$setdata['ProfilePic'] = $picpath;
							$setdata['LastUpdated'] = time();
							
							$cond = array();
							$cond['TeacherId'] = $teacher;
							
							if( $this->Commonmodel->updatedata($table,$setdata,$cond))
							{
								$prevpic =  $_SERVER['DOCUMENT_ROOT']."/".$publicfolder."/".$ProfilePic;
								unlink(@$prevpic);
							
								$data['ProfileImgMsg'] = $msg;
								$data['UploadedProfilePic'] = $picpath;
								$data['TeacherName'] =  $TeacherName;	
							}
							else
							{
								$prevpic = $docroot = $_SERVER['DOCUMENT_ROOT']."/".$publicfolder."/".$TeacherName.$picpath;
								unlink($prevpic);
								
								$msg = "<div class='alert alert-danger picupdated'>Unable to add profile pic contact admin</div>";
								
								$data['ProfileImgMsg'] = $msg;
								$data['UploadedProfilePic'] = $picpath;
								$data['TeacherName'] =  $TeacherName;	
							}
							
						}
						else if( $ProfilePic=="Record Not Found")
						{
							
							$insertdata = array();
							
							$table = "TeacherPersonalDetails";	
							
							$insertdata['TeacherId'] = $teacher;
							$insertdata['ProfilePic'] = $picpath;
							
							if( $this->Commonmodel->insertdata($table,$insertdata))
							{
								$data['ProfileImgMsg'] = $msg;
								$data['UploadedProfilePic'] = $picpath;
								$data['TeacherName'] =  $TeacherName;	
							}
							else
							{
								$prevpic = $docroot = $_SERVER['DOCUMENT_ROOT']."/".$publicfolder."/".$TeacherName.$picpath;
								unlink($prevpic);
								
								$msg = "<div class='alert alert-danger picupdated'>Unable to add profile pic contact admin</div>";
								
								$data['ProfileImgMsg'] = $msg;
								$data['UploadedProfilePic'] = $picpath;
								$data['TeacherName'] =  $TeacherName;	
							}
						
						}
							
						}
						else
						{
							$msg = "<div class='alert alert-danger picupdated'>Unable to upload profile pic</div>";
							$data['ProfileImgMsg'] = $msg;
						}
						
					}
					else
					{
						$msg = "<div class='alert alert-danger picupdated'>Only Jpeg and png are allowed</div>";
						$data['ProfileImgMsg'] = $msg;
					}
				}
				else
				{
					$msg = "<div class='alert alert-danger picupdated'>Please Select Profile Image below 2MB</div>";
					$data['ProfileImgMsg'] = $msg;
				}
			}
				else
				{	
					$msg = "<div class='alert alert-danger picupdated'>Please Select Profile Image</div>";
					$data['ProfileImgMsg'] = $msg;
				}
			}
			else
			{
				$msg = "<div class='alert alert-danger picupdated'>Please Select Teacher</div>";
				$data['ProfileImgMsg'] = $msg;	
			}
			
			$this->load->view('Teacher/manageprofile',$data);
		}
		else	
			$this->load->view('Teacher/manageprofile',$data);
		$this->load->view(FOOTER);
	
	}
	
	
	
		// addattandance starts here
	
		public function addattandance()
		{
			$this->load->view(HEADER);
			
			//get the teacher list with contact details
			
			$teachers = $this->Commonmodel->getteacherforattandance();

			if($teachers!='0')
				$data['teachers'] = $teachers;
			else
				$data['teachers'] = '0';
				
			$this->load->view('Teacher/addattandance',$data);
			$this->load->view(FOOTER);		
		}
	
	
	//addattandance ends here
	
		// allocatemarks starts here
	
	public function allocatemarks()
	{
			$this->load->view(HEADER);
			
			$data['classes'] = $this->Commonmodel->getrows($table='newclass',$cond=array(),$order_by='',$order_by_field='',$limit='');
			$data['exams']   = $this->Commonmodel->getrows($table='whichexam',$cond=array(),$order_by='',$order_by_field='',$limit=''); 
			$this->load->view('Teacher/allocatemarks',$data);	
			$this->load->view(FOOTER);	
	}
	
	//allocatemarks ends here
	
	
	//viewmarks starts here
	
	public function viewmarks()
	{
	
		
		/*
		
				$this->session->set_userdata('section_marksfilter','0');
				$this->session->set_userdata('class_marksfilter','0');
				$this->session->set_userdata('class_subjectfilter','0');
				$this->session->set_userdata('class_examfilter','0');
		*/
		
		
		$this->load->view(HEADER);
			
			
			
			$cond = array();
			$data = array();
			$data['classes'] = $this->Commonmodel->getrows($table='newclass',$cond=array(),$order_by='',$order_by_field='',$limit='');
				$data['exams']   = $this->Commonmodel->getrows($table='whichexam',$cond=array(),$order_by='',$order_by_field='',$limit=''); 
			
			$data['SelectedClass'] = 0;
			$data['SelectedSection'] = 0;
			
			$data['classwisesubjects'] = 0;
			$data['ClasswiseSections'] = 0;
			
			$data['SelectedSubject'] = 0;
			$data['SelectedExam'] = 0;
			$data['Examname']=0;
			
			
			
			if( $this->input->post('viewmarksfilter') )
			{
				
				if( $this->input->post('ClassName')>0 )
				{
					$class_marksfilter = $this->input->post('ClassName');
					$cond['alloc.ClassId'] = $class_marksfilter;
					$this->session->set_userdata('class_marksfilter',$class_marksfilter);
					
				}
				
				if( $this->input->post('Section')>0 )
				{
					$section_marksfilter = $this->input->post('Section');
					$cond['alloc.SectionId'] = $section_marksfilter;
					$this->session->set_userdata('section_marksfilter',$section_marksfilter);
				}
				
				if( $this->input->post('Subject')>0 )
				{
					$Subject_marksfilter = $this->input->post('Subject');
					$cond['alloc.SubjectId'] = $Subject_marksfilter;
					$this->session->set_userdata('Subject_marksfilter',$Subject_marksfilter);
				}
				
				if( $this->input->post('Exam')>0 )
					{
						$Exam_marksfilter = $this->input->post('Exam');
						$cond['alloc.ExamId'] = $Exam_marksfilter;
						$this->session->set_userdata('Exam_marksfilter',$Exam_marksfilter);
					}
			}
			
			else
				{
					if( $this->session->userdata('class_marksfilter')>0 )	
					{
							$class_marksfilter = $this->session->userdata('class_marksfilter');
							$cond['alloc.ClassId'] = $class_marksfilter;
							$this->session->set_userdata('class_marksfilter',$class_marksfilter);
					}
					
					if( $this->session->userdata('section_marksfilter')>0 )	
					{
							$section_marksfilter = $this->session->userdata('section_marksfilter');
							$cond['alloc.SectionId'] = $section_marksfilter;
							$this->session->set_userdata('section_marksfilter',$section_marksfilter);
					}
					
					if( $this->session->userdata('Subject_marksfilter')>0 )	
					{
							$Subject_marksfilter = $this->session->userdata('Subject_marksfilter');
							$cond['alloc.SubjectId'] = $Subject_marksfilter;
							$this->session->set_userdata('Subject_marksfilter',$Subject_marksfilter);
					}
					
					if( $this->session->userdata('Exam_marksfilter')>0 )
					{
						$Exam_marksfilter = $this->session->userdata('Exam_marksfilter');
						$cond['alloc.ExamId'] = $Exam_marksfilter;
						$this->session->set_userdata('Exam_marksfilter',$Exam_marksfilter);
					}
					
					
				}
				
				if( isset( $class_marksfilter) )
				{
					$data['SelectedClass'] = $class_marksfilter;
					$conde = array();
					$data['ClasswiseSections'] = $this->Commonmodel->getrows($t1='sections',$conde=array('ClassSlno'=>$class_marksfilter),$order_by='',$order_by_field='',$limit='');		
					$conde = array();				
					$data['ClassName'] =  $this->Commonmodel->getAfield($t2='newclass',$conde=array("SLNO"=>$class_marksfilter),$field='ClassName',$order_by='',$order_by_field='',$limit='');
					
					$conde = array();
					$conde=array('asgn.ClassSlno'=>$class_marksfilter);
					
					$qrey = $this->Commonmodel->twotablejoin($tab1='assignedsubjects as asgn',$tab2='subjects as sub',$fetchingfields='sub.SubjectName, sub.SubjectId',$joinedOn="sub.SubjectId=asgn.SubjectAssigned",$joinType='inner',$conde,$limit='',$start='',$order_by_field='',$order_by='');
					
					if( $qrey->num_rows()>0)
						$data['classwisesubjects'] = $qrey;
					
				}
				
				if( isset($section_marksfilter ) )
				{
					$data['SelectedSection'] = $section_marksfilter;
					$conde = array();
					$data['SectionName'] =  $this->Commonmodel->getAfield($tab='sections',$conde=array("SectionId"=>$section_marksfilter),$field='Section',$order_by='',$order_by_field='',$limit='');
					
				}
			
			if( isset( $Subject_marksfilter ) )
			{
				$data['SelectedSubject'] = $Subject_marksfilter;
				$conde = array();
				$data['SubjectName'] =  $this->Commonmodel->getAfield($tab='subjects',$conde=array("SubjectId"=>$Subject_marksfilter),$field='SubjectName',$order_by='',$order_by_field='',$limit='');
			}
			
			
			if( isset( $Exam_marksfilter ) )
			{
				$data['SelectedExam'] = $Exam_marksfilter;
				$conde = array();
				$data['ExamName'] =  $this->Commonmodel->getAfield($tab='whichexam',$conde=array("ExamId"=>$Exam_marksfilter),$field='Exam',$order_by='',$order_by_field='',$limit='');
			}
			

			$table='allocatedmarks as alloc';
			$baseurl='view-marks';
			$perpage=10;
			$order_by_field='alloc.AllocatedId';
			$datastring='markslist';
			$pagination_string = 'pagination_string';
		
			$qery = $this->tsmpaginate->getmarkslist($table,$cond,$baseurl,$perpage,$order_by_field='',$datastring,$pagination_string);
		
		#echo $qery['markslist']; exit;
		
			if( $qery['markslist']!='0')
			{
				$data['perpage']= $perpage;
				$data['markslist'] = $qery['markslist'];
				$data['pagination_string'] = $qery['pagination_string'];
				$this->load->view('Teacher/viewmarks',$data);
			}
			else
			{
				/*
				echo "<pre>";
				print_r($this->session);
				exit;
				*/
				
				
				$this->session->set_userdata('class_marksfilter','0');
				$this->session->set_userdata('section_marksfilter','0');
				$this->session->set_userdata('Subject_marksfilter','0');
				$this->session->set_userdata('Exam_marksfilter','0');
				
				if( $this->uri->segment(2)==0 || $this->uri->segment(2)=="")
					$data['routeto'] = 'allocate-marks';
				else
					$data['routeto'] = 'view-marks';
				$this->load->view('Admin/pagenotfound',$data);
			}	
				
			$this->load->view(FOOTER);	
	}
	
	//viewmarks ends here
	
	
	public function editallocatedmarks()
	{
			
			$this->load->view(HEADER);	
			
			$data['classes'] = $this->Commonmodel->getrows($table='newclass',$cond=array(),$order_by='',$order_by_field='',$limit='');
			$data['exams']   = $this->Commonmodel->getrows($table='whichexam',$cond=array(),$order_by='',$order_by_field='',$limit=''); 
			
			$AllocatedId = $this->uri->segment(2);
			
			$SelectedClass = 0;
			$SelectedSection = 0;
			
			$SelectedStudent = 0;
			$SelectedTeacher = 0;
			
			$SelectedSubject = 0;
			$SelectedExam = 0;
			
			$cond = array();
			$table = "allocatedmarks";
			$cond['AllocatedId'] = $AllocatedId;
			
			$details = $this->Commonmodel->getrows($table,$cond,$order_by='',$order_by_field='',$limit='');
			
			if($details!='0')
			{
				
				foreach($details->result() as $detail)
				{
					$data['SelectedClass'] = $detail->ClassId;
					$data['SelectedSection'] = $detail->SectionId;
					
					$data['SelectedStudent'] = $detail->Student;
					$data['SelectedTeacher'] = $detail->TeacherId;
					
					$data['SelectedSubject'] = $detail->SubjectId;
					$data['SelectedExam'] = $detail->ExamId;
					
					$data['TotalMarks'] = $detail->TotalMarks;
					$data['SecuredMarks'] = $detail->SecuredMarks;
				}
				
				
				//get the section for the class
				
				$data['Sections']  = $this->Commonmodel->getRows_fields('sections',array("ClassSlno"=>$data['SelectedClass']),$fields='Section,SectionId',$order_by,$order_by_field,$limit);
				
				//get students of the class and section
				$data['StudentName']  = $this->Commonmodel->getAfieldWithalias('students',array("StudentId"=>$data['SelectedStudent']),$field='concat(Student," ",LastName)',$Alias='StudentName',$order_by='',$order_by_field='',$limit='');
				
				//teachert name
				$data['TeacherName']  = $this->Commonmodel->getAfieldWithalias('teacher',array("TeacherId"=>$data['SelectedTeacher']),$field='TeacherName',$Alias='Teacher',$order_by='',$order_by_field='',$limit='');
				
				//get the subjects

$data['Subjects'] = $this->Commonmodel->twotablejoin('assignedsubjects as assign','subjects as sub','sub.SubjectName, sub.SubjectId',$joinedOn='sub.SubjectId=assign.SubjectAssigned',$joinType='inner',array("assign.ClassSlno"=>$data['SelectedClass']),$limit='',$start='',$order_by_field='',$order_by='');

				
				
				$this->load->view('Teacher/edit-allocatemarks',$data);
			}
			else
			{
				$data['routeto'] = 'view-marks';
				$this->load->view('Admin/pagenotfound',$data);
			}
			
			
			
			
			
			
			
			$this->load->view(FOOTER);
	}
	
	
	
	//get teacher details starts here
	
	public function TeacherDetails()
	{
		extract($_POST);
		
		$cond = array();
		
		if( $whichdata=="Personal" )
		{
			$table = "teacher";
			
			$cond['TeacherId']  = $TeacherId;
				
			$field='TeacherName';
			
			$TeacherName = $this->Commonmodel->getAfield($table,$cond,$field,$order_by='',$order_by_field='',$limit='');
		
			$cond = array();
			
			
			$table = "teacherpersonaldetails";
			
			$cond['TeacherId']  = $TeacherId;
			
			
			
			$personalData = $this->Commonmodel->get_single_row($table,$cond,$order_by='',$order_by_field='',$limit='');
			
			$output = array();
			
			
			if( $personalData!='0' )
			{
				foreach( $personalData->result() as $data)
				{
					$dob = $data->DOB;
					$dob = trim($dob);
					
					if($dob=="0000-00-00")
						$dob='';
					else
						{
							$dob = date_create($dob);
							$dob = date_format($dob,"d-m-Y");
								
						}
					
					$doa = $data->DOA;
					
					if($doa=="0000-00-00")
						$doa='';
					else
						{
							$doa = date_create($doa);
							$doa = date_format($doa,"d-m-Y");
								
						}
					
					
					
					$output = array(
									"SurName"=>$data->SurName,
									"LastName"=>$data->LastName,
									"MaritialStatus"=>$data->MaritialStatus,
									"Spouse"=>$data->Spouse,
									"Spouse"=>$data->Spouse,
									"DOB"=>$dob,
									"DOA"=>$doa,
									"ProfilePic"=>$data->ProfilePic,
									"TeacherName"=>$TeacherName
										
									);
				}
				echo json_encode($output);
			}
			else
				echo "0";
				
				
				
				
		}
		elseif( $whichdata=="Contact" )
			{
				$table = "teachercontactdetails";
				extract($_POST);
				
				$cond = array();
				$table ='teachercontactdetails';
				$cond['TeacherId'] = $TeacherId;
				
				$communicationDetails = $this->Commonmodel->get_single_row($table,$cond,$order_by='',$order_by_field='',$limit='');
				if( $communicationDetails!='0' )
				{
					$output=array();
					foreach( $communicationDetails->result() as $info )
					{
						$output= array(
											"ContactNumber"=>$info->ContactNumber,
											"AlternateNumber"=>$info->AlternateNumber	,
											"Email"=>$info->Email,
											"Landmark"=>$info->Landmark,
											"Address"=>$info->Address,
										);

						echo json_encode($output);
					}
				}
				else
					echo "0";
					
				
			}
		elseif( $whichdata=="AssignedClasses" )
			{
				extract($_POST);
				
				$cond['assign.TeacherId'] = $TeacherId;
				$qry = $this->Commonmodel->assignedteacherPaginateion($cond,$order_by='',$order_by_field='',$limit='',$start='' );
				
				
				
				
				if($qry!='0')
				{
					$output=array();
					$cnt=0;
					foreach($qry->result() as $data )
					{
						$cnt++;
						$output[] = array(
											"SerialNo"=>$cnt,
											"SLNO"=>$data->SLNO,
											"ClassName"=>$data->ClassName,
											"Section"=>$data->Section,
											"Subject"=>$data->Subject,
											"TeacherName"=>$data->TeacherName
										);
					}
					echo json_encode($output);
				}
				else
					echo "0";
				
			}
			
			
		
	}
	
	//get teacher details ends here
	
	
	//update  details starts here
	
	public function updateDetails()
	{
		
		extract($_POST);
		$cond = array();
	$cond['TeacherId'] = $selectTeacher;
				
		if($whichdata=="Personal")
				$table = 'teacherpersonaldetails';	
		
		else if($whichdata=="Contact")
				$table = 'teachercontactdetails';	
		
			$res_set = $this->Commonmodel->checkexists($table,$cond);
		
		
		
		if( $res_set!='0' )
		{
			if($whichdata=="Personal")
			{
				
			
			
			if( $DOA!='')
			{
				$DOA = date_create($DOA);
				$DOA = date_format($DOA,"Y-m-d");
			}
			if( $DOB!='')
			{
				$DOB = date_create($DOB);
				$DOB = date_format($DOB,"Y-m-d");
				
			}
			
			$setdata = array();
			
			$setdata['SurName'] = $surname;
			$setdata['LastName'] = $lastname;
			
			$setdata['MaritialStatus'] = $MaritialStatus;
			$setdata['Spouse'] = $Spouse;
			
			$setdata['DOB'] = $DOB;
			$setdata['DOA'] = $DOA;
			$setdata['TeacherId'] = $selectTeacher;
			
			$setdata['LastUpdated'] = time();
			
			if( $this->Commonmodel->updatedata($table,$setdata,$cond) )
				echo "1";
			else
				echo "0";
		
		
			}
			
			
			else if($whichdata=="Contact")
			{
				$setdata = array();
				$table = 'teachercontactdetails';
				

				$setdata['ContactNumber'] = $contactnumber;
				
				$setdata['AlternateNumber'] = $alternatenumber;
				$setdata['Email'] = $email;
				
				$setdata['Landmark'] = $landmark;
				$setdata['Address'] = $address;
				
				$setdata['Lastupdated'] = time();
				$setdata['LastupdatedOn'] = date('Y-m-d H:i:s');
				
				$cond=array();
				
				$cond['TeacherId'] = $selectTeacher;
				
				if( $this->Commonmodel->updatedata($table,$setdata,$cond))
					echo "1";
				else
					echo "0";
				
			}

		}
		else
		{
			if($whichdata=="Personal")
			{
				
				
			$insertdata = array();
			
			if( $DOA!='')
			{
				$DOA = date_create($DOA);
				$DOA = date_format($DOA,"Y-m-d");
			}
			if( $DOB!='')
			{
				$DOB = date_create($DOB);
				$DOB = date_format($DOB,"Y-m-d");
				
			}
			
			$insertdata['SurName'] = $surname;
			$insertdata['LastName'] = $lastname;
			
			$insertdata['MaritialStatus'] = $MaritialStatus;
			$insertdata['Spouse'] = $Spouse;
			
			$insertdata['DOB'] = $DOB;
			$insertdata['DOA'] = $DOA;
			$insertdata['TeacherId'] = $selectTeacher;
			
			$insertdata['LastUpdated'] = time();	
			
			if( $this->Commonmodel->insertdata($table,$insertdata) )
				echo "1";
			else
				echo "0";
			
			
			}
			
			else if($whichdata=="Contact")
			{
				
				
				$insertdata = array();
				$table = 'teachercontactdetails';
				
				$insertdata['TeacherId'] = $selectTeacher;
				$insertdata['ContactNumber'] = $contactnumber;
				
				$insertdata['AlternateNumber'] = $alternatenumber;
				$insertdata['Email'] = $email;
				
				$insertdata['Landmark'] = $landmark;
				$insertdata['Address'] = $address;
				
				$insertdata['Lastupdated'] = time();
				$insertdata['LastupdatedOn'] = date('Y-m-d H:i:s');
				
				if( $this->Commonmodel->insertdata($table,$insertdata))
					echo "1";
				else
					echo "0";
				
			
			}
		}
	}
	
	// update details ends here	
	
	//takeattendance starts here
	
	public function takeattendance()
	{
		
		
		extract($_POST);
		$AcademicYear = $this->schedulinglib->getAcademicyear();
		$AttendanceFor = date('Y-m-d');
		$TeacherId = $teacherid;
		$Present =$PresentAbsent;
		$LastUpdated=time();
		
		$table ='teacherattendance';
		
		if($individual=="yes")
		{
			$setdata = array();
			
			$setdata['Present'] = $Present;
			$setdata['LastUpdated'] = $LastUpdated;
			
			$cond = array();
			
			$cond['TeacherId'] = $TeacherId;
			$cond['AttendanceFor'] = $AttendanceFor;
			$cond['AcademicYear'] = $AcademicYear;
			
			if( $this->Commonmodel->updatedata($table,$setdata,$cond))
				echo "1";
			else
				echo "0";
		
		}
		else
		{
			$insertdata = array();
			
			$cond=array();
			$cond['AttendanceFor'] = $AttendanceFor;
			$cond['AcademicYear'] = $AcademicYear;
			
			if( $this->Commonmodel->checkexists($table,$cond)  )
				{
					echo "0";
				}
			else
				{
					foreach( $TeacherId as $val)
					{
						
						$insertdata['AttendanceFor'] = $AttendanceFor;
						$insertdata['AcademicYear'] = $AcademicYear;
						
						$insertdata['TeacherId'] = $val['teacher'];
						$insertdata['Present'] = $Present;
						
						$insertdata['LastUpdated'] = $LastUpdated;
						
						$this->Commonmodel->insertdata($table,$insertdata);
						
						
					}		
				}
			
			
			
			
		}
			
	
	}
	
	//takeattendance ends here

	
	//getTeacherattandance starts here
	
	public function getTeacherattandance()
	{
			
		$AcademicYear = $this->schedulinglib->getAcademicyear();
		$cond=array();
		$table ='teacherattendance';
		$AttendanceFor = date('Y-m-d');	
		
			
			$cond['AttendanceFor'] = $AttendanceFor;
			$cond['AcademicYear'] = $AcademicYear;
			
			$attendancedetails = $this->Commonmodel->getRows_fields($table,$cond,$fields='TeacherId,Present',$order_by='',$order_by_field='',$limit='');
			if($attendancedetails!='0')
			{
				$output = array();
				
				foreach( $attendancedetails->result() as $data)
				{
					$output[] = array(
										"TeacherId"=>$data->TeacherId,
										"Present"=>$data->Present
					
									);	
				}
				echo json_encode($output);
			}
			else
				echo "0";
			
	}
	
	//getTeacherattandance  ends here
	
	//getteachersforclass based on class and section
	
		public function getteachersforclass()
		{
			extract($_POST);	
			
			$cond = array();
			
			$cond['assign.ClassSlno'] = $ClassId;
			$cond['assign.Section'] = $section;
			
			$this->db->select("distinct(assign.TeacherId) as Id, tea.TeacherName as Teacher");
			$this->db->from(' assignteachers as assign');
			$this->db->join(" teacher as tea",'tea.TeacherId=assign.TeacherId');
			$this->db->where($cond);
			$qry = $this->db->get();
			
			if( $qry->num_rows()>0)
				{
					$output = array();
					foreach( $qry->result() as $teachers )
					{
						$output[] = array(
											"Teacher"=>$teachers->Teacher,
											"TeacherId"=>$teachers->Id,
											);
					}
					echo json_encode($output);
				}
			else
				echo "0";
			
		}
	
	//getteachersforclass based on class and section ends here
	
	
	//getsubjectsassignedtoclass starts here
	
	public function getsubjectsassignedtoclass()
	{
		extract($_POST);
		$cond = array();	
		
		$cond['assign.ClassSlno'] = $ClassName;
		
		$this->db->select('assign.SubjectAssigned as subjectcode, sub.SubjectName as subject');
		$this->db->from(' assignedsubjects as assign');
		$this->db->join(' subjects as sub','sub.SubjectId=SubjectAssigned');
		$this->db->where($cond);
		$qry = $this->db->get();
		
		if($qry->num_rows()>0)
		{
			$output = array();
			
			foreach( $qry->result() as $subjects)
			{
				$output[] = array(
									"subjectcode"=>$subjects->subjectcode,
									"subject"=>$subjects->subject									
									);	
			}
			echo json_encode($output);
		}
		else
			echo "0";
		
	}
	
	//getsubjectsassignedtoclass ends here
	
	//addmarks starts here
	
	public function addmarks()
	{
		
		$AcademicYear = $this->schedulinglib->getAcademicyear();
		
		extract($_POST);
		
		$this->db->select('concat(ExamSchedule," ",ScheduledTime) as Examdate, ExamSchedueId  ');
		$this->db->from(' examschedules');
		
		$this->db->where(' ExamSchedule<=',date('Y-m-d'));
		
		$this->db->where(" ClassName",$ClassName);
		$this->db->where(" ClassSection",$section);
		
		$this->db->where(" Subject",$Subject);
		$this->db->where(" Exam",$Exam);
		$this->db->where(" AcademicYear",$AcademicYear);
		
		$qry = $this->db->get('');
		
		//echo $this->db->last_query(); exit; 
		//check whether exam date and time has elapsed or not
		
		if( $qry->num_rows()>0 )
		{
			foreach($qry->result() as $scheduledate)
			{
				$ExamSchedule = $scheduledate->Examdate;
				$ExamSchedueId = $scheduledate->ExamSchedueId;
			}
			
			$todday_date = date_create(date("Y-m-d h:i:s a"));
			$todday_date =  date_timestamp_get($todday_date);
			
			$ExamScheduledAt = $ExamSchedule;
			
			$exam_date = date_create($ExamSchedule);
			$exam_date = date_timestamp_get($exam_date);
			
			if( $exam_date<$todday_date )
			{
				
				//check whether this student has already allocated marks for this exam or not
				
				$cond = array();
				$table = 'allocatedmarks';
				
				$cond['ExamSchedueId'] = $ExamSchedueId;
				$cond['Student'] = $Rollno;
				
				$cond['ClassId'] = $ClassName;
				$cond['SectionId'] = $section;
				
				$cond['TeacherId'] = $TeacherName;
				$cond['SubjectId'] = $Subject;
				
				$cond['ExamId'] = $Exam;
				$cond['ExamConductedOn'] = $ExamScheduledAt;
				$cond['AcademicYear'] = $AcademicYear;
				
				if( $this->Commonmodel->checkexists($table,$cond) )
				{
					echo "-1";
					exit;
				}
				else
				{
					//now allocate marks
					
					$insertdata = array();
					$table = 'allocatedmarks';
					
					$insertdata['ExamSchedueId'] = $ExamSchedueId;
					$insertdata['Student'] = $Rollno;
					
					$insertdata['ClassId'] = $ClassName;
					$insertdata['SectionId'] = $section;
					
					$insertdata['TeacherId'] = $TeacherName;
					$insertdata['SubjectId'] = $Subject;
					
					$insertdata['ExamId'] = $Exam;
					$insertdata['TotalMarks'] = $TotalMarks;
					$insertdata['SecuredMarks'] = $SecuredMarks;
					
					
					$insertdata['ExamConductedOn'] = $ExamScheduledAt;
					$insertdata['AcademicYear'] = $AcademicYear;
					$insertdata['LastUpdated'] = time();
					
					if( $this->Commonmodel->insertdata($table,$insertdata) ) 
							echo "1";							
					else
						echo "0";
					
				}
				
			}
			else
			{
				echo "-2";
				exit;
			}
		}
		else
			echo "-3";
			
	}
		
	//addmarks ends her
	
}//class ends here
?>