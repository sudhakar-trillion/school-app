<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Schedulinglib
	{
		public function __construct()
		{
			$this->CI =& get_instance();
			
			$this->CI->load->helper('url');
			$this->CI->config->item('base_url');
			$this->CI->load->database();	
			$this->CI->load->model('Commonmodel');
			$this->CI->load->library('pagination');
			$this->CI->load->library('session');
		}
		
		
		public function getcelebevents($yr,$mnth)
		{
			
			$yr1=date('Y');
			$yr2=date('Y');
					
			if( $mnth<9 && $mnth>=6 )
				{

					
					$mtn = $mnth;
					
					$curmnth  = $mnth;
					
					$nextmnth =	$mnth+1;
					$nextmnth = "0".$nextmnth;
					

					
					$onemoremonth = $mnth+2;
					$onemoremonth = "0".$onemoremonth;
					
					$this->CI->db->like('Celebration_Date', $yr1."-".$curmnth );
					$this->CI->db->or_like('Celebration_Date', $yr1."-".$nextmnth );
					$this->CI->db->or_like('Celebration_Date', $yr1."-".$onemoremonth ); 

				}
			else
			{
				if($mnth==9)
				{
					$curmnth  = "09";
					$nextmnth =	"10";
					$onemoremonth = "11";
					
					$this->CI->db->like('Celebration_Date', $yr1."-".$curmnth );
					$this->CI->db->or_like('Celebration_Date', $yr1."-".$nextmnth );
					$this->CI->db->or_like('Celebration_Date', $yr1."-".$onemoremonth ); 
					
					
				}
				else
				{
					$curmnth  = "12";
					$nextmnth =	"01";
					$onemoremonth = "02";
						
					if($mnth<=12)
					{
						$yr1=date('Y');
						$yr2=date('Y')+1;
						
						$this->CI->db->like('Celebration_Date', $yr1."-".$curmnth );
						$this->CI->db->or_like('Celebration_Date', $yr2."-".$nextmnth );
						$this->CI->db->or_like('Celebration_Date', $yr2."-".$onemoremonth );
						
						
					}
					else
					{
						$curmnth  = "03";
						$nextmnth =	"04";

						
						$yr1=date('Y')+1;
						$yr2=date('Y')+1;
				
						$this->CI->db->like('Celebration_Date', $yr1."-".$curmnth );
						$this->CI->db->or_like('Celebration_Date', $yr2."-".$nextmnth );

						
					}
					
					 


				}
			}//else ends here
			
			$this->CI->db->select("month(Celebration_Date) as mnth, day(Celebration_Date) as day, CelebId, Celebration_Text ");
			$this->CI->db->order_by("month(Celebration_Date)","ASC");
//			$this->CI->db->order_by("year(Celebration_Date)","ASC");
			$qry = $this->CI->db->get('celebrations');
	//		return $this->CI->db->last_query();
			
			$ourput_arr = array();
			$prevMonth = "0";
			if($qry->num_rows()>0)
			{
				foreach($qry->result() as $celebrations)
				{
					$ourput_arr[$celebrations->mnth][$celebrations->day] =$celebrations->Celebration_Text."/||||".$celebrations->CelebId;
				}
				return $ourput_arr;
			}
			else
				return "0";
			
			
		}
		
		public function getscheduledexams($yr,$mnth)
		{
			
			
			$yr1=date('Y');
			$yr2=date('Y');
			
			
				$this->CI->db->select("month(ExamSchedule) as mnth, day(ExamSchedule) as day, ClassName, ClassSection, Exam, Subject, ExamSchedule");
			$this->CI->db->order_by("month(ExamSchedule)","ASC");
			
			
			$this->CI->db->group_start();
					
			if( $mnth<9 && $mnth>=6 )
				{

					
					$mtn = $mnth;
					
					$curmnth  = "0".$mnth;
					
					$nextmnth =	$mnth+1;
					$nextmnth = "0".$nextmnth;
					
					$onemoremonth = $mnth+2;
					$onemoremonth = "0".$onemoremonth;
					
					$this->CI->db->like('ExamSchedule', $yr1."-".$curmnth );
					$this->CI->db->or_like('ExamSchedule', $yr1."-".$nextmnth);
					$this->CI->db->or_like('ExamSchedule', $yr1."-".$onemoremonth); 

				}
			else
			{
				if($mnth==9)
				{
					$curmnth  = "09";
					$nextmnth =	"10";
					$onemoremonth = "11";
					
					$this->CI->db->like('ExamSchedule', $yr1."-".$curmnth );
					$this->CI->db->or_like('ExamSchedule', $yr1."-".$nextmnth );
					$this->CI->db->or_like('ExamSchedule', $yr1."-".$onemoremonth ); 
					
					
				}
				else
				{
					$curmnth  = "12";
					$nextmnth =	"01";
					$onemoremonth = "02";
						
					if($mnth<=12)
					{
						$yr1=date('Y');
						$yr2=date('Y')+1;
						
						$this->CI->db->like('ExamSchedule', $yr1."-".$curmnth );
						$this->CI->db->or_like('ExamSchedule', $yr2."-".$nextmnth );
						$this->CI->db->or_like('ExamSchedule', $yr2."-".$onemoremonth );
						
						
					}
					else
					{
						$curmnth  = "03";
						$nextmnth =	"04";

						
						$yr1=date('Y')+1;
						$yr2=date('Y')+1;
				
						$this->CI->db->like('ExamSchedule', $yr1."-".$curmnth );
						$this->CI->db->or_like('ExamSchedule', $yr2."-".$nextmnth );

						
					}
					
					 


				}
			}//else ends here
			$this->CI->db->group_end();
			
			
			
			if( $this->CI->session->userdata('parent')!='')
			{$this->CI->db->group_start();
				$cond = array();
				
				$cond['ClassName'] =  $this->CI->session->userdata('CLASS');
				$cond['ClassSection'] =  $this->CI->session->userdata('SectionId');
				
				
				$this->CI->db->where($cond);
				$this->CI->db->group_end();
			}
			
		
//			$this->CI->db->order_by("year(Celebration_Date)","ASC");
			$qry = $this->CI->db->get('examschedules');
	//		return $this->CI->db->last_query();
	
#echo $this->CI->db->last_query()."||".$qry->num_rows(); 
			
			$ourput_arr = array();
			$prevMonth = "0";
			if($qry->num_rows()>0)
			{
				foreach($qry->result() as $schedules)
				{
					
					//get the class
					
					/*
					$table='newclass';
					$cond = array();
					$cond['SLNO'] = $schedules->ClassName;
					$field='ClassName';
					$order_by='';
					$order_by_field='';
					$limit='';
					
					$Class = $this->CI->Commonmodel->getAfield($table,$cond,$field,$order_by='',$order_by_field='',$limit='');


					$table='sections';
					$cond = array();
					$cond['ClassSlno'] = $schedules->ClassName;
					$field='Section';
					$order_by='';
					$order_by_field='';
					$limit='';
					
					$Section = $this->CI->Commonmodel->getAfield($table,$cond,$field,$order_by='',$order_by_field='',$limit='');
					
					
					$table='subjects';
					$cond = array();
					$cond['SubjectId'] = $schedules->Subject;
					$field='SubjectName';
					$order_by='';
					$order_by_field='';
					$limit='';
					
					$SubjectName = $this->CI->Commonmodel->getAfield($table,$cond,$field,$order_by='',$order_by_field='',$limit='');
					
					$table='whichexam';
					$cond = array();
					$cond['ExamId'] = $schedules->Exam;
					$field='Exam';
					$order_by='';
					$order_by_field='';
					$limit='';
					
					$Exam = $this->CI->Commonmodel->getAfield($table,$cond,$field,$order_by='',$order_by_field='',$limit='');
					
					
					*/
					
					$ourput_arr[$schedules->mnth][$schedules->day] = $schedules->ExamSchedule;
				}
				
				return $ourput_arr;
			}
			else
				return "0";
			
			
			
		}
		
	}//class ends here
?>