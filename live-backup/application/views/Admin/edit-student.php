
<section id="main-content">
  <section class="wrapper">  
 <div class="row">
				<div class="col-lg-12">
                
                <ol class="breadcrumb">
					<li><i class="fa fa-home"></i> <a href="<?PHP echo base_url('add-student');?> ">Add student</a></li>
					<li><i class="fa fa-laptop"></i><a href="<?PHP echo base_url('view-students');?> "> View students </a></li>
                    <li>Edit student</li>
					</ol>
                
                </div>
			</div>

	<div class="row">
  
                  <div class="col-lg-12">
                 
                      <section class="panel">
                          <header class="panel-heading">
                             Edit student
                          </header>
                          <div class="panel-body">
                             <?PHP echo @$this->session->flashdata('teacheredited'); ?>
                               <?PHP echo @$this->session->flashdata('failedtoeditTeacher'); ?>
                              <div class="form col-lg-9">
                              
                              <?PHP
							  		
									foreach($student_details->result() as $std)
									{
											$ClassName = $std->ClassName;
											$ClassSection = $std->ClassSection;
											$Students= $std->Student;
											$RollNumber  = $std->Roll;
											$AcademicYear  = $std->AcademicYear;
									}
							  ?>
                              
                                  <form class="form-validate form-horizontal " id="add_student_form" method="post" action="">
                                      
                                      
                                      
                                      
                                      <div class="form-group ">
                                          <label for="ClassName" class="control-label col-lg-4">Class<span class="required">*</span></label>
                                          <div class="col-lg-6">
                                          <input type="hidden" id="stdid" value="<?PHP echo $this->uri->segment(2)?>" />
											<select class="form-control" name="ClassName" id="ClassName">
                                            <?PHP
												
												$class_cnt=0;
												foreach( $classes->result() as $clas)
												{
													if( $class_cnt == 0 )
													{
														?>
                                                        <option value="0">Select Class</option>
                                                        <option value="<?PHP echo $clas->SLNO?>" <?PHP if($clas->SLNO == $ClassName) echo 'selected="selected"'; ?> ><?PHP echo ucwords($clas->ClassName); ?> </option>
                                                        <?PHP	
													}
													else
														{
															?>
                                                             <option value="<?PHP echo $clas->SLNO?>" <?PHP if($clas->SLNO == $ClassName) echo 'selected="selected"'; ?>><?PHP echo ucwords($clas->ClassName); ?> </option>
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
											foreach( $sections->result() as $sec)
											{
												?>
												<option value="<?PHP echo $sec->SectionId?>" <?PHP if($sec->SectionId== $ClassSection) echo 'selected="selected"'; ?>><?PHP echo $sec->Section?></option>
												<?PHP	
											}
											
											?>
                                            </select>
                                          </div>
                                           <div class="col-lg-2 err-msg assign-err"><span class="section_err"></span> </div>
                                      </div>
                                      
                                      
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
												$val = $prev_two_years."-".($prev_two_years+1);
												?>
                                                <option value="<?PHP echo $val?>" <?PHP if($val==$AcademicYear){ echo 'selected="selected"';}?> ><?PHP echo $val?></option>
                                                <?PHP	
											}
											?>
                                        </select>
                                          </div>
                                           <div class="col-lg-2 err-msg assign-err"><span class="academic_err"></span> </div>
                                      </div>
                                      
                                      
                                      <div class="form-group studentdiv morestudents"> <label for="Student" class="control-label col-lg-4">Student:<span class="required"></span></label> <div class="col-lg-3"> <input type="hidden" id="TotalStudents" value="1" /> <input class="form-control Students" name="Students" id="Students" placeholder="Student" value="<?PHP echo $Students;?>" /> </div> <div class="col-lg-3"> <input class="form-control RollNumber" name="RollNumber" id="RollNumber" placeholder="Rollnumber" value="<?PHP echo $RollNumber; ?>" /><span class="err-msg"></span> </div> <div class="col-lg-2 "><span> </span> </div></div>
                                      
                                      <div class="form-group">
                                          <div class="col-lg-offset-4 col-lg-8">
                                             
                                             <input type="button" class="btn btn-primary " edit_add='edit' name="editstudent" id="editstudent" value="Update details" />
                                             <span style="margin-left:20px" class="add-student-resp" ></span>
                                           
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