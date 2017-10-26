
<section id="main-content">
  <section class="wrapper">  
 <div class="row">
				<div class="col-lg-12">
                
                <ol class="breadcrumb">
						<li><i class="fa fa-home"></i> <a href="<?PHP echo base_url('dashboard');?> ">Dashboard </a></li>
                        <li><i class="fa fa-plus"></i> <a href="<?PHP echo base_url('view-attendance');?> ">View Today's Attendance </a></li>
						<li><i class="fa fa-laptop"></i>View Student Attandance</li>	
						
                      
                    	<?PHP
							if( @$performance_selected_Rollno>0 && isset($Selectedstudent) )
							{
								?>
                                <li class="pull-right"><input type="checkbox" class="filterdata" performanceattendance="performance" value="performance_selected_Rollno" checked="checked" /><?PHP echo $Selectedstudent;?></li>
                                <?PHP
							}
							
						?>
                        
                       <?PHP
							if( @$performance_selected_Section>0 && isset($SelectedSection) )
							{
								?>
                                <li class="pull-right"><input type="checkbox" class="filterdata" performanceattendance="performance" value="performance_selected_Section" checked="checked" /><?PHP echo 'Section-'.$SelectedSection;?></li>
                                <?PHP
							}
							
						?>
                          <?PHP
							if( @$performance_selected_Class>0 && isset($SelectedClass) )
							{
								?>
                                <li class="pull-right"><input type="checkbox" performanceattendance="performance" class="filterdata" value="performance_selected_Class" checked="checked" /><?PHP echo $SelectedClass;?></li>
                                <?PHP
							}
							
						?>
                       
                        
                        <?PHP
							if( @$performance_selected_Xam>0 && isset($SelectedXam) )
							{
								?>
                                <li class="pull-right"><input type="checkbox" class="filterdata" performanceattendance="performance" value="performance_selected_Xam" checked="checked" /><?PHP echo $SelectedXam;?></li>
                                <?PHP
							}
							
						?>
                        
                        
                        
                        
                        
                        <?PHP
						if( isset($Totalworkingdays))
						{
							?>
                            <li class="pull-right">Total Presents:<span class="present-label" id="TotalPresents"></span></li>					  	
                            <li class="pull-right">Total Absents:<span class="absent-label" id="TotalAbsents"></span></li>
                            
                            <li class="pull-right">Total Working Days:<span class="absent-label" id="TotalAbsents"><?PHP echo $Totalworkingdays; ?></span></li>
                         <?PHP
						 }
						 ?>					  	
					</ol>
                
                </div>
			</div>
            
            
        
        <div class="row">
        
            <div class="col-lg-12">
            
                <section class="panel">
                
                    <header class="panel-heading"> View Student Attandance  </header>
                  
                  <div class="panel-body">
                    
                    <form  method="post" action="<?PHP echo base_url('students-performance'); ?>">
                    
                    
                    <div class="col-md-2" style="padding:10px; margin-left:10px" >
                     <select name="Exam" id="Exam" class="form-control">
                         
                        <option value="0">Select exam</option>
                        <?PHP
							foreach( $Exams->result() as $xam)
							{
								?>
                                <option value="<?PHP echo $xam->ExamId; ?>" <?PHP if( @$performance_selected_Xam==$xam->ExamId) echo 'selected="selected"';?>  ><?PHP echo $xam->Exam; ?></option>
                                <?PHP	
							}
						?>
                         </select>
                    </div>
                    
                     <div class="col-md-2" style="padding:10px; margin-left:10px" >
                     
                     <select class="form-control ClassName" name="ClassName" id="ClassName">
                                            	<option value="0">Select Class </option>
				
				<?PHP 
				if($classes!='0')
				{	
					foreach($classes->result() as $cls)
					{ 
				?> 
                	<option value="<?PHP echo $cls->SLNO; ?>" <?PHP if(@$performance_selected_Class==$cls->SLNO) { echo 'selected="selected"'; }?> >
						<?PHP echo $cls->ClassName;?>
                   </option>
				   <?PHP	
				   } 
				}
				  ?>
                                                
                                            </select>
                     
                    </div>
                     
                     
                      <div class="col-md-2" style="padding:10px; margin-left:10px" >
                     
                     <select class="form-control" name="sections" id="sections">
                          <option value='0'>Select Section</option>
                          <?PHP
						  if(isset($relatedsections))
						  {
								foreach( $relatedsections->result() as $sec)
								{
									?>
                                    <option value="<?PHP echo $sec->SectionId?>" <?PHP if($sec->SectionId==@$performance_selected_Section) echo 'selected="selected"'; ?> ><?PHP echo $sec->Section?></option>
                                    <?PHP
								}
						  }
						  
						  ?>
                     </select>
                     
                    </div>
                    
                    
                    
                     <div class="col-md-2" style="padding:10px; margin-left:10px" >
                     
                     <select class="form-control" name="Rollno" id="Rollno">
                    <option value='0'>Select Student</option>
                    	<?PHP
                        	
							if( isset($relatedstudents) )
							{
								foreach($relatedstudents->result() as $std)
								{
									?>
                                    <option value="<?PHP echo $std->StudentId ?>" <?PHP if( @$performance_selected_Rollno== $std->StudentId ) echo 'selected="selected"';?> ><?PHP echo $std->Student." ".$std->LastName; ?></option>
                                    <?PHP	
								}
							}
                        ?>
                          
                          
                        </select>
                    </div>
                    
                    
                     
                    
                    
                     <div class="col-md-2" style="padding:10px; margin-left:10px" > 
                          <input type="submit" name="studentperformance_filter" class="btn btn-primary" value="Filter" />
                          
                          <input type="button" name="studentperformance_excel" id="studentperformance_excel" class="btn btn-success" value="Import" />
                          </div>
                    
                    </form>
                    
                    
                    
                    <table class="table table-striped table-advance table-hover">
                           <thead>
                           <tr>
                                <th>SLNO</th>
                                 <th><i class="icon_profile"></i>Exam</th>
                                 <th><i class="icon_profile"></i>Class</th>
                                 <th><i class="icon_profile"></i>Section</th>
                                 <th><i class="icon_profile"></i>Student</th>
                                 <th><i class="icon_profile"></i>Subject</th>
                                 <th><i class="icon_profile"></i>Present</th>
                                 <th><i class="icon_profile"></i>Total Marks</th>
                                 <th><i class="icon_cogs"></i> Secured Marks </th>
                              </tr>

                           </thead>
                           
                           <tbody>
                       			<?PHP

								if( $performancelist=='0')
								{
									?>
                                   <tr>
                                   	 	<td colspan=7> <h2>No Data Available</h2> </td>
                                    </tr>
                                    <?PHP
								}
								else
								{
									$slno=0;
									if($this->uri->segment(2)) { $slno = ($this->uri->segment(2)-1)*$perpage;	}
									
									foreach( $performancelist->result() as $perfor)
									{
										$slno++;
										?>
                                        <tr>
                                        	<td><?PHP echo $slno;?></td>
                                            <td><?PHP echo $perfor->Exam; ?></td>
                                            
                                            <td><?PHP echo $perfor->ClassName; ?></td>
                                            <td><?PHP echo $perfor->Section; ?></td>
                                            
                                            <td><?PHP echo $perfor->Student; ?></td>
                                            <td><?PHP echo $perfor->SubjectName; ?></td>
                                           
                                            <td><?PHP if( $perfor->PresentAbsnt=="Absent") echo "Absent"; else "Present"; ?></td>
                                            <td><?PHP if( $perfor->PresentAbsnt=="Absent") echo "--";  else echo $perfor->TotalMarks; ?></td> 
                                             <td><?PHP if( $perfor->PresentAbsnt=="Absent") echo "--";  else echo $perfor->SecuredMarks; ?></td> 
                                        </tr>
                                        <?PHP
										
									}

									?>
                                  <tr>
                                  	<td colspan="6"><ul><?PHP echo $pagination_string; ?></ul></td>
                                   <td colspan="3"></td>
                                  </tr>
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
      
      
      
      