<!DOCTYPE html>
<html>

@include('templates.partials.head')

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

@include('templates.partials.topbar')

@include('templates.partials.sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      
      @yield('breadcrumb')

    </section>

    <!-- Main content -->
    <section class="content">

      @yield('content')

    </section>
    <!-- /.content -->
    
  </div>
  @include('templates.partials.footer')
  <!-- /.content-wrapper -->

</div>
<!-- ./wrapper -->

@include('templates.partials.scripts')
<!-- Page script -->

</body>
</html>
