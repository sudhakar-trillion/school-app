<section id="main-content">
  <section class="wrapper">  
 <div class="row">
				<div class="col-lg-12">
                
                <ol class="breadcrumb">
						<li><i class="fa fa-home"></i> <a href="<?PHP echo base_url('dashboard');?> ">Dashboard </a></li> 
                        <li><i class="fa fa-plus"></i> <a href="<?PHP echo base_url('add-celebration');?> ">Add celebration </a></li> 
						<li><i class="fa fa-laptop"></i>View Celebrations</li>						  	
					</ol>
                
                </div>
			</div>

	<div class="row">
  
                  <div class="col-lg-12">
                 
                      <section class="panel">
                          <header class="panel-heading">
                             View Celebrations
                          </header>
                          <div class="panel-body">

                              <div class="form col-lg-12">
                                  
                                  <?PHP
								 /* echo "<pre>";
								  	print_r($events);
								  exit;*/
								  

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
											$event_cnt=0;	
											foreach($events as $key=>$val)
											{
												$event_cnt++;
												
												if($event_cnt==1) 
													echo  @$this->calendar->generate( date('Y'),date('m'),$val);	
												/*
													if(date('m')==$key)
													{
														$keys= array_keys($val);
														$keys = array_flip($keys);
														
														$showMonth=$key;
														$setEvents = $keys;
														
														echo  @$this->calendar->generate( date('Y'),$showMonth,$val);	
													}
												*/	

											}//foreach ends here
										  }//if not empty ends here
					  					
										
										  	
									  }
									else
									{	
										  $showMonth=date('m')+$cnt;
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
											
											
											 if($this->uri->segment(3)==15)
											 {
											 	if($cnt<=1)
												{
													
													echo  $this->calendar->generate( $yr, $startmonth+$cnt);	
												}
											 }
											else
											{
												
												$showMonth=$startmonth+$cnt;
												
												$setEvents = array();
												
												if(!empty($events))
												{
													$events_cnt=0;	
													foreach($events as $key=>$val)
													{
														if($this->uri->segment(3)==12)
														{
															if($cnt==0)
															{
																$nextMONTH = $startmonth+$cnt;
																$yr = date('Y');
															}
															else
															{
																$nextMONTH = $cnt;
																if($cnt==1)
																	$yr = date('Y')+1;
																else
																	$yr = date('Y');
															}
														}
														else
															$nextMONTH = $startmonth+$cnt;
														
														if($nextMONTH==$key)
														{
															$keys= array_keys($val);
															$keys = array_flip($keys);
															
															$showMonth=$key;
															$setEvents = $keys;
														}
													
													//$events_cnt++;
													}//foreach ends here
												}//if not empty ends here
											//	echo $yr;
												 
												
											echo $this->calendar->generate( $yr,$showMonth,@$events[$nextMONTH]);
												
												//echo  $this->calendar->generate( $yr, $startmonth+$cnt);
											}
										}
										else
										{
												if($this->uri->segment(3)<6)
												{
													$prevmont = 5;
												 	$nxtmont =9;
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
if( $prevmont>=6)
{

?>	                                 
<div class="pre_div"><a href="<?PHP echo base_url('view-celebrations')."/".$yr."/".$prevmont?>"><i class="fa fa-arrow-left" aria-hidden="true"></i></a></div>   
<?PHP
}
else
{
?>
<div class="pre_div"><a ><i class="fa fa-arrow-left" aria-hidden="true" style="background:#eee"></i></a></div>   
<?PHP	
}
?>
<?PHP
if( $nxtmont<=15)
{
?>
<div class="next_div"><a href="<?PHP echo base_url('view-celebrations')."/".$yr."/".$nxtmont?>"><i class="fa fa-arrow-right" aria-hidden="true"></i></a></div> <?PHP
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
        <h4 class="modal-title">Update celebration</h4>
      </div>
      <div class="modal-body">
      
   
        <form id="add-celebrationform">
        <div class="col-md-12 event_da">
        <label>Celebration Date</label>
        	<input type="text" class="form-control cel_date"  placeholder="" readonly="readonly"/>
             
            </div>
            
             <div class="col-md-12 event_da">
        <label>Celebration</label>
        	<input type="hidden" id="CelebId" />
            <textarea class="form-control celebration"></textarea>
            <span class="err-msg"></span>
            </div>
            
              <div class="col-md-12 event_da">
             <span class="pull-left addceleb_resp"> </span>
              <button type="button" class="btn btn-primary pull-right updatecelebrationbtn" addedit="edit">Update celebration</button>
              
              </div>
            
       
            
            
        </form>
        <div class="clearfix"></div>
      </div>
      
      
    </div>

  </div>
</div>