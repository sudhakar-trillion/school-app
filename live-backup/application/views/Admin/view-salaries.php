
<section id="main-content">
  <section class="wrapper">  
 <div class="row">
				<div class="col-lg-12">
                
                <ol class="breadcrumb">
                	<li><i class="fa fa-home"></i> <a href="<?PHP echo base_url('dashboard');?> ">Dashboard </a></li>
					<li><i class="fa fa-plus"></i> <a href="<?PHP echo base_url('add-salary');?> ">Add salary</a></li>
                    <li><i class="fa fa-eye"></i> view-salaries</li>
                    
                     
					</ol>
                
                </div>
			</div>

	<div class="row">
  
                  <div class="col-lg-12">
                 	
                    
                    
                    
                      <section class="panel">
                         
                          <header class="panel-heading">
                              View salaries
                          </header>
                         <?PHP
						 
						 	if( $this->session->userdata('StaffType'))
								$stafftype =  $this->session->userdata('StaffType');
							else
								$stafftype ='none';
								
							if( $this->session->userdata('Month'))
								$Month =  $this->session->userdata('Month');	
							else
								$Month='none';
						 
						 ?>
                         
                         
                          <form method="post" action="<?PHP echo base_url('view-salaries')?>">
                          
                          <div class="col-md-2" style="padding:10px; margin-left:10px" >
                          
                         	<select class=" form-control" id="StaffType" name="StaffType">
                                        
                                        <option value="none">Select Staff Type</option>
                                        <option value="Teaching" <?PHP if($stafftype=="Teaching") echo 'selected'; ?> >Teaching staff</option>
                                        <option value="Non-Teaching" <?PHP if($stafftype=="Non-Teaching") echo 'selected'; ?> >Non-Teaching staff</option>
                                        
                                        </select>
                            
                          </div>
                          
                           <div class="col-md-2" style="padding:10px; margin-left:10px" >
                          	
                         <select class=" form-control" id="Month" name="Month">
                                        
                                        <option value="none">Select Month</option>
                                        		
                                                <option value="1" <?PHP if($Month=="1") echo 'selected'; ?> >January</option>
                                                <option value="2" <?PHP if($Month=="2") echo 'selected'; ?>>February</option>
                                                <option value="3" <?PHP if($Month=="3") echo 'selected'; ?> >March</option>
                                                <option value="4" <?PHP if($Month=="4") echo 'selected'; ?> >April</option>
                                                
                                                 <option value="5" <?PHP if($Month=="5") echo 'selected'; ?> >May</option>
                                                <option value="6" <?PHP if($Month=="6") echo 'selected'; ?> >June</option>
                                                <option value="7" <?PHP if($Month=="7") echo 'selected'; ?> >July</option>
                                                <option value="8" <?PHP if($Month=="8") echo 'selected'; ?> >August</option>
                                                
                                                 <option value="9" <?PHP if($Month=="9") echo 'selected'; ?> >Septemer</option>
                                                <option value="10" <?PHP if($Month=="10") echo 'selected'; ?> >October</option>
                                                <option value="11" <?PHP if($Month=="11") echo 'selected'; ?> >November</option>
                                                <option value="12" <?PHP if($Month=="12") echo 'selected'; ?> >December</option>
                                                
                                                
                                        </select>
                            
                          </div>
                
                          
                           <div class="col-md-2" style="padding:10px; margin-left:10px" > 
                          <input type="submit" name="salaries_filter" class="btn btn-primary" value="Filter" />
                          </div>
                          
                          
                          </form>
                          
                          <table class="table table-striped table-advance table-hover">
                           <tbody>
                           <tr>
                                <th>SLNO</th>
                               
                                 <th><i class="icon_profile"></i> Staff Type</th>
                                 <th><i class="icon_profile"></i> Staff Name</th>
                                 <th><i class="icon_profile"></i> Month</th>
                                 <th><i class="icon_profile"></i> Academic Year</th>
                                  <th><i class="icon_profile"></i>Salary</th>
                                  <th><i class="icon_cogs"></i> Actions </th>
                              </tr>

                           
                           <tbody>
                           			
                                    <?PHP
									 $slno=0;
									if($this->uri->segment(2)) { $slno = ($this->uri->segment(2)-1)*$perpage;	}
                                    		foreach( $salrayDetails['Salries']->result() as $salary)
											{
												$slno++;
												?>
                                                <tr>
                                                	<td><?PHP echo $slno;?></td>
                                                    <td><?PHP echo $salary->Category; ?> </td>
                                                    
                                                    <td><?PHP echo $salary->StaffName; ?> </td>
                                                    <td>
													
													<?PHP
														
														switch($salary->Month)
														{
															
															case "1":
																echo "January";
															break;
															
															case "2":
																echo "February";
															break;
															
															case "3":
																echo "March";
															break;
															
															case "4":
																echo "April";
															break;
															
															
															case "5":
																echo "May";
															break;
															
															case "6":
																echo "June";
															break;
															
															case "7":
																echo "July";
															break;
															
															case "8":
																echo "August";
															break;
															
															
															
															case "9":
																echo "September";
															break;
															
															case "10":
																echo "October";
															break;
															
															case "11":
																echo "November";
															break;
															
															case "12":
																echo "December";
															break;
															
															
														}
													
													
													 ?> </td>
                                                    
                                                    <td><?PHP echo $salary->AcademicYear; ?> </td>
                                                    <td><?PHP echo $salary->Salary; ?> </td>
                                                    
                                                      <td> <a class="btn btn-primary" href="<?PHP echo base_url('edit-salary/').$salary->SLNO;?>">Edit </a> </td>
                                                 
	
                                                    
                                                    
                                                </tr>
                                                <?PHP	
											}
									?>
                                    
                                     <tr>
                                	<td colspan="10"><?PHP echo $salrayDetails['pagination_string']; ?></td>
                                </tr>
                                    
                           </tbody>
                        </table>
                          
                          
                      </section>
                  </div>
              </div>          
              
</section          
      ></section>