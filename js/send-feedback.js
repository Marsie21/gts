$(document).ready(function(){
	$(document).on('click', '#feedback-submit', function() {

                var subject = $('#subject').val();
                var content = $('#feed-content').val();

                    $.ajax({
                        url: "send-fb-insert.php",
                        method: "POST",
                        data: {
                            subject : subject,
                            content : content
                        },
                        success: function(data) {
                        console.log(data); 
                        	if(data == "Error "){
                        		$('.msg-dialog').append('<div class="alert alert-danger" role="alert"><span class="glyphicon glyphicon-remove-sign" aria-hidden="true"></span>&nbsp; Ooops! An Error has occured!.</div>');
	                            window.setTimeout(function() {
	                                $(".alert").fadeTo(800, 0).slideUp(800, function(){
	                                    $(this).remove(); 
	                                });
	                            }, 3000);
	                        } else if (data == "Success ") {
	                            $('.msg-dialog').append('<div class="alert alert-success" role="alert"><span class="glyphicon glyphicon-ok-sign" aria-hidden="true"></span>&nbsp; Feedback sent!.</div>');
	                            window.setTimeout(function() {
	                                    $(".alert").fadeTo(800, 0).slideUp(800, function(){
	                                        $(this).remove();
                                            location.reload(); 
	                                    });
	                                }, 3000);
	                            $('.form-group').val('');
                        	}
                        },
                    }); 
                }); 
         
});