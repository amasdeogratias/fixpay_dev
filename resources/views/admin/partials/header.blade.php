<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
    </ul>
    <h4 style="margin-left: 10px;margin-top: 5px;">FixPay</h4>
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
            @auth {{auth()->user()->name}} @endauth
        </a>


        <div class="dropdown-menu  dropdown-menu-right" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="{{ route('admin.logout') }}">
                <i class="fa fa-sign-out"></i> Logout
            </a>
        </div>
    </li>
    </ul>

    <!-- Right navbar links -->
  </nav>
