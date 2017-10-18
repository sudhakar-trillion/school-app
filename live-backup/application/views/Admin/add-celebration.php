
<section id="main-content">
  <section class="wrapper">  
 <div class="row">
				<div class="col-lg-12">
                
                <ol class="breadcrumb">
<!--						<li><i class="fa fa-home"></i> <a href="<?PHP echo base_url('dashboard');?> ">Dashboard </a></li> -->
						<li><i class="fa fa-laptop"></i>Add a celebration</li>						  	
					</ol>
                
                </div>
			</div>

	<div class="row">
  
                  <div class="col-lg-12">
                 
                      <section class="panel">
                          <header class="panel-heading">
                             Add a celebration
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
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add a celebration</h4>
      </div>
      <div class="modal-body">
      
   
        <form id="add-celebrationform">
        <div class="col-md-12 event_da">
        <label>Celebration Date</label>
        	<input type="text" class="form-control cel_date"  placeholder="" readonly="readonly"/>
             
            </div>
            
             <div class="col-md-12 event_da">
        <label>Celebration</label>
        	
            <textarea class="form-control celebration"></textarea>
            <span class="err-msg"></span>
            </div>
            
              <div class="col-md-12 event_da">
             <span class="pull-left addceleb_resp"> </span>
              <button type="button" class="btn btn-primary pull-right celebrationbtn" addedit="add">Add celebration</button>
              
              </div>
            
       
            
            
        </form>
        <div class="clearfix"></div>
      </div>
      
      
    </div>

  </div>
</div>