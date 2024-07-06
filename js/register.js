$(document).ready(function () {
            var currentTab = 0;
            var x = $('.tab');
            var tab_length = x.length;
            showTab(currentTab);

            $('#prevBtn').click(function(){
            	nextPrev(-1);
            });
            $('#nextBtn').click(function(){
            	nextPrev(1);
            });

            $('input').on('input', function(e) {
			$(this).removeClass('invalid');
		});
			
		//when focused show label at top
		$('input').focus(function(){
			$(this).prev().addClass('focused');
			$(this).prev().hide().fadeIn(300);
		}).blur(function (){
			if( !$(this).val() )
			$(this).prev().removeClass('focused');
		});


            function showTab(n) {
            	var x = $('.tab');
            	$(x[n]).css('display', 'block');

            	if(n == 0) {
            		$('#prevBtn').css('display', 'none');
            	} else {
            		$('#prevBtn').css('display', 'inline');
            	}
            	if(n == (x.length - 1)){
            		$('#nextBtn').html('Register');
            		$('#nextBtn').css({
            			'background-color' : '#1aa3ff',
            			'color' : '#fff',
            			'border' : 'none'
            		});
                        $('#nextBtn').addClass("Register");
            	} else {
            		$('#nextBtn').html('<i class="glyphicon glyphicon-chevron-right" aria-hidden="true"></i><span> Next</span>');
                        $('#nextBtn').css({
                              'background-color' : '#fff',
                              'color' : '#737373',
                              'border' : '1px solid #808080'
                        });
                        $('#nextBtn').removeClass("Register");
            	}

            	fixStepIndicator(n);
            }

            function nextPrev(n) {

            	if (n == 1 && !validateForm()) {
                        return false;
                  }
            	$(x[currentTab]).css('display', 'none');
            	currentTab = currentTab + n;

            	if(currentTab == 1) {
            		$(".title h3").html("Fullname");
            	}

            	if(currentTab == 2) {
            		$(".title h3").html("Contact Informations");
            	}

            	if(currentTab >= 3) {
            		$(".title h3").html("Other Informations");
            	}
                  
            	if (currentTab >= tab_length) {
                        
            		$(".Register").click(function(){
                              
                              var email = $("#email_add").val();
                              var username = $("#user_name").val();
                              var password = $("#password").val();
                              var fname = $("#firstname").val();
                              var mname = $("#middlename").val();
                              var lname = $("#lastname").val();
                              var address = $("#address").val();
                              var contact_num = $("#contact-num").val();
                              var civil_stat = $("#inputCivil-status").val();
                              var gender = $("#inputGender").val();
                              var birthdate = $("#inputDate").val();
                              var yr_graduated = $("#yr-graduated").val();
                              var course = $("#course").val();
                              var stud_num = $("#stud_num").val();
                              var emp_stat = $("input[name='optEmpStatus']").val();
                              console.log(data);
                              $.ajax({
                                    url: "register-insert.php",
                                    method: "POST",
                                    data: {
                                        email : email,
                                        username : username,
                                        password : password,
                                        fname : fname,
                                        mname : mname,
                                        lname : lname,
                                        address : address,
                                        contact_num : contact_num,
                                        civil_stat : civil_stat,
                                        gender : gender,
                                        birthdate : birthdate,
                                        yr_graduated : yr_graduated,
                                        course : course,
                                        stud_num : stud_num,
                                        emp_stat : emp_stat
                                    },
                                    success: function(data) { 
                                          console.log(data);
                                          if(data == "success!") {
                                                document.location.href = 'login.html';
                                          } else if(data == "You're not a student of this university!") {
                                                $('.alert').css('display', 'block');
                                                $('.alert').html('<span class="glyphicon glyphicon-remove-sign" aria-hidden="true"></span> You are not a student of this university!').hide().fadeIn(800);
                                          } else if(data == "username already exist") {
                                                $('.alert').css('display', 'block');
                                                $('.alert').html('<span class="glyphicon glyphicon-remove-sign" aria-hidden="true"></span> Username already exist!').hide().fadeIn(800);
                                          } else if(data == "email is already in use") {
                                                $('.alert').css('display', 'block');
                                                $('.alert').html('<span class="glyphicon glyphicon-remove-sign" aria-hidden="true"></span> Email is already in use!').hide().fadeIn(800);
                                          }

                                    },
                              });
                        });

				
			} 
			    showTab(currentTab);
            }

            function errorMsg(lbl) {
                  $('.alert').css('display', 'block');
                  $('.alert').html('<span class="glyphicon glyphicon-remove-sign" aria-hidden="true"></span> The '+ lbl +' is Invalid!!').hide().fadeIn(800);
            }

            function isEmail(email) {
                  var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
                  return regex.test(email);
            }

            function isName(name){
                  var regex = /^[a-zA-Z\s]+$/;
                  return regex.test(name);
            }

            function isUsername(name){
                  var regex = /^\S{3,}$/;
                  return regex.test(name);
            }

            function isNumber(number){
                  var regex = /^\d{11}$/;      
                  return regex.test(number);
            }

            function isStudNumber(stud_number){
                  var regex = /^(\d{4}-\d{6})$/;      
                  return regex.test(stud_number);
            }

            $("#email_add").on("blur", function() {
                  var lbl = $(this).prev().text();
                  if ( isEmail($(this).val()) == false ) {
                        $("#nextBtn").prop("disabled", true);
                        errorMsg(lbl);
                  } else {
                        $("#nextBtn").prop("disabled", false);
                        $('.alert').hide().fadeOut(800);
                  }
            });

            $("#user_name").on("blur", function() {
                  var lbl = $(this).prev().text();
                  if ( isUsername($(this).val()) == false ) {
                        $("#nextBtn").prop("disabled", true);
                        errorMsg(lbl);
                  } else {
                        $("#nextBtn").prop("disabled", false);
                        $('.alert').hide().fadeOut(800);
                  }
            });

            $("#firstname, #middlename, #lastname").on("blur", function() {
                  var lbl = $(this).prev().text();
                  if ( isName($(this).val()) == false ) {
                        $("#nextBtn").prop("disabled", true);
                        $("#prevBtn").prop("disabled", true);
                        errorMsg(lbl);
                  } else {
                        $("#nextBtn").prop("disabled", false);
                        $("#prevBtn").prop("disabled", false);
                        $('.alert').hide().fadeOut(800);
                  }
            });

            $("#contact-num").on("blur", function() {
                  var lbl = $(this).prev().text();
                  if ( isNumber($(this).val()) == false ) {
                        $("#nextBtn").prop("disabled", true);
                        $("#prevBtn").prop("disabled", true);
                        errorMsg(lbl);
                  } else {
                        $("#nextBtn").prop("disabled", false);
                        $("#prevBtn").prop("disabled", false);
                        $('.alert').hide().fadeOut(800);
                  }
            });

            $("#inputCivil-status, #inputGender").on("blur", function() {
                  var lbl = $(this).prev().text();
                  if ( $(this).val() == "-- Choose --" ) {
                        $("#nextBtn").prop("disabled", true);
                        $("#prevBtn").prop("disabled", true);
                        errorMsg(lbl);
                  } else {
                        $("#nextBtn").prop("disabled", false);
                        $("#prevBtn").prop("disabled", false);
                        $('.alert').hide().fadeOut(800);
                  }
            });

            $("#inputDate").on("blur", function() {
                  var lbl = $(this).prev().text();
                  var date = new Date($('#inputDate').val());
                  var current_year = new Date().getFullYear();

                  year = date.getFullYear();

                  if ( year > current_year && year.length != 4 ) {
                        $("#nextBtn").prop("disabled", true);
                        $("#prevBtn").prop("disabled", true);
                        errorMsg(lbl);
                  } else {
                        $("#nextBtn").prop("disabled", false);
                        $("#prevBtn").prop("disabled", false);
                        $('.alert').hide().fadeOut(800);
                  }
            });

            $("#stud_num").keyup(function () {
                  var stud_num = $(this).val();
                  var length = $(this).val().length;
                  stud_num = stud_num.replace(/-/g, '');

                  if(length == 4) {
                        $(this).val(stud_num + "-")
                  }
            });

            $("#stud_num").blur(function (){
                  var lbl = $(this).prev().text();
                  var stud_num = $(this).val();

                  if( isStudNumber(stud_num) == false ) {
                        $("#nextBtn").prop("disabled", true);
                        $("#prevBtn").prop("disabled", true);
                        errorMsg(lbl);
                  } else {
                        $("#nextBtn").prop("disabled", false);
                        $("#prevBtn").prop("disabled", false);
                        $('.alert').hide().fadeOut(800);
                  }
            });

            function validateForm() {
            	var x, y, i, valid = true;
				x = $('.tab');
				y = $(x[currentTab]).find('.inputbox');
            
				for (i = 0; i < y.length; i++) {
      				if ( !($(y[i]).val()) ) {
      				    
      			            $(y[i]).toggleClass('invalid');
      				      // and set the current valid status to false
                                    $('.alert').css('display', 'block');
                                    $('.alert').html('<span class="glyphicon glyphicon-remove-sign" aria-hidden="true"></span> Please Fill up all the text boxes!!').hide().fadeIn(800);
                                    valid = false;
      				} 
				}
                                                
				// If the valid status is true, mark the step as finished and valid:
				if (valid) {
					$($('.step')[currentTab]).addClass('finish');
                              $('.alert').hide().fadeOut(800);
				}
				
				return valid; 
				
            }

            function fixStepIndicator(n) {
			  // This function removes the "active" class of all steps...
			  var i, x = $(".step");
			  for (i = 0; i < $(x).length; i++) {
			  	$(x[i]).removeClass('active');
			  }
			  //adds the "active" class on the current step:
			  $(x[n]).addClass('active');
			  
		}
           
        });