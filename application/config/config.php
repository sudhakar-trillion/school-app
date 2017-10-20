<?php
defined('BASEPATH') OR exit('No direct script access allowed');


define('RULES','rules');
define('ERRORS','errors');
define('FIELD','field');
define('LABEL','label');
define('UserName','user_name');
define('TRIMREQ','trim|required');

#echo $_SERVER['HTTP_HOST']; exit; 


if( $_SERVER['HTTP_HOST'] == "localhost" || $_SERVER['HTTP_HOST'] == "192.168.0.9" )
	{
		//$config['base_url'] = 'http://192.168.0.3/adi-akshara/';
		$config['base_url'] = 'http://localhost/adi-akshara/';
		$config['publicfolder'] = 'adi-akshara';
	}
elseif( $_SERVER['HTTP_HOST'] == "adiakshara.in" || $_SERVER['HTTP_HOST'] == "www.adiakshara.in"  )
{
	$config['base_url'] = 'http://www.adiakshara.in/school-app/';
	$config['publicfolder'] = 'school-app';
}
else
{
	/*
	$config['base_url'] = 'http://www.adiakshara.in/school-app/';
	$config['publicfolder'] = 'school-app';
	*/
	
	$config['base_url'] = 'http://www.trillionit.in/school-app/';
	$config['publicfolder'] = 'school-app';
}

$config['index_page'] = 'index.php';

$config['uri_protocol']	= 'REQUEST_URI';


$config['url_suffix'] = '';

$config['language']	= 'english';

$config['charset'] = 'UTF-8';


$config['enable_hooks'] = FALSE;


$config['subclass_prefix'] = 'MY_';

$config['composer_autoload'] = FALSE;

$config['permitted_uri_chars'] = 'a-z 0-9~%.:@_\-';

$config['enable_query_strings'] = FALSE;
$config['controller_trigger'] = 'c';
$config['function_trigger'] = 'm';
$config['directory_trigger'] = 'd';


$config['allow_get_array'] = TRUE;


$config['log_threshold'] = 0;

$config['log_path'] = '';


$config['log_file_extension'] = '';

$config['log_file_permissions'] = 0644;

$config['log_date_format'] = 'Y-m-d H:i:s';

$config['error_views_path'] = '';

$config['cache_path'] = '';

$config['cache_query_string'] = FALSE;

$config['encryption_key'] = '';

/*
|--------------------------------------------------------------------------
| Session Variables
|--------------------------------------------------------------------------
|
| 'sess_driver'
|
|	The storage driver to use: files, database, redis, memcached
|
| 'sess_cookie_name'
|
|	The session cookie name, must contain only [0-9a-z_-] characters
|
| 'sess_expiration'
|
|	The number of SECONDS you want the session to last.
|	Setting to 0 (zero) means expire when the browser is closed.
|
| 'sess_save_path'
|
|	The location to save sessions to, driver dependent.
|
|	For the 'files' driver, it's a path to a writable directory.
|	WARNING: Only absolute paths are supported!
|
|	For the 'database' driver, it's a table name.
|	Please read up the manual for the format with other session drivers.
|
|	IMPORTANT: You are REQUIRED to set a valid save path!
|
| 'sess_match_ip'
|
|	Whether to match the user's IP address when reading the session data.
|
|	WARNING: If you're using the database driver, don't forget to update
|	         your session table's PRIMARY KEY when changing this setting.
|
| 'sess_time_to_update'
|
|	How many seconds between CI regenerating the session ID.
|
| 'sess_regenerate_destroy'
|
|	Whether to destroy session data associated with the old session ID
|	when auto-regenerating the session ID. When set to FALSE, the data
|	will be later deleted by the garbage collector.
|
| Other session cookie settings are shared with the rest of the application,
| except for 'cookie_prefix' and 'cookie_httponly', which are ignored here.
|
*/
$config['sess_driver'] = 'files';
$config['sess_cookie_name'] = 'ci_session';
$config['sess_expiration'] = 7200;
$config['sess_save_path'] = BASEPATH . 'cache/';//NULL;
$config['sess_match_ip'] = FALSE;
$config['sess_time_to_update'] = 300;
$config['sess_regenerate_destroy'] = FALSE;

