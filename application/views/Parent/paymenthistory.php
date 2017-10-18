
<section id="main-content">
  <section class="wrapper">  
 <div class="row">
				<div class="col-lg-12">
                
                <ol class="breadcrumb">
					<li><i class="fa fa-home"></i> <a href="<?PHP echo base_url('parent-dashboard');?> ">Dashboard</a></li>
                    <li><i class="fa fa-rupee"></i> <a href="<?PHP echo base_url('parent/pay-fee');?> ">Add payment</a></li>
					<li><i ></i>View payment History</li>
					</ol>
                
                </div>
			</div>

	<div class="row">
  
                  <div class="col-lg-12">
                 	
                    
                    <?PHP echo $this->session->flashdata('PaymentMessage'); ?>
                    
                      <section class="panel">
                         
                          <header class="panel-heading">
                              View Fee Payment History
                          </header>
                        
                        
                          <table class="table table-striped table-advance table-hover">
                           <tbody>
                           <tr>
                                <th>SLNO</th>
                                <th><i class=""></i> Month</th>
                                <th><i class=""></i> AcademicYear</th>

                                <th><i class=""></i> ActualFee </th>
                                <th><i class=""></i> Paid </th>
                                <th><i class=""></i> Due </th>

                                <th><i class=""></i> PaidOn </th>
                                <th><i class=""></i> CardNo </th>
                                <th><i class=""></i> TransactionId </th>
                                <th><i class=""></i> Actions</th>
                              </tr>

                           <tbody>
                           		<?PHP
								
								if( $details!='0')
								{
									
									$slno=0;
								
									
									foreach( $details as $history )
									{
										$slno++;
										?>
                                        <tr>
                                        	<td><?PHP echo $slno; ?></td>
                                            <td><?PHP echo $history['Month']?></td>
                                            <td><?PHP echo $history['AcademicYear'] ?></td>
                                            
                                            <td><?PHP echo $history['MonthlyFee']?></td>
                                            <td><?PHP echo $history['PaidAmount']?></td>
                                            <td><?PHP echo $history['DueAmount']?></td>
                                            
                                            <td><?PHP echo $history['PaidOn']?></td>
                                            <td><?PHP echo $history['CardNo']?></td>
                                            <td><?PHP echo $history['TransactionId']?></td>
                                            
                                            <td>
                                            <?PHP 
												if( $history['DueAmount']>0 )
												{
											?>
										<a style="cursor:pointer" stdnt="<?PHP echo $history['StudentId']?>" mnth="<?PHP echo $history['mnth']?>" class="btn btn-success btn-sm payStdntfee">Pay Now</a>
                                    <?PHP
										}
										else
										{
										?>
  								<a style="cursor:pointer" stdnt="<?PHP echo $history['StudentId']?>" class="btn btn-success btn-sm ">Paid</a>
                                        <?PHP	
										}
										if( $history['DueAmount']<$history['MonthlyFee'])
										{
										?>
                                        <a class="btn btn-warning transaction_details" stdnt="<?PHP echo $history['StudentId']?>" mnth="<?PHP echo $history['mnth']?>" data-toggle="modal" data-target="#TransactionView"> View Details</a>
                                        <?PHP
										}
										?>
                                        
                                            </td>
                                        </tr>
                                        <?PHP	
									}
								}
								
								
								?>                            
                            
						   </tbody>
                        </table>
                          
                          
                      </section>
                  </div>
              </div>          



<!-- -->

<div id="homework_comment_Popup" class="modal fade" role="dialog">
  <div class="modal-dialog">
<form id="Homework-form">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Write Your Comments</h4>
      </div>
      <div class="modal-body">
       
       <div class="col-md-12">
       
       <input type="hidden" id="HomeworkId" />
       
        <label>Home Work Comments</label>
      <textarea class="form-control" id="homeworkcomments"></textarea>
          <span class="homeworkcomments-err text-danger"></span>   
            </div>
            
            <div class="col-md-12" style="margin-top:10px">
        		<label>Chage Status</label>
      			<select name="status" id="homework-status" class="form-control">
                <option value="0">Change Home Work Status</option>
                <option value="Completed">Completed</option>
                </select>
             <span class="homework-status-err text-danger"></span>   
            </div>
       
       
      </div>
      <div class="modal-footer">
      <span class="homework_submisstion_resp"></span>
        <button type="button" class="btn btn-success submit_homework">Submit</button>
      </div>
    </div>
</form>
  </div>
</div>
<!-- -->


              
</section>

</section>
      
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

<!-- Transaction details popup starts here -->

<div id="TransactionView" class="modal fade" role="dialog">
  <div class="modal-dialog" style="width:950px;">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Transaction History</h4>
      </div>
      <div class="modal-body">
       
       <table class="table-striped table addfee">
                            
                            <tr>
                            <th>S.No</th>
                            <th>Month</th>
                            <th>Academic</th>
                            <th>ActualFee</th>
                            <th>Paid</th>
                            <th>Due</th>
                            <th>PaidOn</th>
                            <th>CardNo</th>
                            <th>TransactionId</th>
                          
                            </tr>
                           
                           <tbody class="feeTransactionDetails">
                           
                           </tbody>
                            
                            </table>
       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<!-- -->