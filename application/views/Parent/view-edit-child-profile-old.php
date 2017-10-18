<section id="main-content">
  <section class="wrapper">  
 <div class="row">
				<div class="col-lg-12">
                
                <ol class="breadcrumb">

					<li><i class="fa fa-laptop"></i>Child profie</li>

					</ol>
                
                </div>
			</div>

	<div class="row">
  
  
  
                  <div class="col-lg-12">
                 
                      <section class="panel">
                          <header class="panel-heading">
                             View child profile
                          </header>
                          <div class="form col-lg-12" style="margin-top:50px">
                            
                            <?PHP
									foreach($student_details->result() as $student)
									{
										$FirstName = $student->Student;
										$LastName = $student->LastName;
										$BloodGroup = $student->BloodGroup;	
										$ProfileIPic = $student->ProfileIPic;
									}
							?>    
                                 <div class="col-lg-3">
                                 <div class="profile_pic">
                                 <img src="<?PHP echo $ProfileIPic;?>" />
                                <form id="uploadimage" action="" method="post" enctype="multipart/form-data">
                                    <label for="imageUpload" class="btn btn-primary btn-block btn-outlined">Select Picture</label>
                                    <input type="file" id="imageUpload"  name="file" style="display: none" accept="image/*" />
                                    <input type="submit" value="upload" class="btn btn-primary btn-block btn-outlined up_submit" />
                                 </form>
                                 
                                 <p style="margin-top:40px; color:red" id="message"></p>
                                 
                                 </div>
                                 
                                 </div>
                                 

                                 
                                 <div class="col-lg-9 studentform">
                                  <form class="form-validate form-horizontal " id="child_profile" method="post" action="" enctype="multipart/form-data">
                                      
                                      <div class="form-group ">
                                          <label for="ClassName" class="control-label col-lg-3">First Name<span class="required">*</span></label>
                                          <div class="col-lg-9">
											<input type="text" name="FirstName" id="FirstName" class="form-control" placeholder="First Name" value="<?PHP echo $FirstName ?>" />
                                            
                                            
                                            
                                          </div>
                                           <div class="col-lg-2 err-msg"><span><?PHP echo form_error('ClassName')?></span> </div>
                                      </div>
                                      
                                      <div class="form-group ">
                                          <label for="ClassName" class="control-label col-lg-3">Last Name<span class="required">*</span></label>
                                          <div class="col-lg-9">
											<input type="text" name="LastName" id="LastName" class="form-control" placeholder="last Name" value="<?PHP echo $LastName ?>" />
                                            
                                            
                                            
                                          </div>
                                           <div class="col-lg-2 err-msg"><span><?PHP echo form_error('ClassName')?></span> </div>
                                      </div>
                                      
                                      <div class="form-group ">
                                          <label for="BloodGroup" class="control-label col-lg-3">Blood Group<span class="required">*</span></label>
                                          <div class="col-lg-9">
											<input type="text" name="BloodGroup" id="BloodGroup" class="BloodGroup form-control"  value="<?PHP echo $BloodGroup ?>"  placeholder="last Name" />
                                             <input type="hidden" name="StudentId" id="StudentId" value="<?PHP echo $this->session->userdata('StudentId');?>" />
                                            
                                            
                                            
                                          </div>
                                           <div class="col-lg-2 err-msg"><span><?PHP echo form_error('ClassName')?></span> </div>
                                      </div>
                                      
                                      <div class="form-group ">
                                          <label for="Hobbies" class="control-label col-lg-3">Hobbies<span class="required">*</span></label>
                                         
                                         <?PHP
										 if($hobbies_details!='0')
										 {
											 $hob_cnt=0;
											 foreach($hobbies_details->result() as $hobbie)
											 {
												?>
													<div class="col-lg-3 Hobbies_div" style="position:relative">
														<input type="text" name="Hobbies" id="Hobbies" style="width:95%" class="Hobbies form-control" placeholder="Hobby" value="<?PHP echo $hobbie->Hobby?>" />
                                                        <?PHP 
															if($hob_cnt==0)
															{
															?>		
                                                            <span hobbieide="<?PHP echo $hobbie->HobbyId?>" class="addmore addmorehobbies" style="float:left">+</span>
                                                            <?PHP
															}
															else
															{
																?>
                                                                <span class="remove_more addmore removemorehobbies" hobbieide='<?PHP echo $hobbie->HobbyId?>' style="float:left">X</span>
                                                                <?PHP	
															}
															$hob_cnt++;
															?>
                                          			</div>		
												 <?PHP
											 }
										 ?>
                                         
                                          
                                          <?PHP
										 }
										 else
										 {
											?>
                                            <div class="col-lg-3 Hobbies_div" style="position:relative">
                                           
											<input type="text" name="Hobbies" id="Hobbies" style="width:95%" class="Hobbies form-control" placeholder="Hobby" />
                                          <span class="addmore addmorehobbies" hobbieide='0' style="float:left">+</span>
                                          </div>
                                            <?PHP 
										 }
										  ?>
                                          
                                          <div class="clearfix"> </div>
                                           
                                      </div>
                                      
                                      <div class="form-group ">
                                          <label for="Extrac_curr" class="control-label col-lg-3">Extra curricular activities<span class="required">*</span></label>									
                                          <?PHP
										  	if($Extracircular_details!='0')
											{
												$xtra_cnt=0;
												foreach($Extracircular_details->result() as $extra)	
												{
													
													?>
                                          			<div class="col-lg-3 Extra_curr_div" style="position:relative">
											<input type="text" name="Extra_curr" id="Extra_curr" style="width:95%" class="Extra_curr form-control" placeholder="Activity" value="<?PHP echo $extra->ExtraActivity;?>" />
                                           <?PHP
                                           if($xtra_cnt==0)
										   {
										   ?>
                                          <span activity_ide="<?PHP echo $extra->ExtracActId;?>" class="addmore addmoreactivities" style="float:left">+</span>
                                          <?PHP
										   }
										   else
										   {
											?>
                                            <span activity_ide="<?PHP echo $extra->ExtracActId;?>" class=" remove_more addmore removemoreactivities" style="float:left">X</span>
                                            <?PHP   
										   }
										  ?>
                                          </div>          
                                                    
                                                    <?PHP	
													$xtra_cnt++;
												}
											}
											else
											{
										  ?>
                                          
                                          <div class="col-lg-3 Extra_curr_div" style="position:relative">
											<input type="text" name="Extra_curr" id="Extra_curr" style="width:95%" class="Extra_curr form-control" placeholder="Activity" />
                                          <span class="addmore addmoreactivities activity_ide='0'" style="float:left">+</span>
                                          </div>
                                          <?PHP
											}
											?>
                                          
                                          
                                          <div class="clearfix"> </div>
                                           
                                      </div> 
                                      
                                      
                                      <div class="form-group ">
                                          <label for="IdMarks" class="control-label col-lg-3">Identification Marks<span class="required">*</span></label>
                                         
                                         <?PHP
										 if($identificationmarks_details!='0')
										 {
											 $marks_cnt=0;
											foreach( $identificationmarks_details->result() as $marks) 
											{
												
												?>
                                                <div class="col-lg-3 IdMarks_div" style="position:relative">
											<input type="text" name="IdMarks" id="IdMarks" style="width:95%" class="IdMarks form-control" placeholder="identification Mark" value="<?PHP echo $marks->IdentificationMark;?>" />
                                                <?PHP
                                                if($marks_cnt==0)
												{
													?>
													  <span class="addmore addmoreIdMarks" marksIde="<?PHP echo $marks->Markid;?>" style="float:left">+</span>
                                                     <?PHP
												}
												else
												{
													?>
                                                    <span class="remove_more addmore removemoreactivities" marksIde="<?PHP echo $marks->Markid;?>" style="float:left">X</span>
                                                    <?PHP	
												}
												
												$marks_cnt++;
												?>
                                                </div>
                                                <?PHP
											}
										 }
										 else
										 {
										 ?>
                                          <div class="col-lg-3 IdMarks_div" style="position:relative">
											<input type="text" name="IdMarks" id="IdMarks" style="width:95%" class="IdMarks form-control" placeholder="identification Mark" />
                                          <span class="addmore addmoreIdMarks" marksIde='0' style="float:left">+</span>
                                          </div>
                                          <?PHP
										 }
										  ?>
                                          
                                          <div class="clearfix"> </div>
                                           
                                      </div>
                                      
                                      <!--
                                       
                                       <div class="form-group ">
                                          <label for="BloodGroup" class="control-label col-lg-4">Child profile pic<span class="required">*</span></label>
                                          <div class="col-lg-6">
											
                                            <input type="file" name="profile_pic" id="profile_pic" class="form-control" />
                                            
                                            
                                            
                                          </div>
                                           <div class="col-lg-2 err-msg"><span><?PHP echo form_error('ClassName')?></span> </div>
                                      </div>

										  -->                                    
                                     
                                      <div class="form-group">
                                          <div class="col-lg-offset-4 col-lg-8 text-right">
                                             
                                             <input type="button" class="btn btn-primary " name="add_edit_child_profile" id="add_edit_child_profile" value="Update child profile" style="margin-bottom:20px;" />
                                           <span class="succ_fail_msg" style="margin-left:20px"></span>
                                          </div>
                                      </div>
                                  </form>
                                  </div>
                                  
                                  <div class="clearfix"></div>
                                  
                          </div>
                      </section>
                  </div>
              </div>          
              
</section >

</section>