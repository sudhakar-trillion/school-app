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
	
    <title>Parent Login</title>

    <!-- Bootstrap CSS -->    
    <link href="resources/template-assets/css/bootstrap.min.css" rel="stylesheet">
    <!-- bootstrap theme -->
    <link href="resources/template-assets/css/bootstrap-theme.css" rel="stylesheet">
    <!--external css-->
    <!-- font icon -->
    <link href="resources/template-assets/css/elegant-icons-style.css" rel="stylesheet" />
    <link href="resources/template-assets/css/font-awesome.css" rel="stylesheet" />
    <!-- Custom styles -->
    <link href="resources/template-assets/css/style.css" rel="stylesheet">
    <link href="resources/template-assets/css/style-responsive.css" rel="stylesheet" />

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 -->
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
    <link href="resources/custom-assests/css/style.css" rel="stylesheet">
    
    <style type="text/css">
	
	.err-border
	{
		border:1px solid #F00;	
	}
	
	.err-msg { color:#F00;  }
	
	</style>
    
</head>

  <body >

    <div class="container">

      <form class="login-form" > 
			
        <div class="login-wrap">
            <p class="login-img"><i class="icon_lock_alt" style="color: rgba(97, 97, 97, 0.21);"></i><span style="font-size:40px; color: rgba(97, 97, 97, 0.21);" >Parent Login</span></p>
            
           <!-- <div class="input-group">
              <span class="input-group-addon"><i class="icon_profile"></i></span>
              <select name="AcademicYear" class="form-control" id="AcademicYear">
                                        	<option value="0">Select Academic Year </option>
                                            <?PHP
											
											$curryear = date('Y');
											$prev_two_years = date('Y')-1;
											$next_two_years = date('Y')+2;
											
											for( $prev_two_years; $prev_two_years<=$next_two_years;$prev_two_years++)
											{
												?>
                                                <option value="<?PHP echo $prev_two_years."-".($prev_two_years+1)?>"><?PHP echo $prev_two_years."-".($prev_two_years+1)?></option>
                                                <?PHP	
											}
											?>
                                        </select>
             
            </div>
             <span class="err-msg AcademicYear_err"></span>-->
            
            <div class="input-group">
              <span class="input-group-addon"><i class="icon_profile"></i></span>
              <select name="ClassName" id="ClassName" class="form-control">
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
             
            </div>
             <span class="err-msg ClassName_err"></span>
             
             
             
            <div class="input-group">
                <span class="input-group-addon"><i class="icon_key_alt"></i></span>
               <select name="ClassSection" id="sections" class="form-control">
               
               </select>
            </div>
             <span class="ClassSection_err err-msg"></span>
             
             <div class="input-group">
                <span class="input-group-addon"><i class="icon_secret_alt"></i></span>
               <input type="text" name="RollNo" id="RollNo" class="form-control" placeholder="Enter roll no" />
            </div>
             <span class="RollNo_err err-msg"></span>
             
             <div class="input-group">
               <span class="input-group-addon"><i class="icon_key_alt"></i></span>
               <input type="password" name="Password" id="Password" class="form-control" placeholder="Enter password" />
            </div>
             <span class="pwd_err err-msg"></span>
             
            <input class="btn btn-primary btn-lg btn-block" name="parentlogin" id="parentlogin" type="button" value="Login">
            <span class="Invalid-credentials err-msg"></span>
        </div>
      </form>
    
    
    </div>
<script>
var base_url="<?PHP echo base_url(); ?>";
</script>
<script src="resources/custom-assests/js/Jquery.js"> </script>
<script src="resources/custom-assests/js/scripts.js"></script>

  </body>
</html>