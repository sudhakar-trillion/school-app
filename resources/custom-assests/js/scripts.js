var prev_dated;
var stdId = '';	
var std = '';
var absentees= [];
var presentees=[];
var ClassName='';
var sections='';

var viewpay='';


		
$(document).ready(function() 
{
	
	
	$(".payfeeclass").on('change',function()
	{
		if( $(this).val()!='0')
		{
			
			var Class = $(this).val();
			var AcademicYr = $(".AcademicYear").val();	
				$.ajax({
						
						url:base_url+'Managerequestdispatcher/getClassfee',
						type:"POST",
						data:{"Class":Class,"AcademicYr":AcademicYr},
						success:function(resp)
						{
							resp = $.trim(resp);
							
							if(resp!='0')
								$("#MonthlyPayFee").val(resp);
							else
								$("#MonthlyPayFee").val('');
						}
						
						
						});
		}
		else
			$("#MonthlyPayFee").val('');
		
	});
	
	
$("#MonthlyPayFee").keypress(function (e) {
	
	console.log(e.which);
     //if the letter is not digit then display error and don't type anything
     if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) 
	 {
            return false;
	 }
	 
	});

var par = $("td.day a").parent();
	par.css('background','#C69');
	$("td.day a").css('color','#fff');
	
	
	$("#TeacherName").on('change',function() 
	{ 
		var err_cnt='0';
		
		var TeacherName = $("#TeacherName").val();
			TeacherName = $.trim(TeacherName);
		
		
		
		if(TeacherName==0)
		{
			$(".TeacherName_err").html('Select Teacher');		
			err_cnt='1';
		}
		else
			$(".TeacherName_err").html('');		
	});

//class change

	$("#ClassName").on('change',function() 
	{
		var ClassName = $("#ClassName").val();
			ClassSLNO = $.trim(ClassName);
		
		if( ClassSLNO=='0' )
		{
			$(".ClassName_err").html('Select class');
			err_cnt='1';
			$("#sections").html('<option value="0">Select Section</option>');
		}
		else
		{
			$(".ClassName_err").html('');
			
			$.ajax({
						url:base_url+"Requestdispatcher/getsections",
						type:'POST',
						data:{"ClassSLNO":ClassSLNO},
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
								}
								else
								{
									console.log('no');
								}
							}
						}
						
						
					});
			
				
		}
	
	});	
	
	
	$("#ClassNaam").on('change',function() 
	{
		var ClassName = $("#ClassNaam").val();
			ClassSLNO = $.trim(ClassName);
		
		if( ClassSLNO=='0' )
		{
			$(".ClassName_err").html('Select class');
			err_cnt='1';
			$("#sects").html('<option value="0">Select Section</option>');
		}
		else
		{
			$(".ClassName_err").html('');
			
			$.ajax({
						url:base_url+"Requestdispatcher/getsections",
						type:'POST',
						data:{"ClassSLNO":ClassSLNO},
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
									
									$("#sects").html(section_options);
								}
								else
								{
									console.log('no');
								}
							}
						}
						
						
					});
			
				
		}
	
	});	


//addmore functionlaity goes here
	
	$(".addmore").on('click',function() 
	{ 
		var err_cnt='0';
		
		$(".subjects").each(function() 
		{ 
			if( $.trim( $(this).val() )=='')
			{
				err_cnt='1';
				$(this).parent().next().find('.subject_err').html('Enter subject');
			}
			else
				$(this).parent().next().find('.subject_err').html('');
			
		});
		
		if(err_cnt=='0')
		{
			var addmore_section = '<div class="form-group subjectdiv moresubjects"><label for="subjects" class="control-label col-lg-4">&nbsp;<span class="required"></span></label><div class="col-lg-3"><input class="form-control subjects" name="subjects" placeholder="Subject" /></div><div class="col-lg-2 err-msg assign-err"><span class="subject_err"></span> </div> <div class="col-lg-2 remore_subject"><span> X </span> </div></div>';
		
			$(".subjectdiv:last").after(addmore_section);
		}
			
			
	});



//remove subjects starts here

	$(document).on('click','.remore_subject',function()
	{
		if(confirm('Do you want to remove this subject'));
		$(this).parent().remove();
		
	});

//remove subjects ends here

//addmore functionlaity ends here

$(document).on('click','#assignteacher_btn,#edit_assignteacher_btn',function() 
{
	var OnClick = $(this);
	
	var edit_add= $(this).attr('edit_add');

	
	
	var err_cnt='0';
	
	var TeacherName = $("#TeacherName").val();
		TeacherName = $.trim(TeacherName);
	
	if(TeacherName=='0')
	{
		err_cnt='1';
		$(".TeacherName_err").html('Select Teacher');	
	}
	else
		$(".TeacherName_err").html('');	
	
	var ClassName = $("#ClassName").val();
			ClassSLNO = $.trim(ClassName);
		
		if( ClassSLNO=='0' )
		{
			$(".ClassName_err").html('Select class');
			err_cnt='1';
		}
		else
			$(".ClassName_err").html('');
			
	var sections = $("#sections").val();
			sections = $.trim(sections);
		
		if( sections=='0' )
		{
			$(".section_err").html('Select section');
			err_cnt='1';
		}
		else
			$(".section_err").html('');	
			
	
		var assignedSubjects = [];
			
	$(".subjects").each(function() 
		{ 
			if( $.trim( $(this).val() )=='')
			{
				err_cnt='1';
				$(this).parent().next().find('.subject_err').html('Enter subject');
			}
			else
			{
				$(this).parent().next().find('.subject_err').html('');
				var newarr = {'subject':$(this).val()};
				assignedSubjects.push(newarr);
			}
			
		});
		
		console.log(err_cnt);
		if(err_cnt=='0')			
		{
			var classteacher = 'No';
			if(edit_add=='add')
			{
				
				$(".classteacher").each(function()
				{
					if( $(this).attr('checked')=="checked" )
					{
						classteacher = $(this).val();
					}
				});
				

					$.ajax({
								url:base_url+"Requestdispatcher/asignteacher",
								type:'POST',
								data:{"TeacherName":TeacherName,"ClassSLNO":ClassSLNO,"sections":sections,"assignedSubjects":assignedSubjects,"classteacher":classteacher},
								beforeSend:function(){  OnClick.prop('disabled',true); OnClick.val('Assinging.......'); },
								success:function(resp) {
				
														///OnClick.prop('disabled',true); OnClick.val('Assinging.......');
														resp = $.trim(resp);
														
														if(resp=='1')
														{
															OnClick.prop('disabled',false); OnClick.val('Assign Teacher');
															$(".moresubjects").remove();
															
															$("form#assign_teacher_form")[0].reset();
															
												$(".assigned-submission-resp").html('<span class="text-success"><b>Teacher assigned successfully</b> </span>');
														}
														else
														{
												$(".assigned-submission-resp").html('<span class="text-danger"><b>Unable to assign teacher</b> </span>');
														}
														
									
													}
							});	//ajax ends here
			}
			else if(edit_add=='edit')
			{
				var classteacher = 'notchoosed';
					$(".classteacher").each(function()
					{
						if( $(this).attr('checked')=="checked" )
						{
							classteacher = $(this).val();
						}
				});
				
				var teacherassigned_id = $("#teacherassigned_id").val();				
					$.ajax({
								url:base_url+"Requestdispatcher/update_asignteacher",
								type:'POST',
								data:{"teacherassigned_id":teacherassigned_id,"TeacherName":TeacherName,"ClassSLNO":ClassSLNO,"sections":sections,"assignedSubjects":assignedSubjects,"classteacher":classteacher},
								beforeSend:function(){  OnClick.prop('disabled',true); OnClick.val('Updating details.......'); },
								success:function(resp) {
				
														///OnClick.prop('disabled',true); OnClick.val('Assinging.......');
														resp = $.trim(resp);
														
														if(resp=='1')
														{
															OnClick.prop('disabled',false); OnClick.val('Update details');
														//	$(".moresubjects").remove();
															
															//$("form#assign_teacher_form")[0].reset();
															
												$(".assigned-submission-resp").html('<span class="text-success"><b>Details updated successfully</b> </span>');
														}
														else
														{
												$(".assigned-submission-resp").html('<span class="text-danger"><b>Unable to update details</b> </span>');
														}
														
									
													}
							});	//ajax ends here
				
			}
		}
	

 });
 
 
 //add more students 
 
 $("#Addstudents").on('click',function() 
 {
	var TotalStudents = $("#TotalStudents").val();
		TotalStudents = $.trim(TotalStudents);
	
	var err_cnt='0';
		
		if(TotalStudents=='')
		{
			err_cnt='1';
			$(".totalstudent_err").html('check total students');
		}
		else
			$(".totalstudent_err").html('');
	
	var content='';
	
	if(err_cnt=='0')	
	{
		
		for( var i=1; i<=TotalStudents; i++)
		{
	
		content =content+'<div class="form-group studentdiv morestudents"> <label for="Student" class="control-label col-lg-4">Student:<span class="required"></span></label> <div class="col-lg-3"> <input class="form-control Students" name="Students" id="Students" placeholder="Student" /> </div> <div class="col-lg-3"> <input class="form-control RollNumber" name="RollNumber" id="RollNumber" placeholder="Rollnumber" /><span class="err-msg"></span> </div> <div class="col-lg-2 remove_students"><span> X </span> </div></div>';
		}
	
	}
	$(".studentdiv").html(content);
	
 });
 
 //add more students ends here
 

 $(document).on('keypress','.RollNumber,#TotalStudents',function (e) {
     //if the letter is not digit then display error and don't type anything
     if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) 
	 {
       $(this).addClass('err-border');
	   return false;
	  }
	 else
	 	 $(this).removeClass('err-border');
   });
	

//remove students starts here

$(document).on('click','.remove_students',function()
{
	if( confirm('Do you want to remove this student') )
	{
		$(this).parent().remove();
		
		var std_total = $(".morestudents").length;
		
		$("#TotalStudents").val(std_total);
		
		
	}
	
});//remove student ends here

	$("#addstudents, #editstudent").on('click',function()
	{
		if(edit_add=='edit')
		{
			$(".RollNumber").each(function() 
			{ 
				$(this).next().html('');
			});
			
			$(".add-student-resp").html('');
		}
		
		var err_cnt='0';
		var OnClick = $(this);
		var edit_add = $(this).attr('edit_add');
		
		var ClassName = $("#ClassName").val();
			ClassName = $.trim(ClassName);

		if(ClassName=='' || ClassName=='0')
		{
			err_cnt='1';
			$(".ClassName_err").html('select class');	
		}
		else
			$(".ClassName_err").html('');	
		
		var sections = $("#sections").val();
			sections = $.trim(sections);
		
		if( sections=='' || sections=='0')
		{
			$(".section_err").html('Select section');
			err_cnt='1';
		}
		else
			$(".section_err").html('');
		
		var AcademicYear = $("#AcademicYear").val();
			AcademicYearc= $.trim(AcademicYear);
			
		if(AcademicYear=='0')
		{
			$(".academic_err").html('Academic year');
			err_cnt='1';
		}	
		else
			$(".academic_err").html('');
		
		var TotalStudents = $("#TotalStudents").val();
			TotalStudents = $.trim(TotalStudents);
		
		if(TotalStudents=='' || TotalStudents=='0')
		{
			$(".totalstudent_err").html('check total students');
			err_cnt='1';
		}
		else
			$(".totalstudent_err").html('');
		
		var classstudents=[];
		
		$(".Students").each(function() 
		{ 
			if( $.trim( $(this).val() )=='')
			{
				err_cnt='1';
				$(this).addClass('err-border');
			}
			else
			{
				$(this).removeClass('err-border');
				var newarr = {'student':$(this).val()};
				classstudents.push(newarr);
			}
			
		});
		
		
		var studentrolls=[];
		
		$(".RollNumber").each(function() 
		{ 
			if( $.trim( $(this).val() )=='')
			{
				err_cnt='1';
				$(this).addClass('err-border');
			}
			else
			{
				$(this).removeClass('err-border');
				var newarr = {'rollnumber':$(this).val()};
				studentrolls.push(newarr);
			}
			
		});
			
			
		if(err_cnt=='0')
		{
			if(edit_add=='add')
			{
				$.ajax({
						url:base_url+"Requestdispatcher/addstudents",
						type:"POST",
						data:{"ClassName":ClassName,"Section":sections,"students":classstudents,"AcademicYear":AcademicYear,"rolls":studentrolls},
						beforeSend:function(){  OnClick.prop('disabled',true); OnClick.val('Validating......'); },
						success:function(resp)
						{
							resp = $.trim(resp);
							resp = JSON.parse(resp);
							
							if(resp.rollexists=='yes')
							{
								$.each(resp.exist_rolls,function(index,val) 
								{
									$rolcnt=0;
									$(".RollNumber").each(function() 
									{ 
										$rolcnt++;
										if($rolcnt==val)
										{
											$(this).next().html('Roll number exists');
											OnClick.prop('disabled',false); 
											OnClick.val('Create students');
										}
										
									});
									
									
										
								 });
							}
							else
							{
								$(".RollNumber").each(function() 
									{ 
										$(this).next().html('');
									});
									
									$("form#add_student_form")[0].reset();
									
									OnClick.prop('disabled',false); 
									OnClick.val('Create students');
									
									$(".add-student-resp").html('<span class="text-success"><b>Students added successfully</b> </span>');
									
									$(".morestudents").remove();
									$("#sections").html('<option value="0">Select section</option>')
							}
						}
					
					});	
			}
			else if(edit_add=='edit')
			{
				
				var stdid = $("#stdid").val();
				
				$.ajax({
						url:base_url+"Requestdispatcher/updatestudent",
						type:"POST",
						data:{"stdid":stdid,"ClassName":ClassName,"Section":sections,"AcademicYear":AcademicYear,"students":classstudents,"rolls":studentrolls},
						beforeSend:function(){  OnClick.prop('disabled',true); OnClick.val('Validating......'); },
						success:function(resp)
						{
							resp = $.trim(resp);
							resp = JSON.parse(resp);
							
							if(resp.rollexists=='yes')
							{
								$.each(resp.exist_rolls,function(index,val) 
								{
									$rolcnt=0;
									$(".RollNumber").each(function() 
									{ 
										$rolcnt++;
										if($rolcnt==val)
										{
											$(this).next().html('Roll number exists');
											OnClick.prop('disabled',false); 
											OnClick.val('Create students');
										}
										
									});
									
									
										
								 });
							}
							else
							{
								$(".RollNumber").each(function() 
									{ 
										$(this).next().html('');
									});
									
									OnClick.prop('disabled',false); 
									OnClick.val('Create students');
									
									$(".add-student-resp").html('<span class="text-success"><b>Students added successfully</b> </span>');
									
							}
						}
					
					});	
			
			}
		}
		
	});


$("#RollNo").keyup(function(event){
	    
		if(event.keyCode == 13)
		{
			alert(); return false;
			$("#parentlogin").trigger('click');
	    }
});




