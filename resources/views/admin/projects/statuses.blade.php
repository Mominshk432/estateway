@extends('admin.layouts.layout')
@section('title')
    Projects-Status
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
                        <h4 class="page-title">Project Statuses</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h4 class="header-title">List</h4>
                            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add-status-modal">
                                Add +
                            </button>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="scroll-horizontal-datatable" class="table table-striped w-100 nowrap">
                                    <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($statuses as $status)
                                        <tr>

                                            <td>{{$status->title ?? ''}}</td>
                                            <td>
                                                <div class="d-inline-flex gap-2">
                                                    <button data-bs-toggle="modal" data-bs-target="#edit-status-modal"
                                                            type="button"
                                                            onclick="setEditValues('{{$status->id}}','{{$status->title}}')"
                                                            class="btn btn-warning btn-sm"><i
                                                            class="ri ri-edit-2-line"></i>
                                                    </button>
                                                    <button type="button"
                                                            onclick="deleteStatus('{{$status->id}}',$(this))"
                                                            class="btn btn-danger btn-sm"><i
                                                            class="ri ri-delete-bin-2-line"></i></button>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>

                        </div> <!-- end card body-->
                    </div> <!-- end card -->
                </div><!-- end col-->
            </div> <!-- end row-->


        </div> <!-- container -->

    </div>

    <div id="add-status-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="standard-modalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="standard-modalLabel">Add Status</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="addStatusForm">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group mb-2">
                            <label for="" class="mb-1"><b>Title</b></label>
                            <input autocomplete="off" type="text" class="form-control" name="title">
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
    <div id="edit-status-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="standard-modalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="standard-modalLabel">Add Status</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="updateStatusForm">
                    @csrf
                    <input type="hidden" name="id" id="edit_status_id">
                    <div class="modal-body">
                        <div class="form-group mb-2">
                            <label for="" class="mb-1"><b>Title</b></label>
                            <input id="edit_status_title" autocomplete="off" type="text" class="form-control"
                                   name="title">
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


        $('#addStatusForm').on("submit", function (e) {
            e.preventDefault()
            var form = $('#addStatusForm')[0];
            var formdata = new FormData(form);
            $('.submitBtn').html('<span class="me-2"><i class="fa fa-spinner fa-spin"></i></span> Processing');
            $('.submitBtn').prop('disabled', true);
            $.ajax({
                type: 'POST',
                url: '{{route('admin.project.statuses.add')}}',
                dataType: 'json',
                data: formdata,
                contentType: false,
                processData: false,
                cache: false,
                mimeType: 'multipart/form-data',

                success: function (res) {
                    if (res.error == false) {
                        $.growl.notice({message: res.message});
                        $('#add-status-modal').modal('hide');
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


        function setEditValues(id, title) {
            $('#edit_status_id').val(id);
            $('#edit_status_title').val(title);
        }

        $('#updateStatusForm').on("submit", function (e) {
            e.preventDefault()
            var form = $('#updateStatusForm')[0];
            var formdata = new FormData(form);
            $('.submitBtn').html('<span class="me-2"><i class="fa fa-spinner fa-spin"></i></span> Processing');
            $('.submitBtn').prop('disabled', true);
            $.ajax({
                type: 'POST',
                url: '{{route('admin.project.statuses.update')}}',
                dataType: 'json',
                data: formdata,
                contentType: false,
                processData: false,
                cache: false,
                mimeType: 'multipart/form-data',

                success: function (res) {
                    if (res.error == false) {
                        $.growl.notice({message: res.message});
                        $('#edit-status-modal').modal('hide');
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

        function deleteStatus(id, element) {
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
                        url: '{{route('admin.project.statuses.delete')}}',
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
