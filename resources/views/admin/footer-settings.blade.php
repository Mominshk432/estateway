@extends('admin.layouts.layout')
@section('title')
    Footer
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

                        <h4 class="page-title">Footer Settings</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <form id="save_footer_form">
                            @csrf
                            <input type="hidden" name="id" value="{{$footer->id}}">
                            <div class="card-body">
                                <div class="row mb-2">
                                    <div class="col-md-6">
                                        <h5><b>General</b></h5>
                                        <hr>
                                        <div class="form-group mb-3">
                                            <label for=""><b>Heading</b></label>
                                            <input value="{{$footer->heading ?? ''}}" type="text" name="heading"
                                                   class="form-control">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for=""><b>Description</b></label>
                                            <textarea name="description" class="form-control" id="" cols="30"
                                                      rows="03">{{$footer->description ?? ''}}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <h5><b>Contact</b></h5>
                                        <hr>
                                        <div class="form-group mb-2">
                                            <label for=""><b>Address</b></label>
                                            <input value="{{$footer->address ?? ''}}" type="text" name="address"
                                                   class="form-control">
                                        </div>
                                        <div class="form-group mb-2">
                                            <label for=""><b>Phone</b></label>
                                            <input value="{{$footer->phone ?? ''}}" type="text" name="phone"
                                                   class="form-control">
                                        </div>
                                        <div class="form-group mb-2">
                                            <label for=""><b>Email</b></label>
                                            <input value="{{$footer->email ?? ''}}" type="text" name="email"
                                                   class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <h5><b>Social Links</b></h5>
                                    <hr>
                                    <div class="col-md-4">
                                        <div class="form-group mb-2">
                                            <label for=""><b>Facebook</b></label>
                                            <input value="{{$footer->f_link ?? ''}}" type="text" name="f_link"
                                                   class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group mb-2">
                                            <label for=""><b>Twitter</b></label>
                                            <input value="{{$footer->t_link ?? ''}}" type="text" name="t_link"
                                                   class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group mb-2">
                                            <label for=""><b>Instagram</b></label>
                                            <input value="{{$footer->ig_link ?? ''}}" type="text" name="ig_link"
                                                   class="form-control">
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


        </div> <!-- container -->

    </div>
@endsection
@section('custom-scripts')
    <script>


        $('#save_footer_form').on("submit", function (e) {
            e.preventDefault()
            var form = $('#save_footer_form')[0];
            var formdata = new FormData(form);
            $('.submitBtn').html('<span class="me-2"><i class="fa fa-spinner fa-spin"></i></span> Processing');
            $('.submitBtn').prop('disabled', true);
            $.ajax({
                type: 'POST',
                url: '{{route('admin.footer_settings.save')}}',
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

        $('#update_directors_message_form').on("submit", function (e) {
            e.preventDefault()
            var form = $('#update_directors_message_form')[0];
            var formdata = new FormData(form);
            $('.submitBtn2').html('<span class="me-2"><i class="fa fa-spinner fa-spin"></i></span> Processing');
            $('.submitBtn2').prop('disabled', true);
            $.ajax({
                type: 'POST',
                url: '{{route('admin.directorMsg.update')}}',
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
                    $('.submitBtn2').html('Save');
                    $('.submitBtn2').prop('disabled', false);

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

                    $('.submitBtn2').html('Save');
                    $('.submitBtn2').prop('disabled', false);

                }

            });
        });

        $('#update_why_choose_us_form').on("submit", function (e) {
            e.preventDefault()
            var form = $('#update_why_choose_us_form')[0];
            var formdata = new FormData(form);
            $('.submitBtn3').html('<span class="me-2"><i class="fa fa-spinner fa-spin"></i></span> Processing');
            $('.submitBtn3').prop('disabled', true);
            $.ajax({
                type: 'POST',
                url: '{{route('admin.whyChoseUs.update')}}',
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
                    $('.submitBtn3').html('Save');
                    $('.submitBtn3').prop('disabled', false);

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

                    $('.submitBtn3').html('Save');
                    $('.submitBtn3').prop('disabled', false);

                }

            });
        });

        $('#update_our_moto_form').on("submit", function (e) {
            e.preventDefault()
            var form = $('#update_our_moto_form')[0];
            var formdata = new FormData(form);
            $('.submitBtn4').html('<span class="me-2"><i class="fa fa-spinner fa-spin"></i></span> Processing');
            $('.submitBtn4').prop('disabled', true);
            $.ajax({
                type: 'POST',
                url: '{{route('admin.our_moto.update')}}',
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
                    $('.submitBtn4').html('Save');
                    $('.submitBtn4').prop('disabled', false);

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

                    $('.submitBtn4').html('Save');
                    $('.submitBtn4').prop('disabled', false);

                }

            });
        });
    </script>
@endsection
