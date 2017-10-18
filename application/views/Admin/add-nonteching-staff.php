
<section id="main-content">
  <section class="wrapper">  
 <div class="row">
				<div class="col-lg-12">
                
                <ol class="breadcrumb">
						<li><i class="fa fa-home"></i> <a href="<?PHP echo base_url('dashboard');?> ">Dashboard </a></li> 
						<li><i class="fa fa-laptop"></i>Add non teaching staff</li>						  	
					</ol>
                
                </div>
			</div>

	<div class="row">
  
                  <div class="col-lg-12">
                 
                      <section class="panel">
                          <header class="panel-heading">
                             Add non teaching staff
                          </header>
                          <div class="panel-body">
                             <?PHP echo @$this->session->flashdata('non-teaching-staff-added-msg'); ?>

                              <div class="form col-lg-9">
                                  <form class="form-validate form-horizontal " id="register_form" method="post" action="">
                                      
                                      <div class="form-group ">
                                          <label for="StaffName" class="control-label col-lg-4">Non teaching staff name<span class="required">*</span></label>
                                          <div class="col-lg-5">
<input  class=" form-control" id="StaffName" name="StaffName" type="text" value="<?PHP echo set_value('StaffName');?>"  />
                                          </div>
                                           <div class="col-lg-3 err-msg"><span><?PHP echo form_error('StaffName')?></span> </div>
                                      </div>
                                      
                                      <div class="form-group ">
                                          <label for="StaffName" class="control-label col-lg-4">Select Deparment<span class="required">*</span></label>
                                          <div class="col-lg-5">
                                          
												<select name="Department" class="form-control">
                                          			<option value="">Select Department </option>      
                                                    <?PHP
													if( $Departmetns!='0')
													{
														foreach($Departmetns->result() as $dept)
														{
															?>
                                                            <option value="<?PHP echo $dept->Department?>"> <?PHP echo $dept->Department?> </option>
                                                            <?PHP	
														}
													}
														
													?>
                                                
                                                </select>
                                          </div>
                                           <div class="col-lg-3 err-msg"><span><?PHP echo form_error('Department')?></span> </div>
                                      </div>
                                      
                                     
                                      <div class="form-group">
                                          <div class="col-lg-offset-4 col-lg-8">
                                             
                                             <input type="submit" class="btn btn-primary " name="addStaff" value="Add staff" />
                                           
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