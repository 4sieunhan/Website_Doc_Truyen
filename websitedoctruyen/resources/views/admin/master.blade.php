<!DOCTYPE html>
<html>
   <head>
      @include('admin.blocks.head')
   </head>
   <body class="hold-transition sidebar-mini layout-fixed">
      <div class="wrapper">
         <!-- Navbar -->
         <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            @include('admin.blocks.nav')
         </nav>
         <!-- /.navbar -->
         <!-- Main Sidebar Container -->
         <aside class="main-sidebar sidebar-dark-primary elevation-4">
            @include('admin.blocks.aside')
         </aside>
         <!-- Content Wrapper. Contains page content -->
         <div class="content-wrapper">
            @yield('content')
         </div>
         <!-- /.content-wrapper -->
         <footer class="main-footer">
            @include('admin.blocks.footer')
         </footer>
         <!-- Control Sidebar -->
         <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
         </aside>
         <!-- /.control-sidebar -->
      </div>
      @include('admin.blocks.foot')
   </body>
</html>