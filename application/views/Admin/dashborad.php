<section id="main-content">
  <section class="wrapper">  
 <div class="row">
				<div class="col-lg-12">
                
                <ol class="breadcrumb">
								<li><i class="fa fa-home"></i> <a href="<?PHP echo base_url('dashboard');?> ">Dashboard </a></li>
					
				</ol>
                
                </div>
			</div>

	<div class="row">
  
                  <div class="col-lg-12">
                 
                      <section class="panel">
                          
                          
                          <div class="panel-body">
                          
                          
                          
                          
                          <div class="col-lg-3 col-md-6">
           <div class="card dashb">
                <div class="panel panel-default innerpan">
                    <div class="panel-body nobo">
                        <div class="row">
                            <div class="col-xs-6 ic">
                                <i class="fa fa-bell fa-4x"></i>
                            </div>
                            <div class="col-xs-6 text-center">
                                <p class="dashboard-heading"><?PHP echo $TotalNotifications; ?></p>
                            </div>
                            <div class="col-xs-12">
                                <p class="dashboard-text"><a <?PHP if( $TotalNotifications>0){?> href="<?PHP echo base_url('view-parent-notifications')?>" <?PHP } ?> style="color:#434348; cursor:default"> Unread Messages</a></p>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
           
        </div>
        
        
        
        <div class="col-lg-3 col-md-6">
           <div class="card dashb">
                <div class="panel panel-default innerpan">
                    <div class="panel-body nobo">
                        <div class="row">
                            <div class="col-xs-6 ic1">
                                <i class="fa fa-users fa-4x"></i>
                            </div>
                            <div class="col-xs-6 text-center">
                                <p class="dashboard-heading1"><?PHP echo $Totalstaff;?></p>
                            </div>
                            <div class="col-xs-12">
                                <p class="dashboard-text ">Total Staff</p>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
           
        </div>
        
        
        
        
        <div class="col-lg-3 col-md-6">
           <div class="card dashb">
                <div class="panel panel-default innerpan">
                    <div class="panel-body nobo">
                        
                        <div class="row">
                            <div class="col-xs-6 ic2">
                                <i class="fa fa-rupee fa-5x"></i>
                            </div>
                            <div class="col-xs-6 text-left">
                                <p class="dashboard-heading2" style="text-align:left; font-size:52px; margin-top:-3px; margin-left:-60px"><?PHP echo $FeeCollected; ?></p>
                            </div>
                            <div class="clearfix"></div>
                            </div>
                            
                            <div class="col-xs-12" style="margin-top:-10px" >
                                <p class="dashboard-text" style="margin-left:-10px; margin-top:-10px" ><a href="<?PHP echo base_url('view-students-fee-details')?>" style="color:#434348"><?PHP echo date('F')?> Collected Fees</a></p>
                            </div>
                            
                        <div class="clearfix"></div>    
                    </div>
                </div>
                </div>
           
        </div>
        
        
        
        
        <div class="col-lg-3 col-md-6">
           <div class="card dashb">
                <div class="panel panel-default innerpan">
                    <div class="panel-body nobo">
                        <div class="row">
                            <div class="col-xs-6 ic3">
                                <i class="fa fa-graduation-cap fa-5x"></i>
                            </div>
                            <div class="col-xs-6 text-center">
                                <p class="dashboard-heading3"><?PHP echo $Totalstudents;?></p>
                            </div>
                            <div class="col-xs-12">
                                <p class="dashboard-text"><a href="<?PHP echo base_url('view-students') ?>" style="color:#434348">Total students</a></p>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
           
        </div>
        
        
          
          <div class="col-lg-6 col-md-6">
          
           <div class="card dashb att">
           <div class="col-lg-3 col-md-6"> 
           <h2 style="border-bottom:0px; margin-bottom:0px; margin-top:7px; padding-bottom:0px;">Fee to collect</h2>
           </div>
           
           <div class="col-lg-9 col-md-6 text-right">
           
          

  <div class="form-group cla" style="margin-bottom:5px; margin-right:0px;">

