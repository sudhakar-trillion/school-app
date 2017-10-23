<?PHP
class Commonmodel extends CI_Model
{
	public function checkexists($table,$cond)
	{
		$this->db->where($cond);
		$qry = $this->db->get($table);
		if($qry->num_rows()>0)
			return $qry->num_rows();
		else
			return "0";
		
	}
	
	public function getschoolinfo()
	{
		
		$this->db->select('SchoolName, SchoolLogo')	;
		$this->db->from('schoolinfo');
		$qry = $this->db->get();
		
		if( $qry->num_rows()>0)
			return $qry;
		else
			return "0";
			
	}
	
	
	public function getnumRows($table,$cond)	
	{
		$this->db->where($cond)	;
		
		$qry = $this->db->get($table);
		return  $qry->num_rows();
	}
	
	public function getRows_fields($table,$cond,$fields,$order_by,$order_by_field,$limit)
	{
		$this->db->select($fields);
		$this->db->from($table);
		
		if( sizeof($cond) )
		{
			$this->db->where($cond);
		}
		if($order_by!='')
		{
			$this->db->order_by($order_by_field,$order_by);
		}	
		if($limit!='')
		{
				$this->db->limit($limit);
		}
		$qry = $this->db->get('');
		
		if($qry->num_rows()>0)
		{
			return $qry;		
		}
		else
			return "0";
		
	}
	
	
	public function getRows_fields_groupby($table,$cond,$fields,$groupby,$order_by,$order_by_field,$limit)
	{
		$this->db->select($fields);
		$this->db->from($table);
		
		if( sizeof($cond) )
			$this->db->where($cond);
		if($order_by!='')
			$this->db->order_by($order_by_field,$order_by);
		if($limit!='')
				$this->db->limit($limit);
		if($groupby!='')
			$this->db->group_by($groupby);
		
		$qry = $this->db->get('');
		
		if($qry->num_rows()>0)
			return $qry;		
		else
			return "0";	
	}
	
	
	
	public function getAfield($table,$cond,$field,$order_by='',$order_by_field='',$limit='')
	{
		$this->db->select($field);
		$this->db->from($table);
		if( sizeof( count($cond) ) )
		{
			$this->db->where($cond);
		}
		if($order_by!='')
		{
			$this->db->order_by($order_by_field,$order_by);
		}	
		if($limit!='')
		{
				$this->db->limit($limit);
		}
		$qry = $this->db->get('');
		if($qry->num_rows()>0)
		{
			return $qry->row($field);			
		}else
			return "0";
		
	}
	
	//getAfieldWithalias($table,$cond,$field='sum(Paid)',$Alias='PaidTill',$order_by='',$order_by_field='',$limit='');
	
	public function getAfieldWithalias($table,$cond,$field,$Alias,$order_by='',$order_by_field='',$limit='')
	{
		$this->db->select($field." as $Alias");
		$this->db->from($table);
		if( sizeof( count($cond) ) )
		{
			$this->db->where($cond);
		}
		if($order_by!='')
		{
			$this->db->order_by($order_by_field,$order_by);
		}	
		if($limit!='')
		{
				$this->db->limit($limit);
		}
		$qry = $this->db->get('');
		if($qry->num_rows()>0)
		{
			return $qry->row($Alias);			
		}else
			return "0";
		
	}
	
	public function getrows($table,$cond,$order_by,$order_by_field='',$limit='')
	{
		
		
		if( sizeof( count($cond) ) )
		{
			$this->db->where($cond);
		}
		if($order_by!='')
		{
			$this->db->order_by($order_by_field,$order_by);
		}	
		if($limit!='')
		{
				$this->db->limit($limit);
		}
		
		$qry = $this->db->get($table);
		if($qry->num_rows()>0)
		return $qry;
		else	
		return "0";
		
	}
	
	
	public function get_single_row($table,$cond,$order_by='',$order_by_field='',$limit='')
	{
		
		if( sizeof( count($cond) ) )
		{
			$this->db->where($cond);
		}
		if($order_by!='')
		{
			$this->db->order_by($order_by_field,$order_by);
		}	
		if($limit!='')
		{
				$this->db->limit($limit);
		}
		
		$qry = $this->db->get($table);
//		echo $this->db->last_query(); exit; 
		
		if($qry->num_rows()>0)
		return $qry;
		else	
		return "0";
	
	}
	