///get the rollnumber based on section and class

	$(document).on('click',"#parentlogin",function()
	{
		var err_cnt='0';
		var OnClick=$(this);
		
		var ClassSlno = $("#ClassName").val();
			ClassSlno = $.trim(ClassSlno);
		
		if( ClassSlno == '0' )
		{
			err_cnt='1';
			$(".ClassSection_err").html("Select Class");
		}
		else
			$(".ClassSection_err").html("");
			
			
		var section	= $("#sections").val();
			section = $.trim(section);
			
		if(section=='0')
		{
			err_cnt='1';
			$(".ClassSection_err").html('Select Section');				
		}
		else
			$(".ClassSection_err").html('');
		
		var RollNo = $("#RollNo").val();
			RollNo = $.trim(RollNo);

		if( RollNo=='' || RollNo=='000' || RollNo=='00' || RollNo=='0' )
		{
			err_cnt='1';
			$(".RollNo_err").html('Enter roll number');
		}
		else
			$(".RollNo_err").html('');
			
		/*var Password = $("#Password").val();
			Password = $.trim(Password);
		
		if(Password=='')
		{
			err_cnt='1';
			$(".pwd_err").html("Enter password");
		}*/
				
		if(err_cnt=='0')
		{
			$.ajax({
						url:base_url+"Parentrequestdispatcher/parentloginvalidation",
						type:"POST",

						//data:{"ClassSlno":ClassSlno,"section":section,"RollNo":RollNo,"Password":Password},
						data:{"ClassSlno":ClassSlno,"section":section,"RollNo":RollNo},
						beforeSend:function() { OnClick.prop('disabled',true); OnClick.val('Validating.....');   },
						success:function(resp)
						{
								resp = $.trim(resp);
								
								if(resp=='1')
								{
									OnClick.prop('disabled',false); OnClick.val('Redirecting.....'); 
									window.location.href=base_url+"parent-dashboard"
								}
								else if(resp=='0')
								{
									$(".Invalid-credentials").html('<div class="text-danger">Invalid credentials</div>');	
									OnClick.prop('disabled',false); 
									OnClick.val('Login');
								}
								else if(resp=='-1')
								{
									$(".Invalid-credentials").html('<div class="text-danger">Unable to fetch student details</div>');	
									OnClick.prop('disabled',false); 
									OnClick.val('Login');
								}
								
						}
						
					});
		}	
		
				
		
	});
	
	
	
	//add more hobbies
	
	$(".addmorehobbies").on('click',function() 
	{ 
		var err_cnt ='0';	
		
		var more_hobbies = '<div class="col-lg-2 Hobbies_div" style="position:relative"><input type="text" name="Hobbies" id="Hobbies" style="width:95%" class="Hobbies form-control" placeholder="Hobby" /><span hobbieide="0" class="remove_more addmore removemorehobbies" style="float:left">X</span></div>';
		
		$(".Hobbies_div").each(function()
		{  
			
			$(".succ_fail_msg").html('');
			var val = $('.Hobbies:last').val();
				val = $.trim(val);
				if(val=='')
				{
					$('.Hobbies:last').addClass('err-border');
					$('.Hobbies:last').focus();
					err_cnt='1';
				}
				else
					$('.Hobbies:last').removeClass('err-border');
				
			
		} );
	
		if(err_cnt=='0')
		{
			$(".Hobbies_div:last").after(more_hobbies);	
			$('.Hobbies:last').focus();
		}
		
		
		
	});
	
	
	//add more extracirculam activities
	
	$(".addmoreactivities").on('click',function() 
	{ 
		$(".succ_fail_msg").html('');
		var err_cnt ='0';		
		var more_activities='<div class="col-lg-2 Extra_curr_div" style="position:relative"><input type="text" name="Extra_curr" id="Extra_curr" style="width:95%" class="Extra_curr form-control" placeholder="Activity" /><span activity_ide="0" class=" remove_more addmore removemoreactivities" style="float:left">X</span></div>';
		
		var len = $(".Extra_curr_div").length;
		
		$(".Extra_curr_div").each(function()
		{  
			
			
			var val = $('.Extra_curr:last').val();
				val = $.trim(val);
				if(val=='')
				{
					$('.Extra_curr:last').focus();
					$('.Extra_curr:last').addClass('err-border');
					err_cnt='1';
				}
				else
					$('.Extra_curr:last').removeClass('err-border');
				
			
		} );
	
		if(err_cnt=='0')
		{
			$(".Extra_curr_div:last").after(more_activities);	
			$('.Extra_curr:last').focus();
		}
		
		
		
	});
	
	
	//add more Identification marks
	
	$(".addmoreIdMarks").on('click',function() 
	{ 
		$(".succ_fail_msg").html('');
		var err_cnt ='0';		
		
		var more_marks = '<div class="col-lg-2 IdMarks_div" style="position:relative"><input type="text" name="IdMarks" id="IdMarks" style="width:95%" class="IdMarks form-control" placeholder="identification Mark" /><span marksIde="0" class="remove_more addmore removemoreactivities" style="float:left">X</span></div>';

		$(".IdMarks_div").each(function()
		{  
			
			
			var val = $('.IdMarks:last').val();
				val = $.trim(val);
				if(val=='')
				{
					$('.IdMarks:last').focus();
					$('.IdMarks:last').addClass('err-border');
					err_cnt='1';
				}
				else
					$('.IdMarks:last').removeClass('err-border');
				
			
		} );
	
		if(err_cnt=='0')
		{
			$(".IdMarks_div:last").after(more_marks);	
			$('.IdMarks:last').focus();
		}
		
		
		
	});
	
	
	$(document).on('click','.remove_more',function() 
	{ 
		$(".succ_fail_msg").html('');
		if(confirm('Do you want to remove'))
		$(this).parent().remove();
	
	});





//update edit profile of a child starts here

	$(document).on('click',"#add_edit_child_profile",function()
	{
		$(".succ_fail_msg").html('');
		
		var err_cnt='0';
		var OnClick = $(this);
		
		
		var FirstName= $("#FirstName").val();
			FirstName = $.trim(FirstName);
		
		if(FirstName=='')
		{
			$("#FirstName").addClass('err-border')	;
			err_cnt='1';
		}
		else
			$('#FirstName').removeClass('err-border');
			
			
		var LastName = $("#LastName").val();
			LastName = $.trim(LastName);
			
		if(LastName=='')
		{
			$("#LastName").addClass('err-border')	;
			err_cnt='1';
		}
		else
			$(this).removeClass('err-border');
		
		var BloodGroup = $("#BloodGroup").val();
			BloodGroup = $.trim(BloodGroup);
		
		if(BloodGroup=='')
		{
			$("#BloodGroup").addClass('err-border');	
			err_cnt='1';
		}
		else
			$("#BloodGroup").removeClass('err-border');	
		
		
		var DOB = $("#DOB").val();
			DOB = $.trim(DOB);
			
			if(DOB=='')
			{
				err_cnt='1';
				$('.DOB_Error').html('Select DOB');	
			}
			else
			{
				var DOBirth = DOB;
				DOB = new Date(DOB);
				
				var ageDifMs = Date.now() - DOB.getTime();
				var ageDate = new Date(ageDifMs); // miliseconds from epoch
				if( Math.abs(ageDate.getUTCFullYear() - 1970) >1)
				{
					$('.DOB_Error').html('');		
				}
				else
				{
						
					err_cnt='1';
					$('.DOB_Error').html('Please Check the DOB');	
				}
			}
		
		
		
		var hobbies_arr = [];
		var hobbies_ids = [];
		var newarr = [];
		
		
		$(".Hobbies").each(function()
		{
			var hob = $(this).val();
				hob = $.trim(hob);
			
			if(hob!='')
			{
				var newarr = {'hobby':hob};
				hobbies_arr.push(newarr);
			
				var newarr ={'hobbyid':$(this).next().attr('hobbieide')};
				hobbies_ids.push(newarr);
			}
			else
			{
				err_cnt='1';
				$(this).addClass('err-border');
					
			}
			
			
			
			
			
		});
		
		
		var Extra_curr_arr = [];
		var Extra_curr_ids = [];
		var newarr = [];
		
		
		$(".Extra_curr").each(function()
		{
			
			var acti=  $(this).val();
				acti = $.trim(acti);

			if(acti!='')
			{
				var newarr = {'ExtraCircu':acti};
				Extra_curr_arr.push(newarr);
			
				var newarr ={'ExtraCircuid':$(this).next().attr('activity_ide')};
				Extra_curr_ids.push(newarr);	
			}
			else
			{
				err_cnt='1';
				$(this).addClass('err-border');
			}
			
		});
		
		
		var Moles_arr = [];
		var Moles_ids = [];
		var newarr = [];
		
		
		$(".IdMarks").each(function()
		{
			
			var acti=  $(this).val();
				acti = $.trim(acti);

			if(acti!='')
			{
				var newarr = {'Mole':acti};
				Moles_arr.push(newarr);
			
				var newarr ={'Moleid':$(this).next().attr('markside')};
				Moles_ids.push(newarr);	
			}
			else
			{
				err_cnt='1';
				$(this).addClass('err-border');
			}
			
		});
		
		
		
		if(err_cnt=='0')
		{
			var StudentId = $("#StudentId").val();

			//var data = {"FirstName":FirstName,"LastName":LastName,"BloodGroup":BloodGroup,"StudentId":StudentId,"hobbies_arr":hobbies_arr,"hobbies_ids":hobbies_ids,"Extra_curr_arr":Extra_curr_arr,"Extra_curr_ids":Extra_curr_ids,"Moles_arr":Moles_arr,"Moles_ids":Moles_ids, "profile_img":profile_img};	
			
			
			$.ajax({
					url:base_url+"Parentrequestdispatcher/updatestudentprofile",
					type:'POST',
					data:{"FirstName":FirstName,"LastName":LastName,"BloodGroup":BloodGroup,"StudentId":StudentId,"DOB":DOBirth,"hobbies_arr":hobbies_arr,"hobbies_ids":hobbies_ids,"Extra_curr_arr":Extra_curr_arr,"Extra_curr_ids":Extra_curr_ids,"Moles_arr":Moles_arr,"Moles_ids":Moles_ids},
					beforeSend:function() { OnClick.prop('disabled',true); OnClick.val('Updating.....');   },
					success:function(resp)
					{
						resp = $.trim(resp);
						
						OnClick.prop('disabled',false); OnClick.val('Update child profile');
						
						if(resp=='0')
						{
							$(".succ_fail_msg").html('<span class="text-danger"><b>Child profile</b></span>');
						}
						else
						{
							resp = resp.split("-");
							
							var succ=0;
							var err_msg = 'Unable to ';
							if(resp[0]=='1')
							{
								succ=(succ)+1;
							}
							else
							{
								err_msg = err_msg+' Hobbies,';
							}
							
							if(resp[1]=='1')
							{
								succ=(succ)+1;
							}
							else
							{
								err_msg = err_msg+' Activities,';	
							}
							
							if(resp[2]=='1')
							{
								succ=(succ)+1;
							}
							else
							{
								err_msg = err_msg+' Identification Marks,';
							}
							
							if(succ==3)
								$(".succ_fail_msg").html('<span class="text-success"><b>Details updated successfully</b></span>');
							else
								$(".succ_fail_msg").html('<span class="text-danger"><b>'+err_msg+'</b></span>');	
						}
						
					}//successfunction ends here

					});//ajax end here

		}//err_cnt ends here

		
		
		
		
	});
		
		
//update edit profile of a child ends here


//create subjects starts here

	$("#Createsubject").on('click',function() 
	{	
		var err_cnt='0';
		
		var TotalSubjects = $("#TotalSubjects").val();
			TotalSubjects = $.trim(TotalSubjects);
		
		if(TotalSubjects=='' || TotalSubjects<1)
		{
			$(".TotalSubjects_err").html('Number of subjects');	
			err_cnt='1';
		}
		else
		{
			$(".TotalSubjects_err").html('');	
			
			
			var more_subjects = '';
			
			for(var i=0;i<TotalSubjects;i++)
			{
			
			more_subjects =more_subjects+'<div class="form-group moresubjects"> <label for="Subject" class="control-label col-lg-4">Subject:<span class="required"></span></label> <div class="col-lg-6"> <input class="form-control Subjects" name="Subject" id="Subject" placeholder="Subject" /> </div>  <div class="col-lg-2 remove_subjects"><span> X </span> </div></div>';
			}
			
			$(".subjectsdiv").html(more_subjects);
		}
		
	});

//create subjects ends here
	
	

$(document).on('click',".remove_subjects",function()
{
	$(".add-student-resp").html('');
	
	if( confirm('Do you wnat to remove this') )
	{
		$(this).parent().remove();

		var TotalSubjects = $("#TotalSubjects").val();
			TotalSubjects = $.trim(TotalSubjects);
			
			if(TotalSubjects>1)
			{
				TotalSubjects=(TotalSubjects)-1;
				$("#TotalSubjects").val(TotalSubjects);
			}
			else
			$("#TotalSubjects").val('');
	}
});


//add subjects starts here

	$(document).on('click','#addsubjects',function()
	{
		$(".add-student-resp").html('');
		var OnClick = $(this);
		
		var edit_add = $(this).attr('edit_add');
		
		var err_cnt='0';
		
		var TotalSubjects = $("#TotalSubjects").val();
			TotalSubjects = $.trim(TotalSubjects);
		TotalSubjects = parseInt(TotalSubjects);
		
		
		if(TotalSubjects=='' || TotalSubjects<1)
		{
			$(".TotalSubjects_err").html('Number of subjects');	
			err_cnt='1';
		}
		else
			$(".TotalSubjects_err").html('');	
			
		var subjects = [];
		
		$(".Subjects").each(function()
		{
			var val = $(this).val();
				val = $.trim(val);
				
				if(val=='')
				{
					$(this).addClass('err-border');
					err_cnt='1';	
				}
				else
				{
					$(this).removeClass('err-border');
					var newarr = {'subject':val};	
					subjects.push(newarr);
				}
		});
			
		
		
		if(err_cnt=='0')
		{
			$.ajax({
						url:base_url+"Requestdispatcher/addsubjects",
						type:"POST",
						data:{"subjects":subjects},
						beforeSend:function() { OnClick.prop('disabled',true); OnClick.val('Adding.....');   },
						success:function(resp)
						{
								OnClick.prop('disabled',false); OnClick.val('Add subjects');  
								
								resp = JSON.parse(resp);

								if(resp.subectExists=='Yes')
								{
									console.log(typeof(resp.subject_exsts)+":"+resp.subject_exsts);
									
									if(resp.subject_exsts.length>0)
									{
										$.each(resp.subject_exsts,function(ind,val)
											{
												
												$(".Subjects").each(function($ind,$val)
												{
													console.log( $(this).val()+":"+$ind+":"+val );
													if($ind==val)
													{
														$(this).addClass('err-border');
													}
												});
													
											});
										
											$(".add-student-resp").html('<span class="text-danger"><b>Highlighted subjects already exists</b> </span>');
											
									}// any subject already exists
									
								}
								else if(resp.subectExists=='No')
								{
									if(resp.failedtoinsert.length>0)
									{
											resp.failedtoinsert.each(function(ind,val)
											{
												
												$(".Subjects").each(function($ind,$val)
												{
													if($ind==val)
													{
														$(this).addClass('err-border');	
													}
												});
													
											});
											
											$(".add-student-resp").html('<span class="text-danger"><b>Unable to insert highlighted subjects </b> </span>');
											
									}//if any subject is failed to insert
									
									else
									{
										$(".add-student-resp").html('<span class="text-success"><b>Subjects added successfully</b> </span>');
										
										$(".moresubjects").remove();
										$("form#add_student_form")[0].reset()
									}
								
								
								}
								
						}
						
					});
		}
		
	});

//add subjects ends here

/// update subject
	
	$("#editsubject").on('click',function()
	{
		var OnClick = $(this);
		
		var err_cnt='0';
		
		var Subject = $("#Subject").val();
			Subject = $.trim(Subject);
		
		if(Subject=='')
		{
			err_cnt='1';
			$("#Subject").addClass('err-border');
			
		}
		else
		{
			$("#Subject").removeClass('err-border');
			var SubjectId= $("#SubjectId").val();
			
			$.ajax({
					url:base_url+'Requestdispatcher/updatesubject',
					type:'POST',
					data:{"SubjectName":Subject,"SubjectId":SubjectId},
					beforeSend:function() { OnClick.prop('disabled',true); OnClick.val('Updating.....');   },
					success:function(resp)
					{
						OnClick.prop('disabled',false); OnClick.val('Update subject'); 
						
						resp = JSON.parse(resp);
						
						if(resp.subectExists=="Yes") 
						{
								$("#Subject").addClass('err-border');
								$(".update-student-resp").html('<span class="text-danger"><b>Subject already exists</b></span>');
						}
						else
						{
							if(resp.subectupdated=="Yes")	
							{
								$(".update-student-resp").html('<span class="text-success"><b>Subject updated successfully</b></span>');
							}
						}
					}
				});
		}
	});

//update subject ends here 