<select class="form-control  fe" name="ClassName" id="ClassName" style="margin-top:0px; width:160px;" >
    								<option value="0">Select Class</option>                               
									<?PHP
									if($classes!='0')
									{
										foreach( $classes->result() as $cls)
										{
										?>
										<option value="<?PHP echo $cls->SLNO; ?>" <?PHP if( $ClassName == $cls->SLNO  ) echo 'selected=seelcted'; ?> > <?PHP echo $cls->ClassName; ?> </option>
										<?PHP	
										}
									}
                                    
                                    ?>
                                    
                                    
                                    </select>

  
  
</div>

<div class="form-group cla" style="margin-bottom:0px; margin-right:0px;">

<select class="form-control fe" name="sections" id="sections" style="margin-top:0px; width:160px;" >
                                    <option value="0">Select Section</option>
                                   <?PHP
								   	if( isset($SelectedClassSections))
									{
										foreach($SelectedClassSections->result() as $sects)
										{
											?>
                                            <option value="<?PHP echo $sects->SectionId?>" <?PHP if( $SectionIDE == $sects->SectionId) echo 'selected=selected';  ?> > <?PHP echo $sects->Section?> </option>
                                            <?PHP	
										}
									}
								   ?>
                                    </select>

  
  
</div>


           
           </div>
           <div class="clearfix"></div>
           
           
       <div class="chartone">
       
       <div id="chartone3" style="height:300px;"></div>
       
       </div>
           
           </div>
          
          
          
          </div>
          
          
          <!-- fees has to collect -->
          
          <div class="col-lg-6 col-md-6">
          
           <div class="card dashb att">
           <div class="col-lg-3 col-md-6"> 
           <h2 style="border-bottom:0px; margin-bottom:0px; margin-top:7px; padding-bottom:0px;">Fee collected</h2>
           </div>
           
           <div class="col-lg-9 col-md-6 text-right">
           
        


  <div class="form-group cla" style="margin-bottom:5px; margin-right:0px;">

<select class="form-control  fe " name="ClassName" id="ClassNaam" style="margin-top:0px; width:160px;" >
    								<option value="0">Select Class</option>                               
									<?PHP
									if($classes!='0')
									{
										foreach( $classes->result() as $cls)
										{
										?>
										<option value="<?PHP echo $cls->SLNO; ?>" <?PHP if( $ClassName == $cls->SLNO  ) echo 'selected=seelcted'; ?> > <?PHP echo $cls->ClassName; ?> </option>
										<?PHP	
										}
									}
                                    ?>
                                    
                                    
                                    </select>

  
  
</div>

<div class="form-group cla" style="margin-bottom:0px; margin-right:0px;">

<select class="form-control fe" name="sections" id="sects" style="margin-top:0px; width:160px;" >
                                    <option value="0">Select Section</option>
                                   <?PHP
								   	if( isset($SelectedClassSections))
									{
										foreach($SelectedClassSections->result() as $sects)
										{
											?>
                                            <option value="<?PHP echo $sects->SectionId?>" <?PHP if( $SectionIDE == $sects->SectionId) echo 'selected=selected';  ?> > <?PHP echo $sects->Section?> </option>
                                            <?PHP	
										}
									}
								   ?>
                                    </select>

  
  