/*
|--------------------------------------------------------------------------
| Cookie Related Variables
|--------------------------------------------------------------------------
|
| 'cookie_prefix'   = Set a cookie name prefix if you need to avoid collisions
| 'cookie_domain'   = Set to .your-domain.com for site-wide cookies
| 'cookie_path'     = Typically will be a forward slash
| 'cookie_secure'   = Cookie will only be set if a secure HTTPS connection exists.
| 'cookie_httponly' = Cookie will only be accessible via HTTP(S) (no javascript)
|
| Note: These settings (with the exception of 'cookie_prefix' and
|       'cookie_httponly') will also affect sessions.
|
*/
$config['cookie_prefix']	= '';
$config['cookie_domain']	= '';
$config['cookie_path']		= '/';
$config['cookie_secure']	= FALSE;
$config['cookie_httponly'] 	= FALSE;

/*
|--------------------------------------------------------------------------
| Standardize newlines
|--------------------------------------------------------------------------
|
| Determines whether to standardize newline characters in input data,
| meaning to replace \r\n, \r, \n occurrences with the PHP_EOL value.
|
| WARNING: This feature is DEPRECATED and currently available only
|          for backwards compatibility purposes!
|
*/
$config['standardize_newlines'] = FALSE;

/*
|--------------------------------------------------------------------------
| Global XSS Filtering
|--------------------------------------------------------------------------
|
| Determines whether the XSS filter is always active when GET, POST or
| COOKIE data is encountered
|
| WARNING: This feature is DEPRECATED and currently available only
|          for backwards compatibility purposes!
|
*/
$config['global_xss_filtering'] = FALSE;

/*
|--------------------------------------------------------------------------
| Cross Site Request Forgery
|--------------------------------------------------------------------------
| Enables a CSRF cookie token to be set. When set to TRUE, token will be
| checked on a submitted form. If you are accepting user data, it is strongly
| recommended CSRF protection be enabled.
|
| 'csrf_token_name' = The token name
| 'csrf_cookie_name' = The cookie name
| 'csrf_expire' = The number in seconds the token should expire.
| 'csrf_regenerate' = Regenerate token on every submission
| 'csrf_exclude_uris' = Array of URIs which ignore CSRF checks
*/
$config['csrf_protection'] = FALSE;
$config['csrf_token_name'] = 'csrf_test_name';
$config['csrf_cookie_name'] = 'csrf_cookie_name';
$config['csrf_expire'] = 7200;
$config['csrf_regenerate'] = TRUE;
$config['csrf_exclude_uris'] = array();

/*
|--------------------------------------------------------------------------
| Output Compression
|--------------------------------------------------------------------------
|
| Enables Gzip output compression for faster page loads.  When enabled,
| the output class will test whether your server supports Gzip.
| Even if it does, however, not all browsers support compression
| so enable only if you are reasonably sure your visitors can handle it.
|
| Only used if zlib.output_compression is turned off in your php.ini.
| Please do not use it together with httpd-level output compression.
|
| VERY IMPORTANT:  If you are getting a blank page when compression is enabled it
| means you are prematurely outputting something to your browser. It could
| even be a line of whitespace at the end of one of your scripts.  For
| compression to work, nothing can be sent before the output buffer is called
| by the output class.  Do not 'echo' any values with compression enabled.
|
*/
$config['compress_output'] = FALSE;

/*
|--------------------------------------------------------------------------
| Master Time Reference
|--------------------------------------------------------------------------
|
| Options are 'local' or any PHP supported timezone. This preference tells
| the system whether to use your server's local time as the master 'now'
| reference, or convert it to the configured one timezone. See the 'date
| helper' page of the user guide for information regarding date handling.
|
*/
$config['time_reference'] = 'local';