//get the roll numbers starts here

	$(document).on('change',"#sections",function()
	{
		var err_cnt='0';
		
		var ClassName = $("#ClassName").val();
			ClassName = $.trim(ClassName);
			
		if(ClassName=='0')
		{
			err_cnt='1';
			$(".ClassName_err").html('Select Class');
		}
		
		var sections = $("#sections").val();
		var	section = $.trim(sections);
		
		if(section=='0')
		{
			err_cnt='1';
			$('.section_err').	html('Select Section');
		}
		
		if(err_cnt=='0')
		{
			
			$.ajax({
						url:base_url+'Managerequestdispatcher/getstudents',
						type:"POST",
						data:{"ClassName":ClassName,"section":section},
						success:function(resp)
						{
							resp = JSON.parse(resp);
							
							if(resp.Nodata=="Yes")
							{
								
							}
							else if(resp.Nodata=="No")
							{
								var optins='<option value="0">Select Student</option>"';
								$.each(resp.std_details,function($ind,$val)	
								{
									//console.log(resp.std_details[$ind]['Student']+" "+resp.std_details[$ind]['LastName']+" "+resp.std_details[$ind]['Roll'])
									
									optins=optins+"<option value="+resp.std_details[$ind]['StudentId']+">"+resp.std_details[$ind]['Student']+" "+resp.std_details[$ind]['LastName']+"</option>";
								});
								
								$("#Rollno").html(optins);
							}
							
						}
					
					});
				
		}
		
	});

//get the roll numbers ends here

//add a notification starts here

	$(document).on('click','#addnotification, #edittnotification',function()
	{
		
		
		var OnClick = $(this);
		var err_cnt='0';
		
		var edit_add = $(this).attr('edit_add');
			edit_add = $.trim(edit_add);
			
		
		var ClassName = $("#ClassName").val();
			ClassName = $.trim(ClassName);
			
		if(ClassName=='0')
		{
			err_cnt='1';
			$(".ClassName_err").html('Select Class');
		}
		else
			$(".ClassName_err").html('');
		
		var sections = $("#sections").val();
		var	section = $.trim(sections);
		
		if(section=='0')
		{
			err_cnt='1';
			$('.section_err').	html('Select Section');
		}
		else
			$('.section_err').	html('');
		
		var Rollno = $("#Rollno").val();
			student = $.trim(Rollno);
		
		if(student=='0')	
		{
			err_cnt='1';
			$(".Roll_err").html("Select Student");
		}
		else
			$(".Roll_err").html("");
			
		var NotificationTitle = $("#NotificationTitle").val();
			NotificationTitle = $.trim(NotificationTitle);
			
		if( NotificationTitle=='' )
		{
			
			err_cnt='1';
			$(".NotificationTitle_err").html('Enter notification title');	
		}
		else
			$(".NotificationTitle_err").html('');	
		
		
		
		//var Notification = $("iframe  .cke_editable p").html();
		//	Notification = $.trim(Notification);
			
			var Notification  = CKEDITOR.instances.Notification.getData(); // this is the way to get the data from the ckeditor.
				Notification = $.trim(Notification);



		if(Notification=='')
		{
			err_cnt='1';
			$(".Notification_err").html('Enter notification');	
		}
		else
			$(".Notification_err").html('');	
		
		
		if(err_cnt=='0')
		{
				if(edit_add=='add')
				{
					
					$.ajax({
								url:base_url+'Managerequestdispatcher/addnotification',
								type:'POST',
								data:{"ClassName":ClassName,"section":section,"student":student,"NotificationTitle":NotificationTitle,"Notification":Notification},
								beforeSend:function() { OnClick.prop('disabled',true); OnClick.val('Adding.....');   },
								success:function(resp)
								{
									OnClick.prop('disabled',true); OnClick.val('Add notification'); 
									
									
									resp = $.trim(resp);
									if(resp=='0')
									$(".add-notification-to-student-resp").html('<span class="text-danger"><b>Unable to assign a notification</b></span>');
									else if(resp=='1')
									{
										$(".add-notification-to-student-resp").html('<span class="text-success"><b>Successfully assigned notification</b></span>');								$("form#add_notificationstudent_form")[0].reset();	
										$("#sections").html('<option value="0">Select Section</option>');
										$("#Rollno").html('<option value="0">Select Student</option>');
										CKEDITOR.instances.Notification.setData('');
									}
									
								}//success ends here
							});//ajax ends here
						
				}
				else
				{
					
					var NotificationId = $("#NotificationId").val();
					
					$.ajax({
								url:base_url+'Managerequestdispatcher/updatenotification',
								type:'POST',
								data:{"NotificationId":NotificationId,"ClassName":ClassName,"section":section,"student":student,"Notification":Notification},
								beforeSend:function() { OnClick.prop('disabled',true); OnClick.val('Adding.....');   },
								success:function(resp)
								{
									OnClick.prop('disabled',false); OnClick.val('Update notification'); 
									
									resp = $.trim(resp);
									if(resp=='0')
									$(".update-notification-to-student-resp").html('<span class="text-danger"><b>Unable to update notification</b></span>');
									else if(resp=='1')
									{
										$(".update-notification-to-student-resp").html('<span class="text-success"><b>Successfully updated notification</b></span>');							
									}
									
								}//success ends here
							});//ajax ends here
					
					
				}
				
		}
		
		
	});

//add a notification ends here

//show individual notification to the parent

$(document).on('click','.newnotifications',function()
{
	
	var ide =  $(this).attr('id');
	if(ide!='')
		var collapse = "#Notif_"+ide;
	else
		var collapse = "";
	$.ajax({
				url:base_url+"Parentrequestdispatcher/setindividualnotification",
				type:'POST',
				async:false,
				data:{"collapse":collapse},
				beforeSend:function() {   },
				success:function(resp)
				{	
					window.location.href=base_url+"view-admin-notifications";
				}
			
			});//ajax ends here
	
	//$(".accordion-toggle[href='"+collapse+"']").trigger('click');
	
	
	
});

//show individual notification to the parent ends here
	
	
//notification_replybtn

$(document).on('click','.notification_replybtn',function()
{
	
	
	$("#contentdiv").removeClass('col-lg-12');
	$("#contentdiv").addClass('col-lg-7').animate({ height: "auto", width:'auro', left: "+=0", top: "20" }, "slow");
	
	
	
	$(".notification-reply-form").css('display','block');
	var addedon = $(this).attr('addedon');
	$(".notification-label").html("Notification on "+addedon);
	$("#notificationReply").focus();
});

//notification_replybtn ends hre	


//change the status

$(document).on('click','.accordion-toggle',function()
{
	var href= $(this).attr('href');
		href = $.trim(href);
		
	href= href.split("_");

	$.ajax({
				url:base_url+"Parentrequestdispatcher/updateNotificationStatus",
				type:'POST',
				async:false,
				data:{"NotificationId":href[1]},
				beforeSend:function() {   },
				success:function(resp)
				{	
					//window.location.href=base_url+"view-admin-notifications";
				}
			
			});//ajax ends here
	
});

///add a notification by parent to admin


$("#notificationToadmin").on('focus',function() { $(".notificationToadmin_err").html('');  });
	
	$("#addNotification_parent").on('click',function()
	{
		var err_cnt = '0';
		var OnClick= $(this);
		
		
		var NotificationTitle = $("#NotificationTitle").val();
			NotificationTitle = $.trim(NotificationTitle);
			
		if( NotificationTitle=='' )	
		{
			err_cnt='1';
			$(".notificationToitle_err").html('<span class="text-danger"><b>Notification title is requried</b> </span>');
		}
		else
			$(".notificationToitle_err").html('');
		
		var notif = $("#notificationToadmin").val();
			notif = $.trim(notif);
			
			if(notif=='')
			{
				err_cnt='1';	
				$(".notificationToadmin_err").html('<span class="text-danger"><b>Notification is requried</b> </span>');
			}
			else
				$(".notificationToadmin_err").html('');
			
			
			if(err_cnt=='0')
			{
				$.ajax({
							url:base_url+'Parentrequestdispatcher/sendnotification',
							type:"POST",
							data:{"NotificationTitle":NotificationTitle,"notif":notif},
							beforeSend:function() { OnClick.prop('disabled',true); OnClick.val('Sending.....');   },
							success:function(resp)
								{
									OnClick.prop('disabled',false); OnClick.val('Send Notification'); 
									
									resp = $.trim(resp);
									if(resp=='0')
									$(".add-admin-notification-resp").html('<span class="text-danger"><b>Unable to send notification</b></span>');
									else if(resp=='1')
									{
										$(".add-admin-notification-resp").html('<span class="text-success"><b>Successfully Sent </b></span>');							
										$("#notificationToadmin").val('');
										$("#NotificationTitle").val('');
									}
									
								}//success ends here
							
						});	
						return false;
			}
			
			
	});


//add a notification by parent to admin ends here


//asign subjects to a class starts here

	$(document).on('click',"#assignsubects_btn,#update_assignsubects",function()
	{
		var err_cnt = '0';
		var OnClick = $(this);
		var edit_add = $(this).attr('edit_add');
		
		
		var ClassName = $(	"#ClassName").val();
			ClassName = $.trim(ClassName);
		
		if(ClassName=='0')
		{
			err_cnt='1';
			$(".ClassName_err").html('Select class');
		}
		else
		{
			$(".ClassName_err").html('');	
		}
		
		var subjects =$(".subjects").val();

		var assignedsubjects = [];
		
		
		$.each(subjects,function(ind,val)
		{
			var newarr = {"Subject":val };
			assignedsubjects.push(newarr);
		});
		
		
		if(err_cnt=='0')
		{
			
			if(edit_add=='add')
			{
					$.ajax({
					
							url:base_url+'Requestdispatcher/assignsubjects',
							type:"POST",
							data:{"ClassSlno":ClassName,"subjects":assignedsubjects},
							beforeSend:function() { OnClick.prop('disabled',true); OnClick.val('Assigning subjects.....');   },
							success:function(resp)
								{
									OnClick.prop('disabled',false); OnClick.val('Assign subjects to class'); 
									
									resp = $.trim(resp);
									if(resp=='0')
									$(".assigned-submission-resp").html('<span class="text-danger"><b>Unable to assign subjects</b></span>');
									else if(resp=='1')
									{
										$(".assigned-submission-resp").html('<span class="text-success"><b>Successfully assigned</b></span>');	
										$("form#assign_subjects_form")[0].reset();						
									}
									
								}//success ends here
				
				});	
			}//edit_add=='add'
			else if(edit_add=='edit')
			{
				var selectedclass = $("#selectedclass").val();
				
				
				$.ajax({
					
							url:base_url+'Requestdispatcher/updateassignedsubjects',
							type:"POST",
							data:{"selectedclass":selectedclass,"subjects":assignedsubjects},
							beforeSend:function() { OnClick.prop('disabled',true); OnClick.val('Updating subjects.....');   },
							success:function(resp)
								{
									OnClick.prop('disabled',false); OnClick.val('Update assigned subjects'); 
									
									resp = $.trim(resp);
									if(resp=='0')
									$(".assigned-submission-resp").html('<span class="text-danger"><b>Unable to assign subjects</b></span>');
									else if(resp=='1')
									{
										$(".assigned-submission-resp").html('<span class="text-success"><b>Successfully assigned</b></span>');	
										//$("form#assign_subjects_form")[0].reset();						
									}
									
								}//success ends here
				
				});	
				
				
			}
			
			
		}
			
			
	});

//asign subjects to a class ends here

//get the assigned subjects to a class

	$(".ClassName").on('change',function() 
	{ 
		var ClassName = $("#ClassName").val();
			ClassSLNO = $.trim(ClassName);
		
		if( ClassSLNO=='0' )
		{
			$(".ClassName_err").html('Select class');
			err_cnt='1';
			$("#sections").html('');
		}
		else
		{
			$(".ClassName_err").html('');
			
			$.ajax({
						url:base_url+"Requestdispatcher/getassignedsubjects",
						type:'POST',
						data:{"ClassSLNO":ClassSLNO},
						sendBefore:function(){  },
						success:function(resp)
						{
							resp = $.trim(resp);
							
							if(resp!='0')
							{
								resp = JSON.parse(resp);
													
								if( typeof(resp) == 'object' )	
								{
									var section_options='<option value=0>Select Subject</option>';
									
									$.each(resp,function(index,val)
									{
										section_options=section_options+'<option value="'+val.SubjectId+'">'+val.Subject+'</option>';
										console.log(section_options);
									});
									
									$("#subject").html(section_options);
								}
								else
								{
									console.log('no');
								}
							}
						}
						
						
					});
			
				
		}
	});	
	
	
	
	//addhomework starts here
	
	$(document).on('click','#addhomework,#updatehomework',function()
	{
		var OnClick = $(this);
		var err_cnt='0';
		var edit_add = $(this).attr('edit_add');
		
		
		var ClassName = $("#ClassName").val();
			ClassSlno = $.trim(ClassName);
		
		if(ClassSlno=='0')
		{
			err_cnt='1';
			$(".ClassName_err").html('Select class');
		}
		else
			$(".ClassName_err").html('');
		
		var sections = $("#sections").val();
			section = $.trim(sections);
		
		if(section == '0')
		{
			err_cnt='1';
			$(".section_err").html('Select section');
		}
		else
			$(".section_err").html('');
		
		var Rollno = $("#Rollno").val();
			Rollno = $.trim(Rollno);
			
		if(Rollno=='0')
		{
			err_cnt='1';
			$(".Roll_err").html('Select student');
		}
		else
			$(".Roll_err").html('');
			
		var subject = $("#subject").val();
			subject = $.trim(subject);
		
		if(subject=='0')
		{
			err_cnt='1';
			$(".subject_err").html('Select subject');
		}
		else
			$(".subject_err").html('');
		
		var homeworkdate = $("#homeworkdate").val();
			homeworkdate = $.trim(homeworkdate);

		if(homeworkdate=='')
		{
			err_cnt='1';
			$(".homeworkdate_err").html('Home work date');
		}
		else
			$(".homeworkdate_err").html('');
			
		var homework = $("#homework").val();
			homework = $.trim(homework);

		if(homework=='')
		{
			err_cnt='1';
			$(".homework_err").html('Enter Home Work');
		}
		else
			$(".homework_err").html('');
			

		if(err_cnt=='0')	
		{
			
			if(edit_add=='add')
			{
					$.ajax({
							url:base_url+"Managerequestdispatcher/addhomework",
							type:"POST",
							data:{"ClassSlno":ClassSlno,"ClassSection":section,"StudentId":Rollno,"SubjectId":subject,"HomeWorkOn":homeworkdate,"HomeWork":homework},
							beforeSend:function() { OnClick.prop('disabled',true); OnClick.val('Adding home work....');   },
							success:function(resp)
							{
								resp=$.trim(resp);
								
								 OnClick.prop('disabled',false); OnClick.val('Add Home-Work');   
								
								if(resp=='1')
								{
									$("form#add_homework_form")[0].reset();
									$(".add-home-work-resp").html('<span class="text-success"><b>Home work assigned suucessfully</b></span>');
									$("#sections").html('<option value="0">Select Section</option>');
									$("#Rollno").html('<option value="0">Select Student</option>');
									$("#subject").html('<option value="0">Select Subject</option>');
								}
								else
								{
									$(".add-home-work-resp").html('<span class="text-danger"><b>Unable to assign home work</b></span>');
								}
								
								
							}//success ends here
				});	//ajax ends here
			}
			else if(edit_add=='edit')
			{
				
				var assignedhomeworkid = $("#assignedhomeworkid").val();
				
				
				$.ajax({
							url:base_url+"Managerequestdispatcher/updatehomework",
							type:"POST",
							data:{"assignedhomeworkid":assignedhomeworkid,"ClassSlno":ClassSlno,"ClassSection":section,"StudentId":Rollno,"SubjectId":subject,"HomeWorkOn":homeworkdate,"HomeWork":homework},
							beforeSend:function() { OnClick.prop('disabled',true); OnClick.val('Adding home work....');   },
							success:function(resp)
							{
								resp=$.trim(resp);
								
								 OnClick.prop('disabled',false); OnClick.val('Add Home-Work');   
								
								if(resp=='1')
								{
									$(".add-home-work-resp").html('<span class="text-success"><b>Home work updated suucessfully</b></span>');
								}
								else
								{
									$(".add-home-work-resp").html('<span class="text-danger"><b>Unable to update home work</b></span>');
								}
								
								
							}//success ends here
				});	//ajax ends here
				
			}
		}
			
			
			
	});
	
	// addhomework ends here	


//get the event pics and show it in the modal popup

