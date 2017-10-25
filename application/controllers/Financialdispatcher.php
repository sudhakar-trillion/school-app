<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Financialdispatcher extends CI_Controller 
{

	 public function __construct()
		{
			parent::__construct();
			date_default_timezone_set("Asia/Kolkata");
			
			$this->load->model('Commonmodel');
			$this->load->library('excel');
			
		}//constructor stARTS HERE
		
	
	
	public function striptags($posted_data)
		{
			
		
			$requested_from =  $_SERVER['HTTP_REFERER'];
			
			
		if( strpos($requested_from, 'localhost') !== false || strpos($requested_from, 'trillionit.in') !== false || strpos($requested_from, 'adiakshara.in') !== false)
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
		
		
		public function inactiveActive()
		{
			$postdata = $this->striptags($_POST);
			$postdata = extract($postdata);
			
			$cond = array();
			$table='vendors';
			
			$cond['VendorId'] = $VendorId;
			
			$setdata = array();
			
			
			if( $this->Commonmodel->checkexists($table,$cond))
			{
				
				$Status = $this->Commonmodel->getAfield($table,$cond,$field='Status',$order_by='',$order_by_field='',$limit='');
				
				if($Status=='Active')
					$setStatus = 'Inactive';
				else
					$setStatus = 'Active';
					
					$setdata['Status'] = $setStatus;
					
					if( $this->Commonmodel->updatedata($table,$setdata,$cond) )
						echo "1";
					else
						echo "0";
					
			}	
			else
			echo "-1";
			
			
		}
			
	
	//addbils starts here
	
	public function addbils()
	{
		extract($_POST);
		
		$table='bills';
		
		$totalbills = sizeof($billfor);
		$cnt=0;
		
		foreach($billfor as $key=>$val)
		{
			$insertdata = array();
			
			
			$insertdata['BillFor'] = $val['billfor'];
			$insertdata['BillAmount'] = $billamount[$key]['billamount'];
			
			$billdated = date_create($billdate[$key]['billdate']);
			$billdated = date_format($billdated,"Y-m-d");
			
			$insertdata['BillDate'] = $billdated;
			$insertdata['PaidTo']= $vendor[$key]['billpaidto'];
			$insertdata['LastUpdated'] = time();
			
			$lastinsertedid = $this->Commonmodel->insertdata($table,$insertdata);
			if( $lastinsertedid > 0 )
			$cnt++;
		}
		
		if( $cnt == $totalbills )
			echo "1";
		else 
			echo "0";		
	
		
	}
	
	// addbils ends here

	//editbill starts here
	
	public function editbill()
	{
		
		$BillId= $_POST['BillId'];
		
		$billfor = $_POST['billfor'][0]['billfor'];
		$billamount = $_POST['billamount'][0]['billamount'];
		
		$billdate = date_create($_POST['billdate'][0]['billdate']);
		$billdate =date_format($billdate,"Y-m-d");
		
		$vendor = $_POST['vendor'][0]['billpaidto'];
		
		$cond = array();
		$table='bills';
		
		$cond['BillId'] = $BillId;
		
		$data = array();
		
		$data['BillFor'] = $billfor;
		$data['BillAmount'] = $billamount;
		
		$data['PaidTo'] = $vendor;
		$data['BillDate'] = $billdate;
		
		$data['LastUpdated'] = time();
		
		
		if( $this->Commonmodel->updatedata($table,$data,$cond)	)
			echo "1";
		else
			echo "0";
		
		
		
	
			
	}
	
	//editbill ends here

public function exportbillsexcel()
{
	$cond = array();
	#echo $this->session->userdata('Fromdate')."<br>";
		$this->excel->setActiveSheetIndex(0);
		$select_cols = array('Slno','Paid For','Paid Amount','Paid To','Paid On','Contact Person','Email','Phone');
		$excel_sheet_name = time(); 							
		
		$cnt=1;
		
		$Excelcolmns = range('A','Z');
		
		$needed_columns = array_slice( $Excelcolmns,0,sizeof($select_cols) );
		foreach( $needed_columns as $key=>$val )
		{
				$col = $select_cols[$key];
				$this->excel->getActiveSheet()->setCellValue($needed_columns[$key].'1', $col);
				$this->excel->getActiveSheet()->getStyle($needed_columns[$key].'1')->getFont()->setSize(13);
				$this->excel->getActiveSheet()->getStyle($needed_columns[$key].'1')->getFont()->setBold(true);
				$this->excel->getActiveSheet()->getStyle($needed_columns[$key].'1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
		}
		
		
		if(  $this->session->userdata('Fromdate')!='' )	
		{
			if( $this->session->userdata('Todate')!='' )
			{
				$FromDate = $this->session->userdata('Fromdate');
				$Todate   = $this->session->userdata('Todate');	
				
				$FromDate = date_create($FromDate);
				$FromDate = date_format($FromDate,"d-m-Y");
				
				$Todate = date_create($Todate);
				$Todate = date_format($Todate,"d-m-Y");
				
					$cond['BillDate>='] = $FromDate;
					$cond['BillDate<='] = $Todate;
				
			}
			else
			{
				$FromDate = $this->session->userdata('Fromdate');
				$Todate   = '';	
				
				$FromDate = date_create($FromDate);
				$FromDate = date_format($FromDate,"d-m-Y");
				$cond['BillDate'] = $Fromdate;
			}	
		}
		else
		{

			if( $this->session->userdata('PaidTo')!='' )	
			{
				$paidto = $this->session->userdata('PaidTo');
				$cond['PaidTo'] = $paidto;		
			}
			if( $this->session->userdata('PaidDated')!='' )
			{
				$PaidDated = $this->session->userdata('PaidDated');
				$cond['BillDate'] = $PaidDated;
			
			}	
		}
		
		
		
		$this->db->select("bil.BillId, bil.BillFor, bil.BillAmount, bil.PaidTo, date_format(BillDate,'%d-%m-%Y') as BillDate, ven.ContactPerson, ven.ContactEmail, ven.Mobile1");
	$this->db->from("bills as bil");
	$this->db->join("vendors as ven","ven.CompanyName=bil.PaidTo");
	$qry = $this->db->where($cond)->get();
		
		#	echo $this->db->last_query(); exit; 


		if( $qry->num_rows()>0)
		{
			$out_resp = array();
			$slcnt=0;
			foreach( $qry->result() as $data)
			{
				$slcnt++;
				
				$out_resp[] = array(
										'Slno'=>$slcnt,
										'Paid For'=>$data->BillFor,
										'Paid Amount'=>$data->BillAmount,
										'Paid To'=>$data->PaidTo,
										'Paid On'=>$data->BillDate,
										'Contact Person'=>$data->ContactPerson,
										'Email'=>$data->ContactEmail,
										'Phone'=>$data->Mobile1
									);
			}
			/*
			echo "<pre>";
				print_r($out_resp);
			exit;
			*/
			
			$cnt=1;
			
			foreach($out_resp as $key=>$va)
			{
			//prepare the excel sheet name
			
				if($cnt==1)
				{ 
					$this->excel->getActiveSheet()->setTitle("View-bills"); 
					//$excel_sheet_name = time().str_replace(" ","-",$postdata['filter']['Owner_Name']); 							
				}	
				
				foreach($va as $k=>$value)
				{
				
					if($k=="Slno")
					{
					//	echo "$k:".$value;	
							$this->excel->getActiveSheet()->setCellValue('A'.($cnt+1), $value);
							//change the font size
							$this->excel->getActiveSheet()->getStyle('A'.($cnt+1))->getFont()->setSize(12);
							$this->excel->getActiveSheet()->getStyle('A'.($cnt+1))->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);	
					}
					if($k=="Paid For")
					{
					//	echo "$k:".$value;	
							$this->excel->getActiveSheet()->setCellValue('B'.($cnt+1), $value);
							//change the font size
							$this->excel->getActiveSheet()->getStyle('B'.($cnt+1))->getFont()->setSize(12);
							$this->excel->getActiveSheet()->getStyle('B'.($cnt+1))->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);	
					}
					if($k=="Paid Amount")
					{
					//	echo "$k:".$value;	
							$this->excel->getActiveSheet()->setCellValue('C'.($cnt+1), $value);
							//change the font size
							$this->excel->getActiveSheet()->getStyle('C'.($cnt+1))->getFont()->setSize(12);
							$this->excel->getActiveSheet()->getStyle('C'.($cnt+1))->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);	
					}
					if($k=="Paid To")
					{
					//	echo "$k:".$value;	
							$this->excel->getActiveSheet()->setCellValue('D'.($cnt+1), $value);
							//change the font size
							$this->excel->getActiveSheet()->getStyle('D'.($cnt+1))->getFont()->setSize(12);
							$this->excel->getActiveSheet()->getStyle('D'.($cnt+1))->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);	
					}
					
					if($k=="Paid On")
					{
					//	echo "$k:".$value;	
							$this->excel->getActiveSheet()->setCellValue('E'.($cnt+1), $value);
							//change the font size
							$this->excel->getActiveSheet()->getStyle('E'.($cnt+1))->getFont()->setSize(12);
							$this->excel->getActiveSheet()->getStyle('E'.($cnt+1))->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);	
					}
					if($k=="Contact Person")
					{
					//	echo "$k:".$value;	
							$this->excel->getActiveSheet()->setCellValue('F'.($cnt+1), $value);
							//change the font size
							$this->excel->getActiveSheet()->getStyle('F'.($cnt+1))->getFont()->setSize(12);
							$this->excel->getActiveSheet()->getStyle('F'.($cnt+1))->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);	
					}
					if($k=="Email")
					{
					//	echo "$k:".$value;	
							$this->excel->getActiveSheet()->setCellValue('G'.($cnt+1), $value);
							//change the font size
							$this->excel->getActiveSheet()->getStyle('G'.($cnt+1))->getFont()->setSize(12);
							$this->excel->getActiveSheet()->getStyle('G'.($cnt+1))->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);	
					}
					
					if($k=="Phone")
					{
					//	echo "$k:".$value;	
							$this->excel->getActiveSheet()->setCellValue('H'.($cnt+1), $value);
							//change the font size
							$this->excel->getActiveSheet()->getStyle('H'.($cnt+1))->getFont()->setSize(12);
							$this->excel->getActiveSheet()->getStyle('H'.($cnt+1))->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);	
					}
				
				
				//'Slno','Paid For','Paid Amount','Paid To','Paid On','Contact Person','Email','Phone'
				}
				$cnt++;
			}
			
			$filename="$excel_sheet_name.xls"; //save our workbook as this file name
		
		
		header("Pragma: public");
		header("Expires: 0");
		header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
		header("Content-Type: application/force-download");
		header("Content-Type: application/octet-stream");
		header("Content-Type: application/download");
		
		header('Content-Type: application/vnd.ms-excel'); //mime type
		header('Content-Disposition: attachment;filename="'.$filename.'"'); //tell browser what's the file name
		header('Cache-Control: max-age=0'); //no cache
		
		//save it to Excel5 format (excel 2003 .XLS file), change this to 'Excel2007' (and adjust the filename extension, also the header mime type)
		//if you want to save it as .XLSX Excel 2007 format
		$objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');  
		//force user to download the Excel file without writing it to server's HD
		
		$requested_from =  $_SERVER['HTTP_REFERER'];
		
		if( strpos($requested_from, 'localhost') !== false)
			$filename = $filename;
		elseif(strpos($requested_from, 'trillionit.in') !== false)
			$filename = "excel-bills/".$filename;
		
		//$objWriter->save('php://output');
		$objWriter->save($filename);
		echo $filename;
			
		}
		else
			echo "0";
	
	
}


//deleteexcelsheet starts gere

	public function deleteexcelsheet()
	{
		
		
		$requested_from =  $_SERVER['HTTP_REFERER'];
			
		if( strpos($requested_from, 'localhost') !== false)
			$path = $_SERVER['DOCUMENT_ROOT']."/adi-akshara/".$_POST['excelname'];
		elseif(strpos($requested_from, 'trillionit.in') !== false)
			$path = $_SERVER['DOCUMENT_ROOT']."/tsm/".$_POST['excelname'];
		

		$this->load->helper('file');
		unlink($path);
			
	}

//deleteexcelsheet ends here
					
}//class ends here		