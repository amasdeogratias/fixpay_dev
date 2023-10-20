<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('admin.dashboard')}}" class="brand-link">
      <!-- <img src="{% static 'dist/img/logo.png' %}" alt="SMS" class="brand-image img-circle elevation-3"
           style="opacity: .8"> -->
      <span class="brand-text font-weight-light">FixPay</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('backend/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">Admin</a>
            </div>
        </div>

      <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
                    with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{route('admin.dashboard')}}" class="nav-link {{Route::currentRouteName()=='admin.dashboard' ? 'active' : ''}}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('admin.categories.index')}}" class="nav-link {{Route::currentRouteName()=='admin.categories.index' ? 'active' : ''}}">
                        <i class="fa fa-tags nav-icon"></i>
                        <p>Categories</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('admin.brands.index')}}" class="nav-link {{Route::currentRouteName()=='admin.brands.index' ? 'active' : ''}}">
                        <i class="fa fa-briefcase nav-icon"></i>
                        <p>Brands</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('admin.attributes.index')}}" class="nav-link {{Route::currentRouteName()=='admin.attributes.index' ? 'active' : ''}}">
                        <i class="fa fa-th nav-icon"></i>
                        <p>Attributes</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('admin.products.index')}}" class="nav-link {{Route::currentRouteName()=='admin.products.index' ? 'active' : ''}}">
                        <i class="fa fa-th nav-icon"></i>
                        <p>Products</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('admin.orders.index')}}" class="nav-link {{Route::currentRouteName()=='admin.orders.index' ? 'active' : ''}}">
                        <i class="fas fa-chart-bar nav-icon"></i>
                        <p>Orders</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Route::currentRouteName() == 'admin.settings' ? 'active' : '' }}" href="{{ route('admin.settings') }}">
                        <i class="app-menu__icon fa fa-cogs nav-icon"></i>
                        <p>Settings</p>
                    </a>
                </li>
            </ul>
        </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
