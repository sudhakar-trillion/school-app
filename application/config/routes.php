<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] 				= 'admin';
$route['404_override'] 						= 'admin/pagenotfound';
$route['translate_uri_dashes'] 				= FALSE;

$route['logout'] 							= 'admin/logout';

$route['dashboard']							= 'admin/dashboard';
$route['dashboard/:num']					= 'admin/dashboard';
$route['dashboard/:num/:num']				= 'admin/dashboard';


$route['add-class'] 						= 'admin/addclass';
$route['view-classes'] 						= 'admin/viewclass';
$route['view-classes/:num'] 				= 'admin/viewclass';
$route['edit-class/:num'] 					= 'admin/editclass';

$route['add-section'] 						= 'Admin/addsection';
$route['view-sections'] 					= 'Admin/viewsections';
$route['view-sections/:num'] 				= 'Admin/viewsections';
$route['edit-section/:num'] 				= 'Admin/editsection';

$route['add-subjects'] 						= 'Admin/addsubjects';
$route['view-subjects'] 					= 'Admin/viewsubjects';
$route['view-subjects/:num'] 				= 'Admin/viewsubjects';
$route['edit-subject/:num'] 				= 'Admin/editsubject';

$route['assign-subject-class'] 				= 'Admin/assignsubjectclass';
$route['view-assigned-subjects'] 			= 'Admin/viewassignedsubjects';
$route['view-assigned-subjects/:num'] 		= 'Admin/viewassignedsubjects';
$route['edit-assigned-subject-class/:num'] 	= 'Admin/editassignedsubjectclass';


$route['add-teacher'] 						= 'Admin/addteacher';
$route['view-teachers'] 					= 'Admin/viewteachers';
$route['view-teachers/:num'] 				= 'Admin/viewteachers';
$route['edit-teacher/:num'] 				= 'Admin/editteacher';

$route['assign-teacher'] 					= 'Admin/assignteacher';
$route['view-assign-teachers'] 				= 'Admin/viewassignteachers';
$route['view-assign-teachers/:num'] 		= 'Admin/viewassignteachers';
$route['edit-assigned-teacher/:num'] 		= 'Admin/editassignedteacher';

$route['manage-teacher-profile'] 			= 'Teacher/manageprofile';
$route['teacher-attandance']				= 'Teacher/addattandance';
$route['allocate-marks']					= 'Teacher/allocatemarks';
$route['view-marks']						= 'Teacher/viewmarks';
$route['view-marks/:num']					= 'Teacher/viewmarks';

$route['edit-allocated-marks/:num'] 		= 'Teacher/editallocatedmarks';


$route['add-student'] 						= 'Adminfromstudents/addstudent';
$route['view-students'] 					= 'Adminfromstudents/viewstudents';
$route['view-students/:any'] 				= 'Adminfromstudents/viewstudents';
$route['edit-student/:any'] 				= 'Adminfromstudents/editstucent';

$route['add-student-attendance']			= 'Adminfromstudents/addattendance';
$route['add-student-attendance/:num/:num']	= 'Adminfromstudents/addattendance';


$route['view-student-attendance']			= 'Adminfromstudents/viewattendance';
$route['view-student-attendance/:num/:num']	= 'Adminfromstudents/viewattendance';




$route['add-fee-structure'] 				= 'managefeestructure/addfeestructure';
$route['view-fee-structure'] 				= 'managefeestructure/viewfeestructure';
$route['view-fee-structure/:num'] 			= 'managefeestructure/viewfeestructure';
$route['edit-fee-structure/:num'] 			= 'managefeestructure/editfeestructure';


$route['view-students-fee-details'] 		= 'managefeestructure/studentfeedetails';
$route['view-students-fee-details/:num']	= 'managefeestructure/studentfeedetails';


$route['pay-fee'] 							= 	'managefeestructure/payfee';
$route['fee-paid']							=	'managefeestructure/feepaid';

$route['add-notification-to-student'] 		= 'managenotifications/addnotificationstudent';
$route['view-notification-to-student'] 		= 'managenotifications/viewnotificationtostudent';
$route['view-notification-to-student/:num'] = 'managenotifications/viewnotificationtostudent';

$route['edit-notification-to-student/:num'] = 'managenotifications/editnotificationtostudent';


$route['view-parent-notifications']			=	'managenotifications/parentnotifications';
$route['view-parent-notifications/:num']	=	'managenotifications/parentnotifications';


$route['add-homework-to-student'] 			= 'managehomeworks/addhomeworktostudent';
$route['view-homework-to-student'] 			= 'managehomeworks/viewhomeworks';
$route['view-homework-to-student/:num'] 	= 'managehomeworks/viewhomeworks';

$route['edit-home-work/:num']				= 'managehomeworks/edithomework';

$route['add-student-activity'] 				= 'managestudentactivities/addstudentactivity';
$route['view-student-activities'] 			= 'managestudentactivities/viewstudentactivities';
$route['view-student-activities/:num'] 		= 'managestudentactivities/viewstudentactivities';

$route['edit-student-activity/:num'] 		= 'managestudentactivities/editstudentactivity';





