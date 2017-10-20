<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Configure your school with TriSmart</title>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css">


<style>
	
@import url(https://fonts.googleapis.com/css?family=Montserrat);
/* css class for the registration form generated errors */

.profilepress-reg-status {
  border-radius: 6px;
  font-size: 17px;
  line-height: 1.471;
  padding: 10px 19px;
  background-color: #e74c3c;
  color: #ffffff;
  font-weight: normal;
  display: block;
  text-align: center;
  vertical-align: middle;
  margin: 5px 0;
}
/*form styles*/

#msform {
  width: 600px;
  margin: 50px auto 550px;
  text-align: center;
  position: relative;
}

#msform fieldset {
  background: white;
  border: 0 none;
  border-radius: 3px;
  box-shadow: 0 0 15px 1px rgba(0, 0, 0, 0.4);
  padding: 20px 30px;
  box-sizing: border-box;
  width: 95%;
  margin: 0 10%;
  /*stacking fieldsets above each other*/
  
  position: absolute;
}
/*Hide all except first fieldset*/

#msform fieldset:not(:first-of-type) {
  display: none;
}
/*inputs*/

#msform input,
#msform textarea {
  padding: 15px;
  border: 1px solid #ccc;
  border-radius: 3px;
  margin-bottom: 10px;
  width: 100%;
  box-sizing: border-box;
  font-family: montserrat;
  color: #2C3E50;
  font-size: 13px;
}
/*buttons*/

#msform .action-button {
  width: 100px;
  background: #27AE60;
  font-weight: bold;
  color: white;
  border: 0 none;
  border-radius: 1px;
  cursor: pointer;
  padding: 10px 5px;
  margin: 10px 5px;
}

#msform .action-button:hover,
#msform .action-button:focus {
  box-shadow: 0 0 0 2px white, 0 0 0 3px #27AE60;
}
/*headings*/

.fs-title {
  font-size: 15px;
  text-transform: uppercase;
  color: #2C3E50;
  margin-bottom: 10px;
}

.fs-subtitle {
  font-weight: normal;
  font-size: 13px;
  color: #666;
  margin-bottom: 20px;
}
/*progressbar*/

#progressbar {
  margin-bottom: 30px;
  overflow: hidden;
  /*CSS counters to number the steps*/
  
  counter-reset: step;
}

#progressbar li {
  list-style-type: none;
  color: #616161;
  text-transform: uppercase;
  font-size: 9px;
  width: 33.33%;
  float: left;
  position: relative;
}

#progressbar li:before {
  content: counter(step);
  counter-increment: step;
  width: 20px;
  line-height: 20px;
  display: block;
  font-size: 15px;
  color: #333;
  background: white;
  border-radius: 3px;
  margin: 0 auto 5px auto;
}

#progressbar li:first-child:after {
  /*connector not needed before the first step*/
  
  content: none;
}
/*marking active/completed steps green*/
/*The number of the step and the connector before it = green*/

#progressbar li.active:before,
#progressbar li.active:after {
  background: #27AE60;
  color: white;
}

.agree-terms
{
	list-style-type:upper-alpha;
}

.agree-terms li{
	font-size:11px;
	text-indent:inherit;
	text-align:left;
	margin-bottom:5px;
	
}

.agree-section
{
	min-height:100px;
	    max-height: 193px;
    overflow: auto;
}
.agree-section p
{
	font-size:14px;
}


.err-msg
{
	text-align: left;
    margin-left: 0px;
    color: red;
	margin-top: -8px;
    margin-bottom: 4px;
}
</style>

</head>

<body>



<form method="post" novalidate action="" enctype="multipart/form-data">
  <div id="msform">
    <!-- progressbar -->
    <ul id="progressbar">
      <li class="active">License Agreement</li>
      <li>Admin Configurations</li>
      <li>School Information</li>
    </ul>
    <!-- fieldsets -->
    <fieldset>
      <h2 class="fs-title">License Agreement</h2>
      <h3 class="fs-subtitle">Read the agreement carefully</h3>
      
      <div class="agree-section">
      
      <p>The following terms and conditions apply to the Web Application License:</p>

<ol class="agree-terms">      
<li>Customer agrees to register within thirty (30) days any created Web Application at Accelrys' marketplace
at: http://accelrys.com/about/legal/user-agreements.html;
</li>

<li> Customer agrees not to publish externally any prohibited Products, a list of which can be found at:
http://accelrys.com/about/legal/user-agreements.html. In the event a Web Application accessing the aforementioned
Products is inadvertently uploaded, Customer agrees to remove the Web Application immediately;
</li>

<li> Customer agrees to use the following language on the front page of any Pipeline Pilot application uploaded
to the Web Application, "Powered by Pipeline Pilot from Accelrys. Not for commercial use." Customer agrees not
to obscure such language;
</li>
<li> Customer agrees not to permit access or use of the Web Application to any person or entity not licensed
herein, including, without limitation, any commercial enterprise;
</li>
<li>Customer shall grant to Accelrys free access to the Web Application;</li>

