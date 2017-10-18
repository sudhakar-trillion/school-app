
<section id="main-content">
  <section class="wrapper">  
 <div class="row">
				<div class="col-lg-12">
                
                <ol class="breadcrumb">

<li><i class="fa fa-home"></i> <a href="<?PHP echo base_url('dashboard');?> ">Dashboard </a></li> 
                        <li><i class="fa fa-plus"></i> <a href="<?PHP echo base_url('add-subjects');?> ">Add subjects</a></li>
						<li><i class="fa fa-desktop"></i><a href="<?PHP echo base_url('view-subjects')?>"> View subjects </a></li>
                        <li> Edit subject</li>

					</ol>
                
                </div>
			</div>

	<div class="row">
  
                  <div class="col-lg-12">
                 
                      <section class="panel">
                          <header class="panel-heading">
                             Edit Subject
                          </header>
                          <div class="panel-body">

                              <div class="form col-lg-9">
                                  <form class="form-validate form-horizontal " id="add_student_form" method="post" action="">
                                      
                                   
                                   <div class="form-group moresubjects"> <label for="Subject" class="control-label col-lg-4">Subject:<span class="required"></span></label> <div class="col-lg-6"> 
                                   <input class="form-control Subjects" name="Subject" id="Subject" placeholder="Subject" value="<?PHP echo $subject?>" />
                                   <input type="hidden" name="SubjectId" id="SubjectId" value="<?PHP echo $SubjectId?>" />
                                    </div>  </div>   
                                      
                                      <div class="form-group">
                                          <div class="col-lg-offset-4 col-lg-8">
                                             
                                             <input type="button" class="btn btn-primary " edit_add='add' name="editsubject" id="editsubject" value="Update subject" />
                                             <span style="margin-left:20px" class="update-student-resp" ></span>
                                           
                                          </div>
                                      </div>
                                  </form>
                              </div>
                          </div>
                      </section>
                  </div>
              </div>          
              
</section          
      ></section>