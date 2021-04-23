<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">ACCOUNTING</li>
      <li class="treeview {{ request()->is('accounting/dashboard') || request()->is('accounting/dashboard/*') ? 'active' : '' }}">
        <a href="#">
          <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class="{{ request()->is('accounting/dashboard') || request()->is('accounting/dashboard/*') ? 'active' : '' }}" ><a href="{{ route('accounting.dashboard.index') }}"><i class="fa fa-circle-o"></i> Invoices</a></li>
          <li><a href="#"><i class="fa fa-circle-o"></i> Dashboard v2</a></li>
        </ul>
      </li>
      <li class="treeview {{ request()->is('accounting/fakturs') || request()->is('accounting/fakturs/*') ? 'active' : '' }}">
        <a href="#">
          <i class="fa fa-files-o"></i>
          <span>Faktur PPN</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class="{{ request()->is('accounting/fakturs') ? 'active' : '' }}"><a href="{{ route('accounting.fakturs.index') }}"><i class="fa fa-circle-o"></i> All Faktur</a></li>
          <li class="{{ request()->is('accounting/fakturs/receive') ? 'active' : '' }}"><a href="{{ route('accounting.fakturs.receive_index') }}"><i class="fa fa-circle-o"></i> Receive Faktur</a></li>
          <li class="{{ request()->is('accounting/fakturs/efaktur') ? 'active' : '' }}"><a href="{{ route('accounting.fakturs.efaktur_index') }}"><i class="fa fa-circle-o"></i> Update eFaktur Date</a></li>
          <li class="{{ request()->is('accounting/fakturs/belumsap') ? 'active' : '' }}"><a href="{{ route('accounting.fakturs.belumsap_index') }}"><i class="fa fa-circle-o"></i> Faktur Belum SAP</a></li>
          <li class="{{ request()->is('accounting/fakturs/duplicates') ? 'active' : '' }}"><a href="{{ route('accounting.fakturs.duplicates_index') }}"><i class="fa fa-circle-o"></i> Duplicate Entries</a></li>
        </ul>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-files-o"></i>
          <span>Invoices</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="#"><i class="fa fa-circle-o"></i> In Process Invoices</a></li>
        </ul>
      </li>
      <li class="header">GENERAL</li>
      <li class="{{ request()->is('general/suppliers') || request()->is('general/suppliers/*') ? 'active' : '' }}">
        <a href="{{ route('general.suppliers.index') }}">
          <i class="fa fa-files-o"></i>
          <span>Suppliers</span>
        </a>
      </li>
      <li class="header">ADMIN</li>
      <li class="treeview {{ request()->is('admin/user') || request()->is('admin/user/*') ? 'active' : '' }}">
        <a href="#">
          <i class="fa fa-users"></i>
          <span>User Mgmnt</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class="{{ request()->is('admin/user') || request()->is('admin/user/*') ? 'active' : '' }}"><a href="{{ route('admin.user.index') }}"><i class="fa fa-users"></i><span> Users</span></a></li>
          <li><a href="#"><i class="fa fa-circle-o"></i> Roles</a></li>
          <li><a href="#"><i class="fa fa-circle-o"></i> Permissions</a></li>
        </ul>
      </li>
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>