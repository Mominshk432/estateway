<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <title>Log In</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully responsive admin theme which can be used to build CRM, CMS,ERP etc." name="description"/>
    <meta content="Techzaa" name="author"/>

    <!-- App favicon -->
    <link rel="shortcut icon" href="{{asset('admin/assets/images/favicon.ico')}}">

    <!-- Theme Config Js -->
    <script src="{{asset('admin/assets/js/config.js')}}"></script>

    <!-- App css -->
    <link href="{{asset('admin/assets/css/app.min.css')}}" rel="stylesheet" type="text/css" id="app-style"/>

    <!-- Icons css -->
    <link href="{{asset('admin/assets/css/icons.min.css')}}" rel="stylesheet" type="text/css"/>
</head>

<body class="authentication-bg position-relative">
<div class="account-pages pt-2 pt-sm-5 pb-4 pb-sm-5 position-relative">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xxl-6 col-lg-10">
                <div class="card overflow-hidden">
                    <div class="row g-0">

                        <div class="col-lg-12">
                            <div class="d-flex flex-column h-100">
                                <div class="auth-brand p-4">
                                    <a href="index.html" class="logo-light">
                                        <img style="height: 85px" src="{{asset('logo.png')}}" alt="logo">
                                    </a>
                                    <a href="index.html" class="logo-dark">
                                        <img style="height: 85px" src="{{asset('logo.png')}}" alt="dark logo"
                                        >
                                    </a>
                                </div>
                                <div class="p-4 my-auto">
                                    <h4 class="fs-20">Sign In</h4>
                                    <p class="text-muted mb-3">Enter your email address and password to access
                                        account.
                                    </p>

                                    <!-- form -->
                                    <form method="POST" action="{{ route('login') }}">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="emailaddress" class="form-label">Email address</label>
                                            <input class="form-control  @error('email') is-invalid @enderror"
                                                   name="email" value="{{ old('email') }}" type="email"
                                                   id="emailaddress" required=""
                                                   placeholder="Enter your email" autocomplete="email" autofocus>
                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <a href="{{ route('password.request') }}"
                                               class="text-muted float-end"><small>Forgot
                                                    your
                                                    password?</small></a>
                                            <label for="password" class="form-label">Password</label>
                                            <input class="form-control @error('password') is-invalid @enderror"
                                                   type="password" name="password" required id="password"
                                                   placeholder="Enter your password" autocomplete="current-password">


                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <div class="form-check">
                                                <input name="remember" type="checkbox" class="form-check-input"
                                                       id="checkbox-signin" {{ old('remember') ? 'checked' : '' }}>
                                                <label class="form-check-label" for="checkbox-signin">Remember
                                                    me</label>
                                            </div>
                                        </div>
                                        <div class="mb-0 text-start">
                                            <button class="btn btn-soft-primary w-100" type="submit"><i
                                                    class="ri-login-circle-fill me-1"></i> <span class="fw-bold">Log
                                                        In</span></button>
                                        </div>
                                    </form>
                                    <!-- end form-->
                                </div>
                            </div>
                        </div> <!-- end col -->
                    </div>
                </div>
            </div>
            <!-- end row -->
        </div>
    </div>
    <!-- end container -->
</div>
<!-- end page -->

<footer class="footer footer-alt fw-medium">
        <span class="text-dark">
            <script>document.write(new Date().getFullYear())</script> ©---
        </span>
</footer>
<!-- Vendor js -->
<script src="{{asset('admin/assets/js/vendor.min.js')}}"></script>

<!-- App js -->
<script src="{{asset('admin/assets/js/app.min.js')}}"></script>

</body>
</html>
