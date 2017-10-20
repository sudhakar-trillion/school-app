<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller 
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

	public function index()
	{
		
		if( $this->Commonmodel->checkexists('admins',array("Role"=>'Admin',"Status"=>"Active")) )
		{
			
		}
		else
		{
			redirect( base_url('configure-your-school') );
		}
		
		if( $this->input->post('adminlogin'))
		{
			//locad the config item
			$this->form_validation->set_rules( $this->config->item('Adminlogin') );
			
			if( $this->form_validation->run() === false) { 	$this->load->view('Admin/login'); }
			else
			{
				//if there is no problem with the for validation	
				
				$cond = array();
				$table = 'admins';
				
				$cond['UserId'] = $this->input->post('userid');
				$cond['Password'] = md5($this->input->post('password'));
				
				
				
				
				if( $this->Commonmodel->checkexists($table,$cond) )
				{
					//get the role of the credentials
					
					$field='Role';
					$order_by='';
					
					$order_by_field='';
					$limit='';
					
					$status = $this->Commonmodel->getAfield($table,$cond,$field='Status',$order_by='',$order_by_field='',$limit='');
					
					if($status == 'Active' )
					{
						$role = $this->Commonmodel->getAfield($table,$cond,$field,$order_by='',$order_by_field='',$limit='');
						
						$this->session->set_userdata('Admin',$this->input->post('userid'));
						$this->session->set_userdata('Role',$role);
						
						redirect( base_url('dashboard') );
					}
					else
					{
						$msg="<div class='alert alert-danger'> You are an inactive admin member </div>";
						$this->session->set_flashdata('inactiveadmin',$msg);
						redirect( base_url() );	
					}
					
				}
				else
				{
					$msg="<div class='alert alert-danger'>Check your credentials</div>";
					$this->session->set_flashdata('inactiveadmin',$msg);
					redirect( base_url() );
				}
	
				
			}
		}
		else
		$this->load->view('Admin/login');
	
	}//index function ends here
	
	public function logout()
	{
		$this->session->sess_destroy();	
		redirect(base_url());
	}
	
	
	public function dashboard()
	{
		//get the statistics 
		
		///get the total number of students
		$AcademicYear = $this->schedulinglib->getAcademicyear();
		
		$startDate = date('Y-m-01',strtotime(date('Y-m')));
		$endDate = date('Y-m-t',strtotime(date('Y-m')));
		
		$totaldays = explode("-",$endDate);

		$totalsundays = $this->db->query("select DATE_ADD('".$startDate."', INTERVAL ROW DAY) as Date,
row+1  as DayOfMonth from( SELECT @row := @row + 1 as row FROM  (select 0 union all select 1 union all select 3          union all select 4 union all select 5 union all select 6) t1, (select 0 union all select 1 union all select 3          union all select 4 union all select 5 union all select 6) t2,  (SELECT @row:=-1) t3 limit 31 ) b where  DATE_ADD('".$startDate."', INTERVAL ROW DAY) between '".$startDate."' and '".$endDate."' and DAYOFWEEK(DATE_ADD('".$startDate."', INTERVAL ROW DAY))=1"); 		
		
		$numsundays = $totalsundays->num_rows();
		
		$totalworkingdays = (end($totaldays))-$numsundays;
		
//		echo "Number of days are ".end($totaldays)." <br>Number of sundays are ".$numsundays." <br>Number of working days are ".$totalworkingdays; exit;
		
		
		$cond = array();
		
		$table = 'students';
		
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
		
		$cond['AcademicYear'] = $AcademicYear;
		
		$totalStdnts = $this->Commonmodel->getnumRows($table,$cond);

		$data['Totalstudents'] = $totalStdnts;
		
	//get the total staff
	
	$table = 'staff';
	$cond = array();
	$cond['Status'] = 'Active';
	
	$totalStaff = $this->Commonmodel->getnumRows($table,$cond);

	$data['Totalstaff'] = $totalStaff;
	
	//get the unread messages
	
	$cond = array();
	$table = 'notifications';
	
	$cond['AddedBy'] = 'Parent';
	$cond['Status'] = 'Unread';
	
	$totalnotifications = $this->Commonmodel->getnumRows($table,$cond);

	$data['TotalNotifications'] = $totalnotifications;
	
	
	//get the classes
	
	
	$cond=array();
	$data['classes'] = $this->Commonmodel->getrows($table='newclass',$cond,$order_by='',$order_by_field='',$limit='');
	
	//get the notification by admin
	
	$cond = array();
	$cond = array();
	$table = 'notifications';
	
	$cond['AddedBy'] = 'Admin';
	$cond['Status'] = 'Unread';
		
	$notify = $this->Commonmodel->getRows_fields($table,$cond,$fields='Notification',$order_by='ASC',$order_by_field='NotificationId',$limit='7');
	
	if($notify!='0')
		$data['AdminNotify'] = $notify;
	else
		$data['AdminNotify'] = '0';
	
	#echo $this->db->last_query();
	
	
	// get the total fee till the current month
	
	
	$mnth_cnt = 5;
		$cnt=6;
		for($m=-4; $m<=7; ++$m)
		{
			
			if($mnth_cnt<=12)	
			{
				$mnth_cnt++;
			}
			else
				$mnth_cnt++;
			
   		 if( $mnth_cnt>12 )
			{
				$academic_mnth = date('F', mktime(0, 0, 0, $mnth_cnt, 1))."/".( (date('Y')-1)."-".date('Y') );
				$academics[] = $academic_mnth;
			}
		 else
		 {
			$academic_mnth = date('F', mktime(0, 0, 0, $mnth_cnt, 1))."/".( (date('Y')."-".(date('Y')+1)) );
			$academics[] = $academic_mnth;
		 }
			
			
			$cnt++;
		}
		
		$mnth=5;
		$FeeCollected=0;
		
			foreach( $academics as $key=>$val )
			{
				$mnth++;
				//if( $mnth<=date('m') )
				if( $mnth==date('m') )
				{
					$cond = array();
					$table = 'feecollection';
					
					$cond['MONTH(Month)'] = $mnth;
					$cond['AcademicYear'] = $AcademicYear;
					
					$FeeColl = $this->Commonmodel->getAfieldWithalias($table,$cond,$field='sum(Paid)',$Alias='FeeCollected',$order_by='',$order_by_field='',$limit='');
					$FeeCollected = $FeeColl+$FeeCollected;
					
					
				}
			}
		
		$data['FeeCollected'] = $FeeCollected;
		
		
		
		
		if( $this->uri->segment(2)!='')	
			$SelectedCls = $this->uri->segment(2);
		else
			$SelectedCls =0;
		
		$data['SelectedCls'] = $SelectedCls;	
		
			
		$cond = array();
		
		if( $this->uri->segment(2)!='')
				$data['ClassName']= $this->uri->segment(2);
		else
				$data['ClassName']= 0;
				

		$data['classes'] = $this->Commonmodel->getrows($table='newclass',$cond,$order_by='',$order_by_field='',$limit='');
		
		//get the teaching staff
		
		$data['TeachingStaff'] = $this->Commonmodel->getrows($table='teacher',$cond,$order_by='',$order_by_field='',$limit='');
		
	
		//get the students whose birthday is today
		
		$birthdaycond = array();

		$birthdaycond['MONTH(std.DOB)'] = date('m');
		$birthdaycond['DAY(std.DOB)'] = date('d');
		
		
		$data['BirthdayStudents'] =  $this->Commonmodel->getbirthdays($birthdaycond);
		
		
		$data['StudentActivities'] = $this->Commonmodel->getRows_fields('studentactivities',array('AcademicYear'=>$AcademicYear),$fields='ActivityTitle',$order_by='DESC',$order_by_field='ActivityId',$limit=5);
		
	;
		
		if( $this->uri->segment(3)!='')
		{
			$data['SectionIDE']= $this->uri->segment(3);
			$cond=array();
			
			$cond['ClassSlno'] = $this->uri->segment(2);
			$sects = $this->Commonmodel->getrows($table='sections',$cond,$order_by='',$order_by_field='',$limit='');
			
			$data['SelectedClassSections'] = $sects;
		}
		else
				$data['SectionIDE']= 0;
		

		
		$this->load->view(HEADER);	
			$this->load->view('Admin/dashborad',$data);	
		$this->load->view(FOOTER);	
		
	}
	
	
	//add class starts here
		
		public function addclass()
		{
			$this->load->view(HEADER);	
			
			if( $this->input->post('addClass') )
			{
				$this->form_validation->set_rules($this->loadformrules('Addclass')	);
				
				if( $this->form_validation->run() === false )
				{
					$this->load->view('Admin/add-class');
				}
				else
					{
						$table = 'newclass';
						$insertdata = array();
						
						$insertdata['ClassName'] = $this->input->post('ClassName');
						$insertdata['Lastupdated'] = time();
						
						if( $this->Commonmodel->insertdata($table,$insertdata))
						{
							$msg = '<div class="alert alert-success">A new class added successfully</div>';
							$this->session->set_flashdata('classadded',$msg);
						}
						else
						{	
							$msg = '<div class="alert alert-warning">Unable to add new class</div>';
							$this->session->set_flashdata('failedtocreateClass',$msg);
						}
	
							redirect(base_url('add-class'));
					}
			}
			else
				$this->load->view('Admin/add-class');
				
			$this->load->view(FOOTER);	
		}
		
	//add class ends here
	
	
	//viewclass starts here
		
		public function viewclass()
		{
			
			
			$this->load->view(HEADER);
			
			$table='newclass';
			$cond= array();
			
			$total_rows = $this->Commonmodel->getnumRows($table,$cond);
			$config['base_url'] = base_url('view-classes/');
			$config['total_rows'] = $total_rows;
			$config['per_page'] = 15;
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
		
		$data['classes'] = $this->Commonmodel->paginate($table,$cond,$order_by='DESC',$order_by_field='SLNO',$limit,$start );
		$data['pagination_string'] = $this->pagination->create_links();		
			
		if($data['classes']!='0')	
			$this->load->view('Admin/view-classes',$data);
		else
			{
					$data['routeto'] = 'view-classes';
					$data['pgeno'] = $this->uri->segment(2); 
						
					$requrl = str_replace("-"," ",$this->uri->segment(1));
					$data['viewingPage'] = $requrl;	
					
					
					$this->load->view('Admin/pagenotfound',$data);
			}
			
			
			$this->load->view(FOOTER);
				
		
		}
	
	
	//viewclass ends here

//editclass starts here 

	public function editclass()
	{
			$this->load->view(HEADER);
		
		///get the class details
		
			$cond = array();
			$table='newclass';
			
			$cond['SLNO']=$this->uri->segment(2);
			
			$data['ClassName'] = $this->Commonmodel->getAfield($table,$cond,$field='ClassName',$order_by='',$order_by_field='',$limit='');
			if( $this->input->post('editClass'))
			{
				$this->form_validation->set_rules( $this->loadformrules('Editclass'));
				
				if( $this->form_validation->run()=== false)
				{
					$this->load->view('Admin/edit-class',$data);		
				}
				else
				{
					$cond = array();
					$table = 'newclass';
					
					$cond['SLNO'] = $this->input->post('SLNO');
					$setdata = array();
					
					$setdata['ClassName'] = $this->input->post('ClassName');
					$setdata['Lastupdated'] = time();
					
					if( $this->Commonmodel->updatedata($table,$setdata,$cond))
					{
						$msg = '<div class="alert alert-success">Successfully updated class info</div>';
						$this->session->set_flashdata('classedited',$msg);						
					}
					else
					{
						$msg = '<div class="alert alert-warning">Unable to update class name</div>';
						$this->session->set_flashdata('failedtoeditClass',$msg);
					}
					redirect(base_url('edit-class')."/".$this->uri->segment(2));
				}
		
			}
			else
			$this->load->view('Admin/edit-class',$data);
		
			$this->load->view(FOOTER);
	}	

///editclass ends here

	// addsection starts here
		
		public function addsection()
		{
			$this->load->view(HEADER);
			
			$table = 'newclass';
			$cond = array();
			
			$data['classes'] = $this->Commonmodel->getrows($table,$cond,$order_by='',$order_by_field='',$limit='');

			if($this->input->post('addSection'))
			{
				$this->form_validation->set_rules($this->loadformrules('Addsection'));
				
				if($this->form_validation->run() === false)
					$this->load->view('Admin/add-section',$data);
				else
				{
					$table = 'sections';
					
					$insertdata = array();
					
					$insertdata['ClassSlno'] = $this->input->post('ClassName');
					$insertdata['Section'] = $this->input->post('section');
					$insertdata['Lastupdated'] = time();
					
					if( $this->Commonmodel->insertdata($table,$insertdata))
					{
						$msg = '<div class="alert alert-success">Section added successfully</div>';
						$this->session->set_flashdata('sectionadded',$msg);
					}
					else
					{						
						$msg = '<div class="alert alert-warning">Unable to add section to the class</div>';
						$this->session->set_flashdata('failedtocreateSection',$msg);						
					}
					
					redirect(base_url('add-section'));
					
					
				}
					
			}
			else
			$this->load->view('Admin/add-section',$data);
			
			$this->load->view(FOOTER);
			
		}
	
	//addsection ends here 

//viewsections starts here

	public function viewsections()
	{
		$this->load->view(HEADER);
		
		$table='sections';
		$cond= array();
		
		if($this->input->post('searchbyclass'))
		{
			if($this->input->post('ClassName')>0)
			{
				$cond['ClassSlno'] = 	$this->input->post('ClassName');
			}
			else
				$this->session->set_userdata('searchbyclass','');
		}
		else
		{
			if( $this->session->userdata('searchbyclass')!='' ) 	
			{
				$cond['ClassSlno'] = 	$this->session->userdata('searchbyclass');
			}
				
		}
		
			
			$total_rows = $this->Commonmodel->getnumRows($table,$cond);
			$config['base_url'] = base_url('view-sections/');
			$config['total_rows'] = $total_rows;
			$config['per_page'] = 10;
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
		
		if($this->input->post('searchbyclass'))
		{
			if($this->input->post('ClassName')>0)
			{
				$cond = array();
				$cond['sec.ClassSlno'] = 	$this->input->post('ClassName');
				$this->session->set_userdata('searchbyclass',$this->input->post('ClassName'));
			}
			else
				$this->session->set_userdata('searchbyclass','');
			
		}
		else
		{
			if( $this->session->userdata('searchbyclass')!='' ) 	
			{
				$cond['sec.ClassSlno'] = 	$this->session->userdata('searchbyclass');
			}
			else
			$cond = array();
				
			
		}
		
		
		
		$data['sections'] = $this->tsmpaginate->sectionsPagination($start,$limit,$cond);
		$data['pagination_string'] = $this->pagination->create_links();		
		
		$table = 'newclass';
		$cond = array();
		
		$data['classes'] = $this->Commonmodel->getrows($table,$cond,$order_by='',$order_by_field='',$limit='');
		
		if($data['sections']!='0')
			$this->load->view('Admin/view-sections',$data);
		else
			{
					$data['routeto'] = 'view-sections';
					$data['pgeno'] = $this->uri->segment(2); 
					$requrl = str_replace("-"," ",$this->uri->segment(1));
					$data['viewingPage'] = $requrl; 
					$this->load->view('Admin/pagenotfound',$data);
			}
		
		$this->load->view(FOOTER);	
	}

//viewsections ends here


//editsection starts here
	
	public function editsection()
	{
		$this->load->view(HEADER);
		
		$table = 'newclass';
		$cond = array();
			
		$data['classes'] = $this->Commonmodel->getrows($table,$cond,$order_by='',$order_by_field='',$limit='');
		
		//get the section details
		
		$cond = array();
		$table ='sections';
		
		$cond['SectionId'] = $this->uri->segment(2);
		
		$data['sectiondetails'] =  $this->Commonmodel->get_single_row($table,$cond,$order_by='',$order_by_field='',$limit='');

		if($this->input->post('editSection'))
		{
			$this->form_validation->set_rules( $this->loadformrules('Edisection') );
			
			if( $this->form_validation->run() === false)
			{
				$this->load->view('Admin/edit-section',$data);	
			}
			else
			{
				$cond = array();
				$table = 'sections';
				$setdata = array();
				
				$cond['SectionId'] = $this->uri->segment(2);
				
				$setdata['ClassSlno'] = $this->input->post('ClassName');
				$setdata['Section'] = $this->input->post('section');
				$setdata['Lastupdated'] = time();
				
				if( $this->Commonmodel->updatedata($table,$setdata,$cond))
				{
					
					$msg = '<div class="alert alert-success">Section details updated successfully</div>';
					$this->session->set_flashdata('sectionedited',$msg);
				}
				else
				{
					$msg = '<div class="alert alert-success">Section details updated successfully</div>';
					$this->session->set_flashdata('sectionedited',$msg);
				}
				
				redirect(base_url('edit-section')."/".$this->uri->segment(2));
				
			}
		}
		else		
		$this->load->view('Admin/edit-section',$data);
		
		
		$this->load->view(FOOTER);	
	}

//editsection ends here


//add subjects starts here

	public function addsubjects()
	{
		$this->load->view(HEADER);	
		$this->load->view('Admin/add-subjects');	
		$this->load->view(FOOTER);	
	}


//add subjects ends here

	public function viewsubjects()
	{
		$this->load->view(HEADER);
		
		$table='subjects'; 
		$cond=array();
		$baseurl='view-subjects';
		$perpage=10;
		$order_by_field='SubjectId';
		$datastring='subject_details';
		$pagination_string = 'pagination_string';
		
		$data = $this->tsmpaginate->singletablePaginateion($table,$cond,$baseurl,$perpage,$order_by_field,$datastring,$pagination_string);
		
		$data['classes'] = $this->Commonmodel->getrows($table='newclass',$cond,$order_by='',$order_by_field='',$limit='');
		$data['perpage']= $perpage;
		
		if($data['subject_details']!='0')
		$this->load->view('Admin/view-subjects',$data);
		else
			{
					$data['routeto'] = 'view-subjects';
					$data['pgeno'] = $this->uri->segment(2); 
					$requrl = str_replace("-"," ",$this->uri->segment(1));
					$data['viewingPage'] = $requrl;
					
					$this->load->view('Admin/pagenotfound',$data);
			}
				
		$this->load->view(FOOTER);		
	}

	public function editsubject()
	{
			$this->load->view(HEADER);	
			
			$cond = array();
			$table = 'subjects';
			
			$cond['SubjectId'] = $this->uri->segment(2);
			
			$subject = $this->Commonmodel->getAfield($table,$cond,$field='SubjectName',$order_by='',$order_by_field='',$limit='');
			
			
			if($subject!='')
				{
					$data['subject'] = $subject;
					$data['SubjectId'] = $this->uri->segment(2);

					
					$this->load->view('Admin/edit-subject',$data);
				}
			else
			{
					$data['routeto'] = 'view-subjects';
					
					$data['pgeno'] = $this->uri->segment(2); 
					$requrl = str_replace("-"," ",$this->uri->segment(1));
					$data['viewingPage'] = $requrl;
					
					$this->load->view('Admin/pagenotfound',$data);
			}
			
			$this->load->view(FOOTER);	
	}



// assignsubjectclass starts here

	public function assignsubjectclass()
	{
		$this->load->view(HEADER);	
		$cond = array();
		$data['classes'] = $this->Commonmodel->getrows($table='newclass',$cond,$order_by='',$order_by_field='',$limit='');
		$data['subject'] = $this->Commonmodel->getrows($table='subjects',$cond,$order_by='',$order_by_field='',$limit='');
		
		$this->load->view('Admin/assign-subject-class',$data);
		
		$this->load->view(FOOTER);	
		
	}
	
	public function viewassignedsubjects()
	{
		$this->load->view(HEADER);	
		
		$table='assignedsubjects as assign'; 
		
		$cond=array();
		
		if( $this->input->post('filter_assigned_subjects') )
		{
			$cond['assign.ClassSlno'] = $this->input->post('ClassSlno');
			$this->session->set_userdata('selectedClassSlno',$this->input->post('ClassSlno')) ;
			
		}
		else
		{
			if( $this->session->userdata('selectedClassSlno')!='' )
			{
				$cond['assign.ClassSlno'] = $this->session->userdata('selectedClassSlno');
				$this->session->set_userdata('selectedClassSlno',$this->session->userdata('selectedClassSlno') ) ;
			}
		}
		
		
		$baseurl='view-assigned-subjects';
		$perpage=10;
		$order_by_field='ClassSlno';
		$datastring='assignedsubjects';
		$pagination_string = 'pagination_string';
		
		$data = $this->tsmpaginate->viewassignedsubjectspagination($table,$cond,$baseurl,$perpage,$order_by_field,$datastring,$pagination_string);
		
		$data['perpage'] = $perpage;
		
		$cond = array();
		$data['classes'] = $this->Commonmodel->getrows($table='newclass',$cond,$order_by='',$order_by_field='',$limit='');
		
		if($data['assignedsubjects']!='0')
			$this->load->view('Admin/view-assigned-subjects',$data);	
		else
			{
				$data['routeto'] = 'view-assigned-subjects';
				
				$data['pgeno'] = $this->uri->segment(2); 
					$requrl = str_replace("-"," ",$this->uri->segment(1));
					$data['viewingPage'] = $requrl;
				
				$this->load->view('Admin/pagenotfound',$data);
			}
		
		$this->load->view(FOOTER);		
		
	}
	
//assignsubjectclass ends here

//editassignedsubjectclass starts here]

	public function editassignedsubjectclass()
	{
		$this->load->view(HEADER);
		$cond = array();
		$data['classes'] = $this->Commonmodel->getrows($table='newclass',$cond,$order_by='',$order_by_field='',$limit='');
		$data['subject'] = $this->Commonmodel->getrows($table='subjects',$cond,$order_by='',$order_by_field='',$limit='');
		
		$cond = array();
		$table = 'assignedsubjects';
		
		$cond['ClassSlno'] = $this->uri->segment(2);
		$fields='SubjectAssigned';
		
		$sub_ids = $this->Commonmodel->getRows_fields($table,$cond,$fields,$order_by,$order_by_field,$limit);
		
		if($sub_ids!='0')
		{
			$subject_ids = array();
			
			foreach($sub_ids->result() as $subj)
			{
				$subject_ids[] = $subj->SubjectAssigned;
			}
			$data['SubjectsAssigned'] = $subject_ids;
			
			$this->load->view('Admin/edit-assigned-subject-class',$data);					
		}
		else
		{
			$data['routeto'] = 'view-assigned-subjects';
			
			$data['pgeno'] = $this->uri->segment(2); 
			$requrl = str_replace("-"," ",$this->uri->segment(1));
			$data['viewingPage'] = $requrl;
					
			$this->load->view('Admin/pagenotfound',$data);	
		}
		
		$this->load->view(FOOTER);		
	}

//editassignedsubjectclass ends here


//addteacher starts here

	public function addteacher()
	{
		$this->load->view(HEADER);
		
		if( $this->input->post('addTeacher') )
		{
			$this->form_validation->set_rules( $this->loadformrules('Addteacher'));
			
			if( $this->form_validation->run() === false )
			{
				$this->load->view('Admin/add-teacher');	
			}
			else
			{
				$table = 'teacher';
				$insertdata = array();
				
				$insertdata['TeacherName'] = $this->input->post('TeacherName');
				$insertdata['Lastupdate'] = time();
				
				$Teacherid = $this->Commonmodel->insertdata($table,$insertdata);
				
				if( $Teacherid )
				{
					
					$insertdata = array();
					$table ='staff';
					
					$insertdata['TeacherId'] = $Teacherid;
					$insertdata['StaffName'] = $this->input->post('TeacherName');
					
					$insertdata['Category'] = 'Teaching';
					$insertdata['LastUpdated'] = time();
					
					$this->Commonmodel->insertdata($table,$insertdata);
					
					$msg = '<div class="alert alert-success">Teacher added successfully</div>';
					$this->session->set_flashdata('teacheradded',$msg);
				}
				else
				{
					$msg = '<div class="alert alert-warning">Unable to add teacher</div>';
					$this->session->set_flashdata('failedtocreateTeacher',$msg);		
				}
				redirect(base_url('add-teacher'));
			}
		}
		else
			$this->load->view('Admin/add-teacher');
		
		$this->load->view(FOOTER);	
	}

//addteacher ends here

//viewteachers starts here
	
	public function viewteachers()
	{
		$this->load->view(HEADER);
		
		$table='teacher'; 
		$cond=array();
		$baseurl='view-teachers';
		$perpage=10;
		$order_by_field='TeacherId';
		$datastring='teachers';
		$pagination_string = 'pagination_string';
		
		$data = $this->tsmpaginate->singletablePaginateion($table,$cond,$baseurl,$perpage,$order_by_field,$datastring,$pagination_string);
		
		if($data['teachers'] !='0')
			$this->load->view('Admin/view-teachers',$data);
		else
			{
				$data['routeto'] = 'view-teachers';
				
				$data['pgeno'] = $this->uri->segment(2); 
				$requrl = str_replace("-"," ",$this->uri->segment(1));
				$data['viewingPage'] = $requrl;
				
				$this->load->view('Admin/pagenotfound',$data);
			}
				
		$this->load->view(FOOTER);	
	}

//viewteachers ends here

//editteacher starts here

	public function editteacher()
	{
		$this->load->view(HEADER);
		
		$cond = array();
		$table='teacher';
		
		$cond['TeacherId'] = $this->uri->segment(2);
		
		$data['teacherdetails'] = $this->Commonmodel->get_single_row($table,$cond,$order_by='',$order_by_field='',$limit='');
		
		if( $this->input->post('editTeacher') )
		{
			$this->form_validation->set_rules($this->loadformrules('Editteacher'));
			
			if( $this->form_validation->run() === false )
			{
				$this->load->view('Admin/edit-teacher',$data);	
			}
			else
			{
				$cond = array();
				$table = 'teacher';
				
				$setdata = array();
				
				$setdata['TeacherName'] = $this->input->post('TeacherName');
				$setdata['Lastupdate'] = time();
				$cond['Teacherid'] = $this->uri->segment(2);

				if( $this->Commonmodel->updatedata($table,$setdata,$cond))
				{
					$msg = '<div class="alert alert-success">Teacher name updated succesfully</div>';	
					$this->session->set_flashdata('teacheredited',$msg);
				}
				else
				{
					$msg = '<div class="alert alert-danger">Unable to update</div>';	
					$this->session->set_flashdata('failedtoeditTeacher',$msg);
				}
				
				redirect(base_url('edit-teacher')."/".$this->uri->segment(2));
			}
		}
		else
			$this->load->view('Admin/edit-teacher',$data);
		
		$this->load->view(FOOTER);	
	}

//editteacher ends here


// assignteacher starts here

	public function assignteacher()
	{
		$this->load->view(HEADER);
		
		$data['teachers'] = $this->Commonmodel->getrows($table='teacher',$cond=array(),$order_by='DESC',$order_by_field='TeacherId',$limit='');
		$data['classes'] = $this->Commonmodel->getrows($table='newclass',$cond,$order_by='',$order_by_field='',$limit='');
		$data['subject'] = $this->Commonmodel->getrows($table='subjects',$cond,$order_by='',$order_by_field='',$limit='');
						
		$this->load->view('Admin/assign-teacher',$data);	
		$this->load->view(FOOTER);	
	}

//assignteacher ends here

//viewassignteachers starts here

	public function viewassignteachers()
	{
		$this->load->view(HEADER);
		
	
		
		$cond1=array();
		$cond=array();
		
		
		if( $this->input->post('assigned_filter') )
		{
			
			if( $this->input->post('TeacherName')!='0' )
			{
				$cond['assign.TeacherId'] = $this->input->post('TeacherName');
				$this->session->set_userdata('TeacherId',$this->input->post('TeacherName'));
			}
			else
				$this->session->set_userdata('TeacherId','');

			if( $this->input->post('ClassName')!='0' )
			{
				$cond['assign.ClassSlno'] = $this->input->post('ClassName');
				$this->session->set_userdata('ClassSlno',$this->input->post('ClassName'));
				$class_sections = $this->Commonmodel->getrows($table='sections',array('ClassSlno'=>$this->input->post('ClassName')),$order_by='ASC',$order_by_field='SectionId',$limit='');

			}
			else
				$this->session->set_userdata('ClassSlno','');
			
			if( $this->input->post('sections')!='0' )
			{
				$cond['assign.Section'] = $this->input->post('sections');
				$this->session->set_userdata('Section',$this->input->post('sections'));
				
				$class_sections = $this->Commonmodel->getrows($table='sections',array('ClassSlno'=>$this->input->post('ClassName')),$order_by='ASC',$order_by_field='SectionId',$limit='');
				
				
			}
			else
			{
				$this->session->set_userdata('Section','');
				$class_sections = '0';	
			}
		
		}
		else
		{
			$class_sections='0';
			if( $this->session->userdata('TeacherId')!='')
			{
				
				$cond['assign.TeacherId'] = $this->session->userdata('TeacherId');
			}
			
			if( $this->session->userdata('ClassSlno')!='')
			{
				
				$cond['assign.ClassSlno'] = $this->session->userdata('ClassSlno');
				$this->session->set_userdata('ClassSlno',$this->session->userdata('ClassSlno'));
				$class_sections = $this->Commonmodel->getrows($table='sections',array('ClassSlno'=>$this->session->userdata('ClassSlno')),$order_by='ASC',$order_by_field='SectionId',$limit='');

			}

			
			if( $this->session->userdata('Section')!='')
			{
				$cond['assign.Section'] =  $this->session->userdata('Section');
				$class_sections = $this->Commonmodel->getrows($table='sections',$cond=array('ClassSlno'=> $this->session->userdata('Section')),$order_by='ASC',$order_by_field='SectionId',$limit='');
			}
			
		}

		
		$baseurl='view-assign-teachers';
		$perpage=10;
		$order_by_field='SLNO';
		$datastring='assignedteachers';
		$pagination_string = 'pagination_string';
		$check_uri_segment='yes';
		
		$data = $this->tsmpaginate->assignedteacherPaginateion($cond1,$cond,$baseurl,$perpage,$order_by_field,$datastring,$pagination_string);
		
		//call the Teacher
		$data['perpage'] = $perpage;
		$data['teachers'] = $this->Commonmodel->getrows($table='teacher',$cond=array(),$order_by='DESC',$order_by_field='TeacherId',$limit='');
		$data['classes'] = $this->Commonmodel->getrows($table='newclass',$cond=array(),$order_by='ASC',$order_by_field='SLNO',$limit='');
		$data['class_sections'] = $class_sections;
		
		if( $data['assignedteachers']!='0')
			$this->load->view('Admin/viewassignteachers',$data);
		else
			{
				$data['routeto'] = 'view-assign-teachers';
				
				$data['pgeno'] = $this->uri->segment(2); 
				$requrl = str_replace("-"," ",$this->uri->segment(1));
				$data['viewingPage'] = $requrl;
				
				$this->load->view('Admin/pagenotfound',$data);
			}
		
		$this->load->view(FOOTER);	
	}

//viewassignteachers ends here

//editassignedteacher starts here
	
	public function editassignedteacher()
	{
			
		
		if(!$this->Commonmodel->checkexists($table='assignteachers',array('SLNO'=>$this->uri->segment(2)) ) )
		{
			$data['routeto'] = 'view-assign-teachers';
			$this->load->view(HEADER);
			
			$data['pgeno'] = $this->uri->segment(2); 
			$requrl = str_replace("-"," ",$this->uri->segment(1));
			$data['viewingPage'] = $requrl;
			
			
			$this->load->view('Admin/pagenotfound',$data);
			$this->load->view(FOOTER);	
			//exit;
		}
		else
		{
			$this->load->view(HEADER);
			
			$data['teachers'] = $this->Commonmodel->getrows($table='teacher',$cond=array(),$order_by='DESC',$order_by_field='TeacherId',$limit='');
			$data['classes'] = $this->Commonmodel->getrows($table='newclass',$cond,$order_by='',$order_by_field='',$limit='');
			
			$cond = array();
			$table = 'assignteachers';
			
			$cond['SLNO'] = $this->uri->segment(2);
				
			$data['details'] = $this->Commonmodel->get_single_row($table,$cond,$order_by='',$order_by_field='',$limit='');
			
			
			
			$ClassSlno = $this->Commonmodel->getAfield($table,$cond,$field='ClassSlno',$order_by='',$order_by_field='',$limit='');
			 
			$data['section'] = $this->Commonmodel->getrows($table='sections',$cond=array('ClassSlno'=> $ClassSlno),$order_by='ASC',$order_by_field='SectionId',$limit='');
			$data['subject'] = $this->Commonmodel->getrows($table='subjects',array(),$order_by='',$order_by_field='',$limit='');
			
			
			//get the teacherid
			
			 $TeacherId = $this->getSingleColumn($field='TeacherId',$table='assignteachers',$cond=array("SLNO"=>$this->uri->segment(2)) );

			 if( $this->Commonmodel->checkexists($table='classteachers',$cond= array('TeacherId'=>$TeacherId) ))
				$data['ClassTeacher'] ="Yes";
			else
				$data['ClassTeacher'] ="No";
					 
			 
					
			$this->load->view('Admin/edit-assigned-teacher',$data);		
			
			$this->load->view(FOOTER);
		}
	}

//editassignedteacher ends here


//addDepartment starts here

	public function addDepartment()
	{
		$this->load->view(HEADER);
		
			if($this->input->post('addDept'))
			{
				
				$this->form_validation->set_rules($this->loadformrules('adddepartment'));
			
				if( $this->form_validation->run() === false )
				{
					$this->load->view('Admin/addDepartment');	
				}
				else
				{
					$table = 'departments';
					$insertdata = array();
				
					$insertdata['Department'] = ucwords(strtolower($this->input->post('Department')));
					$insertdata['LastUpdated'] = time();
					
					if( $this->Commonmodel->insertdata($table,$insertdata) )
					{
						
						$msg = '<div class="alert alert-success">Department added successfully</div>';
						$this->session->set_flashdata('deptadded',$msg);
					}
					else
					{	
						$msg = '<div class="alert alert-warning">Unable to add department</div>';
						$this->session->set_flashdata('failedtoaddDept',$msg);
					}
					
					redirect(base_url('add-department'));
					
				}
			
			}
			else
				$this->load->view('Admin/addDepartment');
		
		
		$this->load->view(FOOTER);
	}

//addDepartment ends here

//view departments starts here

public function viewdepartments()
	{
		$this->load->view(HEADER);	
		
		$cond=array();
		
		$table = 'departments as dept';
		$baseurl='view-departments';
		$perpage=20;
		$order_by_field='Department';
		$datastring='departments';
		$pagination_string = 'pagination_string';
		
		$data = $this->tsmpaginate->singletablePaginateion($table,$cond,$baseurl,$perpage,$order_by_field,$datastring,$pagination_string);

		$data['perpage']= $perpage;
		if($data['departments']!='0')
		$this->load->view('Admin/view-departments',$data);	
		else
		{
			$data['pgeno'] = $this->uri->segment(2); 
			$requrl = str_replace("-"," ",$this->uri->segment(1));
			$data['viewingPage'] = $requrl;
			$data['routeto']="add-department";
			
			$this->load->view('Admin/pagenotfound',$data);	
			
		}
		
		$this->load->view(FOOTER);	
		
			
	}

//view departments ends here

//editdepartment starts here
	
	public function editdepartment()
	{
		$this->load->view(HEADER);	
		
		$cond = array();
			$table = 'departments';
			
			$cond['DepartId'] = $this->uri->segment(2);
			
			$Department = $this->Commonmodel->getAfield($table,$cond,$field='Department',$order_by='',$order_by_field='',$limit='');
			$data=array();
				
				$data['Department'] = $Department;
				$data['DepartId'] = $this->uri->segment(2);
		
		if( $this->input->post('updateDept'))
		{
			$this->form_validation->set_rules($this->loadformrules('editdepartment'));
			
				if( $this->form_validation->run() === false )
				{
				
					$this->load->view('Admin/editDepartment',$data);
				}
				else
				{		
					$cond = array();
					$table = 'departments';
					
					$cond['DepartId'] = $this->uri->segment(2);
					
					$setdata = array();
					
					$setdata['Department'] = $this->input->post('Department');
					$setdata['LastUpdated'] = time();
					
					if( $this->Commonmodel->updatedata($table,$setdata,$cond) )
					{
						
						$msg = '<div class="alert alert-success">Department updated successfully</div>';
						$this->session->set_flashdata('deptupdated',$msg);
					}
					else
					{	
						$msg = '<div class="alert alert-warning">Unable to update department</div>';
						$this->session->set_flashdata('failedtoaupdateDept',$msg);
					}
					
					redirect(base_url('edit-department/'.$this->uri->segment(2)));
					
				}
		}
		else
		{
			if($Department!='0')
			{
				$this->load->view('Admin/editDepartment',$data);
			}
		else
		{
			$data['routeto']="view-departments";
			$data['pgeno'] = $this->uri->segment(2); 
			$requrl = str_replace("-"," ",$this->uri->segment(1));
			$data['viewingPage'] = $requrl;
			$this->load->view('Admin/pagenotfound',$data);	
		}
			
	}
			
		$this->load->view(FOOTER);	
	}

//editdepartment ends here



//callback functions starts here

public function editclass_callback($classname)	
	{
		$SLNO = trim($this->input->post('SLNO'));		
		$cond = array();
		$table = 'newclass';
		
		//check whether docno
		$cond['ClassName'] = $classname;
		
		$slno = $this->Commonmodel->getAfield($table,$cond,$field='SLNO',$order_by='',$order_by_field='',$limit='');
		if($slno!='0')
		{
			if($slno == $SLNO)
			{
				return true;		
			}
			else
			{
				$this->form_validation->set_message('editclass_callback','Class name exists');
				return false;
			}
		}
		else
			return true;
		
		
	}

	public function checkclassselect($cls)
	{
		if($cls!='0')
			return true;
		else
		{
			$this->form_validation->set_message('checkclassselect','Select Class');	
			return false;
		}
	}


	public function getSingleColumn($field,$table,$cond)
	{
		$Field = $this->Commonmodel->getAfield($table,$cond,$field,$order_by='',$order_by_field='',$limit='');
		return 	$Field;
	}


//callback functions ends here

public function addsectioncheck($sect)
{
	$ClassSlno = trim($this->input->post('ClassName'));
	
	if($ClassSlno!='0')
	{
		$cond = array();
		$table='sections';	
		
		$cond['ClassSlno'] = $ClassSlno;
		$cond['Section'] = ucwords($sect);
		
		if( $this->Commonmodel->checkexists($table,$cond) )
		{
			$this->form_validation->set_message('addsectioncheck','Section with this class exists');
			return false;
		}
		else
		return true;
		
	}
}


public function editsectioncheck($sect)
{
	$ClassSlno = trim($this->input->post('ClassName'));
	$section   = $sect; 
	$SectionId = $this->uri->segment(2);
	
	
		$cond = array();
		$table = 'sections';
		
		//check whether docno
		$cond['ClassSlno'] = $ClassSlno;
		$cond['Section'] = $section;
		
		$slno = $this->Commonmodel->getAfield($table,$cond,$field='SectionId',$order_by='',$order_by_field='',$limit='');
		if($slno!='0')
		{
			if($slno == $SectionId)
			{
				return true;		
			}
			else
			{
				$this->form_validation->set_message('editsectioncheck','Class Section with this class existsname exists');
				return false;
			}
		}
		else
			return true;
	
}


//get the academic year
		
public function getAdcademicYear()
{
	$currentMnth = date('n');
                            
		if( $currentMnth>5 && $currentMnth<=12 )
		{
			$prevyr = date('Y');
			$nextyr = date('Y')+1;
		
			$academicYEAR = 	$prevyr."-".$nextyr;
		}
		else
		{
			$prevyr = date('Y')-1;
			$nextyr = date('Y');
		
			$academicYEAR = 	$prevyr."-".$nextyr;
		}	
		return $academicYEAR;
}


}//class ends here