/*
|--------------------------------------------------------------------------
| Rewrite PHP Short Tags
|--------------------------------------------------------------------------
|
| If your PHP installation does not have short tag support enabled CI
| can rewrite the tags on-the-fly, enabling you to utilize that syntax
| in your view files.  Options are TRUE or FALSE (boolean)
|
| Note: You need to have eval() enabled for this to work.
|
*/
$config['rewrite_short_tags'] = FALSE;

/*
|--------------------------------------------------------------------------
| Reverse Proxy IPs
|--------------------------------------------------------------------------
|
| If your server is behind a reverse proxy, you must whitelist the proxy
| IP addresses from which CodeIgniter should trust headers such as
| HTTP_X_FORWARDED_FOR and HTTP_CLIENT_IP in order to properly identify
| the visitor's IP address.
|
| You can use both an array or a comma-separated list of proxy addresses,
| as well as specifying whole subnets. Here are a few examples:
|
| Comma-separated:	'10.0.1.200,192.168.5.0/24'
| Array:		array('10.0.1.200', '192.168.5.0/24')
*/
$config['proxy_ips'] = '';



//form validation goes here

$config['Adminlogin'] = array(
								"Adminuserid"=>array(
														FIELD=>"userid",
														LABEL=>"User Id",
														RULES=>TRIMREQ,
														ERRORS=>array('required'=>'User id is required')
														
													),
								"password"=>array(
														FIELD=>"password",
														LABEL=>"Password",
														RULES=>TRIMREQ,
														ERRORS=>array("required"=>"Password is required")
													),
								
							);


$config['Addclass'] = array(
								"ClassName"=>array(
														FIELD=>"ClassName",
														LABEL=>"Class name",
														RULES=>TRIMREQ."|is_unique[newclass.ClassName]",
														ERRORS=>array('required'=>'Class is required','is_unique'=>'Class already exists')
														
													),
							);
							


$config['Editclass'] = array(
								"ClassName"=>array(
														FIELD=>"ClassName",
														LABEL=>"Class name",
														RULES=>TRIMREQ."|callback_editclass_callback",
														ERRORS=>array('required'=>'Class is required')
														
													),
							);							



$config['Addsection'] = array(
								"ClassName"=>array(
														FIELD=>"ClassName",
														LABEL=>"Class name",
														RULES=>'callback_checkclassselect'
													),
								"section"=>array(
														FIELD=>"section",
														LABEL=>"Secton",
														RULES=>TRIMREQ."|callback_addsectioncheck",
														ERRORS=>array('required'=>'Enter section')
												)
					);
					
					
$config['Edisection'] = array(
								"ClassName"=>array(
														FIELD=>"ClassName",
														LABEL=>"Class name",
														RULES=>'callback_checkclassselect'
													),
								"section"=>array(
														FIELD=>"section",
														LABEL=>"Secton",
														RULES=>TRIMREQ."|callback_editsectioncheck",
														ERRORS=>array('required'=>'Enter section')
												)
					);
					

$config['Addteacher'] = array(
								"TeacherName"=>array(
														FIELD=>"TeacherName",
														LABEL=>"Teacher Name",
														RULES=>TRIMREQ,
														ERRORS=>array('required'=>'Name is required')
														
													),
							);
							
$config['Editteacher'] = array(
								"TeacherName"=>array(
														FIELD=>"TeacherName",
														LABEL=>"Teacher Name",
														RULES=>TRIMREQ,
														ERRORS=>array('required'=>'Name is required')
														
													),
							);							

