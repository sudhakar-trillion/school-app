
<section id="main-content">
  <section class="wrapper">  
 <div class="row">
				<div class="col-lg-12">
                
                <ol class="breadcrumb">
					<li><i class="fa fa-home"></i> <a href="<?PHP echo base_url('dashboard');?> ">Dashboard</a></li>
                    <li><i class="fa fa-plus"> </i><a href="<?PHP echo base_url('add-subjects');?>">Add subjects</a> </li>
					<li><i class="fa fa-laptop"></i><a href="<?PHP echo base_url('view-subjects');?> "> View subjects</a></li>
                    <li><i class="fa fa-plus"> </i><a href="<?PHP echo base_url('assign-subject-class'); ?>">Assign subject to class</a></li>
                    <li><i class="fa fa-desktop"> </i><a href="<?PHP echo base_url('view-assigned-subjects'); ?>">View assigned subject</a></li>
                    <li> Edit assigned subject</li>
					</ol>
                
                </div>
			</div>

	<div class="row">
  
                  <div class="col-lg-12">
                 
                      <section class="panel">
                          <header class="panel-heading">
                             Assign subjects to a class
                          </header>
                          <div class="panel-body">
                        
                              <div class="form col-lg-9">

                                  <form class="form-validate form-horizontal " id="assign_subjects_form" method="post" action="">
                                      
                                      <div class="form-group ">
                                          <label for="ClassName" class="control-label col-lg-4">Class<span class="required"></span></label>
                                          <div class="col-lg-6">
											<select class="form-control" name="ClassName" id="ClassName" disabled="disabled">
                                            <?PHP
												$selected_cls = $this->uri->segment(2);
												
												$class_cnt=0;
												foreach( $classes->result() as $clas)
												{
													if( $class_cnt == 0 )
													{
														?>
                                                        <option value="0">Select Class</option>
                                                        <option value="<?PHP echo $clas->SLNO?>" <?PHP if( $clas->SLNO == $selected_cls ) { echo 'selected="selected"'; } ?> ><?PHP echo ucwords($clas->ClassName); ?> </option>
                                                        <?PHP	
													}
													else
														{
															?>
                                                             <option value="<?PHP echo $clas->SLNO?>" <?PHP if( $clas->SLNO == $selected_cls ) { echo 'selected="selected"'; } ?> ><?PHP echo ucwords($clas->ClassName); ?> </option>
                                                            <?PHP
														}
													$class_cnt++;
													
												}
											?>
                                            
                                            </select>
                                            <input type="hidden" id="selectedclass" value="<?PHP echo $selected_cls; ?>" />
                                          </div>
                                           <div class="col-lg-2 err-msg assign-err"><span class="ClassName_err"></span> </div>
                                      </div>
                                      
                                      
                                      <!--<div class="form-group ">
                                          <label for="sections" class="control-label col-lg-4">Section<span class="required">*</span></label>
                                          <div class="col-lg-6">
											<select class="form-control" name="sections" id="sections">
                                            <option value='0'>Select Section</option>
                                            </select>
                                          </div>
                                           <div class="col-lg-2 err-msg assign-err"><span class="section_err"></span> </div>
                                      </div>-->
                                      
                                      <div class="form-group subjectdiv">
                                          <label for="subjects" class="control-label col-lg-4">Subject<span class="required">*</span></label>
                                          <div class="col-lg-6">
											<!--<input class="form-control subjects" name="subjects" placeholder="Subject" />-->
                                            
                                            <select name="subjects" id="subjects" class="subjects form-control" multiple="multiple">
                                          
                                            <?PHP
												$SubjectsAssigned = $SubjectsAssigned;
												if($subject!='0')
												{
													$subcnt=0;
													foreach($subject->result() as $sub)
													{
														$subcnt++;
														
														?>
                                                        <option value="<?PHP echo $sub->SubjectId; ?>" <?PHP if(in_array($sub->SubjectId,$SubjectsAssigned)){ echo 'selected="selected"';  } ?>  > <?PHP echo $sub->SubjectName; ?> </option>
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
                                      
                                      
                                      <div class="form-group">
                                          <div class="col-lg-offset-4 col-lg-8">
                                             
                                             <input type="button" class="btn btn-primary " edit_add='edit' name="update_assignsubects" id="update_assignsubects" value="Update assigned subjects" />
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