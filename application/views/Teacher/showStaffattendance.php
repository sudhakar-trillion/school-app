
<section id="main-content">
  <section class="wrapper">  
 <div class="row">
				<div class="col-lg-12">
                
                <ol class="breadcrumb">
						<li><i class="fa fa-home"></i> <a href="<?PHP echo base_url('dashboard');?> ">Dashboard </a></li>
                        <li><i class="fa fa-plus"></i> <a href="<?PHP echo base_url('teacher-attandance');?> ">Add Attendance </a></li>
						<li><i class="fa fa-laptop"></i>View Teacher Attandance</li>	
                        
                        <li class="pull-right">Total Presents:<span class="present-label" id="TotalPresents"></span></li>					  	
                        <li class="pull-right">Total Absents:<span class="absent-label" id="TotalAbsents"></span></li>
                        
                        <?PHP
						if( isset($Totalworkingdays))
						{
							?>
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
                
                    <header class="panel-heading"> Manage Attandance  </header>
                  
                  <div class="panel-body">
                    
                    <form  method="post" action="">
                    
                     <div class="col-md-2" style="padding:10px; margin-left:10px" >
                     <select name="TeacherName" class="form-control">
                         <?PHP
						 $tec_cnt=0;
						 	foreach($Totalteachers->result() as $teacher)
							{
								if($tec_cnt==0)
								{
									?>
                                    <option value="0" <?PHP if( @$selectedteacher =='0' ) echo 'selected="selected"';?> >Select Teacher</option>
                                    <?PHP	
								}
								?>
                                <option value="<?PHP echo $teacher->TeacherId?>"  <?PHP if( @$selectedteacher == $teacher->TeacherId ) echo 'selected="selected"';?> ><?PHP echo ucwords($teacher->TeacherName);?></option>
                                <?PHP
								$tec_cnt++;
								
							}
						 ?>
                         
                         </select>
                    </div>
                    
                    
                     <div class="col-md-2" style="padding:10px; margin-left:10px" >
                     <select name="Month" class="form-control">
                         
                         <option value="0">Select month</option>

                        
                         <option value="06" <?PHP if( $month=="06") echo 'selected="selected"';?>  >June</option>
                         <option value="07" <?PHP if( $month=="07") echo 'selected="selected"';?>>July</option>
                         <option value="08" <?PHP if( $month=="08") echo 'selected="selected"';?>>August</option>
                         
                         <option value="09" <?PHP if( $month=="09") echo 'selected="selected"';?>>September</option>
                         <option value="10" <?PHP if( $month=="10") echo 'selected="selected"';?>>October</option>
                         <option value="11" <?PHP if( $month=="11") echo 'selected="selected"';?>>November</option>
                         <option value="12" <?PHP if( $month=="12") echo 'selected="selected"';?>>December</option>
                         
                          <option value="01" <?PHP if( $month=="01") echo 'selected="selected"';?>>January</option>
                         <option value="02" <?PHP if( $month=="02") echo 'selected="selected"';?>>February</option>
                         <option value="03" <?PHP if( $month=="03") echo 'selected="selected"';?>>March</option>
                         <option value="04" <?PHP if( $month=="04") echo 'selected="selected"';?>>April</option>
                         
                         <option value="05" <?PHP if( $month=="05") echo 'selected="selected"';?>>May</option>
                         
                         
						 
                         </select>
                    </div>
                    
                    
                     <div class="col-md-2" style="padding:10px; margin-left:10px" > 
                          <input type="submit" name="attendance_filter" class="btn btn-primary" value="Filter" />
                          </div>
                    
                    </form>
                    
                    <table class="table table-striped table-advance table-hover">
                           <thead>
                           <tr>
                                <th>SLNO</th>
                                 <th><i class="icon_profile"></i> Teacher</th>
                                 <th><i class="icon_profile"></i>Month</th>
                                 <th><i class="icon_profile"></i> Date</th>
                                 <th><i class="icon_cogs"></i> Present/Absent</th>
                              </tr>

                           </thead>
                           
                           <tbody>
                       			
                                <?PHP
								$cnt=0;
									foreach($showattendance->result() as $data)
									{
										$cnt++;
										?>
                                        <tr class="<?PHP if($data->Attendance =="Absent") echo 'text-danger'; else echo "text-default"; ?>">
                                        	<td><?PHP echo $cnt?></td>
                                            <td><?PHP echo $data->TeacherName ?></td>
                                            <td><?PHP echo $data->Month ?></td>
                                            <td><?PHP echo $data->AttendanceFor ?></td>
                                            <td><?PHP echo $data->Attendance ?></td>
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
      
      
      
      