</section>
  <!-- container section start -->
<script>
var base_url = "<?PHP echo base_url();?>";

var Currentpge = "<?PHP echo $this->uri->segment(1);?>";

var FeeStatis = [];
var Dues 		=  [];


</script>



    <!-- javascripts -->
    <script src="resources/template-assets/js/jquery.js"></script>
	<script src="resources/template-assets/js/jquery-ui-1.10.4.min.js"></script>
    <script src="resources/template-assets/js/jquery-1.8.3.min.js"></script>
    <script type="text/javascript" src="resources/template-assets/js/jquery-ui-1.9.2.custom.min.js"></script>
    <!-- bootstrap -->
    <script src="resources/template-assets/js/bootstrap.min.js"></script>

    <!-- nice scroll -->
    <script src="resources/template-assets/js/jquery.scrollTo.min.js"></script>
    <script src="resources/template-assets/js/jquery.nicescroll.js" type="text/javascript"></script>

   
    <!--custome script for all page-->
    <script src="resources/template-assets/js/scripts.js"></script>
     
    
    <script src="resources/custom-assests/js/scripts.js"></script>
	<script src="resources/custom-assests/js/script-two.js"></script>
	       
       
	<script  src="resources/custom-assests/js/jquery-ui.js"></script>
    <script src="resources/custom-assests/js/jquery.timepicker.js"></script>
	<script src="resources/ckeditor/ckeditor.js"></script>
<?PHP
if( $this->uri->segment(1) =="dashboard")
{
?>    
<script src="resources/highcharts-js/highcharts.js"></script>
<script src="resources/highcharts-js/highcharts-3d.js"></script>
<?PHP
}
?>

<!--<script src="http://code.highcharts.com/modules/exporting.js"></script>-->



 <script>
                $(function() {
					
					$('#examscheduletime').timepicker('setTime', new Date());
                    $('#examscheduletime').timepicker({ 'scrollDefault': 'now' });
                });
            </script>
            
            
<script>

