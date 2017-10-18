
<section id="main-content">
  <section class="wrapper">  
 <div class="row">
				<div class="col-lg-12">
                
                <ol class="breadcrumb">

					<li><i class="fa fa-home"></i><a href="<?PHP echo base_url();?>"> Dashboard</a></li>
                    <li><i class="fa fa-plus"></i><a href="<?PHP echo base_url('add-notification-to-student');?>"> Add notification</a></li>
                    <li><i class="fa fa-desktop"></i><a href="<?PHP echo base_url('view-notification-to-student');?>"> View notifications</a></li>
					<li>Edit notification </li>
					</ol>
                
                </div>
			</div>

	<div class="row">
  
                  <div class="col-lg-12">
                 
                      <section class="panel">
                          <header class="panel-heading">
                             Edit notification
                          </header>
                          <div class="panel-body">

                              <div class="form col-lg-9">
                                  <form class="form-validate form-horizontal " id="add_notificationstudent_form" method="post" action="">
                                      
                                      <div class="form-group ">
                                          <label for="ClassName" class="control-label col-lg-4">Class<span class="required">*</span></label>
                                          <div class="col-lg-6">
                                          <input type="hidden" id="NotificationId" value="<?PHP echo $NotificationId?>" />
											<select class="form-control" name="ClassName" id="ClassName">
                                            <?PHP
												
												$class_cnt=0;
												foreach( $classes->result() as $clas)
												{
													if( $class_cnt == 0 )
													{
														?>
                                                        <option value="0">Select Class</option>
                                                        <option value="<?PHP echo $clas->SLNO?>" <?PHP if($SelectedClass==$clas->SLNO){ echo 'selected="selected"'; }?> ><?PHP echo ucwords($clas->ClassName); ?> </option>
                                                        <?PHP	
													}
													else
														{
															?>
                                                             <option value="<?PHP echo $clas->SLNO?>"  <?PHP if($SelectedClass==$clas->SLNO){ echo 'selected="selected"'; }?> ><?PHP echo ucwords($clas->ClassName); ?>><?PHP echo ucwords($clas->ClassName); ?> </option>
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
                                            <?PHP
													foreach($Sections->result() as $sec)
													{
														?>
                                                        <option value="<?PHP echo $sec->SectionId?>" <?PHP if($SelectedSection==$sec->SectionId){ echo 'selected="selected"'; }?> ><?PHP echo $sec->Section?></option>
                                                        <?PHP	
													}
											?>
                                            </select>
                                          </div>
                                           <div class="col-lg-2 err-msg assign-err"><span class="section_err"></span> </div>
                                      </div>
                                      
                                      <div class="form-group ">
                                          <label for="Rollno" class="control-label col-lg-4">Roll Number<span class="required">*</span></label>
                                          <div class="col-lg-6">
											<select class="form-control" name="Rollno" id="Rollno">
                                            <option value='0'>Select Student</option>
                                            <?PHP
											
												foreach($Students->result() as $std)
												{
													?>
														<option value="<?PHP echo $std->StudentId; ?>" <?PHP if($std->StudentId==$SelectedStudent){ echo 'selected="selected"'; }?> ><?PHP echo $std->Student." ".$std->LastName;?></option>
													<?PHP	
												}
											?>
                                            </select>
                                          </div>
                                           <div class="col-lg-2 err-msg assign-err"><span class="Roll_err"></span> </div>
                                      </div>
                                      
                                   
                                   
                                      
                                      <div class="form-group notificationdiv">
                                         

                                        	 <label for="Notification" class="control-label col-lg-4">Notification:<span class="required"></span></label> 
                                        	 <div class="col-lg-6"> 
														
                                                        <textarea class="form-control" id="Notification" name="Notification"><?PHP echo $SelectedNotification?> </textarea> 
                                              </div>
                                              <div class="col-lg-2 err-msg assign-err"><span class="Notification_err"></span> </div>
                                         
                                      </div>
                                      
                                      
                                      <div class="form-group">
                                          <div class="col-lg-offset-4 col-lg-8">
                                             
                                             <input type="button" class="btn btn-primary " edit_add='edit' name="edittnotification" id="edittnotification" value="Update notification" />
                                             <span style="margin-left:20px" class="update-notification-to-student-resp" ></span>
                                           
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