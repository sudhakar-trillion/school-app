<section id="main-content">
  <section class="wrapper">  
 <div class="row">
				<div class="col-lg-12">
                
                <ol class="breadcrumb">

					<li><i class="fa fa-laptop"></i>View parent notifications</li>

					</ol>
                
                </div>
			</div>

	<div class="row">
  
                  <div class="col-lg-12">
                        
                        <div class="col-lg-12" id="contentdiv">
                       
	                        <div class="panel-group m-bot20" id="accordion">
                        <?PHP
							$notif_cnt=0;
							$collapsed='1';
							foreach( $Notifications->result() as $notifi)
							{
								$notif_cnt++;
								if( $this->session->userdata('collapse')!='')
								{
									$collapse = $this->session->userdata('collapse');
									if( $collapse=="#Notif_".$notifi->NotificationId )
									{
										$collapsed='0';
									}
									else
										$collapsed='1';
									
								}
								else
								{
									if($notif_cnt==1)
										$collapsed = 0; 
									else
										$collapsed=1;
								
								}
								

						?>
                            <div class="panel panel-default">
                            <div class="panel-heading">
                            <h4 class="panel-title">
                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#Notif_<?PHP echo $notifi->NotificationId; ?>">
                         <!-- <strong> Notification on  <?PHP echo $notifi->AddedOn; ?></strong>-->
                         <strong> <?PHP echo $notifi->NotificationTitle; ?></strong>
                            </a>
                            </h4>
                            </div>
                            <div id="Notif_<?PHP echo $notifi->NotificationId?>" class="panel-collapse collapse <?PHP if($collapsed==0) echo "in"; ?>">
                            <div class="panel-body">
                           	 <?PHP echo $notifi->Notification; ?>
                           <!--  <span class="pull-right"><a class="btn btn-primary notification_replybtn" addedon="<?PHP echo $notifi->AddedOn; ?>" >Comments</a> </span>-->
                            </div>
                            </div>
                            </div>
                        <?PHP
							}
						?>
					
                            <?PHP echo $pagination_string;?>
                        </div>
                        
                        </div>
                        
                        <!-- <div class="col-md-5 notification-reply-form">
                        
                        <div class="form-group">
                                      	
                                        <div class="col-md-12" style="margin-bottom: 15px;">
                                        
                                        <div class="form-group">
                                        
                                            <form style="margin-top:19px;">
                                            	
                                                <label class="notification-label"></label>
                                                
                                                <textarea class="form-control" rows="10" id="notificationReply"> </textarea>
                                            </form>
                                            
                                        
                                        </div>
                                        
                                        
                                        <div class="col-md-12">
                                            	<div class="col-md-10"> 
                                                	<input type="submit" class="btn btn-primary "  name="update_profile" id="update_profile" value="Comment Here" />
                                             <span style="margin-left:20px" class="add-edit-parent-profile-resp" ></span>
                                                </div>
                                                
                                             </div>
                                        
                                        <div class="clearfix"></div>
                                      </div>
                        
                        
                        </div>
                        
                        <div class="clearfix"> </div>
                  </div> -->
              </div>          
              
</section          
      ></section>