	public function insertdata($table,$data)
	{
		$this->db->insert($table,$data)	;
		return $this->db->insert_id();
		
	}
	
	
	public function updatedata($table,$data,$cond)	
	{
		$this->db->where($cond);
		$this->db->update($table,$data);
		return $this->db->affected_rows(); exit; 
//		echo $this->db->last_query(); exit; 
		if($this->db->affected_rows()>0)
			return "1";
		else
			return "0";
	}
	
	public function deleterow($table,$cond)
{
	$this->db->delete($table,$cond);
	return "1";	
}
	
	public function getsmtpdetails()
	{
			$this->db->select('user,password');
			$this->db->from('smtp_details');
			$this->db->limit(1);
			$qry = $this->db->get();

			if($qry->num_rows()>0)
				return $qry;
			else
				return "0";
		
					
	}
	
	public function getkeydetails($cond)
	{
		
			$this->db->select('EncKey');
			$this->db->from('getkeys');
			$this->db->where($cond);
			$this->db->limit(1);
			$qry = $this->db->get();

			if($qry->num_rows()>0)
				return $qry;
			else
				return "0";
	}

	
public function getnonteachingdetails($cond)
{
	
	$this->db->select('sfd.ContactNumber, sfd.ContactAddress, stf.StaffName,stf.StaffId');
	$this->db->from('staffdetails as sfd');
	$this->db->join('staff as stf','stf.StaffId=sfd.StaffId');
	$this->db->where($cond);
	$qry = $this->db->get();
	
	if( $qry->num_rows()>0 )
		return $qry;
	else
		return "0";
		
		


	
}

//general pagination 

	public function paginate($table,$cond,$order_by='',$order_by_field='',$limit,$start )
	{
		
		$this->db->select('*');
		$this->db->from($table);
		
		if( sizeof($cond) )
		{
			$this->db->where($cond);
		}
		if($order_by!='')
		{
			$this->db->order_by($order_by_field,$order_by);
		}	
		if($limit!='')
		{
				$this->db->limit($limit,$start);
		}
		$qry = $this->db->get('');

#		echo $this->db->last_query();
		if($qry->num_rows()>0)
		{
			return $qry;		
		}
		else
			return "0";
		
		
	}

//general pagination ends here


//assignedteacherPaginateion starts here

	public function assignedteacherPaginateion($cond,$order_by='SLNO',$order_by_field,$limit,$start )
	{
		
		$this->db->select('assign.SLNO,cls.ClassName,Sec.Section,sub.SubjectName as Subject, tec.TeacherName');
		$this->db->from('assignteachers as assign');
		$this->db->join('newclass as cls','cls.SLNO=assign.ClassSlno');
		$this->db->join('sections as Sec','Sec.SectionId=assign.Section');
		$this->db->join('teacher as tec','tec.TeacherId=assign.TeacherId');
		$this->db->join('subjects as sub','sub.SubjectId=assign.Subject');
		
		if(!empty($cond))
			$this->db->where($cond);
		
		$this->db->limit($limit,$start);
		
		$qry = $this->db->get();
			
			//return $this->CI->db->last_query();
			if($qry->num_rows()>0)
				return $qry;
			else
				return '0';	
		
		
	}
	
//assignedteacherPaginateion ends here


//studentsPaginateion starts here

