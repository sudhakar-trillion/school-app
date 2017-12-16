
<section id="main-content">
  <section class="wrapper">  
 <div class="row">
				<div class="col-lg-12">
                
                <ol class="breadcrumb">
						<li><i class="fa fa-home"></i> <a href="<?PHP echo base_url('dashboard');?> ">Dashboard </a></li> 
						<li>Add an hoiday</li>
					</ol>
                
                </div>
			</div>

	<div class="row">
  
                  <div class="col-lg-12">
                 
                      <section class="panel">
                          <header class="panel-heading">
                             Add an holiday
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
										
										if( $this->uri->segment(3)>=3 && $this->uri->segment(3)<=15 )
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
												# $yr.":".$startmonth; exit; 
												$startmonth=3;
											 	if($cnt<=1)
													echo  $this->calendar->generate( $yr, $startmonth+$cnt);	
												
											 }
											else
											{
												 if($this->uri->segment(3)>12 && $this->uri->segment(3)<15 )
												 {
													 $yr = $yr;
													 $startmonth=1;
												 }
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
			 else
			  $yr = ($this->uri->segment(2));
		 
	}
else
	$yr = date('Y');
	


 
if( $prevmont>=3)
{

?>	                                 
<div class="pre_div"><a href="<?PHP echo base_url('add-holiday')."/".$yr."/".$prevmont?>"><i class="fa fa-arrow-left" aria-hidden="true"></i></a></div>   
<?PHP
}
else
{
	$yr = date('Y')-1;
	$prevmont = 12;
?>
<!--<div class="pre_div"><a ><i class="fa fa-arrow-left" aria-hidden="true" style="background:#eee"></i></a></div>   -->
<div class="pre_div"><a href="<?PHP echo base_url('add-holiday')."/".$yr."/".$prevmont?>"><i class="fa fa-arrow-left" aria-hidden="true"></i></a></div>   

<?PHP	
}
?>
<?PHP
if( $this->uri->segment(3)>=10 && $this->uri->segment(3)<15)
 	$yr = $this->uri->segment(2)+1;
elseif( date('m')==1 || ( date('m')>3 && date('m')<=12 )  )	
	$yr =$this->uri->segment(2);
	  
#echo $yr; exit; 
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
	<div class="next_div"><a href="<?PHP echo base_url('add-holiday')."/".($yr-1)."/".($nxtmont-1)?>"><i class="fa fa-arrow-right" aria-hidden="true"></i></a></div> <?PHP
		}
}
	else
	{
?>
<div class="next_div"><a href="<?PHP echo base_url('add-holiday')."/".$yr."/".$nxtmont?>"><i class="fa fa-arrow-right" aria-hidden="true"></i></a></div> <?PHP
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
        <h4 class="modal-title">Add Holiday</h4>
      </div>
      <div class="modal-body">
      
   
        <form id="add-celebrationform">
        <div class="col-md-12 event_da">
        <label>Holiday On</label>
        	<input type="text" class="form-control cel_date"  placeholder="" readonly="readonly"/>
             
            </div>
            
             <div class="col-md-12 event_da">
        <label>Occasion</label>
        	
            <textarea class="form-control celebration"></textarea>
            <span class="err-msg"></span>
            </div>
            
              <div class="col-md-12 event_da">
             <span class="pull-left addceleb_resp"> </span>
              <button type="button" class="btn btn-primary pull-right addholidaybtn" addedit="add">Add Holiday</button>
              
              </div>
            
       
            
            
        </form>
        <div class="clearfix"></div>
      </div>
      
      
    </div>

  </div>
</div>