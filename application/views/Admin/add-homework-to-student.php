
<section id="main-content">
  <section class="wrapper">  
 <div class="row">
				<div class="col-lg-12">
                
                <ol class="breadcrumb">
						<li><i class="fa fa-home"></i><a href="<?PHP echo base_url();?>"> Dashboard</a></li>
						<li><i class="fa fa-laptop"></i>Add home work</li>

					</ol>
                
                </div>
			</div>

	<div class="row">
  
                  <div class="col-lg-12">
                 
                      <section class="panel">
                          <header class="panel-heading">
                             Add homework
                          </header>
                          <div class="panel-body">

                              <div class="form col-lg-9">
                                  <form class="form-validate form-horizontal " id="add_homework_form" method="post" action="">
                                      
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
                                          <label for="Rollno" class="control-label col-lg-4">Student<span class="required">*</span></label>
                                          <div class="col-lg-6">
											<select class="form-control" name="Rollno" id="Rollno">
                                            <option value='0'>Select Student</option>
                                            </select>
                                          </div>
                                           <div class="col-lg-2 err-msg assign-err"><span class="Roll_err"></span> </div>
                                      </div>
                                      
                                      
                                      <div class="form-group ">
                                          <label for="Rollno" class="control-label col-lg-4">Select subject<span class="required">*</span></label>
                                          <div class="col-lg-6">
											<select class="form-control" name="subject" id="subject">
                                            <option value='0'>Select Subject</option>
                                            </select>
                                          </div>
                                           <div class="col-lg-2 err-msg assign-err"><span class="subject_err"></span> </div>
                                      </div>
                                      

                                    <div class="form-group notificationdiv">
                                    
                                        <label for="Notification" class="control-label col-lg-4">Date:<span class="required"></span></label> 
                                        <div class="col-lg-6"> 
                                        
                                       <input id="homeworkdate" type="text" placeholder="<?PHP echo date('d-m-Y'); ?>"  class="form-control homeworkdate" value="">
                                       
                                        </div>
                                        <div class="col-lg-2 err-msg assign-err"><span class="homeworkdate_err"></span> </div>
                                    
                                 </div>

                                      <div class="form-group notificationdiv">
                                         

                                        	 <label for="Notification" class="control-label col-lg-4">Homework:<span class="required"></span></label> 
                                        	 <div class="col-lg-6"> 
														
                                                        <textarea class="form-control" id="homework" name="homework"> </textarea> 
                                              </div>
                                              <div class="col-lg-2 err-msg assign-err"><span class="homework_err"></span> </div>
                                         
                                      </div>
                                      
                                      
                                      
                                      
                                      <div class="form-group">
                                          <div class="col-lg-offset-4 col-lg-8">
                                             
                                             <input type="button" class="btn btn-primary " edit_add='add' name="addhomework" id="addhomework" value="Add  Home-Work" />
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