	public function studentsPaginateion($cond,$order_by,$order_by_field,$limit,$start )
	{
		
		$this->db->select('std.StudentId,std.Student,std.AcademicYear,std.Roll,cls.ClassName,Sec.Section');
		$this->db->from('students as std');
		$this->db->join('newclass as cls','cls.SLNO=std.ClassName');
		$this->db->join('sections as Sec','Sec.SectionId=std.ClassSection');
		
		$order_by_field.=',ClassSection';
		
		if(!empty($cond))
			$this->db->where($cond);
		$this->db->order_by($order_by_field,$order_by);

		$this->db->limit($limit,$start);
		
		$qry = $this->db->get();
		#echo $this->db->last_query(); exit;
			
			//return $this->CI->db->last_query();
			if($qry->num_rows()>0)
				return $qry;
			else
				return '0';	
		
		
	}
	
//studentsPaginateion ends here


//feestructurepagination starts here

	public function feestructurepagination($cond,$order_by,$order_by_field,$limit,$start)
	{
		$this->db->select("sch.*, cls.ClassName");
		$this->db->from('schoolfee as sch');
		$this->db->join('newclass as cls','cls.SLNO=sch.Class');
		if(!empty($cond))
			$this->db->where($cond);
		$this->db->order_by($order_by_field,$order_by);

		$this->db->limit($limit,$start);

		$qry = $this->db->get();

		
		if($qry->num_rows()>0)
				return $qry;
			else
				return '0';	
		
	}

//feestructurepagination ends here

//notifstudentspagination starts here

public function notifstudentspagination($cond,$order_by='DESC',$order_by_field,$limit,$start,$AddedBy )
{
	
	$this->db->select('noti.NotificationId, cls.ClassName,sec.Section,CONCAT(std.Student,"", std.LastName) as StudentName,noti.Notification, date_format(DATE(noti.AddedOn),"%d-%m-%Y") as AddedOn, noti.Status, noti.NotificationTitle as NotificationTitle ');
	$this->db->from('notifications as noti');
	$this->db->join('newclass as cls','cls.SLNO=noti.ClassName');
	$this->db->join('sections as sec','sec.SectionId=noti.ClassSection');
	$this->db->join('students as std','std.StudentId=noti.StudentId');
	
	if(!empty($cond))
			$this->db->where($cond);
			
	$this->db->where('noti.AddedBy',$AddedBy);
			
		$this->db->order_by($order_by_field,$order_by);

		$this->db->limit($limit,$start);
		$qry = $this->db->get();
	
		if($qry->num_rows()>0)
			return $qry;
		else
			return '0';	

}

//notifstudentspagination ends here

//viewassignedsubjectspagination starts here

public function viewassignedsubjectspagination($cond,$order_by='ASC',$order_by_field,$limit,$start)
{
	$this->db->select("assign.AssignedId,cls.ClassName,assign.ClassSlno, sub.SubjectName");
	$this->db->from('assignedsubjects as assign');
	$this->db->join('newclass as cls','cls.SLNO=assign.ClassSlno');
	$this->db->join('subjects as sub','sub.SubjectId=assign.SubjectAssigned');
	
	if(!empty($cond))
			$this->db->where($cond);
			
		$this->db->order_by($order_by_field,$order_by);

		$this->db->limit($limit,$start);
		$qry = $this->db->get();
	
		if($qry->num_rows()>0)
			return $qry;
		else
			return '0';	
	
	
}

//viewassignedsubjectspagination ends here


//viewhomeworkspagination starts here