$(document).on('click','.getEventpics',function()
{
	var EventID = $(this).attr('id');
		//alert(EventID);
		var OnClick = $(this);
		
	
	var Event_title = $(this).parent().parent().find('.event').html();
		
	$(".eventName").html(Event_title);
	
	
	$.ajax({
			url:base_url+'Managerequestdispatcher/geteventpics',
			type:"POST",
			data:{"EventID":EventID},
			beforeSend:function() { OnClick.removeClass('btn-primary'); OnClick.addClass('btn-success'); OnClick.html('Getting event pics....');   },
			success:function(resp)
			{
					 OnClick.removeClass('btn-success'); OnClick.addClass('btn-primary'); OnClick.html('View Event Pics');
					 
					 resp = $.trim(resp);
					
					resp = JSON.parse(resp); 
					
					var myCarousel = '<div class="carousel-inner">';
      

					
					
					if(resp.Datavailable=='yes')
					{
						var imgCnt=0;
						
						$.each(resp.Eventpics,function()
						{
							console.log(resp.Eventpics[imgCnt]);
							
							if(imgCnt==0)
							{
							myCarousel=myCarousel+'<div class="item active EventId_'+resp.Eventpics[imgCnt].ActivityPicId+'"><i class="fa fa-trash-o car_del eventpicdel" id="EventId_'+resp.Eventpics[imgCnt].ActivityPicId+'"></i><img src="'+resp.Eventpics[imgCnt].Picture+'" alt="" style="height:500px;" /></div>';
							}
							else
							{
							myCarousel=myCarousel+'<div class="item EventId_'+resp.Eventpics[imgCnt].ActivityPicId+'"><i class="fa fa-trash-o car_del eventpicdel" id="EventId_'+resp.Eventpics[imgCnt].ActivityPicId+'"></i><img src="'+resp.Eventpics[imgCnt].Picture+'" alt="" style="height:500px;" /></div>';
							}
							
							imgCnt = (imgCnt)+1;
						});
						
						
						
						myCarousel =myCarousel+'</div><a class="left carousel-control" href="#myCarousel" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span><span class="sr-only">Previous</span></a>    <a class="right carousel-control" href="#myCarousel" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span><span class="sr-only">Next</span></a>';
						
						$("#myCarousel").html(myCarousel);
						
					}
			}
			});
		
	
	
});


$(document).on('click','.eventpicdel',function()
{
	
	if(confirm('Do you want to delte'))
	{
		var EventId = $(this).attr('id');
		
		$.ajax({
				url:base_url+'Managerequestdispatcher/DeleteEventpic',
				type:"POST",
				data:{"EventId":EventId},
				success:function(resp)
				{
					resp = $.trim(resp);
					if(resp=="1")
						$("."+EventId).html("<h2 style='height:500px; text-align:center; line-height:500px'>Image deleted</h2>");
					
				}
			
			});
	}
	
});


//get the event pics and show it in the modal popup


//toggle the archieves

$(".archieves-list div span").on('click',function()
{
	var par = $(this).parent();
	
	
	if(par.find('ul').css('display')=='block')
	{
			//$(this).children().find('ul').css('display','none');		
			par.find('ul').slideUp('slow');
	}
	else
	{
		$(".archieves-list div").find('ul').slideUp('slow');
//		$(this).children().find('ul').css('display','block').slideDown('slow');
		par.find('ul').slideDown('slow');
	}
	
	
	
})



// profile image upload for student 

$(function() {
$("#imageUpload").change(function() {
$("#message").empty(); // To remove the previous error message
var file = this.files[0];
var imagefile = file.type;
var match= ["image/jpeg","image/png","image/jpg"];
if(!((imagefile==match[0]) || (imagefile==match[1]) || (imagefile==match[2])))
{
	
$("#message").html("Only jpeg, jpg and png Images type allowed");
return false;
}
else
{
	
var reader = new FileReader();
reader.onload = imageIsLoaded;
reader.readAsDataURL(this.files[0]);
}
});
});




//$("#file").on('change',function() 
$("#uploadimage").on('submit',function(e)
{ 

$.ajax({
		url:base_url+"Parentrequestdispatcher/changeprofilepic", // Url to which the request is send
		type: "POST",             // Type of request to be send, called as method
		async:false,
		data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
		contentType: false,       // The content type used when sending data to the server.
		cache: false,             // To unable request pages to be cached
		processData:false,        // To send DOMDocument or non processed data file it is set to false
		success: function(data)   // A function to be called if request succeeds
		{

			$('#loading').hide();
			$("#message").html(data);
			//return false;
		
		}
});

//e.preventDefault();
});

// profile image uplod for studnet ends here

$(document).on('click',".Event-Name",function()
{
	var eventide = $(this).attr('id');
		eventide = $.trim(eventide);
		eventide = "Event_"+eventide;


	$.ajax({
				url:'Parentrequestdispatcher/getEventbasedpics',
				type:"POST",
				data:{"eventid":eventide},
				beforeSend:function() { $(".loader").css('display','block');   },
				success:function(resp)
				{
					$(".loader").css('display','none');	
					resp = $.trim(resp);
					resp = JSON.parse(resp);
					
					if(resp.Pic_exists=="no")
					{
						
					}
					else if(resp.Pic_exists=="yes")
					{
						var cnt=0;
						var picdivs ='';
						$.each(resp.Eventpics,function()
						{
							
//							console.log(resp.Eventpics[cnt]['Picture']);
							
							//eventPictures
							
							picdivs = picdivs+'<div class="pic-container col-md-4">';
								picdivs = picdivs+'<a class="example-image-link" href="'+resp.Eventpics[cnt]['Picture']+'" data-lightbox="example-set" data-title="Click the right half of the image to move forward.">';
								picdivs = picdivs+'<img src="'+resp.Eventpics[cnt]['Picture']+'" /></a> <div class="download"><a href="'+resp.Eventpics[cnt]['Picture']+'" download> <i class="fa fa-cloud-download"></i> Download</a></div></div>';
							cnt = (cnt)+1;
							console.log(picdivs);
						});
						
						$(".eventPictures").html(picdivs);
						
					}
				}
		
		});
	
});



$(document).on('click','.day a',function()
{
	return false;
	
});

$(document).on('click',".calendar .day",function()
{


	prev_dated = $(this);

	$(".del_exam_schedule i").css({'cursor':'pointer'});
	
	$(".err-msg").html('');
	$(".addexam_resp").html("");
	$(".addceleb_resp").html('');
	
	var date = $(this).text();
		date = $.trim(date);
	
	var pathname = window.location.pathname; // Returns path only
	var url      = window.location.href; 
	
	var pathname = pathname.split("/");
	
	
	if( pathname[2] =="view-holidays" || pathname[2] =="view-events" )
	{
		if( pathname[2] =="view-celebrations" )
		$('#examscheduletime').timepicker('setTime', new Date());
		
		var dtd = $(this).html();
		
		console.log( dtd.indexOf("<a"));
		
		if( dtd.indexOf("<a") == 0 )
			{
				var dtd = $(this).find('a').attr('href');
				
				//console.log(dtd);
				var month_day = $(this).parent().parent().parent().find('th').text();
				month_day = month_day.replace(" ","-",month_day);
			
				//$(".cel_date").val(date+'-'+month_day);
				var dated =  date+'-'+month_day;
				
				$dtd = dtd.split("||||");
				var CelebId = $dtd[1];
				
				$.ajax({
							
							url:'Schedulingdispatcher/getholiday',
							type:"POST",
							data:{"CelebId":CelebId},
							beforeSend:function() { $(".loader").css('display','block');   },
							success:function(resp)
							{
								resp = $.trim(resp);
								if(resp!='0')
								{
									$(".modal").css('display','block');
									$("#myModal").addClass('in');
									
									$("#myModal").css({'background':'rgba(0, 0, 0, 0.72)'});
									
									$(".event_da .form-control").css({'width':'75%'});
									
									$(".event_da").css({'margin-bottom':'30px'});	
									$(".event_da label").css({'float': 'left','margin-right': '20px',"width":'20%'});
									$(".err-msg").css({'float':'right','margin-right':'7px'});
									
									
									resp = JSON.parse(resp);
									
									$.each(resp,function()
									{ 
									//	console.log(resp[0].Celebration_Date);
										
										$(".cel_date").val(resp[0].HolidayOn);
										$(".celebration").val(resp[0].HolidayFor);
										$("#CelebId").val(resp[0].HolidayId);
										
									});
									
									
								}
							}
				
						});//ajax ends here
			}
	
	}
	else
	{
		//if( pathname[2] == "add-celebration" ||  pathname[2] == "add-exam")
		if( pathname[2] == "add-holiday" ||  pathname[2] == "add-exam")
		{
			$('#examscheduletime').timepicker('setTime', new Date());
			
				if(date!='')
			{
				var month_day = $(this).parent().parent().parent().find('th').text();
				month_day = month_day.replace(" ","-",month_day);
			
				$(".cel_date").val(date+'-'+month_day);
			
			
			
			$("#myModal").css('display','block');
			$("#myModal").addClass('in');
			
			$("#myModal").css({'background':'rgba(0, 0, 0, 0.72)'});
			
			$(".event_da .form-control").css({'width':'75%'});
		$(".event_da").css({'margin-bottom':'30px'});	
			$(".event_da label").css({'float': 'left','margin-right': '20px',"width":'20%'});
			$(".err-msg").css({'float':'right','margin-right':'7px'});
			}			
		
		
		}
		else
		{
		
		var dtd = $(this).html();
		
		//console.log( dtd.indexOf("<a"));
		
		if( dtd.indexOf("<a") == 0 )
			{
				var dtd = $(this).find('a').attr('href');

				var datedOn = dtd;
				
				$.ajax({
							
							url:'Schedulingdispatcher/getexamschedules',
							type:"POST",
							data:{"datedOn":datedOn},
							beforeSend:function() { $(".loader").css('display','block');   },
							success:function(resp)
							{
								resp = $.trim(resp);
								if(resp!='0')
								{
									$("#myModal").css('display','block');
									$("#myModal").addClass('in');
									
									$("#myModal").css({'background':'rgba(0, 0, 0, 0.72)'});
									
									$(".event_da .form-control").css({'width':'75%'});
									
									$(".event_da").css({'margin-bottom':'30px'});	
									$(".event_da label").css({'float': 'left','margin-right': '20px',"width":'20%'});
									$(".err-msg").css({'float':'right','margin-right':'7px'});
									
									
									$("#view-schedules").html(resp);
									
									$(".schedule-header").css({'float':'left','display': 'inline-block',"width":'14%'});
									$(".Schedules").css({"margin-bottom":"15px"});
									
								}
							}
				
						});//ajax ends here
			}
			

		
	
		
		}	
		
			
	}
});

$(document).on('click','.view_exam_scedule',function()
{
	$("#myModal .close").trigger('click');
	
	var examScheduleId= $(this).attr('id');
	$("#ExamSchedueId").val(examScheduleId);
	
	
	$.ajax({
			url:base_url+'Schedulingdispatcher/getExam',
			type:"POST",
			data:{"ExamSchedueId":examScheduleId},
			success:function(resp)
			{
				resp = $.trim(resp);
				
				if(resp=='0')
				{
					
				}
				else
				{
					resp = JSON.parse(resp);
					
					$.each(resp,function(indx,val)
					{
						$(".ClassName").html(resp.ClassName);
						$(".ClassSection").html(resp.ClassSection);
						$(".Subjects").html(resp.Subjects);
						$(".ExamName").html(resp.ExamName);
						
						$(".ExamSchedule").val(resp.ExamSchedule);
						$(".ScheduledTime").val(resp.ScheduledTime);
					});
					
					
				}
			}
		});
	
	
});


$(document).on('click','.previousDated',function() 
{
	$("#editExamSchedule .close").trigger('click');
	prev_dated.trigger('click');	
 });


$(document).on('click','.close',function()
{
	$(".modal").css('display','none');
	$("#myModal").removeClass('in');
});

$(document).on('click','.addholidaybtn,.updateholidaybtn',function()
{
	
	var addedit = $(this).attr('addedit');
	
	
	var err_cnt = '0';
	var OnClick = $(this);
	
	var celebration = $(".celebration").val();
		celebration = $.trim(celebration);
		
	var cel_date = $(".cel_date").val();	
		cel_date = $.trim(cel_date);
		
	if(cel_date=='')
	{
		err_cnt='1';
	}
	if(celebration=='')
	{
		err_cnt='1';
		$(".err-msg").html('Enter Occassion Name');
		$(".celebration").focus();
	}
	
	if(err_cnt=='0')
	{
		if(addedit=="add")
		{
			$.ajax({
					url:base_url+"Schedulingdispatcher/addholidaytocalendar",
					type:"POST",
					data:{"Occassion":celebration,"cel_date":cel_date,"addUpdate":addedit},
					success:function(resp)
					{
						resp=$.trim(resp);
						
						if(resp=='1')
						{
							$(".addceleb_resp").html("<span class='text-success'><b>Holiday added successfuly</b></span>");
							$("form#add-celebrationform")[0].reset();
						}
						else
						{
							$(".addceleb_resp").html("<span class='text-danger'><b>unable to add new holiday</b></span>");
						}
					}
								
					});//ajax ends here
		}
		else
		{
			
			var HolidayId = $("#CelebId").val();
			
			$.ajax({
							url:base_url+'Schedulingdispatcher/addholidaytocalendar',
							type:"POST",
							data:{"HolidayId":HolidayId,"Occassion":celebration,"cel_date":cel_date,"addUpdate":addedit},
							success:function(resp)
							{
								resp=$.trim(resp);
								
								if(resp=='1')
								{
									$(".addceleb_resp").html("<span class='text-success'><b>Updated successfuly</b></span>");
								}
								else
								{
									$(".addceleb_resp").html("<span class='text-danger'><b>unable to update</b></span>");
								}
							}
						});
			
			
		}
	}
	
});

//delete holiday

$(document).on('click','.delete-holiday',function()
{

if( confirm("Do you want to delete this holiday") )
{
	var HolidayId = $(".HolidayId").val();
		HolidayId = $.trim(HolidayId);
		HolidayId = parseInt(HolidayId);
		
	if(HolidayId>0)
	{
		
		$.ajax({
					url:base_url+"Schedulingdispatcher/deleteholiday",
					type:"POST",
					data:{"HolidayId":HolidayId},
					success:function(resp)
					{
						resp = $.trim(resp);
						
						if(resp=="1")
						{
							$(".addceleb_resp").html("<span class='text-success'><b>Holiday Deleted successfully</b></span>");
							prev_dated.css({"background":"none"});
							prev_dated.find('a').css({"color":"#838383"});
						}
						else
							$(".addceleb_resp").html("<span class='text-danger'><b>Unableto delete holiday</b></span>");
					}
				});	
	}
}
	
});

//delete holiday ends here

// addexamBtn validation starts here

