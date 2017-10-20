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
   <input name="adminlogin" type="submit" value="Login">
    
   <div class="psw">Forgot <a style="cursor:pointer" data-toggle="modal" data-target="#forgetpwd">password?</a></div>
    <div class="clearfix"></div>
   </div>
   <div class="clearfix"></div>
    </div>
    <div class="clearfix"></div>
  </div>

</form>

</div>


</div>


<div id="forgetpwd" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Modal Header</h4>
      </div>
      <div class="modal-body">
        <input type="text" name="userid" id="userid" placeholder="Enter User Id">
        <p style="color:red" class="errmsg"></p>
      </div>
      <div class="modal-footer">
      <span class="forget-pwd-msg pull-left"></span>
        <button type="button" class="btn btn-primary resetadminpwd" >Reset Password</button>
      </div>
    </div>

  </div>
</div>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> 
<script src="resources/index-page/js/bootstrap.min.js"></script> 


<script>
	$(document).ready(function()
	{
		$(document).on('click','.resetadminpwd',function()
		{
			
			var Onclick = $(this);
			var err_cnt='0';
			
			var userid = $("#userid").val();
				userid = $.trim(userid);
				
				if(userid=='')
				{
					$(".errmsg").html("Enter User Id");
					err_cnt='1';
				}
				else
					$(".errmsg").html("");
					
				if( err_cnt=='0')
				{
					$.ajax({
								url:"<?PHP echo base_url()?>Requestdispatcher/resetadminpwd",
								type:"POST",
								data:{"userid":userid},
								beforeSend:function(){  Onclick.val('Resetting Pwd......'); Onclick.prop('disabled',true); },
								success:function(resp)
								{
									resp = $.trim(resp);
									if(resp=="0")
									{
										
											
										setTimeout(function()
															{ 
																Onclick.prop('disabled',false);  
																Onclick.val('Reset Password');   
																$(".forget-pwd-msg").html("<span class='alert alert-danger'>User Id is not registered with us</span>");
																
															},2000);
									}
									else if( resp=="-1")
									{
										
										setTimeout(function()
															{ 
																Onclick.prop('disabled',false);  
																Onclick.val('Reset Password');   
																$(".forget-pwd-msg").html("<span class='alert alert-danger'>Failed to reset and send email</span>");
																
															},2000);
									}
									else
									{
										
										
										setTimeout(function()
															{ 
																Onclick.prop('disabled',false);  
																Onclick.val('Reset Password');   
																$(".forget-pwd-msg").html("<span class='alert alert-success'>Successfully resets password, kindly check your inbox</span>");
																
															},2000);
										
									}
					
									
								}// success function ends here
								
							});	
				}
					
			
			
			
			
		});
	});
</script>
</body>
</html>