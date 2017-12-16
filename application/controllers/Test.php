<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends CI_Controller 
{

	 public function __construct()
		{
			parent::__construct();
			date_default_timezone_set("Asia/Kolkata");	
			
		}

	public function index()
	{
		#echo $this->security->get_csrf_hash()."<br>"; 
		if( $this->input->post('submit'))
		{
			//echo $this->input->post('csrf_test_name').":".$this->security->get_csrf_hash(); exit;
			echo "<pre>";
			print_r($this->input->post());
			echo "</pre>";
			echo $this->security->get_csrf_hash();
			$this->load->view('Admin/test');
			
		}
		else
			$this->load->view('Admin/test');
		
			
			
	}
		
		

}//class ends here
