
<section id="main-content">
  <section class="wrapper">  
 <div class="row">
				<div class="col-lg-12">
                
                <ol class="breadcrumb">
					<li><i class="fa fa-home"></i> <a href="<?PHP echo base_url('dashboard');?> ">Dashboard</a></li>
                    <li><i class="fa fa-plus"></i> <a href="<?PHP echo base_url('add-homework-to-student');?> ">Add home work</a></li>
                    <li>View homeworks</li>
					</ol>
                
                </div>
			</div>

	<div class="row">
  
                  <div class="col-lg-12">
                 	
                    
                    
                    
                      <section class="panel">
                         
                          <header class="panel-heading">
                              View students
                          </header>
                         
                        
                         
                         
                          
                          
                          <table class="table table-striped table-advance table-hover">
                           <tbody>
                           <tr>
                                <th>SLNO</th>

                                 <th><i class="icon_profile"></i> Class</th>
                                 <th><i class="icon_profile"></i> Section</th>
                                 <th><i class="icon_profile"></i> Student</th>
                                 <th><i class="icon_profile"></i>Date</th>
                                 <th><i class="icon_profile"></i>Homework</th>
                                 <th><i class="icon_profile"></i>Status</th>
                                 
                                  <th><i class="icon_cogs"></i> Actions</th>
                              </tr>

                           <tbody>
                           
                           <?PHP
						   if($homeworks!='0')
						   {
							   $slno=0;
								if($this->uri->segment(2)) { $slno = ($this->uri->segment(2)-1)*$perpage;	}
							   foreach($homeworks->result() as $works)
							   {
								   $slno++;
									?>
                                    <tr>
                                    	<td> <?PHP echo $slno; ?> </td>
                                        <td> <?PHP echo $works->ClassName?></td>
                                        <td> <?PHP echo $works->Section?></td>
                                        
                                         <td> <?PHP echo $works->Student?></td>
                                        <td> <?PHP echo $works->HomeWorkOn?></td>
                                        <td> <?PHP echo $works->HomeWork?></td>
                                        
                                         <td> <?PHP echo $works->Status?></td>
                                        <td> <a href="<?PHP echo base_url('edit-home-work')."/".$works->HomeworkId?>" class="btn btn-primary">Edit</a> </td>
                                    </tr>
                                    <?PHP   
							   }
							   ?>
                               <tr>
                                	<td colspan="8"><?PHP echo $pagination_string; ?></td>
                                </tr>
                               <?PHP
							   
						   }
						   else
						   {
								?>
								<tr>
                                	<td colspan="8">No data found </td>
                                </tr>
								<?PHP   
						   }
						   
						   
						   ?>
                           </tbody>
                           
                        </table>
                          
                          
                      </section>
                  </div>
              </div>          
              
</section          
      ></section>