$config['AddParentProfile'] = array(
									
										"MotherName"=>array(
															FIELD=>"MotherName",
															LABEL=>"Mother Name",
															RULES=>TRIMREQ,
															ERRORS=>array('required'=>'Mother Name  is required')
														),
										"FatherName"=>array(
															FIELD=>"FatherName",
															LABEL=>"Father Name",
															RULES=>TRIMREQ,
															ERRORS=>array('required'=>'Father Name  is required')
														),
										"MotherHighestDegree"=>array(
															FIELD=>"MotherHighestDegree",
															LABEL=>"Mother Highest Degree",
															RULES=>TRIMREQ,
															ERRORS=>array('required'=>'Degree  is required')
														),
										"FatherHighestDegree"=>array(
															FIELD=>"FatherHighestDegree",
															LABEL=>"Father Highest Degree",
															RULES=>TRIMREQ,
															ERRORS=>array('required'=>'Degree  is required')
														),
																								"MotherName"=>array(
															FIELD=>"MotherName",
															LABEL=>"Mother Name",
															RULES=>TRIMREQ,
															ERRORS=>array('required'=>'Mother Name  is required')
														),
										"MotherOccupation"=>array(
															FIELD=>"MotherOccupation",
															LABEL=>"Mother Occupation",
															RULES=>TRIMREQ,
															ERRORS=>array('required'=>'Occupation  is required')
														),
										"FatherOccupation"=>array(
															FIELD=>"FatherOccupation",
															LABEL=>"Father Occupation",
															RULES=>TRIMREQ,
															ERRORS=>array('required'=>'Occupation is required')
														),
										"ContactNumber1"=>array(
															FIELD=>"ContactNumber1",
															LABEL=>"ContactNumber1",
															RULES=>TRIMREQ."|regex_match[/^[0-9]{10}$/]",
															ERRORS=>array('required'=>'Contact Number1  is required',"regex_match"=>'Numerics of 10 digits allowed')
														),
														
										"ContactNumber2"=>array(
															FIELD=>"ContactNumber2",
															LABEL=>"ContactNumber2",
															RULES=>TRIMREQ."|regex_match[/^[0-9]{10}$/]",
															ERRORS=>array('required'=>'Contact Number2  is required',"regex_match"=>'Numerics of 10 digits allowed')
														),
														
										"Address"=>array(
															FIELD=>"Address",
															LABEL=>"Address",
															RULES=>TRIMREQ,
															ERRORS=>array('required'=>'Address is required')
														)																		
								
								);


$config['addfeestructure'] = array(
										"ClassName" =>array(
															FIELD=>"ClassName",
															LABEL=>"ClassName",
															RULES=>TRIMREQ."|callback_checkclass_select",
															
															),
										"AcademicYear"=>array(
															FIELD=>"AcademicYear",
															LABEL=>"AcademicYear",
															RULES=>TRIMREQ."|callback_checkacademicyear_select",
															
															),
										"MonthlyFee" => array(
																FIELD=>'MonthlyFee',
																LABEL=>"MonthlyFee",
																RULES=>TRIMREQ,
																ERRORS=>array('required'=>'Montly Fee required')
															),
										"AnnualFee"=>array(
																FIELD=>'AnnualFee',
																LABEL=>"AnnualFee",
																RULES=>TRIMREQ,
																ERRORS=>array('required'=>'Annual Fee required')
															)
									);

$config['addActivities'] = array(
									"ClassName" =>array(
															FIELD=>"ClassName",
															LABEL=>"ClassName",
															RULES=>TRIMREQ."|callback_checkclass_select",
															
															),
					
									"sections"=>array(
															FIELD=>"sections",
															LABEL=>"Section",
															RULES=>TRIMREQ."|callback_checksection_select",
														),
									"Rollno"=>array(
															FIELD=>"Rollno",
															LABEL=>"Roll no",
															RULES=>TRIMREQ."|callback_checkstudentid_select",
														),
									"ActivityTitle"=>array(
															FIELD=>"ActivityTitle",
															LABEL=>"Activity Title",
															RULES=>TRIMREQ,
															ERRORS=>array("required"=>"Title required")
														),
									"ActivityDated"=>array(
															FIELD=>"ActivityDated",
															LABEL=>"Activity Dated",
															RULES=>TRIMREQ,
															ERRORS=>array("required"=>"Date required")
														),		
									"ActivityPics"=>array(
															FIELD=>"ActivityPics",
															LABEL=>"Activity Pics",
															RULES=>"callback_ActivityPicscallback",

															)			
					);
									

