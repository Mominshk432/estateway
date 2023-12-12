@extends('frontend.layout.layout')
@section('title')
    About Us
@endsection
@section('body')
    <style>
        .director_msg_content + p {
            color: white !important;
        }

        .our_moto_content + p {
            color: white !important;
        }
    </style>
    <div class="about-main mt-110" style="background-image: url({{asset('frontend/assets/images/about-banner.svg')}})">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <div class="about-main-heading">
                        <h1 class="text-uppercase ls-2">{{$about_us->heading ?? ''}}</h1>
                        <p>{{$about_us->subheading ?? ''}}</p>
                    </div>
                    <p class="w-75-custom text-theme-dark">
                        {!! $about_us->description !!}
                    </p>

                </div>
                <div class="col-md-4">
                    <div class="position-relative">
                        <img src="{{asset('frontend/assets/images/about.svg')}}" class="w-100 about-main-img" alt="">
                        <button class="btn btn-theme-about gap-3"><span>Contact Us</span> <span><img
                                        src="{{asset('frontend/assets/images/arrow-right-black.svg')}}" width="40"
                                        alt=""></span></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="message-section" style="background-image: url({{'frontend/assets/images/message-bg.svg'}})">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <h2 class="text-theme-light message-heading">
                        {{$director_message->section_heading ?? ''}}
                    </h2>
                    <div class="my-2">
                        <img style="height: 100px;width: 100px" src="{{!empty($director_message->image) ? asset($director_message->image) : 'https://via.placeholder.com/1000x1000'}}
" alt="">
                    </div>
                    <h5 class="text-theme-light">
                        {{$director_message->heading ?? ''}}
                    </h5>
                    <p class="text-theme-light">{{$director_message->subheading ?? ''}}</p>
                    <p class="text-theme-light mb-0  director_msg_content">{!! $director_message->description !!}</p>
                </div>
            </div>
        </div>
    </div>
    <div class="choose-section">
        <img src="{{asset('frontend/assets/images/choose-us-up-bg.png')}}" class="bg-up" alt="">
        <img src="{{asset('frontend/assets/images/choose-us-down-bg.png')}}" class="bg-down" alt="">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="choose-main">
                        <h2>{{$why_choose_us->main_heading ?? ''}}</h2>
                        <p>{{$why_choose_us->main_subheading ?? ''}}</p>
                    </div>
                </div>
                <div class="col-12 mt-3">
                    <div class="row">
                        <div class="col-md-5">
                            <div class="choose-us-content">
                                <div class="d-flex align-items-center mb-3 gap-3">
                                    <img src="{{asset('frontend/assets/images/choose-us1.png')}}" alt="" width="45">
                                    <h5>
                                        {{$why_choose_us->heading_1 ?? ''}}
                                    </h5>
                                </div>

                                {!! $why_choose_us->content_1 !!}

                            </div>
                            <div class="choose-us-content">
                                <div class="d-flex align-items-end mb-3 gap-3">
                                    <img src="{{asset('frontend/assets/images/choose-us2.png')}}" alt="" width="45">
                                    <h5>
                                        {{$why_choose_us->heading_2 ?? ''}}
                                    </h5>
                                </div>
                                {!! $why_choose_us->content_2 !!}
                            </div>
                        </div>
                        <div class="col-md-7">
                            <div class="row flex-column-reverse flex-lg-row">
                                <div class="col-lg-4">
                                    <div class="building">
                                        <img
                                                src="{{!empty($why_choose_us->image) ? asset($why_choose_us->image) : 'https://via.placeholder.com/1000x1000'}}"
                                                class="w-100"
                                                alt="">
                                    </div>
                                </div>
                                <div class="col-lg-8">
                                    <div class="choose-us-content">
                                        <div class="d-flex align-items-end mb-3 gap-3">
                                            <img src="{{asset('frontend/assets/images/choose-us-4.png')}}" alt=""
                                                 width="45">
                                            <h5>
                                                {{$why_choose_us->heading_3 ?? ''}}
                                            </h5>
                                        </div>
                                        {!! $why_choose_us->content_3 !!}
                                    </div>
                                    <div class="choose-us-content">
                                        <div class="d-flex align-items-end mb-3 gap-3">
                                            <img src="{{asset('frontend/assets/images/choose-us3.png')}}" alt=""
                                                 width="45">
                                            <h5>
                                                {{$why_choose_us->heading_4 ?? ''}}
                                            </h5>
                                        </div>
                                        {!! $why_choose_us->content_4 !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="relation" style="background-image: url({{asset('frontend/assets/images/relation-bg.svg')}})">
        <div class="container">
            <div class="row">
                <div class="col-md-4 mb-4 mb-sm-0">
                    <h2 class="relation-heading">{{$our_moto->heading_1 ?? ''}}</h2>
                    <div class="text-center">
                        <img src="{{asset('frontend/assets/images/relation-icon-1.svg')}}" class="relation-img"
                             alt="relation-icon">
                    </div>
                    <p class="text-center relation-content mb-0 our_moto_content">
                        {!! $our_moto->content_1 !!}
                    </p>
                </div>
                <div class="col-md-4 mb-4 mb-sm-0">
                    <h2 class="relation-heading">{{$our_moto->heading_2 ?? ''}}</h2>
                    <div class="text-center">
                        <img src="{{asset('frontend/assets/images/relation-icon-2.svg')}}" class="relation-img"
                             alt="relation-icon">
                    </div>
                    <p class="text-center relation-content mb-0 our_moto_content">
                        {!! $our_moto->content_2 !!}
                    </p>
                </div>
                <div class="col-md-4 mb-4 mb-sm-0">
                    <h2 class="relation-heading">{{$our_moto->heading_3 ?? ''}}</h2>
                    <div class="text-center">
                        <img src="{{asset('frontend/assets/images/relation-icon-3.svg')}}" class="relation-img"
                             alt="relation-icon">
                    </div>
                    <p class="text-center relation-content mb-0 our_moto_content">
                        {!! $our_moto->content_3 !!}
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection
