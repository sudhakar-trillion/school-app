<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Managestudentactivities extends CI_Controller 
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
			
			// upload event pics  path details
			
				$cond= array();
				
				$cond['UploadFor'] ='event-pic-path';
				$pathdetails = $this->getSingleColumn($field='Path',$table='uploadpaths',$cond);
				
				$this->eventpicspath = $pathdetails;
			#echo 	$this->db->last_query(); $this->eventpicspath; exit; 
			
			
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


	public function getSingleColumn($field,$table,$cond)
	{
		$Field = $this->Commonmodel->getAfield($table,$cond,$field,$order_by='',$order_by_field='',$limit='');

		return 	$Field;
	}
	
	
	public function addstudentactivity()
	{
		
		
		$this->load->view(HEADER);
		
		$data['classes'] = $this->Commonmodel->getrows($table='newclass',$cond=array(),$order_by='',$order_by_field='',$limit='');		
		
		if( $this->input->post('addactivity') )
		{
			$this->form_validation->set_rules($this->loadformrules('addActivities'));
			
			if( $this->form_validation->run() === false)
			{
				$this->load->view('Admin/add-student-activity',$data);	
			}
			else
			{
				$succInsert = 0;
				$filesCount = count($_FILES['ActivityPics']['name']);
				
				$config['upload_path'] =$this->eventpicspath;
				$config['allowed_types'] = 'jpeg|png|jpg';
				$config['max_size'] = '0';
				$config['max_width']  = '0';
				$config['max_height']  = '0';
				
				$this->load->library('upload', $config);
           		$cnt=0;
				
				$totalImgs = sizeof($_FILES['ActivityPics']['tmp_name']);
				
				$eventimgpaths = array();
				
				for ($i=0; $i<$totalImgs; $i++) 
				{
				
					if ( $_FILES['ActivityPics']['tmp_name'][$i]!='' ) 
					{
						$serverpath = $_SERVER['DOCUMENT_ROOT']."/".$this->config->item('publicfolder');
						$filepath = "resources/".$this->eventpicspath."/".time()."_".str_replace(" ","-",$_FILES['ActivityPics']['name'][$i]);
						
						$destination =  $serverpath.$filepath;
						
						if(move_uploaded_file($_FILES['ActivityPics']['tmp_name'][$i],$destination))
							$eventimgpaths[] = $filepath;
						
						
					}
				
				}
				if(sizeof($eventimgpaths)==$totalImgs)
				{
					$dtd = date_create($this->input->post('ActivityDated'));
					$dtd = date_format($dtd,"Y-m-d");
					
					
					$insertdata = array();
					$table = 'studentactivities';
					$AcademicYear = $this->schedulinglib->getAcademicyear();
					
					
					$insertdata['ClassSlno'] = $this->input->post('ClassName');
					$insertdata['ClassSection'] = $this->input->post('sections');
					$insertdata['StudentId'] = $this->input->post('Rollno');
					
					$insertdata['ActivityTitle'] = $this->input->post('ActivityTitle');
					$insertdata['ActivityDate'] = $dtd;
					$insertdata['AcademicYear'] = $AcademicYear;
					$insertdata['Lastupdated'] = time();
					
					$ActivityId = $this->Commonmodel->insertdata($table,$insertdata);
					
					if($ActivityId!='0')
					{
						$insertdata = array();
						$table = 'activitypics';
						
						
						$totaleventImgs = sizeof($eventimgpaths);
						
						for($i=0;$i<$totaleventImgs;$i++)
						{
							$insertdata['ActivityId'] = $ActivityId;
							$insertdata['Picture'] = $eventimgpaths[$i];
							$insertdata['Addedon'] = $dtd;
							$insertdata['Lastupdate'] = time();
							
							if($this->Commonmodel->insertdata($table,$insertdata))
							$succInsert++;
							
						}
						
						
					}
					
					
					
				}
				else
				{
						
				}
				
				if( $succInsert == $totalImgs )
				{
					$msg = "<div class='alert alert-success'>Event added successfully</div>";
					$this->session->set_flashdata('evenpic_added',$msg);	
				}
				redirect(base_url('add-student-activity'));
					
			}
		}
		else		
			$this->load->view('Admin/add-student-activity',$data);
			
		$this->load->view(FOOTER);	
	}
	

	public function viewstudentactivities()
	{
		$this->load->view(HEADER);	
		
		$cond=array();
		
		$table = 'studentactivities as sactiv';
		$baseurl='view-student-activities';
		$perpage=10;
		$order_by_field='ActivityId';
		$datastring='StudentActivities';
		$pagination_string = 'pagination_string';
		
		$data = $this->tsmpaginate->viewstudentactivitypagination($table,$cond,$baseurl,$perpage,$order_by_field='',$datastring,$pagination_string);

		$data['perpage']= $perpage;
		if($data['StudentActivities']!='0')
		$this->load->view('Admin/view-student-activities',$data);	
		else
		{

			$data['routeto'] = 'view student activity';
			
			$data['pgeno'] = $this->uri->segment(2); 
					$requrl = str_replace("-"," ",$this->uri->segment(1));
					$data['viewingPage'] = $requrl;

			$this->load->view('Admin/pagenotfound',$data);	
		}
		
		$this->load->view(FOOTER);	
		
			
	}

