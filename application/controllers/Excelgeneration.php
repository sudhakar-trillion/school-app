<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Excelgeneration extends CI_Controller 
{

	 public function __construct()
		{
			parent::__construct();
			date_default_timezone_set("Asia/Kolkata");
			$this->load->library('excel');
			$this->load->model('Commonmodel');
			
		}//constructor stARTS HERE
		
	
	
	public function striptags($posted_data)
		{
			
			
		
			$requested_from =  $_SERVER['HTTP_REFERER'];
			
			
		if( strpos($requested_from, 'localhost') !== false || strpos($requested_from, '192.168.0.3') !== false || strpos($requested_from, 'trillionit.in') !== false || strpos($requested_from, 'adiakshara.in') !== false)
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
		
	public function studentsattendance()
	{
		$postdata = $this->striptags($_POST);
		
		extract($postdata);
		
		$table = 'studentattendance';
				
		$cond['att.AcademicYear'] = $this->schedulinglib->getAcademicyear();
		
		if( $SelectedMonth>0 && $SelectedClass>0 )
		{
			if( $SelectedMonth>0 )
				$cond['MONTH(att.AttendanceOn)'] = $SelectedMonth;
			if( $SelectedClass>0 )
				$cond['att.ClassId'] = $SelectedClass;
			if( $SelectedSection>0 )
				$cond['att.SectionId'] = $SelectedSection;	
			if( $SelectedStudent>0 )
				$cond['att.StudentId'] = $SelectedStudent;		
		}
		else
		{
			if( $SelectedMonth>0 )
					$cond['MONTH(att.AttendanceOn)'] = $SelectedMonth;
			else
			{
				if( $SelectedClass>0 )
					$cond['att.ClassId'] = $SelectedClass;
				else		
					$cond['att.AttendanceOn'] = date('Y-m-d');
			}
		}
		
		
			
		$this->db->select("MONTHNAME(att.AttendanceOn) as Month, cls.ClassName , sec.Section SectionName, concat(std.Student,' ' , std.LastName) as StudentName, date_format(att.AttendanceOn,'%d-%m-%Y') as DatedOn, att.PresentAbsent");
		$this->db->from('studentattendance as att');
		$this->db->join("newclass as cls","att.ClassId=cls.SLNO","inner");
		$this->db->join("sections as sec","att.SectionId=sec.SectionId","inner");
		$this->db->join("students as std","att.StudentId=std.StudentId","inner");
		
		
		if(!empty($cond))
		$this->db->where($cond);
		$qry = $this->db->get();
		
		if( $qry->num_rows()>0)
		{
			$this->excel->setActiveSheetIndex(0);
			$select_cols = array('Slno','Month','Class','Section','Student','DatedOn','Present/Absent');
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
			
			$out_resp = array();
			$slcnt=0;
			foreach( $qry->result() as $data)
			{
				$slcnt++;
				
				$out_resp[] = array(
										'Slno'=>$slcnt,
										'Month'=>$data->Month,
										'Class'=>$data->ClassName,
										'Section'=>$data->SectionName,
										"Student"=>$data->StudentName,
										'DatedOn'=>$data->DatedOn,
										'Present/Absent'=>$data->PresentAbsent,
									);
			}
			
			
			
			foreach($out_resp as $key=>$va)
			{
				
			//prepare the excel sheet name
			
				if($cnt==1)
				{ 
					$this->excel->getActiveSheet()->setTitle("View-student-attendance-report"); 
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
					if($k=="Month")
					{
					//	echo "$k:".$value;	
							$this->excel->getActiveSheet()->setCellValue('B'.($cnt+1), $value);
							//change the font size
							$this->excel->getActiveSheet()->getStyle('B'.($cnt+1))->getFont()->setSize(12);
							$this->excel->getActiveSheet()->getStyle('B'.($cnt+1))->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);	
					}
					if($k=="Class")
					{
					//	echo "$k:".$value;	
							$this->excel->getActiveSheet()->setCellValue('C'.($cnt+1), $value);
							//change the font size
							$this->excel->getActiveSheet()->getStyle('C'.($cnt+1))->getFont()->setSize(12);
							$this->excel->getActiveSheet()->getStyle('C'.($cnt+1))->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);	
					}
					if($k=="Section")
					{
					//	echo "$k:".$value;	
							$this->excel->getActiveSheet()->setCellValue('D'.($cnt+1), $value);
							//change the font size
							$this->excel->getActiveSheet()->getStyle('D'.($cnt+1))->getFont()->setSize(12);
							$this->excel->getActiveSheet()->getStyle('D'.($cnt+1))->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);	
					}
					
					if($k=="Student")
					{
					//	echo "$k:".$value;	
							$this->excel->getActiveSheet()->setCellValue('E'.($cnt+1), $value);
							//change the font size
							$this->excel->getActiveSheet()->getStyle('E'.($cnt+1))->getFont()->setSize(12);
							$this->excel->getActiveSheet()->getStyle('E'.($cnt+1))->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);	
					}
					if($k=="DatedOn")
					{
					//	echo "$k:".$value;	
							$this->excel->getActiveSheet()->setCellValue('F'.($cnt+1), $value);
							//change the font size
							$this->excel->getActiveSheet()->getStyle('F'.($cnt+1))->getFont()->setSize(12);
							$this->excel->getActiveSheet()->getStyle('F'.($cnt+1))->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);	
					}
					if($k=="Present/Absent")
					{
					//	echo "$k:".$value;	
							$this->excel->getActiveSheet()->setCellValue('G'.($cnt+1), $value);
							//change the font size
							$this->excel->getActiveSheet()->getStyle('G'.($cnt+1))->getFont()->setSize(12);
							$this->excel->getActiveSheet()->getStyle('G'.($cnt+1))->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);	
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




	
		
}//class ends here		



