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