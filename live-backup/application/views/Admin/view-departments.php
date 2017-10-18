<section id="main-content">
  <section class="wrapper">  
 <div class="row">
				<div class="col-lg-12">
                
                <ol class="breadcrumb">
					<li><i class="fa fa-home"></i> <a href="<?PHP echo base_url('dashboard');?> ">Dashboard</a></li>
                    <li><i class="fa fa-plus"></i> <a href="<?PHP echo base_url('add-department');?> ">Add department</a></li>
                    <li><i class="fa fa-desktop"></i>View departments</li>
					</ol>
                
                </div>
			</div>

	<div class="row">
  
                  <div class="col-lg-12">
                 	
                    
                    
                    
                      <section class="panel">
                         
                          <header class="panel-heading">
                              View departments
                          </header>
                         
                        
                         
                         
                          
                          
                          <table class="table table-striped table-advance table-hover">
                           <tbody>
                           <tr>
                                <th>SLNO</th>

                                 <th><i class="icon_profile"></i>Department</th>
                                 
                                  <th><i class="icon_cogs"></i> Actions</th>
                              </tr>

                           <tbody>
                           <?PHP
						   		if($departments!='0')
								{
									$slno=0;
									if($this->uri->segment(2)) { $slno = ($this->uri->segment(2)-1)*$perpage;	}
									
									foreach($departments->result() as $dept)
									{
										$slno++;
										?>
                                            <tr>
                                            <td><?PHP echo $slno;?> </td>
                                            <td class="event"><?PHP echo $dept->Department;?> </td>
                                           
                                            <td>
                                            <a href="<?PHP echo base_url('edit-department')."/".$dept->DepartId?>" style="margin-left:15px" class="btn btn-success">Edit department</a>
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