
<section id="main-content">
  <section class="wrapper">  
 <div class="row">
				<div class="col-lg-12">
                
                <ol class="breadcrumb">
                	<li><i class="fa fa-home"></i> <a href="<?PHP echo base_url('dashboard');?> ">Dashboard </a></li>
					<li><i class="fa fa-plus"></i> <a href="<?PHP echo base_url('add-bill');?> ">Add Bills</a></li>
                    <li><i class="fa fa-eye"></i> view-bills</li>
                    
                     <li style="float:right;"><a style="cursor:pointer" class="download-bill-excel"><i class="fa fa-file-excel-o" aria-hidden="true"></i>Download excel </a> </li>
					</ol>
                
                </div>
			</div>

	<div class="row">
  
                  <div class="col-lg-12">
                 	
                   
                    
                    
                      <section class="panel">
                        
                          <header class="panel-heading">
                              View bills
                          </header>
                          <?PHP
						  $PaidTo='';
						  $PaidDated='';
						  
						  	if( $this->session->userdata('PaidTo')!='' )	
								$PaidTo = $this->session->userdata('PaidTo');		
							if( $this->session->userdata('PaidDated')!='' )
							{
								$PaidDated = date_create($this->session->userdata('PaidDated'));
								$PaidDated = date_format($PaidDated,"d-m-Y");
								
							}
						  
						  ?>
                         
                           <form  method="post" action="<?PHP echo base_url('view-bills')?>" > 
							
                            <div class="col-md-2" style="padding:10px; margin-left:10px" >
                            <input type="text" class="form-control billpaidto" name="PaidTo" placeholder="Paid to" value="<?PHP echo $PaidTo?>" />
                            </div>   
                            
                            <div class="col-md-2" style="padding:10px; margin-left:10px" >
                            <input type="text" class="form-control billdate" name="PaidOn" placeholder="Paid on" value="<?PHP echo $PaidDated?>" />
                            </div>   
                            
                            <div class="col-md-1" style="padding:10px; margin-left:10px" >
                            <input type="submit" class="btn btn-md btn-danger" name="billfilter" value="Search"/>
                            </div>   
                            
                            
                                             
		                    </form>
                            
                            
                            <?PHP
							
								if(  $this->session->userdata('Fromdate')!='' )	
								{
									if( $this->session->userdata('Todate')!='' )
									{
										$FromDate = $this->session->userdata('Fromdate');
										$Todate   = $this->session->userdata('Todate');	
										
										$FromDate = date_create($FromDate);
										$FromDate = date_format($FromDate,"d-m-Y");
										
										$Todate = date_create($Todate);
										$Todate = date_format($Todate,"d-m-Y");
										
									}
									else
									{
										$FromDate = $this->session->userdata('Fromdate');
										$Todate   = '';	
										
										$FromDate = date_create($FromDate);
										$FromDate = date_format($FromDate,"d-m-Y");
									}
									
								}
								else
								{
									$FromDate='';
									$Todate='';
									
								}
							?>
                            
                             <form  method="post" action="<?PHP echo base_url('view-bills')?>" > 
							
                            <div class="col-md-2" style="padding:10px; margin-left:10px" >
                            <input type="text" class="form-control FromDate" name="FromDate" placeholder="From date" value="<?PHP echo @$FromDate?>" />
                            </div>   
                            
                            <div class="col-md-2" style="padding:10px; margin-left:10px" >
                            <input type="text" class="form-control todate" name="Todate" placeholder="To date" value="<?PHP echo @$Todate?>" />
                            </div>   
                            
                            <div class="col-md-1" style="padding:10px; margin-left:10px" >
                            <input type="submit" class="btn btn-md btn-danger" name="datefilter" value="Search"/>

                            </div>   
                            
                            
                                             
		                    </form>
                          <table class="table table-striped table-advance table-hover">
                           <tbody>
                           <tr>
                                <th>SLNO</th>
                                
                                 <th><i class="icon_profile"></i> Paid For</th>
                                 <th><i class="icon_profile"></i> Paid Amount</th>
                                 <th><i class="icon_profile"></i> Paid To</th>
                                 
                                 <th><i class="icon_profile"></i> Paid On</th>
                                  <th><i class="icon_profile"></i>Contact Person </th>
                                   <th><i class="icon_profile"></i> Email</th>
                                    <th><i class="icon_profile"></i> Phone</th>
                                  <th><i class="icon_cogs"></i> Actions </th>
                              </tr>

                           
                           <tbody>
                           		<?PHP
								$slno=0;
									if($this->uri->segment(2)) { $slno = ($this->uri->segment(2)-1)*$perpage;	}
								
								
									foreach($billDetails->result() as $bill)
									{
										$slno++;
										?>
                                        <tr>
                                        	<td><?PHP echo $slno; ?></td>
                                            <td><?PHP echo $bill->BillFor?></td>
                                            <td><?PHP echo $bill->BillAmount?></td>
                                            
                                            <td><?PHP echo $bill->PaidTo?></td>
                                            <td><?PHP echo $bill->BillDate?></td>
                                            <td><?PHP echo $bill->ContactPerson?></td>
                                            
                                            
                                           
                                           <td><?PHP echo $bill->ContactEmail?></td>
                                           <td><?PHP echo $bill->Mobile1?></td>
                                            <td><a href="<?PHP echo base_url('edit-bill/').$bill->BillId; ?>" class="btn btn-sm btn-primary">Edit</a></td>
                                            
                                            
                                            
                                        
                                        
                                        </tr>
                                        
                                        <?PHP	
										
									}
								
								
								
								?>	<tr>
                                	<td colspan="9"><?PHP echo $pagination_string; ?></td>
                                </tr>
                                   
                           </tbody>
                        </table>
                          
                          
                      </section>
                  </div>
              </div>          
              
</section          
      ></section>