<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="{{asset('img/user2-160x160.jpg')}}" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p>Alexander Pierce</p>
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>
    <!-- search form -->
    <form action="#" method="get" class="sidebar-form">
      <div class="input-group">
        <input type="text" name="q" class="form-control" placeholder="Search...">
        <span class="input-group-btn">
          <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
        </span>
      </div>
    </form>
    <!-- /.search form -->
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu">
      <li class="header">MAIN NAVIGATION</li>
      <li class="treeview">
        <a href="{{url('admin')}}">
          <i class="fa fa-dashboard"></i> <span>Dashboard</span>
        </a>
      </li>
      @role('admin')
      <li class="treeview @if(request()->segment(2) == 'user') active @endif">
        <a href="#">
          <i class="fa fa-dashboard"></i> <span>Users</span> <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{route('admin.user.index')}}"><i class="fa fa-circle-o"></i> List Users</a></li>
          <li><a href="{{route('admin.user.create')}}"><i class="fa fa-plus"></i> Add a User</a></li>
        </ul>
      </li>
      <li class="treeview @if(request()->segment(2) == 'role') active @endif">
        <a href="#">
          <i class="fa fa-dashboard"></i> <span>Roles</span> <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{route('admin.role.index')}}"><i class="fa fa-circle-o"></i> List Roles</a></li>
          <li><a href="{{route('admin.role.create')}}"><i class="fa fa-plus"></i> Add a role</a></li>
        </ul>
      </li>
      <li class="header">LABELS</li>
      <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Important</span></a></li>
      <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>Warning</span></a></li>
      <li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>Information</span></a></li>      
      @endrole
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>