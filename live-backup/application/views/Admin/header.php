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

    <title>Adi Aksahara</title>

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
        <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i" rel="stylesheet">

    <!-- =======================================================
        Theme Name: NiceAdmin
        Theme URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
        Author: BootstrapMade
        Author URL: https://bootstrapmade.com
    ======================================================= -->
    
        <link rel="stylesheet" href="resources/custom-assests/css/jquery-ui.css" />
<link rel="stylesheet" href="resources/custom-assests/css/jquery.timepicker.css" />
<style>
.dashboard-heading {
    font-size: 50px;
    margin: 0;
}
dashboard-text {
    margin: 10px 0 0 0;
    font-size: 21px;
}
.card.dashb{
	height:130px !important;
}
.panel.innerpan{
	    margin-bottom: 0px;
    border: none;
    box-shadow: none;
}
/*.dashboard-heading{
	color: #000;
    font-family: 'Roboto Condensed', sans-serif;
    margin-bottom: 10px;
    text-align: right;
}*/
.feepay label, .feepay{
	 font-family: 'Roboto Condensed', sans-serif;
	 font-size:15px;
}
.feepay label{
	padding-left:0px;
}
.mdl-header{
	color:#2f9429 !important;
	 font-family: 'Roboto Condensed', sans-serif;
	 font-size:1px;
}
.dashboard-heading{
	color: #f7a35c;
	 font-family: 'Roboto Condensed', sans-serif;
    margin-bottom: 10px;
    text-align: right;
}
.dashboard-heading1{
	color: #f15c80;
	 font-family: 'Roboto Condensed', sans-serif;
    margin-bottom: 10px;
    text-align: right;
	font-size: 50px;
}
.dashboard-heading2{
	color: #e4d354;
	 font-family: 'Roboto Condensed', sans-serif;
    margin-bottom: 10px;
    text-align: right;
	font-size: 50px;
}
.dashboard-heading3{
	color: #2b908f;
	font-family: 'Roboto Condensed', sans-serif;
    margin-bottom: 10px;
    text-align: right;
	font-size: 50px;
}
.ic i{
	color:#f7a35c;
	margin-bottom:10px;
	 
}
.ic1 i{
	color:#f15c80;
	margin-bottom:10px;
	 
}
.ic2 i{
	color:#e4d354;
	margin-bottom:10px;
	 
}
.ic3 i{
	color:#2b908f;
	margin-bottom:10px;
	 
}
.dashboard-text{
     font-family: 'Roboto Condensed', sans-serif;
    font-size: 16px;
    color: #434348;
  
}
.dashb h2{
    margin: 0;
    font-size: 21px;
    padding-bottom: 12px;
    margin-bottom: 15px;
    font-weight: normal;
    border-bottom: 1px solid #ddd;
    font-family: 'Roboto Condensed', sans-serif;
    color: #555;
    text-transform: uppercase;
}
.dashb{
padding:15px;
}
.nobo{
	border:none !important;
	padding-top:0px;
	padding-bottom:0px;
}
.card.dashb.att{
	height:auto !important;
}

.card:hover {
    box-shadow: 0 1px 5px 1px rgba(0,0,0,0.14), 0 3px 14px 2px rgba(0,0,0,0.12), 0 5px 5px -3px rgba(0,0,0,0.2);
    transition: all 150ms linear;
}

.card {
    background: #fff;
    min-height: 50px;
    box-shadow: none;
    position: relative;
    margin-bottom: 20px;
    transition: .5s;
    border: 1px solid #c7c7c7;
    border-radius: 0px !important;
	height: 222px;
}

.card {
    display: inline-block;
    position: relative;
    width: 100%;
    border-radius: 4px;
    color: rgba(0,0,0, 0.87);
    background: #fff;
  /*  box-shadow: 0 2px 2px 0 rgba(0,0,0,0.14), 0 3px 1px -2px rgba(0,0,0,0.2), 0 1px 5px 0 rgba(0,0,0,0.12);*/
}
.atte h1 span{
	font-size: 15px;
    color: #666;
    font-weight: bold;
    margin-right: 100px;
    margin-top: 4px;
    /* margin-left: -20px; */
    float: right;
    text-align: right;
	margin-bottom:20px;
}

.card .body {
    font-size: 14px;
    color: #444;
    padding: 15px;
    font-weight: 400;
}
.member-card {
    text-align: center;
}
.member-card .member-thumb {
    position: relative;
    display: inline-block;
}

.member-card.verified .member-thumb img {
    border: 1px solid #5cb85c;
	width:100px;
}
.text-muted {
    color: #777;
}
.member-card .member-thumb img {
    padding: 4px;
    border: 1px solid #ccc;
}
.member-card h4{
	font-family: 'Roboto', sans-serif;
    font-size: 14px;
    text-transform: uppercase;
    color: #555;
    font-weight: 500;
	
}
.member-card p{
	color:#ff6529;
	font-family: 'Roboto', sans-serif;
	font-size:14px;
	
}

