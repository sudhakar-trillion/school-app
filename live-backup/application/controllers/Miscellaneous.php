<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Miscellaneous extends CI_Controller 
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

	public function addnontechingstaff()
	{
		$this->load->view(HEADER);
		
		$table = 'departments';
		$cond=array();
		
			$departments  = $this->Commonmodel->getRows_fields($table,$cond,$fields='Department, DepartId',$order_by='ASC',$order_by_field='Department',$limit='');
			$data['Departmetns']  = $departments;
		
		if($this->input->post('addStaff'))
		{
			
			$this->form_validation->set_rules($this->loadformrules('addnonteachingstaff'));
			
			if( !$this->form_validation->run() === false)
			{
				$table = 'staff';
				$insertdata = array();
				
				
				$insertdata['TeacherId'] = 0;
				$insertdata['StaffName'] = $this->input->post('StaffName');
				$insertdata['Category'] = 'Nonteaching';
				$insertdata['StaffDepartment'] = $this->input->post('Department');
				$insertdata['LastUpdated'] = time();
				
				if( $this->Commonmodel->insertdata($table,$insertdata))
				{	
					$msg = "<div class='alert alert-success'>Staff added successfully</div>";
					$this->session->set_flashdata('non-teaching-staff-added-msg',$msg);
				}
				else
				{
					$msg = "<div class='alert alert-warning'>Unable to add staff</div>";
					$this->session->set_flashdata('non-teaching-staff-added-msg',$msg);
				}
				
				redirect(base_url('add-nonteaching-staff'));
				
			}
			else
				$this->load->view('Admin/add-nonteching-staff',$data);
		}
		else
			$this->load->view('Admin/add-nonteching-staff',$data);
		
		$this->load->view(FOOTER);	
	}
//add non teaching staff ends here

//viewnonteachingstaff starts here

	public function viewnonteachingstaff()
	{
		$this->load->view(HEADER);
		
		$cond=array();
		
		$table = 'staff as nonstaff';
		$baseurl='view-nonteaching-staff';
		$perpage=10;
		$order_by_field='StaffId';
		$datastring='staffPeople';
		$pagination_string = 'pagination_string';
		
		$cond['Category'] = 'Nonteaching';
		
		$nonteachingStaff = $this->tsmpaginate->singletablePaginateion($table,$cond,$baseurl,$perpage,$order_by_field='',$datastring,$pagination_string);
		
		if( $nonteachingStaff['staffPeople']!='0')
		{

			$data['perpage']= $perpage;
			$data['staffPeople'] = $nonteachingStaff['staffPeople'];
			$data['pagination_string'] = $nonteachingStaff['pagination_string'];
			
			$this->load->view('Admin/view-nonteaching-staff',$data);
		}
		else
		{
			if( $this->uri->segment(2)!='')
				$data['routeto'] = 'view-nonteaching-staff';
			else
				$data['routeto'] = 'add-nonteaching-staff';
			$this->load->view('Admin/pagenotfound',$data);
		}
		$this->load->view(FOOTER);
	}

//viewnonteachingstaff ends here

//editnonteachingstaff starts here

	public function editnonteachingstaff()
	{
		
		$this->load->view(HEADER);
		
		$table = 'departments';
		$cond=array();
		
			$departments  = $this->Commonmodel->getRows_fields($table,$cond,$fields='Department, DepartId',$order_by='ASC',$order_by_field='Department',$limit='');
			$data['Departmetns']  = $departments;
		
		$cond = array();
		$table='staff';
		
		$cond['StaffId'] = $this->uri->segment(2);
		
		if( !$this->Commonmodel->checkexists($table,$cond) )
		{
			$data['routeto'] = 'view-nonteaching-staff';
			$this->load->view('Admin/pagenotfound',$data);	
		}
		else		
		{
			$data['StaffName']=$this->Commonmodel->getAfield($table,$cond,$field='StaffName',$order_by='',$order_by_field='',$limit='');
			$data['StaffDepartment']=$this->Commonmodel->getAfield($table,$cond,$field='StaffDepartment',$order_by='',$order_by_field='',$limit='');
			
			if($this->input->post('editStaff'))
			{
				
			$this->form_validation->set_rules($this->loadformrules('addnonteachingstaff'));
			
			if( !$this->form_validation->run() === false)
			{
				$table = 'staff';
				$setdata = array();
				
				
				$setdata['StaffName'] = $this->input->post('StaffName');
				$setdata['StaffDepartment'] = ucwords(strtolower($this->input->post('Department')));
				$setdata['LastUpdated'] = time();
				
				if( $this->Commonmodel->updatedata($table,$setdata,$cond)	)
				{	
					$msg = "<div class='alert alert-success'>Staff updated successfully</div>";
					$this->session->set_flashdata('non-teaching-staff-added-msg',$msg);
				}
				else
				{
					$msg = "<div class='alert alert-warning'>Unable to update staff</div>";
					$this->session->set_flashdata('non-teaching-staff-added-msg',$msg);
				}
				
				redirect(base_url('edit-nonteaching-staff/').$this->uri->segment(2));
				
			}
			else
				$this->load->view('Admin/add-nonteching-staff');
		
			}
			else
				$this->load->view('Admin/edit-nonteaching-staff',$data);
		}
		
		$this->load->view(FOOTER);		
	}


