
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
                                <p class="dashboard-text" style="margin-left:-10px; margin-top:-10px" ><a href="<?PHP echo base_url('view-students-fee-details')?>" style="color:#434348">Total Fees</a></p>
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
        
        
        <div class="col-lg-7 col-md-6">
          
           <div class="card dashb att">
           
           <h2>Student Attendance</h2>
           
       <div class="chartone">
       
       <div id="chartone2" style="height:300px;"></div>
       
       </div>
           
           </div>
          
          
          
          </div>
        
        
          <div class="col-lg-5 col-md-6">
          
           <div class="card dashb att">
           
           <h2>Staff Attendance</h2>
           
           
           
           
       <div class="chartone">
       
       <div id="chartone" style="height:300px;"></div>
       
       </div>
           
           </div>
          
          
          
          </div>
          
          
          
          
          
          
          
          <div class="col-lg-12 col-md-6">
          
           <div class="card dashb att">
           <div class="col-lg-3 col-md-6"> 
           <h2 style="border-bottom:0px; margin-bottom:0px; margin-top:7px; padding-bottom:0px;">Fee statistics</h2>
           </div>
           
           <div class="col-lg-9 col-md-6 text-right">
           
           <!--<div class="form-group cla" style="margin-bottom:0px; margin-right:10px; ">


							<select class="form-control  fe" name="Month" id="Month" style="margin-top:0px; width:160px;" >
                                    <option value="0">Seclect Month</option>
                                    <option value="01" <?PHP if($mnth=="01") echo 'selected=selected';?> >January</option>
                                    <option value="02" <?PHP if($mnth=="02") echo 'selected=selected';?>>February</option>
                                    <option value="03" <?PHP if($mnth=="03") echo 'selected=selected';?>>March</option>
                                    <option value="04" <?PHP if($mnth=="04") echo 'selected=selected';?>>April</option>
                                    <option value="05" <?PHP if($mnth=="05") echo 'selected=selected';?>>May</option>
                                    <option value="06" <?PHP if($mnth=="06") echo 'selected=selected';?>>June</option>
                                    <option value="07" <?PHP if($mnth=="07") echo 'selected=selected';?>>July</option>
                                    <option value="08" <?PHP if($mnth=="08") echo 'selected=selected';?>>August</option>
                                    <option value="09" <?PHP if($mnth=="09") echo 'selected=selected';?>>September</option>
                                    <option value="10" <?PHP if($mnth=="10") echo 'selected=selected';?>>October</option>
                                    <option value="11" <?PHP if($mnth=="11") echo 'selected=selected';?>>November</option>
                                    <option value="12" <?PHP if($mnth=="12") echo 'selected=selected';?>>December</option>
                                    
                                    
                                    </select>
</div>-->


  <div class="form-group cla" style="margin-bottom:0px; margin-right:10px;">

<select class="form-control  fe" name="ClassName" id="ClassName" style="margin-top:0px; width:160px;" >
    								<option value="0">Select Class</option>                               
									<?PHP
                                    foreach( $classes->result() as $cls)
                                    {
                                    ?>
                                    <option value="<?PHP echo $cls->SLNO; ?>" <?PHP if( $ClassName == $cls->SLNO  ) echo 'selected=seelcted'; ?> > <?PHP echo $cls->ClassName; ?> </option>
                                    <?PHP	
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
           
           <hr style=" height:1px; background:#ddd;">
           
       <div class="chartone">
       
       <div id="chartone3" style="height:300px;"></div>
       
       </div>
           
           </div>
          
          
          
          </div>
                        
                        
                        
                        
                        
                        
                        
                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <div class="card tab">
                    <div class="headertop">
                        <h2>Notifications</h2>
                        <ul class="header-dropdown m-r--5">
                            <li class="dropdown"> <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                <ul class="dropdown-menu pull-right">
                                <?PHP 
									foreach( $classes->result() as $cls)
									{
										?>
                                        <li><a href="javascript:void(0);" id="<?PHP echo $cls->ClassName?>" class=" waves-effect waves-block notif_by_cls"><?PHP echo $cls->ClassName?></a></li>
                                        <?PHP	
									}
								?>
                           <!--         <li><a href="javascript:void(0);" class=" waves-effect waves-block">Action</a></li>
                                    <li><a href="javascript:void(0);" class=" waves-effect waves-block">Another action</a></li>
                                    <li><a href="javascript:void(0);" class=" waves-effect waves-block">Something else here</a></li>-->
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="body">
                        <table class="table table-hover table-responsive">
                            <thead>
                                <tr>
                                    <th>Notifications by admin</th>
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
                                                <td><?PHP if( strlen($noti->Notification)>33) { echo substr($noti->Notification,0,33)."..."; } else echo $noti->Notification; ?> </td>
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
                        <ul class="header-dropdown m-r--5">
                            <li class="dropdown"> <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                <ul class="dropdown-menu pull-right">
                                    <li><a href="javascript:void(0);" class=" waves-effect waves-block">Action</a></li>
                                    <li><a href="javascript:void(0);" class=" waves-effect waves-block">Another action</a></li>
                                    <li><a href="javascript:void(0);" class=" waves-effect waves-block">Something else here</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="body ">
                        
                        
                        <div class="timeline-body">
                                    <div class="timeline m-border">
                                        <div class="timeline-item">
                                            <div class="item-content">
                                                <div class="text-small hob">Hobbies</div>
                                                <p>It is a long established.</p>
                                                 <p>It is a long established.</p>
                                                  <p>It is a long established.</p>
                                                   <p>It is a long established.</p>
                                                
                                            </div>
                                        </div>
                                        <div class="timeline-item border-info">
                                            <div class="item-content">
                                                <div class="text-small hob">Extra curricular </div>
                                                <p>There are many variations</p>
                                            </div>
                                        </div>
                                        <div class="timeline-item border-warning border-l">
                                            <div class="item-content">
                                                <div class="text-small hob">Identification Marks</div>
                                                <p>Contrary to popular belief </p>
                                            </div>
                                        </div>
                                        
                                        
                                        
                                        
                                        
                                    </div>
                                </div>
                        
                        
                        
                     
                    </div>
                    
                </div>
                
            </div>
            
            
            
            
            
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <div class="card tab">
                    <div class="headertop">
                        <h2>Birthdays</h2>
                        <ul class="header-dropdown m-r--5">
                            <li class="dropdown"> <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                <ul class="dropdown-menu pull-right">
                                    <li><a href="javascript:void(0);" class=" waves-effect waves-block">Action</a></li>
                                    <li><a href="javascript:void(0);" class=" waves-effect waves-block">Another action</a></li>
                                    <li><a href="javascript:void(0);" class=" waves-effect waves-block">Something else here</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                   <div class="body">
                        <ul class="basic-list">
                            <li>Mark Otto <span class="pull-right label-danger label">21%</span></li>
                            <li>Jacob Thornton <span class="pull-right label-purple label">50%</span></li>
                            <li>Jacob Thornton<span class="pull-right label-success label">90%</span></li>
                            <li>M. Arthur <span class="pull-right label-info label">75%</span></li>
                            <li>Jacob Thornton <span class="pull-right label-warning label">60%</span></li>
                            <li>M. Arthur <span class="pull-right label-success label">91%</span></li>
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