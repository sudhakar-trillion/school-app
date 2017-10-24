<!DOCTYPE html>
<html lang="en">
  <head>
  <base href="<?PHP echo base_url(); ?>">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
    <meta name="author" content="GeeksLabs">
    <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
    <link rel="shortcut icon" href="img/favicon.png">

    <title>TSM</title>

    <!-- Bootstrap CSS -->    
    <link href="resources/template-assets/css/bootstrap.min.css" rel="stylesheet">
    <!-- bootstrap theme -->
    <link href="resources/template-assets/css/bootstrap-theme.css" rel="stylesheet">
    <!--external css-->
    <!-- font icon -->
    <link href="resources/template-assets/css/elegant-icons-style.css" rel="stylesheet" />
    <link href="resources/template-assets/css/font-awesome.min.css" rel="stylesheet" />    
    <!-- full calendar css-->
    <!-- owl carousel -->
    <!-- Custom styles -->
    <link href="resources/template-assets/css/style.css" rel="stylesheet">
    <link href="resources/template-assets/css/style-responsive.css" rel="stylesheet" />
    
        <link href="resources/custom-assests/css/style.css" rel="stylesheet">

    <!-- =======================================================
        Theme Name: NiceAdmin
        Theme URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
        Author: BootstrapMade
        Author URL: https://bootstrapmade.com
    ======================================================= -->
    
        <link rel="stylesheet" href="resources/custom-assests/css/jquery-ui.css" />
        
        
        <link rel="stylesheet" href="resources/dist/css/lightbox.min.css">
       
<link rel="stylesheet" href="resources/custom-assests/parent-date-picker/css/bootstrap-datetimepicker.min.css"/>
<style>
.viewroute{
	border:1px solid #ddd;
}
.viewroute th{
	background:#8f6940;
	color:#fff;
	padding:10px;
}

.viewroute td{
	padding:10px;
}

.lb-details{display:none;}

