            
            //load events from database
            function fetch_data() {  
                $.ajax({  
                        url:"events-select.php",  
                        method:"POST",  
                        success:function(data){  
                            $('#live_data').html(data).hide().fadeIn("slow");  
                        }  
                });  
            }  
            fetch_data(); 
            //create an event and save to the database
            $(document).on('click', '#submitEvent', function() {

                var evnt_title = $('#evnt-title').val();
                var evnt_desc = $('#evnt-desc').val();
                var evnt_venue = $('#evnt-venue').val();
                var evnt_date = $('#evnt-date').val();
                var start_time = $('#start_time').val();
                var end_time = $('#end_time').val();

                if(evnt_title == ""){
                    $('.msg-dialog').append('<div class="alert alert-danger" role="alert"><span class="glyphicon glyphicon-remove-sign" aria-hidden="true"></span>&nbsp; Event Title is required!.</div>');
                        window.setTimeout(function() {
                                $(".alert").fadeTo(500, 0).slideUp(500, function(){
                                    $(this).remove(); 
                                });
                            }, 2000);
                    return false;
                }
                if(evnt_desc == ""){
                    $('.msg-dialog').append('<div class="alert alert-danger" role="alert"><span class="glyphicon glyphicon-remove-sign" aria-hidden="true"></span>&nbsp; Event Description is required!.</div>');
                        window.setTimeout(function() {
                                $(".alert").fadeTo(500, 0).slideUp(500, function(){
                                    $(this).remove(); 
                                });
                            }, 2000);
                    return false;
                }
                if(evnt_venue == ""){
                    $('.msg-dialog').append('<div class="alert alert-danger" role="alert"><span class="glyphicon glyphicon-remove-sign" aria-hidden="true"></span>&nbsp; EventVenue is required!.</div>');
                        window.setTimeout(function() {
                                $(".alert").fadeTo(500, 0).slideUp(500, function(){
                                    $(this).remove(); 
                                });
                            }, 2000);
                    return false;
                }
                if(evnt_date == ""){
                    $('.msg-dialog').append('<div class="alert alert-danger" role="alert"><span class="glyphicon glyphicon-remove-sign" aria-hidden="true"></span>&nbsp; Event Date is required!.</div>');
                        window.setTimeout(function() {
                                $(".alert").fadeTo(500, 0).slideUp(500, function(){
                                    $(this).remove(); 
                                });
                            }, 2000);
                    return false;
                }
                if(start_time == ""){
                    $('.msg-dialog').append('<div class="alert alert-danger" role="alert"><span class="glyphicon glyphicon-remove-sign" aria-hidden="true"></span>&nbsp; Event start time is required!.</div>');
                        window.setTimeout(function() {
                                $(".alert").fadeTo(500, 0).slideUp(500, function(){
                                    $(this).remove(); 
                                });
                            }, 2000);
                    return false;
                }
                if(end_time == ""){
                    $('.msg-dialog').append('<div class="alert alert-danger" role="alert"><span class="glyphicon glyphicon-remove-sign" aria-hidden="true"></span>&nbsp; Event end time is required!.</div>');
                        window.setTimeout(function() {
                                $(".alert").fadeTo(500, 0).slideUp(500, function(){
                                    $(this).remove(); 
                                });
                            }, 2000);
                    return false;
                }

                    $.ajax({
                        url: "events-insert.php",
                        method: "POST",
                        data: {
                            evnt_title : evnt_title,
                            evnt_desc : evnt_desc,
                            evnt_venue : evnt_venue,
                            evnt_date : evnt_date,
                            start_time : start_time,
                            end_time : end_time
                        },
                        success: function(data) { 
                            fetch_data();
                            $('.msg-dialog').append('<div class="alert alert-success" role="alert"><span class="glyphicon glyphicon-ok-sign" aria-hidden="true"></span>&nbsp; The event you created has been successfully saved!.</div>');
                            window.setTimeout(function() {
                                    $(".alert").fadeTo(500, 0).slideUp(500, function(){
                                        $(this).remove(); 
                                    });
                                }, 2000);
                            $('.form-control').val('');
                            $("#addEvent-modal").modal('toggle');
                            load_unseen_notification();
                        },
                    }); 
                });           
            //Display the Event on index.php
            $(document).on('click', '.display-btn', function(){
                $(this).html('No <span class="glyphicon glyphicon-remove-sign" aria-hidden="true"></span>');
                $(this).addClass('No');
                $(this).removeClass('btn-success');
                $(this).addClass('btn-danger');

                var id = $(this).data("id7");  
                var display = $(this).text();
                edit_data(id, display, "display");
            });
            //Do not display the event on index.php
            $(document).on('click', '.No', function(){
                $(this).html('Yes <span class="glyphicon glyphicon-ok-sign" aria-hidden="true"></span>');
                $(this).removeClass('No');
                $(this).addClass('btn-success');
                $(this).removeClass('btn-danger');

                var id = $(this).data("id7");  
                var display = $(this).text();
                edit_data(id, display, "display");
            });

            //Edit an Event
            $(document).on('click', '.edit-btn', function(){
                var id = $(this).attr('id');
                var parent = $(this).parent().parent();
                var children = parent.children();
            
                $(children).slice(0, 6).attr("contenteditable", true);
                $(this).html('Stop');
                $(this).removeClass('edit-btn');
                $(this).addClass('stop');
                $('.msg-dialog').append('<div class="alert alert-success" role="alert"><span class="glyphicon glyphicon-ok-sign" aria-hidden="true"></span>&nbsp; This row is now Editable!.</div>');
                    window.setTimeout(function() {
                        $(".alert").fadeTo(500, 0).slideUp(500, function(){
                            $(this).remove(); 
                        });
                    }, 2000);
            });
            
            //EDIT DATA FROM THE TABLE
            function edit_data(id, text, column_name) {  
                $.ajax({  
                        url:"events-edit.php",  
                        method:"POST",  
                        data:{id:id, text:text, column_name:column_name},  
                        dataType:"text",  
                        success:function(data){ 
                             
                            $('.msg-dialog').append('<div class="alert alert-success" role="alert"><span class="glyphicon glyphicon-ok-sign" aria-hidden="true"></span>&nbsp; The event has been updated!.</div>');
                            window.setTimeout(function() {
                                $(".alert").fadeTo(500, 0).slideUp(500, function(){
                                    $(this).remove(); 
                                });
                            }, 2000);
                            load_unseen_notification();
                        }  
                });  
            }

            $(document).on('blur', '.event_title', function(){  
                var id = $(this).data("id1");  
                var event_title = $(this).text();  
                edit_data(id, event_title, "event_title");  
            });  

            $(document).on('blur', '.event_desc', function(){  
                var id = $(this).data("id2");  
                var event_desc = $(this).text();  
                edit_data(id, event_desc, "event_description");  
            });

            $(document).on('blur', '.event_venue', function(){  
                var id = $(this).data("id3");  
                var event_venue = $(this).text();  
                edit_data(id, event_venue, "event_venue");  
            });

            $(document).on('blur', '.event_date', function(){  
                var id = $(this).data("id4");  
                var event_date = $(this).text();  
                edit_data(id, event_date, "event_date");  
            });

            $(document).on('blur', '.start_time', function(){  
                var id = $(this).data("id5");  
                var start_time = $(this).text();  
                edit_data(id, start_time, "start_time");  
            });

            $(document).on('blur', '.end_time', function(){  
                var id = $(this).data("id6");  
                var end_time = $(this).text();  
                edit_data(id, end_time, "end_time");  
            });

            $(document).on('click', '.stop', function(){
                var id = $(this).attr('id');
                var parent = $(this).parent().parent();
                var children = parent.children();

                $(children).slice(0, 6).attr("contenteditable", false);
                $(this).html('Edit &nbsp;<span class="glyphicon glyphicon-pencil"></span>');
                $(this).removeClass('stop');
                $(this).addClass('edit-btn');
            });

            //Delete an Event
            $(document).on('click', '.delete-btn', function(){
                    var id = $(this).attr('id');
                    var parent = $(this).parent().parent();

                    $('#confirm-modal').modal();
                    $('#confirm').click(function(){
                        $.ajax({
                                type:'POST',
                                url:'events-delete.php',
                                data: {delete_id : id},
                                cache: false,
                                success: function(data){
                                    if(data == "YES"){
                                        parent.fadeOut("slow"), function() {
                                            $(this).remove();
                                        }
                                        $('.msg-dialog').append('<div class="alert alert-success" role="alert"><span class="glyphicon glyphicon-ok-sign" aria-hidden="true"></span>&nbsp; The event has been deleted!.</div>');
                                        window.setTimeout(function() {
                                            $(".alert").fadeTo(500, 0).slideUp(500, function(){
                                                $(this).remove(); 
                                            });
                                        }, 2000);

                                    } else {
                                        $('.msg-dialog').append('<div class="alert alert-danger" role="alert"><span class="glyphicon glyphicon-remove-sign" aria-hidden="true"></span>&nbsp; This cannot be deleted!.</div>');
                                        window.setTimeout(function() {
                                            $(".alert").fadeTo(500, 0).slideUp(500, function(){
                                                $(this).remove(); 
                                            });
                                        }, 2000);
                                    }
                                 }
                        });
                    });
                });
            