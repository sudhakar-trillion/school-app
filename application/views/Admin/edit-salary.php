
<section id="main-content">
  <section class="wrapper">  
 <div class="row">
				<div class="col-lg-12">
                
                <ol class="breadcrumb">
						<li><i class="fa fa-home"></i> <a href="<?PHP echo base_url('dashboard');?> ">Dashboard </a></li>
						<li><i class="fa fa-plus"></i> <a href="<?PHP echo base_url('add-salary')?>">Add salary</a></li>						  	
                        <li><i class="fa fa-eye"></i> <a href="<?PHP echo base_url('view-salaries')?>">View salaries</a></li>	
                        <li>Edit salary</li>						  	
					</ol>
                
                </div>
			</div>

	<div class="row">
  
                  <div class="col-lg-12">
                 
                      <section class="panel">
                          <header class="panel-heading">
                             Edit salary details
                          </header>
                          <div class="panel-body">
                          
                          <?PHP
						  		
								foreach($Staff->result() as $sal)
								{
									$Category= $sal->Category;
								}
						  
						  
						  		foreach($salarydetails->result() as $details)
								{
									$StaffId = $details->StaffId;
									$Month = $details->Month;
									
									$AcademicYear = $details->AcademicYear;
									$Salary = $details->Salary;
								}
						  ?>
                          
                             <?PHP echo @$this->session->flashdata('salaryupdated'); ?>

                              <div class="form col-lg-9">
                                  <form class="form-validate form-horizontal " id="salary_form" method="post" action="">
                                      
                                      <input type="hidden" name="SalaryId" id="SalaryId" value="<?PHP echo $this->uri->segment(2); ?>" />
                                      
                                      <div class="form-group ">
                                          <label for="classname" class="control-label col-lg-4">Select Staff type<span class="required">*</span></label>
                                          <div class="col-lg-6">
										<select class=" form-control" id="StaffType" name="StaffType">
                                        
                                        <option value="none">Select Staff Type</option>
                                        <option value="Teaching" <?PHP if($Category == 'Teaching' ) echo 'selected';?> >Teaching staff</option>
                                        <option value="Non-Teaching" <?PHP if($Category == 'Non-Teaching' ) echo 'selected';?>>Non-Teaching staff</option>
                                        
                                        </select>
                                          </div>
                                           <div class="col-lg-2 err-msg stafftype_err"></div>
                                      </div>
                                      
                                      
                                      <div class="form-group ">
                                          <label for="classname" class="control-label col-lg-4">Select Staff<span class="required">*</span></label>
                                          <div class="col-lg-6">
										<select class=" form-control" id="Stafid" name="Stafid">
                                        <option value="0">Select Staff</option>
                                        <?PHP
											foreach($Staff->result() as $sal)
												{
													?>
                                                    <option value="<?PHP echo $sal->StaffId?>" <?PHP if($sal->StaffId == $StaffId) echo 'selected'; ?>><?PHP echo $sal->StaffName;?></option>
                                                    <?PHP
												}
										?>
                                        </select>
                                          </div>
                                           <div class="col-lg-2 err-msg staffid_err"></div>
                                      </div>
                                      
                                      
                                      <div class="form-group ">
                                          <label for="Month" class="control-label col-lg-4">Select Month<span class="required">*</span></label>
                                          <div class="col-lg-6">
										<select class=" form-control" id="Month" name="Month">
                                        
                                        <option value="none">Select Month</option>
                                        		
                                                <option value="1" <?PHP if($Month=="1") echo 'selected'; ?> >January</option>
                                                <option value="2" <?PHP if($Month=="2") echo 'selected'; ?>>February</option>
                                                <option value="3" <?PHP if($Month=="3") echo 'selected'; ?> >March</option>
                                                <option value="4" <?PHP if($Month=="4") echo 'selected'; ?> >April</option>
                                                
                                                 <option value="5" <?PHP if($Month=="5") echo 'selected'; ?> >May</option>
                                                <option value="6" <?PHP if($Month=="6") echo 'selected'; ?> >June</option>
                                                <option value="7" <?PHP if($Month=="7") echo 'selected'; ?> >July</option>
                                                <option value="8" <?PHP if($Month=="8") echo 'selected'; ?> >August</option>
                                                
                                                 <option value="9" <?PHP if($Month=="9") echo 'selected'; ?> >Septemer</option>
                                                <option value="10" <?PHP if($Month=="10") echo 'selected'; ?> >October</option>
                                                <option value="11" <?PHP if($Month=="11") echo 'selected'; ?> >November</option>
                                                <option value="12" <?PHP if($Month=="12") echo 'selected'; ?> >December</option>
                                                
                                                
                                        </select>
                                          </div>
                                           <div class="col-lg-2 err-msg month_err"></div>
                                      </div>
                                      
                                      <div class="form-group ">
                                      
                                      
                                          <label for="AcademicYear" class="control-label col-lg-4">Select Academic Year<span class="required">*</span></label>
                                          <div class="col-lg-6">
										<?PHP
											
											$chkmonth = date('n');
											if($chkmonth>5 && $chkmonth<12)
												$Academic_yr = date('Y')."-".(date('Y')+1);
											else
												$Academic_yr = (date('Y')-1)."-".date('Y');
												
										?>
                                        
                                        <select class=" form-control" id="AcademicYear" name="AcademicYear">
                                            <option value="none">Select Academic Year</option>
    	                                    <option value="<?PHP echo $Academic_yr; ?>" selected><?PHP echo $Academic_yr; ?></option>
                                        </select>
        
                                          </div>
                                           <div class="col-lg-2 err-msg academicYear_Err"></div>
                                      </div>
                                      
                                      
                                      <div class="form-group ">
                                          <label for="Salary" class="control-label col-lg-4">Enter Salary<span class="required">*</span></label>
                                          <div class="col-lg-6">
										<input  class=" form-control" id="Salary" name="Salary" type="text" value="<?PHP echo $Salary;?>"  />
                                          </div>
                                           <div class="col-lg-2 err-msg SalaryErr"> </div>
                                      </div>
                                     
                                      <div class="form-group">
                                          <div class="col-lg-offset-4 col-lg-2">
                                             
                                             <input type="button" class="btn btn-primary " name="addSalary" edit_add="edit"  id="EditSalary" value="Update Salary" />	
                                             </div>
                                             
                                             <div class="col-lg-6 resp_msg" style="margin-top:6px"></div>
                                           
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