$(document).on('click','.addexamBtn, .updateexamBtn',function()
{
	var err_cnt='0';
	var OnClick = $(this);
	var addEdit = $(this).attr('addedit');
	
	var ClassName = $("#ClassName").val();
		ClassName = $.trim(ClassName);
	
	if(ClassName=='0')
	{	
		err_cnt='1';
		$(".classErr").html('Select Class');
	}
	else
		$(".classErr").html('');
		

var sections = $("#sections").val();
	sections = $.trim(sections);

if(sections=='0')
{
	err_cnt='1';
	$(".sectionErr").html("Select Section");	
}
else
	$(".sectionErr").html("");
	
var subject = $("#subject").val();
	subject = $.trim(subject);

if(subject=='0')
{
	var err_cnt='1';
	$(".subjectErr").html("Select Subject");
}
else
	$(".subjectErr").html("");
	
var ExamName = $("#ExamName").val();
	ExamName = $.trim(ExamName);
	
	if(ExamName=='0')	
	{
		$(".examErr").html("Select Exam Type");
		err_cnt='1';
	}
	else
		$(".examErr").html("");

var examscheduletime = $("#examscheduletime").val();
	examscheduletime = $.trim(examscheduletime);
	
	if(examscheduletime=='')
	{
		err_cnt='1';
		$(".scheduletimeErr").html("Time is required");
	}
	else
		{
			$(".scheduletimeErr").html("");
			examscheduletime = examscheduletime.substring(0,4);
			examscheduletime = examscheduletime+":00";
		}

	if( err_cnt=='0')		
	{
		var cel_date = $(".cel_date").val();
		console.log(cel_date);
		
	if(addEdit=='add')
	{
			$.ajax({
				
				url:base_url+'Schedulingdispatcher/addExam',
				type:"POST",
				data:{"ExamDate":cel_date,"examscheduletime":examscheduletime,"ClassName":ClassName,"ClassSection":sections,"Subject":subject,"ExamName":ExamName},
				success:function(resp)
				{
					resp = $.trim(resp);
					
					if(resp=="1")
					{
						$("form#add-exam-form")[0].reset();
						
						$(".addexam_resp").html("<div class='alert alert-success'><b>Exam scheduled successfully</b></div>");	
					}
					else if(resp=='0')
						$(".addexam_resp").html("<div class='alert alert-danger'><b>Failed to add exam schedule</b></div>");	
					else if(resp=='-1')
						$(".addexam_resp").html("<div class='alert alert-warning' style='color:#ff0000'><b>This exam already scheduled</b></div>");	
					
				}
				
				});//ajax ends here
				
	}
	else if(addEdit=='edit')
	{
			var ExamSchedueId = $("#ExamSchedueId").val();
			
			$.ajax({
				
				url:base_url+'Schedulingdispatcher/updateExamschedule',
				type:"POST",
				data:{"ExamSchedueId":ExamSchedueId,"ExamDate":cel_date,"examscheduletime":examscheduletime,"ClassName":ClassName,"ClassSection":sections,"Subject":subject,"ExamName":ExamName},
				success:function(resp)
				{
					resp = $.trim(resp);
					
					if(resp=="1")
					{
						//$("form#add-exam-form")[0].reset();
						
						$(".addexam_resp").html("<div class='alert alert-success'><b>Exam scheduled updated successfully</b></div>");	
					}
					else if(resp=='0')
						$(".addexam_resp").html("<div class='alert alert-danger'><b>Failed to update exam schedule</b></div>");	
					else if(resp=='-1')
						$(".addexam_resp").html("<div class='alert alert-warning' style='color:#ff0000'><b>This exam already scheduled</b></div>");	
					
				}
				
				});//ajax ends here
			
	}
				
	}//if err_cnt==0 ends here
		
	
	
});

// addexamBtn validation ends here

//delete the exam schedule starts here 

	$(document).on("click",'.del_exam_schedule',function()
	{
		var OnClick = $(this);
		if(confirm("do you want to delete") )
		{
			var ide = $(this).attr('id');
	
			var schedid = $(this).parent().parent().attr('scheduleide');
		
			$.ajax({
					url:base_url+"Schedulingdispatcher/deleteexamschedule",
					type:"POST",
					data:{"schedid":schedid},
					success:function(resp)
					{
						resp = $.trim(resp);
					
						if(resp=='1')
						 OnClick.parent().parent().remove();
					
					}
				});
		
		}
		
		
		
	});

//delete the exam schedule ends here



//inactivate_activate vendors

$(document).on('click','.inactivate_activate',function()
{
	
	var OnClick = $(this);
	
	var status = $(this).attr('stats');
	
	var VendorId = OnClick.attr('id');
	
	if(status=="Inactive")
		$setStatus = 'Active';
	else
		$setStatus = 'Inactive';
	

	
	if( confirm("Do you want to "+status+" this vendor") )
	{
			console.log($setStatus);		
		$.ajax({
				url:base_url+'Financialdispatcher/inactiveActive',
				type:"POST",
				data:{"VendorId":VendorId,"setStatus":$setStatus},
				success:function(resp)
				{
					if($.trim(resp) =='1' )					
					{
							if($setStatus=="Inactive")
							{
								$(".vendor"+VendorId).html('Active');
								OnClick.attr('stats','Inactive');
								
								console.log(OnClick.find('i').attr('class'));
								

								OnClick.find('i').removeClass('fa fa-check');
								OnClick.find('i').addClass('fa fa-times').css({"background":"#ff0000"});
								
							}
							else
							{
								$(".vendor"+VendorId).html('Inactive');
								OnClick.attr('stats','Active');
								console.log("HEY"+OnClick.find('i').attr('class'));
								
								OnClick.find('i').removeClass('fa fa-times');
								OnClick.find('i').addClass('fa fa-check').css({"background":"#57a602"});
								
								
							}
					}
						
				}
			
			});
		
		
		
		
		
	}
});

//inactivate_activate ends here



	$(".delete_nonteachingstaff").on('click',function()
	{
		var OnClick = $(this);
		var url      = window.location.href.split("/");
				//sam@fininfocom.com
		var paginate = url[(url.length)-1];
		
		if( confirm('Do you wants to delete') )
		{
			var ide = $(this).attr('delstaff');
		
			$.ajax({
					url:base_url+'Requestdispatcher/deletenonteachingstaff',
					type:"POST",
					data:{"StaffId":ide},
					success:function(resp)
					{ 
						resp = $.trim(resp);
					
						if(resp == "1")
						{
							OnClick.parent().parent().remove();
							
							if(paginate.match(/[a-zA-Z]/))
							{
								var slncnt =0;
								
								$(".SLNO").each(function() 
								{ 
								slncnt = (slncnt)+1;
								$(this).html(slncnt);
								console.log(slncnt);
								});	
							}
							else
							{
								if($(".data-row").length==0)
								{
									 paginate = parseInt( paginate );
									  paginate  =  paginate-1;
									  
									  if( paginate == 1 )
									  {
										location.href=base_url+"view-nonteaching-staff";  
									  }
									  else
									  {
										  location.href=base_url+"view-nonteaching-staff/"+paginate;
									  }
								}
								else
								{
									var pgecnt = paginate-1;
									pgecnt = parseInt(pgecnt);
									pgecnt = pgecnt*10;
									
									var slncnt =pgecnt;
									
									$(".SLNO").each(function() 
									{ 
									slncnt = (slncnt)+1;
									$(this).html(slncnt);
									console.log(slncnt);
									});		
								}
							}
						}
						else if(resp == "0")
						{
							alert('Unable to delte');
						}
						else if(resp == "-1")
						{
							alert("Invalid request");
						}
					 }
				});
			
			
			
		}
		
	
		
	});


//get the staff details accorinding to the staff type

$(document).on('change',"#StaffType",function()
{

	$(".resp_msg").html('');
	
	var staff = $(this).val();
		staff = $.trim(staff);
		
		
	if( staff=='Teaching' || staff=='Non-Teaching' )
	{
		$.ajax({
				url:base_url+"MiscellaneousRequestdispatcher/getStaff",
				type:"POST",
				data:{"Staff":staff},
				success:function(resp)
									{
										resp = $.trim(resp);
										
										resp = JSON.parse(resp);	
										
									if( typeof(resp) == 'object' )	
									{
										var section_options='<option value="none">Select '+staff+'</option>';
										
										$.each(resp,function(index,val)
										{
										section_options=section_options+'<option value="'+val.StaffId+'">'+val.StaffName+'</option>';
										console.log(section_options);
										});
										
										$("#Stafid").html(section_options);
									}
									else
									{
										console.log('no');
									}										
									}//success ends here
				
				});//ajax ends here
		
	}//if ends here

});


$(document).on('keypress',"#Salary",function(event)
{
	var charCode = event.keyCode;
		charCode =	parseInt(charCode);


if(charCode==32 || charCode==44 || charCode==46)
{
	
}
else
{
	
 if (  (charCode >= 48 && charCode < 58) )
 {
	
 }
 else
 return false;
 
}
});

$(document).on('click','#addSalary, #EditSalary',function()
{
	
	var OnClick = $(this);
	var Err_cnt='0';
	var edit_add = $(this).attr('edit_add');
	
	var StaffType = $("#StaffType").val();
		StaffType = $.trim(StaffType);
		
	if( StaffType == "none" )
	{
		Err_cnt='1';
		$(".stafftype_err").html('<span>Select Staff type</span>');
	}
	else
		$(".stafftype_err").html('');
	
	
	var Stafid = $("#Stafid").val();
		Stafid = $.trim(Stafid);
	
	if( Stafid=="none" || Stafid=="0" )
	{
		Err_cnt='1';
		$(".staffid_err").html('<span>Select Staff</span>');
	}
	else
		$(".staffid_err").html('');
	
	var Month = $("#Month").val();
		Month = $.trim(Month);
	
	if( Month == "none" )
	{
		Err_cnt='1';
		$(".month_err").html('<span>Select Month</span>');
	}
	else
	
	
	var AcademicYear = $("#AcademicYear").val();
		AcademicYear =  $.trim(AcademicYear);
		
	if( AcademicYear == "none" || AcademicYear == "" || AcademicYear == "0" )
	{
		Err_cnt='1';
		$(".academicYear_Err").html('<span>Select Academic Year</span>');
	}
	else
		$(".academicYear_Err").html('');
	
			
	var Salary = $("#Salary").val();
		Salary = $.trim(Salary);
		
		if(Salary=='' || Salary==0)
		{
			Err_cnt='1';
			$(".SalaryErr").html('<span>Enter salary</span>');	
		}
		else
			$(".SalaryErr").html('');	
		
	if( Err_cnt=='0' )
	{
		
		if( edit_add=='add')
		{
			
			$.ajax({
				url:base_url+"MiscellaneousRequestdispatcher/addsalaries",
				type:"POST",
				data:{"StaffType":StaffType,"StaffId":Stafid,"Month":Month,"AcademicYear":AcademicYear,"Salary":Salary},
				success:function(resp)
				{
					resp = $.trim(resp);
					
					if(resp=='1')
					{
						$("form#salary_form")[0].reset();
						$(".resp_msg").html('<span class=" alert alert-success" style="padding:5px; " >Successfully added salary </span>');	
						
					}
					else
					{
						$(".resp_msg").html('<span class=" alert alert-warning" style="padding:5px; " >Failed to add salary </span>');	
					}
				}//sucess function ends here
			});	//ajax ends here	
		}
		else
		{
			var SalaryId = $("#SalaryId").val();
			
			
			$.ajax({
						url:base_url+"MiscellaneousRequestdispatcher/editsalary",
						type:"POST",
						data:{"SalaryId":SalaryId,"StaffType":StaffType,"StaffId":Stafid,"Month":Month,"AcademicYear":AcademicYear,"Salary":Salary},
						success:function(resp)
						{
							resp = $.trim(resp);
							
							if(resp=='1')
								$(".resp_msg").html('<span class=" alert alert-success" style="padding:5px; " >Successfully updated salary </span>');	
							else
								$(".resp_msg").html('<span class=" alert alert-warning" style="padding:5px; " >Unable to update </span>');	
						}//sucess function ends here
				});	//ajax ends here	
			
			
		}
		
	
	}
	
	
	
	
	
		
});


//remove the error message when focus on

$(document).on('focus','.billfor, .AmountToPay, .billdate',function()
{
		$(this).next().html('');
		$(".billrespMsg").html('');
});

//add morebills starts here

$(document).on('click','.addmorebills',function()
{
	var ErrCnt = '0';
	
	var morebills = '<div class="form-group more_bills"><div class="col-lg-2"> <input  class=" form-control billfor" id="billfor" name="billfor" type="text"  placeholder="Bill for" /> <span class="err-msg"></span></div><div class="col-lg-2"><input  class=" form-control AmountToPay" id="AmountToPay" name="AmountToPay" type="text" placeholder="Amount to pay" /><span class="err-msg"></span></div> <div class="col-lg-2"><input  class=" form-control billdate" name="billdate" type="text" placeholder="Bill date" /><span class="err-msg"></span>  </div> <div class="col-lg-2"> <input  class=" form-control billpaidto" name="billpaidto" type="text" placeholder="Bill paying to" /> </div> <div class="col-lg-3 removebill" style="padding:6px"> <span class=""> X </span> </div> <div class="clearfix"></div></div>';
	
	
	$(".billfor").each(function()
	{
		var val = $(this).val();
			val = $.trim(val);
			
		if( val=='' )	
		{
			$(this).next().html("Enter bill for");	
			ErrCnt='1';
		}
	});
	
	
	$(".AmountToPay").each(function()
	{
		var val = $(this).val();
			val = $.trim(val);
			
		if( val=='' )	
		{
			$(this).next().html("Enter payable amount");	
			ErrCnt='1';
		}
	});
	
	
	if(ErrCnt=='0')
	{
		var len = $(".more_bills").length;
			len = parseInt(len);
			
	if(  len==0 )
		$(".initial_bill").after(morebills);
	else
		$(".more_bills:last").after(morebills);
	
	}
	
	
});


//delete the add more bill

$(document).on('click','.removebill',function()
{
	if(confirm("Do you want to remove this bill") )
	{
		$(this).parent().remove();	
	}
});






$(document).on('click','#Addbill',function()
{
	var OnClick = $(this);
	var Err_cnt='0';
	var add_edit = $(this).attr('add_edit');
	
	var billamount = [];
	var billfor=[];
	var billdated=[];
	var vendor=[];
	
	$(".billfor").each(function()
	{
		var val = $(this).val();
			val = $.trim(val);
			
		if( val=='' )	
		{
			$(this).next().html("Enter bill for");	
			Err_cnt='1';
		}
		else
		{
			var newarr = {'billfor':$(this).val()};
			billfor.push(newarr);
		}
	});
	
	
	$(".AmountToPay").each(function()
	{
		var val = $(this).val();
			val = $.trim(val);
			
		if( val=='' )	
		{
			$(this).next().html("Enter payable amount");	
			Err_cnt='1';
		}
		else
		{
			var newarr = {'billamount':$(this).val()};
			billamount.push(newarr);
		}
	});
	
	var newarr='';
	
	$(".billdate").each(function()
	{
		var billdate = $(this).val();
			billdate = $.trim(billdate);
			
		if(billdate=='')
		{
			$(this).next().html("Enter bill date");	
			Err_cnt='1';
		}
		else
		{
				var newarr={'billdate':$(this).val()};
					billdated.push(newarr);
					
			$(this).next().html("");	
		}
	});
	
		var newarr='';
	
	$(".billpaidto").each(function()
	{
		var billpaidto = $(this).val();
			billpaidto = $.trim(billpaidto);
			
		if(billpaidto=='')
		{
			$(this).next().html("Enter vendor");	
			Err_cnt='1';
		}
		else
		{
				var newarr={'billpaidto':$(this).val()};
					vendor.push(newarr);
					
			$(this).next().html("");	
		}
	});
	
	if(Err_cnt=='0')
	{
		
		console.log(billfor);
		console.log(billamount);
		
		if( add_edit=='add' )
		{
			$.ajax({
						url:base_url+"Financialdispatcher/addbils",
						type:"POST",
						data:{"billfor":billfor,"billamount":billamount,"billdate":billdated,"vendor":vendor},
						success:function(resp)
						{
							resp = $.trim(resp);
							
							if(resp=="1")
							{
								
								
								$('.removebill').each(function()
								{
									$(this).parent().remove();	
									
								});
								
								
								$("form#billsForm")[0].reset();
								$(".billrespMsg").html("<span class='alert alert-success '>Bills added successfully</span>");	
							}
							else
							{
								$(".billrespMsg").html("<span class='alert alert-warning '>Unable to add contact admin</span>");	
							}
							
						}//sucess function ends here
				});//ajax ends here	
		}
		else if( add_edit=='edit' )
		{
			var BillId =$("#billid").val();
			
			$.ajax({
						
						url:base_url+"Financialdispatcher/editbill",
						type:"POST",
						data:{"BillId":BillId,"billfor":billfor,"billamount":billamount,"billdate":billdated,"vendor":vendor},
						success:function(resp)
						{
							resp = $.trim(resp);
							
							if(resp=="1")
								$(".billrespMsg").html("<span class='alert alert-success '>Bills updated successfully</span>");	
							else
								$(".billrespMsg").html("<span class='alert alert-warning '>Unable to update bill details</span>");
						}//success ends here
						
					});//ajax ends here	
		}
		
		
			
	}
	
	
});//add bill ends here


//add mopre bills ends here


//getstudents for attendance  starts here


$(document).on('change','.getstudents', function()
{
	
	var section = $(".getstudents").val();
		section = $.trim(section);
		
	var cls = $("#ClassName	").val();
		cls = $.trim(cls);
		
	
	if( section =="0" || section =='')
	{
		
	}
	else
	{
		if(cls =='0' || cls =='')
		{
			
		}
		else
		{
			var url      = window.location.href; 
			
			var getpage = url.split("/");

			window.location.href=base_url+getpage[4]+'/'+cls+'/'+section;
			
		}
	}
	
});

//getstudents for attendance ends here


