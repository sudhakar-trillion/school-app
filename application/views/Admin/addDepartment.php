
<section id="main-content">
  <section class="wrapper">  
 <div class="row">
				<div class="col-lg-12">
                
                <ol class="breadcrumb">
<!--						<li><i class="fa fa-home"></i> <a href="<?PHP echo base_url('dashboard');?> ">Dashboard </a></li> -->
						<li><i class="fa fa-laptop"></i>Add department</li>						  	
					</ol>
                
                </div>
			</div>

	<div class="row">
  
                  <div class="col-lg-12">
                 
                      <section class="panel">
                          <header class="panel-heading">
                             Add new department
                          </header>
                          <div class="panel-body">
                             <?PHP echo @$this->session->flashdata('deptadded'); ?>
                               <?PHP echo @$this->session->flashdata('failedtoaddDept'); ?>
                              <div class="form col-lg-9">
                                  <form class="form-validate form-horizontal " id="register_form" method="post" action="">
                                      
                                      <div class="form-group ">
                                          <label for="classname" class="control-label col-lg-4">Department name<span class="required">*</span></label>
                                          <div class="col-lg-5">
								<input  class=" form-control" id="Department" name="Department" type="text" value="<?PHP echo set_value('Department');?>"  />
                                          </div>
                                           <div class="col-lg-3 err-msg"><span><?PHP echo form_error('Department')?></span> </div>
                                      </div>
                                      
                                     
                                      
                                      <div class="form-group">
                                          <div class="col-lg-offset-4 col-lg-8">
                                             
                                             <input type="submit" class="btn btn-primary " name="addDept" />
                                           
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