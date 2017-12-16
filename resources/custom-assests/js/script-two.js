$(window).load(function()
{
	
	 if(Currentpge=="view-staff-attendance")
	  {
		 
		 var totalpresents = $(".text-default").length;
		 var totalabsents = $(".text-danger").length;
		 
		 $("#TotalAbsents").html("  "+totalabsents);
		  $("#TotalPresents").html("  "+totalpresents);
	  }
	  
	  $.ajax({
				url:base_url+"Chartsdispatcher/getStudentAttOfDay",
				type:"POST",
				data:{"class":'',"Section":''},
				success:function(resp)
				{
					resp=$.trim(resp);
					
					resp = JSON.parse(resp);
					
					//alert(resp.Absents+","+resp.Presents);
					
					$("#StudentTotalPresents").html(resp.Presents);
					$("#StudentTotalAbsents").html(resp.Absents);
				}
				
					   
			   });	
		
});


$(document).on('click','.clearfilter',function()
{
	
	var ide = $(this).attr('id');
	
	var splt = ide.split("_");
	
	var which = splt[0];
	
	if(confirm("Do you want to clear "+which+" 	filter") )
	{
		$.ajax({
				url:base_url+'Teacherrequestdispatcher/clearfilters',
				type:"POST",
				data:{"which":which},
				success:function(resp)
				{
					resp = $.trim(resp);
					//if(resp=="1")
					//location.href=base_url+"view-marks";
				} //success function ends here
			
			});//ajax ends here
	}//confirmation ends hre
});


//deleteMark starts here

$(".deleteMark").on('click',function()
{
	
	if( confirm( "Do you want to delete "))
	{
		var ide = $(this).attr('id');
		var rowide = $(".Marklisting_"+ide);
		
		
		$.ajax({
				url:base_url+'Teacherrequestdispatcher/deletemark',
				type:"POST",
				data:{"AllocatedId":ide},
				success:function(resp)
				{
					resp = $.trim(resp);
					
					if(resp=="1")
					{
						rowide.remove();
						
						totalrows = $(".listing").length;
						totalrows = parseInt(totalrows);
						
						if(totalrows==0)
						{
							var uriseg = $("#uriseg").val();
								uriseg = parseInt(uriseg);
								
								if(uriseg=='')
								{
									location.href=base_url+"view-marks/";
								}
								else
								{
									uriseg = (uriseg)-1;
									location.href=base_url+"view-marks/"+uriseg;	
								}
							
						}
						else
						{
							var listing = $(".listing").length;
							
							listing	=	parseInt(listing);
							
							if(listing>1)
							{
							
								var uriseg = $("#uriseg").val();
									uriseg = parseInt(uriseg);
									
									if(uriseg=='')
										location.href=base_url+"view-marks/";
									else
										location.href=base_url+"view-marks/"+uriseg;	
							}
							else
							{
									var uriseg = $("#uriseg").val();
									uriseg = parseInt(uriseg);
									
									if(uriseg=='')
										location.href=base_url+"view-marks/";
									else
									{
										uriseg = (uriseg)-1;
										location.href=base_url+"view-marks/"+uriseg;	
									}
							}
							
						}
						
						
					}
				}
				
				
				});
	}
});

