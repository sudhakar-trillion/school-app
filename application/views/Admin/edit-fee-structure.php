
<section id="main-content">
  <section class="wrapper">  
 <div class="row">
				<div class="col-lg-12">
                
                <ol class="breadcrumb">
					<li><i class="fa fa-home"></i> <a href="<?PHP echo base_url('dashboard');?> ">dashboard</a></li>
						 <li><i class="fa fa-plus"></i> <a href="<?PHP echo base_url('add-fee-structure');?> ">Add fee structure</a></li>
						<li><i class="fa fa-desktop"></i><a href="<?PHP echo base_url('view-fee-structure')?>">View Fee structure</a></li>
                    <li>Edit fee structure</li>
					</ol>
                
                </div>
			</div>

	<div class="row">
  
                  <div class="col-lg-12">
                 
                      <section class="panel">
                          <header class="panel-heading">
                             Edit fee structure
                          </header>
                          
                          <?PHP echo @$this->session->flashdata('fee-details-updated');?>
                          <div class="panel-body">
                            
                            <?PHP 
							
								if( $this->input->post('add_fee_structure')!='' )
								{
									extract($_POST);	
								}
								else
								{
									foreach($feedetails->result() as $details)	
									{
										$ClassName = $details->Class;
										$AcademicYear = $details->AcademicYear;
										
										$MonthlyFee = $details->MonthlyFee;
										$QuarterlyFee = $details->QuarterlyFee;
										
										$HalfyearlyFee = $details->HalfyearlyFee;
										$AnnualFee = $details->AnnualFee;
										
									}
								}
							?>
                            
                            
                              <div class="form col-lg-9">
                                  <form class="form-validate form-horizontal " id="addfeestrucuter" method="post" action="">
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
                                                        <option value="0"> Select Class</option>
                                                        <option value="<?PHP echo $clas->SLNO?>"  <?PHP if($clas->SLNO==@$ClassName){ echo ' selected="selected"';}?>><?PHP echo ucwords($clas->ClassName); ?> </option>
                                                        <?PHP	
													}
													else
														{
															?>
                                                             <option value="<?PHP echo $clas->SLNO?>"  <?PHP if($clas->SLNO==@$ClassName){ echo ' selected="selected"';}?> ><?PHP echo ucwords($clas->ClassName); ?> </option>
                                                            <?PHP
														}
													$class_cnt++;
													
												}
											?>
                                            
                                            </select>
                                          </div>
                                           <div class="col-lg-2 err-msg assign-err"><span class="ClassName_err"><?PHP echo form_error('ClassName');?></span> </div>
                                      </div>
                                      
                                      <div class="form-group ">
                                          <label for="AcademicYear" class="control-label col-lg-4">Select Academic Year<span class="required">*</span></label>
                                          <div class="col-lg-6">
											<select name="AcademicYear" class="form-control" id="AcademicYear">
                                        	<option value="0">Select Academic Year </option>
                                            <?PHP
											
											$curryear = date('Y');
											$prev_two_years = date('Y')-1;
											$next_two_years = date('Y')+2;
											
											for( $prev_two_years; $prev_two_years<=$next_two_years;$prev_two_years++)
											{
												$val =$prev_two_years."-".($prev_two_years+1);
												?>
                                                <option value="<?PHP echo $val ?>" <?PHP if(@$AcademicYear==$val) { echo 'selected="selected"'; }?> ><?PHP echo $val; ?></option>
                                                <?PHP	
											}
											?>
                                        </select>
                                            
                                          </div>
                                           <div class="col-lg-2 err-msg assign-err"><?PHP echo form_error('AcademicYear')?> </div>
                                      </div>
                                      
                                      
                                      <div class="form-group ">
                                          <label for="MonthlyFee" class="control-label col-lg-4">Monthly Fee<span class="required">*</span></label>
                                          <div class="col-lg-6">
											
                                            <input type="text" class="form-control" name="MonthlyFee" id="MonthlyFee" placeholder="Monthly fees" value="<?PHP echo $MonthlyFee?>" />
                                            
                                          </div>
                                           <div class="col-lg-2 err-msg assign-err"><span class="MonthlyFee_err"><?PHP echo form_error('MonthlyFee')?></span> </div>
                                      </div>
                                      
                                      <div class="form-group ">
                                          <label for="QuarterlyFee" class="control-label col-lg-4">Quarterly Fee<span class="required"></span></label>
                                          <div class="col-lg-6">
											
                                            <input type="text" class="form-control" name="QuarterlyFee" id="QuaeterlyFee" placeholder="Quarterly Fee"  value="<?PHP echo $QuarterlyFee?>" />
                                            
                                          </div>
                                           <div class="col-lg-2 err-msg assign-err"><span class="MonthlyFee_err"></span> </div>
                                      </div>
                                      
                                      <div class="form-group ">
                                          <label for="HalfyearlyFee" class="control-label col-lg-4">Halfyearly Fee<span class="required"></span></label>
                                          <div class="col-lg-6">
											
                                            <input type="text" class="form-control" name="HalfyearlyFee" id="HalfyearlyFee" placeholder="Halfyearly Fee" value="<?PHP echo $HalfyearlyFee?>" />
                                            
                                          </div>
                                           <div class="col-lg-2 err-msg assign-err"><span class="MonthlyFee_err"></span> </div>
                                      </div>
                                      
                                      <div class="form-group ">
                                          <label for="AnnualFee" class="control-label col-lg-4">Annual Fee<span class="required">*</span></label>
                                          <div class="col-lg-6">
											
                                            <input type="text" class="form-control" name="AnnualFee" id="AnnualFee" placeholder="Annual Fee" value="<?PHP echo $AnnualFee?>" />
                                            
                                          </div>
                                           <div class="col-lg-2 err-msg assign-err"><span class="MonthlyFee_err"><?PHP echo form_error('AnnualFee');?></span> </div>
                                      </div>
                                      
                                      
                                      
                                      
                                      <div class="form-group">
                                          <div class="col-lg-offset-4 col-lg-8">
                                             
                                             <input type="submit" class="btn btn-primary " edit_add='add' name="update_fee_structure" id="update_fee_structure" value="Update fee strucutre" />
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