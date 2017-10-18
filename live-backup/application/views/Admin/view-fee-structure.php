
<section id="main-content">
  <section class="wrapper">  
 <div class="row">
				<div class="col-lg-12">
                
                <ol class="breadcrumb">
						<li><i class="fa fa-home"></i> <a href="<?PHP echo base_url('dashboard');?> ">Dashboard </a></li> 
                        <li><i class="fa fa-plus"></i> <a href="<?PHP echo base_url('add-fee-structure');?> ">Add fee structure</a></li>
						<li><i ></i>View Fee structure</li>
					</ol>
                
                </div>
			</div>

	<div class="row">
  
                  <div class="col-lg-12">
                 	
                    
                    
                    
                      <section class="panel">
                         
                          <header class="panel-heading">
                              View teachers
                          </header>
                         
                          
                          <table class="table table-striped table-advance table-hover">
                           <tbody>
                           <tr>
                                <th>SLNO</th>
                                 <th><i class="icon_profile"></i> Academic year</th>
                                  <th><i class="icon_profile"></i>Class</th>
                                   <th><i class="icon_profile"></i> Monthly</th>
                                    <th><i class="icon_profile"></i> Quarterly</th>
                                     <th><i class="icon_profile"></i> Halfyearly</th>
                                      <th><i class="icon_profile"></i> Annually</th>
                                  <th><i class="icon_cogs"></i> Actions</th>
                              </tr>

                           <tbody>
                           		
                                <?PHP
									if( @$feestructure!='0')
									{
										$slno=0;
										if($this->uri->segment(2)) { $slno = ($this->uri->segment(2)-1)*$perpage;	}

										foreach($feestructure->result() as $stru)
										{
											$slno++;
											?>
                                            <tr>
                                            	<td><?PHP echo $slno; ?> </td>
                                                <td><?PHP echo $stru->AcademicYear;?> </td>
                                                <td><?PHP echo $stru->ClassName;?>  </td>
                                                <td><?PHP echo $stru->MonthlyFee;?>  </td>
                                                <td><?PHP if($stru->QuarterlyFee!=''){ echo $stru->QuarterlyFee; } else echo "No added"; ?>  </td>
                                                <td><?PHP if($stru->HalfyearlyFee) { echo $stru->HalfyearlyFee; } else echo "No added"; ?>  </td>
                                                <td><?PHP echo $stru->AnnualFee	;?> </td>
                                                 <td><a href="<?PHP echo base_url('edit-fee-structure')."/".$stru->FeeId?>" class="btn btn-primary"> Edit</a></td>
                                            </tr>
                                            <?PHP	
											
										}
										?>
                                        <tr>
                                        	<td colspan="9">
                                            <?PHP echo $pagination_string; ?>
                                            </td>
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