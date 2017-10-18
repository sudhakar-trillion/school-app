
<section id="main-content">
  <section class="wrapper">  
 <div class="row">
				<div class="col-lg-12">
                
                <ol class="breadcrumb">
					<li><i class="fa fa-home"></i> <a href="<?PHP echo base_url('add-section');?> ">Add section</a></li>
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
                         <?PHP
						 if($this->input->post('searchbyclass')) $ClassName = $this->input->post('ClassName');
						 else
						 {
							if( $this->session->userdata('searchbyclass')!='' )  $ClassName = 	$this->session->userdata('searchbyclass');
							else $ClassName = '0';
						 }
						 
						 	
							
						 ?>
                          <form name="searchbyclass_form" id="searchbyclass_form" method="post" action="">
                          	<div class="col-md-3" style="padding:10px; margin-left:10px" >
                          <!--  <input type="text" class="form-control" placeholder="Class Name" id="classname" />-->
                          <select name="ClassName" class="form-control">
                          	<option value="0" <?PHP  if($ClassName==0){ echo ' selected="selected"'; } ?>> Select Class </option>
                            <?PHP
								foreach($classes->result() as $cls)
								{
									?>
                                    <option value="<?PHP echo $cls->SLNO?>" <?PHP  if($ClassName==$cls->SLNO){ echo ' selected="selected"'; } ?> > <?PHP echo $cls->ClassName?> </option>
                                    <?PHP
								}
							?>
                          </select>	
                            </div>
                            
                           <div class="col-md-3" style="padding:10px; margin-left:10px" >
                           	<input type="submit" name="searchbyclass" class="btn  btn-success" value="Filter" />
                            
                            </div>
                          </form>
                          <table class="table table-striped table-advance table-hover">
                           <tbody>
                           <tr>
                                <th>SLNO</th>
                                 <th><i class="icon_profile"></i> Class</th>
                                 <th><i class="icon_profile"></i> Section</th>
                                  <th><i class="icon_cogs"></i> Actions</th>
                              </tr>

                           <tbody>
                           		
                                <?PHP
									if( @$sections!='0')
									{
										$slno=0;
										if($this->uri->segment(2)) { $slno = ($this->uri->segment(2)-1)*5;	}
										
										foreach($sections->result() as $section)
										{
											$slno++;
											?>
                                            <tr>
                                            	<td><?PHP echo $slno;?> </td>
                                                <td><?PHP echo $section->ClassName?></td>
                                                <td><?PHP echo $section->Section?> </td>
                                                <td><a class="btn btn-primary" href="<?PHP echo base_url('edit-section')."/".$section->SectionId?>">Edit</a></td>
                                            </tr>
                                            <?PHP
											
										}
										echo "<tr><td colspan='5'>".$pagination_string."</td></tr>";
										
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