@extends('admin.layouts.layout')
@section('title')
    About Us
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

                        <h4 class="page-title">About Us Setting</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header">

                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-3 mb-2 mb-sm-0">
                                    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist"
                                         aria-orientation="vertical">
                                        <a class="nav-link show active" id="v-pills-home-tab" data-bs-toggle="pill"
                                           href="#v-pills-home" role="tab" aria-controls="v-pills-home"
                                           aria-selected="true">
                                            About Us
                                        </a>
                                        <a class="nav-link" id="v-pills-profile-tab" data-bs-toggle="pill"
                                           href="#v-pills-profile" role="tab" aria-controls="v-pills-profile"
                                           aria-selected="false" tabindex="-1">
                                            Director's Message
                                        </a>
                                        <a class="nav-link" id="v-pills-settings-tab" data-bs-toggle="pill"
                                           href="#v-pills-settings" role="tab" aria-controls="v-pills-settings"
                                           aria-selected="false" tabindex="-1">
                                            Why choose us
                                        </a>
                                        <a class="nav-link" id="v-pills-moto-tab" data-bs-toggle="pill"
                                           href="#v-pills-moto" role="tab" aria-controls="v-pills-moto"
                                           aria-selected="false" tabindex="-1">
                                            Our Moto
                                        </a>
                                    </div>
                                </div> <!-- end col-->

                                <div class="col-sm-9">
                                    <div class="tab-content" id="v-pills-tabContent">
                                        <div class="tab-pane fade active show" id="v-pills-home" role="tabpanel"
                                             aria-labelledby="v-pills-home-tab">
                                            <form id="update_about_us_form">
                                                @csrf
                                                <input type="hidden" value="{{$about_us->id}}" name="id">
                                                <div class="form-group mb-3">
                                                    <label for=""><b>Heading</b></label>
                                                    <input value="{{$about_us->heading ?? ''}}" type="text"
                                                           name="about_heading" placeholder="heading..."
                                                           class="form-control">
                                                </div>
                                                <div class="form-group mb-3">
                                                    <label for=""><b>Subheading</b></label>
                                                    <input type="text" value="{{$about_us->subheading ?? ''}}"
                                                           name="about_subheading"
                                                           placeholder="subheading..."
                                                           class="form-control">
                                                </div>
                                                <textarea class="form-control editor" name="description" id="" cols="30"
                                                          rows="05">{{$about_us->description ?? ''}}</textarea>

                                                <div class="text-end my-2">
                                                    <button class="btn btn-primary submitBtn" type="submit">Save
                                                    </button>
                                                </div>

                                            </form>
                                        </div>
                                        <div class="tab-pane fade" id="v-pills-profile" role="tabpanel"
                                             aria-labelledby="v-pills-profile-tab">
                                            <form id="update_directors_message_form">
                                                @csrf
                                                <input type="hidden" name="id" value="{{$director_message->id}}">
                                                <div class="row">
                                                    <div class="col-3 mb-3">
                                                        <img onclick="$(this).next().click()" id="directorImgPreview"
                                                             style="height: 200px;width: 200px"
                                                             src="{{!empty($director_message->image) ? asset($director_message->image) : 'https://via.placeholder.com/1000x1000'}}"
                                                             class="img img-thumbnail" alt="">
                                                        <input
                                                            onchange="showSelectedImage($(this),'directorImgPreview')"
                                                            type="file" class="d-none" name="image">
                                                    </div>
                                                    <div class="col-9">
                                                        <div class="form-group mb-3">
                                                            <label for="" class="mb-1"><b>Section Heading</b></label>
                                                            <input type="text" class="form-control"
                                                                   value="{{$director_message->section_heading ?? ''}}"
                                                                   name="director_section_heading">
                                                        </div>
                                                        <div class="form-group mb-3">
                                                            <label for="" class="mb-1"><b>Heading</b></label>
                                                            <input type="text" class="form-control"
                                                                   value="{{$director_message->heading ?? ''}}"
                                                                   name="heading">
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="" class="mb-1"><b>Subheading</b></label>
                                                            <input type="text"
                                                                   value="{{$director_message->subheading ?? ''}}"
                                                                   class="form-control" name="subheading">
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <label for="" class="mb-1"><b>Description</b></label>
                                                        <textarea class="form-control editor" name="description" id=""
                                                                  cols="03"
                                                                  rows="10">{{$director_message->description ?? ''}}</textarea>
                                                    </div>
                                                </div>

                                                <div class="text-end my-2">
                                                    <button class="btn btn-primary submitBtn2" type="submit">Save
                                                    </button>
                                                </div>

                                            </form>
                                        </div>
                                        <div class="tab-pane fade" id="v-pills-settings" role="tabpanel"
                                             aria-labelledby="v-pills-settings-tab">
                                            <form id="update_why_choose_us_form">
                                                @csrf
                                                <input type="hidden" name="id" value="{{$why_choose_us->id}}">
                                                <div class="row mb-3">
                                                    <div class="col-6">
                                                        <div class="form-group mb-2">
                                                            <label for="" class="mb-1"><b>Main Heading</b></label>
                                                            <input value="{{$why_choose_us->main_heading ?? ''}}"
                                                                   type="text" class="form-control" name="main_heading">
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group mb-2">
                                                            <label for="" class="mb-1"><b>Main Subheading</b></label>
                                                            <input value="{{$why_choose_us->main_subheading ?? ''}}"
                                                                   type="text" class="form-control"
                                                                   name="main_subheading">
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group mb-2">
                                                            <label for="" class="mb-1"><b>Heading</b></label>
                                                            <input value="{{$why_choose_us->heading_1 ?? ''}}"
                                                                   type="text" class="form-control" name="heading1">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="" class="mb-1"><b>Content</b></label>
                                                            <textarea class="editor" name="content1" id="" cols="30"
                                                                      rows="03">{{$why_choose_us->content_1 ?? ''}}</textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group mb-2">
                                                            <label for="" class="mb-1"><b>Heading</b></label>
                                                            <input value="{{$why_choose_us->heading_2 ?? ''}}"
                                                                   type="text" class="form-control" name="heading2">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="" class="mb-1"><b>Content</b></label>
                                                            <textarea class="editor" name="content2" id="" cols="30"
                                                                      rows="03">{{$why_choose_us->content_2 ?? ''}}</textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-6">
                                                        <div class="form-group mb-2">
                                                            <label for="" class="mb-1"><b>Heading</b></label>
                                                            <input value="{{$why_choose_us->heading_3 ?? ''}}"
                                                                   type="text" class="form-control" name="heading3">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="" class="mb-1"><b>Content</b></label>
                                                            <textarea class="editor" name="content3" id="" cols="30"
                                                                      rows="03">{{$why_choose_us->content_3 ?? ''}}</textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-6 mb-2">
                                                        <div class="form-group mb-2">
                                                            <label for="" class="mb-1"><b>Heading</b></label>
                                                            <input value="{{$why_choose_us->heading_4 ?? ''}}"
                                                                   type="text" class="form-control" name="heading4">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="" class="mb-1"><b>Content</b></label>
                                                            <textarea class="editor" name="content4" id="" cols="30"
                                                                      rows="03">{{$why_choose_us->content_4 ?? ''}}</textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <label for="" class="mb-1"><b>Image</b></label><br>
                                                        <img onclick="$(this).next().click()" id="previewWhyChooseUs"
                                                             style="width: 200px;
                                                  height: 350px;
                                                  object-fit: cover;"
                                                             src="{{!empty($why_choose_us->image) ? asset($why_choose_us->image) : 'https://via.placeholder.com/1000x1000'}}"
                                                             class="img img-thumbnail" alt="">
                                                        <input
                                                            onchange="showSelectedImage($(this),'previewWhyChooseUs')"
                                                            type="file" class="d-none" name="image">
                                                    </div>
                                                </div>
                                                <div class="text-end">
                                                    <button type="submit" class="btn btn-primary submitBtn3">Save
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="tab-pane fade" id="v-pills-moto" role="tabpanel"
                                             aria-labelledby="v-pills-settings-tab">
                                            <form id="update_our_moto_form">
                                                @csrf
                                                <input type="hidden" name="id" value="{{$our_moto->id}}">
                                                <div class="row mb-3">
                                                    <div class="col-12 mb-3">
                                                        <div class="form-group mb-2">
                                                            <label for="" class="mb-1"><b>Heading</b></label>
                                                            <input value="{{$our_moto->heading_1 ?? ''}}"
                                                                   type="text" class="form-control" name="heading1">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="" class="mb-1"><b>Content</b></label>
                                                            <textarea class="form-control editor" name="content1" id=""
                                                                      cols="30"
                                                                      rows="03">{{$our_moto->content_1 ?? ''}}</textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group mb-2">
                                                            <label for="" class="mb-1"><b>Heading</b></label>
                                                            <input value="{{$our_moto->heading_2 ?? ''}}"
                                                                   type="text" class="form-control" name="heading2">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="" class="mb-1"><b>Content</b></label>
                                                            <textarea class="form-control editor" name="content2" id=""
                                                                      cols="30"
                                                                      rows="03">{{$our_moto->content_2 ?? ''}}</textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <div class="col-12">
                                                        <div class="form-group mb-2">
                                                            <label for="" class="mb-1"><b>Heading</b></label>
                                                            <input value="{{$our_moto->heading_3 ?? ''}}"
                                                                   type="text" class="form-control" name="heading3">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="" class="mb-1"><b>Content</b></label>
                                                            <textarea class="form-control editor" name="content3" id=""
                                                                      cols="30"
                                                                      rows="03">{{$our_moto->content_3 ?? ''}}</textarea>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="text-end">
                                                    <button type="submit" class="btn btn-primary submitBtn4">Save
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div> <!-- end tab-content-->
                                </div> <!-- end col-->
                            </div>
                            <!-- end row-->
                        </div> <!-- end card-body -->
                    </div> <!-- end card-->
                </div> <!-- end col -->
            </div>
            <!-- end row -->


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


        $('#update_about_us_form').on("submit", function (e) {
            e.preventDefault()
            var form = $('#update_about_us_form')[0];
            var formdata = new FormData(form);
            $('.submitBtn').html('<span class="me-2"><i class="fa fa-spinner fa-spin"></i></span> Processing');
            $('.submitBtn').prop('disabled', true);
            $.ajax({
                type: 'POST',
                url: '{{route('admin.aboutUs.update')}}',
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