/*  Scheduling Celebrations, exams events and more starts here */


$route['add-celebration'] 					 = 'schedulings/addcelebration';
$route['add-celebration/:num/:num'] 		 = 'schedulings/addcelebration';

$route['view-celebrations'] 				 = 'schedulings/viewcelebration';
$route['view-celebrations/:num/:num'] 		 = 'schedulings/viewcelebration';

$route['add-celebration/:num/:num'] 		 = 'schedulings/addcelebration';

$route['view-celebrations']  				 = 'schedulings/viewcelebration';
$route['view-celebrations/:num/:num'] 		 = 'schedulings/viewcelebration';



$route['add-exam'] 							 = 'schedulings/addexam';
$route['view-exams'] 						 = 'schedulings/viewexamschedules';
$route['view-exams/:num/:num']			 	 = 'schedulings/viewexamschedules';

/*  Scheduling Celebrations, exams events and more ends here */


/*  Vendor management and expenses management routings starts here  */

$route['add-vendor'] 						=  'financials/addvendor';
$route['view-vendors'] 						=  'financials/viewvendors';

$route['view-vendors/:num']					=  'financials/viewvendors';
$route['edit-vendor/:num']					=  'financials/editvendor';

/* Vendor management and expenses management ends here*/



/* Non teaching staff management starts here */

	$route['add-nonteaching-staff'] 		= 'miscellaneous/addnontechingstaff';
	$route['view-nonteaching-staff'] 		= 'miscellaneous/viewnonteachingstaff';
	
	$route['view-nonteaching-staff/:num'] 	= 'miscellaneous/viewnonteachingstaff';
	$route['edit-nonteaching-staff/:num'] 	= 'miscellaneous/editnonteachingstaff';
	
	
	$route['add-nonteaching-staff-details'] =	'miscellaneous/addnonteachingdetails';
	$route['view-nonteaching-staff-details'] =	'miscellaneous/viewnonteachingdetails';
	$route['view-nonteaching-staff-details/:num'] =	'miscellaneous/viewnonteachingdetails';
	
	$route['edit-nonteaching-staff-details/:num'] = 'miscellaneous/editnonteachingstaffdetails';

/* Non teaching staff management ends here *//* */


/* Manage transportation starts here */


$route['add-route'] 										= 'miscellaneous/addroute';
$route['add-vehicle'] 										= 'miscellaneous/addvehicle';
$route['view-vehicles'] 									= 'miscellaneous/viewvehicles';	
$route['view-vehicles/:num'] 								= 'miscellaneous/viewvehicles';	
$route['edit-vehicle/:num'] 								= 'miscellaneous/editvehicles';	

$route['add-student-to-transport'] 							= 'miscellaneous/addstdtovehicle';	 
$route['add-student-to-transport/:num/:num/:num'] 			= 'miscellaneous/addstdtovehicle';	 



/* Manage transportation ends here */




/* Manage salaries starts here */

	$route['add-salary'] 					= 'financials/addsalary';
	$route['view-salaries']					= 'financials/viewsalaries';		
	$route['view-salaries/:num']			= 'financials/viewsalaries';			
		$route['edit-salary/:num']			= 'financials/editsalary';			
	
/* Manage salaries ends here */


/* Manage bills starts here */

	$route['add-bill'] 						= 'financials/addbill';
	$route['view-bills'] 					= 'financials/viewbills';
	$route['view-bills/:num'] 				= 'financials/viewbills';
	$route['edit-bill/:num'] 				= 'financials/editbill';

/* Manage bills ends here */

$route['add-department'] 					=	'Admin/addDepartment';
$route['view-departments'] 					= 'Admin/viewdepartments';
$route['view-departments/:num']				= 'Admin/viewdepartments';

$route['edit-department/:num'] 				= 'Admin/editdepartment';






$route['parent'] 							= 'parents/login';
$route['parent-dashboard'] 					= 'parents/dashboard';

$route['view-edit-profile']			 		= 'parents/vieweditprofile';
$route['view-edit-child-profile'] 			= 'parents/vieweditchildprofile';

$route['view-admin-notifications'] 			= 'parents/viewadminnotifications';

$route['view-admin-notifications/:num']		= 'parents/viewadminnotifications';
$route['add-notification'] 					= 'parents/addnotification';

$route['parent/view-transport-details'] 			= 'parents/viewtransportdetails';


$route['view-student-activity-details'] 	= 'parents/viewstudentactivities';

$route['student-home-works'] 				= 'parents/showhomeworks';
$route['student-home-works/:num'] 				= 'parents/showhomeworks';

$route['view-exam-schedules'] 				= 'parents/viewexamschedules';
$route['view-exam-schedules/:num/:num'] 	= 'parents/viewexamschedules';

$route['view-events']						= 'parents/viewevents';
$route['view-events/:num/:num'] 			= 'parents/viewevents';

$route['parent/pay-fee'] 					= 'parents/payschoolfee';
$route['parent/fee-paid'] 					= 'parents/feepaid';
$route['parent/payment-history']			= 'parents/paymenthistory';
				
$route['parent-logout']						= 'parents/logout';



