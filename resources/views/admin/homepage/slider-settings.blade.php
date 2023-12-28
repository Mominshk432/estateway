@extends('admin.layouts.layout')
@section('title')
    Homepage-Settings
@endsection
@section('body')
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <h4 class="page-title">Homepage</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h4 class="header-title">Slider</h4>
                            <button type="button" data-bs-toggle="modal" data-bs-target="#add-slider-modal"
                                    class="btn btn-success">Add <i class="ri ri-add-line"></i></button>
                        </div>
                        <div class="card-body">
                            <table id="basic-datatable" class="table table-striped dt-responsive nowrap w-100"
                                   style="vertical-align: baseline">
                                <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Heading</th>
                                    <th>Description</th>
                                    <th>Type</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($sliders as $slider)
                                    <tr>
                                        <td>
                                            <img style="height: 50px;
  width: 100px;
  object-fit: cover;" src="{{!empty($slider->image) ? asset($slider->image) : 'https://via.placeholder.com/1000x1000'}}"
                                                 alt="">
                                        </td>
                                        <td>{{$slider->heading ?? ''}}</td>
                                        <td>{{!empty($slider->description) ? \Illuminate\Support\Str::limit($slider->description,50): ''}}</td>
                                        <td>{{$slider->type == 1 ? 'Computer' : 'Mobile'}}</td>
                                        <td>
                                            <div class="d-inline-flex gap-2">
                                                <button data-bs-toggle="modal" data-bs-target="#edit-slider-modal"
                                                        type="button"
                                                        onclick="setValues('{{$slider->id}}','{{$slider->heading}}','{{str_replace(["\r", "\n"], '', $slider->description)}}','{{!empty($slider->image) ? asset($slider->image) : 'https://via.placeholder.com/1000x1000'}}','{{$slider->slider_link ?? ''}}','{{$slider->button_one_text ?? ''}}','{{$slider->button_one_link ?? ''}}','{{$slider->button_two_text ?? ''}}','{{$slider->button_two_link ?? ''}}','{{$slider->type}}')"
                                                        class="btn btn-warning btn-sm"><i class="ri ri-edit-2-line"></i>
                                                </button>
                                                <button type="button" onclick="deleteSlider('{{$slider->id}}',$(this))"
                                                        class="btn btn-danger btn-sm"><i
                                                        class="ri ri-delete-bin-2-line"></i></button>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>

                        </div> <!-- end card body-->
                    </div> <!-- end card -->
                </div><!-- end col-->
            </div> <!-- end row-->
        </div> <!-- container -->
    </div> <!-- content -->

    {{--    MODALS--}}
    <div id="add-slider-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="standard-modalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="standard-modalLabel">Add Slider</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="addSliderForm">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group mb-2">
                            <label for="" class="mb-1"><b>Type</b></label>
                            <select autocomplete="off" onchange="selectSliderType($(this))" name="type"
                                    class="form-control">
                                <option selected value="computer">Computer</option>
                                <option value="mobile">Mobile</option>
                            </select>
                        </div>
                        <div id="appendSliderTYpe">
                            <div class="form-group mb-2">
                                <label for="" class="mb-1"><b>Slider Link</b></label>
                                <input autocomplete="off" type="text" class="form-control" name="slider_link">
                            </div>
                            <div class="form-group mb-2">
                                <img id="previewSliderImg" onclick="$(this).next().click()"
                                     src="https://via.placeholder.com/1000x1000" style="height: 150px;
  width: 100%;
  object-fit: cover;" alt="">
                                <input autocomplete="off" onchange="showSelectedImage($(this),'previewSliderImg')"
                                       type="file" class="d-none"
                                       name="image">
                            </div>
                            <div class="form-group mb-2">
                                <label for="" class="mb-1"><b>Heading</b></label>
                                <input autocomplete="off" type="text" class="form-control" name="heading">
                            </div>
                            <div class="form-group mb-2">
                                <label for="" class="mb-1"><b>Description</b></label>
                                <textarea autocomplete="off" name="description" id="" class="form-control" cols="30"
                                          rows="02"></textarea>
                            </div>
                            <div class="form-group mb-2">
                                <label for="" class="mb-1"><b>Button One Text</b></label>
                                <input autocomplete="off" type="text" class="form-control" name="button_one_text">
                            </div>
                            <div class="form-group mb-2">
                                <label for="" class="mb-1"><b>Button One link</b></label>
                                <input autocomplete="off" type="text" class="form-control" name="button_one_link">
                            </div>
                            <div class="form-group mb-2">
                                <label for="" class="mb-1"><b>Button Two Text</b></label>
                                <input autocomplete="off" type="text" class="form-control" name="button_two_text">
                            </div>
                            <div class="form-group mb-2">
                                <label for="" class="mb-1"><b>Button Two link</b></label>
                                <input autocomplete="off" type="text" class="form-control" name="button_two_link">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary submitBtn">Save</button>
                    </div>
                </form>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>
    <div id="edit-slider-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="standard-modalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="standard-modalLabel">Add Slider</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="editSliderForm">
                    @csrf
                    <input type="hidden" name="id" id="edit_id">
                    <div class="modal-body">
                        <div class="form-group mb-2">
                            <label for="" class="mb-1"><b>Type</b></label>
                            <select disabled id="edit_selectSlider_type" autocomplete="off"
                                    onchange="selectEditSliderType($(this))" name="type"
                                    class="form-control disabled">
                                <option value="computer">Computer</option>
                                <option value="mobile">Mobile</option>
                            </select>
                        </div>
                        <div id="appendEditSliderType">
                            <div class="form-group mb-2">
                                <label for="" class="mb-1"><b>Slider Link</b></label>
                                <input id="edit_slider_link" autocomplete="off" type="text" class="form-control"
                                       name="slider_link">
                            </div>
                            <div class="form-group mb-2">
                                <img id="edit_img" onclick="$(this).next().click()"
                                     src="https://via.placeholder.com/1000x1000"
                                     style="height: 150px;width: 100%;object-fit: cover;" alt="">
                                <input autocomplete="off" onchange="showSelectedImage($(this),'edit_img')"
                                       type="file" class="d-none"
                                       name="image">
                            </div>
                            <div class="form-group mb-2">
                                <label for="" class="mb-1"><b>Heading</b></label>
                                <input id="edit_heading" autocomplete="off" type="text" class="form-control"
                                       name="heading">
                            </div>
                            <div class="form-group">
                                <label for="" class="mb-1"><b>Description</b></label>
                                <textarea autocomplete="off" name="description" id="edit_description"
                                          class="form-control"
                                          cols="30"
                                          rows="02"></textarea>
                            </div>
                            <div class="form-group mb-2">
                                <label for="" class="mb-1"><b>Button One Text</b></label>
                                <input id="edit_button_one_text" autocomplete="off" type="text" class="form-control"
                                       name="button_one_text">
                            </div>
                            <div class="form-group mb-2">
                                <label for="" class="mb-1"><b>Button One link</b></label>
                                <input id="edit_button_one_link" autocomplete="off" type="text" class="form-control"
                                       name="button_one_link">
                            </div>
                            <div class="form-group mb-2">
                                <label for="" class="mb-1"><b>Button Two Text</b></label>
                                <input id="edit_button_two_text" autocomplete="off" type="text" class="form-control"
                                       name="button_two_text">
                            </div>
                            <div class="form-group mb-2">
                                <label for="" class="mb-1"><b>Button Two link</b></label>
                                <input autocomplete="off" id="edit_button_two_link" type="text" class="form-control"
                                       name="button_two_link">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary submitBtn">Save</button>
                    </div>
                </form>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>
