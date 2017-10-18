
<section id="main-content">
  <section class="wrapper">  
 <div class="row">
				<div class="col-lg-12">
                
                <ol class="breadcrumb">
<!--						<li><i class="fa fa-home"></i> <a href="<?PHP echo base_url('dashboard');?> ">Dashboard </a></li> -->
						<li><i class="fa fa-laptop"></i>Manage Teacher Profile</li>						  	
					</ol>
                
                </div>
			</div>
            <form id="profilepicform" name="profilepicform" method="post" enctype="multipart/form-data" action="<?PHP echo base_url('manage-teacher-profile')?>">

	<div class="row">
  <?PHP echo @$ProfileImgMsg; ?>
                  <div class="col-lg-12">
                 
                      <section class="panel">
                          <header class="panel-heading" style="min-height:43px; padding:0px">
                          
                          <div style="margin-left:10px; font-size:20px; width:15%; float:left">Teacher Profile</div>
                             
                    <select class="form-control pull-right selectTeacher" name="teacher" style="width:30%; margin-top:5px">
                        <option value="0">Select teacher</option>
                        <?PHP
                        	foreach( $Teachers->result() as $teacher)
							{
								?>
                                <option value="<?PHP echo $teacher->TeacherId ?>" <?PHP if($Selectedteacher == $teacher->TeacherId) echo 'selected'; ?>> <?PHP echo ucwords(strtolower($teacher->TeacherName)); ?> </option>
                                <?PHP	
							}
                        
                        ?>
	                    </select>
                          </header>
                          

                       
                         
                      </section>
                  </div>
                  
                  
                  <div class="col-lg-12 col-sm-12 teacher-profile">
    <div class="card hovercard">
        <div class="card-background">
        <?PHP
				
				if(trim(@$UploadedProfilePic)!='')
				{
					$backgroundpic = $UploadedProfilePic;
					$thumbnailprofilepic = $UploadedProfilePic;
					
				}
				else
				{
					$backgroundpic = base_url()."resources/teachers-profile-pics/sampleprofilepic.jpg";
					$thumbnailprofilepic = base_url()."resources/teachers-profile-pics/sampleprofilepic.jpg";
				}
		?>
        
            <img class="card-bkimg" alt="" src="<?PHP echo $backgroundpic?>" id="backgroundpic">
            <!-- http://lorempixel.com/850/280/people/9/ -->
        </div>
        <div class="useravatar">
            	<img alt="" src="<?PHP echo $thumbnailprofilepic; ?>" id="thumbnailprofilepic">
         
        </div>
        <div class="card-info"> 
        <span class="card-title teacher-name"><?PHP echo $TeacherName;?></span>
        </div>
        
        <div class="card-info" id="teacherpic"> 
        			
                  <div > 
                  
                    <input type="file" name="TeacherPic" id="TeacherPic" class="form-control" >
					<div>
                    <input type="submit" name="SumitPic" value="Upload" class="btn btn-warning">
                    </div>
                    
                   </div>
        </div>
        
                
        </form>
        
        
    </div>
    <div class="btn-pref btn-group btn-group-justified btn-group-lg" role="group" aria-label="...">
        <div class="btn-group" role="group">
            <button type="button" id="PersonalInfo" class="btn btn-primary tab-role" href="#tab1" data-toggle="tab"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                <div class="hidden-xs">About Teacher</div>
            </button>
        </div>
        <div class="btn-group" role="group">
            <button type="button" id="ContactDetails" class="btn btn-default tab-role" href="#tab2" data-toggle="tab"><span class="glyphicon glyphicon-heart" aria-hidden="true"></span>
                <div class="hidden-xs">Contact Information</div>
            </button>
        </div>
        <div class="btn-group" role="group">
            <button type="button" id="AssignedClasses" class="btn btn-default tab-role" href="#tab3" data-toggle="tab"><span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                <div class="hidden-xs">Assigned Classes</div>
            </button>
        </div>
        <div class="clearfix"></div>
    </div>

        <div class="well">
      <div class="tab-content">
        <div class="tab-pane fade in active PersonalInfo tab1">
          <h3>Teacher Personal Information</h3>
          
         <form name="personalinfoform" id="personalinfoform" style="display:<?PHP if($Selectedteacher=="0") echo "none"; ?>">
         
            <div class="Personal-info-form">
                    <div class="tab-form">
                         <div class="col-md-6 event_da">
                            
                            <input type="text" name="surname" id="surname" class="form-control" placeholder="Enter Surname">
                         </div>
                         
                          <div class="col-md-6 event_da">
                            
                            <input type="text" name="lastname" id="lastname" class="form-control" placeholder="Enter Lastname">
                         </div>
                          <div class="clearfix"></div>
                    </div>
                    
                    <div class="tab-form">
                         <div class="col-md-6 event_da">
                            <select name="MaritialStatus" id="MaritialStatus" class="form-control">
                                
                                <option value="0">Select Maritial Status</option>
                                    <option value="Married">Married</option>
                                    <option value="UnMarried">UnMarried</option>
                            </select>
                         </div>
                         
                          <div class="col-md-6 event_da">
                            
                            <input type="text" name="spousename" id="spousename" class="form-control" placeholder="Enter Spousename" disabled>
                         </div>
                         <div class="clearfix"></div>
                    </div>
                    
                    <div class="tab-form">
                         <div class="col-md-3 event_da">
                            
                            <input type="text" name="dob" id="dob" class="form-control" placeholder="Select Date Of Birth">
                         </div>
                         
                          <div class="col-md-3 event_da">
                            
                            <input type="text" name="doa" id="doa" class="form-control" placeholder="Select Date Of Anniversary">
                         </div>
                         
                         <div class="col-md-6 event_da">
                           
                           <input type="button"  class="btn btn-block btn-primary updatepersonalinfo" value="Update personal information">
                           
                         </div>
                         
                          <div class="clearfix"></div>
                    </div>
            

            </div>
            
          </form>
            
             <div class="personaldetailsUpdatedMsg"></div>
          
          <div class="clearfix"></div>
          
        </div>
        <div class="tab-pane fade in tab2">
          <h3>Teacher Contact Information</h3>

          <div class="err-section"></div>
          
             <form name="contactinfoform" id="contactinfoform" style="display:<?PHP if($Selectedteacher=="0") echo "none"; ?>">
            <div class="Personal-info-form">
                   
                   
                    <div class="tab-form">
                         <div class="col-md-6 event_da">
                            
                            <input type="text" name="contactnumber" id="contactnumber" class="form-control" placeholder="Enter contact number">
                         </div>
                         
                          <div class="col-md-6 event_da">
                            
                            <input type="text" name="alternatenumber" id="alternatenumber" class="form-control" placeholder="Enter Alternatenumber">
                         </div>
                          <div class="clearfix"></div>
                    </div>
                    
                    <div class="tab-form">
                         <div class="col-md-6 event_da">
                            
                            <input type="text" name="email" id="email" class="form-control" placeholder="Enter Email">
                         </div>
                         
                          <div class="col-md-6 event_da">
                            
                            <input type="text" name="landmark" id="landmark" class="form-control" placeholder="Enter Landmark">
                         </div>
                         <div class="clearfix"></div>
                    </div>
                    
                    <div class="tab-form">
                         
                         <div class="col-md-6 event_da">
                           
                           <textarea class="form-control" id="address" name="address"></textarea>
                           
                           
                         </div>
                         
                         <div class="col-md-6 event_da">
                           
                           <input type="button"  class="btn btn-block btn-primary updatecontactinfo" value="Update contact information">
                           
                         </div>
                         
                          <div class="clearfix"></div>
                    </div>
            

            </div>
            </form>
            <div class="contactdetailsUpdatedMsg"></div>
            
        </div>
        <div class="tab-pane fade in tab3">
          <h3>Classes which are assigned to the teacher</h3>

          <div class="classesassigned">
          
           <table class="table table-striped table-advance table-hover">
                           <thead>
                           <tr>
                                <th>SLNO</th>
                                 <th><i class="icon_profile"></i> Teacher</th>
                                 <th><i class="icon_profile"></i> Class</th>
                                 <th><i class="icon_profile"></i> Section</th>
                                 <th><i class="icon_profile"></i> Subject</th>
                                  <th><i class="icon_cogs"></i> Actions</th>
                              </tr>

                           </thead>
                           
                           <tbody>
                           
                           <!--
                                      <tr>
                                            		<td>1 </td>
                                                    <td>Vidhya</td>
                                                    <td>Class-IV </td>
                                                    <td>A </td>
                                                    <td>Hindi </td>
													<td><a href="http://localhost/adi-akshara/edit-assigned-teacher/1" class="btn btn-success">Edit</a> </td>
                                            </tr>
                                                                                        <tr>
                                            		<td>2 </td>
                                                    <td>Vidhya</td>
                                                    <td>Class-IV </td>
                                                    <td>A </td>
                                                    <td>Science </td>
													<td><a href="http://localhost/adi-akshara/edit-assigned-teacher/2" class="btn btn-success">Edit</a> </td>
                                            </tr>
                                                                                        <tr>
                                            		<td>3 </td>
                                                    <td>Vidhya</td>
                                                    <td>Class-I </td>
                                                    <td>A </td>
                                                    <td>English </td>
													<td><a href="http://localhost/adi-akshara/edit-assigned-teacher/3" class="btn btn-success">Edit</a> </td>
                                            </tr>
                                                                                        <tr>
                                            		<td>4 </td>
                                                    <td>Vidhya</td>
                                                    <td>Class-I </td>
                                                    <td>A </td>
                                                    <td>Environmental Science </td>
													<td><a href="http://localhost/adi-akshara/edit-assigned-teacher/4" class="btn btn-success">Edit</a> </td>
                                            </tr>
                                                                            
                                
                            <tr>
                            	<td colspan="7">  </td>
                            </tr>
                            -->
                            
                           </tbody>
                        </table>
          
          </div>
         
          
          
        </div>
      </div>
    </div>
    
    </div>
    
    <div class="clearfix"></div>
                  
                  
                  
              </div>          
              
          
           
              
</section>
</section>
      
      
      
      