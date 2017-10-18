<section id="main-content">
  <section class="wrapper">  
 <div class="row">
				<div class="col-lg-12">
                
                <ol class="breadcrumb">

					<li><i class="fa fa-laptop"></i>Parent profie</li>

					</ol>
                
                </div>
			</div>

	<div class="row">
  
                  <div class="col-lg-12">
                 
                      <section class="panel">
                          <header class="panel-heading">
                             View parent profile
                          </header>
                          <?PHP 
						  		echo @$this->session->flashdata('parentprofile');
						  ?>
                          
                          <div class="panel-body">
                          
                          <?PHP
						  
						  if($parent_details=='0')
							$edit_add='add';
						else
							$edit_add='edit';
										
						  		if( $this->input->post('update_profile') )
								{
									$MotherName = $this->input->post('MotherName');
									$FatherName	= $this->input->post('FatherName');
											
									$MotherHighestDegree = $this->input->post('MotherHighestDegree');
									$FatherHighestDegree	= $this->input->post('FatherHighestDegree');
											
									$MotherOccupation = $this->input->post('MotherOccupation');
									$FatherOccupation	= $this->input->post('FatherOccupation');
											
									$ContactNumber1 = $this->input->post('ContactNumber1');
									$ContactNumber2	= $this->input->post('ContactNumber2');
											
									$Address = $this->input->post('Address');
									$StudentId	= $this->input->post('StudentId');
									
								}
								else
								{
									if($parent_details=='0')
									{
											$MotherName = '';
											$FatherName	= '';
											
											$MotherHighestDegree = '';
											$FatherHighestDegree	= '';
											
											$MotherOccupation = '';
											$FatherOccupation	= '';
											
											$ContactNumber1 = '';
											$ContactNumber2	= '';
											
											$Address = '';
											$StudentId	= $this->session->userdata('StudentId');
									}
									else
									{
										$edit_add='edit';
										foreach($parent_details->result() as $details)	
										{
											$MotherName = $details->MotherName;
											$FatherName	= $details->FatherName;
											
											$MotherHighestDegree = $details->MotherHighestDegree;
											$FatherHighestDegree	= $details->FatherHighestDegree;
											
											$MotherOccupation = $details->MotherOccupation;
											$FatherOccupation	= $details->FatherOccupation;
											
											$ContactNumber1 = $details->ContactNumber1;
											$ContactNumber2	= $details->ContactNumber2;
											
											$Address = $details->Address;
											$StudentId	= $details->StudentId;
											
											$ParentId = $details->ParentId;
												
										}
									}//else ends here
								}
								
						  ?>
                          

                              <div class="form col-lg-9">
                                  <form class="form-validate form-horizontal " id="add_student_form" method="post" action="">
                                      
                                      <div class="form-group ">
                                      	
                                        <div class="col-md-12" style="margin-bottom: 15px;">
                                        
                                            <div class="col-md-6">
                                            	<div class="col-md-5" style="float:left" > 
                                                	<label for="ClassName" class="control-label" style="float:left">Mother's Name<span class="required">*</span></label>
                                                </div>
                                                <div class="col-md-7">
                                                <input type="hidden" name="StudentId" value="<?PHP echo $StudentId?>">
                                                <input type="text" name="MotherName" id="MotherName" class="form-control"  placeholder="Mother Name" value="<?PHP echo $MotherName;?>">
                                               <span class="validation-erors"> <?PHP echo form_error('MotherName');?></span>
                                                </div>
                                                <div class="clearfix"></div>
                                             </div>
                                             
                                             
                                             
                                             <div class="col-md-6">
                                            	<div class="col-md-5"> 
                                                	<label for="FatherName" class="control-label" style="float:left">Father's Name<span class="required">*</span></label>
                                                </div>
                                                <div class="col-md-7">
                                                <input type="text" name="FatherName" id="FatherName" class="form-control" placeholder="Father Name" value="<?PHP echo $FatherName;?>">
                                                 <span class="validation-erors"> <?PHP echo form_error('FatherName');?></span>
                                                </div>
                                             <div class="clearfix"></div>
                                             </div>
                                             <div class="clearfix"></div>
                                        
                                        </div>
                                        
                                        <div class="col-md-12" style="margin-bottom: 15px;">
                                        
                                            <div class="col-md-6">
                                            	<div class="col-md-5"> 
                                                	<label for="MotherHighestDegree" class="control-label" style="float:left"> Highest Degree<span class="required">*</span></label>
                                                </div>
                                                <div class="col-md-7">
                                                <input type="text" name="MotherHighestDegree" id="MotherHighestDegree" placeholder="Mother Highest Degree" class="form-control" value="<?PHP echo $MotherHighestDegree;?>">
                                                 <span class="validation-erors"> <?PHP echo form_error('MotherHighestDegree');?></span>
                                                </div>
                                                <div class="clearfix"></div>
                                             </div>
                                             
                                             
                                             
                                             <div class="col-md-6">
                                            	<div class="col-md-5"> 
                                                	<label for="FatherHighestDegree" class="control-label" style="float:left"> Highest Degree<span class="required">*</span></label>
                                                </div>
                                                <div class="col-md-7">
                                                <input type="text" name="FatherHighestDegree" id="FatherHighestDegree" placeholder="Father Highest Degree" class="form-control" value="<?PHP echo $FatherHighestDegree;?>">
                                                
                                                <span class="validation-erors"> <?PHP echo form_error('FatherHighestDegree');?></span>
                                                
                                                </div>
                                                
                                             <div class="clearfix"></div>
                                             </div>
                                             <div class="clearfix"></div>
                                        
                                        </div>
                                        
                                        <div class="col-md-12" style="margin-bottom: 15px;">
                                        
                                            <div class="col-md-6">
                                            	<div class="col-md-5"> 
                                                	<label for="MotherOccupation" class="control-label" style="float:left"> Occupation<span class="required">*</span></label>
                                                </div>
                                                <div class="col-md-7">
                                                <input type="text" name="MotherOccupation" id="MotherOccupation" placeholder="Mother Occupation" class="form-control" value="<?PHP echo $MotherOccupation;?>">
                                                
                                                 <span class="validation-erors"> <?PHP echo form_error('MotherOccupation');?></span>
                                                 
                                                </div>
                                                <div class="clearfix"></div>
                                             </div>
                                             
                                             
                                             
                                             <div class="col-md-6">
                                            	<div class="col-md-5"> 
                                                	<label for="FatherOccupation" class="control-label" style="float:left">Occupation<span class="required">*</span></label>
                                                </div>
                                                <div class="col-md-7">
                                                <input type="text" name="FatherOccupation" id="FatherOccupation" placeholder="Father Occupation" class="form-control" value="<?PHP echo $FatherOccupation;?>">
                                                
                                                <span class="validation-erors"> <?PHP echo form_error('FatherOccupation');?></span>
                                                
                                                </div>
                                             <div class="clearfix"></div>
                                             </div>
                                             <div class="clearfix"></div>
                                        
                                        </div>
                                        
                                        <div class="col-md-12" style="margin-bottom: 15px;">
                                        
                                            <div class="col-md-6">
                                            	<div class="col-md-5"> 
                                                	<label for="ContactNumber1" class="control-label" style="float:left">Contact number<span class="required">*</span></label>
                                                </div>
                                                <div class="col-md-7">
                                                <input type="text" name="ContactNumber1" id="ContactNumber1" placeholder="Contact Number1" class="form-control" value="<?PHP echo $ContactNumber1;?>">
                                                
                                                 <span class="validation-erors"> <?PHP echo form_error('ContactNumber1');?></span>
                                                 
                                                </div>
                                                <div class="clearfix"></div>
                                             </div>
                                             
                                             
                                             
                                             <div class="col-md-6">
                                            	<div class="col-md-5"> 
                                                	<label for="ContactNumber2" class="control-label" style="float:left">Contact number<span class="required">*</span></label>
                                                </div>
                                                <div class="col-md-7">
                                                <input type="text" name="ContactNumber2" id="ContactNumber2" placeholder="Contact Number2" class="form-control" value="<?PHP echo $ContactNumber2;?>">
                                                
                                                 <span class="validation-erors"> <?PHP echo form_error('ContactNumber2');?></span>
                                                 
                                                </div>
                                             <div class="clearfix"></div>
                                             </div>
                                             <div class="clearfix"></div>
                                        
                                        </div>
                                        
                                        <div class="col-md-12" style="margin-bottom: 15px;">
                                        
                                            <div class="col-md-12">
                                            	<div class="col-md-3"> 
                                                	<label for="Address" class="control-label" style="float:left">Addres<span class="required">*</span></label>
                                                </div>
                                                <div class="col-md-9" style="float:left">
                                                <textarea name="Address" class="form-control" id="Address"><?PHP echo $Address;?></textarea>
                                                <input type="hidden" name="edit_add" value="<?PHP echo $edit_add;?>">
                                                
                                                <span class="validation-erors"> <?PHP echo form_error('Address');?></span>
                                                </div>
                                                <div class="clearfix"></div>
                                             </div>
                                            
                                        </div>
                                        
                                        <div class="col-md-12">
                                            	<div class="col-md-10"> 
                                                	<input type="submit" class="btn btn-primary "  name="update_profile" id="update_profile" value="Update Profile" />
                                             <span style="margin-left:20px" class="add-edit-parent-profile-resp" ></span>
                                                </div>
                                                
                                             </div>
                                        
                                        <div class="clearfix"></div>
                                      </div>
                                      
                                      
                                      
                                      
                                      
                          </div>
                      </section>
                  </div>
              </div>          
              
</section          
      ></section>