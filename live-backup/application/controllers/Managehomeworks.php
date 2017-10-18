<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Managehomeworks extends CI_Controller 
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


	public function getSingleColumn($field,$table,$cond)
	{
		$Field = $this->Commonmodel->getAfield($table,$cond,$field,$order_by='',$order_by_field='',$limit='');
		return 	$Field;
	}
	
	
	public function addhomeworktostudent()
	{
		
		$this->load->view(HEADER);
	
		$data['classes'] = $this->Commonmodel->getrows($table='newclass',$cond=array(),$order_by='',$order_by_field='',$limit='');		
		
		$this->load->view('Admin/add-homework-to-student',$data);
		
		
		$this->load->view(FOOTER);
	}
	
	//viewhomeworks starts here
	
	public function viewhomeworks()
	{

		$this->load->view(HEADER);
		
		$table='homeworks as hw'; 
		$cond=array();
		
		//$cond['Status'] = 'Assigned';
		
		$baseurl='view-homework-to-student';
		$perpage=10;
		$order_by_field='HomeworkId';
		$datastring='homeworks';
		$pagination_string = 'pagination_string';
		
		$data = $this->tsmpaginate->viewhomeworkspagination($table,$cond,$baseurl,$perpage,$order_by_field,$datastring,$pagination_string);

		$data['perpage']= $perpage;
		$this->load->view('Admin/view-homeworks',$data);
		
		$this->load->view(FOOTER);
		
	}
	
	// viewhomeworks ends here
	
	//edithomework starts here
	
	public function edithomework()
	{
		$this->load->view(HEADER);
		
		$data['classes'] = $this->Commonmodel->getrows($table='newclass',$cond=array(),$order_by='',$order_by_field='',$limit='');		
		
		$cond = array();
		$table ='homeworks';
		
		$cond['HomeworkId'] = $this->uri->segment(2);
		
		$homeworks = $this->Commonmodel->getRows_fields($table,$cond,$fields='*',$order_by='',$order_by_field='',$limit='');
		
		
		
		
		
		if($homeworks!='0')
		{
		
			//get the classSlno 
		
		$ClassSlno = $this->getSingleColumn($field='ClassSlno',$table='homeworks',$cond);
		$data['ClassSlno'] = $ClassSlno;
		
		//get the section
		
		$ClassSection = $this->getSingleColumn($field='ClassSection',$table='homeworks',$cond);
		$data['ClassSection'] = $ClassSection;
		
		//get the studentId
		
		$ClassSection = $this->getSingleColumn($field='ClassSection',$table='homeworks',$cond);
		$data['ClassSection'] = $ClassSection;
		
		//get the subject id
		$SubjectIde = $this->getSingleColumn($field='SubjectId',$table='homeworks',$cond);
		$data['SubjectIde'] = $SubjectIde;
		
		
		//get the Sections using classslno
		
		$Sections = $this->Commonmodel->getRows_fields($table='sections',$cond=array("ClassSlno"=>$ClassSlno),$fields='Section,SectionId',$order_by,$order_by_field,$limit);
		
		$data['Sections'] = $Sections;
		
		//get the students
		
		$Students = $this->Commonmodel->getRows_fields($table='students',$cond=array("ClassName"=>$ClassSlno,"ClassSection"=>$ClassSection),$fields='Student,LastName,StudentId',$order_by,$order_by_field,$limit);
		
		$data['Students'] = $Students;
		
		//get the AssingedSubjects
		
		$AssingedSubjects = $this->Commonmodel->getRows_fields($table='assignedsubjects',$cond=array("ClassSlno"=>$ClassSlno),$fields='AssignedId,SubjectAssigned',$order_by,$order_by_field,$limit);
		
		$data['AssingedSubjects'] = $AssingedSubjects;
		
		
		//get the subjects
		
		
		$Subjects = $this->Commonmodel->getRows_fields($table='subjects',$cond=array(),$fields='SubjectId,SubjectName',$order_by,$order_by_field,$limit);
		
		$data['Subjects'] = $Subjects;
		
			$data['homeworks'] = $homeworks;
			$this->load->view('Admin/edit-home-work',$data);
		}
		else
		{
			$data['routeto']= 'view-homework-to-student';
			$this->load->view('Admin/pagenotfound',$data);
			
		}
		$this->load->view(FOOTER);	
	}
	
	//edithomework ends here
		
}//class ends here
