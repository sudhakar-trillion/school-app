
<section id="main-content">
  <section class="wrapper">  
 <div class="row">
				<div class="col-lg-12">
                
                <ol class="breadcrumb">
						<li><i class="fa fa-home"></i><a href="<?PHP echo base_url();?>"> Dashboard</a></li>
						<li><i class="fa fa-plus"></i>Add student activity</li>

					</ol>
                
                </div>
			</div>

	<div class="row">
  
                  <div class="col-lg-12">
                 
                      <section class="panel">
                          <header class="panel-heading">
                             Add student activity
                          </header>
                          <?PHP 
						  		echo @$this->session->flashdata('evenpic_added');
						  ?>
                          
                          <div class="panel-body">

                              <div class="form col-lg-9">
                                  <form class="form-validate form-horizontal" method="post" action="" enctype="multipart/form-data">
                                      
                                      <div class="form-group ">
                                          <label for="ClassName" class="control-label col-lg-4">Class<span class="required">*</span></label>
                                          <div class="col-lg-6">
											<select class="form-control ClassName" name="ClassName" id="ClassName">
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
                                           <div class="col-lg-2 err-msg assign-err"><span class="ClassName_err"><?PHP echo form_error('ClassName')?></span> </div>
                                      </div>
                                      
                                      
                                      <div class="form-group ">
                                          <label for="sections" class="control-label col-lg-4">Section<span class="required">*</span></label>
                                          <div class="col-lg-6">
											<select class="form-control" name="sections" id="sections">
                                            <option value='0'>Select Section</option>
                                            </select>
                                          </div>
                                           <div class="col-lg-2 err-msg assign-err"><span class="section_err"><?PHP echo form_error('sections')?></span> </div>
                                      </div>
                                      
                                      <div class="form-group ">
                                          <label for="Rollno" class="control-label col-lg-4">Student<span class="required">*</span></label>
                                          <div class="col-lg-6">
											<select class="form-control" name="Rollno" id="Rollno">
                                            <option value='0'>Select Student</option>
                                            </select>
                                          </div>
                                           <div class="col-lg-2 err-msg assign-err"><span class="Roll_err"><?PHP echo form_error('Rollno')?></span> </div>
                                      </div>
                                      
                                      
                                      
                                      

                                    <div class="form-group notificationdiv">
                                    
                                        <label for="ActivityTitle" class="control-label col-lg-4">Activity Title<span class="required"></span></label> 
                                        <div class="col-lg-6"> 
                                        
                                       <input id="ActivityTitle" type="text" name="ActivityTitle" class="form-control ActivityTitle" value="">
                                       
                                        </div>
                                        <div class="col-lg-2 err-msg assign-err"><span class="ActivityTitle_err"><?PHP echo form_error('ActivityTitle')?></span> </div>
                                    
                                 </div>
                                 
                                 <div class="form-group notificationdiv">
                                    
                                        <label for="ActivityDated" class="control-label col-lg-4">Activity Date<span class="required"></span></label> 
                                        <div class="col-lg-6"> 
                                        
                                       <input id="ActivityDated" name="ActivityDated" type="text" placeholder="<?PHP echo date('d-m-Y'); ?>"  class="form-control ActivityDated" value="">
                                       
                                        </div>
                                        <div class="col-lg-2 err-msg assign-err"><span class="ActivityDated_err"><?PHP echo form_error('ActivityDated')?></span> </div>
                                    
                                 </div>

                                      <div class="form-group notificationdiv">
                                         

                                        	 <label for="ActivityPics" class="control-label col-lg-4">Activity Pics<span class="required"></span></label> 
                                        	 <div class="col-lg-6"> 
												
                                                <input type="file" name="ActivityPics[]" accept="image/*" class="form-control" multiple='multiple'  style="background: rgba(57, 74, 89, 0.07);" />
											
                                              </div>
                                              <div class="col-lg-2 err-msg assign-err"><span class="homework_err"><?PHP echo form_error('ActivityPics')?></span> </div>
                                         
                                      </div>
                                      
                                      
                                      
                                      
                                      <div class="form-group">
                                          <div class="col-lg-offset-4 col-lg-8">
                                             
                                             <input type="submit" class="btn btn-primary " edit_add='add' name="addactivity" id="addactivity" value="Add   Student Activity" />
                                             <span style="margin-left:20px" class="add-home-work-resp" ></span>
                                           
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