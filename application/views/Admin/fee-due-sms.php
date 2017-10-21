
<section id="main-content">
  <section class="wrapper">  
 <div class="row">
				<div class="col-lg-12">
                
                <ol class="breadcrumb">
					<li><i class="fa fa-home"></i> <a href="<?PHP echo base_url('dashboard');?> ">Dashboard</a></li>
                    <li>Fee Due SMS</li>
					</ol>
                
                </div>
			</div>

	<div class="row">
  
                  <div class="col-lg-12">
                 
                      <section class="panel">
                          <header class="panel-heading">
                             Send Fee Due SMS
                          </header>
                          <div class="panel-body">
                        
                              <div class="form col-lg-9">
                              
                                  <form class="form-validate form-horizontal " id="sms_form" method="post" action="">
                                      
                                      <div class="form-group ">
                                          <label for="ClassName" class="control-label col-lg-4">Class<span class="required">*</span></label>
                                          <div class="col-lg-6">
											<select class="form-control" name="ClassName" id="ClassName">
                                            <?PHP
												
												$class_cnt=0;
											if($classes!='0')
											{	
												foreach( $classes->result() as $clas)
												{
													if( $class_cnt == 0 )
													{
														?>
                                                        <option value="0">Select Class</option>
                                                        <option value="<?PHP echo $clas->SLNO?>"><?PHP echo ucwords($clas->ClassName); ?> </option>
                                                        <?PHP	
													}
													else
														{
															?>
                                                             <option value="<?PHP echo $clas->SLNO?>"><?PHP echo ucwords($clas->ClassName); ?> </option>
                                                            <?PHP
														}
													$class_cnt++;
												}
											}
											?>
                                            
                                            </select>
                                          </div>
                                           <div class="col-lg-2 err-msg assign-err"><span class="ClassName_err"></span> </div>
                                      </div>
                             
                                      
                                      <div class="form-group ">
                                          <label for="sections" class="control-label col-lg-4">Section<span class="required">*</span></label>
                                          <div class="col-lg-6">
											<select class="form-control absentees-section" name="sections" id="sections">
                                            <option value='0'>Select Section</option>
                                            </select>
                                          </div>
                                           <div class="col-lg-2 err-msg assign-err"><span class="section_err"></span> </div>
                                      </div>
                                      
                                      
                                        <div class="form-group ">
                                          <label for="sections" class="control-label col-lg-4">Select Students<span class="required">*</span></label>
                                          <div class="col-lg-6">
											<select class="form-control feedues" name="feedues[]" id="students"  multiple="multiple" style="height:200px">
                                            <option value=0>Select Students</option>
                                            </select>
                                          </div>
                                           <div class="col-lg-2 err-msg assign-err"><span class="absentees_err"></span> </div>
                                      </div>
                                      
                                       <div class="form-group ">
                                          <label for="sections" class="control-label col-lg-4">SMS Due Content<span class="required">*</span></label>
                                          <div class="col-lg-6">
											<textarea class="form-control duesmscontent" id="duesmscontent" name="duesmscontent"></textarea>
                                          </div>
                                           <div class="col-lg-2 err-msg assign-err"><span class="duesmscontent_err"></span> </div>
                                      </div>
                                      
                                      
                                      <div class="form-group">
                                          <div class="col-lg-offset-4 col-lg-8">
                                             
                                             <input type="button" class="btn btn-primary "  name="FeedueSMS_btn" id="FeedueSMS_btn" value="Send SMS" />
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