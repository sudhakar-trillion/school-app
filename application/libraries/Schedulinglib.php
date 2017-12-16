<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Schedulinglib
	{
		public function __construct()
		{
			date_default_timezone_set("Asia/Kolkata");
			$this->CI =& get_instance();
			
			$this->CI->load->helper('url');
			$this->CI->config->item('base_url');
			$this->CI->load->database();	
			$this->CI->load->model('Commonmodel');
			$this->CI->load->library('pagination');
			$this->CI->load->library('session');
		}
		
		public function getAcademicyear()
		{
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
			
			return $academicYr;
		}//getAcademic Year ends here
		
		
		public function getstudemtSessiondetails()
		{
			if($this->CI->session->userdata('StudentId')!='')
			{
				$studentId = $this->CI->session->userdata('StudentId');
				$rollno = $this->CI->session->userdata('StudentRoll');
				
				$classid = 	$this->CI->session->userdata('CLASS');
				$sectionId = 	$this->CI->session->userdata('SectionId');
				
				$stdName = $this->CI->session->userdata('Student');
				$ClassName = $this->CI->session->userdata('ClassName');
				
				$ClassSection = $this->CI->session->userdata('ClassSection');
				
				$studentDetails =  array(
											"studentId"=>$studentId,
											"rollno"=>$rollno,
											"classid"=>$classid,
											"sectionId"=>$sectionId,
											"stdName"=>$stdName,
											"ClassName"=>$ClassName,
											"ClassSection"=>$ClassSection
										);
										
				return $studentDetails;
			}
			return "0";
			
		}
		
		
		public function getcelebevents($yr,$mnth)
		{
			#echo $mnth; exit;
			
			
			$yr1=date('Y');
			$yr2=date('Y');
					
			if( $mnth>=6 && $mnth<=12 )
				{

					$mtn = $mnth;
					
					$curmnth  = $mnth;
					
					if( $mnth==9 || $mnth==10  )
					{
							$nextmnth =	$mnth+1;
							$nextmnth = $nextmnth;
						
							$onemoremonth = $mnth+2;
							$onemoremonth = $onemoremonth;	
					}
					elseif( $mnth == 11 || $mnth == 12 )
					{
							if($mnth == 12)
							{
								$nextmnth =	"01";
								$nextmnth = "01";
								$onemoremonth ="02";
							}
							else
							{
								$nextmnth =	$mnth+1;
								$nextmnth = $nextmnth;
								$onemoremonth ="01";
							}
							$yr1=date('Y');
								$yr2=date('Y')+1;
							
								$this->CI->db->like('Celebration_Date', $yr1."-".$curmnth );
								$this->CI->db->or_like('Celebration_Date', $yr2."-".$nextmnth );
								$this->CI->db->or_like('Celebration_Date', $yr2."-".$onemoremonth );
						
								
					}
					else
					{
						$nextmnth =	$mnth+1;
						$nextmnth = "0".$nextmnth;
						
						$onemoremonth = $mnth+2;
						$onemoremonth = "0".$onemoremonth;
					}
					$this->CI->db->like('Celebration_Date', $yr1."-".$curmnth );
					$this->CI->db->or_like('Celebration_Date', $yr1."-".$nextmnth );
					$this->CI->db->or_like('Celebration_Date', $yr1."-".$onemoremonth ); 

				}
			else
			{
				
				$curmnth  = "03";
				$nextmnth =	"04";

				
				$yr1=date('Y')+1;
				$yr2=date('Y')+1;
		
				$this->CI->db->like('Celebration_Date', $yr1."-".$curmnth );
				$this->CI->db->or_like('Celebration_Date', $yr2."-".$nextmnth );
				
			
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
		
		public function getholidaylist($yr,$mnth)
		{
			#echo $mnth; exit;
			
			
			$yr1=date('Y');
			$yr2=date('Y');
			
			if( $mnth<6 )
				$mnth=6;
					
			if( $mnth>=6 && $mnth<=12 )
				{

							$mtn = $mnth;
							
							$curmnth  = $mnth;
							
							if( $mnth == 11 || $mnth == 12 )
							{
								if($mnth == 12)
								{
									$nextmnth = "01";
									$onemoremonth ="02";
									$yr1=date('Y');
									$yr2=date('Y')+1;
									
									$this->CI->db->like('HolidayOn', $yr1."-".$curmnth );
									$this->CI->db->or_like('HolidayOn', $yr2."-".$nextmnth );
									$this->CI->db->or_like('HolidayOn', $yr2."-".$onemoremonth );
								}
								else
								{
									$nextmnth =	$mnth+1;
									$nextmnth = $nextmnth;
									$onemoremonth ="01";
									$yr1=date('Y');
									$yr2=date('Y')+1;
									
									$this->CI->db->like('HolidayOn', $yr1."-".$curmnth );
									$this->CI->db->or_like('HolidayOn', $yr1."-".$nextmnth );
									$this->CI->db->or_like('HolidayOn', $yr2."-".$onemoremonth );
								}
								
						}
						else
						{
							$nextmnth =	$mnth+1;
						
							if($nextmnth<=9)
								$nextmnth = "0".$nextmnth;
							else
								$nextmnth = $nextmnth;
							
							
							$onemoremonth = $mnth+2;
							if($onemoremonth<=9)
								$onemoremonth = "0".$onemoremonth;
							else
								$onemoremonth =$onemoremonth;
							
							
							if($curmnth<=9)
								$this->CI->db->or_like('HolidayOn', $yr1."-0".trim($curmnth,'0') );
							else
								$this->CI->db->or_like('HolidayOn', $yr1."-".$curmnth );
							
								$this->CI->db->or_like('HolidayOn', $yr1."-".$nextmnth );
								$this->CI->db->or_like('HolidayOn', $yr1."-".$onemoremonth ); 
						}

				}
			else
			{
				
				
				if( $mnth=="14" )
				{
					$curmnth  = "01";
					$nextmnth =	"02";
					$onemoremonth="03";
					$yr=$yr+1;
					
					$this->CI->db->like('HolidayOn', $yr."-".$curmnth );
					$this->CI->db->or_like('HolidayOn', $yr."-".$nextmnth );
					$this->CI->db->or_like('HolidayOn', $yr."-".$onemoremonth ); 
					
				}
				
				
			
			}//else ends here
			
			$this->CI->db->like('AcademicYear', $this->getAcademicyear() );
			
			$this->CI->db->select("month(HolidayOn) as mnth, day(HolidayOn) as day, HolidayId, HolidayFor ");
			$this->CI->db->order_by("month(HolidayOn)","ASC");
//			$this->CI->db->order_by("year(Celebration_Date)","ASC");

			$qry = $this->CI->db->get('holidaylist');
			#return $this->CI->db->last_query();
			
			$ourput_arr = array();
			$prevMonth = "0";
			if($qry->num_rows()>0)
			{
				foreach($qry->result() as $hoidays)
				{
					$ourput_arr[$hoidays->mnth][$hoidays->day] =$hoidays->HolidayFor."/||||".$hoidays->HolidayId;
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
			
			if( $mnth<6 )
				$mnth=6;
			
				$this->CI->db->select("month(ExamSchedule) as mnth, day(ExamSchedule) as day, ClassName, ClassSection, Exam, Subject, ExamSchedule");
			$this->CI->db->order_by("month(ExamSchedule)","ASC");
			
			
			$this->CI->db->group_start();
		
			if( $mnth>=6 && $mnth<=12 )
			{
					$mtn = $mnth;
					$curmnth  = $mnth;
							
					if( $mnth == 11 || $mnth == 12 )
					{
								if($mnth == 12)
								{
									$nextmnth = "01";
									$onemoremonth ="02";
									$yr1=date('Y');
									$yr2=date('Y')+1;
									
									$this->CI->db->like('ExamSchedule', $yr1."-".$curmnth );
									$this->CI->db->or_like('ExamSchedule', $yr2."-".$nextmnth );
									$this->CI->db->or_like('ExamSchedule', $yr2."-".$onemoremonth );
								}
								else
								{
									$nextmnth =	$mnth+1;
									$nextmnth = $nextmnth;
									$onemoremonth ="01";
									$yr1=date('Y');
									$yr2=date('Y')+1;
									
									$this->CI->db->like('ExamSchedule', $yr1."-".$curmnth );
									$this->CI->db->or_like('ExamSchedule', $yr1."-".$nextmnth );
									$this->CI->db->or_like('ExamSchedule', $yr2."-".$onemoremonth );
								}
								
						}
					else
					{
						
							$nextmnth =	$mnth+1;
						
							if($nextmnth<=9)
								$nextmnth = "0".$nextmnth;
							else
								$nextmnth = $nextmnth;
							
							
							$onemoremonth = $mnth+2;
							if($onemoremonth<=9)
								$onemoremonth = "0".$onemoremonth;
							else
								$onemoremonth =$onemoremonth;
							
							
							if($curmnth<=9)
								$this->CI->db->or_like('ExamSchedule', $yr1."-0".trim($curmnth,'0') );
							else
								$this->CI->db->or_like('ExamSchedule', $yr1."-".$curmnth );
							
								$this->CI->db->or_like('ExamSchedule', $yr1."-".$nextmnth );
								$this->CI->db->or_like('ExamSchedule', $yr1."-".$onemoremonth ); 
						
					}
					

				
			}
			else
			{
				
				if( $mnth=="14" || $mnth=="13"  )
				{
					$curmnth  = "01";
					$nextmnth =	"02";
					$onemoremonth="03";
					$yr=$yr+1;
					
					$this->CI->db->like('ExamSchedule', $yr."-".$curmnth );
					$this->CI->db->or_like('ExamSchedule', $yr."-".$nextmnth );
					$this->CI->db->or_like('ExamSchedule', $yr."-".$onemoremonth ); 
					
				}
				else if( $mnth=="15" )
				{
					$curmnth  = "03";
					$nextmnth =	"04";
					$onemoremonth="04";
					$yr=$yr+1;
					
					$this->CI->db->like('ExamSchedule', $yr."-".$curmnth );
					$this->CI->db->or_like('ExamSchedule', $yr."-".$nextmnth );
					$this->CI->db->or_like('ExamSchedule', $yr."-".$onemoremonth ); 
					
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
		#return $this->CI->db->last_query();
	
#echo $this->CI->db->last_query()."||".$qry->num_rows(); 
			
			$ourput_arr = array();
			$prevMonth = "0";
			if($qry->num_rows()>0)
			{
				foreach($qry->result() as $schedules)
				{
					$ourput_arr[$schedules->mnth][$schedules->day] = $schedules->ExamSchedule;
				}
				
				return $ourput_arr;
			}
			else
				return "0";
			
			
			
		}
	
		
	}//class ends here
?>