<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MiscellaneousRequestdispatcher extends CI_Controller 
{

	 public function __construct()
		{
			parent::__construct();
			date_default_timezone_set("Asia/Kolkata");
			
			$this->load->model('Commonmodel');
			
		}//constructor stARTS HERE
		
	
	
	public function striptags($posted_data)
		{
			
		
			$requested_from =  $_SERVER['HTTP_REFERER'];
			
			
		if( strpos($requested_from, 'localhost') !== false || strpos($requested_from, '192.168.0.3') !== false || strpos($requested_from, 'trillionit.in') !== false || strpos($requested_from, 'adiakshara.in') !== false )
			//if( strpos($requested_from, 'trillionit.in') !== false)
			{
			//foreach($posted_data as $key=>$val) { $_POST[$key] = htmlentities( stripslashes(strip_tags($val)), ENT_QUOTES | ENT_HTML5, 'UTF-8'); }
			foreach($posted_data as $key=>$val) 
			{ 
			$str = stripslashes(str_replace("'","",$val));
			//The following to sanitize a string. It will both remove all HTML tags, and all characters with ASCII value > 127, from the string:
			$_POST[$key] = filter_var($str, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH); 
			
			}
			return $_POST;	
			}
			else
			echo "!!!! Access denied !!!!"; exit; 
		
		}
			
	public function getStaff()
	{
		$postdata = $this->striptags($_POST);
		extract( $postdata );
		
		$cond = array();
		$table ='staff';

		
		if($Staff=="Teaching")
			$cond['Category'] = "Teaching";		
		else
			$cond['Category'] = "Nonteaching";
		
		
		$staff = $this->Commonmodel->getrows($table,$cond,$order_by='',$order_by_field='',$limit='');
		
		if($staff!='0')
		{
			$output = array();
			
			foreach( $staff->result() as $staf )
			{
				$output[] = array(
									"StaffId"=>$staf->StaffId,
									"StaffName"=>$staf->StaffName	
									);
			}
			
			echo json_encode($output);
		}
		else
			echo "0";

	}//getStaff ends here
	
	
	public function addsalaries()
	{
		$postdata = $this->striptags($_POST);
		
		$cond = array();
		$table = 'salaries';
		$insertdata = array();
		

		foreach($postdata  as $key=>$val)
		{
			$insertdata[$key] = $val;
		}
		
		$insertdata['LastUpdated'] = time();
		$insertdata['WhichYear'] = date('Y');
		
		$qry =  $this->Commonmodel->insertdata($table,$insertdata);
		if($qry)
			echo "1"; 
		else
			echo "0"; 
			
		
	}//adding salary ends here
	
	//editsalary starts here
	
	public function editsalary()
	{
		$postdata = $this->striptags($_POST);

		
		$cond = array();
	
		$cond['SLNO']  =$postdata['SalaryId'];
		$table = 'salaries';
		$setdata = array();
		

		foreach($postdata  as $key=>$val)
		{
			if($key!='SalaryId')
				$setdata[$key] = $val;
		}
		
		$setdata['LastUpdated'] = time();
		$setdata['WhichYear'] = date('Y');
		$qry =  $this->Commonmodel->updatedata($table,$setdata,$cond);
		if($qry)
			echo "1"; 
		else
			echo "0"; 
	}
	
	//editsalaryends here
	
	//assignstudenttoroute starts here
	
	public function assignstudenttoroute()
	{
		
		//check whether the student with the class and section exists in the table or not
		
		$cond = array();
		$table = 'assignstdroute';
		

		foreach($_POST['students'] as $key=>$val )
		{
		
			$cond['StudentId']	 =	$_POST['students'][$key]['StudentRoll'];
			$cond['ClassId']	 =  $_POST['ClassName'];
			$cond['SectionId']	 = 	$_POST['section'];
			
			if( $this->Commonmodel->checkexists($table,$cond))
			{
				
				//get the route number
				$Routenum = $this->Commonmodel->getAfield($table,$cond,$field='RouteId',$order_by='',$order_by_field='',$limit='');
				
					if(  $_POST['students'][$key]['Added'] =='Yes' )
					{
						if($Routenum==$_POST['RouteNumber'])
						{
						}
						else
						{
							$insertdata = array();
							
							$insertdata['StudentId']	=	$_POST['students'][$key]['StudentRoll'];
							$insertdata['ClassId']	 	=   $_POST['ClassName'];
							$insertdata['SectionId']	= 	$_POST['section'];
							$insertdata['RouteId']		=	$_POST['RouteNumber'];
							$insertdata['LastUpdated']	=	time();
							
							$this->Commonmodel->insertdata($table,$insertdata);
						}	
					}
					else
					{
						if($Routenum==$_POST['RouteNumber'])
							$this->Commonmodel->deleterow($table,$cond);	
						
					}
				
			}
			else
			{
				
				if( $_POST['students'][$key]['Added'] =='Yes' )	
				{
					$insertdata = array();

					$insertdata['StudentId']	=	$_POST['students'][$key]['StudentRoll'];
					$insertdata['ClassId']	 	=   $_POST['ClassName'];
					$insertdata['SectionId']	= 	$_POST['section'];
					$insertdata['RouteId']		=	$_POST['RouteNumber'];
					$insertdata['LastUpdated']	=	time();
					
					$this->Commonmodel->insertdata($table,$insertdata);
				
				}
			}
		}//for each ends here 
			
		echo "1";
			
	}
	
	//assignstudenttoroute ends here
	

//clear al the filter

public function clearfilters()
{
	$postdata = $this->striptags($_POST);
	extract($postdata);


	if($FilterFor=="Class_Fee")
	{
			
		
		if($this->session->userdata('Student_Fee')!='') 
			$this->session->set_userdata('Student_Fee','');
			
		if( $this->session->userdata('Section_Fee')!='')
			$this->session->set_userdata('Section_Fee','');
			
			$this->session->set_userdata('Class_Fee','');
	}
	else if($FilterFor=="Section_Fee")
	{
		if($this->session->userdata('Student_Fee')!='') 
			$this->session->set_userdata('Student_Fee','');
		
		$this->session->set_userdata('Section_Fee','');	
	
	}
	
	if($FilterFor=="Student_Fee")
	{
		$this->session->set_userdata('Student_Fee','');
	}
}	


///clear all the filters ends here

//get the fee details of every month till the current of individual student

	public function getfeedetailsStudent()
	{
		$postdata = $this->striptags($_POST);
		extract($postdata);
		
		$StudentId = $viewid;
		$output_arrr = array();
		$academics = array();
		
		$paidAmount='0';
		
		$academicYEAR = $this->getAdcademicYear();
		
		//storing the academic year with months
		
		
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
				
		
		$this->db->select('fee.MonthlyFee as MonthlyFee,std.ClassName as ClassId, std.ClassSection as Secid, concat(std.Student," ",std.LastName ) as StudentName, std.Roll as RollNo, cls.ClassName as ClassNaam,sec.Section as SectionNaam ');
		$this->db->from('schoolfee as fee');
		$this->db->join('students std','std.ClassName=fee.Class');
		$this->db->join('newclass as cls','cls.SLNO=std.ClassName');
		$this->db->join('sections as sec','sec.SectionId=std.ClassSection');
		
		$this->db->where('std.StudentId',$StudentId);
		$stddetails = $this->db->get('');
		
		if( $stddetails!='0')
		{
			$mnth=5;
		
			foreach( $academics as $key=>$val )
			{
				
//			$mnth = $key;
			
			$mnth++;
			if( $mnth<=date('m') )
			{
				$month = explode("/",$val);
				
				foreach($stddetails->result() as $stds)
				{
					
					//get the amount paid on the month by the student
					
					$table = 'feecollection';
					$cond = array();
					
					$cond['StudentId'] = $StudentId;
					$cond['ClassId'] = $stds->ClassId; 
					$cond['SectionId'] = $stds->Secid;  
					$cond['Month(Month)'] = $mnth; 
					$cond['AcademicYear'] = $academicYEAR;
					
					
					$this->db->select('sum(Paid) as Paid');
					$this->db->from($table);
					$this->db->where($cond);
					$paid =  $this->db->get()->row('Paid');
					
					if($paid=='')
						$paidAmount = 0;
					else
						$paidAmount = $paid;
					
					$DueAmount = ($stds->MonthlyFee)-$paidAmount;
					
					$output_arrr[] = array(
										"StudentName"=>$stds->StudentName,
										"RollNo"=>$stds->RollNo,
										"ClassNaam"=>$stds->ClassNaam,
										"SectionNaam"=>$stds->SectionNaam,
										"Month"=>$month[0],
										"AcademicYr"=>$month[1],
										"MonthlyFee"=>$stds->MonthlyFee,
										"PaidAmount" =>$paidAmount,
										"DueAmount"=>$DueAmount,
										"StudentId"=>$StudentId,
										"ClassId"=>$stds->ClassId,
										"Secid"=>$stds->Secid,
										"mnth"=>$mnth
										
										
										
										);
				}
			}
			
		
			}
			echo json_encode($output_arrr);
		}//if ends here
		else
			echo "0";
	}
	
	
	//getFeedue starts here
	
	public function getFeedue()
	{
		$postdata = $this->striptags($_POST);
		extract($postdata);
		
		$cond = array();
		
		//get the student details using the stduent id
		
		$this->db->select('fee.MonthlyFee as MonthlyFee,std.ClassName as ClassId, std.ClassSection as Secid, concat(std.Student," ",std.LastName ) as StudentName, std.Roll as RollNo, cls.ClassName as ClassNaam,sec.Section as SectionNaam ');
		$this->db->from('schoolfee as fee');
		$this->db->join('students std','std.ClassName=fee.Class');
		$this->db->join('newclass as cls','cls.SLNO=std.ClassName');
		$this->db->join('sections as sec','sec.SectionId=std.ClassSection');
		
		$this->db->where('std.StudentId',$Stdid);
		$stddetails = $this->db->get('');
		
		$monthNum  = $Feemnth;
		$dateObj   = DateTime::createFromFormat('!m', $monthNum);
		$monthName = $dateObj->format('F');
		
		
		
		if( $Feemnth<10)
			$Feemnth="0".$Feemnth;
		
		
		$currentMnth = date('n');
                            
		$academicYEAR = $this->getAdcademicYear();
		
		
		$this->db->select("sum(Paid) TotalPaid ");
		$this->db->from('feecollection');
		$this->db->where('Month(Month)',$Feemnth);
		$this->db->where('AcademicYear',$academicYEAR);
		$this->db->where('StudentId',$Stdid);
		$this->db->limit(1);
		$this->db->order_by('FeeCollectionId','DESC');

		$TotalPaid = $this->db->get()->row('TotalPaid');

		foreach( $stddetails->result() as $stds)
		{
			if($TotalPaid=='')
				$DueAmount = $stds->MonthlyFee;
			else
				$DueAmount = $stds->MonthlyFee-$TotalPaid;
				
			$output_arrr[] = array(
										"StudentName"=>$stds->StudentName,
										"RollNo"=>$stds->RollNo,
										"ClassNaam"=>$stds->ClassNaam,
										"SectionNaam"=>$stds->SectionNaam,
										"Month"=>$monthName,
										"Due"=>$DueAmount,
										"StudentId"=>$Stdid,
										"ClassId"=>$stds->ClassId,
										"Secid"=>$stds->Secid,
										"mnth"=>$Feemnth
										);
		}
		echo json_encode($output_arrr);		
	}
	
	
	//getFeedue end here


//addMonthFee starts here
	
	public function addMonthFee()
	{
		$postdata = $this->striptags($_POST);
		extract($postdata);
		
		
		$academicYEAR = $this->getAdcademicYear();
		
		$cond = array();
		$table = 'schoolfee';
		
		$cond['Class'] = $ClassId;
		
		$MonthlyFee = $this->Commonmodel->getAfield($table,$cond,$field='MonthlyFee',$order_by='',$order_by_field='',$limit='');
		
	
		$cond = array();
		
		$cond['StudentId'] = $StudentId;
		$cond['ClassId'] = $ClassId;
		$cond['SectionId'] = $SectionId;
		$cond['AcademicYear'] = $academicYEAR;
		
		$cond['MONTH(Month)'] = $Fee_Month;
		
		$table = 'feecollection';
		
		$PaidTill = $this->Commonmodel->getAfieldWithalias($table,$cond,$field='sum(Paid)',$Alias='PaidTill',$order_by='',$order_by_field='',$limit='');

		$ActualDue = ($MonthlyFee)-($PaidTill);
		
		if($ActualDue>=$PayingDue)
		{
			
			$FinalDue			 		= $ActualDue-$PayingDue;

			$insertdata 				= array();
			$table 						= 'feecollection';
			
			$insertdata['StudentId'] 	= $StudentId;
			$insertdata['ClassId'] 		= $ClassId;
			$insertdata['SectionId'] 	= $SectionId;
			$insertdata['Month'] 		= date('Y')."-".$Fee_Month."-".date('d');
			$insertdata['AcademicYear'] = $academicYEAR;
			
			$insertdata['ActualFee'] 	= $MonthlyFee;	
			$insertdata['Paid']		 	= $PayingDue;	
			$insertdata['Due']			= $FinalDue;	
			
			$insertdata['PaidOn']		= date('Y-m-d H:i:s');	
			$insertdata['LastUpdated']	= time();
			
			/*echo "<pre>";
				print_r($insertdata);
			exit;	
			*/
			if( $this->Commonmodel->insertdata($table,$insertdata))
				echo "1";
			else
				echo "0";
			
		}
		else
			echo "-1";
		
		
		
		
		
		
		
	}

//addMonthFee ends here
		
	

//getfeestats starts here

	public function getfeestats()
	{
		
		$postdata = $this->striptags($_POST);
		extract($postdata);
		
		$AdcademicYear = $this->getAdcademicYear();
		
		
		
		
		
		$academics=array();
		$MonthlyFee_class = array();		
		
		$mnth_cnt = 5;
		$cnt=0;
		$TotalDue=0;
		$dues = array() ;
		
		$out_put=array();
		
		$totalAmntForallClss = 0;
		
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
				$academic_mnth = date('M', mktime(0, 0, 0, $mnth_cnt, 1));
				$academics[] = $academic_mnth;
			}
		 else
		 {
			$academic_mnth = date('M', mktime(0, 0, 0, $mnth_cnt, 1));
			$academics[] = $academic_mnth;
		 }
		}
		//feehastocollect
		
		//get the number of students from each class
		
		$cond=array();
		
		$cond['AcademicYear'] = $this->getAdcademicYear();
		
	
	
			//get the classes from the students table
			
			$table='students';
			$fields='ClassName';
			
			$groupby='ClassName';
			$order_by='ASC';
			
			$order_by_field='ClassName';
			$limit='';

			if( isset($Cls) && $Cls>0 )
			$cond['ClassName'] = $Cls;
			
			$classes = $this->Commonmodel->getRows_fields_groupby($table,$cond,$fields,$groupby,$order_by,$order_by_field,$limit);
			
			$month_wise_yet_toPay=0;
			
			$cnt++;
			$month_wise_yet_toPay=0;
			$Paidbynow=0;
			
			$total_class_avail = $classes->num_rows();
			
			$Paidbynow=0;
			$TotalDue = 0;
			$MonthlyFee=0;
			$Total_Students=0;
			
			$mnth_cnt = 6;
			
			$tri_cnt=0;
			for($m=-4; $m<=7; ++$m)
			{
				
				$cls_cnt=0;
				if($mnth_cnt<=12)	
					{
						
					}
				else
				{
					if($m==3)
						$mnth_cnt=0;

				}
				
				$TotalDue=0;
				$Paidbycls =0;
				
				$mnth_total_fee=0;
					
					
					//	
					
					
				foreach( $classes->result() as $cls)
				{
					
					
						$cls_cnt++;
						
						$Total_Students = 0;
												
						//get the monthly fee for the class
						
						if($mnth_cnt>12)
						$cnt=1;
						
						$cond=array();
						$table='schoolfee';
						
						$cond['AcademicYear'] = $AdcademicYear;
						$cond['Class'] = $cls->ClassName;
						$field = 'MonthlyFee';
						
						$MonthlyFee = $this->Commonmodel->getAfield($table,$cond,$field,$order_by='',$order_by_field='',$limit='');
						
						#echo $MonthlyFee."<BR>";
						
						//get totla number of students in a class
						
						$cond					= array();
						
						$cond['AcademicYear'] 	= $AdcademicYear;
						$cond['ClassName']    	= $cls->ClassName;
						
						if($sectionId>0)
						$cond['ClassSection']		= $sectionId;
						
						$table 				  	= 'students';
						
						$field				  	= 'count(Student)';
						$Alias				  	=  'Total_Students';
						
						$Total_Students		  	= $this->Commonmodel->getAfieldWithalias($table,$cond,$field,$Alias,$order_by='',$order_by_field='',$limit='');
						
						
						
						#echo $this->db->last_query()."<br>";
						
						$cond 					= array();
					
						$cond['MONTH(Month)']	= $mnth_cnt;
						$cond['ClassId']		= $cls->ClassName;
						$cond['AcademicYear']	= $AdcademicYear;
						
						if($sectionId>0)
						$cond['SectionId']		= $sectionId;
						
						$table 				  	= 'feecollection';
						
						$field				  	= 'sum(Paid)';
						$Alias				  	=  'Total_Paid';
						
						$Total_Paid		  		= $this->Commonmodel->getAfieldWithalias($table,$cond,$field,$Alias,$order_by='',$order_by_field='',$limit='');
						
						if($Total_Paid=='')
						{
							$Total_Paid =0;
						}
							
						#echo "<br>$Total_Paid<BR>";
						#echo $MonthlyFee*$Total_Students."<br>";
						
						$Paidbycls				= $Paidbycls+$Total_Paid;
						
					#	echo $this->db->last_query()."<br>";
						
						$mnth_total_fee = ($mnth_total_fee)+($MonthlyFee*$Total_Students);
						
				#	echo $Total_Students."<BR>";
						
						if($cls_cnt==$total_class_avail)
						{
							
							$TotalDue = ($mnth_total_fee)-$Paidbycls;
							#echo $mnth_total_fee.":".$TotalDue.":$Paidbycls <br>";
							$dues[]		=	$TotalDue;
							$MonthlyFee_class[] = $mnth_total_fee;
							
							$totalAmntForallClss = $totalAmntForallClss+$mnth_total_fee;
							
							if($Total_Paid=='')
							$totalAmntForallClss = $TotalDue;
								
							
						}
				
				}
				
				$mnth_cnt++;
			}
			
		
		

		$out_put['Academics'] 		= $academics;
		$out_put['Dues'] 			= $dues;
		$out_put['MonthlyFee'] 		= $totalAmntForallClss;
		echo json_encode($out_put);

		
}//getfeestats ends hree		


