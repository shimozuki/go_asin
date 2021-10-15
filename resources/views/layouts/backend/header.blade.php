
@if (auth::user()->role == 'Pemilik')
  <div class="content-overlay"></div>
  <div class="header-navbar-shadow"></div>
  <nav class="header-navbar navbar-expand-lg navbar navbar-with-menu fixed-top navbar-light navbar-shadow">
    <div class="navbar-wrapper">
        <div class="navbar-container content">
            <div class="navbar-collapse" id="navbar-mobile">
                <div class="mr-auto float-left bookmark-wrapper d-flex align-items-center">
                  <ul class="nav navbar-nav">
                      <li class="nav-item mobile-menu d-xl-none mr-auto"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ficon feather icon-menu"></i></a></li>
                  </ul>
                </div>
                <ul class="nav navbar-nav float-right">
                  <li class="nav-item d-none d-lg-block"><a class="nav-link nav-link-expand"><i class="ficon feather icon-maximize"></i></a></li>
                  <li class="dropdown dropdown-notification nav-item"><a class="nav-link nav-link-label" href="#" data-toggle="dropdown"><i class="ficon feather icon-bell"></i><span class="badge badge-pill badge-primary badge-up">0</span></a>
                      <ul class="dropdown-menu dropdown-menu-media dropdown-menu-right">
                        <li class="dropdown-menu-header">
                            <div class="dropdown-header m-0 p-2">
                                <h3 class="white">5 New</h3><span class="grey darken-2">Notifications</span>
                            </div>
                        </li>
                        <li class="scrollable-container media-list">
                          <a class="d-flex justify-content-between" href="javascript:void(0)">
                              <div class="media d-flex align-items-start">
                                  <div class="media-left"><i class="feather icon-check-circle font-medium-5 info"></i></div>
                                  <div class="media-body">
                                      <h6 class="info media-heading">Complete the task</h6><small class="notification-text">Cake sesame snaps cupcake</small>
                                  </div><small>
                                      <time class="media-meta" datetime="2015-06-11T18:29:20+08:00">Last week</time></small>
                              </div>
                          </a>
                          <a class="d-flex justify-content-between" href="javascript:void(0)">
                              <div class="media d-flex align-items-start">
                                  <div class="media-left"><i class="feather icon-file font-medium-5 warning"></i></div>
                                  <div class="media-body">
                                      <h6 class="warning media-heading">Generate monthly report</h6><small class="notification-text">Chocolate cake oat cake tiramisu marzipan</small>
                                  </div><small>
                                      <time class="media-meta" datetime="2015-06-11T18:29:20+08:00">Last month</time></small>
                              </div>
                          </a>
                        </li>
                        <li class="dropdown-menu-footer"><a class="dropdown-item p-1 text-center" href="javascript:void(0)">Read all notifications</a></li>
                      </ul>
                  </li>
                  <li class="dropdown dropdown-user nav-item">
                    <a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">
                      <div class="user-nav d-sm-flex d-none">
                        <span class="user-name text-bold-600">{{Auth::user()->name}}</span>
                        <span class="user-status">{{Auth::user()->role}}</span>
                      </div>
                      <span>
                        @if (Auth::user()->photo == NULL)
                          <img class="round" src="{{asset('assets/images/profile/profile.jpg')}}" alt="avatar" height="40" width="40">
                        @else
                          <img class="round" src="{{ url('/photo_profile_admin/'. Auth::user()->photo) }}" alt="avatar" height="40" width="40">
                        @endif
                      </span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                      <a class="dropdown-item" href="{{url('pemilik/profile')}}"><i class="feather icon-user"></i> Edit Profile</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="{{ route('logout') }}"
                          onclick="event.preventDefault();
                          document.getElementById('logout-form').submit();">
                        <i class="feather icon-power"></i> Logout
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                      </a>
                    </div>
                  </li>
                </ul>
            </div>
        </div>
    </div>
  </nav>
@elseif(auth::user()->role == 'Pencari')
<div class="content-overlay"></div>
  <nav class="header-navbar navbar-expand-lg navbar navbar-with-menu navbar-fixed navbar-brand-center">
      <div class="navbar-header d-xl-block d-none">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item">
              <a class="navbar-brand" href="../../../html/ltr/horizontal-menu-template-dark/index.html">
                <div class="brand-logo"></div>
              </a>
            </li>
        </ul>
      </div>
      <div class="navbar-wrapper">
        <div class="navbar-container content">
          <div class="navbar-collapse" id="navbar-mobile">
              <div class="mr-auto float-left bookmark-wrapper d-flex align-items-center">
                <ul class="nav navbar-nav">
                  <li class="nav-item mobile-menu d-xl-none mr-auto"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ficon feather icon-menu"></i></a></li>
                </ul>
              </div>
              <ul class="nav navbar-nav float-right">
                <li class="nav-item d-none d-lg-block">
                  <a class="nav-link nav-link-expand"><i class="ficon feather icon-maximize"></i></a>
                </li>
                <li class="dropdown dropdown-notification nav-item">
                  <a class="nav-link nav-link-label" href="#" data-toggle="dropdown"><i class="ficon feather icon-bell"></i>
                    <span class="badge badge-pill badge-primary badge-up">0</span>
                  </a>
                    <ul class="dropdown-menu dropdown-menu-media dropdown-menu-right">
                      <li class="dropdown-menu-header">
                        <div class="dropdown-header m-0 p-2">
                          <h3 class="white">5 New</h3><span class="notification-title">App Notifications</span>
                        </div>
                      </li>
                    </ul>
                </li>
                 <li class="dropdown dropdown-user nav-item">
                    <a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">
                      <div class="user-nav d-sm-flex d-none">
                        <span class="user-name text-bold-600">{{Auth::user()->name}}</span>
                        <span class="user-status">{{Auth::user()->role}}</span>
                      </div>
                      <span>
                        @if (Auth::user()->photo == NULL)
                          <img class="round" src="{{asset('assets/images/profile/profile.jpg')}}" alt="avatar" height="40" width="40">
                        @else
                          <img class="round" src="{{ url('/photo_profile_admin/'. Auth::user()->photo) }}" alt="avatar" height="40" width="40">
                        @endif
                      </span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                      <a class="dropdown-item" href="{{url('user/profile')}}"><i class="feather icon-user"></i> Edit Profile</a>
                      <a class="dropdown-item" href="{{url('user/tagihan')}}"><i class="feather icon-book"></i> Tagihan</a>
                      <a class="dropdown-item" href=""><i class="feather icon-settings"></i> Reset Password</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="{{ route('logout') }}"
                          onclick="event.preventDefault();
                          document.getElementById('logout-form').submit();">
                        <i class="feather icon-power"></i> Logout
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                      </a>
                    </div>
                  </li>
              </ul>
          </div>
        </div>
      </div>
  </nav>
@endif

