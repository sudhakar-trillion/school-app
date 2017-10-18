
<section id="main-content">
  <section class="wrapper">  
 <div class="row">
				<div class="col-lg-12">
                
                <ol class="breadcrumb">
			<li><i class="fa fa-home"></i> <a href="<?PHP echo base_url('dashboard');?> ">Dashboard </a></li>
						<li><i class="fa fa-laptop"></i>Add vendor</li>						  	
					</ol>
                
                </div>
			</div>

	<div class="row">
  
                  <div class="col-lg-12">
                 
                      <section class="panel">
                          <header class="panel-heading">
                             Add new vendor
                          </header>
                          <div class="panel-body">
                             <?PHP echo @$this->session->flashdata('vendoradded'); ?>
                               <?PHP echo @$this->session->flashdata('failedtocreatevendor'); ?>
                              <div class="form col-lg-9">
                                  <form class="form-validate form-horizontal " id="createVendor" method="post" action="">
                                      
                                      <div class="form-group ">
                                          <label for="title" class="control-label col-lg-4">Title<span class="required">*</span></label>
                                          <div class="col-lg-6">
<input  class=" form-control" id="Title" name="Title" type="text" value="<?PHP echo set_value('Title');?>"  />
                                          </div>
                                           <div class="col-lg-2 err-msg"><span><?PHP echo form_error('Title')?></span> </div>
                                      </div>
                                      
                                      <div class="form-group ">
                                          <label for="CompanyName" class="control-label col-lg-4">Company Name<span class="required">*</span></label>
                                          <div class="col-lg-6">
<input  class=" form-control" id="CompanyName" name="CompanyName" type="text" value="<?PHP echo set_value('CompanyName');?>"  />
                                          </div>
                                           <div class="col-lg-2 err-msg"><span><?PHP echo form_error('CompanyName')?></span> </div>
                                      </div>
                                      
                                      <div class="form-group ">
                                          <label for="ContactPerson" class="control-label col-lg-4">Contact Person<span class="required">*</span></label>
                                          <div class="col-lg-6">
<input  class=" form-control" id="ContactPerson" name="ContactPerson" type="text" value="<?PHP echo set_value('ContactPerson');?>"  />
                                          </div>
                                           <div class="col-lg-2 err-msg"><span><?PHP echo form_error('ContactPerson')?></span> </div>
                                      </div>
                                      
                                      <div class="form-group ">
                                          <label for="ContactEmail" class="control-label col-lg-4">Contact Email<span class="required">*</span></label>
                                          <div class="col-lg-6">
<input  class=" form-control" id="ContactEmail" name="ContactEmail" type="text" value="<?PHP echo set_value('ContactEmail');?>"  />
                                          </div>
                                           <div class="col-lg-2 err-msg"><span><?PHP echo form_error('ContactEmail')?></span> </div>
                                      </div>
                                      
                                      <div class="form-group ">
                                          <label for="Mobile1" class="control-label col-lg-4">Mobile 1<span class="required">*</span></label>
                                          <div class="col-lg-6">
<input  class=" form-control" id="Mobile1" name="Mobile1" type="text" value="<?PHP echo set_value('Mobile1');?>"  />
                                          </div>
                                           <div class="col-lg-2 err-msg"><span><?PHP echo form_error('Mobile1')?></span> </div>
                                      </div>
                                      
                                      <div class="form-group ">
                                          <label for="Mobile2" class="control-label col-lg-4">Mobile 2<span class="required"></span></label>
                                          <div class="col-lg-6">
<input  class=" form-control" id="Mobile2" name="Mobile2" type="text" value="<?PHP echo set_value('Mobile2');?>"  />
                                          </div>
                                           <div class="col-lg-2 err-msg"><span><?PHP echo form_error('Mobile2')?></span> </div>
                                      </div>
                                      
                                      <div class="form-group ">
                                          <label for="Address" class="control-label col-lg-4">Address<span class="required">*</span></label>
                                          <div class="col-lg-6">
								<textarea class=" form-control" id="Address" name="Address" type="text" > </textarea>
                                          </div>
                                           <div class="col-lg-2 err-msg"><span><?PHP echo form_error('Address')?></span> </div>
                                      </div>
                                      
                                    
                                      
                                      <div class="form-group">
                                          <div class="col-lg-offset-4 col-lg-8">
                                             
                                             <input type="submit" class="btn btn-primary" add_edit="add" name="addVendor" value="Create New Vendor" />
                                           
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