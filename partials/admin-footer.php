        <!-- jQuery CDN -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <!-- Bootstrap Js CDN -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <!-- jQuery Custom Scroller CDN -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>
        <!-- Croppie.js -->
        <script type="text/javascript" src="js/croppie.min.js"></script>
        <!-- events.js -->
        <script type="text/javascript" src="js/events.js"></script>
        <!-- events-notif.js -->
        <script type="text/javascript" src="js/events-notif.js"></script>
        <!-- feedbacks-notif.js -->
        <script type="text/javascript" src="js/feedbacks-notif.js"></script>
        <!-- confirm-modal.js -->
        <script type="text/javascript" src="js/confirm-modal.js"></script>
        <!-- search.js -->
        <script type="text/javascript" src="js/admin-search.js"></script>
        <!-- pagination.js -->
        <script type="text/javascript" src="js/admin-pagination.js"></script>
        <!-- search-filter.js -->
        <script type="text/javascript" src="js/search-filter.js"></script>

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

        <script>
        $(document).ready(function () {
		    $('.item').bind('click', function() {
		        // remove the active class from all elements with active class
		        $('.active').removeClass('active')
		        // add active class to clicked element
		        $(this).addClass('active');
		    });
		});
		</script>
    </body>
</html>