	public function viewhomeworkspagination($cond,$order_by='DESC',$order_by_field,$limit,$start)
	{
		
		$this->db->select('hw.HomeWork, hw.Status, date_format(hw.HomeWorkOn,"%d-%m-%Y") as HomeWorkOn, hw.HomeworkId, cls.ClassName, sec.Section, CONCAT(std.Student," ", std.LastName) as Student, sub.SubjectName');		
		$this->db->from(' homeworks as hw');	
		$this->db->join('newclass as cls','cls.SLNO=hw.ClassSlno');
		$this->db->join('sections as sec','sec.SectionId=hw.ClassSection');
		$this->db->join('students as std','std.StudentId=hw.StudentId');
		$this->db->join('subjects as sub','sub.SubjectId=hw.SubjectId');		
		if(!empty($cond))
			$this->db->where($cond);
			
		$this->db->order_by($order_by_field,$order_by);

		$this->db->limit($limit,$start);
		$qry = $this->db->get();
	
		if($qry->num_rows()>0)
			return $qry;
		else
			return '0';	
		
	}


//viewhomeworkspagination ends here

//viewstudentactivitypagination starts here

	public function viewstudentactivitypagination($cond,$order_by='DESC',$order_by_field,$limit,$start)
	{
			$this->db->select('sactiv.ActivityId, sactiv.ActivityTitle, date_format(sactiv.ActivityDate,"%d-%m-%Y") as ActivityDate,cls.ClassName, sec.Section, CONCAT(std.Student," ", std.LastName) as Student ');		
		$this->db->from(' studentactivities as sactiv');	
		$this->db->join('newclass as cls','cls.SLNO=sactiv.ClassSlno');
		$this->db->join('sections as sec','sec.SectionId=sactiv.ClassSection');
		$this->db->join('students as std','std.StudentId=sactiv.StudentId');

		if(!empty($cond))
			$this->db->where($cond);
			
		$this->db->order_by($order_by_field,$order_by);

		$this->db->limit($limit,$start);
		$qry = $this->db->get();
	
		if($qry->num_rows()>0)
			return $qry;
		else
			return '0';	
		
	}
	
//viewstudentactivitypagination ends here


//getArchieveEvents starts here

	public function getArchieveEvents()
	{
		$cond = array();
		$event_lists = array();
		
		$cond['StudentId'] = $this->session->userdata('StudentId');
		$table = 'students';
		
		$ClassSlno = $this->getAfield($table,$cond,$field='ClassName',$order_by='',$order_by_field='',$limit='');
		$ClassSection = $this->getAfield($table,$cond,$field='ClassSection',$order_by='',$order_by_field='',$limit='');
		
		
		$cond = array();
		$event_lists = array();
		
		$cond['StudentId'] = $this->session->userdata('StudentId');
		$cond['ClassSlno'] = $ClassSlno;
		$cond['ClassSection'] = $ClassSection;
		
		
		$this->db->select('ActivityId,MONTHNAME(ActivityDate) as Mnth,ActivityTitle, date_format(ActivityDate,"%m-%Y") as monthyear' );
		$this->db->from('studentactivities');
		$this->db->where($cond);
		$qry = $this->db->get();
		
		
		if($qry->num_rows()>0)
		{
			$month="test";
			$event_lists['Events_exists']= 'Yes';
			foreach($qry->result() as $event)
			{
				
				if( $event->Mnth==$month )
				{
					
				}
				else
				{
					$month = $event->Mnth;
				}
				$event_lists['Event'][$month][] = array(
														"EventName"=>ucwords($event->ActivityTitle),
														"ActivityId"=>$event->ActivityId
														);
				
				
				
			}
		}
		else
			$event_lists['Events_exists']= 'No';
		
		//echo json_encode($event_lists);
		return $event_lists;

	}
//getArchieveEvents ends here

//getLatestPics starts here

