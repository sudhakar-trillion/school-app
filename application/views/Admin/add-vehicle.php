
<section id="main-content">
  <section class="wrapper">  
 <div class="row">
				<div class="col-lg-12">
                
                <ol class="breadcrumb">
						<li><i class="fa fa-home"></i> <a href="<?PHP echo base_url('dashboard');?> ">Dashboard </a></li>
						<li><i class="fa fa-laptop"></i>Add vehicle</li>						  	
				</ol>
                
                </div>
			</div>

	<div class="row">
  
                  <div class="col-lg-12">
                 
                      <section class="panel">
                          <header class="panel-heading">
                             Add a vechile
                          </header>
                          <div class="panel-body">
                             <?PHP echo @$this->session->flashdata('vehicleadded'); ?>
                               <?PHP echo @$this->session->flashdata('failedtoaddvehicle'); ?>
                              <div class="form col-lg-9">
                                  <form class="form-validate form-horizontal " id="register_form" method="post" action="">
                                      
                                      <div class="form-group ">
                                          <label for="VehicleNumber" class="control-label col-lg-4">Vehicle Number<span class="required">*</span></label>
                                          <div class="col-lg-6">
						<input  class=" form-control" id="VehicleNumber" name="VehicleNumber" type="text" value="<?PHP echo set_value('VehicleNumber');?>"  />
                                          </div>
                                           <div class="col-lg-2 err-msg"><span><?PHP echo form_error('VehicleNumber')?></span> </div>
                                      </div>
                                      
                                      
                                      <div class="form-group ">
                                          <label for="VehicleRoute" class="control-label col-lg-4">VehicleRoute<span class="required">*</span></label>
                                          <div class="col-lg-6">
                                            <select class=" form-control" id="VehicleRoute" name="VehicleRoute" type="text" >
	                                            <option value="0">Select Route</option>
                                                <?PHP
												if( $Routes!='0')
												{
													foreach($Routes->result() as $rout)
													{
														?>
                                                        <option value="<?PHP echo $rout->RouteId; ?>" <?PHP if( set_value('VehicleRoute') == $rout->RouteId) { echo 'selected=selected'; }?> ><?PHP echo $rout->RouteNumber; ?></option>
                                                        <?PHP	
													}
												}
												?>
                                            </select>
                                          </div>
                                           <div class="col-lg-2 err-msg"><span><?PHP echo form_error('VehicleRoute')?></span> </div>
                                      </div>
                                      
                                       <div class="form-group ">
                                          <label for="ContactNumber" class="control-label col-lg-4">Select Driver<span class="required">*</span></label>
                                          <div class="col-lg-6">
                                          <select name="Driver" class="form-control">
                                          	<option value="0">Select Driver</option>
                                            <?PHP
											if( $Drivers!='0')
											{
													foreach($Drivers->result() as $driv)
													{
														?>
                                                        <option value="<?PHP echo $driv->StaffId; ?>"  <?PHP if( set_value('Driver') == $driv->StaffId ) { echo 'selected=selected'; }?> ><?PHP echo $driv->StaffName; ?></option>
                                                        <?PHP	
													}
												}
												
												?>
                                          </select>
                                          </div>
                                           <div class="col-lg-2 err-msg"><span><?PHP echo form_error('Driver')?></span> </div>
                                      </div>
                                      
                                      
                                      
                                      <div class="form-group">
                                          <div class="col-lg-offset-4 col-lg-8">
                                             
                                             <input type="submit" class="btn btn-primary " name="Addvehicle" value="Add new vehicle" />
                                           
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