.member-card.verified .member-thumb p {
    color: #fff;
	    line-height: 32px;
		font-weight:bold;
		font-family: 'Roboto', sans-serif;
}

.member-card .member-thumb p {
    position: absolute;
   bottom: -5px;
    right: 7px;
}

.zmdi {
    display: inline-block;
    font: normal normal normal 14px/1 'Material-Design-Iconic-Font';
    font-size: 18px;
    text-rendering: auto;
    -webkit-font-smoothing: antialiased;
  
	    height: 28px;
		line-height:28px !important;
    border-radius: 300px;
    width: 28px;
    background: #5cb85c !important;
	
    text-rendering: auto;
    -webkit-font-smoothing: antialiased;
}
.zmdi:hover, .zmdi.dan:hover{
	cursor:pointer;
}

.zmdi.dan {
    display: inline-block;
   
    font-size: 14px;
    text-rendering: auto;
    -webkit-font-smoothing: antialiased;
	line-height:28px !important;
  
	    height: 28px;
    border-radius: 300px;
    width: 28px;
    background: #f00 !important;
    text-rendering: auto;
    -webkit-font-smoothing: antialiased;
}
.atte h1{
	font-size: 30px;
    font-family: 'Roboto Condensed', sans-serif;
    color: #ff7700;
    text-transform: uppercase;
    padding-bottom: 20px;
    margin-top: 15px;
}
.cla{
	display: inline-block;
    text-align: right;
	   font-family: 'Roboto Condensed', sans-serif;
  
    margin-right: 20px;
}
.cla.mr1{
	margin-right:0pc;
}
.cla select{
	    width: 236px;
    border-radius: 0px !important;
    margin-top: 25px;
	
}
.cla .form-control{
	
	border-radius:0px !important;
	    border: 1px solid #ee7f07;
    color: #000;
	
}
.absenteelist{
	padding-left:15px;
}
.absenteelist li{
	    padding-bottom: 9px;
    border-bottom: 1px solid #e2e1e1;
    margin-bottom: 11px;
}
.confirm-list{
	margin-top: 0px;
    text-transform: uppercase;
    margin-bottom: 22px;
    font-size: 17px;
    font-weight: bold;
}
.card .headertop {
    color: #555;
    padding: 0 0 10px 0;
    position: relative;
    border-bottom: 1px solid rgba(204,204,204,0.8);
    box-shadow: none;
    margin-bottom: 0;
    border-radius: 0;
	    margin: 15px;
}
.card .headertop h2 {
    margin: 0;
    font-size: 21px;
    font-weight: normal;
	 font-family: 'Roboto Condensed', sans-serif;
    color: #555;
    text-transform: uppercase;
}
.card .headertop .header-dropdown {
    position: absolute;
    top: 3px;
    right: 5px;
    list-style: none;
    margin: 0;
    padding: 0;
}
.card .headertop .header-dropdown .dropdown-menu li {
    display: block !important;
}


.card .headertop .header-dropdown li {
    display: inline-block;
}
.card .headertop .header-dropdown a {
    padding: 5px 10px;
}

.dropdown-menu.pull-right {
    right: 0;
    left: auto;
}

.dropdown-menu {
    -webkit-border-radius: 0;
    -moz-border-radius: 0;
    -ms-border-radius: 0;
    border-radius: 0;
    margin-top: -35px !important;
    box-shadow: 0 2px 10px rgba(0,0,0,0.2);
    border: none;
}

.pull-right {
    float: right !important;
}

.dropdown-menu {
    position: absolute;
    top: 100%;
    left: 0;
    z-index: 1000;
    display: none;
    float: left;
    min-width: 160px;
    padding: 5px 0;
    margin: 2px 0 0;
    list-style: none;
    font-size: 14px;
    text-align: left;
    background-color: #fff;
    border: 1px solid #ccc;
    border: 1px solid rgba(0,0,0,0.15);
    border-radius: 4px;
    -webkit-box-shadow: 0 6px 12px rgba(0,0,0,0.175);
    box-shadow: 0 6px 12px rgba(0,0,0,0.175);
    background-clip: padding-box;
}

.card .header .header-dropdown a {
    padding: 5px 10px;
}

.dropdown-menu>li>a {
    padding: 7px 18px;
    color: #666;
    -moz-transition: all 0.5s;
    -o-transition: all 0.5s;
    -webkit-transition: all 0.5s;
    transition: all 0.5s;
    font-size: 14px;
    line-height: 25px;
}

.dropdown-menu>li>a {
    display: block;
    padding: 3px 20px;
    clear: both;
    font-weight: normal;
    line-height: 1.428571429;
    color: #333;
    white-space: nowrap;
}

.waves-block {
    display: block;
}

