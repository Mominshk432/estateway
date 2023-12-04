@extends('admin.layouts.layout')
@section('title')
    Homepage-Testimonials
@endsection
@section('body')
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <h4 class="page-title">Testimonials</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h4 class="header-title">Testimonials</h4>
                            <button type="button" data-bs-toggle="modal" data-bs-target="#add-testimonial-modal"
                                    class="btn btn-success">Add <i class="ri ri-add-line"></i></button>
                        </div>
                        <div class="card-body">
                            <table id="basic-datatable" class="table table-striped dt-responsive nowrap w-100"
                                   style="vertical-align: baseline">
                                <thead>
                                <tr>
                                    <th>Heading</th>
                                    <th>Subheading</th>
                                    <th>Description</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($testimonials as $testimonial)
                                    <tr>
                                        <td>{{$testimonial->heading ?? ''}}</td>
                                        <td>{{$testimonial->subheading ?? ''}}</td>
                                        <td>{{!empty($testimonial->description) ? \Illuminate\Support\Str::limit($testimonial->description,100): ''}}</td>
                                        <td>
                                            <div class="d-inline-flex gap-2">
                                                <button data-bs-toggle="modal" data-bs-target="#edit-testimonial-modal"
                                                        type="button"
                                                        onclick="setValues('{{$testimonial->id}}','{{$testimonial->heading}}','{{$testimonial->subheading}}','{{str_replace(["\r", "\n"], '', $testimonial->description)}}')"
                                                        class="btn btn-warning btn-sm"><i class="ri ri-edit-2-line"></i>
                                                </button>
                                                <button type="button"
                                                        onclick="deleteTestimonial('{{$testimonial->id}}',$(this))"
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
    <div id="add-testimonial-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="standard-modalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="standard-modalLabel">Add Testimonial</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="addTestimonialForm">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group mb-2">
                            <label for="" class="mb-1"><b>Heading</b></label>
                            <input autocomplete="off" type="text" class="form-control" name="heading">
                        </div>
                        <div class="form-group mb-2">
                            <label for="" class="mb-1"><b>Subheading</b></label>
                            <input autocomplete="off" type="text" class="form-control" name="subheading">
                        </div>
                        <div class="form-group">
                            <label for="" class="mb-1"><b>Description</b></label>
                            <textarea autocomplete="off" name="description" id="" class="form-control" cols="30"
                                      rows="02"></textarea>
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
    <div id="edit-testimonial-modal" class="modal fade" tabindex="-1" role="dialog"
         aria-labelledby="standard-modalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="standard-modalLabel">Update Testimonial</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="editTestimonialForm">
                    @csrf
                    <input type="hidden" name="id" id="edit_id">
                    <div class="modal-body">
                        <div class="form-group mb-2">
                            <label for="" class="mb-1"><b>Heading</b></label>
                            <input id="edit_subheading" autocomplete="off" type="text" class="form-control"
                                   name="subheading">
                        </div>
                        <div class="form-group mb-2">
                            <label for="" class="mb-1"><b>Heading</b></label>
                            <input id="edit_heading" autocomplete="off" type="text" class="form-control" name="heading">
                        </div>
                        <div class="form-group">
                            <label for="" class="mb-1"><b>Description</b></label>
                            <textarea autocomplete="off" name="description" id="edit_description" class="form-control"
                                      cols="30"
                                      rows="02"></textarea>
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
        $('#addTestimonialForm').on("submit", function (e) {
            e.preventDefault()
            var form = $('#addTestimonialForm')[0];
            var formdata = new FormData(form);
            $('.submitBtn').html('<span class="me-2"><i class="fa fa-spinner fa-spin"></i></span> Processing');
            $('.submitBtn').prop('disabled', true);
            $.ajax({
                type: 'POST',
                url: '{{route('admin.testimonial.add')}}',
                dataType: 'json',
                data: formdata,
                contentType: false,
                processData: false,
                cache: false,
                mimeType: 'multipart/form-data',

                success: function (res) {
                    if (res.error == false) {
                        $('#add-testimonial-modal').modal('hide');
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

        function setValues(id, heading, subheading, description, image) {
            $('#edit_id').val(id);
            $('#edit_img').attr('src', image);
            $('#edit_heading').val(heading);
            $('#edit_subheading').val(subheading);
            $('#edit_description').text(description);
        }

        $('#editTestimonialForm').on("submit", function (e) {
            e.preventDefault()
            var form = $('#editTestimonialForm')[0];
            var formdata = new FormData(form);
            $('.submitBtn').html('<span class="me-2"><i class="fa fa-spinner fa-spin"></i></span> Processing');
            $('.submitBtn').prop('disabled', true);
            $.ajax({
                type: 'POST',
                url: '{{route('admin.testimonial.update')}}',
                dataType: 'json',
                data: formdata,
                contentType: false,
                processData: false,
                cache: false,
                mimeType: 'multipart/form-data',

                success: function (res) {
                    if (res.error == false) {
                        $('#edit-testimonial-modal').modal('hide');
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


        function deleteTestimonial(id, element) {
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
                        url: '{{route('admin.testimonial.delete')}}',
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
    </script>
@endsection
