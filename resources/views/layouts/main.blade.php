<!DOCTYPE html>
<html lang="en">

@section('head')
    @include('layouts.head')
@show

<body class="hold-transition sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">
        @section('navbar')
            @include('layouts.navbar')
        @show
        @section('sidebar')
            @include('layouts.sidebar')
        @show
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">


            <!-- Main content -->
            @yield('content')
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        @section('footer')
            @include('layouts.footer')
        @show
        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    @section('script')
        @include('layouts.script')
    @show

</body>

</html>
