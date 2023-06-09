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


        <div class="main-panel px-3">
            <div class="main-content">
                <div class="content-wrapper">
                    <h4 class="border-bottom border-2 pb-2 mb-4" style="font-weight: 500;"><i class="las la-tachometer-alt fs-1 me-2"></i>Dashboard</h4>

                    <div class="row">
                        <div class="col-xl-4 col-lg-6 col-md-6 col-12">
                          <div class="card bg-white">
                            <div class="card-body">
                              <div class="card-block pt-2 pb-0">
                                <div class="media">
                                  <div class="media-body white text-left">
                                    <h4 class="d-none">{{$sum1 = 0, $sum2 = 0, $sum3 = 0, $sum4 = 0, $sum5 = 0, $sum6 = 0}}</h4>
                                    @foreach($reschambres as $reschambre)
                                    @if($reschambre->occ && $reschambre->chambres_pr_id)
                                        <h4 class="d-none">{{ $sum1 += ($reschambre->chambres_pr_id)*($reschambre->occ)}}</h4>
                                
                                    @elseif($reschambre->occ && $reschambre->chambres_ps_id)
                                    <h4 class="d-none">{{ $sum2 += ($reschambre->chambres_ps_id)*($reschambre->occ)}}</h4>

                                    @elseif($reschambre->occ && $reschambre->chambres_pr_id && $reschambre->chambres_ps_id)
                                    <h4 class="d-none">{{ $sum3 += ($reschambre->chambres_pr_id)*($reschambre->occ)}}</h4>

                                    @elseif($reschambre->datedebut && $reschambre->datefin && $reschambre->chambres_ps_id)
                                    <h4 class="d-none">{{ $sum4 += ($reschambre->chambres_ps_id)*(((new DateTime($reschambre->datedebut))->diff(new DateTime($reschambre->datefin)))->format('%a'))}}</h4>

                                    @elseif($reschambre->datedebut && $reschambre->datefin && $reschambre->chambres_pr_id)
                                    <h4 class="d-none">{{ $sum5 += ($reschambre->chambres_pr_id)*(((new DateTime($reschambre->datedebut))->diff(new DateTime($reschambre->datefin)))->format('%a'))}}</h4>

                                    @elseif($reschambre->datedebut && $reschambre->datefin && $reschambre->chambres_pr_id && $reschambre->chambres_ps_id)
                                    <h4 class="d-none">{{ $sum6 += ($reschambre->chambres_pr_id)*(((new DateTime($reschambre->datedebut))->diff(new DateTime($reschambre->datefin)))->format('%a'))}}</h4>
                                    @endif
                                    @endforeach
                                    <h4 class="font-medium-5 card-title mb-0">
                                        {{number_format(($sum1 + $sum2 + $sum3 + $sum4 + $sum5 + $sum6),0,'.','.')." ".Auth::user()->hotel->devise}}
                                    </h4>
                                    <span class="grey darken-1">Total réservations chambres</span>
                                  </div>
                                  <div class="media-right text-right">
                                    <i class="icon-screen-tablet font-large-1 primary"></i>
                                  </div>
                                </div>
                              </div>
                              <div id="Widget-line-chart" class="height-150 lineChartWidget WidgetlineChart mb-2"></div>
                            </div>
                          </div>
                        </div>
                        <div class="col-xl-4 col-lg-6 col-md-6 col-12">
                          <div class="card bg-white">
                            <div class="card-body">
                              <div class="card-block pt-2 pb-0">
                                <div class="media">
                                  <div class="media-body white text-left">
                                    <h4 class="d-none">{{$sum7 = 0, $sum8 = 0, $sum9 = 0}}</h4>
                                    @foreach($ressalles as $ressalle)
                                    @if($ressalle->datedebut && $ressalle->datefin && $ressalle->salles_ps_id)
                                    <h4 class="d-none">{{ $sum7 += ($ressalle->salles_ps_id)*(((new DateTime($ressalle->datedebut))->diff(new DateTime($ressalle->datefin)))->format('%a'))}}</h4>

                                    @elseif($ressalle->datedebut && $ressalle->datefin && $ressalle->salles_pr_id)
                                    <h4 class="d-none">{{ $sum8 += ($ressalle->salles_pr_id)*(((new DateTime($ressalle->datedebut))->diff(new DateTime($ressalle->datefin)))->format('%a'))}}</h4>

                                    @elseif($ressalle->datedebut && $ressalle->datefin && $ressalle->salles_pr_id && $ressalle->salles_ps_id)
                                    <h4 class="d-none">{{ $sum9 += ($ressalle->salles_pr_id)*(((new DateTime($ressalle->datedebut))->diff(new DateTime($ressalle->datefin)))->format('%a'))}}</h4>
                                    @endif
                                    @endforeach
                                    <h4 class="font-medium-5 card-title mb-0">
                                        {{number_format(($sum7 + $sum8 + $sum9),0,'.','.')." ".Auth::user()->hotel->devise}}
                                    </h4>
                                    <span class="grey darken-1">Total réservations salles</span>
                                  </div>
                                  <div class="media-right text-right">
                                    <i class="icon-screen-tablet font-large-1 warning"></i>
                                  </div>
                                </div>
                              </div>
                              <div id="Widget-line-chart1" class="height-150 lineChartWidget WidgetlineChart1 mb-2"></div>
                            </div>
                          </div>
                        </div>
                        <div class="col-xl-4 col-lg-6 col-md-6 col-12">
                          <div class="card bg-white">
                            <div class="card-body">
                              <div class="card-block pt-2 pb-0">
                                <div class="media">
                                  <div class="media-body white text-left">
                                    <h4 class="font-medium-5 card-title mb-0">
                                        {{number_format(($sum1 + $sum2 + $sum3 + $sum4 + $sum5 + $sum6 + $sum7 + $sum8 + $sum9),0,'.','.')." ".Auth::user()->hotel->devise}}
                                    </h4>
                                    <span class="grey darken-1">Total réservations</span>
                                  </div>
                                  <div class="media-right text-right">
                                    <i class="icon-screen-tablet font-large-1 success"></i>
                                  </div>
                                </div>
                              </div>
                              <div id="Widget-line-chart2" class="height-150 lineChartWidget WidgetlineChart2 mb-2"></div>
                            </div>
                          </div>
                        </div>
                    </div>
                    <div class="row w-100" style="margin: 0!important;">
                        <div class="col-xl-3 col-lg-6 col-12">
                          <div class="card">
                            <div class="card-body">
                              <div class="media align-items-stretch">
                                <div class="p-2 text-center bg-info rounded-left pt-3">
                                  <i class="fa fa-line-chart font-large-1 text-white"></i>
                                </div>
                                <div class="p-2 media-body">
                                  <h6><strong class="fw-bold">ADR</strong><br>(chambres)</h6>
                                  @if($chambresvd != 0)
                                  <h6 class="text-bold-500 mb-0">{{ number_format((($sum1 + $sum2 + $sum3 + $sum4 + $sum5 + $sum6)/($chambresvd)),0,'.','.')." ".Auth::user()->hotel->devise}}</h6>
                                  @else
                                  <h6 class="text-bold-500 mb-0"></h6>
                                  @endif
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-xl-3 col-lg-6 col-12">
                          <div class="card">
                            <div class="card-body">
                              <div class="media align-items-stretch">
                                <div class="p-2 text-center bg-danger rounded-left pt-3">
                                  <i class="fa fa-line-chart font-large-1 text-white"></i>
                                </div>
                                <div class="p-2 media-body">
                                  <h6><strong class="fw-bold">ADR</strong><br>(salles)</h6>
                                  @if($sallesvd != 0)
                                  <h6 class="text-bold-500 mb-0">{{ number_format(($sum7 + $sum8 + $sum9)/($sallesvd),0,'.','.')." ".Auth::user()->hotel->devise }}</h6>
                                  @else
                                  <h6 class="text-bold-500 mb-0"></h6>
                                  @endif
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-xl-3 col-lg-6 col-12">
                          <div class="card">
                            <div class="card-body">
                              <div class="media align-items-stretch">
                                <div class="p-2 text-center bg-success rounded-left pt-3">
                                  <i class="fa fa-line-chart font-large-1 text-white"></i>
                                </div>
                                <div class="p-2 media-body">
                                  <h6><strong class="fw-bold">RAVPAR</strong> (chambres)</h6>
                                  @if($chambresvd != 0)
                                  <h6 class="text-bold-500 mb-0">{{ number_format(((($sum1 + $sum2 + $sum3 + $sum4 + $sum5 + $sum6)/($chambresvd))*($chambresocp/$nbrchambres)),0,'.','.')." ".Auth::user()->hotel->devise}}</h6>
                                  @else
                                  <h6 class="text-bold-500 mb-0"></h6>
                                  @endif
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-xl-3 col-lg-6 col-12">
                          <div class="card">
                            <div class="card-body">
                              <div class="media align-items-stretch">
                                <div class="p-2 text-center bg-warning rounded-left pt-3">
                                  <i class="fa fa-line-chart font-large-1 text-white"></i>
                                </div>
                                <div class="p-2 media-body">
                                  <h6><strong class="fw-bold">RAVPAR</strong><br>(salles)</h6>
                                  @if($sallesvd != 0)
                                  <h6 class="text-bold-500 mb-0">{{ number_format(((($sum7 + $sum8 + $sum9)/($sallesvd))*($sallesocp/$nbrsalles)),0,'.','.')." ".Auth::user()->hotel->devise }}</h6>
                                  @else
                                  <h6 class="text-bold-500 mb-0"></h6>
                                  @endif
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                    </div>
                    <div class="row w-100" style="margin: 0!important;">
                        <div class="col-xl-3 col-lg-6 col-12">
                          <div class="card">
                            <div class="card-body">
                              <div class="media align-items-stretch">
                                <div class="p-2 text-center bg-info rounded-left pt-3">
                                  <i class="las la-bed font-large-2 text-white"></i>
                                </div>
                                <div class="py-2 px-2 media-body">
                                  <h6 class="info">Taux d'occupation</h6>
                                  @if($nbrchambres != 0)
                                  <h5 class="text-bold-400">{{ ($chambresocp/$nbrchambres)*100 }}%</h5>
                                  <div class="progress mt-1 mb-0" style="height: 7px;">
                                    <div class="progress-bar bg-info" role="progressbar" style="width: {{ ($chambresocp/$nbrchambres)*100 }}%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100">
                                    </div>
                                  </div>
                                  @else
                                  <h5 class="text-bold-400"></h5>
                                  @endif
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-xl-3 col-lg-6 col-12">
                          <div class="card">
                            <div class="card-body">
                              <div class="media align-items-stretch">
                                <div class="p-2 text-center bg-danger rounded-left pt-3">
                                  <i class="las la-door-open font-large-2 text-white"></i>
                                </div>
                                <div class="py-2 px-2 media-body">
                                  <h6 class="danger">Taux d'occupation</h6>
                                  @if($nbrsalles != 0)
                                  <h5 class="text-bold-500">{{ ($sallesocp/$nbrsalles)*100 }}%</h5>
                                  <div class="progress mt-1 mb-0" style="height: 7px;">
                                    <div class="progress-bar bg-danger" role="progressbar" style="width: {{ ($sallesocp/$nbrsalles)*100 }}%" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100"></div>
                                  </div>
                                  @else
                                  <h5 class="text-bold-400"></h5>
                                  @endif
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-xl-3 col-lg-6 col-12">
                            <div class="card">
                              <div class="card-body">
                                <div class="media align-items-stretch">
                                  <div class="p-2 text-center bg-success rounded-left pt-3">
                                    <i class="las la-bed font-large-2 text-white"></i>
                                  </div>
                                  <div class="py-2 px-2 media-body">
                                    <h6 class="success">Total Chambres</h6>
                                    <h5 class="text-bold-400">{{ $nbrchambres }}</h5>
                                  </div>
                                </div>
                              </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-6 col-12">
                            <div class="card">
                              <div class="card-body">
                                <div class="media align-items-stretch">
                                  <div class="p-2 text-center bg-warning rounded-left pt-3">
                                    <i class="las la-door-open font-large-2 text-white"></i>
                                  </div>
                                  <div class="py-2 px-2 media-body">
                                    <h6 class="warning">Total Salles</h6>
                                    <h5 class="text-bold-400">{{ $nbrsalles }}</h5>
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
