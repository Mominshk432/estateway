@extends('admin.layouts.layout')
@section('title')
    Projects-Add
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
                        <h4 class="page-title">Project</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->
            <form id="saveProjectForm">
                @csrf
                <div class="row">
                    <div class="col-8">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="header-title">General</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-6">

                                        <div class="mb-3">
                                            <label for="simpleinput" class="form-label">Heading</label>
                                            <input autocomplete="off" placeholder="Heading..." type="text"
                                                   id="simpleinput"
                                                   name="heading" class="form-control">
                                        </div>
                                    </div> <!-- end col -->
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label for="simpleinput" class="form-label">Address</label>
                                            <input autocomplete="off" placeholder="Address..." type="text"
                                                   id="simpleinput" name="address"
                                                   class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-12 mb-3">
                                        <div class="form-group">
                                            <label for="simpleinput" class="form-label">Description</label>
                                            <textarea autocomplete="off" placeholder="Description..." name="description"
                                                      id="description" cols="30"
                                                      rows="03"
                                                      class="form-control"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="mb-3">
                                            <label for="simpleinput" class="form-label">Status</label>
                                            <select name="status" id="" class="form-control">
                                                <option selected disabled readonly="">--Select--</option>
                                                @if(count($statuses) > 0)
                                                    @foreach($statuses as $status)
                                                        <option
                                                            value="{{$status->id}}">{{$status->title ?? ''}}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <!-- end row-->
                            </div> <!-- end card-body -->
                        </div> <!-- end card -->
                        <div class="card">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h4 class="header-title">Images</h4>
                                <button onclick="addMoreImages()" type="button" class="btn btn-primary">Add More <i
                                        class="ri ri-add-fill"></i></button>
                            </div>
                            <div class="card-body">
                                <div class="row" id="imagesSection">
                                    <div class="col-4 my-2">
                                        <img class="rounded" onclick="$(this).next().click()" id="previewImage-0"
                                             style="height: 180px;
  width: 250px;
  object-fit: cover;"
                                             src="https://via.placeholder.com/1000x1000" alt="">
                                        <input autocomplete="off" onchange="showSelectedImage($(this),'previewImage-0')"
                                               type="file"
                                               name="image[]" class="d-none">
                                    </div> <!-- end col -->
                                </div>
                                <!-- end row-->
                            </div> <!-- end card-body -->
                        </div> <!-- end card -->
                        <div class="card">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h4 class="header-title">Content</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-6">
                                        <label for="simpleinput" class="form-label">Highlights</label>
                                        <textarea autocomplete="off" class="form-control" name="highlights"
                                                  id="highlights" cols="30"
                                                  rows="04"></textarea>
                                    </div>
                                    <div class="col-6">
                                        <label for="simpleinput" class="form-label">Amenities</label>
                                        <textarea autocomplete="off" class="form-control" name="amenities"
                                                  id="amenities" cols="30"
                                                  rows="04"></textarea>
                                    </div>
                                </div>
                                <!-- end row-->
                            </div> <!-- end card-body -->
                        </div> <!-- end card -->
                    </div><!-- end col -->
                    <div class="col-4">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="header-title">Category</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-12">

                                                <div class="mb-3">
                                                    <label for="simpleinput" class="form-label">Select Category</label>
                                                    <select autocomplete="off" class="form-control" name="category">
                                                        <option value="" disabled readonly="" selected>--Select--
                                                        </option>
                                                        @if(count($categories) > 0)
                                                            @foreach($categories as $category)
                                                                <option
                                                                    value="{{$category->id}}">{{$category->title ?? ''}}</option>
                                                            @endforeach
                                                        @endif
                                                    </select>
                                                </div>
                                            </div> <!-- end col -->
                                        </div>
                                        <!-- end row-->
                                    </div> <!-- end card-body -->
                                </div> <!-- end card -->
                            </div>
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header d-flex justify-content-between align-items-center">
                                        <h4 class="header-title">Specifications</h4>
                                        <button onclick="addMoreSpecs()" class="btn btn-primary" type="button">Add
                                            More
                                        </button>
                                    </div>
                                    <div class="card-body">
                                        @csrf
                                        <div class="row">
                                            <div class="col-12">

                                                <div class="mb-3">
                                                    <label for="simpleinput" class="form-label">No. of Bedrooms</label>
                                                    <input autocomplete="off" placeholder="0" type="number"
                                                           class="form-control"
                                                           name="no_of_bedrooms">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="simpleinput" class="form-label">No. of bathrooms</label>
                                                    <input autocomplete="off" placeholder="0" type="number"
                                                           class="form-control"
                                                           name="no_of_bathrooms">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="simpleinput" class="form-label">Size (sq.ft.)</label>
                                                    <input autocomplete="off" placeholder="0 sq.ft." type="number"
                                                           class="form-control"
                                                           name="size">
                                                </div>
                                                <div class="mb-3 d-flex align-items-end gap-2">
                                                    <div class="w-100">
                                                        <label for="simpleinput" class="form-label">Price</label>
                                                        <input autocomplete="off" placeholder="45 Lac" type="number"
                                                               class="form-control"
                                                               name="price">
                                                    </div>
                                                    <div class="w-100">
                                                        <select class="form-control" name="price_type">
                                                            <option value="Lakhs">Lakhs</option>
                                                            <option value="Crores">Crores</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div id="more_specifications">

                                                </div>
                                            </div> <!-- end col -->
                                        </div>
                                        <!-- end row-->
                                    </div> <!-- end card-body -->
                                </div> <!-- end card -->
                            </div>
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="header-title">Location</h4>
                                    </div>
                                    <div class="card-body">
                                        @csrf
                                        <div class="row">
                                            <div class="col-12">

                                                <div class="mb-3">
                                                    <label for="simpleinput" class="form-label">Google Map</label>
                                                    <input autocomplete="off" type="text" class="form-control"
                                                           name="google_map">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="simpleinput" class="form-label">Site Plan</label><br>
                                                    <div class="w-100 text-center my-3">
                                                        <img onclick="$(this).next().click()" id="sitePlanPreview"
                                                             class="rounded" style="height: 200px;
                                                width: 200px;object-fit: cover"
                                                             src="https://via.placeholder.com/1000x1000" alt="">
                                                        <input autocomplete="off"
                                                               onchange="showSelectedImage($(this),'sitePlanPreview')"
                                                               type="file" class="d-none"
                                                               name="site_plan">
                                                    </div>

                                                </div>
                                            </div> <!-- end col -->
                                        </div>
                                        <!-- end row-->
                                    </div> <!-- end card-body -->
                                </div> <!-- end card -->
                            </div>
                        </div>
                    </div>
                </div><!-- end row -->
                <div class="row">
                    <div class="col">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title mb-3">Seo Settings</h4>
                                <div class="row mb-3">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="" class="mb-1"><b>Seo Title</b></label>
                                            <input autocomplete="off" value=""
                                                   placeholder="Seo Title" type="text"
                                                   class="form-control"
                                                   name="seo_title">
                                        </div>
                                    </div>
                                    <div class="col-6 mb-3">
                                        <div class="form-group">
                                            <label for="" class="mb-1"><b>Seo keywords</b></label>
                                            <input autocomplete="off" value=""
                                                   placeholder="Seo Keywords"
                                                   id="seoTags" type="text"
                                                   class="form-control"
                                                   name="seo_keywords">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="" class="mb-1"><b>Seo Description</b></label>
                                            <textarea autocomplete="off" placeholder="Seo Description"
                                                      class="form-control"
                                                      name="seo_description" id="" cols="05"
                                                      rows="05"></textarea>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="row my-2">
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary submitBtn">Save</button>
                    </div>
                </div>
            </form>

        </div> <!-- container -->

    </div>
