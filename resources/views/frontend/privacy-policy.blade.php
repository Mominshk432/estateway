@extends('frontend.layout.layout')
@section('title')
    Privacy Policy
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
                        <h1>{{$privacy_policy->heading ?? ''}}</h1>
                    </div>
                </div>
                <div class="col-md-6">
                    <img src="{{asset('frontend/assets/images/contact-us-main.svg')}}" class="w-100" alt="">
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    {!! $privacy_policy->content !!}
                </div>
            </div>
        </div>
    </div>
@endsection
