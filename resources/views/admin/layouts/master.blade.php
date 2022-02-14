<!DOCTYPE html>
<html>

<head>
    @include('admin.layouts.header')
    @yield('head')
    <title>@yield('title')</title>

</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        @include('admin.layouts.navbar')

        @include('admin.layouts.mainsidebar')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    @yield('content')
                </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        @include('admin.layouts.footer')

        @include('admin.layouts.control')
    </div>
    <!-- ./wrapper -->

    @include('admin.layouts.scripts')
    @yield('script')
</body>

</html>
