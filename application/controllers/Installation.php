<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Installation extends CI_Controller 
{

	 public function __construct()
		{
			parent::__construct();
			date_default_timezone_set("Asia/Kolkata");
			define('HEADER','Admin/header');
			define('FOOTER','Admin/footer');
			
			$this->load->model('Commonmodel');
		}
	public function index()
	{
		

		if( $this->input->post('submit'))
		{
			
			$uploadingfile = time().$_FILES['Schoollogo']['name'];
		
			$uploadpath = $_SERVER['DOCUMENT_ROOT']."/".$this->config->item('publicfolder')."/resources/school-logo/".$uploadingfile;
			
			extract($_POST);
			
			
			$table = 'schoolinfo';
			
			$insertdata = array();
			
			$insertdata['SchoolName'] = $schoolname;
			$insertdata['SchoolLogo'] = $uploadingfile;
			$insertdata['LastUpdated'] = date('Y-m-d H:i:s');
			
			if( $this->Commonmodel->insertdata($table,$insertdata) )
				{
					move_uploaded_file($_FILES['Schoollogo']['tmp_name'],$uploadpath);
					
					$table = 'admins';
					$cond = array();
		
					$cond['Role'] = 'Admin';
					
					$setdata = array();
					
					$setdata['Status'] = 'Active';
					$setdata['Lastupdated'] = time();
					
					if( $this->Commonmodel->updatedata($table,$setdata,$cond)	)
						redirect(base_url());
					else
						echo "<h1> Unable to activate admin kindly contact admin </h1>";

						$this->load->view('school-configuration');
													
				}
			else
			{
				echo "<h1> Unable to set school name, schoollogo and unable to activate admin kindly contact admin </h1>";
				$this->load->view('school-configuration');
			}
			
			//move_uploaded_file($_FILE['Schoollogo']['tmp_name'],	
		}
		else
		{		
			if( $this->Commonmodel->checkexists('admins',array("Role"=>'Admin',"Status"=>"Active")) )
			{
				redirect(base_url('admin'));
			}
			else
			$this->load->view('school-configuration');
		}
			
	}
	
	
	public function getAdminConfig()
	{
		
		extract($_POST);
		
		$table = 'admins';
		$cond = array();
		
		$cond['Role'] = 'Admin';
	
		$qry = $this->Commonmodel->getrows($table,$cond,$order_by='',$order_by_field='',$limit='');
		
		if( $qry!='0')
		{
			$output = array();
			
			foreach( $qry->result() as $data)
			{
				$output[] = array(
									"AdminEmail"=>$data->AdminEmail,
									"UserId"=>$data->UserId
								);
			}
			echo json_encode($output);
		}
		else
			echo "0";
	} //getAdminConfig ends here
	
	
	//saveadminconfig starts here 
	
	public function saveadminconfig()
	{
		extract($_POST);
		
		$table = 'admins';	
		$insertdata = array();
		$setdata = array();
		
		$cond = array();
		
		$cond['Role'] = 'Admin';
		$qry = $this->Commonmodel->getrows($table,$cond,$order_by='',$order_by_field='',$limit='');
		
		if($qry!='0')
		{
			$setdata['AdminEmail'] = $Adminemail;
			$setdata['UserId'] = $loginId;
			
			$setdata['Password'] = md5($Password);
			$setdata['Role'] = 'Admin';
			
			$setdata['Status'] = 'Inactive';
			$setdata['Lastupdated'] = time();
			
			if( $this->Commonmodel->updatedata($table,$setdata,$cond)	)
				echo "1";
			else
				echo "0";
		}
		else
		{		
			$insertdata['AdminEmail'] = $Adminemail;
			$insertdata['UserId'] = $loginId;
			
			$insertdata['Password'] = md5($Password);
			$insertdata['Role'] = 'Admin';
			
			$insertdata['Status'] = 'Inactive';
			$insertdata['Lastupdated'] = time();
			
			if( $this->Commonmodel->insertdata($table,$insertdata) )
				echo "1";
			else
				echo "0";
		}
	}
	//saveadminconfig ends here
	
	
}//class ends here
