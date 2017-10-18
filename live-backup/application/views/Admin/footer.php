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

if(isaddnotificationtostudent=='add-notification-to-student')
{
	
	CKEDITOR.replace( 'Notification', {});
	
	//Dear Parent kinldy pay the school fee for the month of September by using clicking pay here Pay here</a>&nbsp;or you can pay by coming to school
}
	
	$("#fee-view").draggable({  handle: ".modal-content" });
							
	$("#add-fee").draggable({ handle: ".modal-dialog" });
	
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
	
	
	

    // Build the chart

Highcharts.chart('chartone', {
								
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
							});

});




$(document).ready(function()
{
		
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
        name: 'Delivered amount',
        data: [
            ['Class-I', 8],
            ['Class-II', 3],
            ['Class-III', 1],
            ['Class-IV', 6],
            ['Class-V', 8],
            ['Class-VI', 4],
            ['Class-VII', 4],
            ['Class-VIII', 1],
            ['Class-IX', 1]
        ]
    }],
	 credits: {
      enabled: false
  },
  
									});

});


$(document).ready(function()
{
	var Month = $("#Month").val();
		Month = $.trim(Month);
		
		Month = parseInt(Month);
	<?PHP if($this->uri->segment(2)=='')
	{
		?>
	var ClassId = $("#ClassName").val();
		ClassId = $.trim(ClassId);
	
		ClassId = parseInt(ClassId);
		
		
	<?PHP
	}
	else
	{
		?>
		var ClassId = "<?PHP echo $this->uri->segment(2); ?>";
		ClassId = $.trim(ClassId);
	
		ClassId = parseInt(ClassId);
		
	//	$("#ClassName option[value='" + ClassId + "']").attr("selected", "true");
		 
		$.ajax({
						url:base_url+"Requestdispatcher/getsections",
						type:'POST',
						data:{"ClassSLNO":ClassId},
						sendBefore:function(){  },
						success:function(resp)
						{
							resp = $.trim(resp);
							
							if(resp!='0')
							{
								resp = JSON.parse(resp);
													
								if( typeof(resp) == 'object' )	
								{
									var section_options='<option value=0>Select Section</option>';
									
									$.each(resp,function(index,val)
									{
										section_options=section_options+'<option value="'+index+'">'+val+'</option>';
										console.log(section_options);
									});
									
									$("#sections").html(section_options);
									
									var sectionId = "<?PHP echo $this->uri->segment(3); ?>";
										sectionId  = $.trim(sectionId);
										
									if(sectionId!='' && sectionId!='0')
										$("#sections option[value='"+sectionId+"']").attr("selected", "true");
								}
								else
								{
									console.log('no');
								}
							}
						}
						
						
					});
	
		<?PHP	
	}
	
	if( $this->uri->segment(3)=='')
	{
		?>
		var sectionId = $("#sections").val();
		sectionId = $.trim(sectionId);
	
		sectionId = parseInt(sectionId);	
		
		<?PHP	
	}
	else
	{
	?>
	var sectionId ="<?PHP echo $this->uri->segment(3); ?>";
		sectionId = $.trim(sectionId);
	
		sectionId = parseInt(sectionId);

		$("#sections option[value='"+sectionId+"']").attr("selected", "true");
	<?PHP	
	
	}
	?>
	

		$.ajax({
				url:base_url+'MiscellaneousRequestdispatcher/getfeestats',
				type:"POST",
				data:{"Cls":ClassId,"sectionId":sectionId},
				async:true,
				success:function(resp)
				{
					var FeeSta = JSON.parse(resp);
					//FeeStatis  = JSON.stringify(resp);
//					console.log(typeof(FeeStatis)+":"+FeeStatis);
					
					var totalMonths = FeeSta.Dues.length;
						totalMonths = parseInt(totalMonths);
						
						totalMonths = totalMonths-1;
					
					$.each(FeeSta.Academics, function(ind,val)
					{  
						//console.log(val);
						FeeStatis.push(val);
					});
					
					
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
	
	
});



<?PHP
}
?>

</script>



  </body>
</html>
