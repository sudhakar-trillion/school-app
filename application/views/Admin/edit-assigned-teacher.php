
<section id="main-content">
  <section class="wrapper">  
 <div class="row">
				<div class="col-lg-12">
                
                <ol class="breadcrumb">
					<li><i class="fa fa-home"></i> <a href="<?PHP echo base_url('add-teacher');?> ">Add Teacher</a></li>
					<li><i class="fa fa-laptop"></i><a href="<?PHP echo base_url('view-teachers');?> "> View teachers </a></li>
                    <li><i class="fa fa-laptop"></i><a href="<?PHP echo base_url('assign-teachers');?> "> Assign teacher</a></li>
                    <li><i class="fa fa-laptop"></i><a href="<?PHP echo base_url('view-assign-teachers');?> ">View Assigned teacher</a></li>
                    <li>Edit assigned teacher</li>
                    
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


                              <div class="form col-lg-9">
                              
                              <?PHP
							  		
									foreach( $details->result() as $assign)
									{
										$TeacherName = $assign->TeacherId;
										$ClassName = $assign->ClassSlno;
										$sections = $assign->Section;	
										$Subject =  $assign->Subject;	
									}
								
								
								
							  ?>
                              
                              
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
                                                        <option value="0" <?PHP if( $TeacherName=='0') echo 'selected="selected"'; ?>  >Select Teacher</option>
                                                        <option value="<?PHP echo $teacher->TeacherId?>"  <?PHP if( $TeacherName==$teacher->TeacherId) echo 'selected="selected"'; ?>><?PHP echo ucwords($teacher->TeacherName); ?> </option>
                                                        <?PHP	
													}
													else
														{
															?>
                                                            <option value="<?PHP echo $teacher->TeacherId?>"  <?PHP if( $TeacherName==$teacher->TeacherId) echo 'selected="selected"'; ?>><?PHP echo ucwords($teacher->TeacherName); ?> </option>
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
                                                        <option value="0" <?PHP if($ClassName=='0') echo 'selected="selected"';?>  >Select Class</option>
                                                        <option value="<?PHP echo $clas->SLNO?>" <?PHP if($ClassName==$clas->SLNO) echo 'selected="selected"';?>><?PHP echo ucwords($clas->ClassName); ?> </option>
                                                        <?PHP	
													}
													else
														{
															?>
                                                             <option value="<?PHP echo $clas->SLNO?>" <?PHP if($ClassName==$clas->SLNO) echo 'selected="selected"';?> ><?PHP echo ucwords($clas->ClassName); ?> </option>
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
											foreach($section->result() as $sec)
											{
												?>
                                                <option value="<?PHP echo $sec->SectionId?>" <?PHP if($sections==$sec->SectionId) echo 'selected="selected"'; ?> ><?PHP echo $sec->Section?></option>
                                                <?PHP	
											}
											?>
                                            </select>
                                          </div>
                                           <div class="col-lg-2 err-msg assign-err"><span class="section_err"></span> </div>
                                      </div>
                                      
                                      <div class="form-group subjectdiv">
                                          <label for="subjects" class="control-label col-lg-4">Subject<span class="required">*</span></label>
                                          <div class="col-lg-6">
											 <select name="subjects[]" id="subjects" class="subjects form-control" multiple="multiple">
                                          
                                            <?PHP
												if($subject!='0')
												{
													foreach($subject->result() as $sub)
													{
														?>
                                                        <option value="<?PHP echo $sub->SubjectId; ?>" <?PHP if($Subject==$sub->SubjectId){ echo 'selected="selected"'; }?>  > <?PHP echo $sub->SubjectName; ?> </option>
                                                        <?PHP
													}
												}
											?>
                                            
                                            </select>
                                          </div>
                                           <!--
                                           <div class="col-lg-2 err-msg assign-err"><span class="subject_err"></span> </div>
                                           <div class="col-lg-2 addmore"><span> + </span> </div>
                                          -->
                                      </div>
                                      
                                      
                                      
                                      <div class="form-group ">
                                          <label for="sections" class="control-label col-lg-4">Class Teacher<span class="required">*</span></label>
                                          <div class="col-lg-6">
											<input type="radio" class="classteacher" name="classteacher" value="Yes" <?PHP if( $ClassTeacher == "Yes" ){ echo 'checked="checked"';}?>  /> Yes<br />
											<input type="radio" class="classteacher" name="classteacher" value="No" <?PHP if( $ClassTeacher == "No" ){ echo 'checked="checked"';}?> /> No
                                          </div>
                                           <div class="col-lg-2 err-msg assign-err"></div>
                                      </div>
                                      
                                      <div class="form-group">
                                          <div class="col-lg-offset-4 col-lg-8">
                                             <input type="hidden" id="teacherassigned_id" value="<?PHP echo $this->uri->segment(2);?>" />
                                             <input type="button" class="btn btn-primary " edit_add='edit' name="assignteacher_btn" id="edit_assignteacher_btn" value="Update details" />
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