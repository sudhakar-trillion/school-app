
<section id="main-content">
  <section class="wrapper">  
 <div class="row">
				<div class="col-lg-12">
                
                <ol class="breadcrumb">
					<!--	<li><i class="fa fa-home"></i> <a href="<?PHP echo base_url('dashboard');?> ">Dashboard </a></li> -->
                        <li><i class="fa fa-home"></i> <a href="<?PHP echo base_url('add-teacher');?> ">Add teacher</a></li>
						<li><i ></i>View Classes</li>
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
                                 <th><i class="icon_profile"></i> Teacher</th>
                                  <th><i class="icon_cogs"></i> Actions</th>
                              </tr>

                           <tbody>
                           		
                                <?PHP
									if( @$teachers!='0')
									{
										
										$slno=0;
										if($this->uri->segment(2)) { $slno = ($this->uri->segment(2)-1)*5;	}
										foreach($teachers->result() as $teacher)
										{
											$slno++;
											?>
                                            <tr>
                                            	<td><?PHP echo $slno; ?></td>
                                                <td><?PHP echo $teacher->TeacherName;?> </td>
                                                <td><a href="<?PHP echo base_url('edit-teacher')."/".$teacher->TeacherId?>" class="btn btn-primary">Edit</a> </td>
                                            </tr>
                                            <?PHP	
										}

										echo "<tr><td colspan='4'>".$pagination_string."</td></tr>";
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