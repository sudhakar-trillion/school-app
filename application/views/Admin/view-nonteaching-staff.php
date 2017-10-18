
<section id="main-content">
  <section class="wrapper">  
 <div class="row">
				<div class="col-lg-12">
                
                <ol class="breadcrumb">
					<li><i class="fa fa-home"></i> <a href="<?PHP echo base_url('dashboard');?> ">Dashboard </a></li>
                        <li><i class="fa fa-plus"></i> <a href="<?PHP echo base_url('add-nonteaching-staff');?> ">Add nonteaching staff</a></li>
						<li><i ></i>view nonteaching staff</li>
					</ol>
                
                </div>
			</div>

	<div class="row">
  
                  <div class="col-lg-12">
                 	
                    
                    
                    
                      <section class="panel">
                         
                          <header class="panel-heading">
                              View nonteaching staff
                          </header>
                         
                          
                          <table class="table table-striped table-advance table-hover">
                           <tbody>
                           <tr>
                                <th>SLNO</th>
                                 <th><i class="icon_profile"></i> Staff</th>
                                     <th><i class="icon_profile"></i> Staff Department</th>
                                  <th><i class="icon_cogs"></i> Actions</th>
                              </tr>

                           <tbody>
                           		
                                <?PHP
										$slno=0;
										
										if($this->uri->segment(2)) { $slno = ($this->uri->segment(2)-1)*$perpage;	}
												
										foreach($staffPeople->result() as $staff)
										{
											$slno++;
											?>
                                            <tr class="data-row">
                                                <td><?PHP echo $slno;?> </td>
                                                <td> <?PHP echo $staff->StaffName;?></td>
                                                 <td> <?PHP echo $staff->StaffDepartment;?></td>
                                                <td>
                                                <a href="<?PHP echo base_url('edit-nonteaching-staff/').$staff->StaffId?>" class="btn btn-primary" >Edit</a>
                                                <a style="cursor:pointer"  class="btn btn-danger delete_nonteachingstaff" delstaff="<?PHP echo $staff->StaffId; ?>">Delete</a>
                                                
                                                </td>
                                            </tr>

                                          <?PHP	
										}
										?>
                                        <tr>
                              		<td colspan="8"> <?PHP echo $pagination_string; ?> </td>
                              </tr>
                                    
                            
                            
						   </tbody>
                        </table>
                          
                          
                      </section>
                  </div>
              </div>          
              
</section          
      ></section>