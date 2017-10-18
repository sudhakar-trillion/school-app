<section id="main-content">
  <section class="wrapper">  
 <div class="row">
				<div class="col-lg-12">
                
                <ol class="breadcrumb">

					<li><i class="fa fa-home"></i><a href="<?PHP echo base_url('parent-dashboard')?>">Dashboard</a></li>
                    <li><i class="fa fa-desktop"></i>View event details</li>

					</ol>
                
                </div>
			</div>

	<div class="row">
  
                  <div class="col-lg-12">
                 
                      <section class="panel">
                         
                          <div class="col-lg-12" style="padding-left:0px; padding-right:0px; position:relative">
                          	
                            <div class="col-md-3 right-border">
                           
                           <p> Archieves</p>
                           <?PHP
						   	$event_cnt=-0;
							$mnth_cnt=0;
							foreach($events as $key=>$val)
								{
									$mnth_cnt++;	
							
							   ?>
							   <div class="archieves-list">	
									
									<div class="event-date">
									<?PHP
											
											$date = date_parse($key);
											$mnth = $date['month'];
											$mnth = (int)$mnth;
											$year='';
											
											if( $mnth < 10)
											
												$month="0".$mnth;	
											else
													$month=$mnth;
												
											
											
									?>
									
											<span class="monthyear" id="<?PHP echo $month; ?>"> <?PHP echo $mnth_cnt.".".$key; ?></span>
											<ul <?PHP if($mnth_cnt==1){ echo "style='display:block'"; }?>>
											<?PHP
											$events=0;
												foreach($val as $k=>$v)
												{
													
											?>
												<li><a class="Event-Name" id="<?PHP echo $val[$k]['ActivityId']?>"> <?PHP echo $val[$k]['EventName'];?></a></li>
										   <?PHP
											   $events++;
												}
										?>
												 </ul>
											 </div>
								
								
								</div>
								<?PHP
								$event_cnt++;
								}
						
							?>
                            
                            
                            
                            
                            
                            
                            
                            </div>
                            
                            
                            <div class="col-md-9 event-details-div">
                            <p> Event pics</p>
                             <div class="col-md-12 eventPictures" >
                            <?PHP
								foreach($latest_event->result() as $pics)
								{
									?>
                                    <div class="pic-container col-md-4">
                                	<a class="example-image-link" href="<?PHP echo $pics->Picture?>" data-lightbox="example-set" data-title="Click the right half of the image to move forward.">
                                    <img src="<?PHP echo $pics->Picture?>" />
                                    </a>
                                    <div class="download"><a href="<?PHP echo $pics->Picture?>" download> <i class="fa fa-cloud-download"></i> Download</a></div>
                                </div>
                                    <?PHP	
								}
							
							?>
                            </div>
                            
                                
                                
                                         
								<div class="clearfix"></div>

                            
                            </div>
                           <!-- loader  -->
                          
                          <div class="loader"> <img src="resources/dist/images/loading.gif" /></div>
                          <div class="clearfix"></div>
                           
                            </div>
                              
                           
                      </section>
                  </div>
              </div>          
              
</section >

</section>