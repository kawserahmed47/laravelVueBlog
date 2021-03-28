<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SuperBlog | Dashboard</title>

  <!-- Styles -->
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper" id="app">

  <!-- Navbar -->
 @include('admin.layout.header')
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
@include('admin.layout.sidebar')
<div class="content-wrapper">
  <!-- Content Wrapper. Contains page content -->
  {{-- @yield('content') --}}
  <admin-template></admin-template>
</div>
  <!-- /.content-wrapper -->
    @include('admin.layout.footer')
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->



{{-- Script --}}
<script src="{{ asset('js/app.js') }}" defer></script>

</body>
</html>
