<!-- Vendor js -->
<script src="{{asset('admin/assets/js/vendor.min.js')}}"></script>

<!-- Daterangepicker js -->
<script src="{{asset('admin/assets/vendor/daterangepicker/moment.min.js')}}"></script>
<script src="{{asset('admin/assets/vendor/daterangepicker/daterangepicker.js')}}"></script>

<!-- Apex Charts js -->
<script src="{{asset('admin/assets/vendor/apexcharts/apexcharts.min.js')}}"></script>

<!-- Vector Map js -->
<script src="{{asset('admin/assets/vendor/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.min.js')}}"></script>
<script
    src="{{asset('admin/assets/vendor/admin-resources/jquery.vectormap/maps/jquery-jvectormap-world-mill-en.js')}}"></script>

<!-- Dashboard App js -->
<script src="{{asset('admin/assets/js/pages/dashboard.js')}}"></script>


<!-- App js -->
<script src="{{asset('admin/assets/js/app.min.js')}}"></script>


<!-- Datatables js -->
<script src="{{asset('admin/assets/vendor/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('admin/assets/vendor/datatables.net-bs5/js/dataTables.bootstrap5.min.js')}}"></script>
<script src="{{asset('admin/assets/vendor/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('admin/assets/vendor/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js')}}"></script>
<script
    src="{{asset('admin/assets/vendor/datatables.net-fixedcolumns-bs5/js/fixedColumns.bootstrap5.min.js')}}"></script>
<script src="{{asset('admin/assets/vendor/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js')}}"></script>
<script src="{{asset('admin/assets/vendor/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('admin/assets/vendor/datatables.net-buttons-bs5/js/buttons.bootstrap5.min.js')}}"></script>
<script src="{{asset('admin/assets/vendor/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('admin/assets/vendor/datatables.net-buttons/js/buttons.flash.min.js')}}"></script>
<script src="{{asset('admin/assets/vendor/datatables.net-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{asset('admin/assets/vendor/datatables.net-keytable/js/dataTables.keyTable.min.js')}}"></script>
<script src="{{asset('admin/assets/vendor/datatables.net-select/js/dataTables.select.min.js')}}"></script>
<script src="{{asset('admin/assets/vendor/growl/jquery.growl.js')}}" type="text/javascript"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/39.0.2/classic/ckeditor.js"></script>
<!-- Datatable Demo App js -->
<script src="{{asset('admin/assets/js/pages/datatable.init.js')}}"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/@yaireo/tagify"></script>
<script src="https://cdn.jsdelivr.net/npm/@yaireo/tagify/dist/tagify.polyfills.min.js"></script>
<script>
    function showSelectedImage(selectInput, imgTagId) {
        console.log(imgTagId);
        var file = selectInput[0].files[0];
        console.log(file);
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#' + imgTagId).attr("src", e.target.result);
        }

        reader.readAsDataURL(file);

    }
</script>
