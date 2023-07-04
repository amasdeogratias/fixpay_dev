<header class="main-header " id="header">
    <nav class="navbar navbar-static-top navbar-expand-lg">
      <!-- Sidebar toggle button -->
      <button id="sidebar-toggler" class="sidebar-toggle">
        <span class="sr-only">Toggle navigation</span>
      </button>
      <!-- search form -->
      <div class="search-form d-none d-lg-inline-block">
        <div class="input-group">
          <button type="button" name="search" id="search-btn" class="btn btn-flat">
            <i class="mdi mdi-magnify"></i>
          </button>
          <input type="text" name="query" id="search-input" class="form-control" placeholder="search..."
            autofocus autocomplete="off" />
        </div>
        <div id="search-results-container">
          <ul id="search-results"></ul>
        </div>
      </div>

      <div class="navbar-right ">
        <ul class="nav navbar-nav">

          <!-- User Account -->
          <li class="dropdown user-menu">
            <button href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
              <img src="{{('backend/assets/img/user/user.png')}}" class="user-image" alt="User Image" />
              <span class="d-none d-lg-inline-block">@auth {{Auth::user()->name}} @endauth</span>
            </button>
            <ul class="dropdown-menu dropdown-menu-right">
              <!-- User image -->
              <li class="dropdown-header">
                <img src="{{('backend/assets/img/user/user.png')}}" class="img-circle" alt="User Image" />
                <div class="d-inline-block">
                    @auth
                        {{Auth::user()->name}} <small class="pt-1">{{Auth::user()->email}}</small>
                    @endauth

                </div>
              </li>

              <li>
                <a href="user-profile.html">
                  <i class="mdi mdi-account"></i> My Profile
                </a>
              </li>

              <li class="dropdown-footer">
                <a href="{{route('admin.logout')}}"> <i class="mdi mdi-logout"></i> Log Out </a>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>
