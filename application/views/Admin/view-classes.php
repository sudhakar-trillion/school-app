
<section id="main-content">
  <section class="wrapper">  
 <div class="row">
				<div class="col-lg-12">
                
                <ol class="breadcrumb">
					<!--	<li><i class="fa fa-home"></i> <a href="<?PHP echo base_url('dashboard');?> ">Dashboard </a></li> -->
                        <li><i class="fa fa-home"></i> <a href="<?PHP echo base_url('add-class');?> ">Add class</a></li>
						<li><i ></i>View Classes</li>
					</ol>
                
                </div>
			</div>

	<div class="row">
  
                  <div class="col-lg-12">
                 	
                    
                    
                    
                      <section class="panel">
                         
                          <header class="panel-heading">
                              View classes
                          </header>
                         
                          
                          <table class="table table-striped table-advance table-hover">
                           <tbody>
                           <tr>
                                <th>SLNO</th>
                                 <th><i class="icon_profile"></i> Class</th>
                                  <th><i class="icon_cogs"></i> Actions</th>
                              </tr>

                           <tbody>
                           		
                                <?PHP
									if( $classes!='0')
									{
										$slno=0;
										
										if($this->uri->segment(2)) { $slno = ($this->uri->segment(2)-1)*5;	}
												
										foreach($classes->result() as $cls)
										{
											$slno++;
											?>
                                            <tr>
                                                <td><?PHP echo $slno;?> </td>
                                                <td> <?PHP echo $cls->ClassName;?></td>
                                                <td><a href="<?PHP echo base_url('edit-class/').$cls->SLNO?>" class="btn btn-primary" >Edit</a></td>
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