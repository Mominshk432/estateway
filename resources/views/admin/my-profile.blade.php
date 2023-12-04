@extends('admin.layouts.layout')
@section('title')
    My Profile
@endsection
@section('body')
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-sm-12">
                    <div class="profile-bg-picture"
                         style="background: #1a2942">
                        <span class="picture-bg-overlay"></span>
                        <!-- overlay -->
                    </div>
                    <!-- meta -->
                    <div class="profile-user-box">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="profile-user-img"><img id="profile-picture"
                                                                   src="{{!empty(auth()->user()->image) ? asset(auth()->user()->image) : 'https://via.placeholder.com/1000x1000'}}"
                                                                   alt=""
                                                                   class="avatar-lg rounded-circle"></div>
                                <div class="">
                                    <h4 class="mt-4 fs-17 ellipsis">{{auth()->user()->name ?? ''}}</h4>
                                    <p class="font-13">Admin</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/ meta -->
                </div>
            </div>
            <!-- end row -->

            <div class="row">
                <div class="col-sm-12">
                    <div class="card p-0">
                        <div class="card-body p-0">
                            <div class="profile-content">
                                <ul class="nav nav-underline nav-justified gap-0">


                                    <li class="nav-item"><a class="nav-link active" data-bs-toggle="tab"
                                                            data-bs-target="#edit-profile" type="button" role="tab"
                                                            aria-controls="home" aria-selected="true"
                                                            href="#edit-profile">Settings</a></li>
                                    <li class="nav-item"><a class="nav-link " data-bs-toggle="tab"
                                                            data-bs-target="#changePassword" type="button" role="tab"
                                                            aria-controls="home" aria-selected="true"
                                                            href="#edit-profile">Change Password</a></li>

                                </ul>

                                <div class="tab-content m-0 p-4">
                                    <!-- settings -->
                                    <div id="edit-profile" class="tab-pane active show">
                                        <div class="user-profile-content">
                                            <form id="saveProfileInfoForm">
                                                @csrf
                                                <div class="row row-cols-sm-2 row-cols-1">
                                                    <div class="mb-2">
                                                        <label class="form-label" for="FullName">Full
                                                            Name</label>
                                                        <input type="text" value="{{auth()->user()->name ?? ''}}"
                                                               name="name" id="FullName"
                                                               class="form-control">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label" for="Email">Email</label>
                                                        <input type="email" value="{{auth()->user()->email ?? ''}}"
                                                               id="Email" name="email" class="form-control">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label" for="Email">Image</label>
                                                        <input name="image"
                                                               onchange="showSelectedImage($(this),'profile-picture')"
                                                               type="file"
                                                               id="" class="form-control">
                                                    </div>

                                                </div>
                                                <button class="btn btn-primary submitBtn" type="submit"><i
                                                        class="ri-save-line me-1 fs-16 lh-1"></i> Save
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                    <div id="changePassword" class="tab-pane ">
                                        <div class="user-profile-content">
                                            <form id="changePasswordForm">
                                                @csrf
                                                <div class="row row-cols-sm-2 row-cols-1">
                                                    <div class="mb-2">
                                                        <label class="form-label" for="FullName">Old Password</label>
                                                        <input type="password"
                                                               name="old_password" placeholder="********" id=""
                                                               class="form-control">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label" for="Email">New Password</label>
                                                        <input type="password"
                                                               name="new_password" placeholder="********" id=""
                                                               class="form-control">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label" for="Email">Confirm Password</label>
                                                        <input type="password"
                                                               name="confirm_password" placeholder="********" id=""
                                                               class="form-control">
                                                    </div>

                                                </div>
                                                <button class="btn btn-primary submitBtn2" type="submit"><i
                                                        class="ri-save-line me-1 fs-16 lh-1"></i> Save
                                                </button>
                                            </form>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end page title -->

        </div>
        <!-- end row -->

    </div>
@endsection
@section('custom-scripts')
    <script>
        $('#saveProfileInfoForm').on("submit", function (e) {
            e.preventDefault()
            var form = $('#saveProfileInfoForm')[0];
            var formdata = new FormData(form);
            $('.submitBtn').html('<span class="me-2"><i class="fa fa-spinner fa-spin"></i></span> Processing');
            $('.submitBtn').prop('disabled', true);
            $.ajax({
                type: 'POST',
                url: '{{route('admin.profile.update')}}',
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
        $('#changePasswordForm').on("submit", function (e) {
            e.preventDefault()
            var form = $('#changePasswordForm')[0];
            var formdata = new FormData(form);
            $('.submitBtn2').html('<span class="me-2"><i class="fa fa-spinner fa-spin"></i></span> Processing');
            $('.submitBtn2').prop('disabled', true);
            $.ajax({
                type: 'POST',
                url: '{{route('admin.profile.changePassword')}}',
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
    </script>
@endsection
