
<section id="main-content">
  <section class="wrapper">  
 <div class="row">
				<div class="col-lg-12">
                
                <ol class="breadcrumb">
						<li><i class="fa fa-home"></i> <a href="<?PHP echo base_url('add-class');?> ">Add Class </a></li>
						<li><i class="fa fa-laptop"></i> <a href="<?PHP echo base_url('view-classes');?> ">view classes</a></li>						  	
                        <li>Edit Class </li>
					</ol>
                
                </div>
			</div>

	<div class="row">
  
                  <div class="col-lg-12">
                 
                      <section class="panel">
                          <header class="panel-heading">
                             Edit class
                          </header>
                          <div class="panel-body">
                             <?PHP echo @$this->session->flashdata('classedited'); ?>
                               <?PHP echo @$this->session->flashdata('failedtoeditClass'); ?>
                              <div class="form col-lg-9">
                              
                              <?PHP
							  		
									if( $this->input->post('editClass'))
									{
										extract($_POST);	
									}
							  ?>
                              
                              
                                  <form class="form-validate form-horizontal " id="register_form" method="post" action="">
                                      
                                      <div class="form-group ">
                                          <label for="classname" class="control-label col-lg-4">Class name<span class="required">*</span></label>
                                          <div class="col-lg-6">
											<input  class=" form-control" id="ClassName" name="ClassName" type="text" value="<?PHP echo $ClassName;?>"  />
                                            <input type="hidden" name="SLNO" value="<?PHP echo $this->uri->segment(2); ?>" />
                                          </div>
                                           <div class="col-lg-2 err-msg"><span><?PHP echo form_error('ClassName')?></span> </div>
                                      </div>
                                      
                                   
                                   
                                      <div class="form-group">
                                          <div class="col-lg-offset-4 col-lg-8">
                                             
                                             <input type="submit" class="btn btn-primary " name="editClass" value="update"/>
                                           
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