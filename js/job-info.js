$(document).ready(function(){
	$(document).on('click', '#job-submit', function() {

                var current_job = $('#current_job').val();
                var company_name = $('#company_name').val();
                var company_address = $('#company_address').val();
                var monthly_salary = $('#monthly_salary').val().replace(/,/g, '');
                var opt6months2 = $('input[name="opt6months"]').val();
                var source2 = [];
                $(".checkbox input[type=checkbox]:checked").each(function(){
                    source2.push($(this).val());
                });
                var optRelatedJob2 = $('input[name="optRelatedJob"]').val();
                var optPromoted2 = $('input[name="optPromoted"]').val();
                var optRated2 = $('input[name="optRated"]').val();

                if(current_job == "" || company_name == "" || company_address == "" || monthly_salary == "" || opt6months2 == "" || optPromoted2 == "" || optRelatedJob2 == "" || optRated2 == "" || source2 == ""){
                    $('.msg-dialog').append('<div class="alert alert-danger" role="alert"><span class="glyphicon glyphicon-remove-sign" aria-hidden="true"></span>&nbsp; Please fill all of the remaining text boxes!.</div>');
                        window.setTimeout(function() {
                                $(".alert").fadeTo(500, 0).slideUp(500, function(){
                                    $(this).remove(); 
                                });
                            }, 2000);
                    return false;
                }

                    $.ajax({
                        url: "job-info-insert.php",
                        method: "POST",
                        data: {
                            current_job : current_job,
                            company_name : company_name,
                            company_address : company_address,
                            monthly_salary : monthly_salary,
                            opt6months2 : opt6months2,
                            source2 : source2,
                            optRelatedJob2 : optRelatedJob2,
                            optPromoted2 : optPromoted2,
                            optRated2 : optRated2
                        },
                        success: function(data) { 
                        	if(data == "Error "){
                        		$('.msg-dialog').append('<div class="alert alert-danger" role="alert"><span class="glyphicon glyphicon-remove-sign" aria-hidden="true"></span>&nbsp; Ooops! An Error has occured!.</div>');
	                            window.setTimeout(function() {
	                                $(".alert").fadeTo(500, 0).slideUp(500, function(){
	                                    $(this).remove(); 
	                                });
	                            }, 2000);
	                        } else if (data == "Success ") {
	                            $('.msg-dialog').append('<div class="alert alert-success" role="alert"><span class="glyphicon glyphicon-ok-sign" aria-hidden="true"></span>&nbsp; Current job information has been successfully saved!.</div>');
	                            window.setTimeout(function() {
	                                    $(".alert").fadeTo(500, 0).slideUp(500, function(){
	                                        $(this).remove();
                                            location.reload(); 
	                                    });
	                                }, 2000);
	                            $('.form-control').val('');
                        	}
                        },
                    }); 
                }); 

	$(document).on('click', '#prev-job-submit', function() {

                var prev_job = $('#prev_job').val();
                var prev_comp_name = $('#prev_comp_name').val();
                var prev_comp_add = $('#prev_comp_add').val();
                var prev_month_salary = $('#prev_month_salary').val();

                if(prev_job == "" || prev_comp_name == "" || prev_comp_add == "" || prev_month_salary == ""){
                    $('.msg-dialog').append('<div class="alert alert-danger" role="alert"><span class="glyphicon glyphicon-remove-sign" aria-hidden="true"></span>&nbsp; Please fill all of the remaining text boxes!.</div>');
                        window.setTimeout(function() {
                                $(".alert").fadeTo(500, 0).slideUp(500, function(){
                                    $(this).remove(); 
                                });
                            }, 2000);
                    return false;
                }

                    $.ajax({
                        url: "prev-job-insert.php",
                        method: "POST",
                        data: {
                            prev_job : prev_job,
                            prev_comp_name : prev_comp_name,
                            prev_comp_add : prev_comp_add,
                            prev_month_salary : prev_month_salary
                        },
                        success: function(data) { 
                        	console.log(data);
                        	if(data == "Error "){
                        		$('.msg-dialog').append('<div class="alert alert-danger" role="alert"><span class="glyphicon glyphicon-remove-sign" aria-hidden="true"></span>&nbsp; Ooops! An Error has occured!.</div>');
	                            window.setTimeout(function() {
	                                $(".alert").fadeTo(500, 0).slideUp(500, function(){
	                                    $(this).remove(); 
	                                });
	                            }, 2000);
	                        } else if (data == "Success ") {
	                            $('.msg-dialog').append('<div class="alert alert-success" role="alert"><span class="glyphicon glyphicon-ok-sign" aria-hidden="true"></span>&nbsp; Previous job information has been successfully saved!.</div>');
	                            window.setTimeout(function() {
	                                    $(".alert").fadeTo(500, 0).slideUp(500, function(){
	                                        $(this).remove(); 

	                                    });
	                                }, 2000);
	                            $('.form-control').val('');
                        	}
                        },
                    }); 
                });

            
});