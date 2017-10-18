
<section id="main-content">
  <section class="wrapper">  
 <div class="row">
				<div class="col-lg-12">
                
                <ol class="breadcrumb">
					<li><i class="fa fa-home"></i> <a href="<?PHP echo base_url('parent-dashboard');?> ">Dashboard</a></li>
						<li><i ></i>View homeworks</li>
					</ol>
                
                </div>
			</div>

	<div class="row">
  
                  <div class="col-lg-12">
                 	
                    
                    
                    
                      <section class="panel">
                         
                          <header class="panel-heading">
                              View homeworks
                          </header>
                        
                        
                          <table class="table table-striped table-advance table-hover">
                           <tbody>
                           <tr>
                                <th>SLNO</th>
                                 <th><i class="icon_profile"></i> Class</th>
                                 <th><i class="icon_profile"></i> Section</th>
                                  <th><i class="icon_profile"></i> Subject </th>
                                   <th><i class="icon_profile"></i> Homework </th>
                                    <th><i class="icon_profile"></i> Status </th>
                                  <th><i class="icon_cogs"></i> Actions</th>
                              </tr>

                           <tbody>
                           <?PHP
						   	if( $homeworks!='')
							{
								
								$slno=0;
										
								if($this->uri->segment(2)) { $slno = ($this->uri->segment(2)-1)*$perpage;	}
								foreach($homeworks->result() as $data)
										{
											$slno++;
											?>
                                            <tr class="Homework_<?PHP  echo $data->HomeworkId; ?>">
                                            	<td class="SLNO"><?PHP echo $slno;?></td>
                                                <td><?PHP echo $data->ClassName?></td>
                                                <td><?PHP echo $data->Section?></td>
                                                <td><?PHP echo $data->Subject?></td>
                                                <td><?PHP echo $data->HomeWork;?></td>
                                                <td>
														<?PHP 
																if($data->Status=="Assigned")
																{ 
																?>
                                                                	<span class="text-success"><?PHP echo $data->Status;?></span>
																<?PHP			
																}
																else
																{
																	?>
                                                                    <span class="text-danger"><?PHP echo $data->Status;?></span>
                                                                    <?PHP
																}
																	
														?>
                                                  </td>
                                                <td><a class="btn btn-primary homework_comments" id="<?PHP echo $data->HomeworkId ?>" <?PHP if($data->Status=="Assigned") { ?>data-toggle="modal" data-target="#homework_comment_Popup" <?PHP } ?> >Comments</a></td>
                                            
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
								
							}
						   
						   ?>
                           		
                             
                            
						   </tbody>
                        </table>
                          
                          
                      </section>
                  </div>
              </div>          



<!-- -->

<div id="homework_comment_Popup" class="modal fade" role="dialog">
  <div class="modal-dialog">
<form id="Homework-form">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Write Your Comments</h4>
      </div>
      <div class="modal-body">
       
       <div class="col-md-12">
       
       <input type="hidden" id="HomeworkId" />
       
        <label>Home Work Comments</label>
      <textarea class="form-control" id="homeworkcomments"></textarea>
          <span class="homeworkcomments-err text-danger"></span>   
            </div>
            
            <div class="col-md-12" style="margin-top:10px">
        		<label>Chage Status</label>
      			<select name="status" id="homework-status" class="form-control">
                <option value="0">Change Home Work Status</option>
                <option value="Completed">Completed</option>
                </select>
             <span class="homework-status-err text-danger"></span>   
            </div>
       
       
      </div>
      <div class="modal-footer">
      <span class="homework_submisstion_resp"></span>
        <button type="button" class="btn btn-success submit_homework">Submit</button>
      </div>
    </div>
</form>
  </div>
</div>
<!-- -->


              
</section>

</section>
      
      