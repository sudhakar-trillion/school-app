<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Schedulings extends CI_Controller 
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
		
		//$this->load->library('Schedulings');
		
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

	//addcelebration starts here
	
	public function addcelebration()
	{
		$this->load->view(HEADER);
		

		$prefs['template'] = array(
        'table_open'           => '<table class="calendar">',
        'cal_cell_start'       => '<td class="day">',
        'cal_cell_start_today' => '<td class="day today">',
);

	$prefs['start_day']    = 'saturday';
	$prefs['month_type']    = 'long';
	$prefs['day_type']    = 'short';

	$this->load->library('calendar',$prefs);
	
			$this->load->view('Admin/add-celebration');		
		$this->load->view(FOOTER);	
	}
	
	//addcelebration ends here
	
	//viewcelebration starts here
	
	public function viewcelebration()
	{
		$this->load->view(HEADER);
		

		$prefs['template'] = array(
        'table_open'           => '<table class="calendar">',
        'cal_cell_start'       => '<td class="day">',
        'cal_cell_start_today' => '<td class="day today">',
);

	$prefs['start_day']    = 'Sunday';
	$prefs['month_type']    = 'long';
	$prefs['day_type']    = 'short';

	//get the events 
	$yr = date('Y');
	$mnth=date('m');
	

	
	if($this->uri->segment(3)!='')
		$mnth = $this->uri->segment(3);
	
	$events = $this->schedulinglib->getcelebevents($yr,$mnth);

/*
	echo "<Pre>";
	print_r($events);
	exit; 
*/
	if($events!='0')
	{
		$data['events'] = $events;
	}
	else
	{
		$data['events'] = array();	
	}

	$this->load->library('calendar',$prefs);
	
			$this->load->view('Admin/view-celebrations',$data);		
		$this->load->view(FOOTER);	
	}
	
	
	//viewcelebration ends here

public function addexam()
{
		$this->load->view(HEADER);	
		
		$prefs['template'] = array(
        'table_open'           => '<table class="calendar">',
        'cal_cell_start'       => '<td class="day">',
        'cal_cell_start_today' => '<td class="day today">',
);

	$prefs['start_day']    = 'sunday';
	$prefs['month_type']    = 'long';
	$prefs['day_type']    = 'short';

	$this->load->library('calendar',$prefs);

	$data['classes'] = $this->Commonmodel->getrows($table='newclass',$cond=array(),$order_by='',$order_by_field='',$limit='');

	$data['whichexam'] = $this->Commonmodel->getrows($table='whichexam',$cond=array(),$order_by='',$order_by_field='',$limit='');
		
	$this->load->view('Admin/add-exam',$data);	
	
	/*
	
	$login = 'info@luxevacationproperties.com';
	$password = 'vreasy12345';
	
	//$url = 'https://www.vreasy.com/api/properties/124815';
	
	$url = 'https://www.vreasy.com/api/listings/124816';
	
	//$url="https://www.vreasy.com/api/rates?property_id=124815&listing_id=124816&date_start=22-06-2017&date_end=23-06-2017";
	//$url="https://www.vreasy.com/api/rate-updates?listing_id=124816";
	
	//$url = 'https://www.vreasy.com/api/quotes/124816?checkin=15-06-2017&checkout=22-06-2017';
	
	//$url="https://www.vreasy.com/api/rates?date_end=2017-04-09&date_start=2017-04-06&property_id=124815";
	
	$url="https://www.vreasy.com/api/properties?expand=location";
	
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL,$url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
	curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
	curl_setopt($ch, CURLOPT_USERPWD, "$login:$password");
	$result = curl_exec($ch);
	
	if($result === false)
	{
		echo 'Curl error: ' . curl_error($ch);
	}  
	else
	{
		echo "<pre>";
		print_r(json_decode($result));
		echo "</pre>";
	}
		exit;
		*/
		$this->load->view(FOOTER);
		
			
}//add exam schedule starts here

public function viewexamschedules()
{
	
	$this->load->view(HEADER);	
	
	
		$prefs['template'] = array(
        'table_open'           => '<table class="calendar">',
        'cal_cell_start'       => '<td class="day">',
        'cal_cell_start_today' => '<td class="day today">',
);

	$prefs['start_day']    = 'Sunday';
	$prefs['month_type']    = 'long';
	$prefs['day_type']    = 'short';

	//get the events 
	$yr = date('Y');
	$mnth=date('m');
	

	if($this->uri->segment(3)!='')
		$mnth = $this->uri->segment(3);
	
	#echo $mnth; exit; 
	
	$schedules = $this->schedulinglib->getscheduledexams($yr,$mnth);


if($schedules!='0')
	{
		$data['schedules'] = $schedules;
	}
	else
	{
		$data['schedules'] = array();	
	}

	$this->load->library('calendar',$prefs);
	
	
		$this->load->view('Admin/view-exam-schedules',$data);
	$this->load->view(FOOTER);
}
	
	}//class ends here
