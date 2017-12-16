<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Managefeestructure extends CI_Controller 
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
	
	public function addfeestructure()
	{
		$this->load->view(HEADER);
		$cond = array();
		
		$data['classes'] = $this->Commonmodel->getrows($table='newclass',$cond,$order_by='',$order_by_field='',$limit='');
	
		
		if( $this->input->post('add_fee_structure') )
		{
			$this->form_validation->set_rules( $this->loadformrules('addfeestructure') );
			
			if( $this->form_validation->run() === false )
			{
				$this->load->view('Admin/add-fee-structure',$data);		
			}
			else
			{
				$table = 'schoolfee';	
				$insertdata = array();
				
				$insertdata['Class'] = $this->input->post('ClassName');
				$insertdata['AcademicYear'] = $this->input->post('AcademicYear');
				$insertdata['MonthlyFee'] = $this->input->post('MonthlyFee');
				
				$insertdata['QuarterlyFee'] = $this->input->post('QuarterlyFee');
				$insertdata['HalfyearlyFee'] = $this->input->post('HalfyearlyFee');
				$insertdata['AnnualFee'] = $this->input->post('AnnualFee');
				
				$insertdata['Lastupdated'] = time();
				
				if( $this->Commonmodel->insertdata($table,$insertdata) )
				{
					$msg = "<div class='alert alert-success'>Fee added successfully</div>";
					$this->session->set_flashdata('fee-added',$msg);
				}
				else
				{
					$msg = "<div class='alert alert-danger'>Unable to add fee structure</div>";
					$this->session->set_flashdata('fee-added',$msg);
				}
				
				redirect(base_url('add-fee-structure'));

			}
		}
		else
		$this->load->view('Admin/add-fee-structure',$data);
		
		$this->load->view(FOOTER);
	}

	public function viewfeestructure()
	{
		$this->load->view(HEADER);
		
		$table='schoolfee'; 
		$cond=array();
		$baseurl='view-fee-structure';
		$perpage=10;
		$order_by_field='FeeId';
		$datastring='feestructure';
		$pagination_string = 'pagination_string';
		
		$data = $this->tsmpaginate->feestructurepagination($table,$cond,$baseurl,$perpage,$order_by_field,$datastring,$pagination_string);
		
		$data['classes'] = $this->Commonmodel->getrows($table='newclass',$cond,$order_by='',$order_by_field='',$limit='');
		$data['perpage']= $perpage;
		
		if($data['feestructure']!='0')
			$this->load->view('Admin/view-fee-structure',$data);
		else
			{
				$data['routeto'] = 'view-fee-structure';
				$data['pgeno'] = $this->uri->segment(2); 
					$requrl = str_replace("-"," ",$this->uri->segment(1));
					$data['viewingPage'] = $requrl;
				$this->load->view('Admin/pagenotfound',$data);
			}
				
		$this->load->view(FOOTER);		
	}

	
	public function editfeestructure()
	{
		$this->load->view(HEADER);
		$cond=array();
		
		$data['classes'] = $this->Commonmodel->getrows($table='newclass',$cond,$order_by='',$order_by_field='',$limit='');	
		
		$cond = array();
		$table = 'schoolfee';
		
		$cond['FeeId'] =  $this->uri->segment(2);
		
		$feedetails = $this->Commonmodel->get_single_row($table,$cond,$order_by='',$order_by_field='',$limit='');
		if($feedetails!='0')
		{	
		
			if( $this->input->post('update_fee_structure') )
			{
				
			$this->form_validation->set_rules( $this->loadformrules('addfeestructure') );
			
			if( $this->form_validation->run() === false )
			{
				$this->load->view('Admin/add-fee-structure',$data);		
			}
			else
			{
				$table = 'schoolfee';	
				$setdata = array();
				
				$setdata['Class'] = $this->input->post('ClassName');
				$setdata['AcademicYear'] = $this->input->post('AcademicYear');
				$setdata['MonthlyFee'] = $this->input->post('MonthlyFee');
				
				$setdata['QuarterlyFee'] = $this->input->post('QuarterlyFee');
				$setdata['HalfyearlyFee'] = $this->input->post('HalfyearlyFee');
				$setdata['AnnualFee'] = $this->input->post('AnnualFee');
				
				$setdata['Lastupdated'] = time();
				
				$cond = array();
				$cond['FeeId'] =  $this->uri->segment(2);
				
				if( $this->Commonmodel->updatedata($table,$setdata,$cond) )
				{
					$msg = "<div class='alert alert-success'>Fee details updated successfully</div>";
					$this->session->set_flashdata('fee-details-updated',$msg);
				}
				else
				{
					$msg = "<div class='alert alert-danger'>Unable to update fee details structure</div>";
					$this->session->set_flashdata('fee-details-updated',$msg);
				}
				
				redirect(base_url('edit-fee-structure')."/".$this->uri->segment(2));

			}
		
			}
		
			$data['feedetails'] = $feedetails;
			$this->load->view('Admin/edit-fee-structure',$data);
		}
		else
		{
			$data['routeto'] = 'view-fee-structure';
			$this->load->view('Admin/pagenotfound',$data);	
		}
		

				
		$this->load->view(FOOTER);		
	}



