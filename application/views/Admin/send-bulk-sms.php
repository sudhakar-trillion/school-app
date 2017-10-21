
<section id="main-content">
  <section class="wrapper">  
 <div class="row">
				<div class="col-lg-12">
                
                <ol class="breadcrumb">
					<li><i class="fa fa-home"></i> <a href="<?PHP echo base_url('dashboard');?> ">Dashboard</a></li>
                    <li>Sent Absent SMS</li>
					</ol>
                
                </div>
			</div>

	<div class="row">
  
                  <div class="col-lg-12">
                 
                      <section class="panel">
                          <header class="panel-heading">
                             Send SMS
                          </header>
                          <div class="panel-body">
                        
                              <div class="form col-lg-9">
                              
                                  <form class="form-validate form-horizontal " id="sms_form" method="post" action="">
                                      
                                      
                                        <div class="form-group ">
                                          <label for="sections" class="control-label col-lg-4">Bulk SMS Content<span class="required">*</span></label>
                                          <div class="col-lg-6">
                                          <textarea class="form-control" id="bulksmscontent" name="bulksmscontent"></textarea>
                                          </div>
                                           <div class="col-lg-2 err-msg assign-err"><span class="bulksmscontent_err"></span> </div>
                                      </div>
                                      
                                      
                                      <div class="form-group">
                                          <div class="col-lg-offset-4 col-lg-8">
                                             
                                             <input type="button" class="btn btn-primary "  name="BulkSMS_btn" id="BulkSMS_btn" value="Send SMS" />
                                             <span style="margin-left:20px" class="sms-message-resp" ></span>
                                           
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