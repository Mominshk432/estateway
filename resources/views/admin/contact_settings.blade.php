@extends('admin.layouts.layout')
@section('title')
    Contact
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
                            <input type="hidden" name="id" value="{{$contact->id}}">
                            <div class="card-body">
                                <div class="row mb-2">
                                    <h5><b>Contact</b></h5>
                                    <hr>
                                    <div class="col-6">
                                        <div class="form-group mb-2">
                                            <label for=""><b>Phone</b></label>
                                            <input value="{{$contact->phone ?? ''}}" type="text" name="phone"
                                                   class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mb-2">
                                            <label for=""><b>Another Phone</b></label>
                                            <input value="{{$contact->another_phone ?? ''}}" type="text"
                                                   name="another_phone"
                                                   class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-12">

                                        <div class="form-group mb-2">
                                            <label for=""><b>Email</b></label>
                                            <input value="{{$contact->email ?? ''}}" type="text" name="email"
                                                   class="form-control">
                                        </div>
                                        <div class="form-group mb-2">
                                            <label for=""><b>Address</b></label>
                                            <input value="{{$contact->address ?? ''}}" type="text" name="address"
                                                   class="form-control">
                                        </div>
                                        <div class="form-group mb-2">
                                            <label for=""><b>Map Link</b></label>
                                            <input value="{{$contact->map_link ?? ''}}" type="text" name="address"
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


        $('#save_contact_form').on("submit", function (e) {
            e.preventDefault()
            var form = $('#save_contact_form')[0];
            var formdata = new FormData(form);
            $('.submitBtn').html('<span class="me-2"><i class="fa fa-spinner fa-spin"></i></span> Processing');
            $('.submitBtn').prop('disabled', true);
            $.ajax({
                type: 'POST',
                url: '{{route('admin.contact_settings.save')}}',
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
