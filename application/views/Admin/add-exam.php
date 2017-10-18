
<section id="main-content">
  <section class="wrapper">  
 <div class="row">
				<div class="col-lg-12">
                
                <ol class="breadcrumb">
<!--						<li><i class="fa fa-home"></i> <a href="<?PHP echo base_url('dashboard');?> ">Dashboard </a></li> -->
						<li><i class="fa fa-laptop"></i>Add an exam</li>						  	
					</ol>
                
                </div>
			</div>

	<div class="row">
  
                  <div class="col-lg-12">
                 
                      <section class="panel">
                          <header class="panel-heading">
                             Add an exam
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
										  	echo $this->calendar->generate();
										else
											echo  $this->calendar->generate( date('Y'), date('m')+$cnt);	
									}
									else
									{ 
										$yr = $this->uri->segment(2);
										
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
													echo  $this->calendar->generate( $yr, $startmonth+$cnt);	
											 }
											else
											{
												echo  $this->calendar->generate( $yr, $startmonth+$cnt);
											}
										}
										else
										{
												if($this->uri->segment(3)<6)
												{
													$prevmont = 5;
												 	$nxtmont =9;
												 	echo  $this->calendar->generate( $yr, 3+$i);		
												}
												else
												{
												 	$prevmont = 12;
												 	$nxtmont = 16;
												 	echo  $this->calendar->generate( $yr, 14+$cnt);		
												}
												 	
										}
										
									
									  
									}
								   ?>
                                  </div>
<?PHP
if( $prevmont>=6)
{

?>	                                 
<div class="pre_div"><a href="<?PHP echo base_url('add-celebration')."/".$yr."/".$prevmont?>"><i class="fa fa-arrow-left" aria-hidden="true"></i></a></div>   
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
<div class="next_div"><a href="<?PHP echo base_url('add-celebration')."/".$yr."/".$nxtmont?>"><i class="fa fa-arrow-right" aria-hidden="true"></i></a></div> <?PHP
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
      <div class="modal-header" style="background:#09F; color:#fff">
        <button type="button" class="close" data-dismiss="modal" style="color:#F00">&times;</button>
        <h4 class="modal-title">Schedule An Exam</h4>
      </div>
      <div class="modal-body exam-schedule-body" style="background:rgba(255, 193, 7, 0.11);">
      
   
        <form id="add-exam-form">
        <div class="col-md-12 event_da" style="position:relative">
       
        	 <label>Exam Date  Time</label>
            <div class="col-md-5"> <input type="text" class="form-control cel_date examdate" id="examdate" placeholder="" readonly="readonly"/>  </div>
            
              <div class="col-md-4" style="position:absolute; left:290px;">
              <input type="text"  class="form-control timepicker" id="examscheduletime"/> 
               <span class="err-msg scheduletimeErr"></span> 
              </div>
             
             <div class="clearfix"></div>
             
            </div>
            
            
             <div class="col-md-12 event_da">
		        <label>Select Class</label>
                
                <select class="form-control ClassName" name="ClassName" id="ClassName">
                                            <?PHP
												
												$class_cnt=0;
												foreach( $classes->result() as $clas)
												{
													if( $class_cnt == 0 )
													{
														?>
                                                        <option value="0">Select Class</option>
                                                        <option value="<?PHP echo $clas->SLNO?>"><?PHP echo ucwords($clas->ClassName); ?> </option>
                                                        <?PHP	
													}
													else
														{
															?>
                                                             <option value="<?PHP echo $clas->SLNO?>"><?PHP echo ucwords($clas->ClassName); ?> </option>
                                                            <?PHP
														}
													$class_cnt++;
													
												}
											?>
                                            
                                            </select>
                                             
              <span class="err-msg classErr"></span>   
              </div>
             
              <div class="col-md-12 event_da">
		        <label>Select Section</label>
                <select class="form-control" name="sections" id="sections">
                <option value="0">Select Section</option>
                </select>
                <span class="err-msg sectionErr"></span>
              </div>
              
              <div class="col-md-12 event_da">
		        <label>Select Subject</label>
                <select class="form-control" name="subject" id="subject">
                <option value="0">Select Subject</option>
                </select>
                
                <span class="err-msg subjectErr"></span>
              </div>
              
              <div class="col-md-12 event_da">
		        <label>Exam Name</label>
               <!-- <input type="text" class="form-control" name="ExamName" id="ExamName" placeholder="Exam Name"  /> -->
               
               <select class="form-control ExamName" name="ExamName" id="ExamName">
                                            <?PHP
												
												$ExamName_cnt=0;
												foreach( $whichexam->result() as $xam)
												{
													if( $ExamName_cnt == 0 )
													{
														?>
                                                        <option value="0">Select Exam</option>
                                                        <option value="<?PHP echo $xam->ExamId?>"><?PHP echo ucwords($xam->Exam); ?> </option>
                                                        <?PHP	
													}
													else
														{
															?>
                                                             <option value="<?PHP echo $xam->ExamId?>"><?PHP echo ucwords($xam->Exam); ?></option>
                                                            <?PHP
														}
													$ExamName_cnt++;
													
												}
											?>
                                            
                                            </select>

                
                <span class="err-msg examErr"></span>
              </div>
              
              <div class="col-md-12 event_da">
             <span class="pull-left addexam_resp"> </span>
              <button type="button" class="btn btn-danger pull-right addexamBtn" addedit="add">Add Exam</button>
              
              </div>
            
       
            
            
        </form>
        <div class="clearfix"></div>
      </div>
      
      
    </div>

  </div>
</div>