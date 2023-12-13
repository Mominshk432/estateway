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

    $('#seo_setting_form').on("submit", function (e) {
        e.preventDefault()
        var form = $('#seo_setting_form')[0];
        var formdata = new FormData(form);
        $('.seoSubmitBtn').html('<span class="me-2"><i class="fa fa-spinner fa-spin"></i></span> Processing');
        $('.seoSubmitBtn').prop('disabled', true);
        $.ajax({
            type: 'POST',
            url: '{{route('admin.saveSeoSetting')}}',
            dataType: 'json',
            data: formdata,
            contentType: false,
            processData: false,
            cache: false,
            mimeType: 'multipart/form-data',

            success: function (res) {
                if (res.error == false) {
                    $.growl.notice({message: res.message});
                    setTimeout(function () {
                        window.location.reload();
                    }, 1000);
                } else {
                    $.growl.error({message: res.message});
                }
                $('.seoSubmitBtn').html('Save');
                $('.seoSubmitBtn').prop('disabled', false);

            },
            error: function (e) {

                var first_error = '';
                var count = 0;

                $.each(e.responseJSON.errors, function (index, item) {

                    if (count == 0) {
                        first_error = item[0];
                    }

                    count++;
                });
                $.growl.error({message: first_error});

                $('.seoSubmitBtn').html('Save');
                $('.seoSubmitBtn').prop('disabled', false);

            }

        });
    });

    // The DOM element you wish to replace with Tagify
    var input = document.getElementById('seoTags');
    // initialize Tagify on the above input node reference
    new Tagify(input)

</script>