.waves-effect {
    position: relative;
    cursor: pointer;
    display: inline-block;
    overflow: hidden;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    -webkit-tap-highlight-color: transparent;
}

[role="button"] {
    cursor: pointer;
}

.dropup, .dropdown {
    position: relative;
}

.card [class*="header-"] {
    color: #FFFFFF;
}

.m-r--5 {
    margin-right: -5px;
}
.card.tab{
	height:auto !important;
}
/*.card .body {
    font-size: 14px;
    color: #444;
    padding: 15px;
    font-weight: 400;
}*/


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
.basic-list {
    padding: 0;
    margin: 0;
}
.basic-list li {
    display: block;
    padding: 15px 0px;
    border-bottom: 1px solid rgba(120,130,140,0.13);
    line-height: 27px;
}
.label.label-danger {
    background-color: #d9534f;
}

.label-danger {
    background-color: #fb483a;
}
.label, .label.label-default {
    background-color: #9e9e9e;
}
.label.label-success {
    background-color: #5cb85c;
}
.label-success {
    background-color: #2b982b;
}
.label.label-info {
    background-color: #5bc0de;
}

.label-info {
    background-color: #00b0e4;
}
.label.label-warning {
    background-color: #f0ad4e;
}

.label-warning {
    background-color: #ff9600;
}
.label.label-success {
    background-color: #5cb85c;
}

.label-success {
    background-color: #2b982b;
}

#addfeestrucutre label{
	text-align:left;
}
.addfee{
	border:1px solid #ddd;
	margin-bottom:30px;
}
.addfee th{
	    background: #584128 !important;
    color: #fff;
    padding: 13px 10px !important;
	 font-family: 'Roboto Condensed', sans-serif;
	 font-size:15px;
	 text-transform:uppercase;
	 font-weight:normal;
	 text-align:center;
}
.cla .fe{
	width:128px;
}

.addfee td{
	 padding: 13px 10px !important;
	 font-family: 'Roboto', sans-serif;
	 font-size:15px;
	 text-align:center;
	
	 font-weight:normal;
}
.addfee td a{
	background:#f58b20;
	padding:3px 10px;
	color:#fff;
	border-radius:2px;
}
.addfee td a:hover{
	background:#1a9e4a;
}
.addfee td .paid:hover{
	background:#f58b20;
}
.addfee td .paid{
	background:#1a9e4a;
	padding:3px 10px;
	border-radius:2px;
	color:#fff;
}
.padd{
	padding:0px;
}

.modal
{
    overflow: hidden;
}


.clearfilter
{
	cursor:pointer;
}


.clearfilter:hover
{
	cursor:pointer;
	color:#F00;
}

.alert-success {
    background-color: #a2794c !important;
    border-color: #a2794c !important;
    color: #ffffff !important;
    border-radius: 5px !important;
}
	
