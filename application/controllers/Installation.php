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
		if( $this->Commonmodel->checkexists('admins',array("Role"=>'Admin')) )
		{
			redirect(base_url('admin'));
		}
		else
		$this->load->view('school-configuration');
			
	}
}//class ends here
