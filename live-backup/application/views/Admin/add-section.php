
<section id="main-content">
  <section class="wrapper">  
 <div class="row">
				<div class="col-lg-12">
                
                <ol class="breadcrumb">
<!--						<li><i class="fa fa-home"></i> <a href="<?PHP echo base_url('dashboard');?> ">Dashboard </a></li> -->
						<li><i class="fa fa-laptop"></i>Add section</li>						  	
					</ol>
                
                </div>
			</div>

	<div class="row">
  
                  <div class="col-lg-12">
                 
                      <section class="panel">
                          <header class="panel-heading">
                             Add new section
                          </header>
                          <div class="panel-body">
                             <?PHP echo @$this->session->flashdata('sectionadded'); ?>
                               <?PHP echo @$this->session->flashdata('failedtocreateSection'); ?>
                              <div class="form col-lg-9">
                                <?PHP
									if( $this->input->post('addSection') )
									{
										$ClassName = $this->input->post('ClassName');
									}
									else
										$ClassName ='0';
								?>
                                
                                  <form class="form-validate form-horizontal " id="register_form" method="post" action="">
                                      
                                      <div class="form-group ">
                                          <label for="ClassName" class="control-label col-lg-4">Class name<span class="required">*</span></label>
                                          <div class="col-lg-6">
											
                                            <select class="form-control" name="ClassName">
                                            	<option value="0">Select Class </option>
				
				<?PHP foreach($classes->result() as $cls){ ?> <option value="<?PHP echo $cls->SLNO; ?>" <?PHP if($ClassName==$cls->SLNO) { echo 'selected="selected"'; }?> ><?PHP echo $cls->ClassName;?></option><?PHP	} ?>
                                                
                                            </select>
                                            
                                          </div>
                                           <div class="col-lg-2 err-msg"><span><?PHP echo form_error('ClassName')?></span> </div>
                                      </div>
                                      
                                       <div class="form-group ">
                                          <label for="section" class="control-label col-lg-4">Section <span class="required">*</span></label>
                                          <div class="col-lg-6">
										<input  class=" form-control" id="section" name="section" type="text" value="<?PHP echo set_value('section');?>"  />
                                          </div>
                                           <div class="col-lg-2 err-msg"><span><?PHP echo form_error('section')?></span> </div>
                                      </div>
                                      
                                     
                                      <div class="form-group">
                                          <div class="col-lg-offset-4 col-lg-8">
                                             
                                             <input type="submit" class="btn btn-primary " name="addSection" />
                                           
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