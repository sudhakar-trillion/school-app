<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Parents extends CI_Controller 
{

	 public function __construct()
		{

			
			parent::__construct();
			date_default_timezone_set("Asia/Kolkata");
			define('HEADER','Parent/header');
			define('FOOTER','Parent/footer');
			
			$this->load->model('Commonmodel');
	
// check whether user log in or not starts here

			if($this->uri->segment(1)!='parent' && $this->session->userdata('StudentId')=='')
				redirect(base_url('parent'));

//ends here	
	
	$requested_from =  @$_SERVER['HTTP_REFERER'];

	define('HTTP_REFERER',$requested_from);
	
			
if( strpos($requested_from, 'localhost') !== false || strpos($requested_from, '192.168.0.5') !== false )
{
	
	if( $this->uri->segment(2)!='parent')
	{
			if( $this->session->userdata('parent')==''  )
			{
				$parentname = $this->checkparentdetails();
				$this->session->set_userdata('parent',$parentname);
			}
			else
			{
				if($this->session->userdata('StudentId')=='')
				{
					
				}
				else
				{
					$cond = array();
					$table ='notifications';
			
					$StudentId = $this->session->userdata('StudentId');
					$Status = 'Unread';
			
					$where = "StudentId=".$StudentId." AND status='".$Status."' AND (DATEDIFF(CURRENT_DATE(), DATE(AddedOn)) >= 2 OR DATEDIFF(CURRENT_DATE(), DATE(AddedOn)) >= 0)";
			
					$this->db->where($where);
					$New_Notifications = $this->db->get($table);
			
					if($New_Notifications!='0')
						define("New_Notifications",$New_Notifications->num_rows() );
					else
						define("New_Notifications", '0' );	
					}
				}
			
	}
	
}
else if(strpos(HTTP_REFERER, 'adiakshara.in') !== false)
{
	if( $this->uri->segment(1)!='parent')
	{
		
		
			if( $this->session->userdata('parent')=='')
			{
				$parentname = $this->checkparentdetails();
				$this->session->set_userdata('parent',$parentname);
			}
			
			$cond = array();
			$table ='notifications';
			
			$StudentId = $this->session->userdata('StudentId');
			$Status = 'Unread';
			
			$where = "StudentId=".$StudentId." AND status='".$Status."' AND (DATEDIFF(CURRENT_DATE(), DATE(AddedOn)) >= 2 OR DATEDIFF(CURRENT_DATE(), DATE(AddedOn)) >= 0)";
			
			$this->db->where($where);
			$New_Notifications = $this->db->get($table);
			
			if($New_Notifications!='0')
				define("New_Notifications",$New_Notifications->num_rows() );
			else
				define("New_Notifications", '0' );
		}
	}
}
		
	public function checkparentdetails()
	{
		$cond = array();
		$table = 'parentdetails';
		
		$cond['StudentId'] = $this->session->userdata('StudentId');
		
		$Parentname = $this->Commonmodel->getAfield($table,$cond,$field='FatherName',$order_by='',$order_by_field='',$limit='');
		return $Parentname;
		
	}
		

	public function loadformrules($configItem)
	{
		return $this->config->item($configItem);
	}

		
	public function pagenotfound()
	{
		$this->load->view(HEADER,$data[New_Notifications]);
		$this->load->view('Parent/pagenotfound');
		$this->load->view(FOOTER);	
	}
	
	public function login()
	{
		$cond=array();
		$data['classes'] = $this->Commonmodel->getrows($table='newclass',$cond,$order_by='',$order_by_field='',$limit='');
		$this->load->view('Parent/login',$data);
	}
	
	public function dashboard()
	{
		$data = array();
		$data['New_Notifications'] = New_Notifications;	
		
		
		$this->load->view(HEADER,$data);
		$this->load->view(FOOTER);	
	}
	
	public function vieweditprofile()
	{
		$data = array();
		$data['New_Notifications'] = New_Notifications;	
		$this->load->view(HEADER,$data);
		
		$cond = array();
		$table = 'parentdetails';
		$cond['StudentId'] = $this->session->userdata('StudentId');
		
		if( $this->Commonmodel->checkexists($table,$cond))
		{
			$data['parent_details'] = $this->Commonmodel->get_single_row($table,$cond,$order_by='',$order_by_field='',$limit='');
		}
		else
		{
			$data['parent_details'] = '0';
		}
		
		if( $this->input->post('update_profile') )
		{
			$this->form_validation->set_rules($this->loadformrules('AddParentProfile'));
			
			if( $this->form_validation->run() === false)
			{
				$this->load->view('Parent/view-edit-profile',$data);
			}
			else
			{
				$table = 'parentdetails';
				if( $this->input->post('edit_add') =='add')
				{
					$insertdata = array();
					extract($_POST);
					
					$insertdata['StudentId'] = $StudentId;
					$insertdata['MotherName'] = $MotherName;
					
					$insertdata['FatherName'] = $FatherName;
					$insertdata['MotherHighestDegree'] = $MotherHighestDegree;
					
					$insertdata['FatherHighestDegree'] = $FatherHighestDegree;
					$insertdata['MotherOccupation'] = $MotherOccupation;
					
					$insertdata['FatherOccupation'] = $FatherOccupation;
					$insertdata['ContactNumber1'] = $ContactNumber1;
				
					$insertdata['ContactNumber2'] = $ContactNumber2;
					
					$insertdata['Address'] = $Address;
					$insertdata['Lastupdated'] = time();
					
					if( $this->Commonmodel->insertdata($table,$insertdata))
					{
						$msg = "<div class='alert alert-succes'><b>Parent profile created successfully</b></div>";	
						$this->session->set_flashdata('parentprofile',$msg);
					}
					else
					{
						$msg = "<div class='alert alert-danger'><b>Unable to create parent profile</b></div>";	
						$this->session->set_flashdata('parentprofile',$msg);
					}
					redirect(base_url('view-edit-profile'));
					
				}
				else
				{
					$setdata = array();
					$cond =array();
					
					extract($_POST);
					
					$cond['StudentId'] = $StudentId;
					
					$setdata['MotherName'] = $MotherName;
					
					$setdata['FatherName'] = $FatherName;
					$setdata['MotherHighestDegree'] = $MotherHighestDegree;
					
					$setdata['FatherHighestDegree'] = $FatherHighestDegree;
					$setdata['MotherOccupation'] = $MotherOccupation;
					
					$setdata['FatherOccupation'] = $FatherOccupation;
					$setdata['ContactNumber1'] = $ContactNumber1;
				
					$setdata['ContactNumber2'] = $ContactNumber2;
					
					$setdata['Address'] = $Address;
					$setdata['Lastupdated'] = time();
					
					if( $this->Commonmodel->updatedata($table,$setdata,$cond))
					{
						$msg = "<div class='alert alert-success'><b>Parent profile updated successfully</b></div>";	
						$this->session->set_flashdata('parentprofile',$msg);
					}
					else
					{
						$msg = "<div class='alert alert-danger'><b>Unable to update parent profile</b></div>";	
						$this->session->set_flashdata('parentprofile',$msg);
					}
					redirect(base_url('view-edit-profile'));
					
				}
			}
			
		}
		else
			$this->load->view('Parent/view-edit-profile',$data);
		
		$this->load->view(FOOTER);
	}
	

//vieweditchildprofile starts here

	public function vieweditchildprofile()
	{
		/*
		echo "<pre>";
		print_r($_SERVER);
		exit;
		*/
		$data = array();
		$data['New_Notifications'] = @New_Notifications;	
		$this->load->view(HEADER,$data);
		
		//get the student first,last and bloodgroup
		
		$cond = array();
		$cond['StudentId'] = $this->session->userdata('StudentId');
		$table = 'students';
		$fields='Student, LastName, BloodGroup,ProfileIPic';
		
		$data['student_details'] = $this->Commonmodel->getRows_fields($table,$cond,$fields,$order_by='',$order_by_field='',$limit='');
		
		//get the Hobbies of this student
		
		$table = 'studenthobbies';
		$fields= 'Hobby,HobbyId';
		$data['hobbies_details'] = $this->Commonmodel-> getRows_fields($table,$cond,$fields,$order_by='ASC',$order_by_field='HobbyId',$limit='');
		
		//get the extracircular activities
		
		$table='extracircularactivities';
		$fields='ExtraActivity,ExtracActId';
		$data['Extracircular_details'] = $this->Commonmodel-> getRows_fields($table,$cond,$fields,$order_by='ASC',$order_by_field='ExtracActId',$limit='');
		
		//get the Identification Marks
		
		$table='identificationmarks';
		$fields='IdentificationMark,Markid';
		$data['identificationmarks_details'] = $this->Commonmodel-> getRows_fields($table,$cond,$fields,$order_by='ASC',$order_by_field='Markid',$limit='');
		
		//get the parent details
		$cond = array();
		$cond['StudentId'] = $this->session->userdata('StudentId');
		$table = 'parentdetails';
		
		
		$fields='*';
		$data['parent_details'] = $this->Commonmodel-> getRows_fields($table,$cond,$fields,$order_by='ASC',$order_by_field='ParentId',$limit='');
		
		
			$this->load->view('Parent/view-edit-child-profile',$data);	
		$this->load->view(FOOTER);
	}

//vieweditchildprofile ends hree
	
	public function viewadminnotifications()
	{
		$data = array();
		$data['New_Notifications'] = New_Notifications;	
		$this->load->view(HEADER,$data);
		
		if( strpos(HTTP_REFERER, 'localhost') !== false )
		{
			if($this->uri->segment(2)!='')
			$this->session->set_userdata('collapse','');	
		}
		else if(strpos(HTTP_REFERER, 'adiakshara.in') !== false)	
		{
			if($this->uri->segment(2)!='')
			$this->session->set_userdata('collapse','');	
		}
			
		
		$table='notifications'; 
		
		$cond=array();
		
		$cond['noti.StudentId'] =  $this->session->userdata('StudentId');
		
		$baseurl='view-admin-notifications';
		$perpage=10;
		$order_by_field='NotificationId';
		$datastring='Notifications';
		$pagination_string = 'pagination_string';

		$AddedBy='Admin';
		$data = $this->tsmpaginate->notifstudentspagination($table,$cond,$baseurl,$perpage,$order_by_field,$datastring,$pagination_string,$AddedBy);
		
		$data['classes'] = $this->Commonmodel->getrows($table='newclass',array(),$order_by='',$order_by_field='',$limit='');
		$data['perpage']= $perpage;
		
		if($data['Notifications']=='0' )
		{
			$data['routeto'] = 'parent-dashboard';
			$this->load->view('Parent/pagenotfound',$data);
		}
		else
		$this->load->view('Parent/view-admin-notifications',$data);
		
		$this->load->view(FOOTER);
	}
	
	public function addnotification()
	{
			
		$data = array();
		$data['New_Notifications'] = New_Notifications;	
		$this->load->view(HEADER,$data);
		
		if( strpos(HTTP_REFERER, 'localhost') !== false )
		{
			if($this->uri->segment(2)!='')
			$this->session->set_userdata('collapse','');	
		}
		else if(strpos(HTTP_REFERER, 'adiakshara.in') !== false)	
		{
			if($this->uri->segment(2)!='')
			$this->session->set_userdata('collapse','');	
		}
			
		
		$table='notifications'; 
		
		$cond=array();
		
		$cond['noti.StudentId'] =  $this->session->userdata('StudentId');
		
		$baseurl='add-notification';
		$perpage=10;
		$order_by_field='NotificationId';
		$datastring='Notifications';
		$pagination_string = 'pagination_string';

		$AddedBy='Admin';
		$data = $this->tsmpaginate->notifstudentspagination($table,$cond,$baseurl,$perpage,$order_by_field,$datastring,$pagination_string,$AddedBy);
		
		$data['classes'] = $this->Commonmodel->getrows($table='newclass',array(),$order_by='',$order_by_field='',$limit='');
		$data['perpage']= $perpage;
		
		if($data['Notifications']=='0' )
		{
			$data['routeto'] = 'parent-dashboard';
			$this->load->view('Parent/pagenotfound');
		}
		else
		$this->load->view('Parent/add-notification',$data);
			
			$this->load->view(FOOTER);
			
	}
	
	public function viewstudentactivities()
	{
		
		$data = array();
		$data['New_Notifications'] = New_Notifications;	
		$this->load->view(HEADER,$data);
		
		$data = array();
		$cond=array();
		
		$cond['ClassSlno']  = $this->session->userdata('ClassSlno');
		$cond['ClassSection']  = $this->session->userdata('ClassSection');
		$cond['StudentId']  = $this->session->userdata('StudentId');
		
		$total_events = $this->Commonmodel->getArchieveEvents();

		if($total_events['Events_exists']=="Yes")
			$data['events'] = 	$total_events['Event'];
		else
			$data['events'] = 	array();
			
		//get the latest event pictures
		
		$latest_event = $this->Commonmodel->getLatestPics();
		if($latest_event!='0')
		{
			$data['latest_event'] = $latest_event;
			$this->load->view('Parent/view-student-activities',$data);
		}
		else
		{
			$this->load->view('Parent/no-student-activities',$data);
		}

		$this->load->view(FOOTER);
		
	}
	
	//Show all the home works till now and show the latest one first.
	
	public function showhomeworks()
	{
		$data = array();
		$data['New_Notifications'] = New_Notifications;	
		$this->load->view(HEADER,$data);
		
		
		$this->load->view(HEADER,$data);
		
		$this->load->view('Parent/show-home-works');

		$this->load->view(FOOTER);
		
	}
	
	
	//Show all the home works till now and show the latest one first. ends here

public function viewexamschedules()
{
	
		$data = array();
		$data['New_Notifications'] = @New_Notifications;	
		$this->load->view(HEADER,$data);
		
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
	$mnth=06;
	
	if($this->uri->segment(3)!='')
	{
		$mnth = $this->uri->segment(3);
		
	}

	$schedules = $this->schedulinglib->getscheduledexams($yr,$mnth);

/*
	echo "<pre>";
	print_r($schedules);
	echo "</pre>";
*/

if($schedules!='0')
	{
		$data['schedules'] = $schedules;
	}
	else
	{
		$data['schedules'] = array();	
	}

	$this->load->library('calendar',$prefs);
	
	
		$this->load->view('Parent/view-exam-schedules',$data);
	$this->load->view(FOOTER);
}
	

//event starts here

public function viewevents()
{
		$data = array();
		$data['New_Notifications'] = @New_Notifications;	
		$this->load->view(HEADER,$data);

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
	$mnth=06;
	
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
	
			$this->load->view('Parent/view-celebrations',$data);		
		$this->load->view(FOOTER);	
	
	
}

//event ends here

//viewtransportdetails starts here

public function viewtransportdetails()
{
	$data = array();
	$data['New_Notifications'] = @New_Notifications;	
	
	$this->load->view(HEADER,$data);
	
	$this->load->view(FOOTER);	
}

//viewtransportdetails ends here

//payschoolfee starts here

	public function payschoolfee()
	{
		/*
		echo "<pre>";
		print_r($this->session);
		exit;
		*/
		$data = array();
		$data['New_Notifications'] = @New_Notifications;	
	
		$this->load->view(HEADER,$data);
		
		$cond['Class'] = $this->session->userdata('CLASS');

		$currentMnth = date('n');
		
		if( $currentMnth>5 && $currentMnth<=12 )
		{
		$prevyr = date('Y');
		$nextyr = date('Y')+1;
		$academicYr = 	$prevyr."-".$nextyr;
		}
		else
		{
		$prevyr = date('Y')-1;
		$nextyr = date('Y');
		$academicYr = 	$prevyr."-".$nextyr;
		}
											
											
		$cond['AcademicYear'] = $academicYr;
		$table='schoolfee';
		$field='MonthlyFee';
		
		$MonthlyFee = $this->Commonmodel->getAfield($table,$cond,$field,$order_by='',$order_by_field='',$limit='');		

		$data['MonthlyFee'] = $MonthlyFee;
		
		
		if( $this->input->post('PayFee') )
		{
			
			$this->form_validation->set_rules( $this->loadformrules('payfee') );
			
			if( $this->form_validation->run() === false )
			{
				$data['selectedClass'] = $this->input->post('ClassName');
				
				if( $this->input->post('ClassName')!='0')
				{
					$cond=array();
					$cond['ClassSlno'] = $this->input->post('ClassName');
					$table = 'sections';
					
					$sections = $this->Commonmodel->getRows_fields($table,$cond,$fields='Section, SectionId',$order_by='',$order_by_field='',$limit='');
					$data['Sections'] = $sections;
				}
				else
					$data['Sections'] = '0';
				
				if($this->input->post('sections')!='0' && $this->input->post('ClassName')!='0' )
				{
					$cond=array();
					$cond['ClassName'] = $this->input->post('ClassName');
					$cond['ClassSection'] = $this->input->post('sections');
					
					$table = 'students';
					
					$students = $this->Commonmodel->getRows_fields($table,$cond,$fields='StudentId, Student',$order_by='',$order_by_field='',$limit='');
					$data['Students'] = $students;
					$data['SelectedSection'] = $this->input->post('sections');
				}
				else
				{
					$data['Students'] = '0';	
					$data['SelectedSection'] = '0';
				}
				
				if($this->input->post('Rollno')!='0')
					$data['Rollno'] = $this->input->post('Rollno');
				else
					$data['Rollno'] ='0';
				
		
				$data['selectedMonth'] = $this->input->post('month');

				$data['selectedMonthlyFee'] = $this->input->post('MonthlyFee');
				
				
				$this->load->view('Parent/pay-fee',$data);		
			}
			else
			{
					$this->session->set_userdata('Feepaymentdata',$_POST);
					
					
					$datenow = date("d/m/Y h:m:s");
					$transactionDate = str_replace(" ", "%20", $datenow);
					
					$transactionId = rand(1,1000000);
					
					require('TransactionRequest.php');
					
					$transactionRequest = new TransactionRequest();
					
					//Setting all values here
					$transactionRequest->setMode("test");
					$transactionRequest->setLogin(197);
					$transactionRequest->setPassword("Test@123");
					$transactionRequest->setProductId("NSE");
					$transactionRequest->setAmount($this->input->post('MonthlyFee'));
					$transactionRequest->setTransactionCurrency("INR");
					$transactionRequest->setTransactionAmount($this->input->post('MonthlyFee'));
					/*if( strpos($requested_from, 'localhost') !== false || strpos($requested_from, '192.168.0.5') !== false)
						$transactionRequest->setReturnUrl("http://192.168.0.5/adi-akshara/parent/fee-paid");
					else
					*/
						$transactionRequest->setReturnUrl(base_url()."parent/fee-paid");
						
					
					
					$transactionRequest->setClientCode(123);
					$transactionRequest->setTransactionId($transactionId);
					$transactionRequest->setTransactionDate($transactionDate);
					$transactionRequest->setCustomerName("Test Name");
					$transactionRequest->setCustomerEmailId("test@test.com");
					$transactionRequest->setCustomerMobile("9999999999");
					$transactionRequest->setCustomerBillingAddress("Mumbai");
					$transactionRequest->setCustomerAccount("639827");
					$transactionRequest->setReqHashKey("KEY123657234");
					
					$url = $transactionRequest->getPGUrl();
					header("Location: $url");
			}
		
		}
		else
			$this->load->view('Parent/pay-fee',$data);
	$this->load->view(FOOTER);		
	}

//payschoolfee ends here


//feepaid starts here

public function feepaid()
{
	require_once 'TransactionResponse.php';
	$transactionResponse = new TransactionResponse();
	$transactionResponse->setRespHashKey("KEYRESP123657234");
	/*
	$std_details=array(
						"Rollno"=>$this->session->userdata('StudentRoll'),
						"ClassName"=>$this->session->userdata('CLASS'),
						"sections"=>$this->session->userdata('SectionId'),
						""
						);
	$this->session->set_userdata('Feepaymentdata',$std_details);
	*/

	if($transactionResponse->validateResponse($_POST) && $this->session->userdata('Feepaymentdata')!='' )
	{
		
		if( $_POST['desc'] == "Transction Success" )
		{
			$cardNo = $_POST['CardNumber'];
			$mmp_txn = $_POST['mmp_txn'];
			
			$amt = $_POST['amt'];
			$TransactionId = $_POST['ipg_txn_id'];
			
			$Feepaymentdata = $this->session->userdata('Feepaymentdata');
			
			$insertdata = array();
			
			$insertdata['StudentId'] 	= $Feepaymentdata['Rollno'];
			$insertdata['ClassId'] 		= $Feepaymentdata['ClassName'];
			
			$insertdata['SectionId']	 = $Feepaymentdata['sections'];
			
			$payingfor = date('Y').'-'.$Feepaymentdata['month'].'-'.date('d');
			
			$payingfor = date_create($payingfor);
			$payingfor = date_format($payingfor,"Y-m-d");
			
			$insertdata['Month'] = $payingfor;
			
			$insertdata['AcademicYear'] = $Feepaymentdata['AcademicYear'];
			$insertdata['Paid'] 		= $Feepaymentdata['MonthlyFee'];
			
			$cond = array();
			$table = 'schoolfee';
			
			$cond['Class'] = $Feepaymentdata['ClassName'];
			$cond['AcademicYear'] = $Feepaymentdata['AcademicYear'];
			
			$field = 'MonthlyFee';
			
			$MonthlyFee = $this->Commonmodel->getAfield($table,$cond,$field,$order_by='',$order_by_field='',$limit='');
			
			$insertdata['ActualFee'] = $MonthlyFee;

			$due = $MonthlyFee-$Feepaymentdata['MonthlyFee'];
			
			$insertdata['Due'] = $due;
			
			$insertdata['PaidOn'] = date('Y-m-d H:i:s');
			$insertdata['LastUpdated'] = time();
			
			
			$table = 'feecollection';
			$FeeCollectionId = $this->Commonmodel->insertdata($table,$insertdata);
			
			if( $FeeCollectionId>0 )
			{
				
				$insertdata = array();
				$table ='feetranasactiondetails';
				
				$insertdata['FeeCollectionId'] = $FeeCollectionId;
				$insertdata['CardNo'] = $_POST['CardNumber'];
				
				$insertdata['TransactionId'] = $_POST['ipg_txn_id'];
				$insertdata['PaidAmount'] = $_POST['amt'];
				
				$insertdata['MmpTransaction'] = $_POST['mmp_txn'];
				$insertdata['PaidOn'] = date('Y-m-d H:i:s');
				
				if( $this->Commonmodel->insertdata($table,$insertdata) )
				{
					$msg = "<div class='alert alert-success'>Payment Success, and transaction Id is ".$_POST['ipg_txn_id']."</div>";
					$this->session->set_flashdata('PaymentMessage',$msg);
					$this->session->set_userdata('Feepaymentdata','');
				}
				else
				{
					$msg = "<div class='alert alert-warning'>Payment Success but unable to save transaction details into the database</div>";
					$this->session->set_flashdata('PaymentMessage',$msg);
					$this->session->set_userdata('Feepaymentdata','');
				}
				
				
				
				
			}
			else
			{
				$msg = "<div class='alert alert-warning'>Payment Success but unable to save details into the database</div>";
				$this->session->set_flashdata('PaymentMessage',$msg);
				$this->session->set_userdata('Feepaymentdata','');
			}
			
			
			
			
		}
		else
		{
			$msg = "<div class='alert alert-danger'>Unable to pay kindly check the details properly</div>";
			$this->session->set_flashdata('PaymentMessage',$msg);
		}

		
	} 
	else 
	{
		//echo "Invalid Signature";
		
		$msg = "<div class='alert alert-danger'>!!! ou had made an invalid request !!!</div>";
		$this->session->set_flashdata('PaymentMessage',$msg);
	}
		
		
		redirect(base_url('parent/pay-fee'));
}

//feepaid ends here



//logout 

	public function logout()
	{

		$this->session->sess_destroy();
		redirect(base_url('parent'));
	}

//logout ends here


//checkfeepaid starts here
	
	public function checkfeepaid()
	{
		$cond = array();
		$table ='feecollection';
		
		$cond['StudentId'] = $this->session->userdata('StudentRoll');
		$cond['ClassId'] = $this->session->userdata('CLASS');
		$cond['SectionId'] = $this->session->userdata('SectionId');
		$cond['MONTH(Month)'] = $_POST['month'];
		$cond['AcademicYear'] = $_POST['AcademicYear'];
		
		$chk = $this->Commonmodel->checkexists($table,$cond);
	
	#echo $this->db->last_query(); exit; 
	
		if( $chk )
		{
			$Due = $this->Commonmodel->getAfield($table,$cond,$field='Due',$order_by='DESC',$order_by_field='FeeCollectionId',$limit='1');	
			if($Due>0)
				return true;
			else 
			{
				$this->form_validation->set_message('checkfeepaid',"Fee already paid for the selected month");
				return false;
			}
		}
		else
		{
			return true;
		}
		
		
			
	}

//checkfeepaid ends here

	
}//class ends here
