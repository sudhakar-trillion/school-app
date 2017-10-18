
<section id="main-content">
  <section class="wrapper">  
 <div class="row">
				<div class="col-lg-12">
                
                <ol class="breadcrumb">
						<li><i class="fa fa-home"></i><a href="<?PHP echo base_url();?>"> Dashboard</a></li>
						<li><i class="fa fa-laptop"></i>Pay Fee</li>

					</ol>
                
                </div>
			</div>

	<div class="row">
  		
        <?PHP echo @$this->session->flashdata('PaymentMessage'); ?>
        
                  <div class="col-lg-12">
                 
                      <section class="panel">
                          <header class="panel-heading">
                             Pay Fee
                          </header>
                          <div class="panel-body">

                              <div class="form col-lg-9">
                                  <form class="form-validate form-horizontal " id="add_homework_form" method="post" action="">
                                      
                                      <div class="form-group ">
                                          <label for="ClassName" class="control-label col-lg-4">Class<span class="required">*</span></label>
                                          <div class="col-lg-6">
											<select class="form-control ClassName payfeeclass" name="ClassName" id="ClassName">
                                            <?PHP
												
												$class_cnt=0;
												foreach( $classes->result() as $clas)
												{
													if( $class_cnt == 0 )
													{
														?>
                                                        <option value="0">Select Class</option>
                                                        <option value="<?PHP echo $clas->SLNO?>" <?PHP if($selectedClass==$clas->SLNO) echo "selected"; ?> ><?PHP echo ucwords($clas->ClassName); ?> </option>
                                                        <?PHP	
													}
													else
														{
															?>
                                                             <option value="<?PHP echo $clas->SLNO?>" <?PHP if($selectedClass==$clas->SLNO) echo "selected"; ?> ><?PHP echo ucwords($clas->ClassName); ?> </option>
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
                                            <?PHP
												if(@$Sections!='0')
												{
													foreach($Sections->result() as $sections)	
													{
														?>
                                                        <option value="<?PHP echo $sections->SectionId?>" <?PHP if(@$SelectedSection==$sections->SectionId) echo 'selected'; ?>><?PHP echo $sections->Section?></option>
                                                        <?PHP	
													}
												}
											?>
                                            </select>
                                          </div>
                                           <div class="col-lg-2 err-msg assign-err"><span class="section_err"><?PHP echo form_error('sections')?></span> </div>
                                      </div>
                                      
                                      <div class="form-group ">
                                          <label for="Rollno" class="control-label col-lg-4">Student<span class="required">*</span></label>
                                          <div class="col-lg-6">
											<select class="form-control" name="Rollno" id="Rollno">
                                            <option value='0'>Select Student</option>
                                            <?PHP
												
												if( $Students!='0')
												{
													foreach( $Students->result() as $std)	
													{
													?>
                                                    	<option value="<?PHP echo $std->StudentId?>" <?PHP if(@$Rollno== $std->StudentId) echo 'selected';?>><?PHP echo $std->Student?></option>
                                                    <?PHP	
													}
												}
											
											?>
                                            </select>
                                          </div>
                                           <div class="col-lg-2 err-msg assign-err"><span class="Roll_err"><?PHP echo form_error('Rollno');?></span> </div>
                                      </div>
                                      
                                      
                                      <div class="form-group ">
                                          <label for="Rollno" class="control-label col-lg-4">Select month<span class="required">*</span></label>
                                          <div class="col-lg-6">
											<select class="form-control" name="month" id="month">
                                            <option value='0'>Select Month</option>
                                            
                                            <option value="1" <?PHP if(@$selectedMonth=='1') echo 'selected';?> >January</option>
                                            <option value="2"  <?PHP if(@$selectedMonth=='2') echo 'selected';?>>February</option>
                                            <option value="3"  <?PHP if(@$selectedMonth=='3') echo 'selected';?>>March</option>
                                            <option value="4"  <?PHP if(@$selectedMonth=='4') echo 'selected';?>>April</option>
                                            
                                            <option value="5"  <?PHP if(@$selectedMonth=='5') echo 'selected';?>>May</option>
                                            <option value="6"  <?PHP if(@$selectedMonth=='6') echo 'selected';?>>June</option>
                                            <option value="7"  <?PHP if(@$selectedMonth=='7') echo 'selected';?>>July</option>
                                            <option value="8"  <?PHP if(@$selectedMonth=='8') echo 'selected';?>>August</option>
                                            
                                            <option value="9"  <?PHP if(@$selectedMonth=='9') echo 'selected';?>>September</option>
                                            <option value="10"  <?PHP if(@$selectedMonth=='10') echo 'selected';?>>October</option>
                                            <option value="11"  <?PHP if(@$selectedMonth=='11') echo 'selected';?>>November</option>
                                            <option value="12"  <?PHP if(@$selectedMonth=='12') echo 'selected';?>>December</option>
                                            </select>
                                          </div>
                                           <div class="col-lg-2 err-msg assign-err"><span class="subject_err"><?PHP echo form_error('month');?></span> </div>
                                      </div>
                                      

                                    <div class="form-group notificationdiv">
                                    
                                    <?PHP
											$currentMnth = date('n');
											
											if( $currentMnth>5 && $currentMnth<=12 )
											{
												$prevyr = date('Y');
												$nextyr = date('Y')+1;
												$academicYr = 	$prevyr."-".$nextyr;
											}
											else
											{
												$prevyr = date('Y')-1;
												$nextyr = date('Y');
												$academicYr = 	$prevyr."-".$nextyr;
											}
											
											
											
									?>
                                        <label for="Notification" class="control-label col-lg-4">Academic Year:<span class="required"></span></label> 
                                        <div class="col-lg-6"> 
                                        <select name="AcademicYear" class="form-control AcademicYear">

                                            <option value="<?PHP echo $academicYr;?>" selected><?PHP echo $academicYr; ?></option>
                                        </select>
                                       
                                       
                                        </div>
                                        <div class="col-lg-2 err-msg assign-err"><span class="Academicyear_err"><?PHP echo form_error('AcademicYear'); ?></span> </div>
                                    
                                 </div>

                                      <div class="form-group notificationdiv">
                                         

                                        	 <label for="Notification" class="control-label col-lg-4">Monthly Fee:<span class="required"></span></label> 
                                        	 <div class="col-lg-6"> 
														
												<input type="text" class="form-control" name="MonthlyFee" id="MonthlyPayFee" value="<?PHP echo @$selectedMonthlyFee;?>" />
                                              </div>
                                              <div class="col-lg-2 err-msg assign-err"><span class="MonthlyFee_err"><?PHP echo form_error('MonthlyFee');?></span> </div>
                                         
                                      </div>
                                      
                                      
                                      
                                      
                                      <div class="form-group">
                                          <div class="col-lg-offset-4 col-lg-8">
                                             
                                             <input type="submit" class="btn btn-primary " edit_add='add' name="PayFee" id="PayFee" value="Pay Fee" />
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