	public function getLatestPics()
	{
		
		$cond = array();
		$event_lists = array();
		
		$cond['StudentId'] = $this->session->userdata('StudentId');
		$table = 'students';
		
		$ClassSlno = $this->getAfield($table,$cond,$field='ClassName',$order_by='',$order_by_field='',$limit='');
		$ClassSection = $this->getAfield($table,$cond,$field='ClassSection',$order_by='',$order_by_field='',$limit='');
		
		
		$cond = array();
		$event_lists = array();
		
		$cond['StudentId'] = $this->session->userdata('StudentId');
		$cond['ClassSlno'] = $ClassSlno;
		$cond['ClassSection'] = $ClassSection;
		
		
		$this->db->select('ActivityId, date_format(ActivityDate,"%m-%Y") as monthyear' );
		$this->db->from('studentactivities');
		$this->db->where($cond);
		$this->db->order_by('MONTH(ActivityDate)','DESC');

		$this->db->limit(1);
		$qry = $this->db->get();
		if($qry->num_rows()>0)
		{
			$ActivityId='';
			$monthyear='';
			
			foreach($qry->result() as $eventdetails)
			{
				$ActivityId = $eventdetails->ActivityId;
				$monthyear = $eventdetails->monthyear;
			}
			
			
			$cond= array();
			$table='activitypics';
			
			$cond['ActivityId'] = $ActivityId;
			$fields = 'Picture';
			
			$eventpics = $this->getRows_fields($table,$cond,$fields,$order_by='ASC',$order_by_field='ActivityPicId',$limit='');
			if($eventpics!='0')
				return $eventpics;
			else
				return "0";
			
		}
		else
		{
			return "0";	
		}
		
			
	}

//getLatestPics ends here


public function salariesPagination($cond,$order_by='DESC',$order_by_field='',$limit,$start)
{

	$this->db->select("sal.AcademicYear as AcademicYear, sal.Salary as Salary, sal.SLNO, sal.Month as Month, sta.TeacherId, sta.StaffName, sta.Category ");
	$this->db->from("salaries as sal");
	$this->db->join("staff as sta","sal.StaffId=sta.StaffId");

	if(!empty($cond))
		$this->db->where($cond);

	$this->db->order_by($order_by_field,$order_by);

	$this->db->limit($limit,$start);
	$qry = $this->db->get();
	
	if($qry->num_rows()>0)
		return $qry;
	else
		return '0';	
}


public function viewbills($cond,$order_by='DESC',$order_by_field='',$limit,$start)
{
	
	$this->db->select("bil.BillId, bil.BillFor, bil.BillAmount, bil.PaidTo, date_format(BillDate,'%d-%m-%Y') as BillDate, ven.ContactPerson, ven.ContactEmail, ven.Mobile1");
	$this->db->from("bills as bil");
	$this->db->join("vendors as ven","ven.CompanyName=bil.PaidTo");

	if(!empty($cond))
		$this->db->where($cond);

	$this->db->order_by($order_by_field,$order_by);

	$this->db->limit($limit,$start);
	$qry = $this->db->get();
	
	if($qry->num_rows()>0)
		return $qry;
	else
		return '0';	
}



//vendors  pagination 

