<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Financials extends CI_Controller 
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

		if( $this->uri->segment(1)!='view-salaries')
		{
			$this->session->set_userdata('Month','');
			$this->session->set_userdata('StaffType','');
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
	
	
	public function addvendor()
	{
		$this->load->view(HEADER);
		
		if($this->input->post('addVendor'))
		{
			$this->form_validation->set_rules( $this->loadformrules('addvendor') );
			
			if($this->form_validation->run() == false )			
				$this->load->view('Admin/add-vendor');
			else
			{
				$table = 'vendors';
				$insertdata = array();
				
				$insertdata['Lastupdated'] = time();
				$insertdata['Status'] = 'Active';
				
				foreach( $_POST as $key=>$val)	
				{
					if($key!="addVendor")
					$insertdata[$key]=ucwords($val);
				}
				
				if( $this->Commonmodel->insertdata($table,$insertdata) )
				{
					$msg = "<div class='alert alert-success'>New vendor added successfully </div>";
					$this->session->set_flashdata('vendoradded',$msg);
					$_POST=array();
				}
				else
				{
					$msg = "<div class='alert alert-warning'>Unable to create new vendor</div>";
					$this->session->set_flashdata('failedtocreatevendor',$msg);
					$_POST=array();
				}
				redirect(base_url('add-vendor'));
				
			}
		}
		else
			$this->load->view('Admin/add-vendor');
		
		$this->load->view(FOOTER);
	}// add new vendor esnds hree
	
	
	//viewvendors starts here
	
	public function viewvendors()
	{
		
		$this->load->view(HEADER);
		
		$table='vendors'; 
		$cond=array();
		$baseurl='view-vendors';

		$perpage=20;
		$order_by_field='VendorId';
		$datastring='Vendors';

		$pagination_string = 'pagination_string';
		
		
		if( $this->input->post('filter'))
		{
			if( trim($this->input->post('person') )!='' )
			{
				$cond['ContactPerson'] = trim($this->input->post('person') );
			}
			
			if( trim($this->input->post('title') )!='' )
			{
				$cond['Title'] = trim($this->input->post('title') );
			}
		}
		
		
		
		
		
		$vendorsDetails = $this->tsmpaginate->vendorsPaginateion($table,$cond,$baseurl,$perpage,$order_by_field,$datastring,$pagination_string);
		
		
		if( $vendorsDetails=='0')
		{
			$data['routeto'] = 'add-vendor';
			$this->load->view('Admin/pagenotfound',$data);
		}
		else
		{		
			$data['vendorsDetails'] = $vendorsDetails;
			$data['perpage']= $perpage;
			
			$this->load->view('Admin/view-vendors',$data);
		}
		$this->load->view(FOOTER);
			
	}
	//viewvendors ends here

//editvendor starts here

	public function editvendor()
	{
			$this->load->view(HEADER);
			
				$cond = array();
				$data = array();
				
				$table = 'vendors';
				
				$cond['VendorId']= $this->uri->segment(2);
				
				if( $this->Commonmodel->checkexists($table,$cond))
				{
					
					$data['vendorDetails'] = $this->Commonmodel->getRows_fields($table,$cond,$fields="*",$order_by="",$order_by_field="",$limit="");
					
					if($this->input->post('editVendor'))
					{
						$this->form_validation->set_rules( $this->loadformrules('addvendor') );
			
						if($this->form_validation->run() == false )			
						$this->load->view('Admin/edit-vendor',$data);
						else
						{
							
								$table = 'vendors';
								$setdata = array();
								
								$setdata['Lastupdated'] = time();
								
								foreach( $_POST as $key=>$val)	
								{
									if($key!="editVendor")
									$setdata[$key]=ucwords($val);
								}
								
								if( $this->Commonmodel->updatedata($table,$setdata,$cond)	 )
								{
									$msg = "<div class='alert alert-success'>Vendor information  successfully </div>";
									$this->session->set_flashdata('vendorupdated',$msg);
									
								}
								else
								{
									$msg = "<div class='alert alert-warning'>Unable to update vendor</div>";
									$this->session->set_flashdata('failedtoupdatevendor',$msg);
									
								}
								redirect(base_url('edit-vendor/').$this->uri->segment(2));
								
								
						}
							
					}
					else			
						$this->load->view('Admin/edit-vendor',$data);	
				}
				else
				{
					$data['routeto'] = 'view-vendors';
					$this->load->view('Admin/pagenotfound',$data);	
				}
				
			$this->load->view(FOOTER);
	}

//editvendor edns here

	//addsalary starts here
	
	
	public function addsalary()
	{
		$this->load->view(HEADER);
			$this->load->view('Admin/add-salary');
		$this->load->view(FOOTER);
	}
	
	
	//addsalary ends here

	//view salaries
		
	public function viewsalaries()
	{
		
		$this->load->view(HEADER);
		
		$table='salaries as sal'; 
		
		$cond=array();
		
		if( $this->input->post('salaries_filter') )
		{
			if( $this->input->post('StaffType')!='' && $this->input->post('StaffType')!='none' )	
				{
					$cond['sal.StaffType']  = $this->input->post('StaffType');
					$this->session->set_userdata('StaffType',$cond['sal.StaffType']);
				}
			if( $this->input->post('Month')!='' && $this->input->post('Month')!='none' )	
			{
				$cond['sal.Month']  = $this->input->post('Month');
				$this->session->set_userdata('Month',$cond['sal.Month']);
			}

		}
		else
		{
			if( $this->session->userdata('StaffType')!='' )
			{
				$stafftype=  $this->session->userdata('StaffType');
				$cond['sal.StaffType']  = $stafftype;
					
				$this->session->set_userdata('StaffType',$cond['sal.StaffType']);
					
			}
			
			if($this->session->userdata('Month')!='')
			{
				$Month=  $this->session->userdata('Month');
				$cond['sal.Month']  = $Month;
					
				$this->session->set_userdata('Month',$cond['sal.Month']);
			}
				
		}
		
		$baseurl='view-salaries';

		$perpage=10;
		$order_by_field='SLNO';
		$datastring='Salries';

		$pagination_string = 'pagination_string';
		$salaryDetails = $this->tsmpaginate->salariesPagination($table,$cond,$baseurl,$perpage,$order_by_field,$datastring,$pagination_string);
		
		if( $salaryDetails['Salries']=='0')
		{
			$this->session->set_userdata('Month','');
			$this->session->set_userdata('StaffType','');
			
			$data['routeto'] = 'view-salaries';
			$this->load->view('Admin/pagenotfound',$data);
		}
		else
		{		
			$data['salrayDetails'] = $salaryDetails;
			$data['perpage']= $perpage;
			
			$this->load->view('Admin/view-salaries',$data);
		}
	
		$this->load->view(FOOTER);	
		
	}
	//view salaries ends here


//edit salary

	public function editsalary()
	{
		$this->load->view(HEADER);	
		
		$cond = array();
		$table = 'salaries';
		
		//get the staff id 
		
		$cond['SLNO'] = $this->uri->segment(2);
		
		$StaffId = $this->Commonmodel->getAfield($table,$cond,$field='StaffId',$order_by='',$order_by_field='',$limit='');
		
		//get the staff
		
		$this->db->select('sta1.StaffId, sta1.StaffName, sta1.Category');
		$this->db->from('staff sta');
		$this->db->join('staff sta1','sta1.Category=sta.Category');
		$this->db->where('sta.StaffId',$StaffId);
		$qry = $this->db->get();
		
		$data['Staff'] = $qry;
		
		
		$cond = array();
		$cond['SLNO'] = $this->uri->segment(2);
		
		$data['salarydetails'] = $this->Commonmodel->getRows_fields($table,$cond,$fields='*',$order_by,$order_by_field,$limit);
				
		$this->load->view('Admin/edit-salary',$data);
		
		
		$this->load->view(FOOTER);	
	}

//edit salary ends here


// addbill starts here
	
	public function addbill()
	{
		//get the vendors
		
		$data['vendors'] = $this->db->select("VendorId, CompanyName")->from("vendors")->get();
		
		$this->load->view(HEADER);	
		$this->load->view('Admin/add-bill',$data);	
		$this->load->view(FOOTER);		
			
	}
	
//addbill ends here


	public function viewbills()
	{
		$this->load->view(HEADER);
		
		$table='bills as bil'; 
		$cond=array();
		$baseurl='view-bills';

		$perpage=10;
		$order_by_field='BillId';
		$datastring='Vendors';

		$pagination_string = 'pagination_string';
		
	
		if( $this->input->post('billfilter') )
		{
			if( $this->input->post('PaidTo')!='')
			{
				$cond['bil.PaidTo'] = $this->input->post('PaidTo');
				$this->session->set_userdata('PaidTo',$this->input->post('PaidTo'));
			}
			else
				$this->session->set_userdata('PaidTo','');
				
				
			if( $this->input->post('PaidOn')!='')
			{
				$paidDated = date_create($this->input->post('PaidOn'));
				$paidDated = date_format($paidDated,"Y-m-d");
				$cond['bil.BillDate'] = $paidDated;
				$this->session->set_userdata('PaidDated',$paidDated);
			}
			else
				$this->session->set_userdata('PaidDated','');
				
		}
		else
		{
			if( $this->session->userdata('PaidTo')!='')	
			{
				$paidto = $this->session->userdata('PaidTo');
				$cond['bil.PaidTo'] = $paidto;
				$this->session->set_userdata('PaidTo',$paidto);
			}
			else
				$this->session->set_userdata('PaidTo','');
			
			if($this->session->userdata('PaidDated')!='')
			{
				
				$PaidDated = $this->session->userdata('PaidDated');
				$cond['bil.BillDate'] = $PaidDated;
				$this->session->set_userdata('PaidDated',$PaidDated);
			}
			else
				$this->session->set_userdata('PaidDated','');
			
		}
			
	
		if($this->input->post('datefilter'))	
		{
			
			if( trim( $this->input->post('FromDate') )!='' )
			{
					$Fromdate = date_create($this->input->post('FromDate'));
					$Fromdate = date_format($Fromdate,"Y-m-d");
				if( trim( $this->input->post('Todate') )!='' )
				{
					$Todate = date_create($this->input->post('Todate'));
					$Todate = date_format($Todate,"Y-m-d");
					
					$cond['bil.BillDate>='] = $Fromdate;
					$cond['bil.BillDate<='] = $Todate;
					
					$this->session->set_userdata('Fromdate',$Fromdate);
					$this->session->set_userdata('Todate',$Todate);
				}
				else
				{
					$this->session->set_userdata('Fromdate',$Fromdate);
					$this->session->set_userdata('Todate','');
					$cond['bil.BillDate'] = $Fromdate;
				}
					
			}
			else
			{
				$this->session->set_userdata('Fromdate','');
				$this->session->set_userdata('Todate','');	
			}
			
				
		}
		else
		{
			if(  $this->session->userdata('Fromdate')!='' )	
			{
				if( $this->session->userdata('Todate')!=''  )	
				{
					$Fromdate = $this->session->userdata('Fromdate');
					$Todate = $this->session->userdata('Todate');
					$cond['bil.BillDate>='] = $Fromdate;
					$cond['bil.BillDate<='] = $Todate;
					
				}
				else
				{
					$Fromdate = $this->session->userdata('Fromdate');
					$cond['bil.BillDate'] = $Fromdate;
				}
			}
			else
			{
				$this->session->set_userdata('Fromdate','');
				$this->session->set_userdata('Todate','');	
			}
			
		}
			
			
		$billDetails = $this->tsmpaginate->viewbills($table,$cond,$baseurl,$perpage,$order_by_field,$datastring,$pagination_string);

		if( $billDetails['Vendors']=='0')
		{
			$data['routeto'] = 'add-bill';
			$this->load->view('Admin/pagenotfound',$data);
		}
		else
		{		
			$data['billDetails'] = $billDetails['Vendors'];
			$data['perpage']= $perpage;
			$data['pagination_string']= $billDetails['pagination_string'];
			
			$this->load->view('Admin/view-bills',$data);
		}
		$this->load->view(FOOTER);
		
	}
	
	//editbill starts here
	
	public function editbill()
	{
		$this->load->view(HEADER);
		$data['vendors'] = $this->db->select("VendorId, CompanyName")->from("vendors")->get();
		
		//get the bill details
		
		$cond = array();
		$table='bills';
		
		$cond['BillId'] = $this->uri->segment(2);
		
		$billdetails = $this->Commonmodel->get_single_row($table,$cond,$order_by='',$order_by_field='',$limit='');
		
		if($billdetails!='')
		{
			$data['billdetails'] = $billdetails;
			$this->load->view('Admin/edit-bill',$data);	
		}
		else
		{
				$data['routeto'] = 'view-bills';
					$this->load->view('Admin/pagenotfound',$data);	
		
	
		}
		$this->load->view(FOOTER);		
		
	}
	
	//edit bill ends here

}//class ends here
