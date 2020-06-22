<!DOCTYPE html>
<html>
<head>
    @include('admin.blocks.head')
</head>
<body class="hold-transition sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">
        <!-- Navbar -->
        @include('admin.blocks.nav')

        <!-- /.navbar -->

        <!-- Main Sidebar Container -->

        @include('admin.blocks.aside')

        <!-- Content Wrapper. Contains page content -->

        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <!-- Main content -->

            <!-- Default box -->
            @yield('content')
                <!-- /.card-footer-->
            </div>
            <!-- /.card -->

            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        @include('admin.blocks.footer')
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->
    @include('admin.blocks.foot')
</body>
</html>