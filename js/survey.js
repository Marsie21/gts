$(document).ready(function () {
	
    var currentTab = 0;
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
				$(this).prev().removeClass('focused')
			});

			$("input[name='optSelfEmp']").click(function (){
				if( $(this).val() == "No" ){
					$('#business').html("");
				} else if ( $(this).val() == "Yes" ) {
					$('#business').load("business-forms.html");
				}	
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
            	} else {
            		$('#nextBtn').html('<i class="glyphicon glyphicon-chevron-right" aria-hidden="true"></i><span> Next</span>');
            	}

            	fixStepIndicator(n);
            }

            function nextPrev(n) {
            	var x = $('.tab');
            	console.log(x.length);
            	if (n == 1 && !validateForm()) return false;
            	$(x[currentTab]).css('display', 'none');
            	currentTab = currentTab + n;

            	if(currentTab == 1) {
            		$('.title h3').html('Job Information');
            	}

            	if (currentTab >= x.length) {
            		$('#regForm').submit();
					return false;
			    }

			    showTab(currentTab);
            }

            function validateForm() {
            	var x, y, i, valid = true;
				x = $('.tab');
				y = $(x[currentTab]).find('.inputbox');
				
				for (i = 0; i < y.length; i++) {
				  if ( !($(y[i]).val()) ) {
				    
				    $(y[i]).toggleClass('invalid');
				    // and set the current valid status to false

				    valid = false;
				  }
				}
				// If the valid status is true, mark the step as finished and valid:
				if (valid) {
					$($('.step')[currentTab]).addClass('finish');
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
