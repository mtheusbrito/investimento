<section class="sidebar">

  <!-- Sidebar user panel (optional) -->
  <div class="user-panel">
    <div class="pull-left image">
      <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
    </div>
    <div class="pull-left info">
      <p>Admin</p>
      <!-- Status -->
      {{-- <a href="#"><i class="fa fa-circle text-success"></i> Online</a> --}}
    </div>
  </div>

  <!-- search form (Optional) -->
  <form action="#" method="get" class="sidebar-form">
    <div class="input-group">
      <input type="text" name="q" class="form-control" placeholder="Search...">
      <span class="input-group-btn">
        <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
        </button>
      </span>
    </div>
  </form>
  <!-- /.search form -->

  <!-- Sidebar Menu -->
  <ul class="sidebar-menu" data-widget="tree">
    <li class="header">HEADER</li>
    <!-- Optionally, you can add icons to the links -->
    <li><a href="{{route('home.index')}}"><i class="fa fa-home" aria-hidden="true"></i><span>Home</span></a></li>
    <li><a href="{{route('users.index')}}"><i class="fa fa-address-book-o" aria-hidden="true"></i> <span>Usuarios</span></a></li>
    <li><a href='{{route('instituitions.index')}}'><i class="fa fa-building" aria-hidden="true"></i> <span>Instituições</span></a></li>
    <li><a href='{{route('groups.index')}}'><i class="fa fa-group" aria-hidden="true"></i> <span>Grupos</span></a></li>
    {{--
    <li class="treeview">
      <a href="#"><i class="fa fa-group"></i> <span>Grupos</span>
      <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>
      <ul class="treeview-menu">
        <li><a href="#">Link in level 2</a></li>
        <li><a href="#">Link in level 2</a></li>
      </ul>
    </li> --}}
  </ul>
  <!-- /.sidebar-menu -->
</section>