//editnonteachingstaff ends here


//addnonteachingdetails starts here

public function addnonteachingdetails()
{

	$this->load->view(HEADER);
	
	$cond = array();
	$cond['Category'] = 'Nonteaching';
	
	$table = 'staff';
	
	$non_staff  = $this->Commonmodel->getRows_fields($table,$cond,$fields='StaffId, StaffName',$order_by='ASC',$order_by_field='StaffId',$limit='');
	
	
	if($non_staff!='0')
	{
		$data['NonStaff']  = $non_staff;
		
		if( $this->input->post('AddNonTeachingDetails') )
		{
			$this->form_validation->set_rules($this->loadformrules('AddNonTeachingDetails'));
	
			if( $this->form_validation->run() === false)
				$this->load->view('Admin/addnonteachingdetails',$data);
			else
			{
				
				$insertdata = array();
				$table = 'staffdetails';
				
				$insertdata['StaffId'] 			= $this->input->post('StaffId');
				$insertdata['ContactNumber'] 	= $this->input->post('ContactNumber');
				
				$insertdata['ContactAddress'] 	= $this->input->post('ContactAddress');
				$insertdata['LastUpdated'] 		= time();
				
				
				if( $this->Commonmodel->insertdata($table,$insertdata) )
				{
					
					$msg = "<div class='alert alert-success'>Non teaching staff details added successfully</div>";
					$this->session->set_flashdata('NtsdetailsSuccess',$msg);
				}
				else
				{
					$msg = "<div class='alert alert-warning'>Unable to add Non teaching staff details</div>";
					$this->session->set_flashdata('failedtoaddNtsdetails',$msg);
				}
				
				redirect(base_url('add-nonteaching-staff-details') );
				
				
				
			}
		}
		else
			$this->load->view('Admin/addnonteachingdetails',$data);
	}
	else
	{
		$data['routeto'] = 'add-nonteaching-staff';
		$this->load->view('Admin/pagenotfound',$data);	
	}
		
	
	
	
	$this->load->view(FOOTER);
	
}

//addnonteachingdetails ends here

// addroute starts here 

	public function addroute()
	{
		$this->load->view(HEADER);	
		
		if( $this->input->post('Addroute') )			
		{

			$this->form_validation->set_rules($this->loadformrules('addroute'));
			
			if( $this->form_validation->run() === false)
			{
				$this->load->view('Admin/add-route');		
			}
			else
			{
				
				$insertdata = array();
				$table='routes';
				
				$insertdata['RouteNumber'] 	= $this->input->post('RouteNumber');
				$insertdata['Routes'] 		= $this->input->post('Routes');
				$insertdata['LastUpdated'] 	= time();
				
				if( $this->Commonmodel->insertdata($table,$insertdata) )
				{
					
					$msg = "<div class='alert alert-success'>New route added successfully</div>";
					$this->session->set_flashdata('routeadded',$msg);
				}
				else
				{
					$msg = "<div class='alert alert-warning'>Unable to add new route</div>";
					$this->session->set_flashdata('failedtoaddroute',$msg);
				}
				
				redirect(base_url('add-route') );
			
				
			}
				
				
		}
		else
		$this->load->view('Admin/add-route');		
		
		$this->load->view(FOOTER);		
	}

