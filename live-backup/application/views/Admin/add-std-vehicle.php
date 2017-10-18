
<section id="main-content">
  <section class="wrapper">  
 <div class="row">
				<div class="col-lg-12">
                
                <ol class="breadcrumb">
						<li><i class="fa fa-home"></i> <a href="<?PHP echo base_url('dashboard');?> ">Dashboard </a></li>
                        <li><i class="fa fa-plus"></i> <a href="<?PHP echo base_url('add-route');?> ">Add route</a></li>
                        <li><i class="fa fa-plus"></i> <a href="<?PHP echo base_url('add-vehicle');?> ">Add vehicle</a></li>
						<li><i class="fa fa-eye"></i><a href="<?PHP echo base_url('view-vehicles')?>">View vehicles</a></li>
                        <li>Add-View assigned students to a route</li>				  	
				</ol>
                
                </div>
			</div>

	
    <div class="row">
  
                  <div class="col-lg-12">
                 
                      <section class="panel">
                         
                          <div class="panel-body">
                          
                          <div class="col-md-4 atte">
                         <!-- <h1>Add Attendance<br /> <span>20th July, Thursday 2017</span></h1>-->
                          
                            <div class="form-group cla">

  <select class="form-control RouteNumber" name="RouteNumber" id="RouteNumber">
    <option value="0">Seclect Route</option>
    <?PHP
	foreach( $routeDetails->result() as $rot)
	{
		?>
			<option value="<?PHP echo $rot->RouteId; ?>" <?PHP if( $RouteNumber == $rot->RouteId) echo 'selected' ?> >Route-<?PHP echo $rot->RouteNumber; ?> </option>
		<?PHP	
	}
	
	?>
  
  
  </select>
</div>
                          </div>
                          
                            <div class="col-md-8 text-right">
                            
                           <div class="form-group cla">

  <select class="form-control " name="ClassName" id="ClassName">
    <option value="0">Seclect Class</option>
    <?PHP
	foreach( $classes->result() as $cls)
	{
		?>
			<option value="<?PHP echo $cls->SLNO; ?>" <?PHP if( $SelectedCls== $cls->SLNO) echo 'selected=selected'; ?>> <?PHP echo $cls->ClassName; ?> </option>
		<?PHP	
	}
	
	?>
  
  
  </select>
</div>

 <div class="form-group cla mr1">

  <select class="form-control getstudentsfortransport"  name="sections" id="sections">
    <option value="0">Seclect Section</option>
    <?PHP
		foreach($sections->result() as $Sects)
		{
			?>
            <option value="<?PHP echo $Sects->SectionId?>" <?PHP if( $SelectedSec== $Sects->SectionId ) echo 'selected=selected'?> > <?PHP echo $Sects->Section;?> </option>
            <?PHP	
		}
	
	?>
  </select>
  
  
</div>


                            
                            
                            </div>
                           
                           
                           <div class="clearfix"></div>
                           
            <?PHP
			
			if($studentDetails!='0')
			{
				$assigned = array();
				
				if($assignedRolls!='0')
				{
					
					foreach( $assignedRolls->result() as $rol)
					{
						$assigned[] = $rol->StudentId;
						#echo $rol->StudentId."<BR>";
					}
					
					
				}
				
				$cls_secstdnts=array();
				$routs = array();
				
				$selectedroute = array();
				$selectedroute[] = $RouteNumber;
				
				$stdRoute = array();
				
				if( $cls_sec_ass_stds !='0')
				{
					foreach($cls_sec_ass_stds->result()  as $stds)
					{
						$routs[] = $stds->RouteId;	
						$cls_secstdnts[] = $stds->StudentId;
						$stdRoute[$stds->StudentId] = $stds->RouteId;
						
					}
					
					$diffroutes = array_diff($routs,$selectedroute);
				}
				
				
			/*	echo "<pre>";
				print_r($diffroutes);
				echo "</pre>";
				
				echo "<pre>";
				print_r($routs);
				echo "</pre>";*/
				
				
				foreach($studentDetails->result() as $std)
				{
									
					
					?>
		                    <div class="col-lg-2 col-md-2 col-sm-6 col-xs-12">
                <div class="card">
                    <div class="body">
                        <div class="member-card verified">
                            
                            <div class="thumb-xl member-thumb" stdid="<?PHP echo $std->StudentId;?> " > 
                               <?PHP
							   if($std->ProfileIPic=='')
							   {
							   ?>
                                <img  src="resources/studentspics/students-profile-icon.jpg" height='100px' class="img-circle" alt="profile-image">
                               <?PHP
							   }
							   else
							   {
							   ?>
                                <img  src="<?PHP echo $std->ProfileIPic?>" height='100px' class="img-circle" alt="profile-image">
                              <?PHP 
							   }
							   
							   if( in_array($std->StudentId,$cls_secstdnts)  )
							   {
								   
								   
								   if( in_array($RouteNumber,$routs) )
								   {
									  # echo array_search($RouteNumber,$routs).":$RouteNumber";
									   if( $stdRoute[$std->StudentId] == $RouteNumber )
									   {
								  ?>
                                  <p stdRoll="<?PHP echo $std->StudentId;?>" class="zmdi  add_remove added stdroll_<?PHP echo $std->StudentId;?>"></p>
                                  <?PHP
								   		}
										else
										{
											?>
                                            <p stdRoll="<?PHP echo $std->StudentId;?>" class="stdroll_<?PHP echo $std->StudentId;?>"></p>
                                            <?PHP
										}
								   }
								   
							   }
							   else
							   {
								 
									?>
                                     <p stdRoll="<?PHP echo $std->StudentId;?>" class="zmdi add_remove dan stdroll_<?PHP echo $std->StudentId;?>"></p>
                                    <?PHP
									   
							   }
							   
							?>
                                <!--<p stdRoll="<?PHP echo $std->StudentId;?>" class="zmdi  add_remove <?PHP if(in_array($std->StudentId,$assigned)) echo 'added'; else echo 'dan';  ?> stdroll_<?PHP echo $std->StudentId;?>"></p>-->
                                
                            </div>

                            <div class="">
                                <h4 class="m-b-5" style="cursor:pointer" title="<?PHP echo $std->Student; ?>" id="<?PHP echo $std->StudentId;?>"><?PHP if( strlen($std->Student)>5) echo substr($std->Student,0,6).".."; else echo $std->Student; ?></h4>
                                <p class="text-muted">Roll No: <?PHP echo $std->Roll;?> </span></p>
                                <p style="color:#0e8147"> <?PHP if(@$stdRoute[$std->StudentId]!=''){?>  Route No: <?PHP echo @$stdRoute[$std->StudentId]; } else echo '<span style="color:#999" ></span>'; ?> </span></p>
                            </div>
    
                        </div>
                    </div>
                </div>
            </div>
                    <?PHP	
				}
				?>
                
				<div class="text-right">
                <span style="display:inline-block; margin-right:40px;" class="assignstudent-msg" >
                <div class="" style="margin-left:500px">&nbsp;</div>
                </span>
                
              
                <button type="button" style="margin-right:15px" class="btn btn-success Submit addstudenttoroute" data-dismiss="modal">Assign student  </button>    
                
                  <button type="button" style="margin-right:15px" class="btn btn-danger Submit removestudenttoroute" data-dismiss="modal">Remove all</button>    
                
                </div>
                <?PHP
			}
			?>
                 
                       
                           
                          </div>
                      </section>
                  </div>
              </div>          
              
</section          
      ></section>