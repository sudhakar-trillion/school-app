
<section id="main-content">
  <section class="wrapper">  
 <div class="row">
				<div class="col-lg-12">
                
                <ol class="breadcrumb">
<!--						<li><i class="fa fa-home"></i> <a href="<?PHP echo base_url('dashboard');?> ">Dashboard </a></li> -->
						<li><i class="fa fa-laptop"></i>Manage Marks Allocation</li>						  	
					</ol>
                
                </div>
			</div>
            
            
        
        <div class="row">
        
            <div class="col-lg-12">
            
                <section class="panel">
                
                    <header class="panel-heading"> Allocate Marks  </header>

                    <div class="panel-body">
                    <div class="form col-lg-9">
                              
                              
                              
                                  <form class="form-validate form-horizontal " id="assign_teacher_form" method="post" action="">
                                      
                                      <div class="form-group ">
                                          <label for="ClassName" class="control-label col-lg-4">Class<span class="required">*</span></label>
                                          <div class="col-lg-6">
											<select class="form-control allocate-marks-class" name="ClassName" id="ClassName">
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
											<select class="form-control allocate-marks-section" name="sections" id="sections">
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
                                          <label for="TeacherName" class="control-label col-lg-4">Teacher name<span class="required">*</span></label>
                                          <div class="col-lg-6">
											<select class="form-control" name="TeacherName" id="TeacherName">
                                           		<option value="0">Select Teacher</option>
                                            </select>
                                          </div>
                                           <div class="col-lg-2 err-msg assign-err"><span class="TeacherName_err"></span> </div>
                                      </div>
                                      
                                      <div class="form-group ">
                                          <label for="TeacherName" class="control-label col-lg-4">Subjects<span class="required">*</span></label>
                                          <div class="col-lg-6">
											<select class="form-control" name="Subject" id="Subject">
                                           		<option value="0">Select Subject</option>
                                            </select>
                                          </div>
                                           <div class="col-lg-2 err-msg assign-err"><span class="Subject_err"></span> </div>
                                      </div>
                                      
                                      <div class="form-group ">
                                          <label for="TeacherName" class="control-label col-lg-4">Select Exam<span class="required">*</span></label>
                                          <div class="col-lg-6">
											<select class="form-control" name="Exam" id="Exam">
                                           		<option value="0">Select Exam</option>
                                                <?PHP
													foreach( $exams->result() as $exam)
													{
														
														?>
                                                        <option  value="<?PHP echo $exam->ExamId; ?>">  <?PHP echo $exam->Exam; ?> </option>
                                                        <?PHP	
													}
												?>
                                            </select>
                                          </div>
                                           <div class="col-lg-2 err-msg assign-err"><span class="Exam_err"></span> </div>
                                      </div> 
                                      
                                      <div class="form-group ">
                                          <label for="TeacherName" class="control-label col-lg-4">Total Marks<span class="required">*</span></label>
                                          <div class="col-lg-6">
											<input type="text" name="TotalMarks" id="TotalMarks" class="form-control" placeholder="Total Marks" />
                                          </div>
                                           <div class="col-lg-2 err-msg assign-err"><span class="TotalMarks_err"></span> </div>
                                      </div>
                                      
                                      <div class="form-group ">
                                          <label for="TeacherName" class="control-label col-lg-4">SecuredMarks Marks<span class="required">*</span></label>
                                          <div class="col-lg-6">
											<input type="text" name="SecuredMarks" id="SecuredMarks" class="form-control" placeholder="Secured Marks" />
                                          </div>
                                           <div class="col-lg-2 err-msg assign-err"><span class="SecuredMarks_err"></span> </div>
                                      </div>
                                      
                                      
                                      
                                      
                                      
                                      
                                      <div class="form-group">
                                          <div class="col-lg-offset-4 col-lg-8">
                                             
                                             <input type="button" class="btn btn-primary " edit_add='add' name="allocatemarks_btn" id="allocatemarks_btn" value="Allocate marks" />
                                             <span style="margin-left:20px" class="allocate-marks-resp" ></span>
                                           
                                          </div>
                                      </div>
                                  </form>
                              </div>
                    
                    
                    
                    
                    </div>
              </section>
          </div>
        </div>
              
</section>
</section>
      
      
      
      