<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Login</title>
<base href="<?PHP echo base_url()?>" >
<link href="resources/index-page/css/bootstrap.min.css" rel="stylesheet">
<link href="resources/index-page/css/custom.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


<style>
body{
	background:url(resources/index-page/images/eye-bg.jpg) no-repeat 0px 0px;
	position:relative;
	
}
.bgtopmask{
	background:rgba(53, 106, 115, 0.45) fixed;
	position:fixed;
	width:100%;
	height:800px;

	
	
}


.login{
	padding-bottom: 145px;

}
.login-form{
	width:40% !important;
}

.headers
{
	text-align:center;
}

.headers img
{
	width:170px;		
}
</style>

</head>

<body>

<div class="bgtopmask">


<div class="container">
<div class=" login">

<div class="login-form logo">
 <div class="headers">
 <img src="resources/index-page/images/logo.png?<?PHP echo time();?>" />

</div></div>
<form method="post" action="">
 <input type="hidden" name="<?PHP echo $tokenname;?>" value="<?PHP echo $csrfhash;?>" />
  <div class="login-form">
  <!--<h1>Login Form</h1>
-->

<?PHP echo @$this->session->flashdata('invalidcredentials');?>
 <?PHP echo @$this->session->flashdata('inactiveadmin');?>
  
  <div class="form-group">
 
    <label></label>
    <input type="text" placeholder="User Id" name="userid" autofocus>
    <i class="fa fa-user"></i>
     <?PHP echo form_error('userid');?>
     
</div>
<div class="form-group">
    <label></label>
    <input type="password" placeholder="Enter Password" name="password">
    <i class="fa fa-lock"></i>
  <p class="error"><?PHP echo form_error('password');?></p>

  
</div>
  <div class="clearfix"></div>
<div class="form-group">
   <!-- <button type="submit"  name="adminlogin">Login</button>-->
   <input name="teacherlogin" type="submit" value="Login">
    
   <div class="psw">Forgot <a href="#">password?</a></div>
    <div class="clearfix"></div>
   </div>
   <div class="clearfix"></div>
    </div>
    <div class="clearfix"></div>
  </div>

</form>

</div>


</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> 
<script src="resources/index-page/js/bootstrap.min.js"></script> 

</body>
</html>