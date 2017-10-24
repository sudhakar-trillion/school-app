
<section id="main-content">
  <section class="wrapper">  
 <div class="row">
				<div class="col-lg-12">
                
                <ol class="breadcrumb">
						<li><i class="fa fa-home"></i> <a href="<?PHP echo base_url('dashboard');?> ">Dashboard </a></li>
                        <li><i class="fa fa-plus"></i> <a href="<?PHP echo base_url('view-attendance');?> ">View Today's Attendance </a></li>
						<li><i class="fa fa-laptop"></i>View Student Attandance</li>	
						
                        <?PHP
							if( $Attendance_selected_Month>0 && isset($SelectedMonth) )
							{
								?>
                                <li class="pull-right"><?PHP echo $SelectedMonth;?></li>
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
                    
                    <form  method="post" action="<?PHP echo base_url('view-attendance'); ?>">
                    
                    
                    <div class="col-md-2" style="padding:10px; margin-left:10px" >
                     <select name="Month" class="form-control">
                         
                         <option value="0">Select month</option>
                         <option value="06" <?PHP if( $Attendance_selected_Month=="06") echo 'selected="selected"';?>  >June</option>
                         <option value="07" <?PHP if( $Attendance_selected_Month=="07") echo 'selected="selected"';?>>July</option>
                         <option value="08" <?PHP if( $Attendance_selected_Month=="08") echo 'selected="selected"';?>>August</option>
                         
                         <option value="09" <?PHP if( $Attendance_selected_Month=="09") echo 'selected="selected"';?>>September</option>
                         <option value="10" <?PHP if( $Attendance_selected_Month=="10") echo 'selected="selected"';?>>October</option>
                         <option value="11" <?PHP if( $Attendance_selected_Month=="11") echo 'selected="selected"';?>>November</option>
                         <option value="12" <?PHP if( $Attendance_selected_Month=="12") echo 'selected="selected"';?>>December</option>
                         
                          <option value="01" <?PHP if( $Attendance_selected_Month=="01") echo 'selected="selected"';?>>January</option>
                         <option value="02" <?PHP if( $Attendance_selected_Month=="02") echo 'selected="selected"';?>>February</option>
                         <option value="03" <?PHP if( $Attendance_selected_Month=="03") echo 'selected="selected"';?>>March</option>
                         <option value="04" <?PHP if( $Attendance_selected_Month=="04") echo 'selected="selected"';?>>April</option>
                         
                         <option value="05" <?PHP if( $Attendance_selected_Month=="05") echo 'selected="selected"';?>>May</option>
                         
                         
						 
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
                	<option value="<?PHP echo $cls->SLNO; ?>" <?PHP if(@$Attendance_selected_Class==$cls->SLNO) { echo 'selected="selected"'; }?> >
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
                                    <option value="<?PHP echo $sec->SectionId?>" <?PHP if($sec->SectionId==@$Attendance_selected_Section) echo 'selected="selected"'; ?> ><?PHP echo $sec->Section?></option>
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
                                    <option value="<?PHP echo $std->StudentId ?>" <?PHP if( @$Attendance_selected_Rollno== $std->StudentId ) echo 'selected="selected"';?> ><?PHP echo $std->Student." ".$std->LastName; ?></option>
                                    <?PHP	
								}
							}
                        ?>
                          
                          
                        </select>
                    </div>
                    
                    
                     
                    
                    
                     <div class="col-md-2" style="padding:10px; margin-left:10px" > 
                          <input type="submit" name="studentattendance_filter" class="btn btn-primary" value="Filter" />
                          </div>
                    
                    </form>
                    
                    <table class="table table-striped table-advance table-hover">
                           <thead>
                           <tr>
                                <th>SLNO</th>
                                 
                                 <th><i class="icon_profile"></i>Month</th>
                                 <th><i class="icon_profile"></i>Class</th>
                                 <th><i class="icon_profile"></i>Section</th>
                                 <th><i class="icon_profile"></i>Student</th>
                                 <th><i class="icon_profile"></i> Date</th>
                                 <th><i class="icon_cogs"></i> Present/Absent</th>
                              </tr>

                           </thead>
                           
                           <tbody>
                       			<?PHP
									$slno=0;
									if($this->uri->segment(2)) { $slno = ($this->uri->segment(2)-1)*$perpage;	}
		
									foreach( $attendancelist->result() as $data)
									{
										$slno++;
										?>
                                        <tr class="<?PHP if($data->PresentAbsent=="Absent") echo 'text-danger'; else echo 'text-default';?>" >
                                        	<td><?PHP echo $slno; ?></td>
                                            <td><?PHP echo $data->Month; ?></td>
                                            
                                            <td><?PHP echo $data->ClassName; ?></td>
                                            <td><?PHP echo $data->SectionName; ?></td>
                                           
                                            <td><?PHP echo $data->StudentName; ?></td>
                                             <td><?PHP echo $data->DatedOn; ?></td>
                                              <td><?PHP echo $data->PresentAbsent; ?></td>
                                             
                                             
                                        </tr>
                                        <?PHP	
									}
								?>
                                  <tr>
                                  	<td colspan="5"><ul><?PHP echo $pagination_string; ?></ul></td>
                                   <td colspan="2"></td>
                                  </tr>
                        
                           </tbody>
                        </table>
                    
                    </div>
              </section>
          </div>
        </div>
              
</section>
</section>
      
      
      
      