	public function vendorspaginate($table,$cond,$order_by='',$order_by_field='',$limit,$start )
	{
		
		$this->db->select('*');
		$this->db->from($table);
		
		if( sizeof($cond) ==1)
		{
			$this->db->where($cond);
		}
		else if( sizeof($cond)>1)
			{
				$cnt=1;
				
				foreach($cond as $key=>$val)
				{
					if($cnt==1)
					$this->db->where($key,$val);
					else
					$this->db->or_where($key,$val);
				}
				
				
			}
		
		
		if($order_by!='')
		{
			$this->db->order_by($order_by_field,$order_by);
		}	
		if($limit!='')
		{
				$this->db->limit($limit,$start);
		}
		$qry = $this->db->get('');

#		echo $this->db->last_query();
		if($qry->num_rows()>0)
		{
			return $qry;		
		}
		else
			return "0";
		
		
	}

//getvehiclePagination starts here


public function getvehiclePagination($cond,$order_by='DESC',$order_by_field='',$limit,$start)
{
	
	$this->db->select('veh.VechileNumber as VechileNumber, veh.VechileId as  VechileId, stf.StaffName as Driver, rou.Routes as Routes,stfdet.ContactNumber');
	$this->db->from('vehicles as veh');
	$this->db->join('staff as stf','stf.StaffId=veh.Driver');
	$this->db->join('routes as rou','rou.RouteId=veh.VehicleRoute');
	$this->db->join('staffdetails as stfdet','stfdet.StaffId=veh.Driver');

	
	if(!empty($cond))
		$this->db->where($cond);

	$this->db->order_by($order_by_field,$order_by);

	$this->db->limit($limit,$start);
	$qry = $this->db->get();
	
	if($qry->num_rows()>0)
		return $qry;
	else
		return '0';	
}

//getvehiclePagination ends here


public function getnonteachingPagination($cond,$order_by='DESC',$order_by_field='',$limit,$start)
{
	
	$this->db->select('sfd.StaffDetailId, sfd.ContactNumber, sfd.ContactAddress, s.StaffName');
	$this->db->from('staffdetails as sfd');
	$this->db->join('staff as s','s.StaffId=sfd.StaffId');
	

	
	if(!empty($cond))
		$this->db->where($cond);

	$this->db->order_by($order_by_field,$order_by);

	$this->db->limit($limit,$start);
	$qry = $this->db->get();
	
	if($qry->num_rows()>0)
		return $qry;
	else
		return '0';	
}


//getHomeworks($cond,$order_by='DESC',$order_by_field='',$limit,$start) 

public function getHomeworks($cond,$order_by,$order_by_field,$limit,$start)
{
	$this->db->select('hw.HomeWork, hw.HomeworkId, hw.Status, cls.ClassName, sec.Section, sub.SubjectName as Subject');
	$this->db->from('homeworks as hw');
	$this->db->join('subjects as sub','sub.SubjectId=hw.SubjectId');
	$this->db->join('newclass as cls','cls.SLNO=hw.ClassSlno');
	$this->db->join('sections as sec','sec.SectionId=hw.ClassSection');
	

	
	if(!empty($cond))
		$this->db->where($cond);

	
$this->db->order_by($order_by_field,$order_by);
	$this->db->limit($limit,$start);
	$qry = $this->db->get();
	
	#echo $this->db->last_query(); exit;
	
	if($qry->num_rows()>0)
		return $qry;
	else
		return '0';		
}



	public function twotablejoin($table1,$table2,$fetchingfields,$joinedOn,$joinType,$cond,$limit,$start,$order_by_field,$order_by)
	{
		$this->db->select($fetchingfields);
		$this->db->from($table1);

		if($joinType=='')
			$this->db->join($table2,$joinedOn);
		else
			$this->db->join($table2,$joinedOn,$joinType);
		
		if(!empty($cond))
		$this->db->where($cond);

	
		$this->db->order_by($order_by_field,$order_by);
		$this->db->limit($limit,$start);
		$qry = $this->db->get();
		
		if( $qry->num_rows()>0)
			return $qry;
		else
			return "0";
		
	}
	
	
	public function getteacherforattandance()
	{
		$this->db->select("tea.TeacherId as TeacherIde, tea.TeacherName, concat(cont.ContactNumber,',',cont.AlternateNumber) as ContactNumber, sec.Section as Section, cls.ClassName");
		$this->db->from("teacher as tea");
		$this->db->join("teachercontactdetails as cont",'cont.TeacherId=tea.TeacherId');
		$this->db->join("classteachers as clsteacher",'clsteacher.TeacherId=tea.TeacherId');
		$this->db->join("sections as sec",'sec.SectionId=clsteacher.Section');
		$this->db->join("newclass as cls",'cls.SLNO=clsteacher.ClassSlno');
		$this->db->order_by("tea.TeacherName",'ASC');
		$qrey = $this->db->get();
		
		#echo $this->db->last_query(); exit;
		
		
		if( $qrey->num_rows()>0)
			return $qrey;
		else
			return "0";
	}
	
	//getmarkslist starts here
	