@endsection
@section('custom-scripts')
    <script>
        ClassicEditor
            .create(document.querySelector('#highlights'))
            .then(editor => {
                console.log(editor);
            })
            .catch(error => {
                console.error(error);
            });
        ClassicEditor
            .create(document.querySelector('#amenities'))
            .then(editor => {
                console.log(editor);
            })
            .catch(error => {
                console.error(error);
            });
        ClassicEditor
            .create(document.querySelector('#description'))
            .then(editor => {
                console.log(editor);
            })
            .catch(error => {
                console.error(error);
            });


        $('#saveProjectForm').on("submit", function (e) {
            e.preventDefault()
            var form = $('#saveProjectForm')[0];
            var formdata = new FormData(form);
            $('.submitBtn').html('<span class="me-2"><i class="fa fa-spinner fa-spin"></i></span> Processing');
            $('.submitBtn').prop('disabled', true);
            $.ajax({
                type: 'POST',
                url: '{{route('admin.project.store')}}',
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

        var imgCount = 1;

        function addMoreImages() {

            $('#imagesSection').append(`
             <div class="col-4 my-2 position-relative">
             <img class="rounded" onclick="$(this).next().click()" id="previewImage-${imgCount}"
              style="height: 180px;width: 250px; object-fit: cover;"
              src="https://via.placeholder.com/1000x1000" alt="">
             <input onchange="showSelectedImage($(this),'previewImage-${imgCount}')" type="file"
              name="image[]" class="d-none">
             <button onclick="$(this).parent().remove()" style="top: 0px;right: 3px;"
                type="button" class="btn btn-danger btn-sm position-absolute">
                <i class="ri ri-close-fill"></i></button></div> <!-- end col -->
            `);

            imgCount++;
        }

        var moreSpecsCount = 1;

        function addMoreSpecs() {
            $('#more_specifications').append(`
              <div class="mb-3 d-flex align-items-center gap-2">
                                                        <div>
                                                            <img onclick="$(this).next().click()" id="more_specs-icon-${moreSpecsCount}"
                                                                 src="https://via.placeholder.com/1000x1000"
                                                                 style="height: 41px;width: 40px; object-fit: cover"
                                                                 alt="">
                                                            <input
                                                                onchange="showSelectedImage($(this),'more_specs-icon-${moreSpecsCount}')"
                                                                type="file" class="d-none" name="more_specs_icon[]">

                                                        </div>
                                                        <div class="w-100">
                                                            <input  type="text" name="more_specs_title[]"
                                                                   placeholder="Title..."
                                                                   class="form-control mb-2">
                                                            <input  type="text" name="more_specs_value[]"
                                                                   placeholder="Value..."
                                                                   class="form-control">
                                                        </div>
                                                        <button type="button" onclick="$(this).parent().remove()"
                                                                class="btn btn-danger btn-sm"><i
                                                                class="ri-delete-bin-2-line"></i></button>
                                                    </div>
            `);
            moreSpecsCount++;
        }
    </script>
@endsection
