</section>
  <!-- container section start -->
<script>
var base_url = "<?PHP echo base_url();?>";

// /home3/vsksamsu/public_html/school-app/resources/studentspics/2017-2018
</script>
  
    
    
    
    <!-- Grab Google CDN's jQuery, fall back to local if offline -->
<!--	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>-->

  	<!--<script>window.jQuery || document.write('<script src="resources/custom-assests/js/libs/jquery-1.7.1.min.js"><\/script>')</script>-->
        
	  <!-- FancyBox -->
      <!--
		<script src="resources/custom-assests/js/fancybox/jquery.fancybox.js"></script>
		<script src="resources/custom-assests/js/fancybox/jquery.fancybox-buttons.js"></script>
		<script src="resources/custom-assests/js/fancybox/jquery.fancybox-thumbs.js"></script>
        <script src="resources/custom-assests/js/fancybox/jquery.easing-1.3.pack.js"></script>
		<script src="resources/custom-assests/js/fancybox/jquery.mousewheel-3.0.6.pack.js"></script>
        
 <script type="text/javascript">
	var jq = $.noConflict();
			jq(document).ready(function() {
			jq(".fancybox").fancybox();
			});
		</script>
        --?
        
          <!-- javascripts -->
    <script src="resources/template-assets/js/jquery.js"></script>
	<script src="resources/template-assets/js/jquery-ui-1.10.4.min.js"></script>
    <script src="resources/template-assets/js/jquery-1.8.3.min.js"></script>

  <script src="resources/dist/js/lightbox-plus-jquery.min.js"></script>   

    <script type="text/javascript" src="resources/template-assets/js/jquery-ui-1.9.2.custom.min.js"></script>

    <!-- bootstrap -->
    <script src="resources/template-assets/js/bootstrap.min.js"></script>
    
    <!-- nice scroll -->
    <script src="resources/template-assets/js/jquery.scrollTo.min.js"></script>
    <script src="resources/template-assets/js/jquery.nicescroll.js" type="text/javascript"></script>
    
   
    <!--custome script for all page-->
    <script src="resources/template-assets/js/scripts.js"></script>
    
    <script src="resources/custom-assests/js/scripts.js"></script>
	<script  src="resources/custom-assests/js/jquery-ui.js"></script>
    
 
<script>
$(document).ready(function()
{
	$("#ClassName").focus();
	
	$( "#bookingdate" ).datepicker({
										/*
										disable sat and sunday
										beforeShowDay: $.datepicker.noWeekends,
										*/
										
										/*
										disable sat and sunday
										beforeShowDay: function(date) 
										{
											var day = date.getDay();
											console.log(day);
											return [( day != 0 &&  day != 6  ), ''];
										},
										*/
										dateFormat:"d-mm-yy",
										maxDate: new Date()
									});
	$( ".bookingdate" ).datepicker({
									dateFormat:"d-mm-yy",
									 minDate: new Date()
									});	
	
});

$(function()
{

$(".Origin").autocomplete({
		 source: base_url+"Requestdispatcher/getorigins",
		// type:'POST'
	});	

$("#status").autocomplete({
		 source: base_url+"Requestdispatcher/getallstatus",
		// type:'POST'
	});	

$(".docketno").autocomplete({
		 source: base_url+"Requestdispatcher/getdocketnos",
		// type:'POST'
	});	
	
	
});



$(document).on('click','.view-trasp',function() { 

	
	
	$.ajax({
				url:base_url+"Parentrequestdispatcher/gettransportation",
				success:function(resp) { 
											
											var data = ' <tr> <th>Vehicle No</th>  <th>Driver Name</th> <th>Driver Phone No</th>  <th>Route</th>  </tr>';
											
											//resp = parse.JSON(resp);
											resp = JSON.parse(resp);
											if(resp.wrongstudent == "no") 
											{
												$("#transportdetails").modal('show');
												data = data+'<tr> <td>'+resp.VechileNumber+'</td><td>'+resp.StaffName+'</td><td>'+resp.ContactNumber+'</td><td>'+resp.Routes+'</td></tr>';		
												$(".viewroute").html(data);
											}
//											$("#transportdetails").modal('show');
										 }
			
		
			});
		
		
	
	
	
	
	
	
  });


</script>

  
  



  </body>
</html>
