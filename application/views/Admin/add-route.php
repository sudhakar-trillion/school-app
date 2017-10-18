
<section id="main-content">
  <section class="wrapper">  
 <div class="row">
				<div class="col-lg-12">
                
                <ol class="breadcrumb">
						<li><i class="fa fa-home"></i> <a href="<?PHP echo base_url('dashboard');?> ">Dashboard </a></li>
                        <li><i class="fa fa-plus"></i> <a href="<?PHP echo base_url('add-vehicle');?> ">Add vehicle </a></li>
						<li><i class="fa fa-laptop"></i>Add route</li>						  	
				</ol>
                
                </div>
			</div>

	<div class="row">
  
                  <div class="col-lg-12">
                 
                      <section class="panel">
                          <header class="panel-heading">
                             Add a route
                          </header>
                          <div class="panel-body">
                             <?PHP echo @$this->session->flashdata('routeadded'); ?>
                               <?PHP echo @$this->session->flashdata('failedtoaddroute'); ?>
                              <div class="form col-lg-9">
                                  <form class="form-validate form-horizontal " id="" method="post" action="">
                                      
                                      <div class="form-group ">
                                          <label for="RouteNumber" class="control-label col-lg-4">Route Number<span class="required">*</span></label>
                                          <div class="col-lg-6">
						<input  class=" form-control" id="RouteNumber" name="RouteNumber" type="text" value="<?PHP echo set_value('RouteNumber');?>"  />
                                          </div>
                                           <div class="col-lg-2 err-msg"><span><?PHP echo form_error('RouteNumber')?></span> </div>
                                      </div>
                                      
                                      <div class="form-group ">
                                          <label for="Routes" class="control-label col-lg-4">Enter Routes<span class="required">*</span></label>
                                          <div class="col-lg-6">
						<input  class=" form-control" id="Routes" name="Routes" type="text" value="<?PHP echo set_value('Routes');?>"  />
                                          </div>
                                           <div class="col-lg-2 err-msg"><span><?PHP echo form_error('Routes')?></span> </div>
                                      </div>
                                      
                                      
                                      
                                      
                                      
                                      
                                      
                                       
                                       
                                      
                                      
                                      
                                      <div class="form-group">
                                          <div class="col-lg-offset-4 col-lg-8">
                                             
                                             <input type="submit" class="btn btn-primary " name="Addroute" value="Add new route" />
                                           
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