<section id="main-content">
  <section class="wrapper">  
 <div class="row">
				<div class="col-lg-12">
                
                <ol class="breadcrumb">
					<li><i class="fa fa-home"></i> <a href="<?PHP echo base_url('dashboard');?> ">Dashboard </a></li>
                    <li><i class="fa fa-plus"></i> <a href="<?PHP echo base_url('add-nonteaching-staff');?> ">Add Nonteaching Staff </a></li>
                    <li><i class="fa fa-eye"></i> <a href="<?PHP echo base_url('view-nonteaching-staff');?> ">View Nonteaching Staff </a></li>
                    <li><i class="fa fa-plus"></i> <a href="<?PHP echo base_url('add-nonteaching-staff-details');?> ">Add non teaching staff details</a></li>
					<li><i ></i>View non teaching staff details</li>
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
                                 <th><i class="icon_profile"></i>Staff Name</th>
                                  <th><i class="icon_cogs"></i> Contact Number</th>
                                  <th><i class="icon_cogs"></i> Contact Address</th>

                                  <th><i class="icon_cogs"></i> Action</th>
                              </tr>

                           <tbody>
                           		
                                <?PHP
									if( $nontexhingstaffDetails!='0')
									{
										$slno=0;
										
										if($this->uri->segment(2)) { $slno = ($this->uri->segment(2)-1)*$perpage;	}
										
										foreach($nontexhingstaffDetails->result() as $data)
										{
											$slno++;
											?>
                                            <tr>
                                            	<td><?PHP echo $slno;?></td>
                                                <td><?PHP echo $data->StaffName?></td>
                                                <td><?PHP echo $data->ContactNumber?></td>
                                                <td><?PHP echo $data->ContactAddress?></td>
                                                <td><a href="<?PHP echo base_url('edit-nonteaching-staff-details/').$data->StaffDetailId?>" class="btn btn-primary" >Edit</a></td>
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