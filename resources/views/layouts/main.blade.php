<!DOCTYPE html>
<html lang="en" class="loading">

<head>
    @include('layouts.head')
</head>


<body data-col="2-columns" class="2-columns bg-white">
    <style>
        html {}
    </style>

@include('sweetalert::alert')
    <!-- ////////////////////////////////////////////////////////////////////////////-->
    <div class="wrapper">

        @include('layouts.sidebar')

        @include('layouts.navbar')

        <div class="main-panel px-3">
            <div class="main-content">
                <div class="content-wrapper">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>

    @include('layouts.script')

</body>

<!-- Mirrored from pixinvent.com/demo/convex-bootstrap-admin-dashboard-template/demo-3/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 16 Jan 2022 15:37:02 GMT -->

</html>
