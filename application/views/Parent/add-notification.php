<section id="main-content">
  <section class="wrapper">  
 <div class="row">
				<div class="col-lg-12">
                
                <ol class="breadcrumb">

					<li><i class="fa fa-home"></i><a href="<?PHP echo base_url('parent-dashboard');?>">Dashboard</a></li>
                    <li><i class="fa fa-desktop"></i><a href="<?PHP echo base_url('view-admin-notifications');?>">view admin notifications</a></li>
                    
                    <li>add notifications</li>

					</ol>
                
                </div>
			</div>

	<div class="row">
  
                  <div class="col-lg-12">
                        
                        <div class="col-lg-7" id="contentdiv" style="margin-top:20px;">
                       
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
                            <!-- <span class="pull-right"><a class="btn btn-primary notification_replybtn" addedon="<?PHP echo $notifi->AddedOn; ?>" >Comments</a> </span>-->
                            </div>
                            </div>
                            </div>
                        <?PHP
							}
						?>
					
                            <?PHP echo $pagination_string;?>
                        </div>
                        
                        </div>
                        
                        <div class="col-md-5" >
                        
                        <div class="form-group">
                                      	
                                        <div class="col-md-12" style="margin-bottom: 15px;">
                                        
                                        <div class="form-group">
                                        
                                            <form style="margin-top:19px;">
                                            	
                                                <label class="notification-label">Add notification to admin</label>
                                                <input type="text" name="NotificationTitle" id="NotificationTitle" class="NotificationTitle form-control" placeholder="Enter Notification Title" style="margin-top:2px; margin-bottom:5px" />
                                                
                                                <span class="notificationToitle_err"> </span>
                                                
                                                <textarea class="form-control" rows="10" id="notificationToadmin"> </textarea>
                                                <span class="notificationToadmin_err"> </span>
                                            </form>
                                            
                                        
                                        </div>
                                        
                                        
                                        <div class="col-md-12">
                                            	<div class="col-md-10"> 
                                                	<input type="button" class="btn btn-primary "  name="addNotification_parent" id="addNotification_parent" value="Send Notification" />
                                             <span style="margin-left:20px" class="add-admin-notification-resp" ></span>
                                                </div>
                                                
                                             </div>
                                        
                                        <div class="clearfix"></div>
                                      </div>
                        
                        
                        </div>
                        
                        <div class="clearfix"> </div>
                  </div>
              </div>          
              
</section          
      ></section>