	public function getmarkslist($cond,$order_by='DESC',$order_by_field,$limit,$start)
	{
		
		$this->db->select("alloc.TotalMarks,sub.SubjectName, alloc.SecuredMarks, alloc.AllocatedId, concat(std.Student,'.',std.LastName) as StudentName, sec.Section as SectionName, cls.ClassName, exm.Exam");
		$this->db->from(" allocatedmarks as alloc");
		$this->db->join(" students as std",'std.StudentId=alloc.Student','inner');
		$this->db->join(" sections as sec",'sec.SectionId=alloc.SectionId','inner');
		$this->db->join(" subjects as sub",'sub.SubjectId=alloc.SubjectId','inner');
		$this->db->join(" newclass as cls",'cls.SLNO=alloc.ClassId','inner');
		$this->db->join(" whichexam as exm",'exm.ExamId=alloc.ExamId','inner');
		
		if(!empty($cond))
		$this->db->where($cond);

	
		$this->db->order_by($order_by_field,$order_by);
		$this->db->limit($limit,$start);
		$qry = $this->db->get();
		
		if( $qry->num_rows()>0)
		{
			return $qry;
			#echo $this->db->last_query(); exit; 	
		}
		else
			return "0";
		
		
		
	}
	
	//getmarkslist ends here


	public function getMonthwiseStudentattendance($data)
	{
	
		extract($data);
		if($Class>0 && $Seciton>0 )
		{
			$qry = $this->db->query("select MONTHNAME(mnt.MNTHnaam) as MonthName,mnt.MonthNumber,  IFNULL(res.presents,0) as present  from monthsname as mnt left join ( select MONTHNAME(AttendanceOn) AS MNTH, COUNT(PresentAbsent) as presents FROM studentattendance WHERE ClassId=".$Class." AND SectionId=".$Seciton." AND AcademicYear='".$Academicyear."' AND PresentAbsent='Present' group by MNTH  ) as res on MONTHNAME(mnt.MNTHnaam)=res.MNTH");
		}
		else
		{
			$qry = $this->db->query("select MONTHNAME(mnt.MNTHnaam) as MonthName,mnt.MonthNumber,  IFNULL(res.presents,0) as present  from monthsname as mnt left join ( select MONTHNAME(AttendanceOn) AS MNTH, COUNT(PresentAbsent) as presents FROM studentattendance WHERE  AcademicYear='".$Academicyear."' AND PresentAbsent='Present' group by MNTH  ) as res on MONTHNAME(mnt.MNTHnaam)=res.MNTH");
		
		#echo $this->db->last_query(); exit;
		}
	return $qry;
	
	}
	
	public function getMonthwiseTeacherattendance($data)
	{
			extract($data);
			
			if($teacherid>0)
			{
				$qry = $this->db->query("select MONTHNAME(mnt.MNTHnaam) as MonthName,mnt.MonthNumber,  IFNULL(res.presents,0) as present  from monthsname as mnt left join ( select MONTHNAME(AttendanceFor) AS MNTH, COUNT(Present) as presents FROM teacherattendance WHERE TeacherId=".$teacherid." AND AcademicYear='".$Academicyear."' AND Present='Y' group by MNTH  ) as res on MONTHNAME(mnt.MNTHnaam)=res.MNTH");
			}
			else
			{
				$qry = $this->db->query("select MONTHNAME(mnt.MNTHnaam) as MonthName,mnt.MonthNumber,  IFNULL(res.presents,0) as present  from monthsname as mnt left join ( select MONTHNAME(AttendanceFor) AS MNTH, COUNT(Present) as presents FROM teacherattendance WHERE  AcademicYear='".$Academicyear."' AND Present='Y' group by MNTH  ) as res on MONTHNAME(mnt.MNTHnaam)=res.MNTH");
			}
			return $qry;
			
	}
	
	
	//get Fee Has to collect starts here
	
