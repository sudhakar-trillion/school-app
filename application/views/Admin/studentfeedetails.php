
<section id="main-content">
  <section class="wrapper">  
 <div class="row">
				<div class="col-lg-12">
                
                <ol class="breadcrumb">
					<li><i class="fa fa-home"></i> <a href="<?PHP echo base_url('dashboard');?> ">dashboard</a></li>

                    <li>view fee structure</li>
                    
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
                        
                             <h1>Add or View Fee<br> <span style="margin-right:122px;">
                             
							<?PHP 
                            
                            echo date('F, ');
                            
                            $currentMnth = date('n');
                            
                            if( $currentMnth>5 && $currentMnth<=12 )
                            {
                            $prevyr = date('Y');
                            $nextyr = date('Y')+1;
                            
                            $academicYr = 	$prevyr."-".$nextyr;
                            }
                            else
                            {
                            $prevyr = date('Y')-1;
                            $nextyr = date('Y');
                            
                            $academicYr = 	$prevyr."-".$nextyr;
                            }
                            
							echo $academicYr;
                            
							if($SelMonth!='0')
							{
								$date = date_parse($SelMonth);
  								$mnth= 	$date['month'];
							}
							else
								$mnth= 	date('m');
							
							
							if( $this->session->userdata('Class_Fee')!='' )
								$ClassName = $this->session->userdata('Class_Fee');
							else
								$ClassName ='0';
				
							if($this->session->userdata('Section_Fee')!='')
								$secid = $this->session->userdata('Section_Fee');
							else
								$secid = '0';
							
								
							
                            ?>
                             
                             </span>
                             
                            
                             </h1>
                             
                             
                          </div>
                          
							<div class="col-md-8 text-right">
                            <form method="post"  action="">
                            <div class="form-group cla" >
                                    
                                    <select class="form-control  fe" name="Month" id="Month" >
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
                                    </div>
                            
                                    <div class="form-group cla" >
                                    
                                    <select class="form-control  fe" name="ClassName" id="ClassName" >
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

                                    <div class="form-group cla ">
                                    
                                    <select class="form-control fe" name="sections" id="sections" >
                                    <option value="0">Select Section</option>
                                   <?PHP
								   	if( isset($SelectedClassSections))
									{
										foreach($SelectedClassSections->result() as $sects)
										{
											?>
                                            <option value="<?PHP echo $sects->SectionId?>" <?PHP if( $secid == $sects->SectionId) echo 'selected=selected';  ?> > <?PHP echo $sects->Section?> </option>
                                            <?PHP	
										}
									}
								   ?>
                                    </select>
                                    </div>

                                <div class="form-group cla mr1">
                                
                                <select class="form-control fe"  name="Rollno" id="Rollno">
		                        <option value="0">Select Student</option>
                                
                                <?PHP
										if( isset($SelectedStd))
										{
											foreach( $SelectedStd->result() as $std)
											{
												?>
                                                <option value="<?PHP echo $std->StudentId ?>" <?PHP if( $Student == $std->StudentId) echo 'selected=selected'; ?>> <?PHP echo $std->Student; ?> </option>
                                                <?PHP	
											}
										}
											
								?>

                                </select>
                                </div>
                                <div class="form-group cla mr1">
                                 <input class="btn btn-primary" type="submit" value="Filter" name="GetFee" >
                                </div>
                            </form>
               
</div>

    						 <div class="clearfix"></div>                       
                            </div>
                            
							<div class="col-md-12">

