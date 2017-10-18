
<section id="main-content">
  <section class="wrapper">  
 <div class="row">
				<div class="col-lg-12">
                
                <ol class="breadcrumb">
					<li><i class="fa fa-home"></i><a href="<?PHP echo base_url();?>"> Dashboard</a></li>
                    <li><i class="fa fa-plus"></i><a href="<?PHP echo base_url('add-notification-to-student');?>"> Add notification</a></li>
						<li><i ></i>View Notifications</li>
					</ol>
                
                </div>
			</div>

	<div class="row">
  
                  <div class="col-lg-12">
                 	
                    
                    
                    
                      <section class="panel">
                         
                          <header class="panel-heading">
                              View notifications
                          </header>
                         
                          
                          <table class="table table-striped table-advance table-hover">
                           <tbody>
                           <tr>
                                <th>SLNO</th>
                                 <th><i class="icon_profile"></i> Class</th>
                                 <th><i class="icon_cogs"></i> Section</th>
                                 <th><i class="icon_cogs"></i> Student</th>
                                 <th><i class="icon_cogs"></i>Notification</th>
                                 <th><i class="icon_cogs"></i>Assigned On</th>
                                  <th><i class="icon_cogs"></i>Status</th>
                                 <th><i class="icon_cogs"></i>Action</th>
                              </tr>

                           <tbody>
                           		<?PHP
									if($Notifications!='0')
									{
										$slno=0;
										
										if($this->uri->segment(2)) { $slno = ($this->uri->segment(2)-1)*$perpage;	}
										foreach($Notifications->result() as $noti)
										{
											$slno++;
											?>
                                            <tr>
                                            	<td><?PHP echo $slno; ?> </td>
                                                <td><?PHP echo $noti->ClassName;?> </td>
                                                <td><?PHP echo $noti->Section;?> </td>
                                                
                                                <td><?PHP echo $noti->StudentName;?> </td>
                                                <td><?PHP echo $noti->Notification;?> </td>

                                                <td><?PHP echo $noti->AddedOn;?> </td>
                                                <td><?PHP echo $noti->Status;?> </td>
                                                <td><a href="<?PHP echo base_url('edit-notification-to-student')."/".$noti->NotificationId; ?>" class="btn btn-primary">Edit</a> </td>

                                            </tr>
                                            <?PHP
												
										}
										echo "<tr><td colspan='8'>".$pagination_string."</td> </tr>";
										
									}else
									{
										echo "<tr><td colspan='8'>No data found</td> </tr>";	
									}
								?>
                            
                            
						   </tbody>
                        </table>
                          
                          
                      </section>
                  </div>
              </div>          
              
</section          
      ></section>