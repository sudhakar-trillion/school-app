
<section id="main-content">
  <section class="wrapper">  
 <div class="row">
				<div class="col-lg-12">
                
                 <ol class="breadcrumb">
                	<li><i class="fa fa-home"></i> <a href="<?PHP echo base_url('dashboard');?> ">Dashboard </a></li>
					<li><i class="fa fa-plus"></i> <a href="<?PHP echo base_url('add-bill');?> ">Add Bills</a></li>
                    <li><i class="fa fa-eye"></i> <a href="<?PHP echo base_url('view-bills');?> ">view Bills</a></li>
                    <li> Edit-bill</li>
					</ol>
                
                </div>
			</div>

	<div class="row">
  
                  <div class="col-lg-12">
                 
                      <section class="panel">
                          <header class="panel-heading">
                             Edit bill
                          </header>
                          <div class="panel-body">
                          <?PHP
						  	
							foreach($billdetails->result() as $bill)
							{
								$BillFor = $bill->BillFor;
								$AmountToPay = $bill->BillAmount;
								
								$billdate = date_create($bill->BillDate);
								$billdate = date_format($billdate,"d-m-Y");
								$billpaidto = $bill->PaidTo;
							}
						  
						  
						  ?>
                          
                           <form class="form-validate form-horizontal " id="billsForm" method="post" action="">
                            
                              <div class="form col-lg-11" id="billsection">
                            	
                              
                                      
                               <div class="form-group initial_bill">
                               	
                                <div class="col-lg-2"> 
                                	<input  class=" form-control billfor" id="billfor" name="billfor" type="text"  value="<?PHP echo $BillFor; ?>" /> 
                                    <span class='err-msg'></span>
                                </div>
                                          
                                <div class="col-lg-2"> 
								  <input  class=" form-control AmountToPay" id="AmountToPay" name="AmountToPay" type="text" value="<?PHP echo $AmountToPay ?>" />
								  <span class='err-msg'></span>
                                 </div>
                                 
                                 <div class="col-lg-2"> 
                                 	<input  class=" form-control billdate" name="billdate" type="text" placeholder="Bill date" value="<?PHP echo $billdate; ?>" />
                                    <input type="hidden" name="billid" id="billid" value="<?PHP echo $this->uri->segment(2) ?>" />
	                                 <span class='err-msg'></span>
                                 </div>
                                 
                                 <div class="col-lg-2"> 
                                 	
                                     <input  class=" form-control billpaidto" name="billpaidto" type="text" placeholder="Bill paying to" value="<?PHP echo $billpaidto;?>" /> 
                                    
                                    <!--<select class=" form-control billpaidto" name="billpaidto" >
                                    
                                    <option value="o">Select Vendor </option>
                                    <?PHP
										foreach($vendors->result() as $vendor)
										{
											?>
                                            <option value="<?PHP echo $vendor->VendorId?>"><?PHP echo $vendor->CompanyName?></option>
                                            <?PHP	
										}
									
									?>
                                    	
                                    </select>-->
                                    
	                                 <span class='err-msg'></span>
                                 </div>
                                          
                                        <!--  <div class="col-lg-3 addmorebills" style="padding:6px"> <span class=""> + </span> </div>-->
                               
                                <div class="clearfix"></div>
                                </div>
                                
                                
                                <div class="form-group">
                               	
                                <div class="col-lg-5"> 
                                	<input  type="button" name="Addbill" id="Addbill" add_edit="edit" class="btn btn-primary" value="Update bill" /> 
                                    
                                    <span class='billrespMsg'></span>
                                </div>
                                
                                </div>
                                
                                
                                
                                
                                   <div class="clearfix"></div>
                                  
                              </div>
                              
                              </form>     
                          </div>
                      </section>
                  </div>
              </div>          
              
</section          
      ></section>