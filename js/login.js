//validation for login
$(document).ready(function(){
    $('#login').click(function(){
    	var username = $('#inputUsername').val();
    	var password = $('#inputPassword').val();

    	if( username == '' || password == ''){
    		$('.alert').css('display', 'block');
    		$('.alert').html('<span class="glyphicon glyphicon-remove-sign" aria-hidden="true"></span> Please Fill all fields..!!').hide().fadeIn(800);
    	} else {
    		$.post("login.php", {
    			username : username,
    			password : password
    		}, function(data) {
    			if(data == 'Error!!') {
    				$('.alert').css('display', 'block');
    				$('.alert').html('<span class="glyphicon glyphicon-remove-sign" aria-hidden="true"></span> Username or Password is wrong..!!').hide().fadeIn(800);
    			} else if(data == 'Successfully Logged in..!!') {
                    document.location.href = 'home.php';
                } else if(data == 'Admin!') {
                    document.location.href = 'admin.php';
                } else if(data == 'Survey!'){
                    document.location.href = "survey.html";
                }
    		});
    	}
    });

    //when focused show label at top
    $('input').focus(function(){
        $(this).prev().addClass('focused');
        $(this).prev().hide().fadeIn(300);
    }).blur(function (){
        if( !$(this).val() )
        $(this).prev().removeClass('focused');
    });

});