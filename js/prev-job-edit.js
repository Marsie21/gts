            //Edit a previous job info
            $(document).on('click', '#editPrevJob .edit-btn2', function(){
                var id = $(this).attr('id');
                var parent = $(this).parent().parent();
                var children = parent.children();
                
                $(children).slice(0, 4).attr("contenteditable", true);
                $(this).html('Stop');
                $(this).removeClass('edit-btn2');
                $(this).addClass('stop3');
                $('.msg-dialog').append('<div class="alert alert-success" role="alert"><span class="glyphicon glyphicon-ok-sign" aria-hidden="true"></span>&nbsp; This row is now Editable!.</div>');
                    window.setTimeout(function() {
                        $(".alert").fadeTo(800, 0).slideUp(800, function(){
                            $(this).remove(); 
                        });
                    }, 3000);
            });

            //EDIT DATA FROM THE TABLE
            function edit_data(id, text, column_name) {  
                $.ajax({  
                        url:"prev-job-edit.php",  
                        method:"POST",  
                        data:{id:id, text:text, column_name:column_name},  
                        dataType:"text",  
                        success:function(data){  
                            $('.msg-dialog').append('<div class="alert alert-success" role="alert"><span class="glyphicon glyphicon-ok-sign" aria-hidden="true"></span>&nbsp; The event has been updated!.</div>');
                            window.setTimeout(function() {
                                $(".alert").fadeTo(800, 0).slideUp(800, function(){
                                    $(this).remove(); 
                                });
                            }, 3000);
                        }  
                });  
            }

            $(document).on('blur', '.job_position', function(){  
                var id = $(this).data("id1");  
                var job_position = $(this).text();  
                edit_data(id, job_position, "prev_job_position");  
            });  

            $(document).on('blur', '.comp_name', function(){  
                var id = $(this).data("id2");  
                var comp_name = $(this).text();  
                edit_data(id, comp_name, "prev_comp_name");  
            });

            $(document).on('blur', '.comp_add', function(){  
                var id = $(this).data("id3");  
                var comp_add = $(this).text();  
                edit_data(id, comp_add, "prev_comp_add");  
            });

            $(document).on('blur', '.prev_month_salary', function(){  
                var id = $(this).data("id4");  
                var prev_month_salary = $(this).text();  
                edit_data(id, prev_month_salary, "prev_month_salary");  
            });

            //Stop Editing row
            $(document).on('click', '#editPrevJob .stop3', function(){
                var id = $(this).attr('id');
                var parent = $(this).parent().parent();
                var children = parent.children();

                $(children).slice(0, 4).attr("contenteditable", false);
                $(this).html('Edit &nbsp;<span class="glyphicon glyphicon-pencil"></span>');
                $(this).removeClass('stop3');
                $(this).addClass('edit-btn2');
            });