</style>
  </head>

  <body>
  <!-- container section start -->
  <section id="container" class="">
     
      
      <header class="header dark-bg">
           
             <!--<div class="toggle-nav" style="background:none;">
             <div class="icon-reorder tooltips" data-original-title="Toggle Navigation" data-placement="bottom"><i class="icon_menu"></i></div>
                
              
            </div>-->

            <!--logo start-->
            <a class="logo" style=" margin-top:2px;"  >   <img src="resources/index-page/images/logo.png" style="width:65px;float:left;background: #fff;padding: 7px;border-radius: 50%; margin-right: 10px;     box-shadow: 0 1px 5px 1px rgba(0,0,0,0.14), 0 3px 14px 2px rgba(0,0,0,0.12), 0 5px 5px -3px rgba(0,0,0,0.2);" /><div style="width:500px; padding-top:12px;" class="img-circle" > School <span class="lite">Application</span></div></a>
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
                            
                            <a href="<?PHP echo base_url('view-students-fee-details')?>" class="">
                                    <span class="label label-warning"><i class="fa fa-eye"></i></span>  
                                    view fees details
                                   
                                </a>
                                
                                
                                
                            </li>
                          
                           
                           
                        </ul>
                    </li>
                     
                    
                    
                     <li id="alert_notificatoin_bar" class="dropdown" title="Manage Transportation">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">

                            <i class="fa fa-truck"></i>

                        </a>
                        <ul class="dropdown-menu extended notification">
                            <div class="notify-arrow notify-arrow-blue"></div>
                            <li>
                                <p class="blue">Manage Transportation</p>
                            </li>
                            
                            
                            <li>
                                <a href="<?PHP echo base_url('add-route')?>">
                                    <span class="label label-primary"><i class="fa fa-plus"></i></span> 
                                   Add route
                                   
                                </a>
                            </li>
                            
                            <li>
                                <a href="<?PHP echo base_url('add-vehicle')?>">
                                    <span class="label label-primary"><i class="fa fa-plus"></i></span> 
                                   Add vechile
                                   
                                </a>
                            </li>
                            
                            <li>
                                <a href="<?PHP echo base_url('view-vehicles')?>">
                                    <span class="label label-warning"><i class="fa fa-eye"></i></span>  
                                    view vechiles
                                   
                                </a>
                            </li>
                            
                            <li>
                                <a href="<?PHP echo base_url('add-student-to-transport')?>">
                                    <span class="label label-primary"><i class="fa fa-plus"></i></span> 
                                   Add Student To Transport
                                   
                                </a>
                            </li>
                           
                           
                        </ul>
                    </li>
                     
                     <li id="alert_notificatoin_bar" class="dropdown" title='Manage non-teaching departments'>
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">

                            <i class="fa fa-plus"></i>

                        </a>
                        <ul class="dropdown-menu extended notification">
                            <div class="notify-arrow notify-arrow-blue"></div>
                            <li>
                                <p class="blue">Manage non-teaching departments</p>
                            </li>
                            <li>
                                <a href="<?PHP echo base_url('add-department')?>">
                                    <span class="label label-primary"><i class="fa fa-plus"></i></span> 
                                   Add department
                                   
                                </a>
                            </li>
                            <li>
                                <a href="<?PHP echo base_url('view-departments')?>">
                                    <span class="label label-warning"><i class="fa fa-eye"></i></span>  
                                    view departments
                                   
                                </a>
                            </li>
                        </ul>
                    </li>
                     
                     <li id="alert_notificatoin_bar" class="dropdown" title='Manage Exams'>
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">

                            <i class="fa fa-bars"></i>

                        </a>
                        <ul class="dropdown-menu extended notification">
                            <div class="notify-arrow notify-arrow-blue"></div>
                            <li>
                                <p class="blue">Manage Exams</p>
                            </li>
                            <li>
                                <a href="<?PHP echo base_url('add-exam')?>">
                                    <span class="label label-primary"><i class="fa fa-plus"></i></span> 
                                   Add exam
                                   
                                </a>
                            </li>
                            <li>
                                <a href="<?PHP echo base_url('view-exams')?>">
                                    <span class="label label-warning"><i class="fa fa-eye"></i></span>  
                                    view notifications
                                   
                                </a>
                            </li>
                        </ul>
                    </li>
                    
                 	 <li id="alert_notificatoin_bar" class="dropdown" title='Manage notifications'>
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">

                            <i class="fa fa-comment"></i>

                        </a>
                        <ul class="dropdown-menu extended notification">
                            <div class="notify-arrow notify-arrow-blue"></div>
                            <li>
                                <p class="blue">Manage notifications</p>
                            </li>
                            <li>
                                <a href="<?PHP echo base_url('add-notification-to-student')?>">
                                    <span class="label label-primary"><i class="fa fa-plus"></i></span> 
                                   Add notification
                                   
                                </a>
                            </li>
                            <li>
                                <a href="<?PHP echo base_url('view-notification-to-student')?>">
                                    <span class="label label-warning"><i class="fa fa-eye"></i></span>  
                                    view notifications
                                   
                                </a>
                            </li>
                        </ul>
                    </li>
                  
                   <li id="alert_notificatoin_bar" class="dropdown" title='Manage non teaching staff'>
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">

                            <i class="fa fa-users"></i>

                        </a>
                        <ul class="dropdown-menu extended notification">
                            <div class="notify-arrow notify-arrow-blue"></div>
                            <li>
                                <p class="blue">Manage non teaching staff</p>
                            </li>
                            <li>
                                <a href="<?PHP echo base_url('add-nonteaching-staff')?>">
                                    <span class="label label-primary"><i class="fa fa-plus"></i></span> 
                                   Add non teaching staff
                                   
                                </a>
                            </li>
                            <li>
                                <a href="<?PHP echo base_url('view-nonteaching-staff')?>">
                                    <span class="label label-warning"><i class="fa fa-eye"></i></span>  
                                    View non teaching staff
                                   
                                </a>
                            </li>
                            
                            <li>
                                <a href="<?PHP echo base_url('add-nonteaching-staff-details')?>">
                                    <span class="label label-warning"><i class="fa fa-eye"></i></span>  
                                    add non teaching staff details
                                   
                                </a>
                            </li>
                            
                            
                            <li>
                                <a href="<?PHP echo base_url('view-nonteaching-staff-details')?>">
                                    <span class="label label-warning"><i class="fa fa-eye"></i></span>  
                                    View non teaching staff details
                                   
                                </a>
                            </li>
                            
                        </ul>
                    </li>
                    
                   <li id="alert_notificatoin_bar" class="dropdown" title='Manage salaries'>
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">

                            <i class="fa fa-money"></i>

                        </a>
                        <ul class="dropdown-menu extended notification">
                            <div class="notify-arrow notify-arrow-blue"></div>
                            <li>
                                <p class="blue">Manage salaries</p>
                            </li>
                            <li>
                                <a href="<?PHP echo base_url('add-salary')?>">
                                    <span class="label label-primary"><i class="fa fa-plus"></i></span> 
                                   Add salaries
                                   
                                </a>
                            </li>
                            <li>
                                <a href="<?PHP echo base_url('view-salaries')?>">
                                    <span class="label label-warning"><i class="fa fa-eye"></i></span>  
                                    View salaries
                                   
                                </a>
                            </li>
                        </ul>
                    </li>
                    
                    <li id="alert_notificatoin_bar" class="dropdown" title='Manage bills'>
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">

                            <i class="fa fa-mobile"></i>

                        </a>
                        <ul class="dropdown-menu extended notification">
                            <div class="notify-arrow notify-arrow-blue"></div>
                            <li>
                                <p class="blue">Manage bills</p>
                            </li>
                            <li>
                                <a href="<?PHP echo base_url('add-bill')?>">
                                    <span class="label label-primary"><i class="fa fa-plus"></i></span> 
                                   Add bill
                                   
                                </a>
                            </li>
                            <li>
                                <a href="<?PHP echo base_url('view-bills')?>">
                                    <span class="label label-warning"><i class="fa fa-eye"></i></span>  
                                    View bills
                                   
                                </a>
                            </li>
                        </ul>
                    </li>
                    
                    <li id="alert_notificatoin_bar" class="dropdown" title='Manage Vendors'>
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">

                            <i class="fa fa-cube"></i>

                        </a>
                        <ul class="dropdown-menu extended notification">
                            <div class="notify-arrow notify-arrow-blue"></div>
                            <li>
                                <p class="blue">Manage Vendors</p>
                            </li>
                            <li>
                                <a href="<?PHP echo base_url('add-vendor')?>">
                                    <span class="label label-primary"><i class="fa fa-plus"></i></span> 
                                   Add vendor
                                   
                                </a>
                            </li>
                            <li>
                                <a href="<?PHP echo base_url('view-vendors')?>">
                                    <span class="label label-warning"><i class="fa fa-eye"></i></span>  
                                    View vendors
                                   
                                </a>
                            </li>
                        </ul>
                    </li>
                    
                    <!-- alert notification end-->
                    <!-- user login dropdown start-->
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="profile-ava">
                               <!-- <img alt="" src="resources/template-assets/img/avatar1_small.jpg">-->
                                <i class="fa fa-user"></i>
                            </span>
                            <span class="username"><?PHP echo ucwords($this->session->userdata('Admin'));?></span>
                            <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu extended logout">
                            <div class="log-arrow-up"></div>
                            
                            <li class="eborder-top">
                                <a href="<?PHP echo base_url('logout')?>"><i class="icon_profile"></i> Logout</a>
                            </li>
                            <!-- 
                            <li class="eborder-top">
                                <a href="#"><i class="icon_profile"></i> My Profile</a>
                            </li>
                            <li>
                                <a href="#"><i class="icon_mail_alt"></i> My Inbox</a>
                            </li>
                            <li>
                                <a href="#"><i class="icon_clock_alt"></i> Timeline</a>
                            </li>
                            <li>
                                <a href="#"><i class="icon_chat_alt"></i> Chats</a>
                            </li>
                            <li>
                                <a href="login.html"><i class="icon_key_alt"></i> Log Out</a>
                            </li>
                            <li>
                                <a href="documentation.html"><i class="icon_key_alt"></i> Documentation</a>
                            </li>
                            <li>
                                <a href="documentation.html"><i class="icon_key_alt"></i> Documentation</a>
                            </li> -->
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
                  
                  <li class="menu">

                      <a href="<?PHP echo base_url('dashboard'); ?>" <?PHP if( $uri_segm== 'dashboard'){  echo 'class=active';  }?>  >
                          <i class="fa fa-desktop"></i>
                          <span>Dashboard </span>
                         
                      </a>
                      
                      
                  </li>
                  
                  
                  <li class="sub-menu">

                      <a href="javascript:;" <?PHP if( $uri_segm== 'add-class' ||  $uri_segm== 'view-classes' || $uri_segm== 'edit-class'){  echo 'class=active';  }?>  >
                          <i class="icon_document_alt"></i>
                          <span>Manage Classes </span>
                          <span class="menu-arrow  <?PHP if( $uri_segm== 'add-class' ||  $uri_segm== 'view-classes' || $uri_segm== 'edit-class'){ echo 'arrow_carrot-down'; }else echo 'arrow_carrot-right'; ?>"></span>
                      </a>
                      <ul class="sub"  <?PHP if( $uri_segm== 'add-class' ||  $uri_segm== 'view-classes' || $uri_segm== 'edit-class'){  echo 'style="overflow: hidden; display: block;"'; } ?> >
		<li><a class="" href="add-class" <?PHP if( $uri_segm== 'add-class' ){ echo 'class=active';  } ?> >Add class </a></li>
        <li><a class="" href="view-classes" <?PHP if( $uri_segm== 'view-classes' ){ echo 'class=active';  } ?>>View classes</a></li>
                          
                      </ul>
                  </li>
                  
                  
                  <li class="sub-menu">
                  
                  
                  
                      <a href="javascript:;" <?PHP if( $uri_segm== 'add-section' ||  $uri_segm== 'view-sections' || $uri_segm== 'edit-section' ){  echo 'class=active';  }?>  >
                          <i class="icon_document_alt"></i>
                          <span>Manage Section </span>
                          <span class="menu-arrow  <?PHP if( $uri_segm== 'add-section' ||  $uri_segm== 'view-sections' || $uri_segm== 'edit-section' ){ echo 'arrow_carrot-down'; }else echo 'arrow_carrot-right'; ?>"></span>
                      </a>
                      <ul class="sub"  <?PHP if( $uri_segm== 'add-section' ||  $uri_segm== 'view-sections' || $uri_segm== 'edit-section' ){  echo 'style="overflow: hidden; display: block;"'; } ?> >
	
    <li><a class="" href="add-section" <?PHP if( $uri_segm== 'add-section' ){ echo 'class=active';  } ?> >Add section </a></li>
	<li><a class="" href="view-sections" <?PHP if( $uri_segm== 'view-sections' || $uri_segm=='edit-section' ){ echo 'class=active';  } ?>>View sections</a></li>
                          
                          
                      </ul>
                  </li>
                  
                  <li class="sub-menu">
                  
                  
                  
                      <a href="javascript:;" <?PHP if( $uri_segm== 'add-subjects' ||  $uri_segm== 'view-subjects' || $uri_segm== 'edit-subject' || $uri_segm== 'assign-subject-class' || $uri_segm== 'view-assigned-subjects' || $uri_segm=='edit-assigned-subject-class'  ){  echo  'class=active';  }?>  >
                          <i class="icon_document_alt"></i>
                          <span>Manage Subjects </span>
                          <span class="menu-arrow  <?PHP if( $uri_segm== 'add-subjects' ||  $uri_segm== 'view-subjects' || $uri_segm== 'edit-subject' ||  $uri_segm== 'assign-subject-class' || $uri_segm=='edit-assigned-subject-class' || $uri_segm== 'view-assigned-subjects' ){ echo 'arrow_carrot-down'; }else echo 'arrow_carrot-right'; ?>"></span>
                      </a>
                      <ul class="sub"  <?PHP if( $uri_segm== 'add-subjects' ||  $uri_segm== 'view-subjects' || $uri_segm== 'edit-subject' || $uri_segm== 'assign-subject-class' || $uri_segm=='edit-assigned-subject-class' || $uri_segm== 'view-assigned-subjects'  ){  echo 'style="overflow: hidden; display: block;"'; } ?> >
	
    <li><a class="" href="add-subjects" <?PHP if( $uri_segm== 'add-subjects' ){ echo 'class=active';  } ?> >Add subject </a></li>
	<li><a class="" href="view-subjects" <?PHP if( $uri_segm== 'view-subjects' || $uri_segm=='edit-subject' ){ echo 'class=active';  } ?>>View subjects</a></li>
    
    <li><a class="" href="assign-subject-class" <?PHP if( $uri_segm== 'assign-subject-class'){ echo 'class=active';  } ?>>Assign class subjects</a></li>
    
     <li><a class="" href="view-assigned-subjects" <?PHP if( $uri_segm== 'view-assigned-subjects' || $uri_segm=='edit-assigned-subject-class' ){ echo 'class=active';  } ?>>View assigned subjects</a></li>
                          
                          
                      </ul>
                  </li>
                  
                  
                  
                  
                  
                  <li class="sub-menu">
                  
                  <a href="javascript:;" <?PHP if( $uri_segm== 'add-teacher' ||  $uri_segm== 'view-teachers' || $uri_segm== 'edit-teacher' || $uri_segm== 'assign-teacher' ||  $uri_segm== 'view-assign-teachers' || $uri_segm== 'edit-assigned-teacher' ){  echo 'class=active';  }?>  >
                          <i class="icon_document_alt"></i>
                          <span>Manage Teacher </span>
                          <span class="menu-arrow  <?PHP if( $uri_segm== 'add-teacher' ||  $uri_segm== 'view-teachers' || $uri_segm== 'edit-teacher' || $uri_segm== 'assign-teacher' ||  $uri_segm== 'view-assign-teachers' || $uri_segm== 'edit-assigned-teacher' ){ echo 'arrow_carrot-down'; }else echo 'arrow_carrot-right'; ?>"></span>
                      </a>
                      <ul class="sub"  <?PHP if( $uri_segm== 'add-teacher' ||  $uri_segm== 'view-teachers' || $uri_segm== 'edit-teacher' || $uri_segm== 'assign-teacher' ||  $uri_segm== 'view-assign-teachers' || $uri_segm== 'edit-assigned-teacher' ){  echo 'style="overflow: hidden; display: block;"'; } ?> >
	
    <li><a class="" href="add-teacher" <?PHP if( $uri_segm== 'add-teacher' ){ echo 'class=active';  } ?> >Add Teacher </a></li>
	<li><a class="" href="view-teachers" <?PHP if( $uri_segm== 'view-teachers' || $uri_segm=='edit-teacher' ){ echo 'class=active';  } ?>>View teacher</a></li>
    
    <li><a class="" href="assign-teacher" <?PHP if( $uri_segm== 'assign-teacher' ){ echo 'class=active';  } ?> >Assign Teacher </a></li>
	<li><a class="" href="view-assign-teachers" <?PHP if( $uri_segm== 'view-assign-teachers' || $uri_segm=='edit-assigned-teacher' ){ echo 'class=active';  } ?>>View assigned teachers</a></li>
                          
                          
                      </ul>
                  </li>
                  
                  <li class="sub-menu">
                  
                  
                  
                      <a href="javascript:;" <?PHP if( $uri_segm== 'add-student' ||  $uri_segm== 'view-students' || $uri_segm== 'edit-student' ){  echo 'class=active';  }?>  >
                          <i class="icon_document_alt"></i>
                          <span>Manage Student </span>
                          <span class="menu-arrow  <?PHP if( $uri_segm== 'add-student' ||  $uri_segm== 'view-students' || $uri_segm== 'edit-student' ){ echo 'arrow_carrot-down'; }else echo 'arrow_carrot-right'; ?>"></span>
                      </a>
                      <ul class="sub"  <?PHP if( $uri_segm== 'add-student' ||  $uri_segm== 'view-students' || $uri_segm== 'edit-student' ){  echo 'style="overflow: hidden; display: block;"'; } ?> >
	
    <li><a class="" href="add-student" <?PHP if( $uri_segm== 'add-student' ){ echo 'class=active';  } ?> >Add student </a></li>
	<li><a class="" href="view-students" <?PHP if( $uri_segm== 'view-students' || $uri_segm=='edit-student' ){ echo 'style="background:#24303b"';  } ?>>View students</a></li>
                          
                          
                      </ul>
                  </li>
                  
                  <li class="sub-menu">
                  
                  
                  
                      <a href="javascript:;" <?PHP if( $uri_segm== 'add-fee-structure' || $uri_segm== 'pay-fee'||  $uri_segm== 'view-fee-structure' || $uri_segm== 'edit-fee-structure' ){  echo 'class=active';  }?>  >
                          <i class="icon_document_alt"></i>
                          <span>Manage Fee </span>
                          <span class="menu-arrow  <?PHP if( $uri_segm== 'add-fee-structure' || $uri_segm== 'pay-fee' || $uri_segm== 'view-fee-structure' || $uri_segm== 'edit-fee-structure' ){ echo 'arrow_carrot-down'; }else echo 'arrow_carrot-right'; ?>"></span>
                      </a>
                      <ul class="sub"  <?PHP if( $uri_segm== 'add-fee-structure' || $uri_segm== 'pay-fee' ||  $uri_segm== 'view-fee-structure' || $uri_segm== 'edit-fee-structure' ){  echo 'style="overflow: hidden; display: block;"'; } ?> >
	
    <li><a class="" href="add-fee-structure" <?PHP if( $uri_segm== 'add-fee-structure' ){ echo 'class=active';  } ?> >Add fee structure </a></li>
	<li><a class="" href="view-fee-structure" <?PHP if( $uri_segm== 'view-fee-structure' || $uri_segm=='edit-fee-structure' ){ echo 'class=active';  } ?>>View fee structure</a></li>
    
    <li><a  href="pay-fee" <?PHP if( $uri_segm== 'pay-fee' ){ echo 'class=active';  } ?> >Pay fee</a></li>
                          
                          
                      </ul>
                  </li>
                  
                  
                  
                  
                  <li class="sub-menu">
                  
                  
                  
                      <a href="javascript:;" <?PHP if( $uri_segm== 'add-student-attendance' ||  $uri_segm== 'view-student-attendance' || $uri_segm== 'edit-student-attendance' ){  echo 'class=active';  }?>  >
                          <i class="icon_document_alt"></i>
                          <span>Manage Attendance </span>
                          <span class="menu-arrow  <?PHP if( $uri_segm== 'add-student-attendance' ||  $uri_segm== 'view-student-attendance' || $uri_segm== 'edit-student-attendance' ){ echo 'arrow_carrot-down'; }else echo 'arrow_carrot-right'; ?>"></span>
                      </a>
                      <ul class="sub"  <?PHP if( $uri_segm== 'add-student-attendance' ||  $uri_segm== 'view-student-attendance' || $uri_segm== 'edit-student-attendance' ){  echo 'style="overflow: hidden; display: block;"'; } ?> >
	
    <li><a class="" href="add-student-attendance" <?PHP if( $uri_segm== 'add-student-attendance' ){ echo 'class=active';  } ?> >Add Attendance</a></li>
	<li><a class="" href="view-student-attendance" <?PHP if( $uri_segm== 'view-student-attendance' || $uri_segm=='edit-student-attendance' ){ echo 'class=active';  } ?>>View attendances</a></li>
                          
                          
                      </ul>
                  </li> 
                  
                  
                  <li class="sub-menu">
                      <a href="javascript:;" <?PHP if( $uri_segm== 'add-homework-to-student' ||  $uri_segm== 'view-homework-to-student' || $uri_segm== 'edit-home-work' ){  echo 'class=active';  }?>  >
                          <i class="icon_document_alt"></i>
                          <span>Home Works</span>
                          <span class="menu-arrow  <?PHP if($uri_segm== 'add-homework-to-student' ||  $uri_segm== 'view-homework-to-student' || $uri_segm== 'edit-home-work' ){ echo 'arrow_carrot-down'; }else echo 'arrow_carrot-right'; ?>"></span>
                      </a>
                      <ul class="sub"  <?PHP if( $uri_segm== 'add-homework-to-student' ||  $uri_segm== 'view-homework-to-student' || $uri_segm== 'edit-home-work' ){  echo 'style="overflow: hidden; display: block;"'; } ?> >
	
    <li><a class="" href="add-homework-to-student" <?PHP if( $uri_segm== 'add-homework-to-student' ){ echo 'class=active';  } ?> >Add home work</a></li>
	<li><a class="" href="view-homework-to-student" <?PHP if( $uri_segm== 'view-homework-to-student' || $uri_segm=='edit-home-work' ){ echo 'class=active';  } ?>>View home works</a></li>
                          
                          
                      </ul>
                  </li>
                  
                  
                  
                  <li class="sub-menu">
                  
                  
                  
                      <a href="javascript:;" <?PHP if( $uri_segm== 'add-student-activity' ||  $uri_segm== 'view-student-activities' || $uri_segm== 'edit-student-activity' ){  echo 'class=active';  }?>  >
                          <i class="icon_document_alt"></i>
                          <span>Manage Activities</span>
                          <span class="menu-arrow  <?PHP if( $uri_segm== 'add-student-activity' ||  $uri_segm== 'view-student-activities' || $uri_segm== 'edit-student-activity' ){ echo 'arrow_carrot-down'; }else echo 'arrow_carrot-right'; ?>"></span>
                      </a>
                      <ul class="sub"  <?PHP if( $uri_segm== 'add-student-activity' ||  $uri_segm== 'view-student-activities' || $uri_segm== 'edit-student-activity' ){  echo 'style="overflow: hidden; display: block;"'; } ?> >
	
    <li><a class="" href="add-student-activity" <?PHP if( $uri_segm== 'add-student-activity' ){ echo 'class=active';  } ?> >Add student activity</a></li>
	<li><a class="" href="view-student-activities" <?PHP if( $uri_segm== 'view-student-activities' || $uri_segm=='edit-student-activity' ){ echo 'class=active';  } ?>>View student activity</a></li>
                          
                          
                      </ul>
                  </li>
                  
                  
                  <li class="sub-menu">
                      <a href="javascript:;" <?PHP if( $uri_segm== 'add-celebration' ||  $uri_segm== 'view-celebrations' || $uri_segm== 'edit-celebration' ){  echo 'class=active';  }?>  >
                          <i class="icon_document_alt"></i>
                          <span>Manage Celebrations</span>
                          <span class="menu-arrow  <?PHP if( $uri_segm== 'add-celebration' ||  $uri_segm== 'view-celebrations' || $uri_segm== 'edit-celebration' ){ echo 'arrow_carrot-down'; }else echo 'arrow_carrot-right'; ?>"></span>
                      </a>
                      <ul class="sub"  <?PHP if( $uri_segm== 'add-celebration' ||  $uri_segm== 'view-celebrations' || $uri_segm== 'edit-celebration' ){  echo 'style="overflow: hidden; display: block;"'; } ?> >
	
    <li><a class="" href="add-celebration" <?PHP if( $uri_segm== 'add-celebration' ){ echo 'class=active';  } ?> >Add a celebration</a></li>
	<li><a class="" href="view-celebrations" <?PHP if($uri_segm== 'view-celebrations' || $uri_segm== 'edit-celebration' ){ echo 'class=active';  } ?>>View celebrations</a></li>
                          
                          
                      </ul>
                  </li>
                  
                  
                 
                  
               
               

                         
                         
                  
                  
              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
      <!--sidebar end-->
