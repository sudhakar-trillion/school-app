
<section id="main-content">
  <section class="wrapper">  
 <div class="row">
				<div class="col-lg-12">
                
                <ol class="breadcrumb">
						<li><i class="fa fa-home"></i><a href="<?PHP echo base_url();?>"> Dashboard</a></li>
						<li><i class="fa fa-laptop"></i>Add notification</li>

					</ol>
                
                </div>
			</div>

	<div class="row">
  
                  <div class="col-lg-12">
                 
                      <section class="panel">
                          <header class="panel-heading">
                             Add notification
                          </header>
                          <div class="panel-body">

                              <div class="form col-lg-9">
                                  <form class="form-validate form-horizontal " id="add_notificationstudent_form" method="post" action="">
                                      
                                      <div class="form-group ">
                                          <label for="ClassName" class="control-label col-lg-4">Class<span class="required">*</span></label>
                                          <div class="col-lg-6">
											<select class="form-control" name="ClassName" id="ClassName">
                                            <?PHP
												
												$class_cnt=0;
												foreach( $classes->result() as $clas)
												{
													if( $class_cnt == 0 )
													{
														?>
                                                        <option value="0">Select Class</option>
                                                        <option value="<?PHP echo $clas->SLNO?>"><?PHP echo ucwords($clas->ClassName); ?> </option>
                                                        <?PHP	
													}
													else
														{
															?>
                                                             <option value="<?PHP echo $clas->SLNO?>"><?PHP echo ucwords($clas->ClassName); ?> </option>
                                                            <?PHP
														}
													$class_cnt++;
													
												}
											?>
                                            
                                            </select>
                                          </div>
                                           <div class="col-lg-2 err-msg assign-err"><span class="ClassName_err"></span> </div>
                                      </div>
                                      
                                      
                                      <div class="form-group ">
                                          <label for="sections" class="control-label col-lg-4">Section<span class="required">*</span></label>
                                          <div class="col-lg-6">
											<select class="form-control" name="sections" id="sections">
                                            <option value='0'>Select Section</option>
                                            </select>
                                          </div>
                                           <div class="col-lg-2 err-msg assign-err"><span class="section_err"></span> </div>
                                      </div>
                                      
                                      <div class="form-group ">
                                          <label for="Rollno" class="control-label col-lg-4">Roll Number<span class="required">*</span></label>
                                          <div class="col-lg-6">
											<select class="form-control" name="Rollno" id="Rollno">
                                            <option value='0'>Select Student</option>
                                            </select>
                                          </div>
                                           <div class="col-lg-2 err-msg assign-err"><span class="Roll_err"></span> </div>
                                      </div>
                                      
                                      <!--
                                     		 <div class="form-group ">
                                          <label for="sections" class="control-label col-lg-4">Academic year<span class="required">*</span></label>
                                          <div class="col-lg-6">
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
                                           <div class="col-lg-2 err-msg assign-err"><span class="academic_err"></span> </div>
                                      </div>
                                      
                                      
                                      <div class="form-group ">
                                          <label for="sections" class="control-label col-lg-4">Total Students<span class="required">*</span></label>
                                          <div class="col-lg-2">
											<input type="text" class="form-control" name="TotalStudents" id="TotalStudents" />
                                          </div>
                                          <div class="col-lg-2">
											<input type="button" class="btn btn-danger btn-block" name="Addstudents" id="Addstudents" value="Create students " />
                                          </div>
                                           <div class="col-lg-2 err-msg assign-err"><span class="totalstudent_err"></span> </div>
                                      </div>
                                      	-->
                                      
                                      <div class="form-group notificationdiv">
                                         

                                        	 <label for="NotificationTitle" class="control-label col-lg-4">Title<span class="required"></span></label> 
                                        	 <div class="col-lg-6"> 
														
                                              <input type="text" class="form-control NotificationTitle" name="NotificationTitle" id="NotificationTitle" placeholder="Notification title" />
                                              </div>
                                              <div class="col-lg-2 err-msg assign-err"><span class="NotificationTitle_err"></span> </div>
                                         
                                      </div>
                                      
                                      <div class="form-group notificationdiv">
                                         

                                        	 <label for="Notification" class="control-label col-lg-4">Notification:<span class="required"></span></label> 
                                        	 <div class="col-lg-6"> 
														
                                                        <textarea class="form-control" id="Notification" name="Notification"> </textarea> 
                                              </div>
                                              <div class="col-lg-2 err-msg assign-err"><span class="Notification_err"></span> </div>
                                         
                                      </div>
                                      
                                      
                                      <div class="form-group">
                                          <div class="col-lg-offset-4 col-lg-8">
                                             
                                             <input type="button" class="btn btn-primary " edit_add='add' name="addnotification" id="addnotification" value="Add notification" />
                                             <span style="margin-left:20px" class="add-notification-to-student-resp" ></span>
                                           
                                          </div>
                                      </div>
                                  </form>
                              </div>
                          </div>
                      </section>
                  </div>
              </div>          
              
</section          
      ></section>