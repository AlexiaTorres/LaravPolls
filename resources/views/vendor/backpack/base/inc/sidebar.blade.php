@if (Auth::check())
    <!-- Left side column. contains the sidebar -->
    <aside class="main-sidebar">
      <!-- sidebar: style can be found in sidebar.less -->
      <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
          <div class="pull-left image">
            <img src="{{ Auth::user()->avatar_or_default}}" class="img-circle" alt="User Image">
          </div>
          <div class="pull-left info">
            <p>{{ Auth::user()->nickname_or_email }}</p>
            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
          </div>
        </div>
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
          <li><a href="{{ url(config('backpack.base.route_prefix', 'admin').'/poll') }}"><i class="fa fa-bar-chart"></i> <span>My Polls</span></a></li>
        </ul>
      </section>
      <!-- /.sidebar -->
    </aside>
@endif
