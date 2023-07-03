<nav class="navbar navbar-expand-lg navbar-light bg-faded">
    <div class="container-fluid">
      <div class="navbar-header">
        <button
          type="button"
          data-toggle="collapse"
          class="navbar-toggle d-lg-none float-left"
        >
          <span class="sr-only">Toggle navigation</span
          ><span class="icon-bar"></span><span class="icon-bar"></span
          ><span class="icon-bar"></span></button
        ><span class="d-lg-none navbar-right navbar-collapse-toggle"
          ><a class="open-navbar-container"
            ><i class="ft-more-vertical"></i></a></span
        >
      </div>
      <div class="navbar-container">
        <div id="navbarSupportedContent" class="collapse navbar-collapse">
          <ul class="navbar-nav">
            <li class="dropdown nav-item mt-1">
              {{-- <a
                id="dropdownBasic2"
                href="#"
                data-toggle="dropdown"
                class="nav-link position-relative dropdown-toggle"
                ><i class="ft-bell blue-grey darken-4"></i
                ><span class="notification badge badge-pill badge-danger"
                  >4</span
                >
                <p class="d-none">Notifications</p></a
              > --}}
              {{-- <div
                class="notification-dropdown dropdown-menu dropdown-menu-right"
              >
                <div class="arrow_box_right">
                  <div class="noti-list">
                    <a class="dropdown-item noti-container py-2"
                      ><i
                        class="ft-share info float-left d-block font-medium-4 mt-2 mr-2"
                      ></i
                      ><span class="noti-wrapper"
                        ><span
                          class="noti-title line-height-1 d-block text-bold-400 info"
                          >New Order Received</span
                        ><span class="noti-text"
                          >Lorem ipsum dolor sit ametitaque in, et!</span
                        ></span
                      ></a
                    ><a class="dropdown-item noti-container py-2"
                      ><i
                        class="ft-save warning float-left d-block font-medium-4 mt-2 mr-2"
                      ></i
                      ><span class="noti-wrapper"
                        ><span
                          class="noti-title line-height-1 d-block text-bold-400 warning"
                          >New User Registered</span
                        ><span class="noti-text"
                          >Lorem ipsum dolor sit ametitaque in
                        </span></span
                      ></a
                    ><a class="dropdown-item noti-container py-2"
                      ><i
                        class="ft-repeat danger float-left d-block font-medium-4 mt-2 mr-2"
                      ></i
                      ><span class="noti-wrapper"
                        ><span
                          class="noti-title line-height-1 d-block text-bold-400 danger"
                          >New Order Received</span
                        ><span class="noti-text"
                          >Lorem ipsum dolor sit ametest?</span
                        ></span
                      ></a
                    ><a class="dropdown-item noti-container py-2"
                      ><i
                        class="ft-shopping-cart success float-left d-block font-medium-4 mt-2 mr-2"
                      ></i
                      ><span class="noti-wrapper"
                        ><span
                          class="noti-title line-height-1 d-block text-bold-400 success"
                          >New Item In Your Cart</span
                        ><span class="noti-text"
                          >Lorem ipsum dolor sit ametnatus aut.</span
                        ></span
                      ></a
                    ><a class="dropdown-item noti-container py-2"
                      ><i
                        class="ft-heart info float-left d-block font-medium-4 mt-2 mr-2"
                      ></i
                      ><span class="noti-wrapper"
                        ><span
                          class="noti-title line-height-1 d-block text-bold-400 info"
                          >New Sale</span
                        ><span class="noti-text"
                          >Lorem ipsum dolor sit ametnatus aut.</span
                        ></span
                      ></a
                    ><a class="dropdown-item noti-container py-2"
                      ><i
                        class="ft-box warning float-left d-block font-medium-4 mt-2 mr-2"
                      ></i
                      ><span class="noti-wrapper"
                        ><span
                          class="noti-title line-height-1 d-block text-bold-400 warning"
                          >Order Delivered</span
                        ><span class="noti-text"
                          >Lorem ipsum dolor sit ametnatus aut.</span
                        ></span
                      ></a
                    >
                  </div>
                  <a
                    class="noti-footer primary text-center d-block border-top border-top-blue-grey border-top-lighten-4 text-bold-400 py-1"
                    >Read All Notifications</a
                  >
                </div>
              </div> --}}
            </li>
            <li class="nav-item mt-1 d-none d-lg-block">

            </li>
            <li class="dropdown nav-item mr-0">
                <a
                id="dropdownBasic3"
                href="#"
                data-toggle="dropdown"
                class="nav-link position-relative dropdown-user-link dropdown-toggle"
                ><span class="avatar avatar-online"
                  >
                @if( Auth::user()->image)
                <img
                    id="navbar-avatar"
                    src="{{ asset('uploads/images/' . Auth::user()->image) }}"
                    alt="avatar"
                />
                @else
                <img
                id="navbar-avatar"
                src="{{ asset('../app-assets/img/portrait/medium/avatar-m-9.jpg') }}"
                alt="logo"
                />
                @endif
                </span>
                <p class="d-none">User Settings</p></a
              >
              @if(Auth::user()->hasRole(["admin","superadmin","manager"]))
              <div
                aria-labelledby="dropdownBasic3"
                class="dropdown-menu dropdown-menu-right"
              >
                <div class="arrow_box_right">
                    <a
                        href="{{ route('auth/edit') }}"
                            class="dropdown-item py-1"
                        ><i class="ft-edit mr-2"></i><span>My Profile</span></a
                    >
                </div>
              </div>
              @endif
            </li>
          </ul>
        </div>
      </div>
    </div>
  </nav>
