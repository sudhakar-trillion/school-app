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
 
  <div class="login-form">
  <!--<h1>Login Form</h1>
-->

<?PHP echo @$this->session->flashdata('invalidcredentials');?>
 <?PHP echo @$this->session->flashdata('inactiveadmin');?>


<div class="form-group">
  <select  name="ClassName" id="ClassName" >
   
    <?PHP
			  $cnt=0;
			  	foreach($classes->result() as $clas)
				{
					if($cnt==0)
					{
						?>
                        <option value="0"> Select Class </option>
                        <?PHP	
					}
					?>
					<option value="<?PHP echo $clas->SLNO;?>"><?PHP echo $clas->ClassName;?> </option>
                    <?PHP
					$cnt++;
				}

			  ?>
   
  </select>
<i class="fa fa-sort-desc" style=" margin-left: -5; font-size:22px !important;"></i>
  <p class="error ClassName_err"></p>
  </div>
  
  <div class="form-group">
  <select name="ClassSection" id="sections">
  <option>Select Section</option>
   
   
  </select>
<i class="fa fa-sort-desc" style=" margin-left: -25px; font-size:22px !important;"></i>
  <p class="error ClassSection_err"></p>
  </div>
  
  <div class="form-group">
 
    <label></label>
    <input type="text" name="RollNo" id="RollNo"  placeholder="Enter roll no">
    <i class="fa fa-user"></i>
     <p class="error RollNo_err"><?PHP echo form_error('password');?></p>
     
</div>
<div class="form-group">
    <label></label>
    <input type="password" name="Password" id="Password" placeholder="Enter password">
    <i class="fa fa-lock"></i>
  <p class="error pwd_err"><?PHP echo form_error('password');?></p>

  
</div>
   <div class="clearfix"></div>
<div class="form-group">
   <!-- <button type="submit"  name="adminlogin">Login</button>-->
   <input name="adminlogin" id="parentlogin" type="button"  value="Login">
    
   <div class="psw">Forgot <a href="#">password?</a></div>
   </div>
    </div>
    <div class="clearfix"></div>
  </div>

</form>
<div class="clearfix"></div>
</div>
<div class="clearfix"></div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> 
<script src="resources/index-page/js/bootstrap.min.js"></script> 

<script>
var base_url="<?PHP echo base_url(); ?>";
</script>
<script src="resources/custom-assests/js/Jquery.js"> </script>
<script src="resources/custom-assests/js/scripts.js"></script>
</body>
</html>