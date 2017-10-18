
<section id="main-content">
  <section class="wrapper">  
 <div class="row">
				<div class="col-lg-12">
                
                <ol class="breadcrumb">
					
                    <li><i class="fa fa-home"></i> <a href="<?PHP echo base_url('dashboard');?> ">Dashboard </a></li>
                    <li><i class="fa fa-plus"></i> <a href="<?PHP echo base_url('add-student');?> ">Add student</a></li>
                    <li>View students</li>
					</ol>
                
                </div>
			</div>

	<div class="row">
  
                  <div class="col-lg-12">
                 	
                    
                    
                    
                      <section class="panel">
                         
                          <header class="panel-heading">
                              View students
                          </header>
                         
                         <?PHP
							if($this->session->userdata('ClassName')!='')
								$ClassName = $this->session->userdata('ClassName');
							else
								$ClassName ='0';
							
							if($this->session->userdata('Section')!='')	
								$sections = $this->session->userdata('Section'); 
							else
								$sections = '0';
						
							
				
						 ?>
                         
                         
                          <form method="post" action="<?PHP echo base_url('view-students');?>">
                          
                          
                          
                           <div class="col-md-2" style="padding:10px; margin-left:10px" >
                          	
                         <select name="ClassName" id="ClassName" class="form-control">
                          <?PHP
						 $cls_cnt=0;
						 	foreach($classes->result() as $cls)
							{
								if($cls_cnt==0)
								{
									?>
                                    <option value="0" <?PHP if( @$ClassName == '0' ) echo 'selected="selected"';?> >Select Class</option>
                                    <?PHP	
								}
								?>
                                <option value="<?PHP echo $cls->SLNO?>" <?PHP if( @$ClassName == $cls->SLNO ) echo 'selected="selected"';?> ><?PHP echo ucwords($cls->ClassName);?></option>
                                <?PHP
								$cls_cnt++;
								
							}
						 ?>
                         
                         </select>
                            
                          </div>
                          
                         
                          
                           <div class="col-md-2" style="padding:10px; margin-left:10px" >
                          	
                         <select name="sections" id="sections" class="form-control">
                       
                         <?PHP
						 	if($class_sections!='0')
							{$sec_cnt=0;
								foreach($class_sections->result() as $sect)
								{
									if($sec_cnt==0)
									{
									?>
                                   
									<option value="0">Select Section</option>
                                    <?PHP
									}
									?>
                                    <option value="<?PHP echo $sect->SectionId?>" <?PHP if($sections==$sect->SectionId) echo 'selected="selected"'; ?> ><?PHP echo $sect->Section;?></option>
                                    <?PHP	
									$sec_cnt++;
								}
							}else
							{
								?>
                                <option value="0">Select Section</option>
                                <?PHP	
							}
						 ?>
                         
                         </select>
                            
                          </div>
                          
                           <div class="col-md-2" style="padding:10px; margin-left:10px" > 
                          <input type="submit" name="students_filter" class="btn btn-primary" value="Filter" />
                          </div>
                          
                          
                          </form>
                          <table class="table table-striped table-advance table-hover">
                           <tbody>
                           <tr>
                                <th>SLNO</th>
                                 <th><i class="icon_profile"></i> Academic Year</th>
                                 <th><i class="icon_profile"></i> Class</th>
                                 <th><i class="icon_profile"></i> Section</th>
                                 <th><i class="icon_profile"></i> Student</th>
                                 <th><i class="icon_profile"></i> Roll number</th>
                                  <th><i class="icon_cogs"></i> Actions</th>
                              </tr>

                           <tbody>
                           		<?PHP
                                	if($totalstudetns!='0')
									{
										$slno=0;
										if($this->uri->segment(2)) { $slno = ($this->uri->segment(2)-1)*$perpage;	}
										
										foreach($totalstudetns->result() as $std)
										{
											$slno++;
											?>
                                         		<tr>
                                                	<td><?PHP echo $slno; ?></td>
                                                    <td><?PHP echo $std->AcademicYear?></td>
                                                    <td><?PHP echo $std->ClassName?></td>
                                                    <td><?PHP echo $std->Section?></td>
                                                    
                                                    <td><?PHP echo $std->Student?></td>
                                                    <td><?PHP echo $std->Roll?></td>
                                                    <td><a href="<?PHP echo base_url('edit-student')."/".$std->StudentId?>" class="btn btn-primary">Edit</a></td>
                                                    
                                                </tr>   
                                            <?PHP	
										}
										echo "<tr><td colspan='7'> ".$pagination_string."</td></tr>";
									}else
									{
										?>
                                        
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