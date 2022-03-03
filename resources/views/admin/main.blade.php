<!DOCTYPE html>
<html lang="en">

<head>
  @include('admin.header')
</head>
<!--
`body` tag options:

  Apply one or more of the following classes to to the body tag
  to get the desired effect

  * sidebar-collapse
  * sidebar-mini
-->

<body class="hold-transition sidebar-mini">
  <div class="wrapper">
    <!-- Navbar -->
    @include('admin.navbar');
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    @include('admin.sidebar')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      @yield('content')

    </div>
    <!-- /.content-wrapper -->

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->

    <!-- Main Footer -->
    <footer class="main-footer">
      <strong>Copyright &copy; 2022 <a href="#">Classroom</a>.</strong>
      All rights reserved.
      <div class="float-right d-none d-sm-inline-block">
        <b>Version</b> 3.2.0
      </div>
    </footer>
  </div>
  <!-- ./wrapper -->

  <!-- REQUIRED SCRIPTS -->

  @include('admin.footer')

  <!-- OPTIONAL SCRIPTS -->
  <script src="template/admin/plugins/chart.js/Chart.min.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="template/admin/dist/js/demo.js"></script>
  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  <script src="template/admin/dist/js/pages/dashboard3.js"></script>
</body>

</html>