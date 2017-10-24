<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Tsmpaginate
	{
		public function __construct()
		{
			$this->CI =& get_instance();
			
			$this->CI->load->helper('url');
			$this->CI->config->item('base_url');
			$this->CI->load->database();	
			$this->CI->load->model('Commonmodel');
			$this->CI->load->library('pagination');
		}
		
		public function sectionsPagination($start,$limit,$cond)
		{
		
			$this->CI->db->select('sec.*, cls.ClassName');
			$this->CI->db->from('newclass as cls');
			$this->CI->db->join('sections as sec','sec.ClassSlno=cls.SLNO');

				if(!empty($cond)) { $this->CI->db->where($cond); }
				
			$this->CI->db->limit($limit,$start);
			
			$qry = $this->CI->db->get();
			
			//return $this->CI->db->last_query();
			if($qry->num_rows()>0)
				return $qry;
			else
				return '0';
				
		}
		
		public function singletablePaginateion($table,$cond,$baseurl,$perpage,$order_by_field,$datastring,$pagination_string)
		{
			
			$total_rows = $this->CI->Commonmodel->getnumRows($table,$cond);

			$config['base_url'] = $baseurl;
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
			
			$this->CI->pagination->initialize($config);
			
			$data['page'] = ($this->CI->uri->segment(2)) ? (($this->CI->uri->segment(2))) : 0;
			
			$limit = $config["per_page"];
			
			if($data['page']==0)
			$start = 0;
			else
			$start = ($data['page']-1)*$config["per_page"];
			
			$data[$datastring] = $this->CI->Commonmodel->paginate($table,$cond,$order_by='DESC',$order_by_field,$limit,$start );
			$data[$pagination_string] = $this->CI->pagination->create_links();		
			
			return $data;	
				
		}
		
		// pagination logic for assigned teacher starts here
		
		public function assignedteacherPaginateion($cond1,$cond,$baseurl,$perpage,$order_by_field,$datastring,$pagination_string)
		{
			
			$table = 'assignteachers as assign';
			
			$total_rows = $this->CI->Commonmodel->getnumRows($table,$cond);

			$config['base_url'] = $baseurl;
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
			
			$this->CI->pagination->initialize($config);
			
				$data['page'] = ($this->CI->uri->segment(2)) ? (($this->CI->uri->segment(2))) : 0;
			
			$limit = $config["per_page"];
			
			if($data['page']==0)
			$start = 0;
			else
			$start = ($data['page']-1)*$config["per_page"];
			
			
			$data[$datastring] = $this->CI->Commonmodel->assignedteacherPaginateion($cond,$order_by='SLNO',$order_by_field,$limit,$start );
			
#echo $this->CI->db->last_query();
			
			
			$data[$pagination_string] = $this->CI->pagination->create_links();		
			
			return $data;		
			
			
		}
		
	public function studentsPaginateion($cond,$baseurl,$perpage,$order_by_field,$datastring,$pagination_string)
	{
		/*
			echo "<pre>";
			print_r($cond);
			echo "</pre>";
			*/
			
			$table ='students as std';
		
			$total_rows = $this->CI->Commonmodel->getnumRows($table,$cond);

			$config['base_url'] = $baseurl;
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
			
			$this->CI->pagination->initialize($config);
			
				$data['page'] = ($this->CI->uri->segment(2)) ? (($this->CI->uri->segment(2))) : 0;
			
			$limit = $config["per_page"];
			
			if($data['page']==0)
			$start = 0;
			else
			$start = ($data['page']-1)*$config["per_page"];
			
			
			$data[$datastring] = $this->CI->Commonmodel->studentsPaginateion($cond,$order_by='',$order_by_field,$limit,$start );
			
#echo $this->CI->db->last_query();
			
			
			$data[$pagination_string] = $this->CI->pagination->create_links();		
			
			return $data;	
	}

		
		public function feestructurepagination($table,$cond,$baseurl,$perpage,$order_by_field,$datastring,$pagination_string)
		{
			
			$total_rows = $this->CI->Commonmodel->getnumRows($table,$cond=array());

			$config['base_url'] = $baseurl;
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
			
			$this->CI->pagination->initialize($config);
			
				$data['page'] = ($this->CI->uri->segment(2)) ? (($this->CI->uri->segment(2))) : 0;
			
			$limit = $config["per_page"];
			
			if($data['page']==0)
			$start = 0;
			else
			$start = ($data['page']-1)*$config["per_page"];
			
			
			$data[$datastring] = $this->CI->Commonmodel->feestructurepagination($cond,$order_by='ASC',$order_by_field,$limit,$start );
			
#echo $this->CI->db->last_query();
			
			
			$data[$pagination_string] = $this->CI->pagination->create_links();		
			
			return $data;	
		}


	public function notifstudentspagination($table,$cond,$baseurl,$perpage,$order_by_field,$datastring,$pagination_string,$AddedBy)
	{
			if(empty($cond))
				$total_rows = $this->CI->Commonmodel->getnumRows($table,$cond=array());
			else
			{
				$table = $table." as noti";
				$total_rows = $this->CI->Commonmodel->getnumRows($table,$cond);
			}

//echo $this->CI->db->last_query(); exit; 
			$config['base_url'] = $baseurl;
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
			
			$this->CI->pagination->initialize($config);
			
				$data['page'] = ($this->CI->uri->segment(2)) ? (($this->CI->uri->segment(2))) : 0;
			
			$limit = $config["per_page"];
			
			if($data['page']==0)
			$start = 0;
			else
			$start = ($data['page']-1)*$config["per_page"];
			
			
			$data[$datastring] = $this->CI->Commonmodel->notifstudentspagination($cond,$order_by='ASC',$order_by_field,$limit,$start,$AddedBy );
			
#echo $this->CI->db->last_query();
			
			
			$data[$pagination_string] = $this->CI->pagination->create_links();		
			
			return $data;	
	}
		
		// pagination logic for assigned teacher ends here
	
	
	//viewassignedsubjectspagination starts here
	
	public function viewassignedsubjectspagination($table,$cond,$baseurl,$perpage,$order_by_field,$datastring,$pagination_string)
	{

			$total_rows = $this->CI->Commonmodel->getnumRows($table,$cond);
			
			$config['base_url'] = $baseurl;
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
			
			$this->CI->pagination->initialize($config);
			
				$data['page'] = ($this->CI->uri->segment(2)) ? (($this->CI->uri->segment(2))) : 0;
			
			$limit = $config["per_page"];
			
			if($data['page']==0)
			$start = 0;
			else
			$start = ($data['page']-1)*$config["per_page"];
			
			
			$data[$datastring] = $this->CI->Commonmodel->viewassignedsubjectspagination($cond,$order_by='ASC',$order_by_field,$limit,$start);
			
#echo $this->CI->db->last_query();
			
			
			$data[$pagination_string] = $this->CI->pagination->create_links();		
			
			return $data;		
		
	}
	
	
	//viewassignedsubjectspagination ends here	
		
	//viewhomeworkspagination starts here
	
	public function viewhomeworkspagination($table,$cond,$baseurl,$perpage,$order_by_field,$datastring,$pagination_string)
	{
		
			$total_rows = $this->CI->Commonmodel->getnumRows($table,$cond);
			
			$config['base_url'] = $baseurl;
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
			
			$this->CI->pagination->initialize($config);
			
				$data['page'] = ($this->CI->uri->segment(2)) ? (($this->CI->uri->segment(2))) : 0;
			
			$limit = $config["per_page"];
			
			if($data['page']==0)
			$start = 0;
			else
			$start = ($data['page']-1)*$config["per_page"];
			
			
			$data[$datastring] = $this->CI->Commonmodel->viewhomeworkspagination($cond,$order_by='DESC',$order_by_field,$limit,$start);
			
#echo $this->CI->db->last_query();
			
			
			$data[$pagination_string] = $this->CI->pagination->create_links();		
			
			return $data;		
		
	}
	
	//viewhomeworkspagination ends hre
	
	//viewstudentactivitypagination starts here 
	
	public function viewstudentactivitypagination($table,$cond,$baseurl,$perpage,$order_by_field,$datastring,$pagination_string)
	{
		
		$total_rows = $this->CI->Commonmodel->getnumRows($table,$cond);
			
			$config['base_url'] = $baseurl;
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
			
			$this->CI->pagination->initialize($config);
			
				$data['page'] = ($this->CI->uri->segment(2)) ? (($this->CI->uri->segment(2))) : 0;
			
			$limit = $config["per_page"];
			
			if($data['page']==0)
			$start = 0;
			else
			$start = ($data['page']-1)*$config["per_page"];
			
			
			$data[$datastring] = $this->CI->Commonmodel->viewstudentactivitypagination($cond,$order_by='DESC',$order_by_field='MONTH(ActivityDate)',$limit,$start);
			
#echo $this->CI->db->last_query();
			
			
			$data[$pagination_string] = $this->CI->pagination->create_links();		
			
			return $data;
		
		
		
	}
	
	///viewstudentactivitypagination ends here
	
	
	public function salariesPagination($table,$cond,$baseurl,$perpage,$order_by_field,$datastring,$pagination_string)
	{
		
		$config = $this->commonpaginationConfigs($table,$cond,$baseurl,$perpage);
		
		$this->CI->pagination->initialize($config);
			
				$data['page'] = ($this->CI->uri->segment(2)) ? (($this->CI->uri->segment(2))) : 0;
			
			$limit = $config["per_page"];
			
			if($data['page']==0)
			$start = 0;
			else
			$start = ($data['page']-1)*$config["per_page"];
			
			
			$data[$datastring] = $this->CI->Commonmodel->salariesPagination($cond,$order_by='DESC',$order_by_field='',$limit,$start);
			
#echo $this->CI->db->last_query();
			
			
			$data[$pagination_string] = $this->CI->pagination->create_links();		
			
			return $data;
		
		
	}
	
	
	public function commonpaginationConfigs($table,$cond,$baseurl,$perpage)
	{
			$total_rows = $this->CI->Commonmodel->getnumRows($table,$cond);
			
			
			
			$config['base_url'] = $baseurl;
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
			return $config;
		
	}//commonpaginationConfigs ends here
	
	public function viewbills($table,$cond,$baseurl,$perpage,$order_by_field,$datastring,$pagination_string)
	{
		$config = $this->commonpaginationConfigs($table,$cond,$baseurl,$perpage);
		
		$this->CI->pagination->initialize($config);
			
				$data['page'] = ($this->CI->uri->segment(2)) ? (($this->CI->uri->segment(2))) : 0;
			
			$limit = $config["per_page"];
			
			if($data['page']==0)
			$start = 0;
			else
			$start = ($data['page']-1)*$config["per_page"];
			
			
			$data[$datastring] = $this->CI->Commonmodel->viewbills($cond,$order_by='DESC',$order_by_field='',$limit,$start);
			
//echo $this->CI->db->last_query(); exit; 
			
			
			$data[$pagination_string] = $this->CI->pagination->create_links();		
			
			return $data;
	}
	
	
	// starts here
	
	public function vendorsPaginateion($table,$cond,$baseurl,$perpage,$order_by_field,$datastring,$pagination_string)
		{
			
			
			if( sizeof($cond)>1)
			{
				$cnt=1;
				
				foreach($cond as $key=>$val)
				{
					if($cnt==1)
					$this->CI->db->where($key,$val);
					else
					$this->CI->db->or_where($key,$val);
				}
				
				$qry = $this->CI->db->get($table);
				if( $qry->num_rows()>0 )
				$total_rows = $qry->num_rows();
				
			}
			elseif(sizeof($cond)==1)
			{
				$this->CI->db->where($cond);
				$qry = $this->CI->db->get($table);
				if( $qry->num_rows()>0 )
				$total_rows = $qry->num_rows();
				
			}
			else
				$total_rows = $this->CI->Commonmodel->getnumRows($table,$cond);

			$config['base_url'] = $baseurl;
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
			
			$this->CI->pagination->initialize($config);
			
			$data['page'] = ($this->CI->uri->segment(2)) ? (($this->CI->uri->segment(2))) : 0;
			
			$limit = $config["per_page"];
			
			if($data['page']==0)
			$start = 0;
			else
			$start = ($data['page']-1)*$config["per_page"];
			
			$data[$datastring] = $this->CI->Commonmodel->vendorspaginate($table,$cond,$order_by='DESC',$order_by_field,$limit,$start );
			$data[$pagination_string] = $this->CI->pagination->create_links();		
			
			return $data;	
				
		}
	
	// ends here


//getvehiclePagination starts here

	
	public function getvehiclePagination($table,$cond,$baseurl,$perpage,$order_by_field='',$datastring,$pagination_string)
	{
		
		
		$config = $this->commonpaginationConfigs($table,$cond,$baseurl,$perpage);
		
		$this->CI->pagination->initialize($config);
			
				$data['page'] = ($this->CI->uri->segment(2)) ? (($this->CI->uri->segment(2))) : 0;
			
			$limit = $config["per_page"];
			
			if($data['page']==0)
			$start = 0;
			else
			$start = ($data['page']-1)*$config["per_page"];
			
			
			$data[$datastring] = $this->CI->Commonmodel->getvehiclePagination($cond,$order_by='DESC',$order_by_field='',$limit,$start);
			
//echo $this->CI->db->last_query(); exit; 
			
			
			$data[$pagination_string] = $this->CI->pagination->create_links();		
			
			return $data;
	}
	
	//getvehiclePagination ends here
	
	
	public function getnonteachingPagination($table,$cond,$baseurl,$perpage,$order_by_field='',$datastring,$pagination_string)
	{
		
		$config = $this->commonpaginationConfigs($table,$cond,$baseurl,$perpage);
		
		$this->CI->pagination->initialize($config);
			
				$data['page'] = ($this->CI->uri->segment(2)) ? (($this->CI->uri->segment(2))) : 0;
			
			$limit = $config["per_page"];
			
			if($data['page']==0)
			$start = 0;
			else
			$start = ($data['page']-1)*$config["per_page"];
			
			
			$data[$datastring] = $this->CI->Commonmodel->getnonteachingPagination($cond,$order_by='DESC',$order_by_field='',$limit,$start);
			
//echo $this->CI->db->last_query(); exit; 
			
			
			$data[$pagination_string] = $this->CI->pagination->create_links();		
			
			return $data;
		
	}
	
	
	public function getHomeworks($table,$cond,$baseurl,$perpage,$order_by_field,$datastring,$pagination_string)
	{
		
		$config = $this->commonpaginationConfigs($table,$cond,$baseurl,$perpage);
		
		$this->CI->pagination->initialize($config);
			
		$data['page'] = ($this->CI->uri->segment(2)) ? (($this->CI->uri->segment(2))) : 0;
			
			$limit = $config["per_page"];
			
			
			if($data['page']==0)
			$start = 0;
			else
			$start = ($data['page']-1)*$config["per_page"];
			
			
			$data[$datastring] = $this->CI->Commonmodel->getHomeworks($cond,$order_by='DESC',$order_by_field,$limit,$start);
			
//echo $this->CI->db->last_query(); exit; 
			
			
			$data[$pagination_string] = $this->CI->pagination->create_links();		
			
		/*	echo "<pre>";
				print_r($data); 
			exit;*/
			
			return $data;
		
	}
	
	//getmarkslist starts here
	
	public function getmarkslist($table,$cond,$baseurl,$perpage,$order_by_field='',$datastring,$pagination_string)
	{
		$config = $this->commonpaginationConfigs($table,$cond,$baseurl,$perpage);
		$this->CI->pagination->initialize($config);
		
		$data['page'] = ($this->CI->uri->segment(2)) ? (($this->CI->uri->segment(2))) : 0;
			
			$limit = $config["per_page"];
			
			
			if($data['page']==0)
			$start = 0;
			else
			$start = ($data['page']-1)*$config["per_page"];
			
			
			$data[$datastring] = $this->CI->Commonmodel->getmarkslist($cond,$order_by='DESC',$order_by_field,$limit,$start);
			
//echo $this->CI->db->last_query(); exit; 
			
			
			$data[$pagination_string] = $this->CI->pagination->create_links();		
			
		/*	echo "<pre>";
				print_r($data); 
			exit;*/
			
			return $data;
		
	}
	
	//getmarkslist ends here
	
	
		// get student attendance list
		
		public function getstudentattendancelist($table,$cond,$baseurl,$perpage,$order_by_field='',$datastring,$pagination_string)
		{
			$config = $this->commonpaginationConfigs($table,$cond,$baseurl,$perpage);
			$this->CI->pagination->initialize($config);
		
		$data['page'] = ($this->CI->uri->segment(2)) ? (($this->CI->uri->segment(2))) : 0;
			
			$limit = $config["per_page"];
			
			
			if($data['page']==0)
			$start = 0;
			else
			$start = ($data['page']-1)*$config["per_page"];
			
			
			$data[$datastring] = $this->CI->Commonmodel->getstudentattendancelist($cond,$order_by='DESC',$order_by_field,$limit,$start);
			
//echo $this->CI->db->last_query(); exit; 
			
			
			$data[$pagination_string] = $this->CI->pagination->create_links();		
			
		/*	echo "<pre>";
				print_r($data); 
			exit;*/
			
			return $data;
		}
		
		
		//get student attendance list ends here
	} //class ends here
	
?>