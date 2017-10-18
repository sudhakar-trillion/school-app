
<section id="main-content">
          <section class="wrapper">            
              <!--overview start-->
			  <div class="row">
				<div class="col-lg-12">
					
					<ol class="breadcrumb">
						
						<li><i class="fa fa-laptop"></i>Page not found</li>						  	
					</ol>
				</div>
			</div>
              
            <div class="row">
				<div class="page-404">
    <p class="text-404">404</p>

    <h2>Sorry</h2>
    <?PHP
	if(@$routeto=='')
	{
		$routeto='view-assign-teachers';
	}
	?>
    <p style="font-size:26px">Data not found on this request</p>
    <p><a class="btn btn-danger" href="<?PHP echo base_url($routeto)?>">Return back</a></p>
  </div>
			</div><!--/.row-->
		
			
             
            
		  
          

          </section>
          
          
      </section>