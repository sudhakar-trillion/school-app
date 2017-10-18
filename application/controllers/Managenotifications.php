<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Managenotifications extends CI_Controller 
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
	
	public function addnotificationstudent()
	{
		$this->load->view(HEADER);
		$data['classes'] = $this->Commonmodel->getrows($table='newclass',$cond=array(),$order_by='',$order_by_field='',$limit='');		
		$this->load->view('Admin/add-notification-student',$data);

		$this->load->view(FOOTER);
	}
	
	//viewnotificationtostudent starts here 
	
	public function viewnotificationtostudent()
	{
		
		$this->load->view(HEADER);
		
		$table='notifications'; 
		$cond=array();
		$baseurl='view-notification-to-student';
		$perpage=2;
		$order_by_field='NotificationId';
		$datastring='Notifications';
		$pagination_string = 'pagination_string';
		
		$AddedBy="Admin";
		
		$data = $this->tsmpaginate->notifstudentspagination($table,$cond,$baseurl,$perpage,$order_by_field,$datastring,$pagination_string,$AddedBy);
		
		$data['classes'] = $this->Commonmodel->getrows($table='newclass',$cond,$order_by='',$order_by_field='',$limit='');
		$data['perpage']= $perpage;
		
		if($data['Notifications']!='0')
			$this->load->view('Admin/view-notification-to-student',$data);
		else
		{
			$data['routeto'] = "view-notification-to-student";
			$data['pgeno'] = $this->uri->segment(2); 
			$requrl = str_replace("-"," ",$this->uri->segment(1));
			$data['viewingPage'] = $requrl;
			
			$this->load->view('Admin/pagenotfound',$data);
		}

		$this->load->view(FOOTER);
		
	}
	
	//viewnotificationtostudent ends here
	
	public function editnotificationtostudent()
	{
		$this->load->view(HEADER);
		$data['classes'] = $this->Commonmodel->getrows($table='newclass',$cond=array(),$order_by='',$order_by_field='',$limit='');		
		$data['routeto'] = "view-notification-to-student";
		
		
		$cond = array();

		$NotificationId= $this->uri->segment(2);
		$cond['NotificationId'] = $this->uri->segment(2);
		$table = 'notifications';
		
		//check whether this NotificationId exists or not
		
		if( $this->Commonmodel->checkexists($table,$cond))
		{
			//get the classname

			$ClassSlno = $this->getSingleColumn($field='ClassName',$table,$cond);			
			$data['SelectedClass'] = $ClassSlno;
			
			$ClassSection = $this->getSingleColumn($field='ClassSection',$table,$cond);
			$data['SelectedSection'] = $ClassSection;
			
			$StudentId = $this->getSingleColumn($field='StudentId',$table,$cond);
			$data['SelectedStudent'] = $StudentId;
			
			
			$Notification = $this->getSingleColumn($field='Notification',$table,$cond);
			$data['SelectedNotification'] = $Notification;
			
			$Notification = $this->getSingleColumn($field='NotificationTitle',$table,$cond);
			$data['SelectedNotificationTitle'] = $Notification;
			
			$data['NotificationId'] = $this->uri->segment(2);
			
			
			//get the section of this class
			
			$cond = array();
			$table='sections';
			
			$cond['ClassSlno'] = $ClassSlno;
			$fields = 'Section,SectionId';
			
			$sections = $this->Commonmodel->getRows_fields($table,$cond,$fields,$order_by='ASC',$order_by_field='SectionId',$limit);
			if($sections!='0')	
			{
				$data['Sections'] = $sections;
				
				$cond = array();
				$table='students';
				
				$cond['ClassName'] = $ClassSlno;
				$cond['ClassSection'] = $ClassSlno;
				
				$fields = 'Student,LastName,StudentId';
				$students = $this->Commonmodel->getRows_fields($table,$cond,$fields,$order_by='',$order_by_field='',$limit);
				
				if($students!='0')
				{
					$data['Students'] = $students;
					$this->load->view('Admin/edit-notification-student',$data);		
				}
				else
					$this->load->view('Admin/pagenotfound',$data);		
				
			}
			else
				$this->load->view('Admin/pagenotfound',$data);	
			
		}
		else
			$this->load->view('Admin/pagenotfound',$data);	
	
		$this->load->view(FOOTER);		
	}

	//parentnotifications starts here
	
	public function parentnotifications()
	{
		$this->load->view(HEADER);
		
			
		
		$table='notifications'; 
		
		$cond=array();
		
		//$cond['noti.StudentId'] =  $this->session->userdata('StudentId');
		
		$baseurl='view-parent-notifications';
		$perpage=10;
		$order_by_field='NotificationId';
		$datastring='Notifications';
		$pagination_string = 'pagination_string';

		$AddedBy='Parent';
		$data = $this->tsmpaginate->notifstudentspagination($table,$cond,$baseurl,$perpage,$order_by_field,$datastring,$pagination_string,$AddedBy);
		
		
		$data['classes'] = $this->Commonmodel->getrows($table='newclass',array(),$order_by='',$order_by_field='',$limit='');
		$data['perpage']= $perpage;
		
		if($data['Notifications']=='0' )
		{
			$data['routeto'] = 'parent-dashboard';
			$this->load->view('Admin/pagenotfound',$data);
		}
		else
		$this->load->view('Admin/view-parent-notifications',$data);
		
		
		
		$this->load->view(FOOTER);		
	}
	
	//parentnotifications ends here


	public function getSingleColumn($field,$table,$cond)
	{
		$Field = $this->Commonmodel->getAfield($table,$cond,$field,$order_by='',$order_by_field='',$limit='');
		return 	$Field;
	}
	
	

		
}//class ends here