<li>Customer shall follow currently accepted information technology best practices for keeping the Web
Application secure;
</li>
<li>Customer shall monitor the Web Application to ensure that only members of the Academic Community
access the Web Application. Without limitation, Customer shall require any persons accessing the Web Application
to create and register a username and password in order to verify they are members of the Academic Community. 
</li>
</ol>      
      </div>
      
      <!--<input type="text" name="email" placeholder="Email" />
      <input type="password" name="pass" placeholder="Password" />
      <input type="password" name="cpass" placeholder="Confirm Password" />-->
      <input type="button" name="next" class="next action-button iagree" value="I Agree" />
    </fieldset>
    <fieldset>
      <h2 class="fs-title">Admin Configurations</h2>
      <h3 class="fs-subtitle">Use them for admin login</h3>
     
      <input type="text" name="email" id="Adminemail" placeholder="Email" />
      <p class="err-msg" id="Adminemail_err"></p>
         <input type="text" name="loginId" id="loginId" placeholder="LoginId" />
       <p class="err-msg" id="loginId_err"></p>   
      <input type="password" name="pass" id="Password" placeholder="Password" />
      <p class="err-msg" id="Password_err"></p> 
      <input type="password" name="cpass" id="confirmpwd" placeholder="Confirm Password" />
       <p class="err-msg" id="confirmpwd_err"></p>
      
      <input type="button" name="previous" class="previous action-button" value="Previous" />
      <input type="button" name="next" class="next action-button save-admin-config" value="Next" />
    </fieldset>
    <fieldset>
      <h2 class="fs-title">School Details</h2>
      <h3 class="fs-subtitle">Choose logo and mame</h3>
      <input type="text" name="schoolname" id="schoolname" placeholder="School Name" />
	 <p class="err-msg" id="schoolname_err"></p>   
     
    <input type="file" name="Schoollogo" id="Schoollogo" value="Select Logo" />
     <p class="err-msg" id="Schoollogo_err"></p>   
     
     
      <input type="button" name="previous" class="previous action-button admin-conf" value="Previous" />
      <input type="submit" name="submit" class="submit action-button action-submit" value="Submit" />
    </fieldset>
  </div>
</form>








<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" ></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" ></script>

