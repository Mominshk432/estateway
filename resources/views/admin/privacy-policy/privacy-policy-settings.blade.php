@extends('admin.layouts.layout')
@section('title')
    Privacy-Policy
@endsection
@section('custom-css')
    <style>

        .ck-editor__editable {
            height: 130px !important;

        }
    </style>
@endsection
@section('body')
    <div class="content">
        <!-- Start Content-->
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">

                        <h4 class="page-title">Contact Settings</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <form id="save_contact_form">
                            @csrf
                            <input type="hidden" name="id" value="{{$settings->id}}">
                            <div class="card-body">
                                <div class="row mb-2">
                                    <h5><b>Contact</b></h5>
                                    <hr>
                                    <div class="col-12">
                                        <div class="form-group mb-2">
                                            <label for=""><b>Heading</b></label>
                                            <input value="{{$settings->heading ?? ''}}" type="text" name="heading"
                                                   class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group mb-2">
                                            <label for=""><b>Content</b></label>
                                            <textarea name="content" class="editor" cols="30" rows="10">
                                                {{$settings->content ?? ''}}
                                            </textarea>
                                        </div>
                                    </div>
                                </div>
                            </div> <!-- end card-body -->
                            <div class="card-footer text-end">
                                <button type="submit" class="btn btn-success submitBtn">Save</button>
                            </div>
                        </form>
                    </div> <!-- end card-->
                </div> <!-- end col -->
            </div>
            <!-- end row -->

            @include('admin.includes.seo_settings',['page' => 'privacy-policy','settings' => $seoSetting])
        </div> <!-- container -->

    </div>
@endsection
@section('custom-scripts')
    <script>
        const textAreas = document.querySelectorAll('.editor');

        // Loop through each element and initialize CKEditor
        textAreas.forEach(textArea => {
            ClassicEditor
                .create(textArea)
                .then(editor => {
                    console.log(editor);
                })
                .catch(error => {
                    console.error(error);
                });
        });


        $('#save_contact_form').on("submit", function (e) {
            e.preventDefault()
            var form = $('#save_contact_form')[0];
            var formdata = new FormData(form);
            $('.submitBtn').html('<span class="me-2"><i class="fa fa-spinner fa-spin"></i></span> Processing');
            $('.submitBtn').prop('disabled', true);
            $.ajax({
                type: 'POST',
                url: '{{route('admin.privacy_policy.update')}}',
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
                    $('.submitBtn').html('Save');
                    $('.submitBtn').prop('disabled', false);

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

                    $('.submitBtn').html('Save');
                    $('.submitBtn').prop('disabled', false);

                }

            });
        });
    </script>
@endsection