$config['editActivities'] = array(
									"ClassName" =>array(
															FIELD=>"ClassName",
															LABEL=>"ClassName",
															RULES=>TRIMREQ."|callback_checkclass_select",
															
															),
					
									"sections"=>array(
															FIELD=>"sections",
															LABEL=>"Section",
															RULES=>TRIMREQ."|callback_checksection_select",
														),
									"Rollno"=>array(
															FIELD=>"Rollno",
															LABEL=>"Roll no",
															RULES=>TRIMREQ."|callback_checkstudentid_select",
														),
									"ActivityTitle"=>array(
															FIELD=>"ActivityTitle",
															LABEL=>"Activity Title",
															RULES=>TRIMREQ,
															ERRORS=>array("required"=>"Title required")
														),
									"ActivityDated"=>array(
															FIELD=>"ActivityDated",
															LABEL=>"Activity Dated",
															RULES=>TRIMREQ,
															ERRORS=>array("required"=>"Date required")
														),		
									"ActivityPics"=>array(
															FIELD=>"ActivityPics",
															LABEL=>"Activity Pics",
															RULES=>"callback_EditActivityPicscallback",

															)			
					);


$config['addvendor'] = array(
						"Title"=>array(
										FIELD=>"Title",
										LABEL=>"Title",
										RULES=>TRIMREQ,
										ERRORS=>array("required"=>"Title required")
										),
						"CompanyName"=>array(
										FIELD=>"CompanyName",
										LABEL=>"Company Name",
										RULES=>TRIMREQ,
										ERRORS=>array("required"=>"Company Name required")
										),
						"ContactPerson"=>array(
										FIELD=>"ContactPerson",
										LABEL=>"Contact Person",
										RULES=>TRIMREQ,
										ERRORS=>array("required"=>"Contact Person required")
										),
						"ContactEmail"=>array(
										FIELD=>"ContactEmail",
										LABEL=>"ContactEmail",
										RULES=>TRIMREQ."|valid_email",
										ERRORS=>array("required"=>"Contact Email required")
										),
						"Mobile1"=>array(
										FIELD=>"Mobile1",
										LABEL=>"Mobile1",
										RULES=>TRIMREQ,
										ERRORS=>array("required"=>"Mobile required")
										),						
						"Address"=>array(
										FIELD=>"Address",
										LABEL=>"Address",
										RULES=>TRIMREQ,
										ERRORS=>array("required"=>"Address required")
										),
						
						
					
					);
$config['addnonteachingstaff'] = array(
											"StaffName"=>array(
														FIELD=>"StaffName",
														LABEL=>"StaffName",
														RULES=>TRIMREQ,
														ERRORS=>array("required"=>"Staff Name required")
													),
											"Department"=>array(
														FIELD=>"Department",
														LABEL=>"Department",
														RULES=>TRIMREQ,
														ERRORS=>array("required"=>"Select Department")
													)
											);					
					
$config['adddepartment'] =  array(
										"Department"=>array(
														FIELD=>"Department",
														LABEL=>"Department",
														RULES=>TRIMREQ,
														ERRORS=>array("required"=>"Department required")
													)
										
										
										);
										
					
$config['editdepartment'] =  array(
											"Department"=>array(
														FIELD=>"Department",
														LABEL=>"Department",
														RULES=>TRIMREQ,
														ERRORS=>array("required"=>"Department required")
													)
										
										
										);										


$config['addroute'] =  array(
											"RouteNumber"=>array(
														FIELD=>"RouteNumber",
														LABEL=>"Route Number",
														RULES=>TRIMREQ.'|integer',
														ERRORS=>array("required"=>"Route name required",'integer'=>'Enter only numerics')
													),
											"Routes"=>array(
														FIELD=>"Routes",
														LABEL=>"Routes",
														RULES=>TRIMREQ,
														ERRORS=>array("required"=>"Enter routes")
													)
										
										
										);	
										


