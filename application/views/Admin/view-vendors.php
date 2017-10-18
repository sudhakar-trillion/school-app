
<section id="main-content">
  <section class="wrapper">  
 <div class="row">
				<div class="col-lg-12">
                
                <ol class="breadcrumb">
                	<li><i class="fa fa-home"></i> <a href="<?PHP echo base_url('dashboard');?> ">Dashboard </a></li>
					<li><i class="fa fa-plus"></i> <a href="<?PHP echo base_url('add-vendor');?> ">Add Vendor</a></li>
                    <li><i class="fa fa-eye"></i> view-vendors</li>
                  
					</ol>
                
                </div>
			</div>

	<div class="row">
  
                  <div class="col-lg-12">
                 	
                    
                    
                    
                      <section class="panel">
                         
                          <header class="panel-heading">
                              View vendors
                          </header>
                         <?PHP
						 	$title = '';
							$person='';
							
							if( $this->input->post('filter')!='' )
							{
									$title  = $this->input->post('title');
									$person = $this->input->post('person');
							}
							
						 ?>
                         
                         
                          <form method="post" action="<?PHP echo base_url('view-vendors')?>">
                          
                          <div class="col-md-2" style="padding:10px; margin-left:10px" >
                          
                         <input type="text" class="form-control billfor" name="title" id="title" placeholder="By Title" value="<?PHP echo $title?>" />
                            
                          </div>
                          
                           
                            <div class="col-md-2" style="padding:10px; margin-left:10px" >
                          
                         <input type="text" class="form-control person" name="person" id="person" placeholder="By Person" value="<?PHP echo $person; ?>" />
                            
                          </div>
                
                          
                           <div class="col-md-2" style="padding:10px; margin-left:10px" > 
                          <input type="submit" name="filter" class="btn btn-primary" value="Filter" />
                          </div>
                          
                          
                          </form>
                          
                          <table class="table table-striped table-advance table-hover">
                           <tbody>
                           <tr>
                                <th>SLNO</th>
                                 <th><i class="icon_profile"></i> Title</th>
                                 <th><i class="icon_profile"></i> Vendor Company</th>
                                 <th><i class="icon_profile"></i> Person</th>
                                 <th><i class="icon_profile"></i> Email</th>
                                 <th><i class="icon_profile"></i> Phone1</th>
                                  <th><i class="icon_profile"></i>Phone2</th>
                                   <th><i class="icon_profile"></i> Address</th>
                                    <th><i class="icon_profile"></i> Status</th>
                                  <th><i class="icon_cogs"></i> Actions </th>
                              </tr>

                           
                           <tbody>
                           			
                                    <?PHP
									 $slno=0;
									if($this->uri->segment(2)) { $slno = ($this->uri->segment(2)-1)*$perpage;	}
                                    		foreach( $vendorsDetails['Vendors']->result() as $vendor)
											{
												$slno++;
												?>
                                                <tr>
                                                	<td><?PHP echo $slno;?></td>
                                                    <td><?PHP echo $vendor->Title;?></td>
                                                    <td><?PHP echo $vendor->CompanyName;?></td>
                                                    
                                                    <td><?PHP echo $vendor->ContactPerson;?></td>
                                                    <td><?PHP echo strtolower($vendor->ContactEmail);?></td>
                                                    <td><?PHP echo $vendor->Mobile1;?></td>
                                                    
                                                    <td><?PHP if( trim($vendor->Mobile2)!='') { echo $vendor->Mobile2; } else echo 'Not given';?></td>
                                                    <td><?PHP echo $vendor->Address;?></td>
                                                       <td class="vendor<?PHP echo $vendor->VendorId; ?>"> <?PHP echo $vendor->Status;?></td>
                                                    <td>
                                                    <a  href="<?PHP echo base_url('edit-vendor')."/".$vendor->VendorId ?>"><i class="fa fa-edit" style="font-size:19px"></i> </a>
                                                    
                                                    <?PHP if($vendor->Status=="Active")
													{
														?>
                                                    <a title="Change status" style="cursor:pointer" class="inactivate_activate" stats = "<?PHP if($vendor->Status=="Active") echo "Inactive"; else echo "Active"; ?>" id="<?PHP echo $vendor->VendorId; ?>"><i class="fa fa-times" style="font-size: 12px;
    color: #fff;
    margin-left: 10px;
    border-radius: 36%;
    background: red;
    padding: 3px;"></i> </a>
    
    <?PHP 
			}
			else
			{
				?>
                <a title="Change status" style="cursor:pointer" class="inactivate_activate" stats = "<?PHP if($vendor->Status=="Active") echo "Inactive"; else echo "Active"; ?>" id="<?PHP echo $vendor->VendorId; ?>"><i class="fa fa-check" style="font-size: 12px;
    color: #fff;
    margin-left: 10px;
    border-radius: 36%;
    background:#57a602;
    padding: 3px;"></i> </a>
                <?PHP
			}
			
			?>
	
                                                    </td>
                                                    
                                                </tr>
                                                <?PHP	
											}
									?>
                                    
                                     <tr>
                                	<td colspan="10"><?PHP echo $vendorsDetails['pagination_string']; ?></td>
                                </tr>
                                    
                           </tbody>
                        </table>
                          
                          
                      </section>
                  </div>
              </div>          
              
</section          
      ></section>