@endsection
@section('custom-scripts')
    <script>
        $('#addSliderForm').on("submit", function (e) {
            e.preventDefault()
            var form = $('#addSliderForm')[0];
            var formdata = new FormData(form);
            $('.submitBtn').html('<span class="me-2"><i class="fa fa-spinner fa-spin"></i></span> Processing');
            $('.submitBtn').prop('disabled', true);
            $.ajax({
                type: 'POST',
                url: '{{route('admin.storeSlider')}}',
                dataType: 'json',
                data: formdata,
                contentType: false,
                processData: false,
                cache: false,
                mimeType: 'multipart/form-data',

                success: function (res) {
                    if (res.error == false) {
                        $('#add-slider-modal').modal('hide');
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

        function setValues(id, heading, description, image, slider_link, button_one_text, button_one_link, button_two_text, button_two_link, type) {
            if (type == 1) {
                $('#edit_selectSlider_type option[value="computer"]').prop('selected', true);
                $('#appendEditSliderType').html('');
                $('#appendEditSliderType').html(`
                  <div class="form-group mb-2">
                                <label for="" class="mb-1"><b>Slider Link</b></label>
                                <input id="edit_slider_link" autocomplete="off" type="text" class="form-control"
                                       name="slider_link">
                            </div>
                            <div class="form-group mb-2">
                                <img id="edit_img" onclick="$(this).next().click()"
                                     src="https://via.placeholder.com/1000x1000"
                                     style="height: 150px;width: 100%;object-fit: cover;" alt="">
                                <input autocomplete="off" onchange="showSelectedImage($(this),'edit_img')"
                                       type="file" class="d-none"
                                       name="image">
                            </div>
                            <div class="form-group mb-2">
                                <label for="" class="mb-1"><b>Heading</b></label>
                                <input id="edit_heading" autocomplete="off" type="text" class="form-control"
                                       name="heading">
                            </div>
                            <div class="form-group">
                                <label for="" class="mb-1"><b>Description</b></label>
                                <textarea autocomplete="off" name="description" id="edit_description"
                                          class="form-control"
                                          cols="30"
                                          rows="02"></textarea>
                            </div>
                            <div class="form-group mb-2">
                                <label for="" class="mb-1"><b>Button One Text</b></label>
                                <input id="edit_button_one_text" autocomplete="off" type="text" class="form-control"
                                       name="button_one_text">
                            </div>
                            <div class="form-group mb-2">
                                <label for="" class="mb-1"><b>Button One link</b></label>
                                <input id="edit_button_one_link" autocomplete="off" type="text" class="form-control"
                                       name="button_one_link">
                            </div>
                            <div class="form-group mb-2">
                                <label for="" class="mb-1"><b>Button Two Text</b></label>
                                <input id="edit_button_two_text" autocomplete="off" type="text" class="form-control"
                                       name="button_two_text">
                            </div>
                            <div class="form-group mb-2">
                                <label for="" class="mb-1"><b>Button Two link</b></label>
                                <input autocomplete="off" id="edit_button_two_link" type="text" class="form-control"
                                       name="button_two_link">
                            </div>
                `);
            } else {
                $('#edit_selectSlider_type option[value="mobile"]').prop('selected', true);
                $('#appendEditSliderType').html('');
                $('#appendEditSliderType').html(`
                  <div class="form-group mb-2">
                                <label for="" class="mb-1"><b>Slider Link</b></label>
                                <input id="edit_slider_link" autocomplete="off" type="text" class="form-control"
                                       name="slider_link">
                            </div>
                            <div class="form-group mb-2 text-center">
                                <img id="edit_img" onclick="$(this).next().click()"
                                     src="https://via.placeholder.com/1000x1000"
                                     style="height: 400px;
  width: 70%;
  object-fit: cover;" alt="">
                                <input autocomplete="off" onchange="showSelectedImage($(this),'edit_img')"
                                       type="file" class="d-none"
                                       name="image">
                            </div>
                            <div class="form-group mb-2">
                                <label for="" class="mb-1"><b>Heading</b></label>
                                <input id="edit_heading" autocomplete="off" type="text" class="form-control"
                                       name="heading">
                            </div>
                            <div class="form-group">
                                <label for="" class="mb-1"><b>Description</b></label>
                                <textarea autocomplete="off" name="description" id="edit_description"
                                          class="form-control"
                                          cols="30"
                                          rows="02"></textarea>
                            </div>
                            <div class="form-group mb-2">
                                <label for="" class="mb-1"><b>Button One Text</b></label>
                                <input id="edit_button_one_text" autocomplete="off" type="text" class="form-control"
                                       name="button_one_text">
                            </div>
                            <div class="form-group mb-2">
                                <label for="" class="mb-1"><b>Button One link</b></label>
                                <input id="edit_button_one_link" autocomplete="off" type="text" class="form-control"
                                       name="button_one_link">
                            </div>
                            <div class="form-group mb-2">
                                <label for="" class="mb-1"><b>Button Two Text</b></label>
                                <input id="edit_button_two_text" autocomplete="off" type="text" class="form-control"
                                       name="button_two_text">
                            </div>
                            <div class="form-group mb-2">
                                <label for="" class="mb-1"><b>Button Two link</b></label>
                                <input autocomplete="off" id="edit_button_two_link" type="text" class="form-control"
                                       name="button_two_link">
                            </div>
                `);
            }
            $('#edit_id').val(id);
            $('#edit_img').attr('src', image);
            $('#edit_heading').val(heading);
            $('#edit_description').text(description);
            $('#edit_slider_link').val(slider_link);
            $('#edit_button_one_text').val(button_one_text);
            $('#edit_button_one_link').val(button_one_link);
            $('#edit_button_two_text').val(button_two_text);
            $('#edit_button_two_link').val(button_two_link);


        }

        $('#editSliderForm').on("submit", function (e) {
            e.preventDefault()
            var form = $('#editSliderForm')[0];
            var formdata = new FormData(form);
            $('.submitBtn').html('<span class="me-2"><i class="fa fa-spinner fa-spin"></i></span> Processing');
            $('.submitBtn').prop('disabled', true);
            $.ajax({
                type: 'POST',
                url: '{{route('admin.updateSlider')}}',
                dataType: 'json',
                data: formdata,
                contentType: false,
                processData: false,
                cache: false,
                mimeType: 'multipart/form-data',

                success: function (res) {
                    if (res.error == false) {
                        $('#edit-slider-modal').modal('hide');
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


        function deleteSlider(id, element) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: 'POST',
                        url: '{{route('admin.deleteSlider')}}',
                        data: {
                            id: id,
                            _token: '{{csrf_token()}}'
                        },
                        dataType: 'json',
                        success: function (res) {
                            if (res.error == false) {
                                element.parent().parent().parent().remove();
                                $.growl.notice({message: res.message});
                            }
                        },
                        error: function (e) {
                            $.each(e.responseJSON.errors, function (index, item) {

                                if (count == 0) {
                                    first_error = item[0];
                                }

                                count++;
                            });
                            $.growl.error({message: first_error});
                        }
                    });
                }
            })
        }

        function selectSliderType(element) {
            if (element.val() == 'computer') {
                $('#appendSliderTYpe').html('');
                $('#appendSliderTYpe').html(`
                  <div class="form-group mb-2">
                                <label for="" class="mb-1"><b>Slider Link</b></label>
                                <input autocomplete="off" type="text" class="form-control" name="slider_link">
                            </div>
                            <div class="form-group mb-2">
                                <img id="previewSliderImg" onclick="$(this).next().click()"
                                     src="https://via.placeholder.com/1000x1000" style="height: 150px;
  width: 100%;
  object-fit: cover;" alt="">
                                <input autocomplete="off" onchange="showSelectedImage($(this),'previewSliderImg')"
                                       type="file" class="d-none"
                                       name="image">
                            </div>
                            <div class="form-group mb-2">
                                <label for="" class="mb-1"><b>Heading</b></label>
                                <input autocomplete="off" type="text" class="form-control" name="heading">
                            </div>
                            <div class="form-group mb-2">
                                <label for="" class="mb-1"><b>Description</b></label>
                                <textarea autocomplete="off" name="description" id="" class="form-control" cols="30"
                                          rows="02"></textarea>
                            </div>
                            <div class="form-group mb-2">
                                <label for="" class="mb-1"><b>Button One Text</b></label>
                                <input autocomplete="off" type="text" class="form-control" name="button_one_text">
                            </div>
                            <div class="form-group mb-2">
                                <label for="" class="mb-1"><b>Button One link</b></label>
                                <input autocomplete="off" type="text" class="form-control" name="button_one_link">
                            </div>
                            <div class="form-group mb-2">
                                <label for="" class="mb-1"><b>Button Two Text</b></label>
                                <input autocomplete="off" type="text" class="form-control" name="button_two_text">
                            </div>
                            <div class="form-group mb-2">
                                <label for="" class="mb-1"><b>Button Two link</b></label>
                                <input autocomplete="off" type="text" class="form-control" name="button_two_link">
                            </div>
               `);
            } else {
                $('#appendSliderTYpe').html('');
                $('#appendSliderTYpe').html(`
                  <div class="form-group mb-2">
                                <label for="" class="mb-1"><b>Slider Link</b></label>
                                <input autocomplete="off" type="text" class="form-control" name="slider_link">
                            </div>
                            <div class="form-group mb-2 text-center">
                                <img id="previewSliderImg" onclick="$(this).next().click()"
                                     src="https://via.placeholder.com/1000x1000" style="height: 400px;
  width: 70%;
  object-fit: cover;" alt="">
                                <input autocomplete="off" onchange="showSelectedImage($(this),'previewSliderImg')"
                                       type="file" class="d-none"
                                       name="image">
                            </div>
                            <div class="form-group mb-2">
                                <label for="" class="mb-1"><b>Heading</b></label>
                                <input autocomplete="off" type="text" class="form-control" name="heading">
                            </div>
                            <div class="form-group mb-2">
                                <label for="" class="mb-1"><b>Description</b></label>
                                <textarea autocomplete="off" name="description" id="" class="form-control" cols="30"
                                          rows="02"></textarea>
                            </div>
                            <div class="form-group mb-2">
                                <label for="" class="mb-1"><b>Button One Text</b></label>
                                <input autocomplete="off" type="text" class="form-control" name="button_one_text">
                            </div>
                            <div class="form-group mb-2">
                                <label for="" class="mb-1"><b>Button One link</b></label>
                                <input autocomplete="off" type="text" class="form-control" name="button_one_link">
                            </div>
                            <div class="form-group mb-2">
                                <label for="" class="mb-1"><b>Button Two Text</b></label>
                                <input autocomplete="off" type="text" class="form-control" name="button_two_text">
                            </div>
                            <div class="form-group mb-2">
                                <label for="" class="mb-1"><b>Button Two link</b></label>
                                <input autocomplete="off" type="text" class="form-control" name="button_two_link">
                            </div>
               `);
            }
        }

        function selectEditSliderType(element) {
            console.log('aksldjsal');

            if (element.val() == 'computer') {

                $('#appendEditSliderType').html('');
                $('#appendEditSliderType').html(`
                  <div class="form-group mb-2">
                                <label for="" class="mb-1"><b>Slider Link</b></label>
                                <input autocomplete="off" type="text" class="form-control" name="slider_link">
                            </div>
                            <div class="form-group mb-2">
                                <img id="previewSliderImg" onclick="$(this).next().click()"
                                     src="https://via.placeholder.com/1000x1000" style="height: 150px;
  width: 100%;
  object-fit: cover;" alt="">
                                <input autocomplete="off" onchange="showSelectedImage($(this),'previewSliderImg')"
                                       type="file" class="d-none"
                                       name="image">
                            </div>
                            <div class="form-group mb-2">
                                <label for="" class="mb-1"><b>Heading</b></label>
                                <input autocomplete="off" type="text" class="form-control" name="heading">
                            </div>
                            <div class="form-group mb-2">
                                <label for="" class="mb-1"><b>Description</b></label>
                                <textarea autocomplete="off" name="description" id="" class="form-control" cols="30"
                                          rows="02"></textarea>
                            </div>
                            <div class="form-group mb-2">
                                <label for="" class="mb-1"><b>Button One Text</b></label>
                                <input autocomplete="off" type="text" class="form-control" name="button_one_text">
                            </div>
                            <div class="form-group mb-2">
                                <label for="" class="mb-1"><b>Button One link</b></label>
                                <input autocomplete="off" type="text" class="form-control" name="button_one_link">
                            </div>
                            <div class="form-group mb-2">
                                <label for="" class="mb-1"><b>Button Two Text</b></label>
                                <input autocomplete="off" type="text" class="form-control" name="button_two_text">
                            </div>
                            <div class="form-group mb-2">
                                <label for="" class="mb-1"><b>Button Two link</b></label>
                                <input autocomplete="off" type="text" class="form-control" name="button_two_link">
                            </div>
               `);
            } else {
                $('#appendEditSliderType').html('');
                $('#appendEditSliderType').html(`
                  <div class="form-group mb-2">
                                <label for="" class="mb-1"><b>Slider Link</b></label>
                                <input autocomplete="off" type="text" class="form-control" name="slider_link">
                            </div>
                            <div class="form-group mb-2 text-center">
                                <img id="previewSliderImg" onclick="$(this).next().click()"
                                     src="https://via.placeholder.com/1000x1000" style="height: 400px;
  width: 70%;
  object-fit: cover;" alt="">
                                <input autocomplete="off" onchange="showSelectedImage($(this),'previewSliderImg')"
                                       type="file" class="d-none"
                                       name="image">
                            </div>
                            <div class="form-group mb-2">
                                <label for="" class="mb-1"><b>Heading</b></label>
                                <input autocomplete="off" type="text" class="form-control" name="heading">
                            </div>
                            <div class="form-group mb-2">
                                <label for="" class="mb-1"><b>Description</b></label>
                                <textarea autocomplete="off" name="description" id="" class="form-control" cols="30"
                                          rows="02"></textarea>
                            </div>
                            <div class="form-group mb-2">
                                <label for="" class="mb-1"><b>Button One Text</b></label>
                                <input autocomplete="off" type="text" class="form-control" name="button_one_text">
                            </div>
                            <div class="form-group mb-2">
                                <label for="" class="mb-1"><b>Button One link</b></label>
                                <input autocomplete="off" type="text" class="form-control" name="button_one_link">
                            </div>
                            <div class="form-group mb-2">
                                <label for="" class="mb-1"><b>Button Two Text</b></label>
                                <input autocomplete="off" type="text" class="form-control" name="button_two_text">
                            </div>
                            <div class="form-group mb-2">
                                <label for="" class="mb-1"><b>Button Two link</b></label>
                                <input autocomplete="off" type="text" class="form-control" name="button_two_link">
                            </div>
               `);
            }
        }
    </script>
@endsection