$config['Addvehicle'] =  array(
											"VehicleNumber"=>array(
														FIELD=>"VehicleNumber",
														LABEL=>"Vehicle Number",
														RULES=>TRIMREQ,
														ERRORS=>array("required"=>"Vehicle number required")
													),
											"VehicleRoute"=>array(
														FIELD=>"VehicleRoute",
														LABEL=>"VehicleRoute",
														RULES=>TRIMREQ."|is_natural_no_zero",
														ERRORS=>array("required"=>"Select route","is_natural_no_zero"=>"Select route")
													),
											"Driver"=>array(
														FIELD=>"Driver",
														LABEL=>"Driver",
														RULES=>TRIMREQ."|is_natural_no_zero",
														ERRORS=>array("required"=>"Select deriver","is_natural_no_zero"=>"Select driver")
													)													
										
										
										);	
										
										

$config['Editvehicle'] =  array(
											"VehicleNumber"=>array(
														FIELD=>"VehicleNumber",
														LABEL=>"Vehicle Number",
														RULES=>TRIMREQ,
														ERRORS=>array("required"=>"Vehicle number required")
													),
											"VehicleRoute"=>array(
														FIELD=>"VehicleRoute",
														LABEL=>"VehicleRoute",
														RULES=>TRIMREQ."|is_natural_no_zero",
														ERRORS=>array("required"=>"Select route","is_natural_no_zero"=>"Select route")
													),
											"Driver"=>array(
														FIELD=>"Driver",
														LABEL=>"Driver",
														RULES=>TRIMREQ."|is_natural_no_zero",
														ERRORS=>array("required"=>"Select deriver","is_natural_no_zero"=>"Select driver")
													)													
										
										
										);																														

$config['AddNonTeachingDetails' ] = array(

											"StaffId"=>array(
																FIELD=>"StaffId",
																LABEL=>"StaffId",
																RULES=>TRIMREQ."|is_natural_no_zero",
																ERRORS=>array("required"=>"Select Staff id","is_natural_no_zero"=>"Select staff id" )
															),
											"ContactNumber"=>array(
																	FIELD=>"ContactNumber",
																	LABEL=>"ContactNumber",
																	RULES=>TRIMREQ,
																	ERRORS=>array("required"=>"Enter contact number" )
																	),
											"ContactAddress"=>array(
																	FIELD=>"ContactAddress",
																	LABEL=>"ContactAddress",
																	RULES=>TRIMREQ,
																	ERRORS=>array("required"=>"Enter contact address" )
																		
																	)																	
										
										);										

$config['payfee']			=	array(
										
										"ClassName"=>array(
															FIELD=>"ClassName",
															LABEL=>"ClassName",
															RULES=>TRIMREQ."|is_natural_no_zero",
															ERRORS=>array("is_natural_no_zero"=>"Select Class" )
															),
										"sections"=>array(
															FIELD=>"sections",
															LABEL=>"sections",
															RULES=>TRIMREQ."|is_natural_no_zero",
															ERRORS=>array("is_natural_no_zero"=>"Select Section" )
															),
										"Rollno"=>array(
															FIELD=>"Rollno",
															LABEL=>"Rollno",
															RULES=>TRIMREQ."|is_natural_no_zero",
															ERRORS=>array("is_natural_no_zero"=>"Select Student" )
															),
										"month"=>array(
															FIELD=>"month",
															LABEL=>"month",
															RULES=>TRIMREQ."|is_natural_no_zero",
															ERRORS=>array("is_natural_no_zero"=>"Select month" )
															),
										"AcademicYear"=>array(
															FIELD=>"AcademicYear",
															LABEL=>"AcademicYear",
															RULES=>TRIMREQ,
															ERRORS=>array("required"=>"Select Academic Year" )
															),
										"MonthlyFee"=>array(
															FIELD=>"MonthlyFee",
															LABEL=>"MonthlyFee",
															RULES=>TRIMREQ."|is_natural_no_zero|callback_checkfeepaid",
															ERRORS=>array("required"=>"Enter MonthlyFee","is_natural_no_zero"=>"Monthly Fee shouldnot be zero" )
															),
									
										
									);


//form validation ends here