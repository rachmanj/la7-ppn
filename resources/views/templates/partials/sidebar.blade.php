<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">ACCOUNTING</li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="#"><i class="fa fa-circle-o"></i> Dashboard v1</a></li>
          <li><a href="#"><i class="fa fa-circle-o"></i> Dashboard v2</a></li>
        </ul>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-files-o"></i>
          <span>Faktur PPN</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{ route('accounting.fakturall.index') }}"><i class="fa fa-circle-o"></i> All Faktur</a></li>
          <li><a href="{{ route('accounting.fakturnoreceive.index') }}"><i class="fa fa-circle-o"></i> Receive Faktur</a></li>
          <li><a href="#"><i class="fa fa-circle-o"></i> Duplicate Entries</a></li>
        </ul>
      </li>
      <li class="header">ADMIN</li>
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>