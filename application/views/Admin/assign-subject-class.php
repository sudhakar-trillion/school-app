
<section id="main-content">
  <section class="wrapper">  
 <div class="row">
				<div class="col-lg-12">
                
                <ol class="breadcrumb">
					<li><i class="fa fa-home"></i> <a href="<?PHP echo base_url('dashboard');?> ">Dashboard</a></li>
                    <li><i class="fa fa-plus"> </i><a href="<?PHP echo base_url('add-subjects');?>">Add subjects</a> </li>
					<li><i class="fa fa-laptop"></i><a href="<?PHP echo base_url('view-subjects');?> "> View subjects</a></li>
                    <li>Assign subject to class</li>
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
                                          <label for="ClassName" class="control-label col-lg-4">Class<span class="required">*</span></label>
                                          <div class="col-lg-6">
											<select class="form-control" name="ClassName" id="ClassName">
                                            <?PHP
												
												$class_cnt=0;
											if($classes!='0')
											{	
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
											}
											?>
                                            
                                            </select>
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
												if($subject!='0')
												{
													$subcnt=0;
													foreach($subject->result() as $sub)
													{
														$subcnt++;
														
														?>
                                                        <option value="<?PHP echo $sub->SubjectId; ?>" <?PHP if($subcnt==1){ echo 'selected="selected"';  } ?>  > <?PHP echo $sub->SubjectName; ?> </option>
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
                                             
                                             <input type="button" class="btn btn-primary " edit_add='add' name="assignsubects_btn" id="assignsubects_btn" value="Assign subjects to class" />
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