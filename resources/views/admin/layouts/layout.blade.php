<!DOCTYPE html>
<html lang="en">

@include('admin.layouts.head')

<body class="hold-transition sidebar-mini">

    <div class="wrapper">
        <!-- Navbar -->
        @include('admin.layouts.navbar')
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        @include('admin.layouts.sidebar')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            @include('admin.layouts.error')
            @yield('content')
        </div>
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        @include('admin.layouts.control_sidebar')
        <!-- /.control-sidebar -->
    </div>

    <script type="text/javascript" src="{{ asset('assets/admin/js/admin.js') }}"></script>
</body>

</html>
