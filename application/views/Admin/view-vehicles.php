
<section id="main-content">
  <section class="wrapper">  
 <div class="row">
				<div class="col-lg-12">
                
                <ol class="breadcrumb">
					<li><i class="fa fa-home"></i> <a href="<?PHP echo base_url('dashboard');?> ">Dashboard </a></li>
                        <li><i class="fa fa-plus"></i> <a href="<?PHP echo base_url('add-route');?> ">Add route</a></li>
                        <li><i class="fa fa-plus"></i> <a href="<?PHP echo base_url('add-vehicle');?> ">Add vehicle</a></li>
						<li><i ></i>View vehicles</li>
					</ol>
                
                </div>
			</div>

	<div class="row">
  
                  <div class="col-lg-12">
                 	
                    
                    
                    
                      <section class="panel">
                         
                          <header class="panel-heading">
                              View vehicles
                          </header>
                         
                          
                          <table class="table table-striped table-advance table-hover">
                           <tbody>
                           <tr>
                                <th>SLNO</th>
                                 <th><i class="icon_profile"></i> Vechile Number</th>
                                  <th><i class="icon_cogs"></i> Driver</th>
                                  <th><i class="icon_cogs"></i> Routes</th>
                                  <th><i class="icon_cogs"></i> Contact Number</th>
                                  <th><i class="icon_cogs"></i> Action</th>
                              </tr>

                           <tbody>
                           		
                                <?PHP
									if( $vehicleDetails!='0')
									{
										$slno=0;
										
										if($this->uri->segment(2)) { $slno = ($this->uri->segment(2)-1)*$perpage;	}
												
										foreach($vehicleDetails->result() as $veh)
										{
											$slno++;
											?>
                                            <tr>
                                                <td><?PHP echo $slno;?> </td>
                                                <td> <?PHP echo $veh->VechileNumber;?></td>
                                                <td> <?PHP echo $veh->Driver;?></td>
                                                <td> <?PHP echo $veh->Routes;?></td>
                                               <td> <?PHP echo $veh->ContactNumber;?></td>
                                                
                                             <td><a href="<?PHP echo base_url('edit-vehicle/').$veh->VechileId?>" class="btn btn-primary" >Edit</a></td>
                                            </tr>

                                          <?PHP	
										}
										?>
                                        <tr>
                              		<td colspan="8"> <?PHP echo $pagination_string; ?> </td>
                              </tr>
                                        <?PHP
									}
									else
									{
										?>
                                        <tr> 
                                        	<td colspan="3"><div class="alert alert-warning"><h2>No data found in this page  </h2></div></td>
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