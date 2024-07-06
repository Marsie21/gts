function load_unseen_notification(view = '') {

                $.ajax({

                  url:"feedbacks-notif.php",
                  method:"POST",
                  data:{view:view},
                  dataType:"json",
                  success:function(data) {
                     if(data.unseen_notification > 0) {
                      $('.count-feedbacks').html(data.unseen_notification);
                     }
                  }

                });

            }

            load_unseen_notification();

             // load new notifications

            $(document).on('click', '#feedbacks', function(){

              $('.count-feedbacks').html('');

              load_unseen_notification('yes');

            });
            setInterval(function(){
               load_unseen_notification();
            }, 5000);