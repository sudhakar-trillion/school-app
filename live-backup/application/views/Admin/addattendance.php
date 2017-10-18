
<section id="main-content">
  <section class="wrapper " id="disableclick">  
 <div class="row">
				<div class="col-lg-12">
                
                <ol class="breadcrumb">
<!--						<li><i class="fa fa-home"></i> <a href="<?PHP echo base_url('dashboard');?> ">Dashboard </a></li> -->
						<li><i class="fa fa-laptop"></i>Add class</li>						  	
					</ol>
                
                </div>
			</div>

	<div class="row">
  
                  <div class="col-lg-12">
                 
                      <section class="panel">
                         
                          <div class="panel-body">
                          
                          <div class="col-md-4 atte">
                         <!-- <h1>Add Attendance<br /> <span>20th July, Thursday 2017</span></h1>-->
                          
                             <h1>Add Attendance<br /> <span><?PHP echo date('jS F, l Y');	?></span></h1>
                          </div>
                          
                            <div class="col-md-8 text-right">
                            
                           <div class="form-group cla">

  <select class="form-control " name="ClassName" id="ClassName">
    <option value="0">Seclect Class</option>
    <?PHP
	foreach( $classes->result() as $cls)
	{
		?>
			<option value="<?PHP echo $cls->SLNO; ?>" <?PHP if( $SelectedCls== $cls->SLNO) echo 'selected=selected'; ?>> <?PHP echo $cls->ClassName; ?> </option>
		<?PHP	
	}
	
	?>
  
  
  </select>
</div>

 <div class="form-group cla mr1">

  <select class="form-control getstudents"  name="sections" id="sections">
    <option value="0">Seclect Section</option>
    <?PHP
		foreach($sections->result() as $Sects)
		{
			?>
            <option value="<?PHP echo $Sects->SectionId?>" <?PHP if( $SelectedSec== $Sects->SectionId ) echo 'selected=selected'?> > <?PHP echo $Sects->Section;?> </option>
            <?PHP	
		}
	
	?>
  </select>
</div>
                            
                            
                            </div>
                           
                           
                           <div class="clearfix"></div>
                           
            <?PHP
			
			if($studentDetails!='0')
			{
				foreach($studentDetails->result() as $std)
				{
					?>
		                    <div class="col-lg-2 col-md-2 col-sm-6 col-xs-12">
                <div class="card">
                    <div class="body">
                        <div class="member-card verified">
                            
                            <div class="thumb-xl member-thumb" stdid="<?PHP echo $std->StudentId;?> " > 
                               <?PHP
							   if($std->ProfileIPic=='')
							   {
							   ?>
                                <img  src="resources/studentspics/students-profile-icon.jpg" height='100px' class="img-circle" alt="profile-image">
                               <?PHP
							   }
							   else
							   {
							   ?>
                                <img  src="<?PHP echo $std->ProfileIPic?>" height='100px' class="img-circle" alt="profile-image">
                              <?PHP 
							   }
							   ?>
                                <p stdRoll="<?PHP echo $std->StudentId;?>" class="zmdi present_absent stdroll_<?PHP echo $std->StudentId;?>">P</p>
                                
                            </div>

                            <div class="">
                                <h4 class="m-b-5" id="<?PHP echo $std->StudentId;?>"><?PHP echo $std->Student;?></h4>
                                <p class="text-muted">Roll No: <?PHP echo $std->Roll;?> </span></p>
                            </div>
    
                        </div>
                    </div>
                </div>
            </div>
                    <?PHP	
				}
				?>
                
				<div class="text-right">
                <span style="display:inline-block; margin-right:40px;" class="attendance-msg" >
                <div class="" style="margin-left:500px">&nbsp;</div>
                  </span>
                
                
                <button type="button" style="margin-right:15px" class="btn btn-danger SubmitAbsentees" data-dismiss="modal">Submit Absentees</button>    
                
                </div>
                <?PHP
			}
			?>

  
                          </div>
                      </section>
                  </div>
              </div>          
              
              
              
          

<!-- Modal -->
<div id="presentAbsModal"  class="modal fade disableclick" role="dialog" data-backdrop="static">
  <div class="modal-dialog" style="width:410px;">

    <!-- Modal content-->
    <div class="modal-content">
      <!--<div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Modal Header</h4>
      </div>-->
      <div class="modal-body" style="    padding: 24px 15px;    border: 7px solid #ddd; ">
        <p style="margin-bottom:30px; font-size:16px;" class="pre_abs_msg"></p>
        
          <button type="button" class="btn btn-success yesPresent" data-dismiss="modal">Yes</button>
          <button type="button" class="btn btn-danger  cancelPresent pull-right" data-dismiss="modal">Cancel</button>
      </div>
      <div class="clerfix"></div>
    
    </div>

  </div>
</div>
             
             
<div id="absenteeslist"  class="modal fade disableclick" role="dialog" data-backdrop="static">
  <div class="modal-dialog" style="width:410px;">

    <!-- Modal content-->
    <div class="modal-content">
      <!--<div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Modal Header</h4>
      </div>-->
      <div class="modal-body" style="    padding: 24px 15px;    border: 7px solid #ddd; ">
      <!--  <p style="margin-bottom:30px; font-size:16px;" class="absenteelist"></p>-->
      
    <h2 class="confirm-list">Please Confirm Below Absentees List</h2>
        
        <ol class="absenteelist">
        
        <li>Raheem</li>
        <li>Venkat</li>
        
        </ol>
        
          <button type="button" class="btn btn-success yesConfirm" data-dismiss="modal">Confirm</button>
          <button type="button" class="btn btn-danger  cancelConfirm pull-right" data-dismiss="modal">Cancel</button>
      </div>
      <div class="clerfix"></div>
    
    </div>

  </div>
</div>             
              
</section ></section>
      
      
      
      