<table class="table-striped table addfee">
                            
                            <tr>
                            <th>Slno</th>
                           
                            <th>Roll No</th>
                             <th>Student Name</th>
                            <th>Class</th>
                            <th>Section</th>
                            <th>Month</th>
                            <th>Year</th>
                            <th>Paid?</th>
                             <th>Actual Pay</th>
                            <th>Paid Amount</th>
                            <th>Due</th>
                            <th>Action</th>
                         <!--   <th>Pay Now</th>-->
                          
                            </tr>
                            <?PHP
								$slno=0;
								if($this->uri->segment(2)) { $slno = ($this->uri->segment(2)-1)*$perpage;	}
							
								foreach( $Students->result() as $std)
								{
									$paid=0;
									$topay =0;
									$ActualFee=0;
									
									
									$slno++;
									$cond = array();
									$table = 'newclass';
									
									$cond['SLNO'] = $std->ClassName;
									
									
									$ClassName = $this->Commonmodel->getAfield($table,$cond,$field='ClassName',$order_by='',$order_by_field='',$limit='');
									
									
									$cond = array();
									$table = 'sections';
									
									$cond['SectionId'] = $std->ClassSection;
									$cond['ClassSlno'] = $std->ClassName;
								
									
									$Section = $this->Commonmodel->getAfield($table,$cond,$field='Section',$order_by='',$order_by_field='',$limit='');
									
									?>
                                    <tr >
                                    <td><?PHP echo $slno; ?> </td>
                                    <td class="Stdroll"><?PHP echo $std->Roll?></td>
                                    <td class="Student" style="text-align:left"><?PHP echo $std->Student?></td>
                                    <td class="ClassName" style="text-align:left"><?PHP echo $ClassName?></td>
                                    <td class="Section"><?PHP echo strtoupper($Section); ?></td>
                                    <td class="MonthName">
										<?PHP 
												if( $SelMonth!='0' )
												{ 
													echo $SelMonth;
												} 
												else
												echo date('F');
										 ?>
                                    </td>
                                    <td><?PHP echo $academicYr; ?></td>
                                    <td>
                                    <?PHP
										//get the monthly fee for the class
										
										$cond = array();
										
										$cond['Class'] = $std->ClassName;
										$cond['AcademicYear'] = $academicYr;
										$table ='schoolfee';
										
										$MonthlyFee = $this->Commonmodel->getAfield($table,$cond,$field='MonthlyFee',$order_by='',$order_by_field='',$limit='');
										//check whether the student has paid this current month fee or not
										
										
										$cond = array();
										$table ='feecollection';
										
										$cond['StudentId'] = $std->StudentId;
										
										if( $SelMonth!='0' )
										{
											$date = date_parse($SelMonth);
  											$cond['month(Month)']= 	$date['month'];
										}
										else
											$cond['month(Month)']= 	date('m');

											$cond['AcademicYear'] = $academicYr;
											
										if($ClassId!='0')	
											$cond['ClassId']= $ClassId;
										if($SectionId!='0')
											$cond['SectionId'] = $SectionId;
										if($StudentId!='0')
											$cond['StudentId'] = $StudentId;	
										
											
											
										if( $this->Commonmodel->checkexists($table,$cond))
											{
												echo "Yes";
												
												$qry = $this->Commonmodel->getRows_fields($table,$cond,$fields='ActualFee, sum(Paid) as Paid',$order_by='DESC',$order_by_field='FeeCollectionId',$limit);
												foreach($qry->result() as $data)
												{
													$paid=$data->Paid;
													$topay = ($data->ActualFee)-($paid);
													
												}
												
											}
										else
										{
											$paid='0';
											echo "No";
										}
									?>
                                    
                                    </td>
                                    <td> <?PHP echo $MonthlyFee;?> </td>
                                    <td><?PHP echo $paid;?></td>
                                    <td class="Due"><?PHP echo $MonthlyFee-$paid; ?></td>
                                    <td>
                                    <a style="cursor:pointer" class="viewnow"  data-toggle="modal" data-target="#fee-view" viewid="<?PHP echo $std->StudentId?>">View/Pay</a> 
                                   	<?PHP
                                    if( ($MonthlyFee-$paid)>0)
									{
									?>
		                                <a style="cursor:pointer" class="SENDSMS" >SMS</a> 
        		                     <?PHP
									}
									?>
                                    </td>
                                    </tr>        
                                    <?PHP	
								}
							?>
                            <tr>
                            	<td colspan="12" style="text-align:left"> <?PHP echo $pagination_string; ?></td>
                            </tr>
                            
                            
                            
                            
                            </table>
    
<div class="clearfix"></div>
                            
