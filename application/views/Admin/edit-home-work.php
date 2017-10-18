
<section id="main-content">
  <section class="wrapper">  
 <div class="row">
				<div class="col-lg-12">
                
                <ol class="breadcrumb">
					<li><i class="fa fa-home"></i> <a href="<?PHP echo base_url('dashboard');?> ">Dashboard</a></li>
                    <li><i class="fa fa-plus"></i> <a href="<?PHP echo base_url('add-homework-to-student');?> ">Add home work</a></li>
                    <li><i class="fa fa-desktop"></i><a href="<?PHP echo base_url('view-homework-to-student')?>">View home works</a></li>
                    <li>Edit home work</li>
					</ol>
                
                </div>
			</div>

	<div class="row">
  
                  <div class="col-lg-12">
                 
                      <section class="panel">
                          <header class="panel-heading">
                             Edit homework
                          </header>
                          <div class="panel-body">

                              <div class="form col-lg-9">
                              <?PHP
							  		
									foreach( $homeworks->result() as $data)
									{
										$ClassName = $data->ClassSlno;
										$section = $data->ClassSection;
										
										$Rollno = $data->StudentId;
										$subject = $data->SubjectId;
										
										$homeworkdate = date_create($data->HomeWorkOn);
										$homeworkdate = date_format($homeworkdate,"d-m-Y");
										
										
										$homework = $data->HomeWork;
										
									}
									
									$subjId = array();
									$subjectNames = array();
									
									foreach($Subjects->result() as $subj)
									{
										//$subjId[] =$subj->SubjectId;
										$subjectNames['subjects'][$subj->SubjectId] = $subj->SubjectName;
									}

									/*
									echo "<pre>";
										print_r($AssingedSubjects->result());
									echo "</pre>$subject";
									
									echo "<pre>";
										print_r($subjectNames['subjects']);
									echo "</pre>";
									*/
									
							  ?>
                              
                              
                              
                                  <form class="form-validate form-horizontal " id="add_homework_form" method="post" action="">
                                      
                                      <div class="form-group ">
                                      <input type="hidden" id="assignedhomeworkid" value="<?PHP echo $this->uri->segment(2)?>" />
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
                                                        <option value="<?PHP echo $clas->SLNO?>" <?PHP if($ClassName==$clas->SLNO){ echo 'selected="selected"';}?> ><?PHP echo ucwords($clas->ClassName); ?> </option>
                                                        <?PHP	
													}
													else
														{
															?>
                                                             <option value="<?PHP echo $clas->SLNO?>" <?PHP if($ClassName==$clas->SLNO){ echo 'selected="selected"';}?>><?PHP echo ucwords($clas->ClassName); ?> </option>
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
                                                    <option value='<?PHP echo $sec->SectionId?>' <?PHP if($section==$sec->SectionId){ echo ' selected="selected"'; }  ?>><?PHP echo $sec->Section?></option>
                                                    <?PHP
												}
											?>
                                            </select>
                                          </div>
                                           <div class="col-lg-2 err-msg assign-err"><span class="section_err"></span> </div>
                                      </div>
                                      
                                      <div class="form-group ">
                                          <label for="Rollno" class="control-label col-lg-4">Student<span class="required">*</span></label>
                                          <div class="col-lg-6">
											<select class="form-control" name="Rollno" id="Rollno">
                                            <option value='0'>Select Student</option>
                                            <?PHP
												foreach($Students->result() as $std)
												{
													?>
                                                     <option value='<?PHP echo $std->StudentId?>' <?PHP if($Rollno==$std->StudentId){ echo 'selected="selected"';}?> ><?PHP echo $std->Student." ".$std->LastName?></option>
                                                    <?PHP	
												}
											?>
                                            </select>
                                          </div>
                                           <div class="col-lg-2 err-msg assign-err"><span class="Roll_err"></span> </div>
                                      </div>
                                      
                                      
                                      <div class="form-group ">
                                          <label for="Rollno" class="control-label col-lg-4">Select subject<span class="required">*</span></label>
                                          <div class="col-lg-6">
											<select class="form-control" name="subject" id="subject">
                                            <option value='0'>Select Subject</option>
                                            <?PHP
											
											foreach($AssingedSubjects->result() as $sub)
											{
											?>
                                            <option value='<?PHP echo $sub->SubjectAssigned;?>' <?PHP if( $sub->SubjectAssigned == $subject ){  echo 'selected="selected"'; }?> ><?PHP echo $subjectNames['subjects'][$sub->SubjectAssigned];?></option>
                                            <?PHP	
											}
											
											?>
                                            
                                            </select>
                                          </div>
                                           <div class="col-lg-2 err-msg assign-err"><span class="subject_err"></span> </div>
                                      </div>
                                      

                                    <div class="form-group notificationdiv">
                                    
                                        <label for="Notification" class="control-label col-lg-4">Date:<span class="required"></span></label> 
                                        <div class="col-lg-6"> 
                                        
                                       <input id="homeworkdate" type="text" placeholder="<?PHP echo date('d-m-Y'); ?>"  class="form-control homeworkdate" value="<?PHP echo $homeworkdate;?>">
                                       
                                        </div>
                                        <div class="col-lg-2 err-msg assign-err"><span class="homeworkdate_err"></span> </div>
                                    
                                 </div>

                                      <div class="form-group notificationdiv">
                                         

                                        	 <label for="Notification" class="control-label col-lg-4">Homework:<span class="required"></span></label> 
                                        	 <div class="col-lg-6"> 
														
                                                        <textarea class="form-control" id="homework" name="homework" rows=6><?PHP echo $homework;?> </textarea> 
                                              </div>
                                              <div class="col-lg-2 err-msg assign-err"><span class="homework_err"></span> </div>
                                         
                                      </div>
                                      
                                      
                                      
                                      
                                      <div class="form-group">
                                          <div class="col-lg-offset-4 col-lg-8">
                                             
                                             <input type="button" class="btn btn-primary " edit_add='edit' name="updatehomework" id="updatehomework" value="Update Home-Work" />
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