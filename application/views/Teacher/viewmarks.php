
<section id="main-content">
  <section class="wrapper">  
 <div class="row">
				<div class="col-lg-12">
                
                <ol class="breadcrumb">
<!--						<li><i class="fa fa-home"></i> <a href="<?PHP echo base_url('dashboard');?> ">Dashboard </a></li> -->
						<li><i class="fa fa-laptop"></i>View Marks</li>	
                        
                       
                        <?PHP
                        	if( isset($ExamName))
							{
						?>
                        <li class="pull-right "> <?PHP echo $ExamName; ?> <i class="fa fa-times clearfilter" id="Exam_<?PHP echo $SelectedExam; ?>" style="color:#F00; cursor:pointer"></i> </li>
                        <?PHP
							}
							?>
                        
                        <?PHP
                        	if( isset($SubjectName))
							{
						?>
                        <li class="pull-right "> <?PHP echo $SubjectName; ?> <i class="fa fa-times clearfilter" id="Subject_<?PHP echo $SelectedSubject; ?>" style="color:#F00; cursor:pointer"></i> </li>
                        <?PHP
							}
							?>
                        
						<?PHP
                        	if( isset($SectionName))
							{
						?>
                        <li class="pull-right "> <?PHP echo 'Section-'.$SectionName; ?> <i class="fa fa-times clearfilter" id="Section_<?PHP echo $SelectedSection; ?>" style="color:#F00; cursor:pointer"></i> </li>
                        <?PHP
							}
							?>
                        
                        <?PHP
                        	if( isset($ClassName))
							{
						?>
                        <li class="pull-right "> <?PHP echo $ClassName; ?> <i class="fa fa-times clearfilter" id="Class_<?PHP echo $SelectedClass; ?>" style="color:#F00; cursor:pointer"></i> </li>
                        <?PHP
							}
							?>
                            
                            
				</ol>
                
                
                
                
                </div>
			</div>
            
            <div class="row" style="padding-bottom:10px">
           	
           <form method="post" action="<?PHP echo base_url('view-marks'); ?>">
               <div class="col-md-2" style=" margin-left:10px" >
                    
                    <select name="ClassName" id="ClassName" class="form-control allocate-marks-class"> 
                    <option>Select Class</option>
                    <?PHP
					
					foreach( $classes->result() as $cls)
					{
						?>
                        <option value="<?PHP echo $cls->SLNO; ?>" <?PHP if( $SelectedClass== $cls->SLNO ){ echo 'selected="selected"';  } ?> ><?PHP echo $cls->ClassName; ?></option>
                        <?PHP	
					}
					
					?>
                    </select>
               </div>
               
               <div class="col-md-2" style=" margin-left:10px" >
                    
                    <select name="Section" id="sections" class="form-control"> 
                    <option>Select Section</option>
                    <?PHP
						if( $ClasswiseSections!='0' )
						{
							foreach( $ClasswiseSections->result() as $sec)
							{
								?>
                                <option value="<?PHP echo $sec->SectionId; ?>" <?PHP if( $sec->SectionId== $SelectedSection){ echo 'selected="selected"'; } ?> > <?PHP echo $sec->Section; ?> </option>
                                <?PHP	
							}
						}
					?>
                    </select>
               </div>
               
               
               <div class="col-md-2" style=" margin-left:10px" >
                    
                    <select name="Subject" id="Subject" class="form-control"> 
                    <option>Select Subject</option>
                    <?PHP
						
						if( $classwisesubjects!='0')
						{
							foreach( $classwisesubjects->result() as $sub)
							{
								?>
                                <option value="<?PHP echo $sub->SubjectId; ?>" <?PHP if( $SelectedSubject==$sub->SubjectId ) { echo 'selected="selected"'; }?>  > <?PHP echo $sub->SubjectName;?> </option>
                                <?PHP	
							}
						}
						
					?>	
                    </select>
               </div>
               
                <div class="col-md-2" style=" margin-left:10px" >
                    
                    <select name="Exam" class="form-control"> 
                    <option>Select Exam</option>
                    <?PHP
					foreach( $exams->result() as $exam)
					{
						?>
                        <option value="<?PHP echo $exam->ExamId; ?>" <?PHP if( $exam->ExamId==$SelectedExam ){ echo 'selected="selected"'; }?> > <?PHP echo $exam->Exam; ?> </option>
                        <?PHP	
					}
					
					?>
                    </select>
               </div>
               
               <div class="col-md-2" style=" margin-left:10px" >
                    <input type="submit" name="viewmarksfilter" class="btn btn-primary" value="Submit" />
               </div>
           
           </form> 
            
            </div>
            
        
        <div class="row">
        
            <div class="col-lg-12">
            
                <section class="panel">
                
                    <header class="panel-heading"> Manage Allocated Marks  </header>
                    
                    <div class="panel-body">
                    
                    <table class="table table-striped table-advance table-hover">
                           <thead>
                           <tr>
                                <th>SLNO</th>
                                 <th><i class="icon_profile"></i> Student</th>
                                 <th><i class="icon_profile"></i> Class</th>
                                 <th><i class="icon_profile"></i> Section</th>
                                 <th><i class="icon_profile"></i> Subject</th>
                                 <th><i class="icon_profile"></i> Exam</th>
                                 <th><i class="icon_profile"></i> Total</th>
                                 <th><i class="icon_profile"></i> Secured</th>
                                  <th><i class="icon_cogs"></i> Actions</th>
                              </tr>

                           </thead>
                           
                           <tbody>
                            <input type="hidden" id="uriseg" value="<?PHP echo $this->uri->segment(2);?>" />
                       		<?PHP
							
							if( $markslist!='0')
									{
										$slno=0;
										
										if($this->uri->segment(2)) { $slno = ($this->uri->segment(2)-1)*$perpage;  }
										
										foreach($markslist->result() as $data)
										{
												$slno++;
											?>
                                            <tr class="Marklisting_<?PHP echo $data->AllocatedId; ?> listing">
                                            	<td class="SLNO"><?PHP echo $slno; ?> </td>
                                                <td><?PHP echo $data->StudentName; ?></td>
                                                
                                                <td><?PHP echo $data->ClassName;?></td>
                                                <td><?PHP echo $data->SectionName;?></td>
                                                
                                                <td><?PHP echo $data->SubjectName;?></td>
                                                <td><?PHP echo $data->Exam;?></td>
                                                
                                                <td><?PHP echo $data->TotalMarks;?></td>
                                                <td><?PHP echo $data->SecuredMarks;?></td>
                                                <td>
                                               
                                                	<a href="<?PHP echo base_url('edit-allocated-marks/'.$data->AllocatedId)?>" class="btn btn-warning">Edit</a>
                                                 <a style="cursor:pointer" id="<?PHP echo $data->AllocatedId; ?>" class="btn btn-danger deleteMark">Delete</a>
                                                </td>
                                            </tr>
                                            <?PHP
										}
										echo "<tr><td colspan=4>".$pagination_string."</td><td colspan=5></td></tr>";
									}
									else
									{
										?>
                                    		<tr><td colspan="8"> </td></tr>	
                                        <?PHP
									}	
							?>
                                  
                        
                           </tbody>
                        </table>
                    
                    </div>
              </section>
          </div>
        </div>
              
</section>
</section>
      
      
      
      