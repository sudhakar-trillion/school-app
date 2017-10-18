
<section id="main-content">
  <section class="wrapper">  
 <div class="row">
				<div class="col-lg-12">
                
                <ol class="breadcrumb">
						<li><i class="fa fa-home"></i> <a href="<?PHP echo base_url('dashboard');?> ">Dashboard </a></li> 
                        <li><i class="fa fa-plus"></i> <a href="<?PHP echo base_url('add-exam');?> ">Add exam schedule </a></li> 
						<li><i class="fa fa-laptop"></i>View Exam Schedules</li>						  	
					</ol>
                
                </div>
			</div>

	<div class="row">
  
                  <div class="col-lg-12">
                 
                      <section class="panel">
                          <header class="panel-heading">
                             View Exam Schedules
                          </header>
                          <div class="panel-body">

                              <div class="form col-lg-12">
                                  
                                  <?PHP
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
										  
										  
										  
										  if(!empty($schedules))
										  {
											$event_cnt=0;	
											foreach($schedules as $key=>$val)
											{
												$event_cnt++;
												
												if($event_cnt==1) 
													echo  $this->calendar->generate( date('Y'),$showMonth,@$schedules[$showMonth]);
												
												
												/*
													if(date('m')==$key)
													{
														$keys= array_keys($val);
														$keys = array_flip($keys);
														
														$showMonth=$key;
														$setEvents = $keys;
														
														echo  $this->calendar->generate( date('Y'),$showMonth,$val);	
													}
													*/

											}//foreach ends here
										  }//if not empty ends here
					  					
										
										  	
									  }
									else
									{	

										  $showMonth=date('m')+$cnt;
										//  echo $showMonth;
										  $showYear=date('Y');
										  $setEvents = array();
										  
										  /*
										  echo "<Pre>";
										  print_r($schedules);
										  echo "</pre>";
										 */
										 
										  if(!empty($schedules))
										  {
											
											$event_cnt=0;	
											foreach($schedules as $key=>$val)
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
										/*echo "<pre>"; print_r($events[$showMonth]); echo "</pre>";
										
										*/
										echo  $this->calendar->generate( date('Y'),$showMonth,@$schedules[$showMonth]);
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
												
												if(!empty($schedules))
												{
													$events_cnt=0;	
													foreach($schedules as $key=>$val)
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
												 
												
											echo $this->calendar->generate( $yr,$showMonth,@$schedules[$nextMONTH]);
												
												//echo  $this->calendar->generate( $yr, $startmonth+$cnt);
											}
										}
										else
										{
												if($this->uri->segment(3)<6)
												{
													$prevmont = 5;
												 	$nxtmont =9;
												 	echo  $this->calendar->generate( $yr, 3+$i,@$schedules[$nextMONTH]);		
												}
												else
												{
												 	$prevmont = 12;
												 	$nxtmont = 16;
												 	echo  $this->calendar->generate( $yr, 14+$cnt,@$schedules[$nextMONTH]);		
												}
												 	
										}
										
									
									  
									}
								   ?>
                                  </div>
<?PHP
if( $prevmont>=6)
{

?>	                                 
<div class="pre_div"><a href="<?PHP echo base_url('view-exams')."/".$yr."/".$prevmont?>"><i class="fa fa-arrow-left" aria-hidden="true"></i></a></div>   
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
<div class="next_div"><a href="<?PHP echo base_url('view-exams')."/".$yr."/".$nxtmont?>"><i class="fa fa-arrow-right" aria-hidden="true"></i></a></div> <?PHP
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
        <h4 class="modal-title">View Exam Schedules</h4>
      </div>
      <div class="modal-body" id="view-schedules">
            		
      
      </div><!--modal body ends here -->
      
      
    </div><!--mpdal-content-->

  </div><!--modal-dialog-->
</div> <!--mymodal-->



<!-- edit exam schedule goes here -->


<div id="editExamSchedule" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header backhe">
        <button type="button" class="close back-close" data-dismiss="modal">&times;</button>
      <a class="previousDated" ><i class="fa fa-arrow-left modal-back" aria-hidden="true"></i></a>  <h4 class="modal-title back">Edit exam schedule</h4>
      </div>
      <div class="modal-body">
        
        
        
        <form id="add-exam-form">
        <div class="col-md-12 event_da" style="position:relative">
       
        	 <label>Exam Date  Time</label>
            <div class="col-md-5"> <input type="text" class="form-control cel_date examdate ExamSchedule" id="examdate" placeholder="" />  </div>
            
              <div class="col-md-4" style="position:absolute; left:290px;">
              <input type="hidden" id="ExamSchedueId" />
              <input type="text"  class="form-control timepicker ScheduledTime" id="examscheduletime"/> 
               <span class="err-msg scheduletimeErr"></span> 
              </div>
             
             <div class="clearfix"></div>
             
            </div>
            
            
             <div class="col-md-12 event_da">
		        <label>Select Class</label>
                
                <select class="form-control ClassName" name="ClassName" id="ClassName" >
                                           
                                            
                                            </select>
                                             
              <span class="err-msg classErr"></span>   
              </div>
             
              <div class="col-md-12 event_da">
		        <label>Select Section</label>
                <select class="form-control ClassSection" name="sections" id="sections">
                <option value="0">Select Section</option>
                </select>
                <span class="err-msg sectionErr"></span>
              </div>
              
              <div class="col-md-12 event_da">
		        <label>Select Subject</label>
                <select class="form-control Subjects" name="subject" id="subject">
                <option value="0">Select Subject</option>
                </select>
                
                <span class="err-msg subjectErr"></span>
              </div>
              
              <div class="col-md-12 event_da">
		        <label>Exam Name</label>
               <!-- <input type="text" class="form-control" name="ExamName" id="ExamName" placeholder="Exam Name"  /> -->
               
               <select class="form-control ExamName" name="ExamName" id="ExamName">
                                             
                                            </select>

                
                <span class="err-msg examErr"></span>
              </div>
              
              <div class="col-md-12 event_da">
             <span class="pull-left addexam_resp" style="margin-top:-10px"> </span>
              <button type="button" class="btn btn-danger pull-right updateexamBtn" addedit="edit">Update Exam</button>
              
              </div>
            
       
            
            
        </form>
      </div>
     <!-- <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>-->
    </div>

  </div>
</div>

<!-- edit exam schedule ends  here -->