//getstudents for transport starts here


$(document).on('change','.getstudentsfortransport', function()
{
	
	var section = $(".getstudentsfortransport").val();
		section = $.trim(section);
		
	var cls = $("#ClassName	").val();
		cls = $.trim(cls);
	
	var route = $("#RouteNumber").val();
			
	
	if( section =="0" || section =='')
	{
		
	}
	else
	{
		if(cls =='0' || cls =='')
		{
			
		}
		else
		{
			
			
			var url      = window.location.href; 
			
			var getpage = url.split("/");

			window.location.href=base_url+getpage[4]+'/'+cls+'/'+section+'/'+route;
			
		}
	}
	
});

//getstudents for transport ends here




$(document).on('change','.RouteNumber', function()
{
	
	var section = $(".getstudentsfortransport").val();
		section = $.trim(section);
		
	var cls = $("#ClassName	").val();
		cls = $.trim(cls);
	
	var route = $("#RouteNumber").val();
			
	
	if( cls !="0" &&  section !='0'  && route!='0')
	{
		var url      = window.location.href; 
			
			var getpage = url.split("/");

			window.location.href=base_url+getpage[4]+'/'+cls+'/'+section+'/'+route;	
	}
	
	
});

//getstudents for transport ends here




// present_absent for student starts here

	$(document).on('click','.present_absent',function()
	{
		
		
		stdId = $(this).parent().attr('stdid');	
		std = $("#"+stdId).html();
		
		if( $(this).hasClass('dan') )
		{
			$("#presentAbsModal").modal('show');	
			$(".pre_abs_msg").html('Do you want to roll back');
		}
		else
		{
			
			$("#presentAbsModal").modal('show');	
			$(".pre_abs_msg").html('Does student '+std+' absent today?');
			
		}
		
		
		
	});
	
	$(document).on('click','.yesPresent',function()
	{
		
		if( $(".stdroll_"+stdId).hasClass('dan') )
		{

			$(".stdroll_"+stdId).removeClass('dan');
			$(".stdroll_"+stdId).html('P');	
		}
		else
		{
			$(".stdroll_"+stdId).addClass('dan');
			$(".stdroll_"+stdId).html('A');
		}
		
		
	});

$(document).on('click','.SubmitAbsentees, .EdittAbsentees',function()
{
	
	var OnClick = $(this);
	
	 ClassName = $("#ClassName").val();
	 sections = $("#sections").val();
	
	var anyabsentees = $(".present_absent").hasClass('dan');
	var studentAbsent=[];
	absentees= [];
	
	
	//if click is for edit absentees list
	if(  $.trim(OnClick.html()) == "Edit Absentee List") 
	{
		$(".present_absent").each(function()
		{
				if( $(this).hasClass('dan'))
					absentees.push($(this).attr('stdRoll') );
				else
					presentees.push($(this).attr('stdRoll') );
		});
		
			if(!absentees.length)
				{
					$.ajax({
								url:base_url+'Requestdispatcher/rollbackattendance',
								type:"POST",
								data:{"ClassId":ClassName,"SectionId":sections},
								success:function(resp)
								{
									resp = $.trim(resp);
			if(resp=='0')
				$(".attendance-msg").html("<div class='alert alert-danger' style=' padding: 7px 15px !important;'>Unable to update attendance  </div>");
			if(resp=='1')
				$(".attendance-msg").html("<div class='alert alert-success' style=' padding: 7px 15px !important;'>Attendance Updated Successfully</div>");
				
								}//success ends here
								
							});	//ajax ends here
				}	
				else
				{
						
					$.ajax({
								url:base_url+'Requestdispatcher/rollbackattendance',
								type:"POST",
								data:{"ClassId":ClassName,"SectionId":sections,"absenteesList":absentees},
								success:function(resp)
								{
									resp = $.trim(resp);
									if(resp=='0')
				$(".attendance-msg").html("<div class='alert alert-danger' style=' padding: 7px 15px !important;'>Unable to update attendance  </div>");
			if(resp=='1')
				$(".attendance-msg").html("<div class='alert alert-success' style=' padding: 7px 15px !important;'>Attendance Updated Successfully</div>");
	
									}//success function ends here
									
							});	
											
				}
					
			
				
		
	}
	else //if click is for add absentees starts here
	{
	
	if(anyabsentees)
	{
		$(".dan").each(function()
		{
			absentees.push($(this).attr('stdRoll') );
			studentAbsent.push( $("#"+$(this).attr('stdRoll')).html() );
		});
	}
	var numberofabsentes = absentees.length;
		numberofabsentes  = parseInt(numberofabsentes);
		
		console.log(typeof(numberofabsentes)+":"+numberofabsentes);
		
	if( numberofabsentes>0)
	{
		$("#absenteeslist").modal('show');
		
		//absenteelist
		var absenteelist='';
		$.each(studentAbsent,function(ind,val)
		{
			console.log(val);
			absenteelist=absenteelist+'<li>'+val+"</li>";
		});
		

		$(".absenteelist").html(absenteelist);
		
		
		
		
	}
	else
	{
				$.ajax({
							url:base_url+'Requestdispatcher/makeabsent',
							type:"POST",
							data:{"ClassId":ClassName,"SectionId":sections,"absenteesList":absentees},
							success:function(resp)
							{
								resp = $.trim(resp);
								if(resp=='-1')
								{
									$(".attendance-msg").html("<div class='alert alert-danger' style=' padding: 7px 15px !important;'>Attendance already done for today </div>");
								}
							}
						});
			
		}
	}//if click is for add absentees end shere

});

$(".yesConfirm").on('click', function()
{

	
			$.ajax({
					url:base_url+'Requestdispatcher/makeabsent',
					type:"POST",
					data:{"ClassId":ClassName,"SectionId":sections,"absenteesList":absentees},
					success:function(resp)
					{
						resp = $.trim(resp);
if(resp=='-1')
	$(".attendance-msg").html("<div class='alert alert-danger' style=' padding: 7px 15px !important;'>Attendance already done for today </div>");
						
if(resp=='1')
	$(".attendance-msg").html("<div class='alert alert-success' style=' padding: 7px 15px !important;'>Attendance added successfully for today </div>");

if( resp =="-2" )
	$(".attendance-msg").html("<div class='alert alert-danger' style=' padding: 7px 15px !important;'>Please make a rollback and submit </div>");

					}
				});
			
		});

//present_absent for student ends here


	$(document).on('click','.add_remove',function()
	{
		
		stdId = $(this).parent().attr('stdid');	
		std = $("#"+stdId).html();
		
		if( $(this).hasClass('dan') )
		{
			//$("#presentAbsModal").modal('show');	
			//$(".pre_abs_msg").html('Do you want to roll back');
			$(this).removeClass('dan');
			$(this).addClass('added');
			//$(this).html('-');
		}
		else
		{
			if( $(this).hasClass('added') )
			{
				$(this).removeClass('added');
				$(this).addClass('dan');
				//$(this).html('+');
			}
			//$("#presentAbsModal").modal('show');	
			//$(".pre_abs_msg").html('Does student '+std+' absent today?');
			
		}
		
		
		
	});



//addstudenttoroute starts here

$(document).on('click','.addstudenttoroute',function()
{
	var RouteNumber = $("#RouteNumber").val();
		RouteNumber = $.trim(RouteNumber);
	
	var ClassName = $("#ClassName").val();
		ClassName = $.trim(ClassName);
		
	var section = $("#sections").val();
		section = $.trim(section);
	
	
	if(RouteNumber=='0' || RouteNumber=='')
	{
		
		$(".assignstudent-msg").html('<div class="alert alert-danger">Select route to assign student</div>');
		return false;	
	}
	else
		$(".assignstudent-msg").html('');
	
	if( ClassName=='0' || ClassName=='' )
	{
		
		$(".assignstudent-msg").html('<div class="alert alert-danger">Select class and section to assign student to a route</div>');
		return false;	
	}
	else
		$(".assignstudent-msg").html('');
		
	
	if( section=='0' || section=='' )
	{
		
		$(".assignstudent-msg").html('<div class="alert alert-danger">Select  section to assign student to a route</div>');
		return false;	
	}
	else
		$(".assignstudent-msg").html('');
	
	
	
	var students=[];
//	absentees= [];
	
	var total_assigned = $(".add_remove").hasClass('added');
	
	if(total_assigned)
	{
		$(".assignstudent-msg").html('');
		
		
		$(".add_remove").each(function() 
		{ 
			var Roll = $(this).attr('stdRoll');
		
			if( $(this).hasClass('added') )
			{
				var newarr = {"StudentRoll":Roll,"Added":"Yes"};
				students.push(newarr);
			}
			else
			{
				var newarr = {"StudentRoll":Roll,"Added":"No"};
				students.push(newarr);
			}
			
		});
		
		console.log(students);
		
		$.ajax({
					url:base_url+'MiscellaneousRequestdispatcher/assignstudenttoroute',
					type:"POST",
					data:{"RouteNumber":RouteNumber,"ClassName":ClassName,"section":section,"students":students},
					success:function(resp)
					{
						$(".assignstudent-msg").html('<div class="alert alert-success">Students are successfully assigned to the route</div>');
					}//success function ends here
				});//ajax ends here
		
	}
	else
	{
		$(".assignstudent-msg").html('<div class="alert alert-danger">Select atleast one student to assign to a route</div>');
		return false;	
	}
	
	
	
	
	
	
});


//addstudenttoroute ends here


// remove the fileter for view student fee details

	$(document).on('click','.clearfilter',function()
	{
			var FilterFor  = $(this).attr('id');
			
		//	alert(FilterFor);
			$.ajax({
					url:base_url+"MiscellaneousRequestdispatcher/clearfilters",
					type:'POST',
					async: true,
					data:{"FilterFor":FilterFor},
					success:function()
					{
						var pathname = window.location.pathname; // Returns path only
						var url      = window.location.href;
						window.location.href = url;
					}
					});
					
	});

// remove the fileter for view student fee details end here


//get the fee details of every month till the current of individual student

	$(document).on('click','.viewnow',function()
	{
		viewpay=$(this);
		var viewid = $(this).attr('viewid');
		var tr ='';
		var slno = '';
		
		$(".feedetails_std").html('');
		
		$.ajax({
					url:base_url+'MiscellaneousRequestdispatcher/getfeedetailsStudent',
					type:'POST',
					data:{"viewid":viewid},
					async: true,
					success:function(resp)
					{
						resp = $.trim(resp);
						
						if(resp!='0')
						{
							resp = JSON.parse(resp);
							
						
							
							$.each(resp, function(ind,val)	
							{
								slno = ind+1;	
								tr =tr+'<tr>';
								tr=tr+'<td>'+slno+'</td>';
								tr=tr+'<td>'+val.RollNo+'</td>';
								tr=tr+'<td>'+val.StudentName+'</td>';
								tr=tr+'<td>'+val.ClassNaam+'</td>';
								
								tr=tr+'<td>'+val.SectionNaam+'</td>';
								tr=tr+'<td>'+val.Month+'</td>';
								tr=tr+'<td>'+val.AcademicYr+'</td>';
								
								tr=tr+'<td>'+val.PaidAmount+'</td>';
								tr=tr+'<td>'+val.MonthlyFee+'</td>';
								tr=tr+'<td>'+val.DueAmount+'</td>';
								tr=tr+'<td><button type="button" class="btn btn-success payStdntfee" mnth='+val.mnth+' stdnt='+val.StudentId+'  style="margin-right:15px;">Pay Now</button></td>';
								
								tr+= '</tr>';
								//$(".feedetails_std").append(tr);
							});
							
							$(".feedetails_std").html(tr);
							
						}
					}//success ends here
			
				});//ajax ends here
				
	});//viewnow clicks ends here

//get the fee details of every month till the current of individual student ends here


$(document).on('click','.payStdntfee',function()
{
	
	$(".Fee-Payment-Msg").html('');
	
	var Stdid 	= $(this).attr('stdnt');
	var feemnth = $(this).attr('mnth'); 
	
	$(".closepayview").trigger('click');
		setTimeout(function()
		{ 
	 		$("#add-fee").modal('show');
			
			$.ajax({
						url:base_url+'MiscellaneousRequestdispatcher/getFeedue',
						type:"POST",
						async:true,
						data:{"Stdid":Stdid,"Feemnth":feemnth},
						success:function(resp)
						{
							resp = $.trim(resp);
							resp = JSON.parse(resp);
							
							console.log(resp[0].Due);
							
							
							$.each(resp,function(ind,val)
							{
							
								$(".Student_Name").html(val.StudentName);

								$(".Student_Name").attr('StudentId',val.StudentId);
								
								$(".Student_Class").html(val.ClassNaam);
								
								$(".Student_Class").attr('ClassId',val.ClassId);
								
								$(".Student_Section").html(val.SectionNaam);
								$(".Student_Section").attr('Secid',val.Secid);
								
								
								$(".Student_Roll").html(val.RollNo);

								$("#Fee_Month").html(val.Month);
								
								$(".Fee_Month").html(val.Month);
								$(".Fee_Month").attr('mnth',val.mnth);
								
								
								$(".Fee_Due").html(val.Due);
								
									var Dueamount = parseFloat(val.Due);
									
								console.log(Dueamount);
								if( Dueamount>0 )
								{
									var chk_btn=$("#paymonthfee").length;
									var chk_content = $(".DueAmntsection").html();
									
									if(chk_btn>0)
									{
									}
									else
									{
										$(".backtoview").after(' <button type="button" class="btn btn-default" id="paymonthfee" >Submit</button>');
									}
									if( $.trim(chk_content)!='' )
									{
									}
									else
									{
										var content = ' <label for="pwd" class="col-md-3"><strong>Enter Amount </strong></label><input type="text" class="form-control col-md-9" style="width:75%;" name="DueAmnt" id="DueAmnt" placeholder="Pay due amount " /><div class="clearfix"></div>'; 
										$(".DueAmntsection").html(content);
									}
									
									
								}
								else
								{
									$("#paymonthfee").remove();	
									$(".DueAmntsection").html('');
								}
								
								$("#DueAmnt").focus();
								
							});//$.each ends here
							
						} //sucess ends here
				
					});//ajax ends here
			
			$(document).on('click','.backtoview',function()
			{
				var chk_btn=$("#paymonthfee").length;
				
				if(chk_btn>0)
				$("#DueAmnt").val('');
				
				
				$(".feedetails_std").html('');
				$(".cancelFeePayment").trigger('click');
				$("#paymonthfee").attr('disabled',false);
				
				
				setTimeout(function(){
										
										$(viewpay).trigger('click');
										$(".feedetails_std").html('');
									},111);
				

				
				
			});
			
		}, 150);
	
});


// pay the month fee of a student


$(document).on('click','#paymonthfee',function()
{
	
	var OnClick = $(this);
	
	var err_cnt='0';
	
	var StudentId = $(".Student_Name").attr('studentid');
	var ClassId = $(".Student_Class").attr('ClassId');
	
	var SectionId = $(".Student_Section").attr('secid');
	var Fee_Month = $(".Fee_Month").attr('mnth');
	
	var DueAmnt = $("#DueAmnt").val();
		DueAmnt = $.trim(DueAmnt);
		
		DueAmnt = parseFloat(DueAmnt);
		
	var Fee_Due = $(".Fee_Due").html();
		Fee_Due = $.trim(Fee_Due);
		
		Fee_Due = parseFloat(Fee_Due);
		
	if(DueAmnt>0 && DueAmnt<=Fee_Due)
	{
		$(".DueAmnt_Err").css({'margin-left':'137px','display':'none'}).html('');

		
	}
	else
	{
		err_cnt='1';
		$(".DueAmnt_Err").css({'margin-left':'137px','color':'#f00','display':'block'}).html('Check the due amount');
	}
	
	if(err_cnt=='0')
	{
		$.ajax({
				//url:base_url+'MiscellaneousRequestdispatcher/addMonthFee',
				url:base_url+'MiscellaneousRequestdispatcher/payfeebyajax',
				type:"POST",
				data:{"StudentId":StudentId,"ClassId":ClassId,"SectionId":SectionId,"Fee_Month":Fee_Month,"PayingDue":DueAmnt},
				beforeSend:function(){ OnClick.removeClass('btn-default'); OnClick.addClass('btn-primary'); OnClick.html('Payment processing');  OnClick.attr('disabled',true); },
				success:function(resp)
				{
					 /*resp = $.trim(resp);
					 
					 OnClick.attr('disabled',false);
					 
					 OnClick.removeClass('btn-primary'); 
					 
					 OnClick.addClass('btn-default'); 
					 OnClick.html('Pay Now');  
					
					if(resp=='1')
					{
						$(".Fee-Payment-Msg").html('<div class="alert alert-success">Fee paid successfully</div>');		
						$("#DueAmnt").val('');
					}
					else if(resp=='0')
					{
						$(".Fee-Payment-Msg").html('<div class="alert alert-danger">Due to technical issues fee payment failed</div>');		
						$("#DueAmnt").val('');
					}
					else if(resp=='-1')
					{
						$(".Fee-Payment-Msg").html('<div class="alert alert-warning">Kindly check the amount entered</div>');		
						
					}*/
					location.href=base_url+"MiscellaneousRequestdispatcher/payfee";
					
				}
				});
	}
		
	
});

