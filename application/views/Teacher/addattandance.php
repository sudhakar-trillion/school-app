
<section id="main-content">
  <section class="wrapper">  
 <div class="row">
				<div class="col-lg-12">
                
                <ol class="breadcrumb">
<!--						<li><i class="fa fa-home"></i> <a href="<?PHP echo base_url('dashboard');?> ">Dashboard </a></li> -->
						<li><i class="fa fa-laptop"></i>Manage Teacher Attandance</li>						  	
					</ol>
                
                </div>
			</div>
            
            
        
        <div class="row">
        
            <div class="col-lg-12">
            
                <section class="panel">
                
                    <header class="panel-heading"> Manage Attandance  </header>
                    
                    <span class="btn btn-warning allpresent pull-right">All Are Present</span>
                    
                    <div class="panel-body">
                    
                    <table class="table table-striped table-advance table-hover">
                           <thead>
                           <tr>
                                <th>SLNO</th>
                                 <th><i class="icon_profile"></i> Teacher</th>
                                 <th><i class="icon_profile"></i> Class</th>
                                 <th><i class="icon_profile"></i> Section</th>
                                 <th><i class="icon_profile"></i> Contact</th>
                                  <th><i class="icon_cogs"></i> Present/Absent</th>
                              </tr>

                           </thead>
                           
                           <tbody>
                       				<?PHP
									
										if( $teachers!='0')
										{
											$slno=0;
											foreach( $teachers->result() as $details)
											{
												$slno++;
											?>
                                                <tr class="teachersinfo" >
                                                    <td><?PHP echo $slno?> </td>
                                                    <td class="teacherenrollids" id="<?PHP echo $details->TeacherIde?>"><?PHP echo ucwords(strtolower($details->TeacherName)); ?></td>
                                                    <td><?PHP echo $details->ClassName?> </td>
                                                    <td><?PHP echo $details->Section ?></td>
                                                    <td> <?PHP echo trim(trim($details->ContactNumber),','); ?></td>
                                                    <td>
                                                        <div class="form-group">
                                                        
                                                        <div class="col-sm-7 col-md-7">
                                                        <div class="input-group">
                                                        <div id="radioBtn" class="btn-group" Teacherid="<?PHP echo $details->TeacherIde?>" >
                                                        <a class="btn btn-primary btn-sm present" data-toggle="happy" data-title="Y">YES</a>
                                                        <a class="btn btn-primary btn-sm absent" data-toggle="happy" data-title="N">NO</a>
                                                        </div>
                                                        <input type="hidden" name="happy" id="happy" value="N">
                                                        </div>
                                                        </div>
                                                        </div>
                                                    
                                                    </td>
                                                </tr>
                                            <?PHP
											}
											
										}
										else
										{
											?>
                                            <tr>
                                            	<td colspan="2"></td>
                                                <td colspan="4">No Data Available</td>
                                            </tr>
                                            <?PHP	
										}
									?>
                       
                                  
                        
                           </tbody>
                        </table>
                    
                    </div>
              </section>
          </div>
        </div>
              
</section>
</section>
      
      
      
      