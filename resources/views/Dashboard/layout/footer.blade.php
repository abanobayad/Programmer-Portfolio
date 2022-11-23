              <!-- partial:partials/_footer.html -->
              <footer class="footer">
                <div class="d-sm-flex justify-content-center justify-content-sm-between">
                  <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © abanob.ayad.2015@gmail.com </span>
                  <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"> Dashboard <a href="/" target="_blank">Abanoub</a> Ayad</span>
                </div>
              </footer>
              <!-- partial -->
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="/dashboard/template/assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    {{-- Tables Search Code --}}
    <script>
        $(document).ready(function() {
            $("#myInput").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#tableData tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });
    </script>
    {{-- End --}}

    @include('sweetalert::alert')
    <!-- inject:js -->
    <script src="/dashboard/template/assets/js/off-canvas.js"></script>
    <script src="/dashboard/template/assets/js/hoverable-collapse.js"></script>
    <script src="/dashboard/template/assets/js/misc.js"></script>
    <script src="/dashboard/template/assets/js/settings.js"></script>
    <script src="/dashboard/template/assets/js/todolist.js"></script>
    <!-- endinject -->

        <!-- Plugin js for this page -->
        <script src="/dashboard/template/assets/vendors/chart.js/Chart.min.js"></script>
        <script src="/dashboard/template/assets/vendors/progressbar.js/progressbar.min.js"></script>
        <script src="/dashboard/template/assets/vendors/jvectormap/jquery-jvectormap.min.js"></script>
        <script src="/dashboard/template/assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
        <script src="/dashboard/template/assets/vendors/owl-carousel-2/owl.carousel.min.js"></script>
        <script src="/dashboard/template/assets/js/jquery.cookie.js" type="text/javascript"></script>
        <!-- End plugin js for this page -->

        <script src="/fa/js/all.min.js"></script>
            <!-- Custom js for this page -->
            <script src="/dashboard/template/assets/js/dashboard.js"></script>
            <!-- End custom js for this page -->

            <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
            {{-- <script src="https://js.pusher.com/7.1/pusher.min.js"></script>
            <script>
                 // Enable pusher logging - don't include this in production
                    Pusher.logToConsole = true;
                var pusher = new Pusher('3b137ad3de766ab2f32c', {
                    cluster: 'mt1'
                    });
            </script> --}}

            <script>
                function updateNotification()
                {

                    $('#noti_count').load(window.location.href + ' #noti_count');
                    $('#noti_content').load(window.location.href + ' #noti_content');
                }
                setInterval(function() {
                            // $("#noti_content").load(window.location.href +"#noti_content" );
                            updateNotification()
                    }, 5000);
                </script>
</body>
</html>
