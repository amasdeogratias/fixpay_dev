
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="Sleek Dashboard - Free Bootstrap 4 Admin Dashboard Template and UI Kit. It is very powerful bootstrap admin dashboard, which allows you to build products like admin panels, content management systems and CRMs etc.">

    <!-- theme meta -->
    <meta name="theme-name" content="sleek" />

    <title>Ecommerce - Sleek Admin Dashboard Template</title>

    <!-- GOOGLE FONTS -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500|Poppins:400,500,600,700|Roboto:400,500" rel="stylesheet" />

    <link href="https://cdn.materialdesignicons.com/4.4.95/css/materialdesignicons.min.css" rel="stylesheet" />

    <!-- PLUGINS CSS STYLE -->
    <link href="{{ asset('backend/assets/plugins/simplebar/simplebar.css') }}" rel="stylesheet" />
    <link href="{{ asset('backend/assets/plugins/nprogress/nprogress.css') }}" rel="stylesheet" />

    <!-- No Extra plugin used -->
    <link href="{{ asset('backend/assets/plugins/jvectormap/jquery-jvectormap-2.0.3.css') }}" rel='stylesheet'>
    <link href="{{ asset('backend/assets/plugins/daterangepicker/daterangepicker.css') }}" rel='stylesheet'>


    <link href="{{ asset('backend/assets/plugins/toastr/toastr.min.css') }}" rel='stylesheet'>







    <!-- SLEEK CSS -->
    <link id="sleek-css" rel="stylesheet" href="{{asset('backend/assets/css/sleek.css')}}" />

    <!-- FAVICON -->
    <link href="{{ asset('backend/assets/img/favicon.png') }}" rel="shortcut icon" />
    <script src="{{ asset('backend/assets/plugins/nprogress/nprogress.js') }}"></script>
  </head>

  <body class="header-fixed sidebar-fixed sidebar-dark header-light" id="body">
    <script>
      NProgress.configure({ showSpinner: false });
      NProgress.start();
    </script>

    <div id="toaster"></div>

    <!-- ====================================
    ——— WRAPPER
    ===================================== -->
    <div class="wrapper">
        <!-- ====================================
          ——— LEFT SIDEBAR WITH OUT FOOTER
        ===================================== -->
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
                <li class="has-sub active expand">
                  <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#dashboard"
                    aria-expanded="false" aria-controls="dashboard">
                    <i class="mdi mdi-view-dashboard-outline"></i>
                    <span class="nav-text">Dashboard</span> <b class="caret"></b>
                  </a>

                  <ul class="collapse show" id="dashboard" data-parent="#sidebar-menu">
                    <div class="sub-menu">
                      <li class="active">
                        <a class="sidenav-item-link" href="index.html">
                          <span class="nav-text">Ecommerce</span>
                        </a>
                      </li>

                      <li class="">
                        <a class="sidenav-item-link" href="analytics.html">
                          <span class="nav-text">Analytics</span>
                          <span class="badge badge-success">new</span>
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


          <!-- ====================================
        ——— PAGE WRAPPER
        ===================================== -->
        <div class="page-wrapper">

          <!-- Header -->
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
                      <span class="d-none d-lg-inline-block">Deo amas</span>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-right">
                      <!-- User image -->
                      <li class="dropdown-header">
                        <img src="{{('backend/assets/img/user/user.png')}}" class="img-circle" alt="User Image" />
                        <div class="d-inline-block">
                          Deo Amas <small class="pt-1">iamdeo@gmail.com</small>
                        </div>
                      </li>

                      <li>
                        <a href="user-profile.html">
                          <i class="mdi mdi-account"></i> My Profile
                        </a>
                      </li>

                      <li class="dropdown-footer">
                        <a href="index.html"> <i class="mdi mdi-logout"></i> Log Out </a>
                      </li>
                    </ul>
                  </li>
                </ul>
              </div>
            </nav>
          </header>


          <!-- ====================================
          ——— CONTENT WRAPPER
          ===================================== -->
          <div class="content-wrapper">
            <div class="content">

@yield('content')





      </div> <!-- End Content -->
    </div> <!-- End Content Wrapper -->


    <!-- Footer -->
    <footer class="footer mt-auto">
      <div class="copyright bg-white">
        <p>
          Copyright &copy; <span id="copy-year"></span> a template by <a class="text-primary" href="https://themefisher.com" target="_blank">Themefisher</a>.
        </p>
      </div>
      <script>
        var d = new Date();
        var year = d.getFullYear();
        document.getElementById("copy-year").innerHTML = year;
      </script>
    </footer>

    </div> <!-- End Page Wrapper -->
  </div> <!-- End Wrapper -->



    <!-- Javascript -->
    <script src="{{ asset('backend/assets/plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('backend/assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('backend/assets/plugins/simplebar/simplebar.min.js') }}"></script>

    <script src="{{ asset('backend/assets/plugins/charts/Chart.min.js') }}"></script>
    <script src="{{ asset('backend/assets/js/chart.js') }}"></script>




    <script src="{{ asset('backend/assets/plugins/jvectormap/jquery-jvectormap-2.0.3.min.js') }}"></script>
    <script src="{{ asset('backend/assets/plugins/jvectormap/jquery-jvectormap-world-mill.js') }}"></script>
    <script src="{{ asset('backend/assets/js/vector-map.js') }}"></script>

    <script src="{{ asset('backend/assets/plugins/daterangepicker/moment.min.js') }}"></script>
    <script src="{{ asset('backend/assets/plugins/daterangepicker/daterangepicker.js') }}"></script>
    <script src="{{ asset('backend/assets/js/date-range.js') }}"></script>








    {{-- <script src="{{ asset('backend/assets/plugins/toastr/toastr.min.js') }}"></script> --}}












    <script src="{{asset('backend/assets/js/sleek.js')}}"></script>
  <link href="{{asset('backend/assets/options/optionswitch.css')}}" rel="stylesheet">
<script src="{{asset('backend/assets/options/optionswitcher.js')}}"></script>
</body>
</html>