<script>
var base_url = "<?PHP echo base_url();?>";
//jQuery time
(function($) {
  var current_fs, next_fs, previous_fs; //fieldsets
  var left, opacity, scale; //fieldset properties which we will animate
  var animating; //flag to prevent quick multi-click glitches
	
	
  $(".next").click(function() {
	  
	var err_cnt='0';  
	var OnClick = $(this);
	
	  if( $(this).hasClass('iagree') )
	  {
			
			$.ajax({
					
					url:base_url+'Installation/getAdminConfig',
					type:"POST",
					data:{"QueryFrom":"IAgree"},
					async:false,
					success:function(resp)
					{
						resp = $.trim(resp);
						if(resp=='0')
						{
							
						}
						else
						{
							resp = JSON.parse(resp);
							
							$.each(resp,function(ind,val)
							{
								// Adminemail,loginId
								
								$("#Adminemail").val(val.AdminEmail);
								$("#loginId").val(val.UserId);
								$("#Password").val('');
								$("#confirmpwd").val('');
								
							});//each ends here
						}
		
						
					}//success function ends here
				
				}); // ajax ends here
			
			
	  }
	  else if ($(this).hasClass('save-admin-config'))
	  {
			
			var Adminemail = $("#Adminemail").val();
				Adminemail = $.trim(Adminemail);
			
			if(Adminemail=="")
			{
				$("#Adminemail_err").html("Please enter admin email id");
				err_cnt='1';
			}
			else
			{
				var filter = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
				
				if (filter.test(Adminemail)) 
					$("#Adminemail_err").html("");
				else
				{
					$("#Adminemail_err").html("Please enter correct email format");
					err_cnt='1';	
				}
			}
			
			var loginId = $("#loginId").val();
				loginId = $.trim(loginId);
			
			if(loginId=='')
			{
				err_cnt='1';
				$("#loginId_err").html('Enter login Id');
			}
			else
				$("#loginId_err").html('');
				
			var Password = $("#Password").val();
				Password = $.trim(Password);
				
				if(Password.length>6)
					$("#Password_err").html("");	
				else
					{
						err_cnt='1';
						$("#Password_err").html("Password should be min of 6 characters");	
					}
			
			var confirmpwd = $("#confirmpwd").val();
				confirmpwd = $.trim(confirmpwd);
				
				if(confirmpwd.length>6)
				{
					
					if( confirmpwd== Password)
						$("#confirmpwd_err").html("");	
					else
					{
						err_cnt='1';
						$("#confirmpwd_err").html("Password & Confirm Password should be same");	
					}
				}
				else
					{
						err_cnt='1';
						$("#confirmpwd_err").html("Password should be min of 6 characters");	
					}
			
			if(err_cnt!='0')	
				return false;
			else
			{
				$.ajax({
							url:base_url+'Installation/saveadminconfig',
							type:"POST",
							async:false,
							data:{"Adminemail":Adminemail,"loginId":loginId,"Password":Password},
							beforeSend:function(){  OnClick.prop('disabled',true); OnClick.val('Configuring ...........'); },
							success:function(resp)
							{
								setTimeout(function(){ OnClick.prop('disabled',false); OnClick.val('Next'); },3000);
								resp = $.trim(resp);
								if(resp=='0')
								{
									$("#confirmpwd_err").html("Unable to configure admin info please contact Admin");	
									err_cnt='1';
								}
							}//success function ends here					
						});
			}
			
			if(err_cnt!='0')	
				return false;
		
	  } //if it is for admin configurations
	  
    if (animating) return false;
    animating = true;

    current_fs = $(this).parent();
    next_fs = $(this).parent().next();

    //activate next step on progressbar using the index of next_fs
    $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");

    //show the next fieldset
    next_fs.show();
    //hide the current fieldset with style
    current_fs.animate({
      opacity: 0
    }, {
      step: function(now, mx) {
        //as the opacity of current_fs reduces to 0 - stored in "now"
        //1. scale current_fs down to 80%
        scale = 1 - (1 - now) * 0.2;
        //2. bring next_fs from the right(50%)
        left = (now * 50) + "%";
        //3. increase opacity of next_fs to 1 as it moves in
        opacity = 1 - now;
        current_fs.css({
          'transform': 'scale(' + scale + ')'
        });
        next_fs.css({
          'left': left,
          'opacity': opacity
        });
      },
      duration: 800,
      complete: function() {
        current_fs.hide();
        animating = false;
      },
      //this comes from the custom easing plugin
      easing: 'easeInOutBack'
    }); //animation ends here
	

	
  });

  $(".previous").click(function() {
	  
	  if( $(this).hasClass('admin-conf') )
	  {
		  $.ajax({
					
					url:base_url+'Installation/getAdminConfig',
					type:"POST",
					async:false,
					success:function(resp)
					{
						resp = $.trim(resp);
						if(resp=='0')
						{
							
						}
						else
						{
							resp = JSON.parse(resp);
							
							$.each(resp,function(ind,val)
							{
								// Adminemail,loginId
								
								$("#Adminemail").val(val.AdminEmail);
								$("#loginId").val(val.UserId);
								
								$("#Password").val('');
								$("#confirmpwd").val('');
								
							});//each ends here
						}
		
						
					}//success function ends here
				
				}); // ajax ends here
	  }
		 
	  
	  
	  
	  
    if (animating) return false;
    animating = true;

    current_fs = $(this).parent();
    previous_fs = $(this).parent().prev();

    //de-activate current step on progressbar
    $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");

    //show the previous fieldset
    previous_fs.show();
    //hide the current fieldset with style
    current_fs.animate({
      opacity: 0
    }, {
      step: function(now, mx) {
        //as the opacity of current_fs reduces to 0 - stored in "now"
        //1. scale previous_fs from 80% to 100%
        scale = 0.8 + (1 - now) * 0.2;
        //2. take current_fs to the right(50%) - from 0%
        left = ((1 - now) * 50) + "%";
        //3. increase opacity of previous_fs to 1 as it moves in
        opacity = 1 - now;
        current_fs.css({
          'left': left
        });
        previous_fs.css({
          'transform': 'scale(' + scale + ')',
          'opacity': opacity
        });
      },
      duration: 800,
      complete: function() {
        current_fs.hide();
        animating = false;
      },
      //this comes from the custom easing plugin
      easing: 'easeInOutBack'
    });
  });

})(jQuery);

</script>

<script>
$(document).on('submit','form',function(e)
{
	var schoolname = $("#schoolname").val();
		schoolname = $.trim(schoolname);
		
		if(schoolname=="")
		{
			err_cnt='0';
			$("#schoolname_err").html("Enter School Name");
		}
		else
			$("#schoolname_err").html("");
			
		var Schoollogo = $("#Schoollogo").val();
			Schoollogo = $.trim(Schoollogo);
			
			if(Schoollogo=='')
			{
				$("#Schoollogo_err").html("Select School Logo");	
				err_cnt='1';
			}
			else
			{
				var ext = $('#Schoollogo').val().split('.').pop().toLowerCase();
				if($.inArray(ext, ['gif','png','jpg','jpeg']) == -1) 
				{
					$("#Schoollogo_err").html("Select logo of image type");	
					err_cnt='1';
				}
				else
					$("#Schoollogo_err").html("");	
			}
	

	if(err_cnt!='0')	
		e.preventDefault();
	
});


</script>

</body>
</html>