//addroute ends here


//addvechile starts here

	public function addvehicle()
	{
			
		$this->load->view(HEADER);
		
		//get the routes
		$table='routes';
		$cond = array();
		
		
		$routes  = $this->Commonmodel->getRows_fields($table,$cond,$fields='RouteId, RouteNumber',$order_by='ASC',$order_by_field='RouteId',$limit='');
		$data['Routes']  = $routes;
		
		
		// get the drivers list
		$table = 'staff';
		$cond = array();
		$cond['StaffDepartment'] = 'Transportation';
		
		$drivers  = $this->Commonmodel->getRows_fields($table,$cond,$fields='StaffId,StaffName',$order_by='',$order_by_field='',$limit='');
		$data['Drivers']  = $drivers;
		
		
		if( $this->input->post('Addvehicle') )
		{
			
			
			$this->form_validation->set_rules($this->loadformrules('Addvehicle'));
			
			if( $this->form_validation->run() === false)
			{
				$this->load->view('Admin/add-vehicle',$data);		
			}
			else
			{
				$table = 'vehicles';
				$insertdata = array();
				
				$insertdata['VechileNumber']	=	$this->input->post('VehicleNumber');
				$insertdata['VehicleRoute']		=	$this->input->post('VehicleRoute');
				$insertdata['Driver']			=	$this->input->post('Driver');
				$insertdata['LastUpdated']		=	time();
				
				if( $this->Commonmodel->insertdata($table,$insertdata) )
				{
					
					$msg = "<div class='alert alert-success'>New vehicle added successfully</div>";
					$this->session->set_flashdata('vehicleadded',$msg);
				}
				else
				{
					$msg = "<div class='alert alert-warning'>Unable to add new vehicle</div>";
					$this->session->set_flashdata('failedtoaddvehicle',$msg);
				}
				
				redirect(base_url('add-vehicle') );
				
			}
		}
		else
			$this->load->view('Admin/add-vehicle',$data);		
		
		$this->load->view(FOOTER);		
	}

//addvechile ends here

//viewvehicles starts here

	public function viewvehicles()
	{
		$this->load->view(HEADER);	
		
		//get the details about the vehicles
		/*
		
		$this->db->select('veh.VechileNumber as VechileNumber, veh.VechileId as  VechileId, stf.StaffName as Driver, rou.Routes as Routes');
		$this->db->from('vehicles as veh');
		$this->db->join('staff as stf','stf.StaffId=veh.Driver');
		$this->db->join('routes as rou','rou.RouteId=veh.VehicleRoute');
		$qry = $this->db->get();
		
		*/
		
		
		
		$cond=array();
		
		$table = 'vehicles AS VEH';
		$baseurl='view-vehicles';
		$perpage=20;
		$order_by_field='VechileId';
		$datastring='vehicleDetails';
		$pagination_string = 'pagination_string';
		
		$qery = $this->tsmpaginate->getvehiclePagination($table,$cond,$baseurl,$perpage,$order_by_field='',$datastring,$pagination_string);
		
		if( $qery['vehicleDetails']!='0')
		{

			$data['perpage']= $perpage;
			$data['vehicleDetails'] = $qery['vehicleDetails'];
			$data['pagination_string'] = $qery['pagination_string'];
			$this->load->view('Admin/view-vehicles',$data);
		}
		else
		{
			$data['routeto'] = 'add-vehicle';
			$this->load->view('Admin/pagenotfound',$data);	
		}
		
		$this->load->view(FOOTER);			
			
	}

//viewvehicles ends here

