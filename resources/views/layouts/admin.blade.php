<!DOCTYPE html>
<html>

@include('layouts.content.head')

<body class="hold-transition skin-green sidebar-mini">
<div class="wrapper">

@include('layouts.content.header')

  <!-- Left side column. contains the logo and sidebar -->

  @include('layouts.content.aside')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">

    </section>

    <!-- Main content -->
    <section class="content">

         @yield('content')

    </section>
    <!-- /.content -->
  </div>

  @include('layouts.content.footer')

  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

  @include('layouts.content.script')
 @yield('script')


</body>
</html>
