@extends('frontend.layout.layout')
@section('title')
    Blog
@endsection
@section('body')
    <div style="background: rgba(230, 231, 233, 1)!important;">
        <div class="property-text">
            <div class="contact-main mt-110">
                <div class="container">
                    <div class="row mt-2 justify-content-between align-content-center position-relative">
                        <div class="col-md-9">
                            <h2 class="fw-bold position-relative z-2">{{$blog->title ?? ''}}</h2>
                        </div>
                        <div class="col-md-3 position-relative z-2">
                            <div class="d-flex justify-content-end align-content-center h-100">
                                <p class="badge-yellow my-auto">{{$blog->created_at->format('M d, Y')}}</p>
                            </div>
                        </div>
                        <div class="blog-details-banner">
                            <img src="{{asset('frontend/assets/images/banner-main.svg')}}" alt="">
                        </div>
                    </div>
                </div>
                <div class="container mt-3 position-relative z-2">
                    <div class="row">
                        <div class="col-md-12 ">
                            <img class="blog-details-img"
                                 src="{{!empty($blog->image) ? asset($blog->image) : 'https://via.placeholder.com/1000x1000'}}"
                                 alt="">
                            <p class="desc mt-2">
                                {{$blog->short_description ?? ''}}
                            </p>

                            <div CLASS="border-start border-2 border-black border-opacity-75 mt-5 ps-3">

                                {!! $blog->content !!}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="properties my-5">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 px-sm-0">
                                <div class="d-flex align-items-end justify-content-between">
                                    <div class="border-start border-2 border-black border-opacity-75 mt-5 ps-3">
                                        <h1 class="text-uppercase main-heading">OTHER BLOGS</h1>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 px-sm-0 my-5">
                                <div class="owl-carousel properties-carousel owl-theme">
                                    @if(count($otherBlogs) > 0)
                                        @foreach($otherBlogs as $otherBlog)
                                            <div class="item">
                                                <div class="card border-transparent shadow p-0 bg-card">
                                                    <div class="card-header position-relative p-0">
                                                        <img
                                                            src="{{!empty($otherBlog->image) ? asset($otherBlog->image) : 'https://via.placeholder.com/1000x1000'}}"
                                                            class="w-100" alt="">
                                                    </div>
                                                    <div class="card-body p-0">
                                                        <div
                                                            class="d-flex justify-content-end border-bottom align-items-center border-black border-opacity-75">
                                                            <span
                                                                class="fw-500 my-2">{{$otherBlog->created_at->format('M d, Y')}}</span>
                                                        </div>
                                                        <div class="my-3 px-3">
                                                            <h5 class="fw-500">{{$otherBlog->title ?? ''}}</h5>
                                                        </div>
                                                        <a href="{{route('blogs.single',$blog->slug)}}"
                                                           class="text-decoration-none">
                                                            <div
                                                                class="bg-black px-3 d-flex justify-content-between py-2 mb-3">
                                                                <p class="text-white mb-0">Details</p>
                                                                <button class="btn p-0"><img
                                                                        src="{{asset('frontend/assets/images/arrow-right.svg')}}"
                                                                        class="arrow-width" alt=""></button>
                                                            </div>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