//editstudentactivity starts here

public function editstudentactivity()
{
	$this->load->view(HEADER);	
	
	$data['classes'] = $this->Commonmodel->getrows($table='newclass',$cond=array(),$order_by='',$order_by_field='',$limit='');		
	
	$cond = array();
	$table ='studentactivities';
	
	$cond['ActivityId'] = $this->uri->segment(2);
	
	$fields = ' ActivityId, ClassSlno, ClassSection, StudentId, ActivityTitle, date_format(ActivityDate,"%d-%m-%Y") as ActivityDate ';
	
	$order_by='';
	$order_by_field='';
	$limit='';
	
	$activity_details = $this->Commonmodel->getRows_fields($table,$cond,$fields,$order_by,$order_by_field,$limit);
	
	if($activity_details!='0')
	{
		$data['activity_details'] = $activity_details;
		foreach( $activity_details->result() as $details )
		{
			$ClassSlno= $details->ClassSlno;
			$ClassSection= $details->ClassSection;
			$StudentId= $details->StudentId;			
		}
		
		//get the sections for the class
		$cond = array();
		$cond['ClassSlno'] = $ClassSlno;
		$table='sections';
		$fields='*';
		
		$ClassSections = $this->Commonmodel->getRows_fields($table,$cond,$fields,$order_by='',$order_by_field='',$limit='');
		$data['ClassSections'] = $ClassSections;
		
		//get the studetns who are in this class and section
		$AcademicYear = $this->schedulinglib->getAcademicyear();
		
		$cond = array();
		$table = 'students';
		
		$cond['ClassName']  = $ClassSlno;
		$cond['ClassSection']  = $ClassSection;
		$cond['AcademicYear']  = $AcademicYear;
		
		$students = $this->Commonmodel->getRows_fields($table,$cond,$fields,$order_by='',$order_by_field='',$limit='');
		$data['TotalStudents'] = $students;
		
		
		if( $this->input->post('updateactivity') )
		{
			
		
			$this->form_validation->set_rules($this->loadformrules('editActivities'));
			
			if( $this->form_validation->run() === false)
			{
				$this->load->view('Admin/edit-student-activity',$data);	
			}
			else
			{
				$eventimgpaths = array();
				
				if( is_uploaded_file($_FILES['ActivityPics']['tmp_name'][0]))
				{
					$totalImgs = sizeof($_FILES['ActivityPics']['tmp_name']);
					for ($i=0; $i<$totalImgs; $i++) 
					{
							if ( $_FILES['ActivityPics']['tmp_name'][$i]!='' ) 
							{
								$destination = $this->eventpicspath."/".time()."_".str_replace(" ","-",$_FILES['ActivityPics']['name'][$i]);
							
								if(move_uploaded_file($_FILES['ActivityPics']['tmp_name'][$i],$destination))
									$eventimgpaths[] = $destination;
							}
						}				
					}//if any event pic is uploaded
					
					$cond = array();
					$table = 'studentactivities';
					
					extract($_POST);
					
					$ActivityDated = date_create($ActivityDated);
					$ActivityDated = date_format($ActivityDated,'Y-m-d');
					
					
					$setdata = array();
					
					$setdata['ClassSlno'] = $ClassName;
					$setdata['ClassSection'] = $sections;
					$setdata['StudentId'] = $Rollno;
					
					$setdata['ActivityTitle'] = $ActivityTitle;
					$setdata['ActivityDate'] = $ActivityDated;
					$setdata['Lastupdated'] = time();
					//$setdata['AcademicYear'] = $AcademicYear;
					$cond['ActivityId'] = $ActivityId;
					
					if($this->Commonmodel->updatedata($table,$setdata,$cond)	)
					{
						if(!empty($eventimgpaths))
						{
							$insertdata = array();
							$table = 'activitypics';
							
							$totaleventImgs = sizeof($eventimgpaths);
							
							for($i=0;$i<$totaleventImgs;$i++)
							{
								$insertdata['ActivityId'] = $ActivityId;
								$insertdata['Picture'] = $eventimgpaths[$i];
								$insertdata['Addedon'] = $ActivityDated;
								$insertdata['Lastupdate'] = time();
							
								$this->Commonmodel->insertdata($table,$insertdata);

							
							}	
						}
						
						$msg = "<div class='alert alert-success'>Event details updated successfully</div>";
						$this->session->set_flashdata('eventdetails_updated',$msg);	
					}
					else
					{
						$msg = "<div class='alert alert-danger'>Unable to update event details</div>";
						$this->session->set_flashdata('eventdetails_updated',$msg);	
					}
					
					redirect(base_url('edit-student-activity/').$this->uri->segment(2));
					
				

				
			}
		
	
		}
		else
			$this->load->view('Admin/edit-student-activity',$data);
	
	}
	else
	{
		$data['routeto']="view-student-activities";
		$this->load->view('Admin/pagenotfound',$data);	
	}
		
	$this->load->view(FOOTER);		
}
//editstudentactivity ends here




	//custom validation starts here
	
		public function checkclass_select($clsno)
		{
			
			if($clsno=='' || $clsno=='0')
			{
				$this->form_validation->set_message('checkclass_select','Select class');
				return false;
			}
			else
			return true;
				
			
		}
		
		public function checksection_select($sect)
		{
			if( $sect=='' || $sect=='0' )
			{
				$this->form_validation->set_message('checksection_select','Select section');
				return false;
			}
			else
				return true;
		}
		
		public function checkstudentid_select($stdid)
		{
			
			if( $stdid=='' || $stdid=='0' )
			{
				$this->form_validation->set_message('checkstudentid_select','Select student');
				return false;
			}
			else
				return true;
			
		}
		
		public function ActivityPicscallback($pics)
		{
			
			if($_FILES['ActivityPics']['name'][0]=='')
			{
				$this->form_validation->set_message('ActivityPicscallback','Upload a pic');
				return false;
			}
			else
			{
				$totalfiles = sizeof($_FILES['ActivityPics']['name']);
				
				$valid_ext = 0;
				
				for($i=0;$i<$totalfiles;$i++)
				{
						if( $_FILES['ActivityPics']['type'][$i] == "image/jpeg" || $_FILES['ActivityPics']['type'][$i] == "image/jpg" || $_FILES['ActivityPics']['type'][$i] == "image/png" )
						{
							$valid_ext++;	
						}
						
				}
				
				if($valid_ext==$totalfiles)
				{
					return true;
				}
				else	
				{
					$this->form_validation->set_message('ActivityPicscallback',"Select only image types");
					return false;
					
				}
			}
		}
	
	public function EditActivityPicscallback()
	{

		if( $_FILES['ActivityPics']['name'][0]!='')
		{
			
				$totalfiles = sizeof($_FILES['ActivityPics']['name']);
				
				$valid_ext = 0;
				
				for($i=0;$i<$totalfiles;$i++)
				{
						if( $_FILES['ActivityPics']['type'][$i] == "image/jpeg" || $_FILES['ActivityPics']['type'][$i] == "image/jpg" || $_FILES['ActivityPics']['type'][$i] == "image/png" )
						{
							$valid_ext++;	
						}
						
				}
				
				if($valid_ext==$totalfiles)
				{
					return true;
				}
				else	
				{
					$this->form_validation->set_message('EditActivityPicscallback',"Select only image types");
					return false;
					
				}
			
		}
		else
		{
			return true;
		}
	}


	//custom validation ends here
	
			
}//class ends here