//deleteMark ends here



   $(document).on('click','#allocatemarks_btn',function()
   {
	   
	   var Err_cnt = '0';
	   var Onclick = $(this);
	   
	   
		var ClassName = $("#ClassName").val();
			ClassName = $.trim(ClassName);
			ClassName = parseInt(ClassName);
			
		if(ClassName>0)
			$(".ClassName_err").html('');	
		else
		{
			Err_cnt="1";
			$(".ClassName_err").html('Select Class');	
			
			$('html, body').animate({ scrollTop: $(".breadcrumb").offset().top	}, 1200);
		
		}
	
	   var sections = $("#sections").val();
	   		sections = $.trim(sections);		
			sections = parseInt(sections);
	
	if(sections>0)
		$(".section_err").html('');
	else
	{
		Err_cnt='1';
		$(".section_err").html('Select Section');
		$('html, body').animate({ scrollTop: $(".breadcrumb").offset().top	}, 1200);
	}
	   
		
	 var Rollno = $("#Rollno").val();
	 	Rollno= $.trim(Rollno);
		Rollno = parseInt(Rollno);
		
		if(Rollno>0)
			$(".Roll_err").html('');
		else
		{
			Err_cnt='1';
			$(".Roll_err").html('Select Student');	
		}
	   
	  
	  var TeacherName = $("#TeacherName").val();
	  	TeacherName  = $.trim(TeacherName);
		TeacherName=parseInt(TeacherName);
		
		if(TeacherName>0)
			$(".TeacherName_err").html('');
		else
		{
			Err_cnt='1';
			$(".TeacherName_err").html('Select Teacher');	
		}
	   
	  
	   var Subject = $("#Subject").val();
	   	Subject = $.trim(Subject);
		Subject = parseInt(Subject);
		
		if(Subject>0)
			$(".Subject_err").html('');	
		else
		{
			Err_cnt='1';
			$(".Subject_err").html('Seelct Subject');	
		}
		
		
		
		var Exam = $("#Exam").val();
			Exam = $.trim(Exam);
			Exam = parseInt(Exam);
			
			if(Exam>0)
				$(".Exam_err").html('');	
			else
				{
					Err_cnt='1';
					
					$(".Exam_err").html('Select Exam');	
				}

		
				
			var TotalMarks = $("#TotalMarks").val();
				TotalMarks = $.trim(TotalMarks);
				TotalMarks= parseInt(TotalMarks);
				
				if(TotalMarks>0)
					$(".TotalMarks_err").html('');	
				else
				{
					Err_cnt='1';
					$(".TotalMarks_err").html('Enter Total Marks');	
				}
			
				
			var SecuredMarks = $("#SecuredMarks").val();
				SecuredMarks = $.trim(SecuredMarks);
				
				SecuredMarks = parseInt(SecuredMarks);
				
				if(SecuredMarks>0)
				{
					if(SecuredMarks>TotalMarks)
					{
						$(".SecuredMarks_err").html('Secured marks should be lessthan Total marks');	
					Err_cnt='1';
					}
				}
				else
				{
					$(".SecuredMarks_err").html('Enter Secured marks');	
					Err_cnt='1';
				}
				
			var senddata = {"ClassName":ClassName,"section":sections,"Rollno":Rollno,"TeacherName":TeacherName,"Subject":Subject,"Exam":Exam,"TotalMarks":TotalMarks,"SecuredMarks":SecuredMarks};
				
				if( Err_cnt=="0" )
				{
					$.ajax({
								url:base_url+'Teacher/addmarks',
								type:"POST",
								data:senddata,
								beforeSend:function(){  Onclick.val('Allocating Marks......'); Onclick.prop('disabled',true); },
								success:function(resp)
								{
									Onclick.prop('disabled',false);
									Onclick.val('Allocate Marks'); 
									
									resp = $.trim(resp);
									if(resp=="1")
									{
										$(".allocate-marks-resp").html("<span class='alert alert-success'>Marks Allocated Successfully</span>");	
										//$("form#assign_teacher_form")[0].reset();
									}
									else if(resp=="-1")
										$(".allocate-marks-resp").html("<span class='alert alert-warning'>Marks Already allocated</span>");	
									else if(resp=="-2")
										$(".allocate-marks-resp").html("<span class='alert alert-warning'>This exam is not yet conducted</span>");	
									else if(resp=="0")
										$(".allocate-marks-resp").html("<span class='alert alert-danger'>Unable to allocate marks</span>");	
									else if(resp=="-3")
										$(".allocate-marks-resp").html("<span class='alert alert-danger'>Please select correct exam</span>");	
									
								} //success function ends here
						});
					
				}
	   
   });
   
   $(document).on('click','a.attendance-cls',function()
   {
		var ClassName = $(this).attr('id');
			ClassSLNO = $.trim(ClassName);
		var Onclick = $(this);
			$.ajax({
						url:base_url+"Requestdispatcher/getsections",
						type:'POST',
						data:{"ClassSLNO":ClassSLNO},
						async:false,
						sendBefore:function(){  },
						
						success:function(resp)
						{
							resp = $.trim(resp);
							
							if(resp!='0')
							{
								resp = JSON.parse(resp);
													
								if( typeof(resp) == 'object' )	
								{
									//var section_options='<li><a class=" cursor-pointer attendance-s waves-effect waves-block">Select Seciton</a></li> ';
									var section_options='';
									
									$(".attendance-cls").removeClass('Selected-Class');
									Onclick.addClass('Selected-Class');
									
									$(".SelectedCls").html( $(".Selected-Class").html() );
									
									$(".selSec").html("Section");
									
									$.each(resp,function(index,val)
									{
					section_options=section_options+'<li><a id="'+index+'" class=" cursor-pointer attendance-s waves-effect waves-block class-section" classSection="section" ">Section-'+val+'</a></li> ';
										console.log(section_options);
									});
									
									$(".section-for-class").html(section_options);
								}
								else
								{
									console.log('no');
								}
							}
						}//success function ends here
						
						
					});//ajax ends here
					
					
					
					$.ajax({
								url:base_url+"Chartsdispatcher/getStudentAttOfDay",
								type:"POST",
								data:{"class":ClassSLNO,"Section":''},
								success:function(resp)
								{
									resp=$.trim(resp);
									resp = JSON.parse(resp);
									$("#StudentTotalPresents").html(resp.Presents);
									$("#StudentTotalAbsents").html(resp.Absents);
								}
					   
			   				});	
					

		
   });
   
   
   //getting the  graph info for the class and section starts here
   $(document).on('click',".attendance-cls,.class-section",function()
   {
	  if(Currentpge=="dashboard")
	  {
	
		
	  	 
	  console.log('hey');
	   
	   var Err_cnt='0';
	   var Onclick = $(this);
	   var graph = '';
	   
	  
		
		$(".class-section").removeClass('SelectedSection');
		Onclick.addClass('SelectedSection');
	   
	   if( $(this).attr('classSection')=="section")
	   {
	    $(".selSec").html(Onclick.html());
	   	var SelectedSection = $(this).attr('id');
		   	SelectedSection = $.trim(SelectedSection);
		if(SelectedSection=="0" || SelectedSection =="")
		{
			Err_cnt='1';
				$(".section-for-class").html("Select Section").css({'color':'red'});	
		}
		else
			Err_cnt='0';	
			
	   }
	   else
	   	var SelectedSection ='0';
		
		
		var SelectedClass = $(".Selected-Class").attr('id');
		   	SelectedClass = $.trim(SelectedClass);
	
		if(SelectedClass=="0" || SelectedClass=="")
		{
				Err_cnt='1';
				$(".SelectedCls").html("Select Class").css({'color':'red'});	
		}
		else
			Err_cnt='0';
		
		
		
		if(Err_cnt=="0")
		{
			$.ajax({
						url:base_url+'Chartsdispatcher/classattendance',
						type:"POST",
						data:{"Class":SelectedClass,"Seciton":SelectedSection},
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
							
							console.log(resp);
							
							if(resp!='0')
							{
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
									
									//console.log(final_result);
									
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
							}
							else
								$("#chartone2").html("Data Not Available");
												 
						}//success function ends here
					});
					
					
					$.ajax({
								url:base_url+"Chartsdispatcher/getStudentAttOfDay",
								type:"POST",
								data:{"class":SelectedClass,"Section":SelectedSection>0?SelectedSection:''},
								success:function(resp)
								{
									resp=$.trim(resp);
									resp = JSON.parse(resp);
									$("#StudentTotalPresents").html(resp.Presents);
									$("#StudentTotalAbsents").html(resp.Absents);
								}
					   
			   				});	
					
				
		}
	   
	   //get the total student present and absents today.
	   
	   
	   
	   
	   
	   
	   
   
	  }
	  
   }); // getting the student attendance graph info for the class and section ends here
   
   
   ///getting the teacher attendance graph info for the academic year
   
   $(document).on('click','.attendance-teacher',function()
   {
	 
		 var ide = $(this).attr('id');
			ide = $.trim(ide);
			ide = parseInt(ide);
			
			if(ide>0)
			{
				var selectedTeacher = $(this).html();
					selectedTeacher = $.trim(selectedTeacher);
					$(".selTeacher").html(selectedTeacher);
				
				var teacherid = ide;
				
				$.ajax({
						url:base_url+"Chartsdispatcher/getTeacherAttendance",
						type:"POST",
						data:{"teacherid":teacherid},
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
        name: 'Attendance Percentage',
        data: final_result /*[
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
        ]*/
		
    }]
							});
											
												 }, 3000); //set time out ends here
								
								
								
						}//success function ends here
					
					
					});//ajax ends here
			}
			else
			{
				$(".selTeacher").html("Select Teacher");
			}
			
	  
   });
   
   //fee has to collect
   $(document).on('change','#ClassName,#sections',function()
   {
	    if(Currentpge=="dashboard")
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
				data:{"Cls":ClassId,"sectionId":sectionId},
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
	   
	   
   
		}
   });
   
   
   //fee collected
    $(document).on('change','#ClassNaam,#sects',function()
   {
	  	   var ClassId = $("#ClassNaam").val();
		ClassId = $.trim(ClassId);
	
		ClassId = parseInt(ClassId);
		
		
		var sectionId = $("#sects").val();
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
   
   
   $(document).on('click','.birthday-cls',function()
   {
	  
	  var clsid = $(this).attr('id');
	  var clsname = $(this).html();
	  
	  $(".selected-bday-cls").html(clsname+" ");
	  
	  $.ajax({
		  		url:base_url+"Requestdispatcher/getBirthdays",
				type:"POST",
				data:{"clsid":clsid},
				success:function(resp)
	  						{	
								$("#birthdayListing").html(resp);
							} //success function ends here

		  	}); //ajax ends here
		
	  
	   
   });
   //get birthdays ends here
   
   
   ///get notification starts here
   
   $(document).on('click','.notification-by',function()
   {
	  var bywhom = $(this).attr('id');
	  	  bywhom = $.trim(bywhom);
	
	  var bywho = $(this).html();
	  		bywho = $.trim(bywho);
			
			
			$(".noti-by").html("Notifications "+bywho)	  ;
			
		  if( bywhom == "Admin" ||	bywhom == "Parent" )
		  {
			  
			  $.ajax({
				  		
						url:base_url+"Requestdispatcher/getNotifications",
						type:"POST",
						data:{"Bywhom":bywhom},
						success:function(resp)
						{
							resp= $.trim(resp);
							
							$(".notify-body").html(resp);
						}
				  
				  });
		  }
   });
   
   //get notification ends here
   
   
   //get the students of the class and section
   
   $(".absentees-section").on('change',function()
   {
		var Section	=	$(this).val();
			Section	=	$.trim(Section);
			Section =	parseInt(Section);
			
		var ClassName	=	$("#ClassName").val();
			ClassName	=	$.trim(ClassName);
			ClassName	=	parseInt(ClassName);
			
		if(Section>0 && ClassName>0)		
		{
			$.ajax({
						url:base_url+'Managesms/getstudents',
						type:"POST",
						data:{"ClassName":ClassName,"Section":Section},
						success:function(resp)
						{
							resp = $.trim(resp);
							var stds = "<option value=0>Select Students</option>";
							if(resp!='0')
							{
								resp = JSON.parse(resp);
								var students = resp.std_details;
								
								if(resp.Nodata == "No")
								{
									var cnt=0;
									$.each(students,function(ind,val)
									{
										cnt=parseInt(cnt);
										stds=stds+"<option value='"+val.StudentId+"'>"+val.Student+" "+val.LastName +"</option>";
										cnt=(cnt)+1;	
									});//each ends here	
								}
								
								
							}
							
							$("#students").html(stds);
							if(cnt<10)
								$("#students").css({"height":"auto"});
							else
								$("#students").css({"height":"200px"});
								
						}
					
					
					});	
		}
   });
   
   
   
   ///AbsentSMS_btn starts here
   
   $("#AbsentSMS_btn, #ActivitySMS_btn, #BulkSMS_btn").on("click",function()
   {
	   
	   var err_cnt = '0';
	   var Onclick = $(this);
		var SMSTYPE		=	$(this).attr("name");	   
		
		if(SMSTYPE == "BulkSMS_btn")
		{
			
			var bulksmscontent = $("#bulksmscontent").val();
				bulksmscontent = $.trim(bulksmscontent);
				
			if(bulksmscontent=="")
			{
				err_cnt='1';	
				$(".bulksmscontent_err").html("Enter Bulk SMS Content");
			}
			else
				$(".bulksmscontent_err").html("");
			
			SMSTYPE = 'BulkSMS';
			
			var senddata ={"SMSTYPE":SMSTYPE,"bulksmscontent":bulksmscontent};	
		}
		else
		{
	   
			var ClassName	=	$("#ClassName").val();
				ClassName	=	$.trim(ClassName);
				ClassName	=	parseInt(ClassName);
			
			var sections	=	$("#sections").val();
				sections	=	$.trim(sections);
				sections	=	parseInt(sections);
			
		
		
		
		if(ClassName>0)	
			$(".ClassName_err").html("");
		else
		{
			err_cnt='1';
			$(".ClassName_err").html("Select Class");	
		}
		
		if( sections>0)
			$(".section_err").html("");
		else
		{
			$(".section_err").html("Select Section");
			err_cnt='1';
		}
		
		var selectedStudents= [];
	if( SMSTYPE == "AbsentSMS_btn" )
	{
		
				
		$(".absentees").each(function() 
			{ 
			
				
				if( $.trim( $(this).val() )=='0' || $.trim( $(this).val() )=='' )
				{
					err_cnt='1';
					$('.absentees_err').html('Select Students');
				}
				else
				{
					
					var newarr = {'stds':$(this).val()};
					selectedStudents.push(newarr);
				}
				
			});
			
			SMSTYPE="Absent";
				var senddata ={"SMSTYPE":SMSTYPE,"ClassName":ClassName,"sections":sections,"Students":selectedStudents};
		
   }
   
   else if(SMSTYPE == "ActivitySMS_btn")
   {
	   	SMSTYPE="Activity";
		
		
		var activitycontent = $("#activitycontent").val();
			activitycontent = $.trim(activitycontent);
			
			if(activitycontent=="")
			{
				err_cnt='1';
				$(".activitycontent_err").html("Enter Activity Content");
				
			}
			else
				$(".activitycontent_err").html("");
				
			var senddata ={"SMSTYPE":SMSTYPE,"ClassName":ClassName,"sections":sections,"Students":'All',"activitycontent":activitycontent};	
   }
   
   }
   
   
		 if( err_cnt=='0')
		 {
				
				$.ajax({
							url:base_url+'Managesms/sentsms',
							type:"POST",
							data:senddata,
							async:false,
							sendBefore:function(){  },
							success:function(resp)
							{
								resp = $.trim(resp);
								if(resp=="0")
								{
									$(".sms-message-resp").html("<span class='alert alert-danger'>Unable to sent sms </span>");
								}
								else if(resp=="-1")
								{
									$(".sms-message-resp").html("<span class='alert alert-danger'>SMS Sent to only few parents</span>");
								}
								else if(resp=="1")
								{
									$(".sms-message-resp").html("<span class='alert alert-success'>SMS Sent Successfully</span>");
									$("form#sms_form")[0].reset();
									$(".absentees").html("<option value=0>Select Students</option>");
								}
								
								
							}//success function ends here
							
						});
				 
		 }
		 
   });
   
   ////AbsentSMS_btn ends here
   
   //fee due send sms starts here
   
   $("#FeedueSMS_btn").on("click",function()
   {
	   
	   var err_cnt = '0';
	   var Onclick = $(this);
	   
	   
		var ClassName	=	$("#ClassName").val();
			ClassName	=	$.trim(ClassName);
			ClassName	=	parseInt(ClassName);
			
		var sections	=	$("#sections").val();
			sections	=	$.trim(sections);
			sections	=	parseInt(sections);
			
			
		var AbsentSMS	=	$("#AbsentSMS").val();
			AbsentSMS	=	$.trim(AbsentSMS);
		
		if(ClassName>0)	
			$(".ClassName_err").html("");
		else
		{
			err_cnt='1';
			$(".ClassName_err").html("Select Class");	
		}
		
		if( sections>0)
			$(".section_err").html("");
		else
		{
			$(".section_err").html("Select Section");
			err_cnt='1';
		}
		
	var duesmscontent = $("#duesmscontent").val();
		duesmscontent = $.trim(duesmscontent);
		
		if(duesmscontent=='')
		{
			err_cnt='1';
			$(".duesmscontent_err").html('Enter SMS Due Content');
		}
		else
			$(".duesmscontent_err").html('');
			
			
		
	var selectedStudents= [];
			
	$(".feedues").each(function() 
		{ 
		
			
			if( $.trim( $(this).val() )=='0' || $.trim( $(this).val() )=='' )
			{
				err_cnt='1';
				$('.absentees_err').html('Select Students');
			}
			else
			{
				
				var newarr = {'stds':$(this).val()};
				selectedStudents.push(newarr);
			}
			
		});
		
			
		 if( err_cnt=='0')
		 {
				
				$.ajax({
							url:base_url+'Managesms/sentsms',
							type:"POST",
							data:{"SMSTYPE":"Feedue","duesmscontent":duesmscontent,"ClassName":ClassName,"sections":sections,"Students":selectedStudents},
							async:false,
							sendBefore:function(){  },
							success:function(resp)
							{
								resp = $.trim(resp);
								if(resp=="0")
								{
									$(".sms-message-resp").html("<span class='alert alert-danger'>Unable to sent sms </span>");
								}
								else if(resp=="-1")
								{
									$(".sms-message-resp").html("<span class='alert alert-danger'>SMS Sent to only few parents</span>");
								}
								else if(resp=="1")
								{
									$(".sms-message-resp").html("<span class='alert alert-success'>SMS Sent Successfully</span>");
									$("form#sms_form")[0].reset();
								}
								
								
							}//success function ends here
							
						});
				 
		 }
		 
   });
   
      //fee due send sms ends here
	  

//send sms from the view-students-fee-details page

$(".SENDSMS").on('click',function()
{
	
	var Parent = $(this).parent().parent();
	
	
	var Student = Parent.find(".Student").text();
	var Stdroll = Parent.find(".Stdroll").text();	
		Stdroll = $.trim(Stdroll);
		Stdroll= parseInt(Stdroll);
		
		
	var ClassName = Parent.find(".ClassName").text();
	var sections = Parent.find(".Section").text();	
	var MonthName = Parent.find(".MonthName").text();
	var Due = Parent.find(".Due").text();	
		Due = $.trim(Due);
	
	var selectedStudents=[];
	var newarr = {'stds':Stdroll};
	selectedStudents.push(newarr);	
	


		if(Due>0)
		{
			
			var duesmscontent = "Dear Parent your child "+Student+ " studying in "+ClassName+" -"+sections+" has a fee due of "+Due+" for the month "+$.trim(MonthName);
			
			$.ajax({
							url:base_url+'Managesms/sentsms',
							type:"POST",
							data:{"SMSTYPE":"Feedue","duesmscontent":duesmscontent,"ClassName":ClassName,"sections":sections,"Students":selectedStudents},
							async:false,
							sendBefore:function(){  },
							success:function(resp)
							{
								resp = $.trim(resp);
								if(resp=="0")
								{
									$(".sms-message-resp").html("<span class='alert alert-danger'>Unable to sent sms </span>");
								}
								else if(resp=="-1")
								{
									$(".sms-message-resp").html("<span class='alert alert-danger'>SMS Sent to only few parents</span>");
								}
								else if(resp=="1")
								{
									$(".sms-message-resp").html("<span class='alert alert-success'>SMS Sent Successfully</span>");
									
								}
								
								
							}//success function ends here
							
						});
		}	
});


//send sms from the view-students-fee-details page ends here
	  
	 //fee due send sms starts here
   
   $(document).on('click','#SendTodaysattendanceSMS',function()
   {
	 var Onclick = $(this);
	 	 $.ajax({
		 		url:base_url+"Managesms/sendTeacherAttendanceSMS",
				async:false,
				sendBefore:function(){  Onclick.html('Sending....'); Onclick.attr('id','');  },
				success:function(resp)
				{
					resp = $.trim(resp);

					if(resp=="1")
					{
						Onclick.removeClass('notsend');
						Onclick.addClass('sent');
						
						$(".messagesent").removeClass('sent');
						$(".messagesent").addClass('notsend');	
						
						$(".teacher-attendancve-sms-resp").html("<span class='alert alert-success'>SMS Sent Successfully</span>");
						
					}
					else if(resp=="0")
					{
						Onclick.html('Send SMS'); Onclick.attr('id','SendTodaysattendanceSMS');
						$(".teacher-attendancve-sms-resp").html("<span class='alert alert-danger'>Unable to send SMS </span>");
					}
					else if(resp=="-1")
					{
						Onclick.removeClass('notsend');
						Onclick.addClass('sent');
						
						$(".messagesent").removeClass('sent');
						$(".messagesent").addClass('notsend');	
						
						
						$(".teacher-attendancve-sms-resp").html("<span class='alert alert-warning'>SMS Sent, but unable to update the database</span>");
					}
						
					
				}
		 }); 
   });
   
   
   	$("#studentattendance_excel").on('click',function() 
	{
		 
		var Onclick = $(this);
		
		var Month = $("#Month").val();
			Month = $.trim(Month);
			
		var ClassName = $("#ClassName").val();
			ClassName =$.trim(ClassName);
		
		var Section = $("#sections").val();
			Section = $.trim(Section);
		
		var Rollno = $("#Rollno").val();
			Rollno = $.trim(Rollno);
		
		var sendData = {"SelectedMonth":Month,"SelectedClass":ClassName,"SelectedSection":Section,"SelectedStudent":Rollno};
		
		$.ajax({
				url:base_url+'Excelgeneration/studentsattendance',
				type:"POST",
				data:sendData,
				async:false,
				sendBefore:function(){  Onclick.val('Importing....'); Onclick.attr('id','');  },
				success: function(response){
				response = $.trim(response);
					
					if( response =="0" ) 
						return false;					
					else
					{
						location.href=base_url+response;
							setTimeout( 
											function()
													{ 
													 	Onclick.attr('id','studentattendance_excel');
														Onclick.val('Done');
														$.ajax({
															url:base_url+"Financialdispatcher/deleteexcelsheet",
															type:'POST',
															data:{"excelname":response},
															async:false,
															success:function()
															{
																Onclick.val('Import');
															}	
														})
														
														},2000 );
							
							
					}//else ends here
				
				}//success ends here
			});
	 });
	 
	 $(document).on('click','.filterdata',function()
	 {
		 var Onclick=$(this);
		 var performanceattendance = $(this).attr('performanceattendance');
		 
		 if( $(this).attr('checked') =='checked' )
		 {
			 
		 }
		 else
		 {
			 var clearfilter = $(this).val();
			 
			 	$.ajax({
							url:base_url+"Adminfromstudents/clearfilters",
							data:{"clearfilter":clearfilter}	,
							type:"POST",
							async:false,
							success:function(resp)
							{
								resp = $.trim(resp);
								if(resp=='1')
								{
									
									if( performanceattendance=="performance" )
									{
									
										
										if( clearfilter=="performance_selected_Xam" || clearfilter=="performance_selected_Xam" )
											Onclick.parent().remove();
										else
										{
											if( clearfilter=="performance_selected_Class" )
											{
												$(".filterdata").each(function()
												{
														console.log( $(this).val() );
														
														if( $(this).val()== "performance_selected_Xam" )
														{
																
														}
														else
															$(this).parent().remove();
													
												});
											}
											
											if( clearfilter=="performance_selected_Section" )
											{
												$(".filterdata").each(function()
												{
														console.log( $(this).val() );
														
														if( $(this).val()== "performance_selected_Xam" || $(this).val()== "performance_selected_Class" )
														{
																
														}
														else
															$(this).parent().remove();
													
												});
											}
											else
												Onclick.attr('checked',true);
	
										}
										
										location.href=base_url+'students-performance';
									
									
									}
									else if( performanceattendance=="attendance")
									{
										
										if( clearfilter=="Attendance_selected_Month" || clearfilter=="Attendance_selected_Rollno" )
											Onclick.parent().remove();
										else
										{
											if( clearfilter=="Attendance_selected_Class" )
											{
												$(".filterdata").each(function()
												{
														console.log( $(this).val() );
														
														if( $(this).val()== "Attendance_selected_Month" )
														{
																
														}
														else
															$(this).parent().remove();
													
												});
											}
											
											if( clearfilter=="Attendance_selected_Section" )
											{
												$(".filterdata").each(function()
												{
														console.log( $(this).val() );
														
														if( $(this).val()== "Attendance_selected_Month" || $(this).val()== "Attendance_selected_Class" )
														{
																
														}
														else
															$(this).parent().remove();
													
												});
											}
											else
												Onclick.attr('checked',true);
	
										}
										
										location.href=base_url+'view-attendance';
									
									}
									else
										Onclick.attr('checked',true);
								}
							}
							
					}); 
			
		 }
		
		
	 });
	 
  	$("#studentperformance_excel").on('click',function() 
	{
		 
		var Onclick = $(this);
		
		var Exam = $("#Exam").val();
			Exam = $.trim(Exam);
			
		var ClassName = $("#ClassName").val();
			ClassName =$.trim(ClassName);
		
		var Section = $("#sections").val();
			Section = $.trim(Section);
		
		var Rollno = $("#Rollno").val();
			Rollno = $.trim(Rollno);
		
		var sendData = {"SelectedExam":Exam,"SelectedClass":ClassName,"SelectedSection":Section,"SelectedStudent":Rollno};
		
		$.ajax({
				url:base_url+'Excelgeneration/studentsperformance',
				type:"POST",
				data:sendData,
				async:false,
				sendBefore:function(){  Onclick.val('Importing....'); Onclick.attr('id','');  },
				success: function(response){
				response = $.trim(response);
				
				//return false;	
				
					if( response =="0" ) 
						return false;					
					else
					{
						location.href=base_url+response;
							setTimeout( 
											function()
													{ 
													 	Onclick.attr('id','studentattendance_excel');
														Onclick.val('Done');
														$.ajax({
															url:base_url+"Financialdispatcher/deleteexcelsheet",
															type:'POST',
															data:{"excelname":response},
															async:false,
															success:function()
															{
																Onclick.val('Import');
															}	
														})
														
														},2000 );
						
							
							
					}//else ends here
				
				}//success ends here
			});
	 });
	