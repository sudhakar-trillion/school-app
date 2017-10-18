
<section id="main-content">
  <section class="wrapper">  
 <div class="row">
				<div class="col-lg-12">
                
                <ol class="breadcrumb">
                	<li><i class="fa fa-home"></i> <a href="<?PHP echo base_url('dashboard');?> ">Dashboard</a></li>
					<li><i class="fa fa-plus"></i> <a href="<?PHP echo base_url('add-subjects');?> ">Add subjects</a></li>
					<li><i class="fa fa-laptop"></i><a href="<?PHP echo base_url('view-subjects');?> "> View subjects</a></li>
                    <li><i class="fa fa-plus"></i><a href="<?PHP echo base_url('assign-subject-class');?> "> Assign subjects to class</a></li>
                    <li>View assigned classes</li>
					</ol>
                
                </div>
			</div>

	<div class="row">
  
                  <div class="col-lg-12">
                 	
                    
                    
                    
                      <section class="panel">
                         
                          <header class="panel-heading">
                              View assigned classes
                          </header>
                          
                          <?PHP
						  	if( $this->session->userdata('selectedClassSlno')!='' )
								$ClassName = $this->session->userdata('selectedClassSlno');
							else
								$ClassName = '0';

						  ?>                         
                          <form style="margin:10px;" method="post" action="<?PHP echo base_url('view-assigned-subjects')?>"> 
                         <div class="col-md-3" style="margin-bottom:10px; ">
                           
                                 <select name="ClassSlno" class="form-control">
                                 <option value="0">Select Class </option>
                                 <?PHP
								 	foreach($classes->result() as $cls)
									{
										?>
                                         <option value="<?PHP echo $cls->SLNO?>" <?PHP if($cls->SLNO==$ClassName){ echo 'selected="selected"'; } ?> > <?PHP echo $cls->ClassName?> </option>
                                        <?PHP
									}
								 ?>
                                 </select>
                           		                          
                         
                         
                         </div> 
                          <div class="col-md-3" style="margin-bottom:10px; ">
                         	<input type="submit" name="filter_assigned_subjects" value="submit" class="btn btn-success" />
                          </div>
                         
                         
                          </form>
                          <table class="table table-striped table-advance table-hover">
                           <tbody>
                           <tr>
                                <th>SLNO</th>
                                 <th><i class="icon_profile"></i> Class</th>
                                 <th><i class="icon_profile"></i> Subject</th>
                                  <th><i class="icon_cogs"></i> Actions</th>
                              </tr>

                           <tbody>
                           <?PHP
						   	if($assignedsubjects!='0')
							{
								$slno=0;
								if($this->uri->segment(2)) { $slno = ($this->uri->segment(2)-1)*$perpage;	}
								
								foreach($assignedsubjects->result() as $subj)
								{$slno++;
									?>
                                    <tr>
                                    	<td><?PHP echo $slno; ?> </td>
                                        <td><?PHP echo $subj->ClassName;?> </td>
                                        <td> <?PHP echo $subj->SubjectName;?> </td>
                                        <td><a href="<?PHP echo base_url('edit-assigned-subject-class')?>/<?PHP echo $subj->ClassSlno;?>" class="btn btn-primary">Edit </a></td>
                                    </tr>
                                    <?PHP	
								}
								
								?>
                                
                                <?PHP
									echo "<tr> <td colspan='4'>".$pagination_string." </td></tr>";
								
							}
							else
							{
								
							}
						   ?>
                           
                           		
						   </tbody>
                        </table>
                          
                          
                      </section>
                  </div>
              </div>          
              
</section          
      ></section>