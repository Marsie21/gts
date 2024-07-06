        <!-- jQuery CDN -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <!-- Bootstrap Js CDN -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <!-- jQuery Custom Scroller CDN -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>
        <!-- FONT AWESOME -->
        <script defer src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
        <!-- Croppie.js -->
        <script type="text/javascript" src="js/croppie.min.js"></script>
        <!-- profile.js -->
        <script type="text/javascript" src="js/profile.js"></script>
        <!-- input-number.js -->
        <script type="text/javascript" src="js/input-number.js"></script>
        <!-- job-info.js -->
        <script type="text/javascript" src="js/job-info.js"></script>
        <!-- prev_job_edit.js -->
        <script type="text/javascript" src="js/prev-job-edit.js"></script>
        <!-- search.js -->
        <script type="text/javascript" src="js/search.js"></script>
        <!-- pagination.js -->
        <script type="text/javascript" src="js/pagination.js"></script>
        <!-- search-filter.js -->
        <script type="text/javascript" src="js/search-filter.js"></script>
        <!-- events-notif.js -->
        <script type="text/javascript" src="js/events-notif.js"></script>
        <!-- send-feedback.js -->
        <script type="text/javascript" src="js/send-feedback.js"></script>


        <!-- sidebar toggle -->
        <script type="text/javascript">
            $(document).ready(function () {
                $("#sidebar").mCustomScrollbar({
                    theme: "minimal"
                });

                $('#sidebarCollapse, .sidebarCollapse2').on('click', function () {
                    $('#sidebar, #content').toggleClass('active');
                    $('body').toggleClass('drawer-open');
                    $('.collapse.in').toggleClass('in');
                    $('a[aria-expanded=true]').attr('aria-expanded', 'false');

                    if( $('#sidebar, #content').hasClass('active') ) {
                        $('#sidebarCollapse span').html('Show Sidebar');
                    } else {
                        $('#sidebarCollapse span').html('Hide Sidebar');
                    }
                });                
            });
        </script>

        <!-- sidebar active higlight -->
        <script>
        $(document).ready(function () {
		    $('.item').bind('click', function() {
		        $('.active').removeClass('active')
		        $(this).addClass('active');
		    });
		});
		</script>
    </body>
</html>