$(document).ready(function(){
            $(document).on('click', '.edit-btn', function(){
                var id = $(this).attr('id');
                var parent = $(this).parent().parent().prev();
                var children = parent.children();

                if( id == 'civ_stat') {
                    $('.civ_stat').css('display', 'block');
                    $('.civ_stat').prev().css('display', 'none');
                    $(this).removeClass("glyphicon-pencil edit-btn");
                    $(this).addClass("glyphicon-remove-circle stop");

                } else {
                    $(children).css('border-bottom', '1px solid #ddd');
                    $(children).attr('contenteditable', true);
                    $(this).removeClass("glyphicon-pencil edit-btn");
                    $(this).addClass("glyphicon-remove-circle stop");

                }
    
            });

            //EDIT DATA FROM THE TABLE
            function edit_data(action, text, column_name) {  
                $.ajax({  
                        url:"profile-edit.php",  
                        method:"POST",  
                        data:{action:action, text:text, column_name:column_name},  
                        dataType:"text",  
                        success:function(data){ 
                                $('.msg-dialog').append('<div class="alert alert-success" role="alert"><span class="glyphicon glyphicon-ok-sign" aria-hidden="true"></span>&nbsp; You have successfully updated the profile!.</div>');
                                window.setTimeout(function() {
                                    $(".alert").fadeTo(800, 0).slideUp(800, function(){
                                        $(this).remove(); 
                                    });
                                }, 3000);
                        }  
                });  
            }

            $(document).on('blur', '.firstname', function(){ 
                var action = "users info";  
                var fname_txt = $(this).text();  
                edit_data(action, fname_txt, "firstname");  
            });

            $(document).on('blur', '.middlename', function(){   
                var action = "users info";
                var mname_txt = $(this).text();  
                edit_data(action, mname_txt, "middlename");  
            });

            $(document).on('blur', '.lastname', function(){  
                var action = "users info"; 
                var lname_txt = $(this).text();  
                edit_data(action, lname_txt, "lastname");  
            });

            $(document).on('blur', '.address', function(){
                var action = "users info";   
                var address_txt = $(this).text();  
                edit_data(action, address_txt, "address");  
            });

            $(document).on('blur', '.email', function(){
                var action = "users info";   
                var email_txt = $(this).text();
                edit_data(action, email_txt, "email"); 
            });

            $(document).on('blur', '.contact', function(){
                var action = "users info";   
                var contact_txt = $(this).text(); 
                edit_data(action, parseInt(contact_txt), "contact");  
            });

            $(document).on('blur', '.civ_stat', function(){ 
                var action = "users info";  
                var civ_stat_txt = $(this).children('option:selected').text(); 
                edit_data(action, civ_stat_txt, "civil_status");  
            });

            $(document).on('blur', '.current_job', function(){  
                var action = "job info"; 
                var currjob_txt = $(this).text();  
                edit_data(action, currjob_txt, "company_position");  
            });

            $(document).on('blur', '.comp_name', function(){
                var action = "job info";    
                var compname_txt = $(this).text();  
                edit_data(action, compname_txt, "company_name");  
            });

            $(document).on('blur', '.comp_address', function(){
                var action = "job info";   
                var compadd_txt = $(this).text();  
                edit_data(action, compadd_txt, "company_address");  
            });

            $(document).on('blur', '.month_salary', function(){
                var action = "job info";    
                var monsalary_txt = $(this).text();
                edit_data(action, monsalary_txt, "monthly_salary");  
            });


            $(document).on('click', '.stop', function(){
                var id = $(this).attr('id');
                var parent = $(this).parent().parent().prev();
                var children = parent.children();

                if( id == 'civ_stat') {

                    $('.civ_stat').css('display', 'none');
                    $('.civ_stat').prev().css('display', 'block');
                    $(this).removeClass("glyphicon-remove-circle stop");
                    $(this).addClass("glyphicon-pencil edit-btn");

                } else {

                    $(children).css('border-bottom', 'none');
                    $(children).attr("contenteditable", false); 
                    $(this).removeClass("glyphicon-remove-circle stop");
                    $(this).addClass("glyphicon-pencil edit-btn");

                }     
            });

            $(document).on('click', '.edit-img', function(){
                var id = $(this).attr('id');
                var parent = $(this).parent().parent().prev();
                var children = parent.children();

                $('#upload-btn-con').css('display', 'block');
                $('#upload-btn-con').hide().fadeIn("slow");
                $(this).removeClass("glyphicon-pencil");
                $(this).addClass("glyphicon-remove-circle stop2");

            });

            $('#upload-btn').click(function(){
                $('#upload-img-modal').modal();   
            });

            $('#upload-img-modal').on('hidden.bs.modal', function(){
                $('#upload-demo').css('display', 'none');
                $('.upload-result').css('display', 'none');
                $(this).find('form')[0].reset();
            });

            $(document).on('click', '.stop2', function(){
                var id = $(this).attr('id');
                var parent = $(this).parent().parent().prev();
                var children = parent.children();

                $('#upload-btn-con').css('display', 'none');
                $(this).removeClass("glyphicon-remove-circle stop2");
                $(this).addClass("glyphicon-pencil");

            });
            
}); 