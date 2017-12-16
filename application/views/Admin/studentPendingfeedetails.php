
<section id="main-content">
  <section class="wrapper">  
 <div class="row">
				<div class="col-lg-12">
                
                <ol class="breadcrumb">
					<li><i class="fa fa-home"></i> <a href="<?PHP echo base_url('dashboard');?> ">dashboard</a></li>

                    <li>view pending fee structure</li>
                    
                   <?PHP if( $this->session->userdata('StudentNaam')!='' ) { ?><li class="pull-right"> <span class="clearfilter" id="Student_Fee" style="cursor:pointer"> <?PHP echo $this->session->userdata('StudentNaam'); ?> </span></li> <?PHP } ?>
                   
                    <?PHP if( $this->session->userdata('SectionNaam')!='' ) { ?><li class="pull-right"> <span class="clearfilter" id="Section_Fee" style="cursor:pointer"> <?PHP echo $this->session->userdata('SectionNaam'); ?> </span></li> <?PHP } ?>
                   
                     <?PHP if( $this->session->userdata('Classnaam')!='' ) { ?><li class="pull-right"> <span class="clearfilter" id="Class_Fee" style="cursor:pointer"> <?PHP echo $this->session->userdata('Classnaam'); ?> </span></li> <?PHP } ?>
                    
					</ol>
                 
                </div>
			</div>

	<div class="row">
  
                  <div class="col-lg-12">
                 
                      <section class="panel">
                        <!--  <header class="panel-heading">
                            View/ Add fee structure
                          </header>-->
                          
                        
                            
                            <div  class="form col-lg-12 padd"> 
                            
                            
                            <div class="col-md-4 atte">
                         <!-- <h1>Add Attendance<br /> <span>20th July, Thursday 2017</span></h1>-->
                        
                             <h1>Pending Fee Details<br> <span style="margin-right:122px;">
                             
						
                             </span>
                             
                            
                             </h1>
                             
                             
                          </div>
                          
							                    
                            </div>
                            
							<div class="col-md-12">

<table class="table-striped table addfee">
                            
                            <tr>
                            <th>Slno</th>
                            <th>Month</th>
                             <th>Actual Fee</th>
                            <th>Fee Paid</th>
                            <th>Fee Due</th>
                            <th>Action</th>
                         <!--   <th>Pay Now</th>-->
                          
                            </tr>
                            <?PHP
							$slno=0;
								foreach($pendingFeedetails as $details)
								{
									$slno++;
									
							?>
                            <tr>
                            	<td><?PHP echo $slno; ?></td>
                                <td ><?PHP echo $details['Month']?></td>
                                 <td><?PHP echo $details['ActualFee']?></td>
                                  <td><?PHP echo $details['TotalFeeCollected']!=''? $details['TotalFeeCollected']:'0'; ?></td>
                                   <td><?PHP echo $details['PendingFeeMonth']?></td>
                                    <td><a style="cursor:pointer" id="<?PHP echo $details['MonthNumber']; ?>" class="viewpendingFee" >View</a></td>
                            </tr>
                            <?PHP
								if(  $details['Month'] == date('F'))
								break;
								}
								?>
                            
                            
                            
                            </table>
    
<div class="clearfix"></div>
                            
</div>
	
    
     
                          </div>
                      </section>
                  </div>
              </div>          
              
</section          
      ></section>