
<section id="main-content">
  <section class="wrapper">  
 <div class="row">
				<div class="col-lg-12">
                
                <ol class="breadcrumb">
						<li><i class="fa fa-home"></i> <a href="<?PHP echo base_url('dashboard');?> ">Dashboard </a></li>
						<li><i class="fa fa-laptop"></i>Add salary</li>						  	
					</ol>
                
                </div>
			</div>

	<div class="row">
  
                  <div class="col-lg-12">
                 
                      <section class="panel">
                          <header class="panel-heading">
                             Add salary
                          </header>
                          <div class="panel-body">
                             <?PHP echo @$this->session->flashdata('salaryadded'); ?>

                              <div class="form col-lg-9">
                                  <form class="form-validate form-horizontal " id="salary_form" method="post" action="">
                                      
                                      <div class="form-group ">
                                          <label for="classname" class="control-label col-lg-4">Select Staff type<span class="required">*</span></label>
                                          <div class="col-lg-6">
										<select class=" form-control" id="StaffType" name="StaffType">
                                        
                                        <option value="none">Select Staff Type</option>
                                        <option value="Teaching">Teaching staff</option>
                                        <option value="Non-Teaching">Non-Teaching staff</option>
                                        
                                        </select>
                                          </div>
                                           <div class="col-lg-2 err-msg stafftype_err"></div>
                                      </div>
                                      
                                      
                                      <div class="form-group ">
                                          <label for="classname" class="control-label col-lg-4">Select Staff<span class="required">*</span></label>
                                          <div class="col-lg-6">
										<select class=" form-control" id="Stafid" name="Stafid">
                                        <option value="0">Select Staff</option>
                                        
                                        </select>
                                          </div>
                                           <div class="col-lg-2 err-msg staffid_err"></div>
                                      </div>
                                      
                                      
                                      <div class="form-group ">
                                          <label for="Month" class="control-label col-lg-4">Select Month<span class="required">*</span></label>
                                          <div class="col-lg-6">
										<select class=" form-control" id="Month" name="Month">
                                        
                                        <option value="none">Select Month</option>
                                        		
                                                <option value="1">January</option>
                                                <option value="2">February</option>
                                                <option value="3">March</option>
                                                <option value="4">April</option>
                                                
                                                 <option value="5">May</option>
                                                <option value="6">June</option>
                                                <option value="7">July</option>
                                                <option value="8">August</option>
                                                
                                                 <option value="9">Septemer</option>
                                                <option value="10">October</option>
                                                <option value="11">November</option>
                                                <option value="12">December</option>
                                                
                                                
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
    	                                    <option value="<?PHP echo $Academic_yr; ?>"><?PHP echo $Academic_yr; ?></option>
                                        </select>
        
                                          </div>
                                           <div class="col-lg-2 err-msg academicYear_Err"></div>
                                      </div>
                                      
                                      
                                      <div class="form-group ">
                                          <label for="Salary" class="control-label col-lg-4">Enter Salary<span class="required">*</span></label>
                                          <div class="col-lg-6">
										<input  class=" form-control" id="Salary" name="Salary" type="text" value="<?PHP echo set_value('Salary');?>"  />
                                          </div>
                                           <div class="col-lg-2 err-msg SalaryErr"> </div>
                                      </div>
                                     
                                      <div class="form-group">
                                          <div class="col-lg-offset-4 col-lg-2">
                                             
                                             <input type="button" class="btn btn-primary " name="addSalary" edit_add="add"  id="addSalary" value="Add Salary" />	
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