//pay the month fee of a student ends j\here
	
	
	//assign homw work id to the popup hidden variable
	
	
	$(document).on('click','.homework_comments',function()
	{
		
		var homeworkid = $(this).attr('id');
		$("#HomeworkId").val(homeworkid);
		$(".homework_submisstion_resp").html('');
		
	});
	
	
	$(document).on('focus','textarea#homeworkcomments',function()
	{
		$(".homeworkcomments-err").html("");	
	});
	
	$(document).on('change','#homework-status',function()
	{
		if( $(this).val()=="0")
			$(".homework-status-err").html('Select Status');	
		else
			$(".homework-status-err").html('');
	});
	
	
	
	//homw work submission
	
	$(document).on('click','.submit_homework',function()
	{
		
		var homeworkid = $("#HomeworkId").val();
		var homeworkcomments = $("textarea#homeworkcomments").val();
			homeworkcomments = $.trim(homeworkcomments);
		
		var homeworkstatus = $("#homework-status").val();
			homeworkstatus = $.trim(homeworkstatus);
		
		var Err_cnt='0';
			
			if( homeworkcomments =='' )
			{
				Err_cnt = '1';
				$(".homeworkcomments-err").html("Enter Your Comments");
			}
			else
				$(".homeworkcomments-err").html("");
		
		
		if( homeworkstatus == "0")
		{
			$(".homework-status-err").html('Select Status');	
			Err_cnt = '1';
		}
		else
			$(".homework-status-err").html('');
		
		
		if( Err_cnt=="0" )
		{
			$.ajax({
					
					url:base_url+'Parentrequestdispatcher/homeworksubmission',
					type:'POST',
					data:{"homeworkid":homeworkid,"homeworkcomments":homeworkcomments,"homeworkstatus":homeworkstatus},
					success:function(resp)
					{
						resp = $.trim(resp);
						
						if(resp=="1")
						{
							$(".homework_submisstion_resp").html("<p class='alert alert-success'>Home work submitted successfully</p>");
							$(".Homework_"+homeworkid).remove();
							
							if($('.SLNO').length>=2)
							{
								$('.SLNO').each(function(ind,val)
								{
									var slno = ind;
										slno = parseInt(slno);
										slno = (slno)+1;
										$(this).html(slno);
										
								});
							}
							else if($('.SLNO').length==1)
							{
								window.location.reload();
							}

							$("form#Homework-form")[0].reset();
								
							
						}
						else if(resp=="0")
							$(".homework_submisstion_resp").html("<p class='alert alert-warning'>Unable to update home work</p>");
						else if( resp=="-1" || resp=="-2" )
							$(".homework_submisstion_resp").html("<p class='alert alert-danger'>Unauthorized Data Submission</p>");
							
						
					}//success function ends here
				
				
				}); //ajax ends here
		}
		
		
	});

	
	
	//get the payment tranactions details in how may installments user had paid a month fee
	
	$(document).on('click','.transaction_details',function()
	{
		var student = $(this).attr('stdnt');
		var month = $(this).attr('mnth');
		
		$.ajax({
				url:base_url+'MiscellaneousRequestdispatcher/transactionDetails',
				type:"POST",
				data:{"studentID":student,"month":month},
				success:function(resp)
				{
					resp = JSON.parse(resp);
					var rows='';
					$slno=0;
					$.each(resp,function(ind,val)
					{
						$slno=($slno)+1;
						
						rows = rows+'<tr><td>'+$slno+'</td>';
						rows = rows+'<td>'+val.Month+'</td>';
						rows = rows+'<td>'+val.Academic+'</td>';
						rows = rows+'<td>'+val.ActualFee+'</td>';
						rows = rows+'<td>'+val.Paid+'</td>';
						rows = rows+'<td>'+val.Due+'</td>';
						rows = rows+'<td>'+val.PaidOn+'</td>';
						rows = rows+'<td>'+val.CardNo+'</td>';
						rows = rows+'<td>'+val.TransactionId+'</td></tr>';
					});
					
					$(".feeTransactionDetails").html(rows);
				}
			
			});
	});



//get the transport info

$(".btn-pref .btn").click(function () {
    $(".btn-pref .btn").removeClass("btn-primary").addClass("btn-default");
    // $(".tab").addClass("active"); // instead of this do the below 
    $(this).removeClass("btn-default").addClass("btn-primary");   
});



//make all presents

$(".allpresent").on('click',function()
{
	var enrollids = [];
	
	
	$(".teacherenrollids").each(function()
	{
		
		var newarr = {'teacher':$(this).attr('id')};
		enrollids.push(newarr);
		
		
	});
	console.log(enrollids);
	
	
	$.ajax({
				url:base_url+'Teacher/takeattendance',
				type:"POST",
				data:{"teacherid":enrollids,"PresentAbsent":'Y',"individual":"no"},
				success:function(resp)
				{
					resp = $.trim(resp);
					if(resp=="0")
					{
						alert("Attendance already taken for today");	
					}
					else
					{
						
					
					var grandparent = $(".teachersinfo .btn-group");
					
					//loop through the children of the parent 
						grandparent.children().each(function(ind,val)
							{
								
								if( $(this).data('title')=="Y" )
								{
									$(this).removeClass('absent');
									$(this).addClass('present');
								}
								
								if( $(this).data('title')=="N" )
								{
									$(this).removeClass('present');
									$(this).addClass('absent');
								}
									
							});
						
							
					
					
						
					}
				}	
			});//ajax ends here
	
});


//get teacher attandance

if(Currentpge=="teacher-attandance")
{
	$.ajax({
			url:base_url+'Teacher/getTeacherattandance',
			success:function(resp)
			{
				
				resp= $.trim(resp);
				resp = JSON.parse(resp);
				
				if(resp!='0')
				{
					$.each(resp,function(ind,val)
					{
						
						
						if( val.Present=="Y")
						{
							var parent = $(".btn-group[Teacherid='"+val.TeacherId+"']");
							
							parent.children().each(function(ind,val)
							{
								
								if(ind==0)
								{
									$(this).addClass('present');
									$(this).removeClass('absent');
									
								}
								else
								{
									$(this).addClass('absent');
									$(this).removeClass('present');
								}
								
								
							});
							
							
							
						}
						
						if( val.Present=="N")
						{
							
							var parent = $(".btn-group[Teacherid='"+val.TeacherId+"']");
							
							//loop through the children of the parent 
							parent.children().each(function(ind,val)
							{
								//first child
								if(ind==0)
								{
									$(this).removeClass('present');
									$(this).addClass('absent');
									
								}
								else//next child
								{
									$(this).removeClass('absent');
									$(this).addClass('present');
								}
								
								
							});
							
							
							
						}
						
								
					});
				}
				else
				{
					
					var grandparent = $(".teachersinfo .btn-group");
					
					//loop through the children of the parent 
						grandparent.children().each(function(ind,val)
							{
								
								if( $(this).data('title')=="Y" )
								{
									$(this).removeClass('present');
									$(this).addClass('absent');
								}
								
								if( $(this).data('title')=="N" )
								{
									$(this).removeClass('absent');
									$(this).addClass('present');
								}
									
							});
						
							
					
				}
				
				
				
			}//success function ends here
		
		
		});
}

//get teacher attendance ends here





$('#radioBtn a').on('click', function(){
	
	
	var onclick = $(this);
	var parentide = $(this).parent().attr('Teacherid');

	var teachername = $("#"+parentide).html();
	
    var sel = $(this).data('title');
    var tog = $(this).data('toggle');
    $('#'+tog).prop('value', sel);
    
    //$('a[data-toggle="'+tog+'"]').not('[data-title="'+sel+'"]').removeClass('present').addClass('absent');
    //$('a[data-toggle="'+tog+'"][data-title="'+sel+'"]').removeClass('absent').addClass('present');
	var chkconfirm="0";
	var next='';
	var prev='';
	
	if( sel=="Y")
	{
		if(confirm("Does "+teachername+" present today"))
		{
			next = onclick.next();
			
			chkconfirm="1";
			var teacherid = parentide;
			var PresentAbsent = sel;
		}

	}
	else if( sel=="N")
	{
		if(confirm("Does "+teachername+" absent today"))
		{
			prev=onclick.prev();
			chkconfirm="1";
			var teacherid = parentide;
			var PresentAbsent = sel;
		}
	}
	
	if( chkconfirm == "1" )
	{
		
		$.ajax({
				url:base_url+'Teacher/takeattendance',
				type:"POST",
				data:{"teacherid":teacherid,"PresentAbsent":PresentAbsent,"individual":"yes"},
				success:function(resp)
				{
					resp = $.trim(resp);
					
					if(resp=="1")
					{
						if(PresentAbsent=="Y")
						{
							next.removeClass('present').addClass('absent');	
							onclick.removeClass('absent').addClass('present');	
						}
						else if(PresentAbsent=="N")
						{
							onclick.removeClass('absent').addClass('present');
							prev.removeClass('present').addClass('absent');	
						}
						
					}
				}
					
					
				});//ajax ends here
			
	}
	
	
}); //teacher attendance ends here


}); //document ready ends hre





//http://www.daterangepicker.com/#ex3




$(function() {
    $('input[name="dob"]').daterangepicker({
        singleDatePicker: true,
        showDropdowns: true
    }, 
    function(start, end, label) {
        var years = moment().diff(start, 'years');
       // alert("You are " + years + " years old.");
    });
	
	
	  $('input[name="doa"]').daterangepicker({
        singleDatePicker: true,
        showDropdowns: true
    }, 
    function(start, end, label) {
        var years = moment().diff(start, 'years');
       // alert("You are " + years + " years old.");
    });
	
});





$(document).on('change','.selectTeacher',function()
{
	$(".picupdated").remove();
	
	var selectTeacher = $(this).val();
		selectTeacher = parseInt(selectTeacher);
	
		
	if( selectTeacher>0 )
	{
		$(".selectTeacher").removeClass('err-border');
		$.ajax({
				
				url:base_url+'Teacher/TeacherDetails',
				type:"POST",
				data:{'TeacherId':selectTeacher,"whichdata":"Personal"},
				success:function(resp)
				{
					
					resp= $.trim(resp);
					$("#personalinfoform").css({"display":'block'});
					
					$("#personalinfoform .form-control").removeClass('err-border');
					
					$("#doa").val('');
					
					$('html, body').animate({
						scrollTop: $( "#personalinfoform" ).offset().top
						}, 1200);
					
					if(resp=='0')
					{
						$("#backgroundpic").prop('src','resources/teachers-profile-pics/sampleprofilepic.jpg');
						$("#thumbnailprofilepic").prop('src','resources/teachers-profile-pics/sampleprofilepic.jpg');
						$(".teacher-name").html('TeacherName').css({"color":"#fff"});
						$("form#personalinfoform")[0].reset();
						
						$(".tab-pane").removeClass('active');	
						$(".PersonalInfo").addClass('active');
						
						$(".tab-role").removeClass('btn-primary');
						$(".tab-role").addClass('btn-default');
						
						$("#PersonalInfo").removeClass('btn-default');
						$("#PersonalInfo").addClass('btn-primary');
						
						
					}
					else
					{
						
						resp = JSON.parse(resp);
						
						if(resp.ProfilePic!='')
						{
							$("#backgroundpic").prop('src',base_url+resp.ProfilePic);
							$("#thumbnailprofilepic").prop('src',base_url+resp.ProfilePic);
						}
						else
						{
							$("#backgroundpic").prop('src','resources/teachers-profile-pics/sampleprofilepic.jpg');
							$("#thumbnailprofilepic").prop('src','resources/teachers-profile-pics/sampleprofilepic.jpg');
						}
						$(".teacher-name").html(resp.TeacherName).css({"color":"#fff"});
						
						$(".tab-pane").removeClass('active');	
						$(".PersonalInfo").addClass('active');
						
						$(".tab-role").removeClass('btn-primary');
						$(".tab-role").addClass('btn-default');
						
						$("#PersonalInfo").removeClass('btn-default');
						$("#PersonalInfo").addClass('btn-primary');
						
						
						$("#surname").val(resp.SurName);
						$("#lastname").val(resp.LastName);
						
						
						$('#MaritialStatus').val(resp.MaritialStatus);
						$("#spousename").val(resp.Spouse);
						
						$("#dob").val(resp.DOB);
						$("#doa").val(resp.DOA);
						

						
						
					}
					
						
					
				}//success function ends here
					
					
				});	//ajax ends here
	}
	else
		$("form#personalinfoform")[0].reset();

	
});


$(document).on('focus',"#surname, #lastname, #MaritialStatus, #spousename, #dob, #doa",function()
{
	$(this).removeClass('err-border');	
});


$(document).on('change','#MaritialStatus',function()
{
		var MaritialStatus = $(this).val();
		MaritialStatus = $.trim(MaritialStatus);
		
		if( MaritialStatus=="0" || MaritialStatus=="UnMarried" )
		{
			$("#spousename").prop('disabled',true);
		}
		else
			$("#spousename").prop('disabled',false)	;
		
});