public function getFeeHastocollect()
{
	$postdata = $this->striptags($_POST);
		extract($postdata);
	$AcademicYear = $this->schedulinglib->getAcademicyear();
	
	$postdata['AcademicYear'] = $AcademicYear;
	
	$qry = 	$this->Commonmodel->getFeeHastocollect($postdata);
	
	$dues=array();
	$MonthlyFee_class = array();
	$collected = array();
	
	$cond = array();
	$cond['Class'] =$Cls;
	$cond['AcademicYear'] = $AcademicYear;
	$table = 'schoolfee';
	$field = "MonthlyFee";
	
	$MonthlyFee = $this->Commonmodel->getAfield($table,$cond,$field,$order_by='',$order_by_field='',$limit='');


	if( $Cls>0 && $sectionId>0 )
			$TotalStudents = $this->Commonmodel->getnumRows('students',array("ClassName"=>$Cls,"ClassSection"=>$sectionId,"AcademicYear"=>$AcademicYear));
	else if( $Cls>0 )
			$TotalStudents = $this->Commonmodel->getnumRows('students',array("ClassName"=>$Cls,"AcademicYear"=>$AcademicYear));
	
			
	if( ( $Cls>0 && $sectionId>0) || $Cls>0 )
		$totalAmntForallClss = ($TotalStudents)*($MonthlyFee);
	else
	{
		//get the total students ofeach class and the fee forthe class
		
		$this->db->select(" std.ClassName, count(std.StudentId) as TotalStudents, fee.MonthlyFee");
		$this->db->from('students as std');
		$this->db->join('schoolfee as fee','fee.Class=std.ClassName','inner');
		$this->db->group_by('std.ClassName');
		$this->db->order_by('std.ClassName','ASC');
		$this->db->where("fee.AcademicYear",$AcademicYear);
		$qrey = $this->db->get();
		
		$totalFee = 0;
		#print_r($qrey->result()); exit; 
		foreach( $qrey->result() as $data)
		{
			$totalFee = $totalFee+( ($data->TotalStudents)*( $data->MonthlyFee) );
		}
		
		$totalAmntForallClss=$totalFee;
		
	}
	
	foreach( $qry->result() as $feedetails)
		{
			$TotalDue=0;
			$TotalDue = $totalAmntForallClss-($feedetails->FeePaid);
			
			$collectedAmnt=0;
			$collectedAmnt = $collectedAmnt+$feedetails->FeePaid;
			
			$dues[]		=	$TotalDue;
			$MonthlyFee_class[] = $totalAmntForallClss;
			$Academics[] = $feedetails->MonthName;
			$collected[] = $collectedAmnt; 
				
		}
	
	
		$out_put['Academics'] 		= $Academics;
		$out_put['Dues'] 			= $dues;
		$out_put['MonthlyFee'] 		= $totalAmntForallClss;
		$out_put['collected'] 		= $collected;
		echo json_encode($out_put);
	
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


public function payfeebyajax()
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
	
	$postdata = array();
	
	$postdata['Rollno'] = $_POST['StudentId'];
	$postdata['ClassName'] = $_POST['ClassId'];
	$postdata['sections'] = $_POST['SectionId'];
	
	$postdata['month'] = $_POST['Fee_Month'];
	$postdata['MonthlyFee'] = $_POST['PayingDue'];
	
	$postdata['AcademicYear'] = $academicYr;
	
	$this->session->set_userdata('Feepaymentdata',$postdata);
	
								
}
public function payfee()
{
	
	$_POST = $this->session->userdata('Feepaymentdata');

/*	echo "<pre>";
	print_r($_POST); exit; 
	exit;
	*/
	
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
	$transactionRequest->setAmount($_POST['MonthlyFee']);
	$transactionRequest->setTransactionCurrency("INR");
	$transactionRequest->setTransactionAmount($_POST['MonthlyFee']);

	$chk_admin_parent = $this->schedulinglib->getstudemtSessiondetails();
	
	if($chk_admin_parent!='0')
		$transactionRequest->setReturnUrl(base_url()."parent/fee-paid");
	else
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


//transactionDetails  starts here

	public function transactionDetails()
	{
		$postdata = $this->striptags($_POST);
		extract($postdata);
		
		$this->db->select(" MonthName(coll.Month) as Month, coll.ActualFee, coll.AcademicYear as Academic,  coll.Paid, coll.Due, coll.PaidOn, det.CardNo, det.TransactionId");			
		$this->db->from("feecollection as coll");
		$this->db->join("feetranasactiondetails as det","det.FeeCollectionId=coll.FeeCollectionId");
		$this->db->where("coll.StudentId",$studentID);
		$this->db->where("month(coll.Month)",$month);
		$this->db->order_by("det.FeeCollectionId","DESC");
		$qry = $this->db->get();
		
		$output = array();
		
		
		foreach( $qry->result() as $details)
		{
			
			$output[] = array(
								'Month' => $details->Month,
								'ActualFee'=> $details->ActualFee,
								'Academic'=> $details->Academic,
								'Paid'=> $details->Paid,
								'Due'=>$details->Due,
								'PaidOn'=> $details->PaidOn,
								'CardNo'=>$details->CardNo,
								'TransactionId'=>$details->TransactionId
								
								);
			
			
		}
		
		echo json_encode($output);
		
	}
	
//transactionDetails ends here

	
}//class ends here		

