<div id="sidebar-wrapper" data-simplebar="" data-simplebar-auto-hide="true">
    <div class="brand-logo pl-3">
      <a href="{{ route('home') }}">
        <h5 class="logo-text">ARKA</h5>
        <img src="{{ asset('assets/images/logo-icon.png') }}" class="logo-icon" alt="logo icon">
        <h5 class="logo-text">PPN</h5>
      </a>
    </div>
    <ul class="sidebar-menu do-nicescrol">
     <li class="sidebar-header">MAIN NAVIGATION</li>
     <li>
       <a href="javaScript:void();" class="waves-effect">
         <i class="icon-home"></i> <span>Dashboard</span>
         <i class="fa fa-angle-left pull-right"></i>
       </a>
       <ul class="sidebar-submenu">
         <li><a href="#"><i class="fa fa-circle-o"></i> Dashboard 1</a></li>
       </ul>
     </li>   
      <li>
        <a href="javaScript:void();" class="waves-effect">
          <i class="icon-fire"></i> <span>Faktur PPN</span>
          <i class="fa fa-angle-left float-right"></i>
        </a>
       <ul class="sidebar-submenu">
          <li><a href="{{ route('accounting.fakturall.index') }}"><i class="fa fa-circle-o"></i> All Faktur</a></li>
          <li><a href="{{ route('accounting.fakturnoreceive.index') }}"><i class="fa fa-circle-o"></i> Receive Faktur</a></li>
          <li><a href="#"><i class="fa fa-circle-o"></i> Duplicate Entries</a></li>
       </ul>
      </li>
     @role(['superadmin', 'admin'])
      <li class="sidebar-header">ADMIN AREA</li>
      <li>
       <a href="javaScript:void();" class="waves-effect">
         <i class="fa fa-users"></i> <span>User Management</span>
         <i class="fa fa-angle-left float-right"></i>
       </a>
       <ul class="sidebar-submenu">
             <li><a href="{{ route('admin.user.index') }}"><i class="fa fa-circle-o"></i> Users</a></li>
             <li><a href="{{ route('admin.role.index') }}"><i class="fa fa-circle-o"></i> Roles</a></li>
             <li><a href="{{ route('admin.permission.index') }}"><i class="fa fa-circle-o"></i> Permissions</a></li>
       </ul>
      </li>
      @endrole
   </ul>
    
  </div>