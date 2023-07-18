<aside class="left-sidebar bg-sidebar">
    <div id="sidebar" class="sidebar sidebar-with-footer">
      <!-- Aplication Brand -->
      <div class="app-brand">
        <a href="/index.html" title="Sleek Dashboard">
          <svg
            class="brand-icon"
            xmlns="http://www.w3.org/2000/svg"
            preserveAspectRatio="xMidYMid"
            width="30"
            height="33"
            viewBox="0 0 30 33">
            <g fill="none" fill-rule="evenodd">
              <path class="logo-fill-blue" fill="#7DBCFF" d="M0 4v25l8 4V0zM22 4v25l8 4V0z" />
              <path class="logo-fill-white" fill="#FFF" d="M11 4v25l8 4V0z" />
            </g>
          </svg>

          <span class="brand-name text-truncate">FixPay</span>
        </a>
      </div>

      <!-- begin sidebar scrollbar -->
      <div class="" data-simplebar style="height: 100%;">
        <!-- sidebar menu -->
        <ul class="nav sidebar-inner" id="sidebar-menu">
          <li class="active">
            <a class="sidenav-item-link" href="{{route('admin.dashboard')}}">
              <i class="mdi mdi-view-dashboard-outline"></i>
              <span class="nav-text">Dashboard</span></b>
            </a>
          </li>
          <li class="has-sub expand">
            <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#dashboard"
              aria-expanded="false" aria-controls="dashboard">
              <i class="mdi mdi-view-dashboard-outline"></i>
              <span class="nav-text">Categories</span> <b class="caret"></b>
            </a>

            <ul class="collapse show" id="dashboard" data-parent="#sidebar-menu">
              <div class="sub-menu">
                <li class="{{Route::currentRouteName() == 'admin.categories.create' ? 'active' : ''}}">
                  <a class="sidenav-item-link" href="{{route('admin.categories.create')}}">
                    <span class="nav-text">Add</span>
                  </a>
                </li>

                <li class="{{Route::currentRouteName() == 'admin.categories.index' ? 'active' : ''}}">
                  <a class="sidenav-item-link" href="{{route('admin.categories.index')}}">
                    <span class="nav-text">View</span>
                  </a>
                </li>
              </div>
            </ul>
          </li>

          <li class="has-sub ">
            <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#app"
              aria-expanded="false" aria-controls="app">
              <i class="mdi mdi-pencil-box-multiple"></i>
              <span class="nav-text">App</span> <b class="caret"></b>
            </a>

            <ul class="collapse " id="app" data-parent="#sidebar-menu">
              <div class="sub-menu">
                <li class="">
                  <a class="sidenav-item-link" href="chat.html">
                    <span class="nav-text">Chat</span>
                  </a>
                </li>

                <li class="">
                  <a class="sidenav-item-link" href="contacts.html">
                    <span class="nav-text">Contacts</span>
                  </a>
                </li>

                <li class="">
                  <a class="sidenav-item-link" href="team.html">
                    <span class="nav-text">Team</span>
                  </a>
                </li>

                <li class="">
                  <a class="sidenav-item-link" href="calendar.html">
                    <span class="nav-text">Calendar</span>
                  </a>
                </li>
              </div>
            </ul>
          </li>

          <!-- <li class="section-title">
            UI Elements
          </li> -->

          <!-- <li class="section-title">
            Pages
          </li> -->

          <!-- <li class="section-title">
            Documentation
          </li> -->
        </ul>
      </div>


    </div>
  </aside>
