<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
  <header class="main-header">
    <!-- Logo -->
    <a href="index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>A</b>LT</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Admin</b>LTE</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

@include('admin.layouts.menu')
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{url('/design/adminlte')}}/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        
        <div class="pull-left info">
          <p>Alexander Pierce</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <form action="{{ url('search') }}" method="POST" class="sidebar-form">
            {{ csrf_field() }}

        <div class="input-group">
          <input type="text" name="q" class="form-control" required="" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit"  id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
      {{--     <li class="active treeview">

              <li><a href="index2.html"><i class="fa fa-home"></i> Dashboard</a></li>
           
          </li> --}}
          <li>
          <a href="{{ route('dashboard') }}">
            <i class="fa fa-home"></i> <span>Dashboard</span>
            <span class="pull-right-container">
          </span>
          </a>
        </li>

        <li>
          <a href="{{ route('settings') }}">
            <i class="fa fa-cog"></i> <span>Settings</span>
            <span class="pull-right-container">
          </span>
          </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-list"></i>
            <span>Categories</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route('categories.index') }}"><i class="fa fa-list"></i> Show All Categories</a></li>
            <li><a href="{{ route('categories.create') }}"><i class="fa fa-list"></i> Add New Category</a></li>
      
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-newspaper-o"></i>
            <span>News</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route('news.index') }}"><i class="fa fa-newspaper-o"></i> Show All News</a></li>
            <li><a href="{{ route('news.create') }}"><i class="fa fa-newspaper-o"></i> Add New News</a></li>
      
          </ul>
        </li>

        <li>
      <a class="" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                     
                   <i class="fa fa-th"></i> <span>Logout</span>
                  <span class="pull-right-container">

                  </span>
      </a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                      {{ csrf_field() }}
                  </form>


        </li>

                  

                                    


      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>