</div>
	
    
     
                             
  <div id="fee-view"  class="modal fade disableclick" role="dialog" >
  <div class="modal-dialog" style="width:950px;">

    <!-- Modal content-->
    <div class="modal-content" style="cursor:move">
      <!--<div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Modal Header</h4>
      </div>-->
      <div class="modal-body" style="    padding: 24px 15px;    border: 7px solid #ddd; ">
      <!--  <p style="margin-bottom:30px; font-size:16px;" class="absenteelist"></p>-->
      
    <h2 class="confirm-list">Fee payment history</h2>
        
      
        <table class="table-striped table addfee">
                            
                            <tr>
                            <th>S.No</th>
                            <th>Roll</th>
                            <th>Name</th>
                            <th>Class</th>
                            <th>Section</th>
                            <th>Month</th>
                            <th>Year</th>
                            <th>Paid</th>
                            <th>Fee</th>
                            <th>Due</th>
                            <th>Pay Now </th>
                          
                            </tr>
                           
                           <tbody class="feedetails_std">
                           
                           </tbody>
                           
                            <!-- <tr>
                            
                            <td>1.</td>
                            <td>002</td>
                            <td>10th Class</td>
                             <td>A</td>
                            <td>June</td>
                            
                            <td>2017</td>
                            <td>20, 000</td>
                            <td>10, 000</td>
                      		  <td><button type="button" class="btn btn-success  cancelConfirm  " data-dismiss="modal" style="margin-right:15px;">Pay Now</button></td>

                            </tr>-->
                            
                            
                            
                            </table>
      
      <div class="text-right">
      
          
         
     
          <button type="button" class="btn btn-danger  cancelConfirm closepayview" data-dismiss="modal">Cancel</button>
          
          </div>
          
           <div class="clearfix"></div>
    
      </div>
      <div class="clearfix"></div>
    
    </div>

  </div>
</div>
                             
                             

<div id="add-fee"  class="modal fade disableclick" role="dialog"  >
  <div class="modal-dialog" style="width:600px;">

    <!-- Modal content-->
    <div class="modal-content" style="cursor:move">
      <!--<div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Modal Header</h4>
      </div>-->
      <div class="modal-body" style="    padding: 24px 15px;    border: 7px solid #ddd; ">
      <!--  <p style="margin-bottom:30px; font-size:16px;" class="absenteelist"></p>-->
      
    <h2 class="confirm-list mdl-header ">
  <!--  <button type="submit" class="btn btn-success" title='Go back'><i class="fa fa-backward" aria-hidden="true"></i></button>-->
 <span class="text-warning">  Pay the Fee/due amount for <span id="Fee_Month" class="text-success" ></span> Month</span>
    </h2>
        
        
        
        
        <form class="feepay">
  <div class="form-group">
    <label for="email" class="col-md-3"><strong>Student Name</strong>:</label>
   <span class="Student_Name"></span>
  </div>
  
  <div class="form-group">
    <label for="pwd" class="col-md-3"><strong>Class</strong></label>
     <span class="Student_Class"></span>
  </div>
  
  <div class="form-group">
    <label for="pwd" class="col-md-3"><strong>Section</strong></label>
     <span class="Student_Section"></span>
  </div>
  
  <div class="form-group">
    <label for="pwd" class="col-md-3"><strong>Roll number</strong></label>
    <span class="Student_Roll"></span>
  </div>
  
  <div class="form-group">
    <label for="pwd" class="col-md-3"><strong>Paying Month</strong></label>
     <span class="Fee_Month"></span>
  </div>
  
  <div class="form-group">
    <label for="pwd" class="col-md-3"><strong>Due Amount</strong></label>
     <span class="Fee_Due"></span>
  </div>
  
  <div class="form-group DueAmntsection" style="margin-bottom:20px;">
    <label for="pwd" class="col-md-3"><strong>Enter Amount </strong></label>
    <input type="text" class="form-control col-md-9" style="width:75%;" name="DueAmnt" id="DueAmnt" autofocus placeholder="Pay due amount " />
    <span class="DueAmnt_Err"></span>
     <div class="clearfix"></div>
  </div>
  <div class="clearfix"></div>
  
 
</form>
         <span class="Fee-Payment-Msg"> </span>
         <button type="submit" class="btn btn-success backtoview" title='Go back'><i class="fa fa-backward" aria-hidden="true"></i></button>
         <button type="button" class="btn btn-default" id="paymonthfee" >Pay Now</button>
        
         
               <button type="button" class="btn btn-danger  cancelFeePayment pull-right" data-dismiss="modal">Cancel</button>
               
               <div class="clearfix"></div>
               
      </div>
      
    </div>

  </div>
</div>
                             
                             
                             
                             
                             
                             
                             
                             
                             
                             
                             
                          </div>
                      </section>
                  </div>
              </div>          
              
</section          
      ></section>