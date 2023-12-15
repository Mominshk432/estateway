@extends('admin.layouts.layout')
@section('title')
    Blogs-Edit
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
                        <div class="card-header">
                            <h4 class="header-title">Edit</h4>
                        </div>
                        <div class="card-body">
                            <form id="saveBlogForm">
                                @csrf
                                <input type="hidden" name="id" value="{{$blog->id}}">
                                <div class="row">
                                    <div class="col-8">

                                        <div class="mb-3">
                                            <label for="simpleinput" class="form-label">Title</label>
                                            <input value="{{$blog->title ?? ''}}" autocomplete="off"
                                                   placeholder="Title..." type="text"
                                                   id="simpleinput"
                                                   name="title" class="form-control">
                                        </div>
                                        <div class="mb-3">
                                            <label for="simpleinput" class="form-label">Short Description</label>
                                            <input value="{{$blog->short_description ?? ''}}" autocomplete="off"
                                                   placeholder="Short Description..." type="text"
                                                   id="simpleinput" name="short_description"
                                                   class="form-control">
                                        </div>
                                        <div class="mb-3">
                                            <label for="simpleinput" class="form-label">Slug</label>
                                            <input value="{{$blog->slug ?? ''}}" autocomplete="off"
                                                   placeholder="Slug..." type="text"
                                                   id="simpleinput" name="slug"
                                                   class="form-control">
                                        </div>
                                        <div class="mb-3">
                                            <label for="simpleinput" class="form-label">Datetime</label>
                                            <input value="{{$blog->created_at ?? ''}}" autocomplete="off"
                                                   placeholder="Slug..." type="datetime-local"
                                                   id="simpleinput" name="timestamp"
                                                   class="form-control">
                                        </div>
                                        <div class="mb-3">
                                            <label for="simpleinput" class="form-label">Content</label>
                                            <textarea autocomplete="off" class="form-control" name="content"
                                                      id="blog_content" cols="30"
                                                      rows="03">{{$blog->content ?? ''}}</textarea>
                                        </div>
                                    </div> <!-- end col -->
                                    <div class="col-4 mb-4">
                                        <div class="w-100 h-100 d-flex align-items-center">
                                            <img onclick="$(this).next().click()" id="previewBlogImg" style="height: 300px;
  width: 100%;
  object-fit: cover;" src="{{!empty($blog->image) ? asset($blog->image) : 'https://via.placeholder.com/1000x1000'}}"
                                                 alt="">
                                            <input onchange="showSelectedImage($(this),'previewBlogImg')" type="file"
                                                   class="d-none" name="image">
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <h5><b>Seo Settings</b></h5>
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="simpleinput" class="form-label">Seo Title</label>
                                                    <input value="{{$blog->seo_title ?? ''}}" autocomplete="off"
                                                           placeholder="Seo Title..." type="text"
                                                           id="simpleinput"
                                                           name="seo_title" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="simpleinput" class="form-label">Seo Keywords</label>
                                                    <input value="{{$blog->seo_keywords ?? ''}}" autocomplete="off"
                                                           placeholder="Seo Keywords" type="text"
                                                           id="seo_tags"
                                                           name="seo_keywords" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="mb-3">
                                                    <label for="simpleinput" class="form-label">Seo Description</label>
                                                    <textarea autocomplete="off" name="seo_description" id="" cols="30"
                                                              rows="03"
                                                              class="form-control">{{$blog->seo_description ?? ''}}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div> <!-- end col -->
                                    <div class="col-12 text-end">
                                        <button class="btn btn-primary submitBtn" type="submit">Save</button>
                                    </div>

                                </div>
                            </form>
                            <!-- end row-->
                        </div> <!-- end card-body -->
                    </div> <!-- end card -->
                </div><!-- end col -->
            </div><!-- end row -->


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
        var input = document.querySelector('input#seo_tags');

        // initialize Tagify on the above input node reference
        new Tagify(input);

        $('#saveBlogForm').on("submit", function (e) {
            e.preventDefault()
            var form = $('#saveBlogForm')[0];
            var formdata = new FormData(form);
            $('.submitBtn').html('<span class="me-2"><i class="fa fa-spinner fa-spin"></i></span> Processing');
            $('.submitBtn').prop('disabled', true);
            $.ajax({
                type: 'POST',
                url: '{{route('admin.blogs.update')}}',
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
                            window.location.href = '{{route('admin.blogs.list')}}';
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
