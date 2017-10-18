
<section id="main-content">
  <section class="wrapper">  
 <div class="row">
				<div class="col-lg-12">
                
                <ol class="breadcrumb">
					<li><i class="fa fa-home"></i> <a href="<?PHP echo base_url('add-teacher');?> ">Add Teacher</a></li>
					<li><i class="fa fa-laptop"></i><a href="<?PHP echo base_url('view-teachers');?> "> View teachers </a></li>
					</ol>
                
                </div>
			</div>

	<div class="row">
  
                  <div class="col-lg-12">
                 
                      <section class="panel">
                          <header class="panel-heading">
                             Edit teacher
                          </header>
                          <div class="panel-body">
                             <?PHP echo @$this->session->flashdata('teacheredited'); ?>
                               <?PHP echo @$this->session->flashdata('failedtoeditTeacher'); ?>
                              <div class="form col-lg-9">
                              
                              <?PHP
                              		if( $this->input->post('teacherdetails'))
									{
										
									}else
									{
										foreach( $teacherdetails->result() as $teacher)
										{
											$TeacherName = $teacher->TeacherName;
										}
									}
                              ?>
                              
                              
                                  <form class="form-validate form-horizontal " id="register_form" method="post" action="">
                                      
                                      <div class="form-group ">
                                          <label for="TeacherName" class="control-label col-lg-4">Teacher name<span class="required">*</span></label>
                                          <div class="col-lg-6">
<input  class=" form-control" id="TeacherName" name="TeacherName" type="text" value="<?PHP echo $TeacherName;?>"  />
                                          </div>
                                           <div class="col-lg-2 err-msg"><span><?PHP echo form_error('TeacherName')?></span> </div>
                                      </div>
                                      
                                      <div class="form-group">
                                          <div class="col-lg-offset-4 col-lg-8">
                                             
                                             <input type="submit" class="btn btn-primary " name="editTeacher" />
                                           
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