$(document).ready(function()
{



var isaddnotificationtostudent = "<?PHP echo $this->uri->segment(1);?>";

if( isaddnotificationtostudent=='add-notification-to-student' || isaddnotificationtostudent=='edit-notification-to-student' )
{
	
	CKEDITOR.replace( 'Notification', {});
	
	//Dear Parent kinldy pay the school fee for the month of September by using clicking pay here Pay here</a>&nbsp;or you can pay by coming to school
}

/*	
	$("#fee-view").draggable({  handle: ".modal-content" });
							
	$("#add-fee").draggable({ handle: ".modal-dialog" });
	*/
	$("#absenteeslist, #presentAbsModal, #add-fee, #fee-view").draggable({ handle: ".modal-dialog" });
	
	$(".download-bill-excel").on('click',function() 
	{ 
		
		$.ajax({
				url:base_url+'Financialdispatcher/exportbillsexcel',
				success: function(response){
					response = $.trim(response);
					
					if( response =="0" ) 
						return false;					
					else
					{
					
							 location.href=base_url+response;
							 
							/*setTimeout(
											$.ajax({
													url:base_url+"Financialdispatcher/deleteexcelsheet",
													type:'POST',
													data:{"excelname":response}
													})
											
											,2000
									);*/
					}//else ends here
				
				}//success ends here
			});
	
	 });
	
	
	$("#ClassName").focus();
	
	$(".cel_date" ).datepicker();
	
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
	$( ".bookingdate, #homeworkdate" ).datepicker({
									dateFormat:"d-mm-yy",
									 minDate: new Date()
									});	
									

$( "#ActivityDated,.billdate, .FromDate, .todate" ).datepicker({
									dateFormat:"d-mm-yy",
									 //minDate: new Date()
									});	
	
});


	$(document).on('focus','.billdate',function()
	{
		$(this).datepicker({ dateFormat:"d-mm-yy" });	
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

$(document).on('focus','.billpaidto',function()
{
	var parent = $(this).parent().parent();
	
	//var payingfor = $(parent).find("#billfor").val();
//	console.log(payingfor);
	
	
	$(this).autocomplete({ source: base_url+"Requestdispatcher/getvendors" });	
	
});

$(".person").autocomplete({ source: base_url+"Requestdispatcher/getvendorPerson" });	


$(document).on('focus','.billfor',function()
{
	$(this).autocomplete({ source: base_url+"Requestdispatcher/getvendortitles" });	
});


<?PHP
if( $this->uri->segment(1) =="dashboard")
{
?> 

$(document).ready(function () {

/*
	$(document).on('change','#ClassName, #sections',function()
	{
		
		var cls = $("#ClassName").val();
			cls = $.trim(cls);
			
		if( $(this).attr('id')=='ClassName')	
			window.location.href="<?PHP echo base_url('dashboard')?>"+'/'+cls;	
		else
		{
			var secide = $(this).val();
				secide = $.trim(secide);
			window.location.href="<?PHP echo base_url('dashboard')?>"+'/'+cls+'/'+secide;	
		}
		
	});
	
	*/
	

    // Build the chart

/* Highcharts.chart('chartone', {
								
    chart: {
        type: 'pie',
        options3d: {
            enabled: true,
            alpha: 45,
            beta: 0
        }
    },
    title: {
        text: ''
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            depth: 35,
            dataLabels: {
                enabled: true,
                format: '{point.name}'
            }
        }
    },
	credits: {
    		  enabled: false
		  },
    series: [{
        type: 'pie',
        name: 'Browser share',
        data: [
            ['Firefox', 45.0],
            ['IE', 26.8],
            {
                name: 'Chrome',
                y: 12.8,
                sliced: true,
                selected: true
            },
            ['Safari', 8.5],
            ['Opera', 6.2],
            ['Others', 0.7]
        ]
    }]
							}); */

$.ajax({
			url:base_url+"Chartsdispatcher/getTeacherAttendance",
			type:"POST",
			data:{"teacherid":''},
			beforeSend:function() 
								{ 
									graph = $("#chartone").html();
									var dropboxGIF = "<img style='width:80%; margin-left:37px; margin-top:-30px' src='"+base_url+"resources/custom-assests/images/jelly-fluid-loader.gif'/>";
								$("#chartone").html(dropboxGIF);
											},
			success:function(resp)
							{
							resp = $.trim(resp);
							
							var obj = JSON.parse(resp);
							
							
							var result = [];
							
							
							$.each(obj,function(ind,val)
							{
								var month = val.Month;
							//	console.log(month);
								var newarr = {month:val.Attendance};
								result.push(month);
								result.push(val.Attendance);
							});
							
						//chunk the resultant arry into two element and result will be arrays with each two elements
							
							Array.prototype.chunk = function ( n ) 
							{
								if ( !this.length ) 
								{
									return [];
								}
								return [ this.slice( 0, n ) ].concat( this.slice(n).chunk(n) );
							};
							
								
								
								var final_result = result.chunk(2);
								
								console.log(final_result);
								
								setTimeout(function(){ 
								
								Highcharts.chart('chartone', {
												
											
											
											chart: {
											type: 'pie',
											options3d: {
											enabled: true,
											alpha: 55
											}
											},
											
											title: {
											text: ''
											},
											/* subtitle: {
											text: '3D donut in Highcharts'
											},*/
											plotOptions: {
											pie: {
											innerSize: 100,
											depth: 55
											}
											},
											series: [{
														name: 'Attendance Percentage' ,
														data:final_result
													}],
											credits: {
											enabled: false
											},
											
											
											});
												
								}, 3000); //set time out ends here
								
								
								
						}//success function ends here
					
					
					});//ajax ends here
							

});




$(document).ready(function()
{
	
	$.ajax({
			
						url:base_url+'Chartsdispatcher/classattendance',
						type:"POST",
						data:{"Class":'',"Seciton":''},
						beforeSend:function() 
											{ 
												graph = $("#chartone2").html();
												var dropboxGIF = "<img style='width:80%; margin-left:37px; margin-top:-30px' src='"+base_url+"resources/custom-assests/images/jelly-fluid-loader.gif'/>";
												$("#chartone2").html(dropboxGIF);
											},
						success:function(resp)
						{
							resp = $.trim(resp);
							
							var obj = JSON.parse(resp);
							
							
							var result = [];
							
							
							$.each(obj,function(ind,val)
							{
								var month = val.Month;
							//	console.log(month);
								var newarr = {month:val.Attendance};
								result.push(month);
								result.push(val.Attendance);
							});
							
						//chunk the resultant arry into two element and result will be arrays with each two elements
							
							Array.prototype.chunk = function ( n ) 
							{
								if ( !this.length ) 
								{
									return [];
								}
								return [ this.slice( 0, n ) ].concat( this.slice(n).chunk(n) );
							};
							
								
								
								var final_result = result.chunk(2);
								
								console.log(final_result);
								
								setTimeout(function(){ 
													//$("#chartone2").html(graph);
											Highcharts.chart('chartone2', {
												
											
											
											chart: {
											type: 'pie',
											options3d: {
											enabled: true,
											alpha: 55
											}
											},
											
											title: {
											text: ''
											},
											/* subtitle: {
											text: '3D donut in Highcharts'
											},*/
											plotOptions: {
											pie: {
											innerSize: 100,
											depth: 55
											}
											},
											series: [{
											name: 'Attendance Percentage' ,
											data: 
											/*[ ['Jun', 80],
											['Jul', 0],
											['Aug', 98],
											['Sep', 96],
											['Oct', 98],
											['Nov', 94],
											['Dec', 89],
											['Jan', 98],
											['Feb', 99],
											['Mar', 99] ] */
											final_result
											
											
											}],
											credits: {
											enabled: false
											},
											
											
											});
												 }, 3000); //set time out ends here
												 
												 
						}//success function ends here
					
			});
					
	$.ajax({
				url:base_url+'Chartsdispatcher/staffpresentabsent',
				type:"POST",
				async:false,
				beforeSend:function() {},
				success:function(resp)
								{
									resp=$.trim(resp);
									resp = JSON.parse(resp);
									
									$.each(resp,function(ind,val)
									{
										if(ind=="Presents")
											$("#TotalPresents").html(val);
										else if(ind=="Absents")
											$("#TotalAbsents").html(val);
									});
								
								}//success function ends here
					
			});
		
/*	Highcharts.chart('chartone2', {
										
										
    chart: {
        type: 'pie',
        options3d: {
            enabled: true,
            alpha: 55
        }
    },
	
    title: {
        text: ''
    },
    plotOptions: {
        pie: {
            innerSize: 100,
            depth: 55
        }
    },
    series: [{
        name: 'Attendance Percentage' ,
        data: [
            ['Jun', 80],
            ['Jul', 0],
            ['Aug', 98],
            ['Sep', 96],
            ['Oct', 98],
            ['Nov', 94],
            ['Dec', 89],
            ['Jan', 98],
            ['Feb', 99],
			['Mar', 99]
        ]
    }],
	 credits: {
      enabled: false
  },
  
									}); */

});


$(document).ready(function()
{
	
	   var ClassId = $("#ClassName").val();
		ClassId = $.trim(ClassId);
	
		ClassId = parseInt(ClassId);
		
		
		var sectionId = $("#sections").val();
		sectionId = $.trim(sectionId);
	
		sectionId = parseInt(sectionId);	
	    var FeeStatis=[];
		var Dues = [];
		
		
	   $.ajax({
				url:base_url+'MiscellaneousRequestdispatcher/getFeeHastocollect',
				type:"POST",
				data:{"Cls":ClassId,"sectionId":sectionId,"FeeCollected":"Yes"},
				async:true,
				success:function(resp)
				{
					var FeeSta = JSON.parse(resp);
					//FeeStatis  = JSON.stringify(resp);
//					console.log(typeof(FeeStatis)+":"+FeeStatis);
					
					var totalMonths = FeeSta.Dues.length;
						totalMonths = parseInt(totalMonths);
						
						//totalMonths = totalMonths-1;
					
					$.each(FeeSta.Academics, function(ind,val)
					{  
						//console.log(val);
						FeeStatis.push(val);
					});
					
					//console.log(FeeStatis);
					
					$.each(FeeSta.Dues, function(ind,val) {   Dues.push(val); });	
						
						
					console.log(Dues);
					
				Highcharts.chart('chartone3', {
				
				
				title: {
				text: ''
				},
				yAxis: { min: 0, max: FeeSta.MonthlyFee,
				title: 
				{
				enabled: true,
				text:'Fee has to collect'
				}
				},
				
				subtitle: {
				text: ''
				},
				
				xAxis: {
				categories: FeeStatis
				},
				credits: {
				enabled: false
				},
				series: [{
				type: 'column',
				colorByPoint: true,
				name:'Fees',
				data: Dues,
				showInLegend: false
				}]
				
				});

}//success ends here
				
				
				
				
				
			});//ajax of getting the feestats ends here
			

		
	   var ClassId = $(".ClassName").val();
		ClassId = $.trim(ClassId);
	
		ClassId = parseInt(ClassId);
		
		
		var sectionId = $(".sections").val();
		sectionId = $.trim(sectionId);
	
		sectionId = parseInt(sectionId);	
		
		var collection=[];
		
		
		$.ajax({
				url:base_url+'MiscellaneousRequestdispatcher/getFeeHastocollect',
				type:"POST",
				data:{"Cls":ClassId,"sectionId":sectionId,"FeeCollected":"Yes"},
				async:true,
				success:function(resp)
				{
					var FeeStas = JSON.parse(resp);
					//FeeStatis  = JSON.stringify(resp);
//					console.log(typeof(FeeStatis)+":"+FeeStatis);
					
					var totalMonths = FeeStas.Dues.length;
						totalMonths = parseInt(totalMonths);
						
						//totalMonths = totalMonths-1;
					
					$.each(FeeStas.Academics, function(ind,val)
					{  
						//console.log(val);
						FeeStatis.push(val);
					});
					
					//console.log(FeeStatis);
					
					$.each(FeeStas.collected, function(ind,val) {   collection.push(val); });	
					
					
					console.log(collection);
					
					
				Highcharts.chart('chartone4', {
				
				
				title: {
				text: ''
				},
				yAxis: { min: 0, max: FeeStas.MonthlyFee,
				title: 
				{
				enabled: true,
				text:'Collected Fee'
				}
				},
				
				subtitle: {
				text: ''
				},
				
				xAxis: {
				categories: FeeStatis
				},
				credits: {
				enabled: false
				},
				series: [{
				type: 'column',
				colorByPoint: true,
				name:'Fees',
				data: collection,
				showInLegend: false
				}]
				
				});

}//success ends here
				
				
				
				
				
			});//ajax of getting the feestats ends here
	   
	   
   

});



<?PHP
}
?>

</script>

<script src="resources/datepicker/moment.min.js"></script>
<script src="resources/datepicker/daterangepicker.js"></script>



  </body>
</html>