//studentfeedetails starts here

	public function studentfeedetails()
	{
		$this->load->view(HEADER);
		$cond = array();
		
		$data['classes'] = $this->Commonmodel->getrows($table='newclass',$cond,$order_by='',$order_by_field='',$limit='');
		
		
		/*$this->session->set_userdata('Class_Fee','');
		$this->session->set_userdata('Section_Fee','');
		$this->session->set_userdata('Student_Fee','');	*/
		
		$cond=array();
		
		
		$table='students';
		$cond= array();
		
		
			
			$data['ClassId'] = '0';
			$data['SectionId'] = '0';
			$data['StudentId'] = '0';
			
			if( $this->input->post('GetFee'))	
			{
			
		
		
			
			//	echo "hey"; 
				if( $this->input->post('ClassName')!='0' )	
				{
				
					if( $this->input->post('sections')!='0')	
					{
				//		echo $this->input->post('sections'); 
						
						if( $this->input->post('Rollno')!='0')	
						{
							$data['ClassId'] = $this->input->post('ClassName');
							$data['SectionId'] = $this->input->post('sections');
							$data['StudentId'] = $this->input->post('Rollno');
							
							$cond['ClassName'] = $this->input->post('ClassName');
							$cond['ClassSection'] = $this->input->post('sections');
							$cond['StudentId'] = $this->input->post('Rollno');
							
							$this->session->set_userdata('Class_Fee',$this->input->post('ClassName'));
							$this->session->set_userdata('Section_Fee',$this->input->post('sections'));
							$this->session->set_userdata('Student_Fee',$this->input->post('Rollno'));
							
							$StudentNaam = $this->Commonmodel->getAfield('students',array("StudentId"=>$this->session->userdata('Student_Fee')),$field='Student',$order_by='',$order_by_field='',$limit='');
				$this->session->set_userdata('StudentNaam',$StudentNaam);
				
				$SectionNaam = $this->Commonmodel->getAfield('sections',array("SectionId"=>$this->session->userdata('Section_Fee')),$field='Section',$order_by='',$order_by_field='',$limit='');
				$this->session->set_userdata('SectionNaam',$SectionNaam);
				
				$ClassNaam = $this->Commonmodel->getAfield('newclass',array("SLNO"=>$this->session->userdata('Class_Fee')),$field='ClassName',$order_by='',$order_by_field='',$limit='');
				$this->session->set_userdata('Classnaam',$ClassNaam);
							
							
						}// if class  section and student
						else
						{
							$data['ClassId'] = $this->input->post('ClassName');
							$data['SectionId'] = $this->input->post('sections');
	
							$cond['ClassName'] = $this->input->post('ClassName');
							$cond['ClassSection'] = $this->input->post('sections');
							
							$this->session->set_userdata('Class_Fee',$this->input->post('ClassName'));
							$this->session->set_userdata('Section_Fee',$this->input->post('sections'));
							$this->session->set_userdata('StudentNaam','');
							$this->session->set_userdata('Student_Fee','');
							
							$SectionNaam = $this->Commonmodel->getAfield('sections',array("SectionId"=>$this->session->userdata('Section_Fee')),$field='Section',$order_by='',$order_by_field='',$limit='');
				$this->session->set_userdata('SectionNaam',$SectionNaam);
				
				$ClassNaam = $this->Commonmodel->getAfield('newclass',array("SLNO"=>$this->session->userdata('Class_Fee')),$field='ClassName',$order_by='',$order_by_field='',$limit='');
				$this->session->set_userdata('Classnaam',$ClassNaam);

							
						}//only class and section
				}//if only class 
				else
				{
						$data['ClassId'] = $this->input->post('ClassName');
						$cond['ClassName'] = $this->input->post('ClassName');
						$this->session->set_userdata('Class_Fee',$this->input->post('ClassName'));
						$this->session->set_userdata('Section_Fee','');
						$this->session->set_userdata('SectionNaam','');
						
						$ClassNaam = $this->Commonmodel->getAfield('newclass',array("SLNO"=>$this->session->userdata('Class_Fee')),$field='ClassName',$order_by='',$order_by_field='',$limit='');
				$this->session->set_userdata('Classnaam',$ClassNaam);

				}
			}	
			
		}
		else
		{

			if($this->session->userdata('Class_Fee')!='')
			{
				$cond['ClassName'] = $this->session->userdata('Class_Fee');
				$data['ClassId'] = $this->session->userdata('Class_Fee');
				
				//this is for showing the filters
				$ClassNaam = $this->Commonmodel->getAfield('newclass',array("SLNO"=>$this->session->userdata('Class_Fee')),$field='ClassName',$order_by='',$order_by_field='',$limit='');
				$this->session->set_userdata('Classnaam',$ClassNaam);
			}
			else
				$this->session->set_userdata('Classnaam','');
			
			if($this->session->userdata('Section_Fee')!='')
			{
					$cond['ClassSection'] = $this->session->userdata('Class_Fee');
					$data['SectionId'] = $this->session->userdata('Section_Fee');
					
					$SectionNaam = $this->Commonmodel->getAfield('sections',array("SectionId"=>$this->session->userdata('Section_Fee')),$field='Section',$order_by='',$order_by_field='',$limit='');
				$this->session->set_userdata('SectionNaam',$SectionNaam);

			}
			else
				$this->session->set_userdata('SectionNaam','');
			
				
			
			if( $this->session->userdata('Student_Fee')!='' )
			{	
				$cond['StudentId'] = $this->session->userdata('Student_Fee');
				$data['StudentId'] = $this->session->userdata('Student_Fee');
				
				$StudentNaam = $this->Commonmodel->getAfield('students',array("StudentId"=>$this->session->userdata('Student_Fee')),$field='Student',$order_by='',$order_by_field='',$limit='');
				$this->session->set_userdata('StudentNaam',$StudentNaam);
			}
			else
				$this->session->set_userdata('StudentNaam','');
			
		}
		
		
		
		
		
		
		$perpage=20;	
		$total_rows = $this->Commonmodel->getnumRows($table,$cond);
		$config['base_url'] = base_url('view-students-fee-details/');
		$config['total_rows'] = $total_rows;
		$config['per_page'] = $perpage;	
		$config['uri_segment'] = 2;
		$config['use_page_numbers'] = TRUE;
		
	/* Pagination configuration style starts here */
	
		$config['full_tag_open'] = '<div><ul class="pagination">';
		$config['full_tag_close'] = '</ul></div><!--pagination-->';
		$config['first_link'] = '&laquo; First';
		$config['first_tag_open'] = '<li class="prev page">';
		$config['first_tag_close'] = '</li>';
		$config['last_link'] = 'Last &raquo;';
		$config['last_tag_open'] = '<li class="next page">';
		$config['last_tag_close'] = '</li>';
		$config['next_link'] = 'Next &rarr;';
		$config['next_tag_open'] = '<li class="next page">';
		$config['next_tag_close'] = '</li>';
		$config['prev_link'] = '&larr; Previous';
		$config['prev_tag_open'] = '<li class="prev page">';
		$config['prev_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="active"><a href="">';
		$config['cur_tag_close'] = '</a></li>';
		$config['num_tag_open'] = '<li class="page">';
		$config['num_tag_close'] = '</li>';
		// $config['display_pages'] = FALSE;
		// 
		$config['anchor_class'] = 'follow_link';
		
	/* Pagination configuration style ends here */		
		
		$this->pagination->initialize($config);
		
		$data['page'] = ($this->uri->segment(2)) ? (($this->uri->segment(2))) : 0;
		
		$limit = $config["per_page"];

		if($data['page']==0)
		$start = 0;
		else
		$start = ($data['page']-1)*$config["per_page"];
		
		
		$Students = $this->Commonmodel->paginate($table,$cond,$order_by='ASC',$order_by_field='ClassName',$limit,$start );
		
		
		if($Students=='0')
		{
			if( $this->uri->segment(2)!='' && $this->uri->segment(2)>2)	
			{
				
				$prevPage = ceil($total_rows/$perpage);
				
				$data['routeto'] = 'view-students-fee-details/'.$prevPage;
				
				$data['pgeno'] = $this->uri->segment(2); 
					$requrl = str_replace("-"," ",$this->uri->segment(1));
					$data['viewingPage'] = $requrl;
				$this->load->view('Admin/pagenotfound',$data);	
			}
			else
			{
				$data['routeto'] = 'dashboard';
				
				$data['pgeno'] = $this->uri->segment(2); 
					$requrl = str_replace("-"," ",$this->uri->segment(1));
					$data['viewingPage'] = $requrl;
				$this->load->view('Admin/pagenotfound',$data);	
			}
		}
		else
		{
			$data['Students'] = $Students;
			
			
			$data['pagination_string'] = $this->pagination->create_links();	
			
			$data['perpage'] = 	$perpage;	
			
			
			if( $this->input->post('Month')!='' && $this->input->post('Month')>0 )
			{
				//create the month name form the numberic month
				
				$monthNum  = $this->input->post('Month');
				$dateObj   = DateTime::createFromFormat('!m', $monthNum);
				$monthName = $dateObj->format('F'); // March
				
				$this->session->set_userdata('SelMonth',$monthNum);
				
				$data['SelMonth'] = $monthName;
			}
			else
			{
				if( $this->session->userdata('SelMonth')!='' )
				{
					$monthNum  = $this->session->userdata('SelMonth');
					$dateObj   = DateTime::createFromFormat('!m', $monthNum);
					$monthName = $dateObj->format('F'); // March
					
					$this->session->set_userdata('SelMonth',$monthNum);
					
					$data['SelMonth'] = $monthName;	
				}
				else
				$data['SelMonth'] = '0';
			}
				
		
		
		
		
		if( $this->session->userdata('Class_Fee')!='' )
			{
				$cond = array();
				
				if($this->session->userdata('Section_Fee')!='')
				{
					$cond = array();
					if( $this->session->userdata('Student_Fee')!='' )
					{
						$cond = array();
						$cond['ClassSlno'] = $this->session->userdata('Class_Fee');
						
						$table = 'sections';
						
						$data['SelectedClassSections'] =  $this->Commonmodel->getrows($table='sections',$cond,$order_by='',$order_by_field='',$limit='');
						
						$cond= array();
						
						$cond['ClassName'] = $this->session->userdata('Class_Fee');
						$cond['ClassSection'] = $this->session->userdata('Section_Fee');
						
						$data['SelectedStd'] =  $this->Commonmodel->getrows($table='students',$cond,$order_by='',$order_by_field='',$limit='');
						$data['Student'] = $this->session->userdata('Student_Fee');
						
					}
					else
					{
						$cond = array();
						$cond['ClassSlno'] = $this->session->userdata('Class_Fee');
						
						$table ='sections';
						
						$data['SelectedClassSections'] =  $this->Commonmodel->getrows($table,$cond,$order_by='',$order_by_field='',$limit='');
						
						$cond= array();
						
						$cond['ClassName'] = $this->session->userdata('Class_Fee');
						$cond['ClassSection'] = $this->session->userdata('Section_Fee');
						
						$data['SelectedStd'] =  $this->Commonmodel->getrows($table='students',$cond,$order_by='',$order_by_field='',$limit='');
						$data['Student'] = '0';
						
							
					}
				}
				else
				{
					$cond['ClassSlno'] = $this->session->userdata('Class_Fee');
					$table = 'sections';
					$data['SelectedClassSections'] =  $this->Commonmodel->getrows($table='sections',$cond,$order_by='',$order_by_field='',$limit='');
				}
			}
		
		
		
			$this->load->view('Admin/studentfeedetails',$data);
		}
		$this->load->view(FOOTER);
	}

///studentfeedetails ends here


//pending fee details starts here 

	public function studentpendingfeedetails()
	{
		$this->load->view(HEADER);
		$AcademicYear = $this->schedulinglib->getAcademicyear();
		
		$Feetocollect=0;
		
		
		$qry = $this->db->query('SELECT count(*) TotalStudents, ClassName  FROM `students` where AcademicYear="'.$AcademicYear.'" GROUP by ClassName');
		foreach( $qry->result() as $fee)
		{
			$qrey = $this->db->query("select MonthlyFee from schoolfee where Class=".$fee->ClassName." and AcademicYear='".$AcademicYear."'");	
			
			foreach(  $qrey->result() as $FeeFixed)
			{
				$Feetocollect = $Feetocollect+(($FeeFixed->MonthlyFee)*$fee->TotalStudents);	
			}
			
		}
		
		$data=array();
		$CurrentMnth = date('m');
		
		
		 			$this->db->select("MonthNumber,MonthName");
//					$this->db->where("MonthNumber",date('m'));
		$Feemnths = $this->db->get('monthsname');
		
		$pendingFeedetails=array();

		foreach( $Feemnths->result() as $mnths)
		{
		
			if( $CurrentMnth<=4 )
				$yr = date('Y')-1;
			else
				$yr = date('Y');
				
			//get the total fee paid by the month
			
			$qrey = $this->db->query("SELECT sum(Paid) PaidFee from feecollection where Month like '".$yr.'-'.date('m')."%' and  AcademicYear='".$AcademicYear."'");	
		if($qrey->num_rows()>0)
		{
		foreach(  $qrey->result() as $FeeColl)
			{
				$TotalFeeCollected = $FeeColl->	PaidFee;
			}
		}
		else
			$TotalFeeCollected=0;
			
			
			$PendingFeeMonth = $Feetocollect-$TotalFeeCollected;
			$pendingFeedetails[] = array(
											"Month"=>$mnths->MonthName,
											"MonthNumber"=>$mnths->MonthNumber,
											"ActualFee"=>$Feetocollect,
											"TotalFeeCollected"=>$TotalFeeCollected,
											"PendingFeeMonth"=>$PendingFeeMonth
										);	
		}
				
		$data['pendingFeedetails'] = $pendingFeedetails;
		
	
		$this->load->view('Admin/studentPendingfeedetails',$data);
		$this->load->view(FOOTER);
		
	}

//pending fee details ends here 
 

//pay the student fee

	public function payfee()
	{
		$this->load->view(HEADER);
		$cond = array();
		
		$data['classes'] = $this->Commonmodel->getrows($table='newclass',$cond,$order_by='',$order_by_field='',$limit='');
		
		$data['SelectedSection'] = '0';
		$data['selectedClass'] = '0';
		
		$data['Rollno'] ='0';
		$data['Students'] = '0';
		
		$data['Sections'] = '0';
		
		
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
				
				/*
				$data['selectedSection'] = $this->input->post('sections');
				
				$data['selectedRollno'] = $this->input->post('Rollno');
				
				*/
				$data['selectedMonth'] = $this->input->post('month');

				$data['selectedMonthlyFee'] = $this->input->post('MonthlyFee');
				
				
				$this->load->view('Admin/pay-fee',$data);		
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
				
					//$transactionRequest->setReturnUrl("http://192.168.0.5/adi-akshara/fee-paid");
					/*if( strpos($requested_from, 'localhost') !== false || strpos($requested_from, '192.168.0.5') !== false )
						$transactionRequest->setReturnUrl("http://192.168.0.5/adi-akshara/parent/fee-paid");
					else
					*/
						$transactionRequest->setReturnUrl(base_url()."fee-paid");
					
					
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
		$this->load->view('Admin/pay-fee',$data);
		
		$this->load->view(FOOTER);	
	}

//pay the student fee ends hre


//feepaid starts here

public function feepaid()
{
	require_once 'TransactionResponse.php';
	$transactionResponse = new TransactionResponse();
	$transactionResponse->setRespHashKey("KEYRESP123657234");
	

	if($transactionResponse->validateResponse($_POST) && $this->session->userdata('Feepaymentdata')!='' )
	{
		
		if( $_POST['desc'] == "Transction Success" )
		{
			
			$cardNo = $_POST['CardNumber'];
			$mmp_txn = $_POST['mmp_txn'];
			
			$amt = $_POST['amt'];
			$TransactionId = $_POST['ipg_txn_id'];
			
			$Feepaymentdata = $this->session->userdata('Feepaymentdata');
			
			
			switch($Feepaymentdata['month'])
			{
				case "01":
					$PaidMonth = "January";
				break;	
				
				case "02":
					$PaidMonth = "February";
				break;	
				
				case "03":
					$PaidMonth = "March";
				break;	
				
				case "04":
					$PaidMonth = "April";
				break;	
				
				case "05":
					$PaidMonth = "May";
				break;	
				
				case "06":
					$PaidMonth = "June";
				break;	
				
				case "07":
					$PaidMonth = "July";
				break;	
				
				case "08":
					$PaidMonth = "August";
				break;	
				
				case "09":
					$PaidMonth = "September";
				break;	
				
				case "10":
					$PaidMonth = "October";
				break;	
				
				case "11":
					$PaidMonth = "November";
				break;	
				case "12":
					$PaidMonth = "December";
				break;	
				
				default:
					$PaidMonth = "January";
				break;	
			}
			
			
			$cond1=array();
			
			
			$cond1['StudentId'] 	= $Feepaymentdata['Rollno'];
			$table = 'parentdetails';
			
			$contactNumber= $this->Commonmodel->getAfield($table,$cond1,$field='ContactNumber1',$order_by='',$order_by_field='',$limit='');
			
			
			if( trim($contactNumber)!='')
				$contactNumber = trim($contactNumber);
			else
				$contactNumber = '8498081693';
			
			$contactNumber = '8498081693'; //for testing purpose i had given my number 
			$message = " Dear Parent, we have recieved Rs. ".$_POST['amt']." towards ".$PaidMonth." fee, Thank you. Adi Akashara ";
			
			$url = "http://onlinebulksmslogin.com/spanelv2/api.php"; 
			$from='AdiAks';
			 
			$request="username=adiakshara&password=preschool123&to=".$contactNumber."&from=$from&message=".urlencode($message);	
			
			//return $request;  
			
			$ch = curl_init($url);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_POST, true);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $request);

			if($contactNumber != '8498081693')	
			{
				$resuponce=curl_exec($ch);
				curl_close($ch);
			}	

			$insertdata = array();
			
			$insertdata['StudentId'] 	= $Feepaymentdata['Rollno'];
			$insertdata['ClassId'] 		= $Feepaymentdata['ClassName'];
			
			$insertdata['SectionId'] 	= $Feepaymentdata['sections'];
			
			if( $Feepaymentdata['month']=="02")
			{
				if( date("d")>28)	
					$payingfor = date('Y').'-'.$Feepaymentdata['month'].'-28';
				else
					$payingfor = date('Y').'-'.$Feepaymentdata['month'].'-'.date('d');
			}
			else
			{
				if( date('d')>31)
					$payingfor = date('Y').'-'.$Feepaymentdata['month'].'-30';
				else
					$payingfor = date('Y').'-'.$Feepaymentdata['month'].'-'.date('d');
				
			}
			
			
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

		
			$cond = array();
			
			$cond['StudentId'] =  $Feepaymentdata['Rollno'];
			$cond['ClassId'] = $Feepaymentdata['ClassName'];
			
			$cond['SectionId'] = $Feepaymentdata['sections'];
			$cond['Month'] = $payingfor;
			
			
			$field = 'Due';
			
			$Due = $this->Commonmodel->getAfield('feecollection',$cond,$field,$order_by='DESC',$order_by_field='FeeCollectionId',$limit='1');

			if($Due>0)
			{
				$due = $Due-$_POST['amt'];
			}
			else
				$due= $MonthlyFee-$_POST['amt'];
			
			$insertdata['Due'] = $due;
			
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
		
		
		redirect(base_url('pay-fee'));
}

//feepaid ends here


//callbacks starts here

	public function checkclass_select($cls)
	{
		if($cls=='0')
		{
			$this->form_validation->set_message('checkclass_select',"Select class");
			return false;
		}
		else
			return true;
	}
	
	public function checkacademicyear_select($academicyear)
	{
		if($academicyear=='0')
		{
			$this->form_validation->set_message('checkacademicyear_select',"Academic year");
			return false;
		}
		else
			return true;
	}


//checkfeepaid starts here
	
	public function checkfeepaid()
	{
		$cond = array();
		$table ='feecollection';
		
		$cond['StudentId'] = @$_POST['Rollno'];
		$cond['ClassId'] = 	 @$_POST['ClassName'];
		$cond['SectionId'] = @$_POST['sections'];
		$cond['MONTH(Month)'] = @$_POST['month'];
		$cond['AcademicYear'] = @$_POST['AcademicYear'];
		
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


//callbacks ends here
	
}//class ends here
