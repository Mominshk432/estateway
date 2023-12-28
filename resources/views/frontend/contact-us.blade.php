@extends('frontend.layout.layout')
@section('title')
    Contact Us
@endsection
@if(!empty($seo))
    @section('seo')
        <title>{{$seo->seo_title}}</title>
        <meta name="keywords" content="{{convertKeyword($seo->seo_keywords)}}">
        <meta name="description" content="{{ $seo->seo_description }}">
    @endsection
@endif
@section('body')
    <div class="contact-main">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="contact-content">
                        <h1>CONTACT</h1>
                        <p>How to find us</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <img src="{{asset('frontend/assets/images/contact-us-main.svg')}}" class="w-100" alt="">
                </div>
            </div>
        </div>
    </div>
    <div class="social-contact" style="background-image: url({{asset('frontend/assets/images/social-contact.svg')}})">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h2 class="relation-heading text-start text-sm-center">Call Us</h2>
                    <div class="d-flex d-sm-block mb-4 mb-sm-0 align-items-center justify-content-between">
                        <div class="text-center">
                            <img src="{{asset('frontend/assets/images/contact-phone.svg')}}" class="contact-icons"
                                 alt="relation-icon">
                        </div>
                        <div>
                            <p class="text-center text-theme-light fs-5 contact-us-content mb-1">
                                {{$contact->phone ?? ''}}
                            </p>
                            <p class="text-center text-theme-light fs-5 contact-us-content">
                                {{$contact->another_phone ?? ''}}
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <h2 class="relation-heading text-start text-sm-center">Email</h2>
                    <div class="d-flex d-sm-block mb-4 mb-sm-0 align-items-center justify-content-between">
                        <div class="text-center">
                            <img src="{{asset('frontend/assets/images/contact-mail.svg')}}" class="contact-icons"
                                 alt="relation-icon">
                        </div>
                        <p class="text-center text-theme-light fs-5 contact-us-content mb-1">
                            {{$contact->email ?? ''}}
                        </p>
                    </div>
                </div>
                <div class="col-md-4">
                    <h2 class="relation-heading text-start text-sm-center">Address</h2>
                    <div class="d-flex d-sm-block mb-4 mb-sm-0 align-items-center justify-content-between">
                        <div class="text-center">
                            <img src="{{asset('frontend/assets/images/contact-location.svg')}}" class="contact-icons"
                                 alt="relation-icon">
                        </div>
                        <p class="text-center text-theme-light fs-5 contact-us-content mb-1">
                            {{$contact->address ?? ''}}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="git">
        <div class="container">
            <div class="row">
                <div class="col-md-9 pt-5 pb-4 px-4">
                    <div class="git-content">
                        <h2>
                            GET IN TOUCH
                        </h2>
                    </div>
                    <form id="contact_form">
                        @csrf
                        <div class="row mt-5">
                            <div class="col-12 my-3">
                                <input required autocomplete="off" name="name" type="text"
                                       class="form-control contact-inputs"
                                       placeholder="Enter your name">
                            </div>
                            <div class="col-sm-6 my-3">
                                <input required autocomplete="off" name="phone" type="number"
                                       class="form-control contact-inputs"
                                       placeholder="Enter your mobile no.">
                            </div>
                            <div class="col-sm-6 my-3">
                                <input required autocomplete="off" name="email" type="email"
                                       class="form-control contact-inputs"
                                       placeholder="Enter your email">
                            </div>
                            <div class="col-12 my-3">
                            <textarea required autocomplete="off" name="message" class="form-control contact-inputs"
                                      placeholder="Enter Message"
                                      rows="4"></textarea>
                            </div>
                            <div class="col-md-12  mb-4">
                                <div class="form-group position-relative">
                                    @php
                                        $random = rand(1000,9999);
                                    @endphp
                                    <span style="-webkit-user-select: none;
-khtml-user-select: none;
-moz-user-select: none;
-ms-user-select: none;
-o-user-select: none;
user-select: none;
background: #fff;
  border: 1px solid #d1d1d1;
  padding-left: 10px;
  padding-right: 10px;
  padding-top: 3px;
  padding-bottom: 3px;
" class="captha text-theme-dark">{{$random}}</span>
                                    <input type="hidden" name="captcha" value="{{$random}}">
                                    <input autocomplete="off" type="text" name="captcha_enter"
                                           class="form-control custom_input"
                                           placeholder="input the code" required>
                                </div>
                            </div>
                            <div class="col-12 text-end my-3">
                                <button type="submit" class="btn btn-yellow-normal submitBtn">
                                    Send Message
                                </button>
                            </div>
                        </div>
                    </form>

                </div>
                <div class="col-md-3 p-0">
                    <img
                        src="{{!empty($contact->image) ? asset($contact->image) : 'https://via.placeholder.com/1000x1000'}}"
                        class="git-img" alt="">
                </div>
            </div>
        </div>
    </div>
    <div>
        <iframe class="w-100"
                src="{{$contact->map_link ?? ''}}"
                height="450" style="border:0;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
@endsection
@section('custom-scripts')
    <script>
        $('#contact_form').on("submit", function (e) {
            e.preventDefault()
            var form = $('#contact_form')[0];
            var formdata = new FormData(form);
            $('.submitBtn').html('<span class="me-2"><i class="fa fa-spinner fa-spin"></i></span> Processing');
            $('.submitBtn').prop('disabled', true);
            $.ajax({
                type: 'POST',
                url: '{{route('contact.post')}}',
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
                    $('.submitBtn').html('Send Message');
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

                    $('.submitBtn').html('Send Message');
                    $('.submitBtn').prop('disabled', false);

                }

            });
        });
    </script>
@endsection
