<section id="main-content">
  <section class="wrapper">  
 <div class="row">
				<div class="col-lg-12">
                
                <ol class="breadcrumb">
						<li><i class="fa fa-home"></i> <a href="<?PHP echo base_url('dashboard');?> ">Dashboard </a></li> 
                        <li><i class="fa fa-plus"></i> <a href="<?PHP echo base_url('add-holiday');?> ">Add holiday </a></li> 
						<li><i class="fa fa-laptop"></i>View Holidays</li>						  	
					</ol>
                
                </div>
			</div>

	<div class="row">
  
                  <div class="col-lg-12">
                 
                      <section class="panel">
                          <header class="panel-heading">
                             View Holidays
                          </header>
                          <div class="panel-body">

                              <div class="form col-lg-12">
                                  
                                  <?PHP
								
								# echo "<pre>";  print_r($events); exit;
								  $currentMonth = date('m');

								  $previous=13;
								  $next=15;
								  
								  $cnt=0;
								
								
								 for($i=3;$i<6;$i++)
								  {
									$mnth = $i;
								  ?>
                                  
                                  <div class="col-md-4 months">
                                   <?PHP 
								  	if( $this->uri->segment(2)=='' )
									{
									  
									  $yr = date('Y');
									  $prevmont = date('m')-1;
									  $nxtmont = date('m')+3;
									 									 
									  if($i==3)
									  {
										  $showMonth=date('m');
										  $showYear=date('Y');
										  $setEvents = array();
										  
										 
										  if(!empty($events))
										  {
												$events_mnths = array_keys($events);
												if( in_array($showMonth,$events_mnths) )
												{
													echo  @$this->calendar->generate( (date('Y')),$showMonth,$events[$showMonth]);
													unset($events[$showMonth]);
												}
												else
													echo  @$this->calendar->generate( (date('Y')),$showMonth);
													
												
											  /*
											$event_cnt=0;	
											foreach($events as $key=>$val)
											{
												$event_cnt++;
												
												if($event_cnt==1) 
												{
													if( date('m')>4 && date('m')<=12)
													{
														if( $key>4)
														{
															echo  @$this->calendar->generate( (date('Y')),$key,$val);	
														}
														else
														{
															echo $key; 
															#echo  @$this->calendar->generate( (date('Y')+1),$key,$val);	
														}
														
													}
													else
													{
														
														echo  @$this->calendar->generate( date('Y'),$key,$val);	
													}
												}
												*/
												
											//}//foreach ends here
										  }//if not empty ends here
					  					else
											echo  @$this->calendar->generate( date('Y'),$showMonth);
										  
										  	
									  }
									else
									{	
										
										$showMonth=date('m')+$cnt;
										if($showMonth==13)
											$showMonth=1;
										else if($showMonth==14)
											$showMonth=2;
										else if($showMonth==15)
											$showMonth=3;
										else if($showMonth==16)
											$showMonth=4;
										
										$showYear=date('Y');
										  $setEvents = array();
											
										
										  if(!empty($events))
										  {
											$event_cnt=0;	
											foreach($events as $key=>$val)
											{
												$nextMONTH = date('m')+$cnt;
													if($nextMONTH==$key)
													{
														$keys= array_keys($val);
														$keys = array_flip($keys);
														
														$showMonth=$key;
														$setEvents = $keys;
													}
													

											}//foreach ends here
										  }//if not empty ends here
										
											echo  @$this->calendar->generate( date('Y'),$showMonth,$events[$showMonth]);
									
										
										}
									}
									else
									{ 
										$yr = $this->uri->segment(2);
										//$yr = date('Y');
										 
										if( $this->uri->segment(3)>=6 && $this->uri->segment(3)<=15 )
										{
									 	 	
											if( $this->uri->segment(3)<=12 )
											{
											  $prevmont = $this->uri->segment(3)-3;
											  $nxtmont = $this->uri->segment(3)+3;
											}
											else
											{
												$prevmont = 12;
											     $nxtmont = 16;
											}
												$startmonth = $this->uri->segment(3);
											
											//echo $startmonth; 
											 if($this->uri->segment(3)==15)
											 {
												 $startmonth=3;
											 	if($cnt<=1)
													echo  $this->calendar->generate( $yr, $startmonth+$cnt);	
											 }
											else
											{
												//echo $startmonth;
												$eventKeys = array_keys($events);
												if($startmonth>12 && $startmonth<15 )
												 {
													 $yr = $yr;
													 static $startmnth=1;
													 if(!empty($events))
														{
															$events_cnt=0;	
															//$startmonth = $startmonth+$cnt;
															if( in_array($startmnth,$eventKeys) )
															{
																echo $this->calendar->generate( $yr,$startmnth,@$events[$startmnth]);
																$startmnth = $startmnth+1;
															}
															else
															{
																echo $this->calendar->generate( $yr,$startmnth);
																$startmnth++;
															}
		
														}//if not empty ends here
													 
												 }
												 else
												 	{
														if(  $startmonth==12 )	
														{
															if( !isset($nextcnt))
																{
																	if( in_array($startmonth,$eventKeys) )
																		echo $this->calendar->generate( $yr,$startmonth,@$events[$startmonth]);
																	else
																		echo $this->calendar->generate( $yr,$startmonth);
																	
																	$nextcnt=0;	
																}
																else
																{
																	$nextcnt++;
																	$yr = $this->uri->segment(2);
																	$yr++;
																	
																	if( in_array($cnt,$eventKeys) )
																		echo $this->calendar->generate( $yr,$cnt,@$events[$cnt]);
																	else
																		echo $this->calendar->generate( $yr,$cnt);
																}
															
															
															
														}
														else if ($startmonth==11)
														{
															$startmonth = $startmonth+$cnt;
															if( !isset($nextcnt) )
															{
																if( in_array($startmonth,$eventKeys) )
																	echo $this->calendar->generate( $yr,$startmonth,@$events[$startmonth]);
																else
																	echo $this->calendar->generate( $yr,$startmonth);
																if($cnt==1)	
																$nextcnt=0;																
															}
															else
																{
																	$yr = $this->uri->segment(2);
																	$yr++;
																	$startmonth=1;
																	
																	if( in_array($startmonth,$eventKeys) )
																		echo $this->calendar->generate( $yr,$startmonth,@$events[$startmonth]);
																	else
																		echo $this->calendar->generate( $yr,$startmonth);	
																}
														}
														else
														{
															$startmonth = $startmonth+$cnt;
															if( in_array($startmonth,$eventKeys) )
																echo $this->calendar->generate( $yr,$startmonth,@$events[$startmonth]);
															else
																echo $this->calendar->generate( $yr,$startmonth);
														}
													}
												 	
											
												
												
											}
										}
										else
										{
											
												if($this->uri->segment(3)<6)
												{
													$prevmont = 5;
												 	$nxtmont =9;
												 	
													//print_r($events);
													
													
													echo  $this->calendar->generate( $yr, 3+$i,@$events[$nextMONTH]);		
												}
												else
												{
												 	$prevmont = 12;
												 	$nxtmont = 16;
												 	echo  $this->calendar->generate( $yr, 14+$cnt,@$events[$nextMONTH]);		
												}
												 	
										}
										
									
									  
									}
								   ?>
                                  </div>
                                  
  
                                   
<?PHP


if( trim($this->uri->segment(2))!='' )
	{
		$prevmont = $this->uri->segment(3)-1;
		$yr = $this->uri->segment(2);
		
		 if( $this->uri->segment(3)==15)
			 {
				$yr = ($this->uri->segment(2));
				$prevmont = ($this->uri->segment(3))-1;
			 }
		 if( $this->uri->segment(3)==14)
			 {
				$yr = ($this->uri->segment(2))-1;
				$prevmont = ($this->uri->segment(3))-2;
			 }
		else if( $this->uri->segment(3)==13)
			 {
				$yr = ($this->uri->segment(2))-1;
				$prevmont = ($this->uri->segment(3))-1;
			 }
		else if( $this->uri->segment(3)==12)
			 {
				$prevmont = ($this->uri->segment(3))-1;
			 }
			 else
			  $yr = ($this->uri->segment(2));
		 
	}
else
	$yr = date('Y');

if( $prevmont>=3)
{
	if( $this->uri->segment(3)>6 || $this->uri->segment(3)=='')
	{
?>	                                 
<div class="pre_div"><a href="<?PHP echo base_url('view-holidays')."/".$yr."/".$prevmont?>"><i class="fa fa-arrow-left" aria-hidden="true"></i></a></div>   
<?PHP
	}
	else
	{
		?>
        <div class="pre_div"><a ><i class="fa fa-arrow-left" aria-hidden="true" style="background:#eee"></i></a></div>  
        <?PHP	
	}
}
else
{
	$yr = date('Y')-1;
	$prevmont = 12;
?>
<!--<div class="pre_div"><a ><i class="fa fa-arrow-left" aria-hidden="true" style="background:#eee"></i></a></div>   -->
<div class="pre_div"><a href="<?PHP echo base_url('view-holidays')."/".$yr."/".$prevmont?>"><i class="fa fa-arrow-left" aria-hidden="true"></i></a></div>   

<?PHP	
}
?>

<?PHP

$yr =$this->uri->segment(2);
if( $nxtmont<=16 )
{
	if( $nxtmont==16)
	{
		if( $this->uri->segment(3)==15)
		{
		?>
        <div class="next_div"><a sytle="cursor:pointer"><i class="fa fa-arrow-right" style="background:#eee" aria-hidden="true"></i></a></div> 
        <?PHP
		}
		else
		{
		
?>
	<div class="next_div"><a href="<?PHP echo base_url('view-holidays')."/".($yr-1)."/".($nxtmont-1)?>"><i class="fa fa-arrow-right" aria-hidden="true"></i></a></div> <?PHP
		}
}
if( $nxtmont==15)
		{
				$yr=date('Y')+1;	  
		?>
<div class="next_div"><a href="<?PHP echo base_url('view-holidays')."/".($yr)."/".($nxtmont)?>"><i class="fa fa-arrow-right" aria-hidden="true"></i></a></div> 
        <?PHP
		}
	else
	{
		if( $this->uri->segment(3)==15 || $this->uri->segment(3)==16 )
		{
		?>
        <div class="next_div"><a sytle="cursor:pointer"><i class="fa fa-arrow-right" style="background:#eee" aria-hidden="true"></i></a></div> 
		<?PHP
       			
		}
		else
		{
			if ($this->uri->segment(3)==10 || $this->uri->segment(3)==11)
			{
				$nxtmont=13;
				$yr=$yr+1;
			?>
		<div class="next_div"><a href="<?PHP echo base_url('view-holidays')."/".($yr)."/".$nxtmont?>"><i class="fa fa-arrow-right" aria-hidden="true"></i></a></div>             
            <?PHP		
			}
			else
			{
				if( $this->uri->segment(3)==14 || $this->uri->segment(3)==13 )
					$nxtmont = 15;
?>
<div class="next_div"><a href="<?PHP echo base_url('view-holidays')."/".$yr."/".$nxtmont?>"><i class="fa fa-arrow-right" aria-hidden="true"></i></a></div> 
<?PHP
		}
		}
}
}
else
{
	?>
<div class="next_div"><a sytle="cursor:pointer"><i class="fa fa-arrow-right" style="background:#eee" aria-hidden="true"></i></a></div> 
    <?PHP
}
	$cnt++;
}
?>
                                  <div class="clearfix"></div>
                                  
								  
								 
                                  
                              </div>
                          </div>
                      </section>
                  </div>
              </div>          
              
</section          
      ></section>
      
      
      <div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Update Holiday </h4>
      </div>
      <div class="modal-body">
      
   
        <form id="add-celebrationform">
        <div class="col-md-12 event_da">
        <label>Holiday On</label>
        	<input type="text" class="form-control cel_date"  placeholder="" readonly="readonly"/>
             
            </div>
            
             <div class="col-md-12 event_da">
        <label>Occassion</label>
        	<input type="hidden" id="CelebId" class="HolidayId" />
            <textarea class="form-control celebration"></textarea>
            <span class="err-msg"></span>
            </div>
            
              <div class="col-md-12 event_da">
             <span class="pull-left addceleb_resp"> </span>

			
              <button type="button" class="btn btn-primary pull-right updateholidaybtn" addedit="edit">Update holiday details</button>
              <button type="button" class="btn btn-danger delete-holiday" >Delete Holiday </button>
              
              </div>
            
       
            
            
        </form>
        <div class="clearfix"></div>
      </div>
      
      
    </div>

  </div>
</div>