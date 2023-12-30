@extends('frontend.layout.layout')
@section('title')
    Blogs
@endsection
@if(!empty($seo))
    @section('seo')
        <title>{{$seo->seo_title}}</title>
        <meta name="keywords" content="{{convertKeyword($seo->seo_keywords)}}">
        <meta name="description" content="{{ $seo->seo_description }}">
    @endsection
@endif
@section('body')
    <div style="background: rgba(230, 231, 233, 1)!important;">
        <div class="contact-main">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-4">
                        <div class="contact-content">
                            <h1>BLOGS</h1>
                            <p>Latest news from our blog
                        </div>
                    </div>
                    <div class="col-md-2 d-none d-md-block">
                        <div class=" d-inline-flex">
                            <img class="img-fluid" src="{{asset('frontend/assets/images/Vector3.svg')}}" alt="">
                            <img class="img-fluid" src="{{asset('frontend/assets/images/Vector3.svg')}}" alt="">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <img src="{{asset('frontend/assets/images/banner-main.svg')}}" class="w-100" alt="">
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="empty-div rounded-3 bg-dark"></div>
                    </div>
                </div>
            </div>
        </div>
        <section class="container position-relative">
            <div class="row">
                <div class="col-lg-9 col-sm-12 mt-5">
                    @if(count($blogs) > 0)
                        @foreach($blogs as $blog)
                            <div class="col-12 pb-5  border-bottom border-dark-subtle mb-5">
                                <div class="blog-img">
                                    <img class="img-fluid blog-img"
                                         src="{{!empty($blog->image) ? asset($blog->image) : 'https://via.placeholder.com/1000x1000'}}"
                                         alt="">
                                    <div class="blog-badge">
                                        {{$blog->created_at->format('M d, Y')}}
                                    </div>
                                </div>
                                <h4 class="my-3 fw-semibold-custom">{{$blog->title ?? ''}}</h4>
                                <p class="desc">{{!empty($blog->short_description) ? \Illuminate\Support\Str::limit($blog->short_description,300) : ''}}</p>
                                <a href="{{route('blogs.single',$blog->slug)}}" class="text-decoration-none bg-black p-3 d-flex justify-content-between py-2 rounded-1">
                                    <p class="text-white mb-0">
                                        Read More
                                    </p>
                                    <button class="btn p-0"><img
                                            src="{{asset('frontend/assets/images/arrow-right.svg')}}"
                                            class="arrow-width"
                                            alt="">
                                    </button>
                                </a>
                            </div>
                        @endforeach
                    @endif
                    <div class="col-12">
                        <div class="d-flex justify-content-center justify-content-sm-end my-3">
                            <div class="pagination">
                                {{$blogs->links('pagination')}}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 my-5">
                    <div class="card recent rounded-2 d-none d-md-block">
                        <div class="card-header text-center posts-heading">
                            <h5 class="fw-semibold-custom">Recent Posts</h5>
                        </div>
                        <div class="card-body desc">
                            @if(count($recent_posts) > 0)
                                @foreach($recent_posts as $recent_post)
                                    <div class="d-flex gap-2"><span><i
                                                class="bi bi-caret-right-fill text-dark"></i></span>
                                        <p>{{$recent_post->title ?? ''}}</p></div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </section>


    </div>
@endsection
