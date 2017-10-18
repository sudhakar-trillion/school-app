
<section id="main-content">
  <section class="wrapper">  
 <div class="row">
				<div class="col-lg-12">
                
                <ol class="breadcrumb">
					<li><i class="fa fa-home"></i> <a href="<?PHP echo base_url('dashboard');?> ">Dashboard </a></li>
                        <li><i class="fa fa-plus"></i> <a href="<?PHP echo base_url('add-nonteaching-staff');?> ">Add nonteaching staff</a></li>
                        <li><i class="fa fa-eye"></i> <a href="<?PHP echo base_url('view-nonteaching-staff');?> ">view nonteaching staff</a></li>
						<li> <a href="<?PHP echo base_url('view-vehicles');?> "> Add non teaching staff details </a></li>

					</ol>
                
                </div>
			</div>

	<div class="row">
  
                  <div class="col-lg-12">
                 
                      <section class="panel">
                          <header class="panel-heading">
                             Add a Non teaching staff details
                          </header>
                          <div class="panel-body">
                             <?PHP echo @$this->session->flashdata('NtsdetailsSuccess'); ?>
                               <?PHP echo @$this->session->flashdata('failedtoaddNtsdetails'); ?>
                              <div class="form col-lg-9">
                             
                             
                                  <form class="form-validate form-horizontal " id="register_form" method="post" action="">
                                      
                                      <div class="form-group ">
                                          <label for="StaffId" class="control-label col-lg-4">Select Non teching staff<span class="required">*</span></label>
                                          <div class="col-lg-6">
                                            <select class=" form-control" id="StaffId" name="StaffId">
	                                            <option value="0">Select Staff</option>
                                                <?PHP
													
													foreach( $NonStaff->result() as $staf)
													{
														?>
                                                        <option value="<?PHP echo $staf->StaffId; ?>" <?PHP if( set_value('StaffId') == $staf->StaffId ) echo 'selected=selected'; ?>> <?PHP echo $staf->StaffName; ?> </option>
                                                        <?PHP	
													}
												?>
                                                
                                            </select>
                                          </div>
                                           <div class="col-lg-2 err-msg"><span><?PHP echo form_error('StaffId')?></span> </div>
                                      </div>
                                      
                                      
                                      <div class="form-group ">
                                          <label for="ContactNumber" class="control-label col-lg-4">Contact Number<span class="required">*</span></label>
                                          <div class="col-lg-6">
                                           <input type="text" class="form-control" name="ContactNumber" id="ContactNumber" placeholder="Contact number" />
                                          </div>
                                           <div class="col-lg-2 err-msg"><span><?PHP echo form_error('ContactNumber')?></span> </div>
                                      </div>
                                     
                                      
                                      <div class="form-group ">
                                          <label for="ContactNumber" class="control-label col-lg-4">Contact Address<span class="required">*</span></label>
                                          <div class="col-lg-6">
                                           <textarea class="form-control" name="ContactAddress" id="ContactAddress"></textarea>
                                          </div>
                                           <div class="col-lg-2 err-msg"><span><?PHP echo form_error('ContactAddress')?></span> </div>
                                      </div>
                                       
                                      
                                      
                                      
                                      <div class="form-group">
                                          <div class="col-lg-offset-4 col-lg-8">
                                             
                                             <input type="submit" class="btn btn-primary " name="AddNonTeachingDetails" value="Add details" />
                                           
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