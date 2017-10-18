
<section id="main-content">
  <section class="wrapper">  
 <div class="row">
				<div class="col-lg-12">
                
                <ol class="breadcrumb">
					<li><i class="fa fa-home"></i> <a href="<?PHP echo base_url('add-teacher');?> ">Add Teacher</a></li>
					<li><i class="fa fa-laptop"></i><a href="<?PHP echo base_url('view-teachers');?> "> View teachers </a></li>
                    <li>Assign teacher</li>
					</ol>
                
                </div>
			</div>

	<div class="row">
  
                  <div class="col-lg-12">
                 
                      <section class="panel">
                          <header class="panel-heading">
                             Edit teacher
                          </header>
                          <div class="panel-body">
                             <?PHP echo @$this->session->flashdata('teacheredited'); ?>
                               <?PHP echo @$this->session->flashdata('failedtoeditTeacher'); ?>
                              <div class="form col-lg-9">
                              
                              
                              
                                  <form class="form-validate form-horizontal " id="assign_teacher_form" method="post" action="">
                                      
                                      <div class="form-group ">
                                          <label for="TeacherName" class="control-label col-lg-4">Teacher name<span class="required">*</span></label>
                                          <div class="col-lg-6">
											<select class="form-control" name="TeacherName" id="TeacherName">
                                            <?PHP
												
												$teacher_cnt=0;
												foreach( $teachers->result() as $teacher)
												{
													if( $teacher_cnt == 0 )
													{
														?>
                                                        <option value="0">Select Teacher</option>
                                                        <option value="<?PHP echo $teacher->TeacherId?>"><?PHP echo ucwords($teacher->TeacherName); ?> </option>
                                                        <?PHP	
													}
													else
														{
															?>
                                                            <option value="<?PHP echo $teacher->TeacherId?>"><?PHP echo ucwords($teacher->TeacherName); ?> </option>
                                                            <?PHP
														}
													$teacher_cnt++;
													
												}
											?>
                                            
                                            </select>
                                          </div>
                                           <div class="col-lg-2 err-msg assign-err"><span class="TeacherName_err"></span> </div>
                                      </div>
                                      
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
                                      
                                      <div class="form-group subjectdiv">
                                          <label for="subjects" class="control-label col-lg-4">Subject<span class="required">*</span></label>
                                          <div class="col-lg-6">
											<!--<input class="form-control subjects" name="subjects" placeholder="Subject" />-->
                                            
                                            <select name="subjects[]" id="subjects" class="subjects form-control" multiple="multiple">
                                          
                                            <?PHP
												if($subject!='0')
												{
													foreach($subject->result() as $sub)
													{
														?>
                                                        <option value="<?PHP echo $sub->SubjectId; ?>" > <?PHP echo $sub->SubjectName; ?> </option>
                                                        <?PHP
													}
												}
											?>
                                            
                                            </select>
                                            
                                            
                                          </div>
                                          <!--
                                           <div class="col-lg-2 err-msg assign-err"><span class="subject_err"></span> </div>
                                           <div class="col-lg-2 addmore"><span> + </span> </div>-->
                                      </div>
                                      
                                      <div class="form-group ">
                                          <label for="sections" class="control-label col-lg-4">Class Teacher<span class="required">*</span></label>
                                          <div class="col-lg-6">
											<input type="radio" class="classteacher" name="classteacher" value="Yes" /> Yes<br />
											<input type="radio" class="classteacher" name="classteacher" value="No" /> No
                                          </div>
                                           <div class="col-lg-2 err-msg assign-err"></div>
                                      </div>
                                      
                                      
                                      <div class="form-group">
                                          <div class="col-lg-offset-4 col-lg-8">
                                             
                                             <input type="button" class="btn btn-primary " edit_add='add' name="assignteacher_btn" id="assignteacher_btn" value="Assign teacher" />
                                             <span style="margin-left:20px" class="assigned-submission-resp" ></span>
                                           
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