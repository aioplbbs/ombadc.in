<!-- Menu -->
  <!-- Sidenav Menu Start -->
  <div class="sidenav-menu">

      <!-- Brand Logo -->
      <a href="{{url('/dashboard')}}" class="logo">
          <span class="logo-light">
              <span class="logo-lg"><img src="{{session('site_settings')['site_logo']??''}}" alt="logo"></span>
              <span class="logo-sm"><img src="assets/images/logo-sm.png" alt="small logo"></span>
          </span>

          <span class="logo-dark">
              <span class="logo-lg"><img src="{{session('site_settings')['site_logo']??''}}" alt="dark logo" style="height:80px;"></span>
              <span class="logo-sm"><img src="assets/images/logo-sm.png" alt="small logo"></span>
          </span>
      </a>
      <p style="margin:0 25px;"><b>{{ session('site_settings')['site_title']['title']??config('app.name') }}</p>

      <!-- Sidebar Hover Menu Toggle Button -->
      

      <!-- Full Sidebar Menu Close Button -->
      <button class="button-close-fullsidebar">
          <i class="ri-close-line align-middle"></i>
      </button>

      <div data-simplebar>

          <!--- Sidenav Menu -->
          <ul class="side-nav">
              <li class="side-nav-title">Navigation</li>

              <li class="side-nav-item">
                  <a href="{{url('/dashboard')}}" class="side-nav-link">
                      <span class="menu-icon"><i class="ri-dashboard-3-line"></i></span>
                      <span class="menu-text"> Dashboard </span>
                  </a>
              </li>
            
              @can('view banner')
              <li class="side-nav-item">
                  <a href="{{route('banner.index')}}" class="side-nav-link">
                      <span class="menu-icon"><i class="ri-flag-line"></i></span>
                      <span class="menu-text"> Banner </span>
                  </a>
              </li>
              @endcan

              @can('view notice')
              <li class="side-nav-item">
                  <a href="{{route('notice.index')}}" class="side-nav-link">
                      <span class="menu-icon"><i class="ri-notification-4-line"></i></span>
                      <span class="menu-text"> Notice </span>
                  </a>
              </li>
              @endcan

              @can('view gallery')
              <li class="side-nav-item">
                  <a href="{{route('gallery.index')}}" class="side-nav-link">
                      <span class="menu-icon"><i class="ri-image-ai-fill"></i></span>
                      <span class="menu-text"> Gallery </span>
                  </a>
              </li>
              @endcan

              @can('view page')
              <li class="side-nav-item">
                  <a href="{{route('page.index')}}" class="side-nav-link">
                      <span class="menu-icon"><i class="ri-pages-line"></i></span>
                      <span class="menu-text"> Pages </span>
                  </a>
              </li>
              @endcan

              @can('view menu')
              <li class="side-nav-item">
                  <a href="{{route('menus.index')}}" class="side-nav-link">
                      <span class="menu-icon"><i class="ri-menu-unfold-2-fill"></i></span>
                      <span class="menu-text"> Link Container </span>
                  </a>
              </li>
              @endcan

              @can('view sector')
              <li class="side-nav-item">
                  <a href="{{route('sector.index')}}" class="side-nav-link">
                      <span class="menu-icon"><i class="ri-menu-unfold-2-fill"></i></span>
                      <span class="menu-text"> Sector </span>
                  </a>
              </li>
              @endcan

              @can('view department')
              <li class="side-nav-item">
                  <a href="{{route('department.index')}}" class="side-nav-link">
                      <span class="menu-icon"><i class="ri-menu-unfold-2-fill"></i></span>
                      <span class="menu-text"> Department </span>
                  </a>
              </li>
              @endcan

              <li class="side-nav-title">Admin Section</li>

              @can('view user')
              <li class="side-nav-item">
                  <a href="{{route('users.index')}}" class="side-nav-link">
                      <span class="menu-icon"><i class="ri-user-3-line"></i></span>
                      <span class="menu-text"> Users </span>
                  </a>
              </li>
              @endcan

              @can('view role')
              <li class="side-nav-item">
                  <a href="{{route('roles.index')}}" class="side-nav-link">
                      <span class="menu-icon"><i class="ri-user-settings-line"></i></span>
                      <span class="menu-text"> Roles </span>
                  </a>
              </li>
              @endcan

              @can('view permission')
              <li class="side-nav-item">
                  <a href="{{route('permission.index')}}" class="side-nav-link">
                      <span class="menu-icon"><i class="ri-equalizer-2-fill"></i></span>
                      <span class="menu-text"> Permissions </span>
                  </a>
              </li>
              @endcan

              @can('view settings')
              <li class="side-nav-item">
                  <a href="{{route('settings.index')}}" class="side-nav-link">
                      <span class="menu-icon"><i class="ri-settings-2-line"></i></span>
                      <span class="menu-text"> Setting </span>
                  </a>
              </li>
              @endcan

          </ul>

          <div class="clearfix"></div>
      </div>
  </div>
  <!-- Sidenav Menu End -->

  
  <!-- Color Top line -->
  <div class="color-line"></div>

  <!-- Topbar Start -->
  <header class="app-topbar">
      <div class="page-container topbar-menu">
          <div class="d-flex align-items-center gap-2">

              <!-- Brand Logo -->
              <a href="index.html" class="logo">
                  <span class="logo-light">
                      <span class="logo-lg"><img src="assets/images/logo.png" alt="logo"></span>
                      <span class="logo-sm"><img src="assets/images/logo-sm.png" alt="small logo"></span>
                  </span>

                  <span class="logo-dark">
                      <span class="logo-lg"><img src="assets/images/logo-dark.png" alt="dark logo"></span>
                      <span class="logo-sm"><img src="assets/images/logo-sm.png" alt="small logo"></span>
                  </span>
              </a>

              <!-- Sidebar Menu Toggle Button -->
              <button class="sidenav-toggle-button px-2">
                  <i class="ri-menu-5-line fs-24"></i>
              </button>

              <!-- Horizontal Menu Toggle Button -->
              <button class="topnav-toggle-button px-2" data-bs-toggle="collapse" data-bs-target="#topnav-menu-content">
                  <i class="ri-menu-5-line fs-24"></i>
              </button>

              <!-- Topbar Page Title -->
              <div class="topbar-item d-none d-md-flex">
                  
                  <div>
                      <h4 class="page-title fs-18 fw-bold mb-0">{{$breadcrumb['title']??""}}</h4>
                      <ol class="breadcrumb m-0 mt-1 py-0">
                            @if(!empty($breadcrumb['items']))
                            @foreach($breadcrumb['items'] as $key => $value)
                                <li class="breadcrumb-item"><a href="javascript: void(0);">{{$value}}</a></li>
                            @endforeach
                            @endif
                            @if(!empty($breadcrumb['last_item']))
                            <li class="breadcrumb-item active">{{$breadcrumb['last_item']}}</li>
                            @endif
                      </ol>
                  </div>
                  

                  
              </div>
          </div>

          <div class="d-flex align-items-center gap-2">
                <a href="{{url('/')}}" target="_blank">Website</a>

              <!-- Light/Dark Mode Button -->
              <div class="topbar-item d-none d-sm-flex">
                  <button class="topbar-link" id="light-dark-mode" type="button">
                      <i class="ri-moon-line fs-22"></i>
                  </button>
              </div>

              <!-- User Dropdown -->
              <div class="topbar-item nav-user">
                  <div class="dropdown">
                      <a class="topbar-link dropdown-toggle drop-arrow-none px-2" data-bs-toggle="dropdown"
                          data-bs-offset="0,25" type="button" aria-haspopup="false" aria-expanded="false">
                          <img src="{{ Auth::user()->profile_photo_url }}" width="32" class="rounded-circle me-lg-2 d-flex"
                              alt="{{ Auth::user()->name }}">
                          <span class="d-lg-flex flex-column gap-1 d-none">
                              <h5 class="my-0">{{ Auth::user()->name }}</h5>
                          </span>
                          <i class="ri-arrow-down-s-line d-none d-lg-block align-middle ms-2"></i>
                      </a>
                      <div class="dropdown-menu dropdown-menu-end">
                          <!-- item-->
                          <div class="dropdown-header noti-title">
                              <h6 class="text-overflow m-0">Welcome !</h6>
                          </div>

                          <!-- item-->
                          <a href="{{url('user/profile')}}" class="dropdown-item">
                              <i class="ri-profile-line me-1 fs-16 align-middle"></i>
                              <span class="align-middle">Profile</span>
                          </a>

                          <div class="dropdown-divider"></div>

                          <!-- item-->
                          <a href="javascript:void(0);" onclick="document.getElementById('logout').submit();" class="dropdown-item active fw-semibold text-danger">
                              <i class="ri-logout-box-line me-1 fs-16 align-middle"></i>
                              <span class="align-middle">Sign Out</span>
                          </a>
                          <form method="POST" action="{{ route('logout') }}" id="logout" style="display: none;">
                            @csrf
                        </form>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </header>
  <!-- Topbar End -->