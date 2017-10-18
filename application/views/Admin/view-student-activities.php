<section id="main-content">
  <section class="wrapper">  
 <div class="row">
				<div class="col-lg-12">
                
                <ol class="breadcrumb">
					<li><i class="fa fa-home"></i> <a href="<?PHP echo base_url('dashboard');?> ">Dashboard</a></li>
                    <li><i class="fa fa-plus"></i> <a href="<?PHP echo base_url('add-student-activity');?> ">Add student activitiy</a></li>
                    <li><i class="fa fa-desktop"></i>View student activities</li>
					</ol>
                
                </div>
			</div>

	<div class="row">
  
                  <div class="col-lg-12">
                 	
                    
                    
                    
                      <section class="panel">
                         
                          <header class="panel-heading">
                              View student activities
                          </header>
                         
                        
                         
                         
                          
                          
                          <table class="table table-striped table-advance table-hover">
                           <tbody>
                           <tr>
                                <th>SLNO</th>

                                 <th><i class="icon_profile"></i> Event title</th>
                                 
                                 <th><i class="icon_profile"></i> Class</th>
                                 <th><i class="icon_profile"></i> Section</th>
                                 <th><i class="icon_profile"></i> Student</th>
                                 <th><i class="icon_profile"></i>Event date</th>
                                  <th><i class="icon_cogs"></i> Actions</th>
                              </tr>

                           <tbody>
                           <?PHP
						   		if($StudentActivities!='0')
								{
									$slno=0;
									if($this->uri->segment(2)) { $slno = ($this->uri->segment(2)-1)*$perpage;	}
									
									foreach($StudentActivities->result() as $stdact)
									{
										$slno++;
										?>
                                            <tr>
                                            <td><?PHP echo $slno;?> </td>
                                            <td class="event"><?PHP echo $stdact->ActivityTitle;?> </td>
                                            <td><?PHP echo $stdact->ClassName;?> </td>
                                            <td><?PHP echo $stdact->Section;?> </td>
                                            
                                            <td><?PHP echo $stdact->Student;?> </td>
                                            <td><?PHP echo $stdact->ActivityDate;?> </td>
                                            <td>
                                            <a class="btn btn-primary getEventpics" id="EventID_<?PHP echo $stdact->ActivityId; ?>" data-toggle="modal" data-target="#myModal" >View event pics</a>
                                            
                                            <a href="<?PHP echo base_url('edit-student-activity')."/".$stdact->ActivityId?>" style="margin-left:15px" class="btn btn-success">Edit event details</a>
                                             </td>
                                            
                                            </tr>              
                                        <?PHP	
									}
									?>
                                    <tr>
                                    	<td colspan="7"><?PHP echo $pagination_string; ?></td>
                                    </tr>
                                    <?PHP
									
								}
						   ?>
                          
                           </tbody>
                           
                        </table>
                          
                          
                      </section>
                  </div>
              </div>          
              
</section          
      ></section>
      
       <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
         <!-- <button type="button" class="close" data-dismiss="modal">&times;</button>-->
          <h4 class="modal-title eventName"></h4>
        </div>
        <div class="modal-body" style="background:#fff;">
      
      
       <div id="myCarousel" class="carousel slide" data-ride="carousel">
  
    
  	</div>
      
      
      
      
      
        </div>
        
      </div>
      
    </div>
  </div>
  
    <!--End Modal -->