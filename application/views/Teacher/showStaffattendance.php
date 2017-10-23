
<section id="main-content">
  <section class="wrapper">  
 <div class="row">
				<div class="col-lg-12">
                
                <ol class="breadcrumb">
						<li><i class="fa fa-home"></i> <a href="<?PHP echo base_url('dashboard');?> ">Dashboard </a></li>
                        <li><i class="fa fa-plus"></i> <a href="<?PHP echo base_url('teacher-attandance');?> ">Add Attendance </a></li>
						<li><i class="fa fa-laptop"></i>View Teacher Attandance</li>						  	
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
                                    <option value="0" <?PHP if( @$TeacherName =='0' ) echo 'selected="selected"';?> >Select Teacher</option>
                                    <?PHP	
								}
								?>
                                <option value="<?PHP echo $teacher->TeacherId?>"  <?PHP if( @$TeacherName == $teacher->TeacherId ) echo 'selected="selected"';?> ><?PHP echo ucwords($teacher->TeacherName);?></option>
                                <?PHP
								$tec_cnt++;
								
							}
						 ?>
                         
                         </select>
                    </div>
                    
                    
                     <div class="col-md-2" style="padding:10px; margin-left:10px" >
                     <select name="Month" class="form-control">
                         
                         <option value="0">Select month</option>

                        
                         <option value="06">June</option>
                         <option value="07">July</option>
                         <option value="08">August</option>
                         
                         <option value="09">September</option>
                         <option value="10">October</option>
                         <option value="11">November</option>
                         <option value="12">December</option>
                         
                          <option value="01">January</option>
                         <option value="02">February</option>
                         <option value="03">March</option>
                         <option value="04">April</option>
                         
                         <option value="05">May</option>
                         
                         
						 
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
                                        <tr>
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
      
      
      
      