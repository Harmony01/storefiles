
  <header class="main-header">
    <!-- Logo -->
    <a href="index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>Emmat</b>Mall</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Emmat</b>Mall</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="../../admins/{{Auth::user()->image }}" class="user-image img-responsive" alt="User Image">
              <span class="hidden-xs">{{Auth::user()->name }}</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="../../admins/{{Auth::user()->image }}" class="img-circle img-responsive" alt="User Image">

                <p>
                 {{Auth::user()->position }}
                 
                </p>
              </li>
              <!-- Menu Body -->
              <li class="user-body">
                <div class="row">
                  <div class="col-xs-4 text-center">
                    <a href="#">Followers</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Sales</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Friends</a>
                  </div>
                </div>
                <!-- /.row -->
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                   <a href="{{ route('admin.logout') }}"onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();" class="btn btn-flat btn-danger"><i class="fa fa-sign-out"></i> Logout</a>
                <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                 {{ csrf_field() }}
                  </form>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>
        </ul>
      </div>
    </nav>
  </header>
    <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li>
          <a href="/dashboard">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>
        <li>
          <a href="{{Route('loc')}}">
            <i class="fa fa-home"></i> <span>Locations</span>
          </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-cubes"></i> <span>Products</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{Route('product.index')}}"><i class="fa fa-circle-o"></i>All Products</a></li>
            <li><a href="{{Route('product.create')}}"><i class="fa fa-plus"></i>Add Products</a></li>
          </ul>
        </li>
         <li class="treeview">
          <a href="#">
            <i class="fa fa-pencil-square-o"></i>
            <span>Orders</span>
             <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route('new.orders','all') }}"><i class="fa fa-circle-o"></i>all Orders
              <span class="pull-right-container">
            </span>
            </a>
            </li>
            <li><a href="{{ route('new.orders','new') }}"><i class="fa fa-circle-o"></i>New Orders
              <span class="pull-right-container">
            </span>
            </a>
            </li>
            <li>
            <a href="{{ route('new.orders','delivered') }}"><i class="fa fa-mail-reply (alias)"></i> Delivered Orders
            <span class="pull-right-container">
            </span>
            </a></li>
            <li><a href="{{ route('new.orders','pending') }}"><i class="fa fa-mail-reply-all (alias)"></i>Pending Orders
              <span class="pull-right-container">
            </span>
            </a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-user"></i>
            <span>Manage Users</span>
            <span class="pull-right-container">
               <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{route('admin.users')}}"><i class="fa fa-circle-o"></i> View Users</a></li>
            <li><a href="{{route('add.user')}}"><i class="fa fa-plus"></i>Add User</a></li>
            
          </ul>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>