</div>


           
           </div>
           <div class="clearfix"></div>
   
           
       <div class="chartone">
       
       <div id="chartone4" style="height:300px;"></div>
       
       </div>
           
           </div>
          
          
          
          </div>
          
          <!-- fees has to collect ends here/-->
    
        <div class="col-lg-6 col-md-6">
          
           <div class="card dashb att">
           		
                <div class="headertop cls-attendance">
                    <h2>Staff Attendance</h2>
                       <!-- sections -->
                        <span> 
                        	<span class="present-label">Today's Present:</span><span class="Present-today" id="TotalPresents"></span>
                        </span>
                        
                        
                        <span style="margin-left:50px"> 
                        	<span class="absent-label">Today's Absent:</span><span class="Present-today" id="TotalAbsents" ></span>
                          </span>
                        
                        
                        <span class="pull-right"> 
                        	 <a href="<?PHP echo base_url('view-staff-attendance')?>">View Attendance</a>
                        </span>
                        
                        <ul class="header-dropdown m-r--5">
                            <li class="dropdown"> <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="selTeacher">Select Teacher</span>&nbsp;<i class="fa fa-caret-down"></i></a>
                                
                                <ul class="dropdown-menu pull-right section-for-teacher">
                                	<li><a class=" cursor-pointer attendance-teacher waves-effect waves-block" id="0">Select Teacher</a></li> 
                                    <?PHP
									if( $TeachingStaff =="0")
									{
										
									}
									elseif( $TeachingStaff!='0' || $TeachingStaff!=' ')
									{
										foreach( @$TeachingStaff->result() as $teach)
										{
											?>
                                            <li><a class=" cursor-pointer attendance-teacher waves-effect waves-block" id="<?PHP echo $teach->TeacherId; ?>"><?PHP echo $teach->TeacherName; ?></a></li> 
                                            <?PHP
										}
									}
									?>
                                </ul>
                                
                            </li>
                        </ul>

           			</div>
           
           
           
           
           
       <div class="chartone">
       
       <div id="chartone" style="height:300px;"></div>
       
       </div>
       <?PHP
	   if( $TeacherAttendancePrincipal==0)
	   {
		   $send_display="notsend";
		   $sent_display = "sent";
	   }
	   else
	   {
		    $send_display="sent";
		   $sent_display = "notsend";
	   }
	   ?>
       <span class="pull-left teacher-attendancve-sms-resp"></span>
 <span class="pull-right btn btn-sm btn-primary <?PHP echo $send_display?>" id="SendTodaysattendanceSMS" >Send SMS </span>
<span class="pull-right btn btn-sm btn-danger messagesent <?PHP echo $sent_display; ?>">SMS Sent</span> 
  </div>

</div>
          
          
        <div class="col-lg-6 col-md-6">
        <div class="card tab dashb">
                    <div class="headertop cls-attendance">
                        <h2>Class Attendance</h2>
                       <!-- sections -->
                        
                        <ul class="header-dropdown m-r--5">
                            <li class="dropdown"> <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="selSec" id="0">Section</span>&nbsp;<i class="fa fa-caret-down"></i></a>
                                
                                <ul class="dropdown-menu pull-right section-for-class">
                                	<li><a class=" cursor-pointer attendance-s waves-effect waves-block">Select Seciton</a></li> 
                                </ul>
                                
                            </li>
                        </ul>
                      
                      <!-- classes -->  
                        <ul class="header-dropdown m-r--5 sections-header">
                            <li class="dropdown"> <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="SelectedCls" id="0">Class </span>&nbsp;<i class="fa fa-caret-down"></i></a>
                                
                                <ul class="dropdown-menu pull-right">
                                 <?PHP
								 if( $classes!='0')
								 {
								 	foreach( @$classes->result() as $cls)
									{
										?>
                                        <li>
                                         <a class=" cursor-pointer attendance-cls waves-effect waves-block" id="<?PHP echo $cls->SLNO?>" classSection="class" ><?PHP echo $cls->ClassName; ?></a>
                                         </li>
                                        <?PHP	
									}
								 }
								 ?>	
                                 
                                </ul>
                                
                                
                                
                                
                                
                            </li>
                        </ul>
                        
                        
                        
                        
                    </div>
                   <div class="chartone body">
       			       <div id="chartone2" style="height:300px;"></div>
                    </div>
                    
                </div>
          
           
           
          
          
          
          </div>

