
<section id="main-content">
  <section class="wrapper">  
 <div class="row">
				<div class="col-lg-12">
                
                <ol class="breadcrumb">
<!--						<li><i class="fa fa-home"></i> <a href="<?PHP echo base_url('dashboard');?> ">Dashboard </a></li> -->
						<li><i class="fa fa-laptop"></i>Add class</li>						  	
					</ol>
                
                </div>
			</div>

	<div class="row">
  
                  <div class="col-lg-12">
                 
                      <section class="panel">
                          <header class="panel-heading">
                             Add new class
                          </header>
                          <div class="panel-body">
                             <?PHP echo @$this->session->flashdata('classadded'); ?>
                               <?PHP echo @$this->session->flashdata('failedtocreateClass'); ?>
                              <div class="form col-lg-9">
                                  <form class="form-validate form-horizontal " id="register_form" method="post" action="">
                                      
                                      <div class="form-group ">
                                          <label for="classname" class="control-label col-lg-4">Class name<span class="required">*</span></label>
                                          <div class="col-lg-6">
<input  class=" form-control" id="ClassName" name="ClassName" type="text" value="<?PHP echo set_value('ClassName');?>"  />
                                          </div>
                                           <div class="col-lg-2 err-msg"><span><?PHP echo form_error('ClassName')?></span> </div>
                                      </div>
                                      
                                     <!--
                                     	 <div class="form-group ">
                                          <label for="fullname" class="control-label col-lg-4">Docket no<span class="required">*</span></label>
                                          <div class="col-lg-6">
                                              <input class=" form-control" id="DocketNo" name="DocketNo" type="text" value="<?PHP echo set_value('DocketNo');?>" />
                                          </div>
                                           <div class="col-lg-2 err-msg"><span><?PHP echo form_error('DocketNo')?></span> </div>
                                      </div>
                                      
                                      
                                      <div class="form-group ">
                                          <label for="fullname" class="control-label col-lg-4">Booking date<span class="required">*</span></label>
                                          <div class="col-lg-6">
<input class=" form-control " id="bookingdate" name="BookingDate" type="text" value="<?PHP echo set_value('BookingDate');?>" />
                                          </div>
                                           <div class="col-lg-2 err-msg"><span><?PHP echo form_error('BookingDate')?></span> </div>
                                      </div>
                                      
                                       <div class="form-group ">
                                          <label for="fullname" class="control-label col-lg-4">Origin<span class="required">*</span></label>
                                          <div class="col-lg-6">
<input class="form-control Origin" id="Origin" name="Origin" type="text" value="<?PHP echo set_value('Origin');?>" />
                                          </div>
                                           <div class="col-lg-2 err-msg"><span><?PHP echo form_error('Origin')?></span> </div>
                                      </div>
                                      
                                      <div class="form-group ">
                                          <label for="fullname" class="control-label col-lg-4">Destination<span class="required">*</span></label>
                                          <div class="col-lg-6">
<input class=" form-control" id="Destination" name="Destination" type="text" value="<?PHP echo set_value('Destination');?>" />
                                          </div>
                                           <div class="col-lg-2 err-msg"><span><?PHP echo form_error('Destination')?></span> </div>
                                      </div>
                                      
                                      
                                      <div class="form-group ">
                                          <label for="fullname" class="control-label col-lg-4">Status<span class="required">*</span></label>
                                          <div class="col-lg-6">
                                         <?PHP  $status = set_value('Status');?>
<select name="Status" class="form-control">

	<option value="0" <?PHP if($status=='0') echo 'selected="selected"'; ?> >Select Status </option>
	<option value="At origin" <?PHP if($status=='At origin') echo 'selected="selected"'; ?>>At origin </option>
	<option value="At Hyderabad" <?PHP if($status=='At Hyderabad') echo 'selected="selected"'; ?>>At Hyderabad </option>
	<option value="Reached destination" <?PHP if($status=='Reached destination') echo 'selected="selected"'; ?>>Reached destination </option>
	<option value="Out for delivery" <?PHP if($status=='Out for delivery') echo 'selected="selected"'; ?>> Out for delivery </option>
	<option value="Delivered" <?PHP if($status=='Delivered') echo 'selected="selected"'; ?>>Delivered </option>

</select>
                                          </div>
                                          <div class="col-lg-2 err-msg"><span><?PHP echo form_error('Status')?></span> </div>
                                           
                                      </div>
                                     
                                      
                                     --> 
                                      
                                      <div class="form-group">
                                          <div class="col-lg-offset-4 col-lg-8">
                                             
                                             <input type="submit" class="btn btn-primary " name="addClass" />
                                           
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