$(document).on('click','.tab-role',function()
{
	
	$(".picupdated").remove();
	
	$(".contactdetailsUpdatedMsg").html('');
	$(".personaldetailsUpdatedMsg").html('');
	
	
	var ide = $(this).attr('id');
		ide = $.trim(ide);
		
	var href = $(this).attr('href');
		href= $.trim(href);
		href= href.split("#");
		
		
	var selectTeacher = $(".selectTeacher").val();
		selectTeacher = $.trim(selectTeacher);
		selectTeacher = parseInt(selectTeacher);
		
		
		
		if(selectTeacher>0)
		{
			$(".tab-pane").removeClass('active');	
			$("."+href[1]).addClass('active');
			
			var selectTeacher = $(".selectTeacher").val();
			selectTeacher = parseInt(selectTeacher);
			
			if( href[1]=="tab1" )
				var whichdata='Personal';
			else if( href[1]=="tab2" )
				var whichdata='Contact'; 
			else
				var whichdata='AssignedClasses'; 
		
	if( selectTeacher>0 )
	{
		$(".selectTeacher").removeClass('err-border');
		$.ajax({
				
				url:base_url+'Teacher/TeacherDetails',
				type:"POST",
				data:{'TeacherId':selectTeacher,"whichdata":whichdata},
				success:function(resp)
				{
					
					resp= $.trim(resp);
					
					
					if(resp=='0')
					{
						if(whichdata=="Personal")
						{
							$("#personalinfoform").css({"display":'block'});
							
							$("#personalinfoform .form-control").removeClass('err-border');
							
							$("#doa").val('');
							
							$('html, body').animate({
							scrollTop: $( "#personalinfoform" ).offset().top
							}, 1200);
							
							$("#backgroundpic").prop('src','resources/teachers-profile-pics/sampleprofilepic.jpg');
							$("#thumbnailprofilepic").prop('src','resources/teachers-profile-pics/sampleprofilepic.jpg');
							$(".teacher-name").html('TeacherName').css({"color":"#fff"});
							$("form#personalinfoform")[0].reset();
							
							$(".tab-pane").removeClass('active');	
							$(".PersonalInfo").addClass('active');
							
							$(".tab-role").removeClass('btn-primary');
							$(".tab-role").addClass('btn-default');
							
							$("#PersonalInfo").removeClass('btn-default');
							$("#PersonalInfo").addClass('btn-primary');
						}
						
						else if( whichdata == "Contact" )
						{
							$("#contactinfoform").css({"display":'block'});
							
							$("#contactinfoform .form-control").removeClass('err-border');
							
							$('html, body').animate({
							scrollTop: $( "#contactinfoform" ).offset().top
							}, 1200);
							
							$("form#contactinfoform")[0].reset();
							
							
						}
						else
						{
							$(".classesassigned tbody").html('');	
							$(".classesassigned").css({'display':'none'});

						}
						
					}
					else
					{
						
						resp = JSON.parse(resp);
						
						if(whichdata=="Personal")
						{
							
							
							if(resp.ProfilePic!='')
							{
								$("#backgroundpic").prop('src',base_url+resp.ProfilePic);
								$("#thumbnailprofilepic").prop('src',base_url+resp.ProfilePic);
							}
							else
							{
								$("#backgroundpic").prop('src','resources/teachers-profile-pics/sampleprofilepic.jpg');
								$("#thumbnailprofilepic").prop('src','resources/teachers-profile-pics/sampleprofilepic.jpg');
							}
								$(".teacher-name").html(resp.TeacherName).css({"color":"#fff"});
								
								$(".tab-pane").removeClass('active');	
								$(".PersonalInfo").addClass('active');
							
								$(".tab-role").removeClass('btn-primary');
								$(".tab-role").addClass('btn-default');
							
								$("#PersonalInfo").removeClass('btn-default');
								$("#PersonalInfo").addClass('btn-primary');
							
							
								$("#surname").val(resp.SurName);
								$("#lastname").val(resp.LastName);
							
							
								$('#MaritialStatus').val(resp.MaritialStatus);
								$("#spousename").val(resp.Spouse);
							
								$("#dob").val(resp.DOB);
								$("#doa").val(resp.DOA);	
						
						
						}
						else if(whichdata=="Contact")
						{
							
							$("#contactinfoform").css({"display":'block'});
							
							$("#contactinfoform .form-control").removeClass('err-border');
							
							$('html, body').animate({
							scrollTop: $( "#contactinfoform" ).offset().top
							}, 1200);
							
							
							$("#contactnumber").val(resp.ContactNumber);
							$("#alternatenumber").val(resp.AlternateNumber);
							
							$("#email").val(resp.Email);
							$("#landmark").val(resp.Landmark);
							
							$("#address").val(resp.Address);
						}
						
						else
						{
							var tr="";
							
							$.each(resp,function(ind,val)
							{
								tr=tr+"<tr>";

								tr=tr+"<td>"+val.SerialNo+"</td>";
								tr=tr+"<td>"+val.TeacherName+"</td>";
								
								tr=tr+"<td>"+val.ClassName+"</td>";
								tr=tr+"<td>"+val.Section+"</td>";
								
								tr=tr+"<td>"+val.Subject+"</td>";
								tr=tr+"<td><a href='http://localhost/adi-akshara/edit-assigned-teacher/"+val.SLNO+"' class='btn btn-success'>Edit</a></td>";
									
								tr=tr+"</tr>";	
							});
							
							$(".classesassigned").css({'display':'block'});
							$(".classesassigned tbody").html(tr);
						}
		
									
						
						
					}
					
						
					
				}//success function ends here
					
					
				});	//ajax ends here
	}
	else
		$("form#personalinfoform")[0].reset();
			
		}
		else
		{
			console.log('hey');
			$(".tab-pane").removeClass('active');	
			$(".tab1").addClass('active');
			
			$(".tab-role").removeClass('btn-primary');
			$(".tab-role").addClass('btn-default');
			
			$("#PersonalInfo").removeClass('btn-default');
			$("#PersonalInfo").addClass('btn-primary');
			
			$("form#personalinfoform")[0].reset();
			$(".selectTeacher").addClass('err-border');
			$('html, body').animate({
						scrollTop: $(".breadcrumb").offset().top
						}, 1200);
		}
		
	
});

$(document).on('click','.updatepersonalinfo',function()
{
	
	var Err_cnt='0';
	var OnClick = $(this);
	var Spouse = '';
	
	var surname = $("#surname").val();
		surname = $.trim(surname);
	
	if(surname=='')
	{
		Err_cnt='1';
		
		$("#surname").addClass('err-border');	
	}
	else
		$("#surname").removeClass('err-border');
		
		
		
	var lastname = $("#lastname").val();
		lastname = $.trim(lastname);
	
	if(lastname=='')
	{
		Err_cnt='1';
		
		$("#lastname").addClass('err-border');	
	}
	else
		$("#lastname").removeClass('err-border');
		
	var MaritialStatus = $("#MaritialStatus").val();
		MaritialStatus = $.trim(MaritialStatus);
		
	
	if(MaritialStatus=='0')
	{
		Err_cnt='1';
		
		$("#MaritialStatus").addClass('err-border');
		
	}
	else
	{
		$("#MaritialStatus").removeClass('err-border');	
	}
	
	if( !$("#spousename").prop('disabled') )
	{
		Spouse = $("#spousename").val();
	}
	
	
	var DOB = $("#dob").val();
		DOB = $.trim(DOB);
		
		if( DOB=='')
		{
			$("#dob").addClass('err-border');
			Err_cnt='1';
		}
		else
			$("#dob").removeClass('err-border');

	var DOA = $("#doa").val();
		DOA = $.trim(DOA);
	
	var selectTeacher = $(".selectTeacher").val();
		selectTeacher = $.trim(selectTeacher);
		selectTeacher = parseInt(selectTeacher);
		
		if(selectTeacher>0)
		{
			$(".selectTeacher").removeClass('err-border');
		}
		else
		{
			Err_cnt='1';
		 	$(".selectTeacher").addClass('err-border');
			$('html, body').animate({
						scrollTop: $(".breadcrumb").offset().top
						}, 1200);
				
		}
		
		
	if(Err_cnt=='0')
	{
		$.ajax({
				url:base_url+"Teacher/updateDetails",
				type:'POST',
				data:{"selectTeacher":selectTeacher,"whichdata":"Personal","surname":surname,"lastname":lastname,"MaritialStatus":MaritialStatus,"Spouse":Spouse,"DOB":DOB,"DOA":DOA},
				success:function(resp)
				{
					resp = $.trim(resp);
					
					if(resp=="1")
					{
						$(".personaldetailsUpdatedMsg").html("<span class='alert alert-success'>Personal information updated successfully</psan>");	
					}
					
				} //success function ends here
				
				
			});	
	}
	
	
	
			
	
});




//allow only numerics in the contact number and alternate contact number fields

//$("#quantity").keypress(function (e) {
	$(document).on('keypress','#contactnumber, #alternatenumber',function(e)
	{
     //if the letter is not digit then display error and don't type anything
     	if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) 
	 	{
     		$(this).addClass('err-border');
			
			$(this).val('');
			$(this).prop('placeholder','Only numerics allowed');
     		return false;
    	}
		else
			$(this).removeClass('err-border');
		
   });


$(document).on('click','.updatecontactinfo',function()
{
	var selectTeacher = $(".selectTeacher").val();
		selectTeacher = $.trim(selectTeacher);
		selectTeacher= parseInt(selectTeacher);
		
		if(selectTeacher>0)
		{
			
	var Err_cnt='0';
	
	var Onclick = $(this);
	
	var contactnumber = $("#contactnumber").val();
		contactnumber = $.trim(contactnumber);
		
	if( contactnumber.length>10 || contactnumber.length==0)	
	{
		$("#contactnumber").addClass('err-border');
		Err_cnt='1';
		
		if( $(".err-section li.contact-number-err").length==0)
			$(".err-section").append('<li class="contact-number-err">Contact number should be of 10 characters</li>');
	}
	else if( contactnumber.length<9 && contactnumber.length>0 )	
	{
		$("#contactnumber").addClass('err-border');
		Err_cnt='1';
		
		if( $(".err-section li.contact-number-err").length==0)
			$(".err-section").append('<li class="contact-number-err">Contact number should be of 10 characters</li>');
	}
	else
	{
		$("#contactnumber").removeClass('err-border');
		$(".err-section li.contact-number-err").remove();
	}
		
	
	var alternatenumber = $("#alternatenumber").val();
		alternatenumber = $.trim(alternatenumber);
		
		if(alternatenumber!='')
		{
			if( alternatenumber.length>10)	
			{
				$("#alternatenumber").addClass('err-border');
				Err_cnt='1';
				
				if( $(".err-section li.alternate-err").length==0)
					$(".err-section").append('<li class="alternate-err">Alternate number should be of 10 characters</li>');
			}
			else if( alternatenumber.length<9 && alternatenumber.length>0 )	
			{
				$("#alternatenumber").addClass('err-border');
				Err_cnt='1';
	
				if( $(".err-section li.alternate-err").length==0)
					$(".err-section").append('<li class="alternate-err">Alternate number should be of 10 characters</li>');
			}
			else
			{
				$("#alternatenumber").removeClass('err-border');
				$(".err-section li.alternate-err").remove();
				
			}
		}
		else
		{
			$("#alternatenumber").removeClass('err-border');
			$(".err-section li.alternate-err").remove();
		}
		
		

		var email = $("#email").val();
			email = $.trim(email);
			
			if( email!='')
			{
				var filter = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
				
				if (filter.test(email)) 
				{
					$(".err-section li.email-err").remove();
					$("#email").removeClass('err-border');
				}
				else
				{
					$("#email").addClass('err-border');
					Err_cnt='1';
					if( $(".err-section li.email-err").length==0)
						$(".err-section").append('<li class="email-err">Email is required</li>');
					else
						{
							$(".err-section li.email-err").remove();
							$(".err-section").append('<li class="email-err">Check Email Format</li>');
						}
					
				}
						
			}
			else
			{
				$("#email").addClass('err-border');
				Err_cnt='1';
				
				if( $(".err-section li.address-err").length==0)
					$(".err-section").append('<li class="email-err">Email is required</li>');
			}


		
		
	var address = $("#address").val();
		address = $.trim(address);
		
		if( address=='')
		{
			$("#address").addClass('err-border');
				Err_cnt='1';
	
				if( $(".err-section li.address-err").length==0)
					$(".err-section").append('<li class="address-err">Address is required</li>');
		}
		else
		{
			$("#address").removeClass('err-border');
			$(".err-section li.address-err").remove();
		}
		
	var landmark = $("#landmark").val();
		landmark = $.trim(landmark);
		
			
		console.log(Err_cnt);
		
		if(Err_cnt=="0")
		{
		
			
			$.ajax({
					
					url:base_url+'Teacher/updateDetails',
					data:{"whichdata":"Contact","selectTeacher":selectTeacher,"contactnumber":contactnumber,"alternatenumber":alternatenumber,"email":email,"landmark":landmark,"address":address},
					type:"POST",
					success:function(resp)
					{
						resp = $.trim(resp);
						
						if( resp=="1")
							$(".contactdetailsUpdatedMsg").html("<span class='alert alert-success'>Successfully updated contact details</span>");
						else
							$(".contactdetailsUpdatedMsg").html("<span class='alert alert-danger'>Unable to update contact details</span>");
						
					} //success function ends here
				
				}); /// ajax ends here
		}
			
		}
		else
		{
			$(".selectTeacher").addClass('err-border');
			$('html, body').animate({
						scrollTop: $(".breadcrumb").offset().top
						}, 1200);
		}
	
	
});


//get the teachers who has been assigned to class-section

$(document).on('change','.allocate-marks-section',function()
{
	
	var Err_cnt='0';
	
	var ClassName = $("#ClassName").val();
		ClassName = $.trim(ClassName);
		
		ClassName = parseInt(ClassName);
		
		if(ClassName>0)
		{
			
		}
		else
		{
			$(".ClassName_err").html('Select Class');
			Err_cnt='1';	
		}
		
		
		
		var section = $("#sections").val();
				section = $.trim(section);
				section = parseInt(section);
				
				if(section>0)
				{
					
				}
				else
				{
					$(".section_err").html('Select Class');
					Err_cnt='1';
					$("#TeacherName").val('0');
				}
		
		//get the teachers based on class and section		
	if( Err_cnt=="0")
	{
		
		$.ajax({
				
				url:base_url+'Teacher/getteachersforclass',
				type:'POST',
				data:{"ClassId":ClassName,"section":section},
				success:function(resp)
				{
					resp = JSON.parse(resp);	
					var teacehroptions ="<option value='0'>Select Teacher</option>";
					if(resp!='0')
					{
						$.each(resp,function(ind,val)
						{
								teacehroptions = teacehroptions+"<option value="+val.TeacherId+">"+val.Teacher+"</option>";
						});
					}
					
					
					$("#TeacherName").html(teacehroptions);
				}
			
			
			});	
	}
	else
	{
		$("#TeacherName").html("<option value='0'>Select Teacher</option>");
	}
		
		
});

//get subjects which are assgned to the class

$(document).on('change','.allocate-marks-class',function()
{

	var Err_cnt='0';
	
	var ClassName = $("#ClassName").val();
		ClassName = $.trim(ClassName);
		
		ClassName = parseInt(ClassName);
	
	if(ClassName>0)
	{
		$(".ClassName_err").html('');	
		
		$.ajax({
					url:base_url+'Teacher/getsubjectsassignedtoclass',
					type:'POST',
					data:{"ClassName":ClassName},
					success:function(resp)
					{
						resp = JSON.parse(resp);
						
						var subjectoptions = "<option value=0>Select Subject</option>";
						
						if(resp!='0')
						{
							$.each(resp,function(ind,val)
							{
									subjectoptions = subjectoptions+"<option value="+val.subjectcode+">"+val.subject+"</option>";	
							});
							
							$("#Subject").html(subjectoptions);
						}
						else
							$("#Subject").html(subjectoptions);
						
					}//success function ends here
					
				
				});
				
	}
	else
	{
		Err_cnt='1';
		$(".ClassName_err").html('Select Class');	
	}
	
	
});

$(document).on('keypress','#SecuredMarks, #TotalMarks',function(e)
	{
		var errelement = $(this).attr('id')+"_err";
     //if the letter is not digit then display error and don't type anything
     	if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) 
	 	{
     		
			$("."+errelement).html('Allow only numerics');
			
			$(this).val('');
			$(this).prop('placeholder','Only numerics allowed');
     		return false;
    	}
		else
			$("."+errelement).html('');

		
   });
   
   $(document).on('click','#allocatemarks_btn, #editallocatemarks_btn',function()
   {
	   
	   var Err_cnt = '0';
	   var Onclick = $(this);
	  var add_edit = $(this).attr('edit_add'); 
	   
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
				
			
				
				if( Err_cnt=="0" )
				{
					if( add_edit == "add" )
					{
						var senddata = {"ClassName":ClassName,"section":sections,"Rollno":Rollno,"TeacherName":TeacherName,"Subject":Subject,"Exam":Exam,"TotalMarks":TotalMarks,"SecuredMarks":SecuredMarks};
						
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
					else if ( add_edit == "edit" )
					{
						var MarksAllocatedId = $("#MarksAllocatedId").val();
						
						//var senddata = {"MarksAllocatedId":MarksAllocatedId,"ClassName":ClassName,"section":sections,"Rollno":Rollno,"TeacherName":TeacherName,"Subject":Subject,"Exam":Exam,"TotalMarks":TotalMarks,"SecuredMarks":SecuredMarks};
						
						var senddata = {"MarksAllocatedId":MarksAllocatedId,"TotalMarks":TotalMarks,"SecuredMarks":SecuredMarks};
						
						$.ajax({
									url:base_url+"Teacherrequestdispatcher/updateallocatedmarks",
									type:"POST",
									data:senddata,
									beforeSend:function(){  Onclick.val('Updateing allocating Marks......'); Onclick.prop('disabled',true); },
									success:function(resp)
									{
										
										resp = $.trim(resp);
										
										
										Onclick.prop('disabled',false);
										Onclick.val('Allocate Marks'); 
									
									resp = $.trim(resp);
									if(resp=="1")
										$(".allocate-marks-resp").html("<span class='alert alert-success'>Marks Updated Successfully</span>");	
									else if(resp=="0")
										$(".allocate-marks-resp").html("<span class='alert alert-danger'>Unable to update marks</span>");	
										
									} // success function ends here
								}); //ajax ends here
					}
					
				}
	   
   });


$(document).on('focus','#SecuredMarks',function()
{
	$(".allocate-marks-resp").html('');
});