<div style="clear:both"></div>                        
                        
                        
                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <div class="card tab">
                    <div class="headertop">
                        <h2>Notifications</h2>
                        <ul class="header-dropdown m-r--5">
                            <li class="dropdown"> <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                <ul class="dropdown-menu pull-right">
                                <li><a href="javascript:void(0);" class=" waves-effect waves-block notification-by" id="Admin">By Admin</a></li>
                                    <li><a href="javascript:void(0);" class=" waves-effect waves-block notification-by" id="Parent">By Parent</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="body">
                        <table class="table table-hover table-responsive">
                            <thead>
                                <tr>
                                    <th class="noti-by">Notifications By Admin</th>
                                    <!--<th>Charts</th>-->
                                </tr>
                            </thead>
                            <tbody class="notify-body">
                               <!--  <tr>
                                    <td>Dean Otto</td>
                                    <td>
                                        <span class="sparkbar"><canvas width="34" height="16" style="display: inline-block; width: 34px; height: 16px; vertical-align: top;"></canvas></span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>K. Thornton</td>
                                    <td>
                                       <span class="sparkbar"><canvas width="34" height="16" style="display: inline-block; width: 34px; height: 16px; vertical-align: top;"></canvas></span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Kane D.</td>
                                    <td>
                                        <span class="sparkbar"><canvas width="34" height="16" style="display: inline-block; width: 34px; height: 16px; vertical-align: top;"></canvas></span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Jack Bird</td>
                                    <td>
                                        <span class="sparkbar"><canvas width="34" height="16" style="display: inline-block; width: 34px; height: 16px; vertical-align: top;"></canvas></span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Hughe L.</td>
                                    <td>
                                        <span class="sparkbar"><canvas width="34" height="16" style="display: inline-block; width: 34px; height: 16px; vertical-align: top;"></canvas></span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Jack Bird</td>
                                    <td>
                                        <span class="sparkbar"><canvas width="34" height="16" style="display: inline-block; width: 34px; height: 16px; vertical-align: top;"></canvas></span>
                                    </td>
                                </tr> -->
                                
                                <?PHP
									if($AdminNotify!='0')
									{
										foreach( $AdminNotify->result() as $noti)
										{
											?>
                                                <tr>
                                                <td>
												<?PHP if( strlen(strip_tags($noti->Notification))>33) { echo '<a href="'.base_url('view-notification-to-student').'" target="_blank">'.substr(strip_tags($noti->Notification),0,33)."...</a>"; } else echo strip_tags($noti->Notification); ?> </td>
                                                </tr>
                                            
                                            <?PHP	
										}
								?>
                                
                                <?PHP
									}
									else
									{
										?>
                                      <tr>
                                    <td>No Unread notification found</td>
                                    <!--<td>
                                        <span class="sparkbar"><canvas width="34" height="16" style="display: inline-block; width: 34px; height: 16px; vertical-align: top;"></canvas></span>
                                    </td>-->
                                </tr>   
                                        <?PHP	
									}
								?>
                            </tbody>
                        </table>
                     
                    </div>
                    
                </div>
                
            </div> 
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <div class="card tab">
                    <div class="headertop">
                        <h2>Activities</h2>
                        
                    </div>
                    <div class="body ">
                        
                        
                        <div class="timeline-body">
                        	<?PHP
							$colors_arr = array("warning","default","success","danger","primary");
							
							if( $StudentActivities!='0' )
							{
								?>
                                <div class="timeline m-border">
                                        
                                        <?PHP
										$cnt=0;
										foreach( $StudentActivities->result() as $activ)
										{
											$cls = $colors_arr[array_rand($colors_arr)];
											
										?>
                                        <div class="timeline-item border-<?PHP echo $colors_arr[$cnt]; ?> border-l">
                                            <div class="item-content">
                                                <div class="text-small hob"><?PHP echo $activ->ActivityTitle?></div>
                                                <p><a href="<?PHP echo base_url('view-student-activities');?>" target="_blank" class="text-<?PHP echo $colors_arr[$cnt]; ?>">Click here to view more</a></p>
                                                
                                            </div>
                                        </div>
                                        <?PHP
										$cnt++;
										}
										?>
                                        
                                        
                                        
                                        
                                    </div>
                                <?PHP
							}
							else
							{
								?>
								<div class="timeline m-border">
                                        
                                        
                                        <div class="timeline-item border-danger border-l">
                                            <div class="item-content">
                                                <div class="text-small hob">No Activites found</div>
                                                
                                            </div>
                                        </div>
                                        
                                        
                                        
                                        
                                        
                                    </div>
								<?PHP
							}
							?>
                        
                                    <!--
                                    	<div class="timeline m-border">
                                        <div class="timeline-item">
                                            <div class="item-content">
                                                <div class="text-small hob">Hobbies</div>
                                                <p><a href="" style="color:#444">Click here to view more</a></p>
                                                
                                            </div>
                                        </div>
                                        <div class="timeline-item border-info">
                                            <div class="item-content">
                                                <div class="text-small hob">Extra curricular </div>
                                               <p><a href="" style="color:#444">Click here to view more</a></p>
                                            </div>
                                        </div>
                                        <div class="timeline-item border-warning border-l">
                                            <div class="item-content">
                                                <div class="text-small hob">Identification Marks</div>
                                                <p><a href="" style="color:#444">Click here to view</a></p>
                                            </div>
                                        </div>
                                        
                                        
                                        
                                        
                                        
                                    </div>
                                   -->
                                    
                                </div>
                        
                        
                        
                     
                    </div>
                    
                </div>
                
            </div>
            
            
            
            
            
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <div class="card tab">
                    <div class="headertop">
                        <h2>Birthdays</h2>
                        <ul class="header-dropdown m-r--5">
                            <li class="dropdown"> <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="selected-bday-cls">Class </span><i class="fa fa-caret-down">  </i></a>
                                <ul class="dropdown-menu pull-right">
                                
                                 
                                 <?PHP
								 if( $classes!='0')
								 {
								 	foreach( $classes->result() as $cls)
									{
										?>
                                        <li>
                                         <a class=" cursor-pointer birthday-cls waves-effect waves-block" id="<?PHP echo $cls->SLNO?>" ><?PHP echo $cls->ClassName; ?></a>
                                         </li>
                                        <?PHP	
									}
								 }
								 ?>	
                                
                                </ul>
                            </li>
                        </ul>
                    </div>
                   <div class="body">
                        <ul class="basic-list" id="birthdayListing">
                        <?PHP
						if( $BirthdayStudents!='0' )
						{
							foreach( $BirthdayStudents->result() as $bdays)
							{
								?>
                                
                                
                            		 <li>
                                     	<span style="float:left; width:10%">
                                        	<img src="<?PHP echo $bdays->ProfileIPic?>" style="width:100%;  border:1px solid: #999; border-radius:20%" />
                                         </span>
                                         
                                         <span style="margin-left:20px">

                                  		    <?PHP echo $bdays->StudentName." ".$bdays->ClassName." Section-".$bdays->Section?> 
                                         </span>
                                         <span style="clear:both"></span>
                                     </li>
                                     
                                     
                                <?PHP	
							}
						}
						else
						{
							?>
                            <li>No birthday today</li>
                            <?PHP
						}	

						?>
                        <!--
                            <li>Mark Otto <span class="pull-right label-danger label">21%</span></li>
                            <li>Jacob Thornton <span class="pull-right label-purple label">50%</span></li>
                            <li>Jacob Thornton<span class="pull-right label-success label">90%</span></li>
                            <li>M. Arthur <span class="pull-right label-info label">75%</span></li>
                            <li>Jacob Thornton <span class="pull-right label-warning label">60%</span></li>
                            <li>M. Arthur <span class="pull-right label-success label">91%</span></li>
                            -->
                        </ul>
                    </div>
                    
                </div>
                
            </div>
            
             
                          
                          
                          
                           
                          <div class="clearfix"></div>   
                          </div>
                         
                      </section>
                      
                  </div>
                   
              </div>          
              
</section          
      ></section>
      
      
       
      
      
<!--

select count(PresentAbsent) as TotalPresents, (select count(PresentAbsent)  FROM studentattendance where PresentAbsent='Absent' and MONTH(AttendanceOn)='10' and ClassId=1 and SectionId=1 and AcademicYear='2017-2018')  as TotalAbsentees  FROM studentattendance where PresentAbsent='Present' and MONTH(AttendanceOn)='10' and ClassId=1 and SectionId=1 and AcademicYear='2017-2018'

-->      

<!--
SELECT MONTHNAME(`AttendanceOn`) as Month FROM `studentattendance` WHERE `ClassId` =1 and SectionId=1 and AcademicYear='2017-2018' Group by Month
-->