//editvehicles starts here

	public function editvehicles()
	{
		
			
		$this->load->view(HEADER);
		
		//get the routes
		$table='routes';
		$cond = array();
		
		
		$routes  = $this->Commonmodel->getRows_fields($table,$cond,$fields='RouteId, RouteNumber',$order_by='ASC',$order_by_field='RouteId',$limit='');
		$data['Routes']  = $routes;
		
		
		// get the drivers list
		$table = 'staff';
		$cond = array();
		$cond['StaffDepartment'] = 'Transportation';
		
		$drivers  = $this->Commonmodel->getRows_fields($table,$cond,$fields='StaffId,StaffName',$order_by='',$order_by_field='',$limit='');
		$data['Drivers']  = $drivers;
		
		//get the vechile details
		
		$cond = array();
		$table = 'vehicles';
		$cond['VechileId']  = $this->uri->segment(2);
		
		
		$vehicleDetails  = $this->Commonmodel->getRows_fields($table,$cond,$fields='*',$order_by='',$order_by_field='',$limit='');
		
		
		
		if($vehicleDetails!='0')
		{
			$data['vehicleDetails']  = $vehicleDetails;
		}
		else
		{
			$data['routeto'] = 'view-vehicles';
			$this->load->view('Admin/pagenotfound',$data);	
		}
		
		
		if( $this->input->post('Editvehicle') )
		{
			
			
			$this->form_validation->set_rules($this->loadformrules('Addvehicle'));
			
			if( $this->form_validation->run() === false)
			{
				$this->load->view('Admin/edit-vehicle',$data);		
			}
			else
			{
				$table = 'vehicles';
				$setdata = array();
				$cond = array();
				
				$cond['VechileId']  = $this->uri->segment(2);
				
				$setdata['VechileNumber']	=	$this->input->post('VehicleNumber');
				$setdata['VehicleRoute']		=	$this->input->post('VehicleRoute');
				$setdata['Driver']			=	$this->input->post('Driver');
				$setdata['LastUpdated']		=	time();
				
				if( $this->Commonmodel->updatedata($table,$setdata,$cond)	 )
				{
					
					$msg = "<div class='alert alert-success'>Vehicle data updated successfully</div>";
					$this->session->set_flashdata('vehicleupdated',$msg);
				}
				else
				{
					$msg = "<div class='alert alert-warning'>Unable to update vehicle data</div>";
					$this->session->set_flashdata('failedtoupdatedvehicle',$msg);
				}
				
				redirect(base_url('edit-vehicle/'.$this->uri->segment(2)) );
				
			}
		}
		else
			$this->load->view('Admin/edit-vehicle',$data);		
		
		$this->load->view(FOOTER);		
		
			
	}

//editvehicles ends here

	//addstdtovehicle starts here
	
	public function addstdtovehicle()
	{
		$this->load->view(HEADER);
		
		
		$data['classes'] = $this->Commonmodel->getrows($table='newclass',$cond=array(),$order_by='',$order_by_field='',$limit='');
	
	
	if( ( $this->uri->segment(2)!='' &&  $this->uri->segment(3)!='' && $this->uri->segment(4)!='' ) && ( $this->uri->segment(2)>0 &&  $this->uri->segment(3)>0 &&  $this->uri->segment(4)>0)  )
	{
			$cls = $this->uri->segment(2);
			$sec = $this->uri->segment(3);
			$route = $this->uri->segment(4);
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
		$route = 0;
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
	
	
	//get the routes
	
	$cond = array();
	
	$fields = 'RouteId, RouteNumber';
	$table='routes';
	
	if( $this->uri->segment(4)!='' )
		$data['RouteNumber'] = $this->uri->segment(4);
	else
			$data['RouteNumber'] = 1;
		
	//get the students on the route, class and section
	$cond = array();
	$data['routeDetails'] = $this->Commonmodel->getRows_fields($table,$cond,$fields,$order_by='',$order_by_field='',$limit);
	
	$cond = array();
	
	$table ='assignstdroute';
	
	$cond['ClassId'] = $cls;
	$cond['SectionId'] = $sec;
	
	if($route>0)
		$cond['RouteId'] = $route;
	else
		$cond['RouteId'] = 1;
		
	
	$data['assignedRolls'] = $this->Commonmodel->getRows_fields($table,$cond,$fields='StudentId',$order_by='',$order_by_field='',$limit);
	
	$cond = array();
	
	$cond['ClassId'] = $cls;
	$cond['SectionId'] = $sec;
	
	$data['cls_sec_ass_stds'] = $this->Commonmodel->getRows_fields($table,$cond,$fields='StudentId,RouteId',$order_by='',$order_by_field='',$limit);

	
		
	
		
	$this->load->view('Admin/add-std-vehicle',$data);
	$this->load->view(FOOTER);		
	}
	
	//addstdtovehicle ends here


	}//class ends here
