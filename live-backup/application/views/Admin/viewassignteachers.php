
<section id="main-content">
  <section class="wrapper">  
 <div class="row">
				<div class="col-lg-12">
                
                <ol class="breadcrumb">
					<li><i class="fa fa-home"></i> <a href="<?PHP echo base_url('add-teacher');?> ">Add Teacher</a></li>
					<li><i class="fa fa-laptop"></i><a href="<?PHP echo base_url('view-teachers');?> "> View teachers </a></li>
                    <li><i class="fa fa-laptop"></i><a href="<?PHP echo base_url('assign-teachers');?> "> Assign teacher</a></li>
                    <li>View assigned teacher</li>
					</ol>
                
                </div>
			</div>

	<div class="row">
  
                  <div class="col-lg-12">
                 	
                    
                    
                    
                      <section class="panel">
                         
                          <header class="panel-heading">
                              View teachers
                          </header>
                         
                          <form method="post" action="">
                          
                          <div class="col-md-2" style="padding:10px; margin-left:10px" >
                          
                          <?PHP
						  		
								if( $this->input->post('assigned_filter') )
								{
									extract($_POST);
								}
								else
								{
									if( $this->session->userdata('TeacherId')!='' )
										$TeacherName=$this->session->userdata('TeacherId','');
									else
										$TeacherName='0';
										
								if( $this->session->userdata('ClassSlno')!='' )
									$ClassName=$this->session->userdata('ClassSlno');
								else
									$ClassName='0';
									
								if( $this->session->userdata('Section','')!='')
									$sections=$this->session->userdata('Section');
								else
								$sections='0';
									
								}
								
						  ?>	
                            
                            
                            
                         <select name="TeacherName" class="form-control">
                         <?PHP
						 $tec_cnt=0;
						 	foreach($teachers->result() as $teacher)
							{
								if($tec_cnt==0)
								{
									?>
                                    <option value="0" <?PHP if( $TeacherName =='0' ) echo 'selected="selected"';?> >Select Teacher</option>
                                    <?PHP	
								}
								?>
                                <option value="<?PHP echo $teacher->TeacherId?>"  <?PHP if( $TeacherName == $teacher->TeacherId ) echo 'selected="selected"';?> ><?PHP echo ucwords($teacher->TeacherName);?></option>
                                <?PHP
								$tec_cnt++;
								
							}
						 ?>
                         
                         </select>
                            
                          </div>
                          
                           <div class="col-md-2" style="padding:10px; margin-left:10px" >
                          	
                         <select name="ClassName" id="ClassName" class="form-control">
                          <?PHP
						 $cls_cnt=0;
						 	foreach($classes->result() as $cls)
							{
								if($cls_cnt==0)
								{
									?>
                                    <option value="0" <?PHP if( $ClassName == '0' ) echo 'selected="selected"';?> >Select Class</option>
                                    <?PHP	
								}
								?>
                                <option value="<?PHP echo $cls->SLNO?>" <?PHP if( $ClassName == $cls->SLNO ) echo 'selected="selected"';?> ><?PHP echo ucwords($cls->ClassName);?></option>
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
							{
								$sec_cnt=0;
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
                          <input type="submit" name="assigned_filter" class="btn btn-primary" value="Filter" />
                          </div>
                          
                          
                          </form>
                          <table class="table table-striped table-advance table-hover">
                           <tbody>
                           <tr>
                                <th>SLNO</th>
                                 <th><i class="icon_profile"></i> Teacher</th>
                                 <th><i class="icon_profile"></i> Class</th>
                                 <th><i class="icon_profile"></i> Section</th>
                                 <th><i class="icon_profile"></i> Subject</th>
                                  <th><i class="icon_cogs"></i> Actions</th>
                              </tr>

                           <tbody>
                           		
                                <?PHP
									
									if($assignedteachers!='0')
									{
										$slno=0;
										if($this->uri->segment(2)) { $slno = ($this->uri->segment(2)-1)*$perpage;	}
										
										foreach( $assignedteachers->result() as $assign)
										{
											$slno++;
											?>
                                            <tr>
                                            		<td><?PHP echo $slno; ?> </td>
                                                    <td><?PHP echo ucwords($assign->TeacherName); ?></td>
                                                    <td><?PHP echo ucwords($assign->ClassName); ?> </td>
                                                    <td><?PHP echo $assign->Section; ?> </td>
                                                    <td><?PHP echo $assign->Subject; ?> </td>
													<td><a href="<?PHP echo base_url('edit-assigned-teacher')."/".$assign->SLNO	?>" class="btn btn-success">Edit</a> </td>
                                            </tr>
                                            <?PHP	
										}
								?>
                                
                                
                            <tr>
                            	<td colspan="7"><?PHP echo @$pagination_string;?>  </td>
                            </tr>
                            <?PHP
									}
									else
									{
										?>
                                 <tr> <td colspan="7">no results found  </td> </tr>
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