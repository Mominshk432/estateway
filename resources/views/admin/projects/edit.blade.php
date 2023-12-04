@extends('admin.layouts.layout')
@section('title')
    Projects-Edit
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
                <input type="hidden" value="{{$project->id}}" name="id">
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
                                            <input value="{{$project->heading ?? ''}}" autocomplete="off"
                                                   placeholder="Heading..." type="text"
                                                   id="simpleinput"
                                                   name="heading" class="form-control">
                                        </div>
                                    </div> <!-- end col -->
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label for="simpleinput" class="form-label">Address</label>
                                            <input value="{{$project->address ?? ''}}" autocomplete="off"
                                                   placeholder="Address..." type="text"
                                                   id="simpleinput" name="address"
                                                   class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="simpleinput" class="form-label">Description</label>
                                            <textarea autocomplete="off" placeholder="Description..." name="description"
                                                      id="" cols="30"
                                                      rows="03"
                                                      class="form-control">{{$project->description ?? ''}}</textarea>
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
                                    @if(count($project->images) > 0)
                                        @foreach($project->images as $img)
                                            <div class="col-4 my-2 position-relative">
                                                <img class="rounded" onclick="$(this).next().click()"
                                                     id="previewImage-{{$loop->index}}"
                                                     style="height: 180px;width: 250px; object-fit: cover;"
                                                     src="{{!empty($img->image) ? asset($img->image) : 'https://via.placeholder.com/1000x1000'}}"
                                                     alt="">

                                                <input
                                                    onchange="showSelectedImage($(this),'previewImage-{{$loop->index}}');$(this).next().remove()"
                                                    type="file"
                                                    name="image[]" class="d-none">
                                                <input type="hidden" name="oldImages[]" value="{{$img->image}}">
                                                @if($loop->index > 0)
                                                    <button onclick="$(this).parent().remove()"
                                                            style="top: 0px;right: 3px;"
                                                            type="button"
                                                            class="btn btn-danger btn-sm position-absolute">
                                                        <i class="ri ri-close-fill"></i></button>
                                                @endif
                                            </div> <!-- end col -->
                                        @endforeach
                                    @endif
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
                                                  rows="04">{{$project->highlights}}</textarea>
                                    </div>
                                    <div class="col-6">
                                        <label for="simpleinput" class="form-label">Amenities</label>
                                        <textarea autocomplete="off" class="form-control" name="amenities"
                                                  id="amenities" cols="30"
                                                  rows="04">{{$project->amenities}}</textarea>
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
                                                                    {{$project->category_id == $category->id ? 'selected' : ''}} value="{{$category->id}}">{{$category->title ?? ''}}</option>
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
                                    <div class="card-header">
                                        <h4 class="header-title">Specifications</h4>
                                    </div>
                                    <div class="card-body">
                                        @csrf
                                        <div class="row">
                                            <div class="col-12">

                                                <div class="mb-3">
                                                    <label for="simpleinput" class="form-label">No. of Bedrooms</label>
                                                    <input value="{{$project->no_of_bedrooms ?? '0'}}"
                                                           autocomplete="off" placeholder="0" type="number"
                                                           class="form-control"
                                                           name="no_of_bedrooms">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="simpleinput" class="form-label">No. of bathrooms</label>
                                                    <input value="{{$project->no_of_bathrooms ?? '0'}}"
                                                           autocomplete="off" placeholder="0" type="number"
                                                           class="form-control"
                                                           name="no_of_bathrooms">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="simpleinput" class="form-label">Size (sq.ft.)</label>
                                                    <input value="{{$project->size ?? '0'}}" autocomplete="off"
                                                           placeholder="0 sq.ft." type="number"
                                                           class="form-control"
                                                           name="size">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="simpleinput" class="form-label">Price</label>
                                                    <input value="{{$project->price ?? '0'}}" autocomplete="off"
                                                           placeholder="45 Lac" type="number"
                                                           class="form-control"
                                                           name="price">
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
                                                    <input value="{{$project->google_map ?? ''}}" autocomplete="off"
                                                           type="text" class="form-control"
                                                           name="google_map">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="simpleinput" class="form-label">Site Plan</label><br>
                                                    <div class="w-100 text-center my-3">
                                                        <img onclick="$(this).next().click()" id="sitePlanPreview"
                                                             class="rounded" style="height: 200px;
                                                width: 200px;object-fit: cover"
                                                             src="{{!empty($project->site_plan) ? asset($project->site_plan) : 'https://via.placeholder.com/1000x1000'}}"
                                                             alt="">
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


        $('#saveProjectForm').on("submit", function (e) {
            e.preventDefault()
            var form = $('#saveProjectForm')[0];
            var formdata = new FormData(form);
            $('.submitBtn').html('<span class="me-2"><i class="fa fa-spinner fa-spin"></i></span> Processing');
            $('.submitBtn').prop('disabled', true);
            $.ajax({
                type: 'POST',
                url: '{{route('admin.project.update')}}',
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

        var imgCount = {{count($project->images)}};

        function addMoreImages() {
            imgCount++;
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
    </script>
@endsection