.ui-state-default { text-align:center!important; }
.ui-datepicker td  { padding:5px!important;}
.err-msg{color:red;}
.err-border{ border:1px solid #F00;}
.required{color:red!important;}

.ui-datepicker-today
{
    background: rgba(255, 152, 0, 0.18) !important;
    border-radius: 50% !important;	
}

.filtersection div
{
	margin:10px !important;

}
.filtersection
{
	margin-bottom:0px !important;
}

.doc_details
{
	
	margin-top:30px;
	border-top:2px solid rgba(167, 172, 178, 0.23);
	padding-top:15px;
	display:none;

}

.doc_details .doc_child{
	margin-bottom:10px;
}


.err-border{border:1px solid #F00;}
#ui-datepicker-div{ z-index:22 !important;}

.assign-err
{
	margin-top:6px !important;	
	color:#F00 !important;
}

.addmore, .addmore_students
{
	    padding: 6px;
    background: #09C;
    border-radius: 28%;
    color: #fff;
	width:3%;
	cursor:pointer;
}

.addmore span, .addmore_students span
{
	margin-left:2px;	
	font-weight:bolder;

}


.remore_subject, .remove_students, .removemoreactivities,.removemorehobbies, .removemoreactivities
{
    padding: 6px;
    background: #F00;
    border-radius: 28%;
    color: #fff;
	width:3%;
	cursor:pointer;
}

.remore_subject span, .remove_students span 
{
	margin-left:2px;	
	font-weight:bolder;

}

.validation-erors p { color:#F00; margin-top:3px;  }

.addmoreactivities, .removemoreactivities, .addmorehobbies, .removemorehobbies, .addmoreIdMarks, .removemoreactivities
{
	margin-top:-33px;
	position:absolute;
	float: left;
    right: 0px;
    width: 10%;
}
.newnotifications
{
	cursor:pointer;
}

.contentdiv
{
	margin-top:20px	
}


.notification-reply-form{display:none;}
.notification_replybtn { margin-top:20px; }

.notification-label{ 
 font-weight:bolder; color:#000; background:#F7F7F7; display:block;
 
 display: block;
    margin: 0px;
    border: 1px solid #ddd;
    padding-left: 13px;
    line-height: 41px;
	border-bottom:0px;
	 }
.right-border, .event-details-div
{
	
	padding:0px !important;
}

.right-border p, .event-details-div p
{
	font-size:16px;
	background:#036;
	padding:10px;
	text-align:left;
	color:#fff;

}

.event-details-div
{
	border-left:1px solid #ccc;
	
}

.pic-container
{
	float:left;
	padding:2px !important;
	padding-right:0px;
}

.studentform .form-horizontal .control-label{
	text-align:left !important;
}
.profile_pic img{
	    /* border: 3px solid #eee; */
  padding: 7px;
  height:270px;
    margin-bottom: 20px;
    /* padding-bottom: 20px; */
    width: 100%;
}
label.btn.btn-primary.btn-block.btn-outlined {
    width: 45%;
	float:left;
	margin-bottom:15px;
	margin-left:15px;
}
.btn.btn-primary.btn-block.btn-outlined.up_submit{
	background:#0C6;
	float:right;
	width:30%;
	border:none;
	margin-right:15px;
}
.btn.btn-primary.btn-block.btn-outlined.up_submit:hover{
	color:#FFF;
}
.pic-container img
{ 
	    width: 265px;
    border: 1px solid #eee;
    margin-bottom: 5px;
    border: 1px solid #ddd;
    padding: 10px;
	height:245px;
}
.pic-container a img:hover
{
	border: 1px solid #ddd;
    cursor: pointer;
    padding: 0px;
    width: 271px;
}

.archieves-list div
{
	padding-left:15px; 
	font-weight:bold;
}

.archieves-list div:hover
{
	cursor:pointer;
}

.archieves-list div
{
	padding-top:10px;
	padding-bottom:0px;
}


.archieves-list div ul{ display:none;}

.archieves-list div ul { margin-top:5px; }
.archieves-list div ul li{ padding-bottom:5px; }
.archieves-list div ul:last-child{ padding-bottom:0px; margin-bottom:0px; }

.archieve-show
{
	display:block;
}


.archieve-hide
{
	display:none;
}
.gallery{
	width:300px;
}

.Event-Name{ cursor:pointer;}

.loader
{
	position:absolute;
	left: 616px;
    top: 245px;
	display:none;
	
}

.download {margin-bottom:15px; cursor:pointer; }
.download a:hover {color:red; }
.download i { margin-left:10px; padding-right:6px}





.card {
    background: #fff;
    min-height: 50px;
    box-shadow: none;
    position: relative;
    margin-bottom: 20px;
    transition: .5s;
    border: 1px solid #eee;
    border-radius: 0;
}

.card {
    display: inline-block;
    position: relative;
    width: 100%;
    border-radius: 4px;
    color: rgba(0,0,0, 0.87);
    background: #fff;
	border-radius:0px;
   
}
.card:hover {
    box-shadow: 0 1px 5px 1px rgba(0,0,0,0.14), 0 3px 14px 2px rgba(0,0,0,0.12), 0 5px 5px -3px rgba(0,0,0,0.2);
    transition: all 150ms linear;
}
.card .st h2 {
    margin: 0;
    font-size: 17px;
    font-weight: normal;
    color: #111;
    text-transform: uppercase;
	 font-family: 'Roboto Condensed', sans-serif;
}
ul.sidebar-menu li.active a{
	background:#000 !important;
}
.card .body {
    font-size: 14px;
    color: #444;
    padding: 15px;
    font-weight: 400;
	 font-family: 'Roboto', sans-serif;
}
.card .st {
    color: #555;
    padding: 0 0 10px 0;
    position: relative;
    border-bottom: 1px solid rgba(204,204,204,0.8);
    box-shadow: none;
    margin-bottom: 0;
    border-radius: 0;
	
}

.card .st {
   
    margin: 15px;
    border-radius: 4px;
    padding: 15px 0;
    background-color: #fff;
}
.st h2{
	margin-top:0px;
	margin-bottom:0px;
}
.body .nav-tabs > li.active > a{
	border:0px;
	border-bottom:1px solid #f80909;
	color:#000;
}
.body .nav-tabs > li a{
	color:#999;
}
.body .form-horizontal .form-group{
	border-bottom:0px;
}
.body .form-control{
	border-radius:0px;
}
.body .form-horizontal .control-label{
	text-align:left;
}
.body .nav-tabs{
	margin-bottom:30px;
}
.body .addmore {
	padding: 0px;
    background: #09C;
    border-radius: 28%;
    color: #fff;
    font-size: 14px;
    width: 20px;
    right: 21px;
    border-radius: 314px;
    top: -5px;
    line-height: 20px;
    margin-top: 0px;
    height: 20px;
    cursor: pointer;
    /* text-align: center; */
}
.body .removemorehobbies{
	background:#f00;
	font-size:10px;
	line-height: 22px;
}
.body .remove_more{
	background:#f00;
	font-size:10px;
	line-height: 22px;
}
.hob{
	font-size:17px;
}


.timeline {
    border-left: 1px solid #dedede;
    font-size: 14px;
    position: relative;
}

 .body .timeline .timeline-item {
    margin-bottom: 20px;
    padding-bottom: 1px;
    position: relative;
}
.body  .timeline .timeline-item .item-content {
    margin-left: 24px;
    margin-top: 0;
}
.body   .timeline .timeline-item .item-content p {
    font-weight: 400;
    color: #444;
	padding-left:10px;
}
 .body  .timeline .timeline-item:after {
    background-color: #fff;
    border-color: inherit;
    border-radius: 50%;
    border-style: solid;
    border-width: 2px;
    content: "";
    height: 11px;
    left: 0;
    margin-left: -6px;
    position: absolute;
    width: 11px;
    bottom: auto;
    clear: both;
    top: 4px;
}
.body  .timeline .border-info {
    border-color: #5bc0de !important;
}
.body  .timeline .border-warning {
    border-color: #f0ad4e !important;
}
.body   .timeline .border-danger {
    border-color: #d9534f !important;
}
.body  .timeline .border-info {
    border-color: #5bc0de !important;
}

</style>

<link rel="stylesheet" href="resources/custom-assests/css/style.css" >
  </head>

  <body>
  <!-- container section start -->
  <section id="container" class="">
     
      
      <header class="header dark-bg">
            <div class="toggle-nav">
                <div class="icon-reorder tooltips" data-original-title="Toggle Navigation" data-placement="bottom"><i class="icon_menu"></i></div>
            </div>

            <!--logo start-->
            <a class="logo">Parent <span class="lite">Module</span></a>
            <!--logo end-->

            

            <div class="top-nav notification-row">                
                <!-- notificatoin dropdown start-->
                <ul class="nav pull-right top-menu">
                    
                    <li id="alert_notificatoin_bar" class="dropdown" title="Fee details">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">

                            <i class="fa fa-rupee"></i>

                        </a>
                        <ul class="dropdown-menu extended notification">
                            <div class="notify-arrow notify-arrow-blue"></div>
                            <li>
                                <p class="blue">Fees Details</p>
                            </li>
                            
                            
                            <li>
  									<a href="<?PHP echo base_url('parent/pay-fee')?>" class=""> 
                                    	<span class="label label-warning"><i class="fa fa-eye"></i></span>  Pay School Fee 
                                     </a>
                            </li>
                            
                            <li>
  									<a href="<?PHP echo base_url('parent/payment-history')?>" class=""> 
                                    	<span class="label label-warning"><i class="fa fa-eye"></i></span>  view fee payment history 
                                     </a>
                            </li>
                          
                           
                           
                        </ul>
                    </li>
                    
                    
                    
                    <li id="alert_notificatoin_bar" class="dropdown" title="Manage Transportation">
                        <a  class="dropdown-toggle view-trasp" style="cursor:pointer" data-toggle="modal" data-target="#view-trasp" >

                            <i class="fa fa-truck"></i>
                         </a>

                        
                    </li>
                    
                    
                     <li id="alert_notificatoin_bar" class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">

                           <i class="fa fa-comment"></i>
                            <span class="badge bg-important"><?PHP echo $New_Notifications?></span>
                        </a>
                        <ul class="dropdown-menu extended notification">
                            <div class="notify-arrow notify-arrow-blue"></div>
                            <li>
                                <p class="blue">You have <?PHP echo $New_Notifications?> new notifications</p>
                            </li>
                            
                            <?PHP
							if($New_Notifications>0)
							{
								
								
								$cond = array();
								$table ='notifications';
								
								$StudentId = $this->session->userdata('StudentId');
								$Status = 'Unread';
								
								$where = "StudentId=".$StudentId." AND status='".$Status."' AND (DATEDIFF(CURRENT_DATE(), DATE(AddedOn)) >= 2 OR DATEDIFF(CURRENT_DATE(), DATE(AddedOn)) >= 0)";
								
								$this->db->select('NotificationId,Notification, date_format(DATE(AddedOn),"%d-%m-%Y") as AddedOn');
								$this->db->from($table);
								$this->db->where($where);
								$TotalNotifications = $this->db->get();								
								
								foreach($TotalNotifications->result() as $notif)
								{
							?>
                           			 <li>
                                <a class="newnotifications" id="<?PHP echo $notif->NotificationId;?>">
                                    
                                    <?PHP echo substr($notif->Notification,0,23)."...";?>
                                    <span class="small italic pull-right"><?PHP echo $notif->AddedOn?></span>
                                </a>
                            </li>
                            
                            <?PHP
								}
								?>

								<li>
                               <!-- <a href="<?PHP echo base_url('view-admin-notifications'); ?>">See all notifications</a> -->
                               <a class="newnotifications" id="">See all notifications</a> 
                            </li>
								<?PHP
							}
							?>
                        </ul>
                    </li>  
                  
                    <!-- user login dropdown start-->
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="profile-ava">
                               <!-- <img alt="" src="resources/template-assets/img/avatar1_small.jpg">-->
                                <i class="fa fa-user"></i>
                            </span>
                            <span class="username">
							
							<?PHP 
							if( $this->session->userdata('parent')!='')
							{
								echo ucwords($this->session->userdata('parent'));
							}
							else
								echo ucwords($this->session->userdata('Student'));?>
                            </span>
                            <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu extended logout">
                            <div class="log-arrow-up"></div>
                            
                            <li class="eborder-top">
                                <a href="<?PHP echo base_url('parent-logout')?>"><i class="icon_profile"></i> Logout</a>
                            </li>
                        
                        
                        </ul>
                    </li>
                    <!-- user login dropdown end -->
                </ul>
                <!-- notificatoin dropdown end-->
            </div>
      </header>      
      <!--header end-->

      <!--sidebar start-->
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu">                
				  
                  <?PHP $uri_segm = $this->uri->segment(1); ?>
                  
                  <li class="sub-menu">

                      <a href="javascript:;" <?PHP if( $uri_segm== 'view-edit-profile'){  echo 'style=""';  }?>  >
                          <i class="icon_document_alt"></i>
                          <span>Manage Profile  </span>
                          <span class="menu-arrow  <?PHP if(  $uri_segm== 'view-edit-profile' ){ echo 'arrow_carrot-down'; }else echo 'arrow_carrot-right'; ?>"></span>
                      </a>
                      <ul class="sub"  <?PHP if( $uri_segm== 'view-edit-profile' ){  echo 'style="overflow: hidden; display: block;"'; } ?> >
		<li><a class="" href="view-edit-profile" <?PHP if( $uri_segm== 'view-edit-profile' ){ echo 'style=""';  } ?> >View profile</a></li>
                      </ul>
                  </li>
                  
                  
                  
                  
                  <li class="sub-menu">

                      <a href="javascript:;" <?PHP if( $uri_segm== 'view-edit-child-profile'){  echo 'style=""';  }?>  >
                          <i class="icon_document_alt"></i>
                          <span>Child Profile  </span>
                          <span class="menu-arrow  <?PHP if(  $uri_segm== 'view-edit-child-profile' ){ echo 'arrow_carrot-down'; }else echo 'arrow_carrot-right'; ?>"></span>
                      </a>
                      <ul class="sub"  <?PHP if( $uri_segm== 'view-edit-child-profile' ){  echo 'style="overflow: hidden; display: block;"'; } ?> >
		<li><a class="" href="view-edit-child-profile" <?PHP if( $uri_segm== 'view-edit-child-profile' ){ echo 'style=""';  } ?> >View profile</a></li>
                      </ul>
                  </li>
                  
                  
                  <li class="sub-menu">

                      <a href="javascript:;" <?PHP if( $uri_segm== 'view-admin-notifications' || $uri_segm == "add-notification" ){  echo 'style=""';  }?> class="active"  >
                          <i class="icon_document_alt"></i>
                          <span>Notifications  </span>
                          <span class="menu-arrow  <?PHP if(  $uri_segm== 'view-admin-notifications' ){ echo 'arrow_carrot-down'; }else echo 'arrow_carrot-right'; ?>"></span>
                      </a>
                      <ul class="sub"  <?PHP if( $uri_segm == 'view-admin-notifications' || $uri_segm == "add-notification" ){  echo 'style="overflow: hidden; display: block;"'; } ?> >
		<li><a class="" href="view-admin-notifications" <?PHP if( $uri_segm == 'view-admin-notifications' ){ echo 'style=""';  } ?> >View admin notifications</a></li>
        <li><a href="<?PHP echo base_url('add-notification')?>" <?PHP if( $uri_segm== 'add-notification' ){echo 'style=""'; } ?> >Add Notification</a> </li>
                      </ul>
                  </li>
                  
                  <li class="sub-menu">

                      <a href="javascript:;" <?PHP if( $uri_segm== 'view-student-activity-details' ){  echo 'style=""';  }?>  >
                          <i class="icon_document_alt"></i>
                          <span>Event details  </span>
                          <span class="menu-arrow  <?PHP if(  $uri_segm== 'view-student-activity-details' ){ echo 'arrow_carrot-down'; }else echo 'arrow_carrot-right'; ?>"></span>
                      </a>
                      <ul class="sub"  <?PHP if( $uri_segm == 'view-student-activity-details' ){  echo 'style="overflow: hidden; display: block;"'; } ?> >
        <li><a href="<?PHP echo base_url('view-student-activity-details')?>" <?PHP if( $uri_segm== 'view-student-activity-details' ){echo 'style=""'; } ?> >view event details</a> </li>
                      </ul>
                  </li>
                  
                  <li class="sub-menu">

                      <a href="javascript:;" <?PHP if( $uri_segm== 'student-home-works' ){  echo 'style=""';  }?>  >
                          <i class="icon_document_alt"></i>
                          <span>Home works  </span>
                          <span class="menu-arrow  <?PHP if(  $uri_segm== 'student-home-works' ){ echo 'arrow_carrot-down'; }else echo 'arrow_carrot-right'; ?>"></span>
                      </a>
                      <ul class="sub"  <?PHP if( $uri_segm == 'student-home-works' ){  echo 'style="overflow: hidden; display: block;"'; } ?> >
        <li><a href="<?PHP echo base_url('student-home-works')?>" <?PHP if( $uri_segm== 'student-home-works' ){echo 'style=""'; } ?> >view homeworks</a> </li>
                      </ul>
                  </li>
                  
                  <li class="sub-menu">

                      <a href="javascript:;" <?PHP if( $uri_segm== 'view-exam-schedules' ){  echo 'style=""';  }?>  >
                          <i class="icon_document_alt"></i>
                          <span>Exam Schedules </span>
                          <span class="menu-arrow  <?PHP if(  $uri_segm== 'view-exam-schedules' ){ echo 'arrow_carrot-down'; }else echo 'arrow_carrot-right'; ?>"></span>
                      </a>
                      <ul class="sub"  <?PHP if( $uri_segm == 'view-exam-schedules' ){  echo 'style="overflow: hidden; display: block;"'; } ?> >
        <li><a href="<?PHP echo base_url('view-exam-schedules')?>" <?PHP if( $uri_segm== 'view-exam-schedules' ){echo 'style=""'; } ?> >view exam schedules</a> </li>
                      </ul>
                  </li>
                  
                  
                  <li class="sub-menu">

                      <a href="javascript:;" <?PHP if( $uri_segm== 'view-events' ){  echo 'style=""';  }?>  >
                          <i class="icon_document_alt"></i>
                          <span>Holidays List </span>
                          <span class="menu-arrow  <?PHP if(  $uri_segm== 'view-events' ){ echo 'arrow_carrot-down'; }else echo 'arrow_carrot-right'; ?>"></span>
                      </a>
                      <ul class="sub"  <?PHP if( $uri_segm == 'view-events' ){  echo 'style="overflow: hidden; display: block;"'; } ?> >
       <!--  <li><a href="<?PHP echo base_url('view-events')?>" <?PHP if( $uri_segm== 'view-events' ){echo 'style=""'; } ?> >view celebrations</a> </li> -->
       <li><a style="cursor:pointer" >view holidays</a> </li>
                      </ul>
                  </li>
                  

                  
              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
      <!--sidebar end-->
<div id="transportdetails"  class="modal fade disableclick" role="dialog" >
  <div class="modal-dialog" style="width:700px;">

    <!-- Modal content-->
    <div class="modal-content">
      <!--<div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Modal Header</h4>
      </div>-->
      <div class="modal-body" style="    padding: 24px 15px;    border: 7px solid #ddd; ">
        <p style="font-size: 19px;text-transform: uppercase;margin-bottom: 19px;" class="pre_abs_msg">Transport Details</p>
        
        <table class="table-stripped table  viewroute">
        
        
        
        </table>
        
        <!--  <button type="button" class="btn btn-success yesPresent" data-dismiss="modal">Yes</button>-->
          <button type="button" class="btn btn-danger  cancelPresent pull-right" data-dismiss="modal">Cancel</button>
             <div class="clearfix"></div>
      </div>
   
    
    </div>

  </div>
</div>