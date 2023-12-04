<!DOCTYPE html>
<html lang="en">

@include('admin.includes.head')
<style>
    table.dataTable tbody td.focus, table.dataTable tbody th.focus {
        outline: unset !important;
    }
</style>
@yield('custom-css')

<body>
<!-- Begin page -->
<div class="wrapper">


    <!-- ========== Topbar Start ========== -->
    @include('admin.includes.header')
    <!-- ========== Topbar End ========== -->


    <!-- ========== Left Sidebar Start ========== -->
    @include('admin.includes.sidebar')
    <!-- ========== Left Sidebar End ========== -->

    <!-- ============================================================== -->
    <!-- Start Page Content here -->
    <!-- ============================================================== -->

    <div class="content-page">
        @yield('body')
        <!-- content -->

        <!-- Footer Start -->
        @include('admin.includes.footer')
        <!-- end Footer -->

    </div>

    <!-- ============================================================== -->
    <!-- End Page content -->
    <!-- ============================================================== -->

</div>
<!-- END wrapper -->


@include('admin.includes.scripts')
@yield('custom-scripts')

</body>
</html>