	public function getFeeHastocollect($postdata)
	{
		extract($postdata);
		
		if($sectionId>0 && $Cls>0 )
		{
			$qry = $this->db->query("select mnt.MonthShortName as MonthName,mnt.MonthNumber, IFNULL(res.FeePaid,0) AS FeePaid  from monthsname as mnt left join ( SELECT MONTHNAME(`Month`) PaidMonth, sum(`Paid`) FeePaid FROM `feecollection` WHERE `ClassId`=".$Cls." AND SectionId=".$sectionId."  AND AcademicYear='".$AcademicYear."' GROUP BY PaidMonth  ) as res on MONTHNAME(mnt.MNTHnaam)=res.PaidMonth order by mnt.MonthId ASC");
		}
		else if($Cls>0)
		{
			$qry = $this->db->query("select mnt.MonthShortName as MonthName,mnt.MonthNumber, IFNULL(res.FeePaid,0) AS FeePaid  from monthsname as mnt left join ( SELECT MONTHNAME(`Month`) PaidMonth, sum(`Paid`) FeePaid FROM `feecollection` WHERE `ClassId`=".$Cls."  AND AcademicYear='".$AcademicYear."' GROUP BY PaidMonth  ) as res on MONTHNAME(mnt.MNTHnaam)=res.PaidMonth order by mnt.MonthId ASC");
		}
		else
		{
			$qry = $this->db->query("select mnt.MonthShortName as MonthName,mnt.MonthNumber, IFNULL(res.FeePaid,0) AS FeePaid  from monthsname as mnt left join ( SELECT MONTHNAME(`Month`) PaidMonth, sum(`Paid`) FeePaid FROM `feecollection` WHERE  AcademicYear='".$AcademicYear."' GROUP BY PaidMonth  ) as res on MONTHNAME(mnt.MNTHnaam)=res.PaidMonth order by mnt.MonthId ASC");
		}
			return $qry;
		
	}
	//get Fee Has to collect ends here
	
	//getting birthdays
	
	public function getbirthdays($birthdaycond)
	{
		$this->db->select("concat(std.Student,' ' ,std.LastName) as StudentName, std.ProfileIPic, cls.ClassName, sec.Section");	
		$this->db->from("students as std");
		$this->db->join("newclass as cls","cls.SLNO=std.ClassName","inner");
		$this->db->join("sections as sec","sec.SectionId=std.ClassSection","inner");
		$this->db->where($birthdaycond);
		$qry = $this->db->get('');
		
		if($qry->num_rows()>0)
			return $qry;
		else
			return "0";
	}
	
	
	//viewTeacherAttendances starts here
	
	public function viewTeacherAttendances($table,$cond,$month,$teacher)
	{
		if($teacher=="All")
		{
			$this->db->select("MONTHNAME(att.AttendanceFor) as Month, date_format(att.AttendanceFor,'%d-%m-%Y') as AttendanceFor, tea.TeacherName, ( CASE WHEN att.Present='Y' THEN 'Present' ELSE 'Absent' END) as Attendance");
			$this->db->from('teacherattendance att');
			$this->db->join('teacher as tea','tea.TeacherId=att.TeacherId','inner');
			$this->db->where($cond);
			$qry = $this->db->get('');
			
			#echo $this->db->last_query(); exit;
			
			if( $qry->num_rows()>0)
				return $qry;
			else
				return "0";	
			
		}
		else
		{
			
			$this->db->select("MONTHNAME(att.AttendanceFor) as Month, date_format(att.AttendanceFor,'%d-%m-%Y') as AttendanceFor, tea.TeacherName, ( CASE WHEN att.Present='Y' THEN 'Present' ELSE 'Absent' END) as Attendance");
			$this->db->from('teacherattendance att');
			$this->db->join('teacher as tea','tea.TeacherId=att.TeacherId','inner');
			$this->db->where($cond);
			$qry = $this->db->get('');
			
			#echo $this->db->last_query(); exit;
			
			if( $qry->num_rows()>0)
				return $qry;
			else
				return "0";	
			
			
		}
		
	}
	
	//viewTeacherAttendances ends here
	
}//class ends here

?>