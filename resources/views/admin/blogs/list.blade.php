@extends('admin.layouts.layout')
@section('title')
    Blogs-List
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
                        <h4 class="page-title">Blogs</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h4 class="header-title">List</h4>
                        </div>
                        <div class="card-body">
                            <table id="basic-datatable" class="table table-striped dt-responsive nowrap w-100"
                                   style="vertical-align: baseline">
                                <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($blogs as $blog)
                                    <tr>

                                        <td>{{!empty($blog->title) ? \Illuminate\Support\Str::limit($blog->title,50) : ''}}</td>
                                        <td>{{!empty($blog->short_description) ? \Illuminate\Support\Str::limit($blog->short_description,50) : ''}}</td>
                                        <td>
                                            <div class="d-inline-flex gap-2">
                                                <a href="{{route('admin.blogs.edit',$blog->slug)}}"
                                                   class="btn btn-warning btn-sm"><i class="ri ri-edit-2-line"></i>
                                                </a>
                                                <button type="button" onclick="deleteBlog('{{$blog->id}}',$(this))"
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

    </div>
@endsection
@section('custom-scripts')
    <script>
        ClassicEditor
            .create(document.querySelector('#blog_content'))
            .then(editor => {
                console.log(editor);
            })
            .catch(error => {
                console.error(error);
            });


        $('#saveBlogForm').on("submit", function (e) {
            e.preventDefault()
            var form = $('#saveBlogForm')[0];
            var formdata = new FormData(form);
            $('.submitBtn').html('<span class="me-2"><i class="fa fa-spinner fa-spin"></i></span> Processing');
            $('.submitBtn').prop('disabled', true);
            $.ajax({
                type: 'POST',
                url: '{{route('admin.blogs.store')}}',
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

        function deleteBlog(id, element) {
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
                        url: '{{route('admin.blogs.delete')}}',
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
