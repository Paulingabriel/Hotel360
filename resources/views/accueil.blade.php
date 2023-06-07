<!DOCTYPE html>
<html lang="en" class="loading">

<head>
    @include('layouts.head')
</head>


<body data-col="2-columns" class="2-columns bg-white pace-done">
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
                    <div class="row">
                        <div class="col-xl-3 col-lg-6 col-12">
                            <div class="card bg-success" style="height: 145.6px;">
                                <div class="card-body">
                                    <div class="px-3 py-3">
                                        <div class="row text-white">
                                            <div class="col-6">
                                                <h1><i
                                                        class="fa fa-usd background-round text-white p-2 font-medium-3"></i>
                                                </h1>
                                                <h4 class="pt-1 m-0 text-white">45% <i class="fa fa-long-arrow-up"></i>
                                                </h4>
                                            </div>
                                            <div class="col-6 text-right pl-0">
                                                <h4 class="text-white mb-2">Sales</h4>
                                                <span>90%</span>
                                                <br>
                                                <span>Grate</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-6 col-12">
                            <div class="card bg-danger" style="height: 145.6px;">
                                <div class="card-body">
                                    <div class="px-3 py-3">
                                        <div class="row text-white">
                                            <div class="col-6">
                                                <h1><i
                                                        class="ft-star background-round text-white p-2 font-medium-3"></i>
                                                </h1>
                                                <h4 class="pt-1 m-0 text-white">10% <i
                                                        class="fa fa-long-arrow-down"></i></h4>
                                            </div>
                                            <div class="col-6 text-right pl-0">
                                                <h4 class="text-white mb-2">Product</h4>
                                                <span>39%</span>
                                                <br>
                                                <span>Average</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-6 col-12">
                            <div class="card bg-info" style="height: 145.6px;">
                                <div class="card-body">
                                    <div class="px-3 py-3">
                                        <div class="row text-white">
                                            <div class="col-6">
                                                <h1><i
                                                        class="fa fa-line-chart background-round text-white p-2 font-medium-3"></i>
                                                </h1>
                                                <h4 class="pt-1 m-0 text-white">20% <i class="fa fa-long-arrow-up"></i>
                                                </h4>
                                            </div>
                                            <div class="col-6 text-right pl-0">
                                                <h4 class="text-white mb-2">Profit</h4>
                                                <span>60%</span>
                                                <br>
                                                <span>Good</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-6 col-12">
                            <div class="card bg-warning" style="height: 145.6px;">
                                <div class="card-body">
                                    <div class="px-3 py-3">
                                        <div class="row text-white">
                                            <div class="col-6">
                                                <h1><i
                                                        class="fa fa-rocket background-round text-white p-2 font-medium-3"></i>
                                                </h1>
                                                <h4 class="pt-1 m-0 text-white">82% <i class="fa fa-long-arrow-up"></i>
                                                </h4>
                                            </div>
                                            <div class="col-6 text-right pl-0">
                                                <h4 class="text-white">Referral</h4>
                                                <span>980</span>
                                                <br>
                                                <span>Grate</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

        <!-- ////////////////////////////////////////////////////////////////////////////-->




        <aside id="notification-sidebar" class="notification-sidebar d-none d-sm-none d-md-block">
            <a class="notification-sidebar-close"><i class="ft-x font-medium-3"></i></a>
            <div class="side-nav notification-sidebar-content">
                <div class="row">
                    <div class="col-12 mt-1">
                        <ul class="nav nav-tabs">
                            <li class="nav-item">
                                <a id="base-tab1" data-toggle="tab" aria-controls="base-tab1" href="#activity-tab"
                                    aria-expanded="true" class="nav-link active"><strong>Activity</strong></a>
                            </li>
                            <li class="nav-item">
                                <a id="base-tab2" data-toggle="tab" aria-controls="base-tab2" href="#settings-tab"
                                    aria-expanded="false" class="nav-link"><strong>Settings</strong></a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div id="activity-tab" role="tabpanel" aria-expanded="true" aria-labelledby="base-tab1"
                                class="tab-pane active">
                                <div id="activity-timeline" class="col-12 timeline-left">
                                    <h6 class="mt-1 mb-3 text-bold-400">RECENT ACTIVITY</h6>
                                    <div class="timeline">
                                        <ul class="list-unstyled base-timeline activity-timeline ml-0">
                                            <li>
                                                <div class="timeline-icon bg-danger">
                                                    <i class="ft-shopping-cart"></i>
                                                </div>
                                                <div class="base-timeline-info">
                                                    <a href="#" class="text-uppercase text-danger">Update</a><span
                                                        class="d-block">Jim Doe Purchased new equipments for zonal
                                                        office.</span>
                                                </div>
                                                <small class="text-muted">just now</small>
                                            </li>
                                            <li>
                                                <div class="timeline-icon bg-primary">
                                                    <i class="fa fa-plane"></i>
                                                </div>
                                                <div class="base-timeline-info">
                                                    <a href="#" class="text-uppercase text-primary">Added</a><span
                                                        class="d-block">Your Next flight for USA will be on 15th August
                                                        2015.</span>
                                                </div>
                                                <small class="text-muted">25 hours ago</small>
                                            </li>
                                            <li>
                                                <div class="timeline-icon bg-dark">
                                                    <i class="ft-mic"></i>
                                                </div>
                                                <div class="base-timeline-info">
                                                    <a href="#" class="text-uppercase text-dark">Assined</a><span
                                                        class="d-block">Natalya Parker Send you a voice mail for next
                                                        conference.</span>
                                                </div>
                                                <small class="text-muted">15 days ago</small>
                                            </li>
                                            <li>
                                                <div class="timeline-icon bg-warning">
                                                    <i class="ft-map-pin"></i>
                                                </div>
                                                <div class="base-timeline-info">
                                                    <a href="#" class="text-uppercase text-warning">New</a><span
                                                        class="d-block">Jessy Jay open a new store at S.G Road.</span>
                                                </div>
                                                <small class="text-muted">20 days ago</small>
                                            </li>
                                            <li>
                                                <div class="timeline-icon bg-primary">
                                                    <i class="ft-inbox"></i>
                                                </div>
                                                <div class="base-timeline-info">
                                                    <a href="#" class="text-uppercase text-primary">Added</a><span
                                                        class="d-block">voice mail for conference.</span>
                                                </div>
                                                <small class="text-muted">2 Week Ago</small>
                                            </li>
                                            <li>
                                                <div class="timeline-icon bg-danger">
                                                    <i class="ft-mic"></i>
                                                </div>
                                                <div class="base-timeline-info">
                                                    <a href="#" class="text-uppercase text-danger">Update</a><span
                                                        class="d-block">Natalya Parker Jessy Jay open a new store at S.G
                                                        Road.</span>
                                                </div>
                                                <small class="text-muted">1 Month Ago</small>
                                            </li>
                                            <li>
                                                <div class="timeline-icon bg-dark">
                                                    <i class="ft-inbox"></i>
                                                </div>
                                                <div class="base-timeline-info">
                                                    <a href="#" class="text-uppercase text-dark">Assined</a><span
                                                        class="d-block">Natalya Parker Send you a voice mail for Updated
                                                        conference.</span>
                                                </div>
                                                <small class="text-muted">1 Month ago</small>
                                            </li>
                                            <li>
                                                <div class="timeline-icon bg-warning">
                                                    <i class="ft-map-pin"></i>
                                                </div>
                                                <div class="base-timeline-info">
                                                    <a href="#" class="text-uppercase text-warning">New</a><span
                                                        class="d-block">Started New project with Jessie Lee.</span>
                                                </div>
                                                <small class="text-muted">2 Month ago</small>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div id="settings-tab" aria-labelledby="base-tab2" class="tab-pane">
                                <div id="settings" class="col-12">
                                    <h6 class="mt-1 mb-3 text-bold-400">GENERAL SETTINGS</h6>
                                    <ul class="list-unstyled">
                                        <li>
                                            <div class="togglebutton">
                                                <div class="switch">
                                                    <span class="text-bold-500">Notifications</span>
                                                    <div class="float-right">
                                                        <div class="form-group">
                                                            <div
                                                                class="custom-control custom-checkbox mb-2 mr-sm-2 mb-sm-0">
                                                                <input id="notifications1" checked="checked"
                                                                    type="checkbox" class="custom-control-input" />
                                                                <label for="notifications1"
                                                                    class="custom-control-label"></label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <p>Use checkboxes when looking for yes or no answers.</p>
                                        </li>
                                        <li>
                                            <div class="togglebutton">
                                                <div class="switch">
                                                    <span class="text-bold-500">Show recent activity</span>
                                                    <div class="float-right">
                                                        <div class="form-group">
                                                            <div
                                                                class="custom-control custom-checkbox mb-2 mr-sm-2 mb-sm-0">
                                                                <input id="recent-activity1" checked="checked"
                                                                    type="checkbox" class="custom-control-input" />
                                                                <label for="recent-activity1"
                                                                    class="custom-control-label"></label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <p>
                                                The for attribute is necessary to bind our custom
                                                checkbox with the input.
                                            </p>
                                        </li>
                                        <li>
                                            <div class="togglebutton">
                                                <div class="switch">
                                                    <span class="text-bold-500">Notifications</span>
                                                    <div class="float-right">
                                                        <div class="form-group">
                                                            <div
                                                                class="custom-control custom-checkbox mb-2 mr-sm-2 mb-sm-0">
                                                                <input id="notifications2" type="checkbox"
                                                                    class="custom-control-input" />
                                                                <label for="notifications2"
                                                                    class="custom-control-label"></label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <p>Use checkboxes when looking for yes or no answers.</p>
                                        </li>
                                        <li>
                                            <div class="togglebutton">
                                                <div class="switch">
                                                    <span class="text-bold-500">Show recent activity</span>
                                                    <div class="float-right">
                                                        <div class="form-group">
                                                            <div
                                                                class="custom-control custom-checkbox mb-2 mr-sm-2 mb-sm-0">
                                                                <input id="recent-activity2" type="checkbox"
                                                                    class="custom-control-input" />
                                                                <label for="recent-activity2"
                                                                    class="custom-control-label"></label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <p>
                                                The for attribute is necessary to bind our custom
                                                checkbox with the input.
                                            </p>
                                        </li>
                                        <li>
                                            <div class="togglebutton">
                                                <div class="switch">
                                                    <span class="text-bold-500">Show your emails</span>
                                                    <div class="float-right">
                                                        <div class="form-group">
                                                            <div
                                                                class="custom-control custom-checkbox mb-2 mr-sm-2 mb-sm-0">
                                                                <input id="show-emails" type="checkbox"
                                                                    class="custom-control-input" />
                                                                <label for="show-emails"
                                                                    class="custom-control-label"></label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <p>Use checkboxes when looking for yes or no answers.</p>
                                        </li>
                                        <li>
                                            <div class="togglebutton">
                                                <div class="switch">
                                                    <span class="text-bold-500">Show Task statistics</span>
                                                    <div class="float-right">
                                                        <div class="form-group">
                                                            <div
                                                                class="custom-control custom-checkbox mb-2 mr-sm-2 mb-sm-0">
                                                                <input id="show-stats" checked="checked" type="checkbox"
                                                                    class="custom-control-input" />
                                                                <label for="show-stats"
                                                                    class="custom-control-label"></label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <p>
                                                The for attribute is necessary to bind our custom
                                                checkbox with the input.
                                            </p>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </aside>
        <div class="customizer border-left-blue-grey border-left-lighten-4 d-none d-sm-none d-md-block">
            <a class="customizer-close"><i class="ft-x font-medium-3"></i></a><a id="customizer-toggle-icon"
                class="customizer-toggle bg-danger"><i
                    class="ft-settings font-medium-4 fa fa-spin white align-middle"></i></a>
            <div data-ps-id="df6a5ce4-a175-9172-4402-dabd98fc9c0a"
                class="customizer-content p-3 ps-container ps-theme-dark">
                <h4 class="mb-0 text-bold-400">Theme Customizer</h4>
                <p>Customize &amp; Preview in Real Time</p>
                <hr />
                <h6 class="text-center text-bold-500 mb-3 text-uppercase">
                    Sidebar Background Image
                </h6>
                <div class="cz-bg-image row">
                    <div class="col mb-3">
                        <img src="../app-assets/img/sidebar-bg/09.webp" width="50" height="100" alt="Bg image1"
                            class="rounded box-shadow-2" />
                    </div>
                    <div class="col mb-3">
                        <img src="../app-assets/img/sidebar-bg/02.jpg" width="50" height="100" alt="Bg image2"
                            class="rounded box-shadow-2" />
                    </div>
                    <div class="col mb-3">
                        <img src="../app-assets/img/sidebar-bg/10.webp" width="50" height="100" alt="Bg image3"
                            class="rounded box-shadow-2" />
                    </div>
                    <div class="col mb-3">
                        <img src="../app-assets/img/sidebar-bg/11.webp" width="50" height="100" alt="Bg image4"
                            class="rounded box-shadow-2" />
                    </div>
                    <div class="col mb-3">
                        <img src="../app-assets/img/sidebar-bg/05.jpg" width="50" height="100" alt="Bg image5"
                            class="rounded box-shadow-2" />
                    </div>
                    <div class="col mb-3">
                        <img src="../app-assets/img/sidebar-bg/12.webp" width="50" height="100" alt="Bg image6"
                            class="rounded box-shadow-2" />
                    </div>
                    <div class="col mb-3">
                        <img src="../app-assets/img/sidebar-bg/14.webp" width="50" height="100" alt="Bg image7"
                            class="rounded box-shadow-2" />
                    </div>
                    <div class="col mb-3">
                        <img src="../app-assets/img/sidebar-bg/15.webp" width="50" height="100" alt="Bg image8"
                            class="rounded box-shadow-2" />
                    </div>
                </div>
                <hr />
                <div class="togglebutton">
                    <div class="switch">
                        <span class="text-bold-400">Show / Hide Sidebar Bg Image</span>
                        <div class="float-right">
                            <div class="custom-control custom-checkbox mb-2 mr-sm-2 mb-sm-0">
                                <input id="sidebar-bg-img" type="checkbox" checked=""
                                    class="custom-control-input cz-bg-image-display" />
                                <label for="sidebar-bg-img" class="custom-control-label"></label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="togglebutton">
                    <div class="switch">
                        <span class="text-bold-400">Compact Menu</span>
                        <div class="float-right">
                            <div class="custom-control custom-checkbox mb-2 mr-sm-2 mb-sm-0">
                                <input id="cz-compact-menu" type="checkbox"
                                    class="custom-control-input cz-compact-menu" />
                                <label for="cz-compact-menu" class="custom-control-label"></label>
                            </div>
                        </div>
                    </div>
                </div>
                <hr />
                <div>
                    <label for="cz-sidebar-width" class="text-bold-400">Sidebar Width</label>
                    <select id="cz-sidebar-width" class="custom-select cz-sidebar-width float-right">
                        <option value="small">Small</option>
                        <option value="medium" selected="">Medium</option>
                        <option value="large">Large</option>
                    </select>
                </div>
            </div>
        </div>



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
