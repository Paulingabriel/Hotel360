<!DOCTYPE html>
<html lang="en" class="loading">

<head>
    @include('layouts.head')
</head>


<body data-col="2-columns" class="2-columns bg-white">
    <style>
        html {}
    </style>
    <!-- ////////////////////////////////////////////////////////////////////////////-->
    <div class="wrapper">

        @include('layouts.sidebar')

        @include('layouts.navbar')

        <div class="main-panel">
            <div class="main-content">
                <div class="content-wrapper">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
    <!-- ////////////////////////////////////////////////////////////////////////////-->

    



    {{-- <footer class="footer footer-static footer-light border">
        <p class="clearfix text-muted text-center px-2">
          <span
            >Copyright &copy; 2018
            <a
              href="https://1.envato.market/pixinvent_portfolio"
              id="pixinventLink"
              target="_blank"
              class="text-bold-800 primary darken-2"
              >PIXINVENT </a
            >, All rights reserved.
          </span>
        </p>
      </footer> --}}




    <script src="../app-assets/vendors/js/core/jquery-3.3.1.min.js"></script>
    <script src="../app-assets/vendors/js/core/popper.min.js"></script>
    <script src="../app-assets/vendors/js/core/bootstrap.min.js"></script>
    <script src="../app-assets/vendors/js/perfect-scrollbar.jquery.min.js"></script>
    <script src="../app-assets/vendors/js/prism.min.js"></script>
    <script src="../app-assets/vendors/js/jquery.matchHeight-min.js"></script>
    <script src="../app-assets/vendors/js/screenfull.min.js"></script>
    <script src="../app-assets/vendors/js/pace/pace.min.js"></script>
    <script src="../app-assets/vendors/js/chartist.min.js"></script>
    <script src="../app-assets/js/app-sidebar.js"></script>
    <script src="../app-assets/js/notification-sidebar.js"></script>
    <script src="../app-assets/js/customizer.js"></script>
    <script src="../app-assets/js/dashboard-ecommerce.js"></script>
</body>

<!-- Mirrored from pixinvent.com/demo/convex-bootstrap-admin-dashboard-template/demo-3/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 16 Jan 2022 15:37:02 GMT -->

</html>
