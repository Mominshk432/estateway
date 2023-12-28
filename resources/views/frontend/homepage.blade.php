<!doctype html>
<html lang="en">
@include('frontend.includes.head')
@if(!empty($seo))

    <title>{{$seo->seo_title}}</title>
    <meta name="keywords" content="{{convertKeyword($seo->seo_keywords)}}">
    <meta name="description" content="{{ $seo->seo_description }}">

@endif
<body>
@include('frontend.includes.mobile-nav')
<div id="carouselExampleIndicators" class="carousel slide main-slider-section" data-bs-ride="carousel"
     data-bs-pause="false">
    <div class="carousel-indicators">
        @foreach($banners as $banner)
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="{{$loop->index}}"
                    class="{{$loop->index == 0 ? 'active' : ''}}"
                    aria-current="true" aria-label="Slide {{$loop->index}}"></button>
        @endforeach
        <div class="carousel-bar"></div>
    </div>
    <div class="carousel-inner">
        @if(count($banners) > 0)
            @foreach($banners as $banner)
                <div
                    onclick="window.location.href='{{!empty($banner->slider_link) ? $banner->slider_link : 'javascript:void(0)'}}'"
                    class="carousel-item active">
                    <div class="main-slide"
                         style="background-image: url({{asset($banner->image)}})">
                        <div class="slide-content">
                            <div>
                                <h3>
                                    {{$banner->heading ?? ''}}
                                </h3>
                                <h5>
                                    {{$banner->description ?? ''}}
                                </h5>
                                <div
                                    class="d-flex justify-content-between gap-0 gap-sm-4 justify-content-sm-center mt-3 mt-sm-5">
                                    @if(!empty($banner->button_one_text))
                                        <a href="{{$banner->button_one_link}}"
                                           class="btn btn-yellow">
                                            <span>{{$banner->button_one_text}}</span> <img
                                                data-src="{{asset('frontend/assets/images/arrow-right.svg')}}"
                                                class="right-arrow lazy"
                                                alt="">
                                        </a>
                                    @endif
                                    @if(!empty($banner->button_two_text))
                                        <a href="{{$banner->button_two_link ?? 'javascript:void(0)'}}"
                                           class="btn btn-white">
                                            <span>{{$banner->button_two_text ?? ''}}</span> <img
                                                data-src="{{asset('frontend/assets/images/arrow-right-black.svg')}}"
                                                class="right-arrow lazy" alt="">
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
</div>
@include('frontend.includes.header')
<!--about us-->
<div class="aboutMe">
    <img src="{{asset('frontend/assets/images/about-me.svg')}}" class="w-100 d-none d-sm-block " alt="">
    <img src="{{asset('frontend/assets/images/about-ms-sm.svg')}}" class="w-100 w-100 d-block d-sm-none "
         alt="">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <div class="about-content">
                    <h1 class="text-uppercase">Welcome to Estateway</h1>
                    <p>Building Dreams, Creating Communities</p>
                </div>
            </div>
            {{--            <div class="col-12">--}}
            {{--                <div class="position-relative">--}}
            {{--                    <div class="row position-relative z-1 mb-5">--}}
            {{--                        <div class="col-md-4 border px-sm-0">--}}
            {{--                            <div class="position-relative small-card">--}}
            {{--                                <img class="lazy" data-src="{{asset('frontend/assets/images/projects/project1.svg')}}"--}}
            {{--                                     alt="">--}}
            {{--                                <div class="project-content">--}}
            {{--                                    <div class="project-inner-content">--}}
            {{--                                        <h4>Dwarka Expressway Projects</h4>--}}
            {{--                                        <p>64 Properties</p>--}}
            {{--                                    </div>--}}
            {{--                                </div>--}}
            {{--                            </div>--}}
            {{--                        </div>--}}
            {{--                        <div class="col-md-4 border px-sm-0">--}}
            {{--                            <div class="position-relative small-card">--}}
            {{--                                <img class="lazy" data-src="{{asset('frontend/assets/images/projects/project2.svg')}}"--}}
            {{--                                     alt="">--}}
            {{--                                <div class="project-content">--}}
            {{--                                    <div class="project-inner-content">--}}
            {{--                                        <h4>Golf Course Extension Road Projects</h4>--}}
            {{--                                        <p>62 Properties</p>--}}
            {{--                                    </div>--}}
            {{--                                </div>--}}
            {{--                            </div>--}}
            {{--                        </div>--}}
            {{--                        <div class="col-md-4 border px-sm-0">--}}
            {{--                            <div class="position-relative small-card">--}}
            {{--                                <img class="lazy" data-src="{{asset('frontend/assets/images/projects/project3.svg')}}"--}}
            {{--                                     alt="">--}}
            {{--                                <div class="project-content">--}}
            {{--                                    <div class="project-inner-content">--}}
            {{--                                        <h4>New Gurgaon (NH-8) Projects</h4>--}}
            {{--                                        <p>44 Properties</p>--}}
            {{--                                    </div>--}}
            {{--                                </div>--}}
            {{--                            </div>--}}
            {{--                        </div>--}}
            {{--                    </div>--}}
            {{--                    <div class="row position-relative z-1 mt-10">--}}
            {{--                        <div class="col-md-4 px-sm-0">--}}
            {{--                            <div class="position-relative small-card">--}}
            {{--                                <img class="lazy" data-src="{{asset('frontend/assets/images/projects/project4.svg')}}"--}}
            {{--                                     alt="">--}}
            {{--                                <div class="project-content">--}}
            {{--                                    <div class="project-inner-content">--}}
            {{--                                        <h4>Southern Peripheral Road Projects</h4>--}}
            {{--                                        <p>23 Properties</p>--}}
            {{--                                    </div>--}}
            {{--                                </div>--}}
            {{--                            </div>--}}
            {{--                        </div>--}}
            {{--                        <div class="col-md-4 px-sm-0">--}}
            {{--                            <div class="position-relative small-card">--}}
            {{--                                <img class="lazy" data-src="{{asset('frontend/assets/images/projects/project5.svg')}}"--}}
            {{--                                     alt="">--}}
            {{--                                <div class="project-content">--}}
            {{--                                    <div class="project-inner-content">--}}
            {{--                                        <h4>Dwarka Expressway Projects</h4>--}}
            {{--                                        <p>64 Properties</p>--}}
            {{--                                    </div>--}}
            {{--                                </div>--}}
            {{--                            </div>--}}
            {{--                        </div>--}}
            {{--                        <div class="col-md-4 px-sm-0">--}}
            {{--                            <div class="position-relative small-card">--}}
            {{--                                <img class="lazy" data-src="{{asset('frontend/assets/images/projects/project6.svg')}}"--}}
            {{--                                     alt="">--}}
            {{--                                <div class="project-content">--}}
            {{--                                    <div class="project-inner-content">--}}
            {{--                                        <h4>Dwarka Expressway Projects</h4>--}}
            {{--                                        <p>44 Properties</p>--}}
            {{--                                    </div>--}}
            {{--                                </div>--}}
            {{--                            </div>--}}
            {{--                        </div>--}}
            {{--                    </div>--}}
            {{--                    <div class="project-bg">--}}
            {{--                        <img src="{{asset('frontend/assets/images/projects/project-bg.svg')}}" class="w-100 "--}}
            {{--                             alt="">--}}
            {{--                    </div>--}}
            {{--                </div>--}}
            {{--            </div>--}}
        </div>
    </div>
</div>


<div class="properties mt-5">
    <div class="container">
        <div class="row">
            @if(count($CommercialProjects) > 0)
                <div class="col-12 px-sm-0">
                    <div class="d-flex align-items-end justify-content-between">
                        <div class="border-start border-2 border-black border-opacity-75 mt-5 ps-3">
                            <h1 class="text-uppercase main-heading">COMMERCIAL PROPERTIES</h1>
                            <p class="desc">View our featured properties</p>
                        </div>
                        <div>
                            <a href="{{route('projects')}}" class="btn view-btn">View All</a>
                        </div>
                    </div>
                </div>
                <div class="col-12 px-sm-0 my-5">
                    <div class="owl-carousel properties-carousel owl-theme">

                        @foreach($CommercialProjects as $project)
                            <div category="{{$project->category_id}}" class="item">
                                <div class="card border-transparent shadow p-0 bg-card">
                                    <div class="card-header position-relative p-0">
                                        <img
                                            data-src="{{!empty($project->images[0]) ? asset($project->images[0]->image) : 'https://via.placeholder.com/1000x1000'}}"
                                            class="w-100 h-220 lazy"
                                            alt="">
                                        <div class="card-inner-section">
                                            @if(!empty($project->getStatus))
                                                <p class="bg-yellow">{{$project->getStatus->title ?? ''}}</p>
                                            @endif
                                            <div class="d-flex">
                                                <button class="btn btn-heart me-2"><img
                                                        class="lazy"
                                                        data-src="{{asset('frontend/assets/images/heart.svg')}}"
                                                        alt="">
                                                </button>
                                                <button class="btn btn-heart"><i class="bi bi-plus-lg mt-0"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body p-0">
                                        <div
                                            class="d-flex justify-content-end border-bottom align-items-center border-black border-opacity-75 mx-3">
                                    <span><img data-src="{{asset('frontend/assets/images/sign.svg')}}" height="16"
                                               class="me-1 lazy" alt=""></span><span
                                                class="fw-500 fs-5">{{$project->price ?? '0'}} {{$project->price_type ?? ''}}. Onwards</span>
                                        </div>
                                        <div class="my-3 px-3">
                                            <h4 class="fw-500">{{$project->heading ?? ''}}</h4>
                                            <p class="desc min-48">{{$project->address ?? ''}}</p>
                                        </div>
                                        <a href="{{route('project.single',$project->slug)}}"
                                           class="text-decoration-none">
                                            <div class="bg-black px-3 d-flex justify-content-between py-2 mb-3">
                                                <p class="text-white mb-0">Details</p>
                                                <button class="btn p-0"><img
                                                        src="{{asset('frontend/assets/images/arrow-right.svg')}}"
                                                        class="arrow-width"
                                                        alt=""></button>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            @endif

            @if(count($ResidentialProjects) > 0)
                <div class="col-12 px-sm-0">
                    <div class="d-flex align-items-end justify-content-between">
                        <div class="border-start border-2 border-black border-opacity-75 mt-5 ps-3">
                            <h1 class="text-uppercase main-heading">RESIDENTIAL PROPERTIES</h1>
                            <p class="desc">View our featured properties</p>
                        </div>
                        <div>
                            <a href="{{route('projects')}}" class="btn view-btn">View All</a>
                        </div>
                    </div>
                </div>
                <div class="col-12 px-sm-0 my-5">
                    <div class="owl-carousel properties-carousel owl-theme">

                        @foreach($ResidentialProjects as $project)
                            <div category="{{$project->category_id}}" class="item">
                                <div class="card border-transparent shadow p-0 bg-card">
                                    <div class="card-header position-relative p-0">
                                        <img
                                            data-src="{{!empty($project->images[0]) ? asset($project->images[0]->image) : 'https://via.placeholder.com/1000x1000'}}"
                                            class="w-100 h-220 lazy"
                                            alt="">
                                        <div class="card-inner-section">
                                            @if(!empty($project->getStatus))
                                                <p class="bg-yellow">{{$project->getStatus->title ?? ''}}</p>
                                            @endif
                                            <div class="d-flex">
                                                <button class="btn btn-heart me-2"><img
                                                        class="lazy"
                                                        data-src="{{asset('frontend/assets/images/heart.svg')}}"
                                                        alt="">
                                                </button>
                                                <button class="btn btn-heart"><i class="bi bi-plus-lg mt-0"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body p-0">
                                        <div
                                            class="d-flex justify-content-end border-bottom align-items-center border-black border-opacity-75 mx-3">
                                    <span><img data-src="{{asset('frontend/assets/images/sign.svg')}}" height="16"
                                               class="me-1 lazy" alt=""></span><span
                                                class="fw-500 fs-5">{{$project->price ?? '0'}} {{$project->price_type ?? ''}}. Onwards</span>
                                        </div>
                                        <div class="my-3 px-3">
                                            <h4 class="fw-500">{{$project->heading ?? ''}}</h4>
                                            <p class="desc min-48">{{$project->address ?? ''}}</p>
                                        </div>
                                        <a href="{{route('project.single',$project->slug)}}"
                                           class="text-decoration-none">
                                            <div class="bg-black px-3 d-flex justify-content-between py-2 mb-3">
                                                <p class="text-white mb-0">Details</p>
                                                <button class="btn p-0"><img
                                                        src="{{asset('frontend/assets/images/arrow-right.svg')}}"
                                                        class="arrow-width"
                                                        alt=""></button>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            @endif

            <div class="col-12 mt-5">
                <div class="contact-section shadow">
                    <div class="contact-1">
                        <h5 class="fw-semibold-custom">We’re here to help you find a placeyou’ll love to live</h5>
                        <p>We are a real estate consultancy firm working in Gurugram & Delhi/NCR with a global
                            mindset,
                            bringing together exciting real estate developments and investment opportunities under
                            one
                            roof. All our services are delivered with professionalism and politeness.</p>
                        <p>Our aim is to make moving into and investing in the best Real estate in Delhi/NCR. We are
                            a
                            family of 150+ real estate consultants who are seamless, experienced, and are technology
                            driven looking after your interests even before you’ve signed up for our services.</p>
                        <p class="mb-0">Your new home is just a search away. Find out where your next property could
                            be.
                            Axiom Landbase can match you with a house you will want to call home.</p>
                    </div>
                    <div class="contact-2">
                        <img data-src="{{asset('frontend/assets/images/home.svg')}}" class="w-100 lazy" alt="">
                    </div>
                    <div class="contact-3">
                        <div
                            class="d-flex gap-3 align-items-center justify-content-between justify-content-start ps-0 ps-sm-2 py-4 border-bottom border-black border-opacity-50">
                            <img class="lazy" data-src="{{asset('frontend/assets/images/icon.svg')}}" width="30"
                                 alt="">
                            <p class="mb-0">24/7 Power Backup</p>
                        </div>
                        <div
                            class="d-flex gap-3 align-items-center justify-content-between justify-content-start ps-0 ps-sm-2 py-4 border-bottom border-black border-opacity-50">
                            <img class="lazy" data-src="{{asset('frontend/assets/images/icon2.svg')}}" width="30"
                                 alt="">
                            <p class="mb-0">Car Parking</p>
                        </div>
                        <div
                            class="d-flex gap-3 align-items-center justify-content-between justify-content-start ps-0 ps-sm-2 py-4 border-bottom border-black border-opacity-50">
                            <img class="lazy" data-src="{{asset('frontend/assets/images/icon3.svg')}}" width="30"
                                 alt="">
                            <p class="mb-0">Fire Extinguishers</p>
                        </div>
                        <div
                            class="d-flex gap-3 align-items-center justify-content-between justify-content-start ps-0 ps-sm-2 py-4">
                            <img class="lazy" data-src="{{asset('frontend/assets/images/icon4.svg')}}" width="30"
                                 alt="">
                            <p class="mb-0">Safety and Security</p>
                        </div>
                        <div>
                            <button class="btn btn-contact mt-4">
                                Contact Us
                            </button>
                        </div>
                    </div>
                    <div class="contact-bg">
                        <img class="lazy" data-src="{{asset('frontend/assets/images/conact-bg.svg')}}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{--<div class="sp-light" style="background-image: url({{asset('frontend/assets/images/sp-light.svg')}})">--}}
{{--    <div class="container">--}}
{{--        <div class="row">--}}
{{--            <div class="col-12">--}}
{{--                <h1 class="sp-heading">Projects in Spot-Light</h1>--}}
{{--            </div>--}}
{{--            <div class="col-12 px-sm-0 mt-5">--}}
{{--                <div class="owl-carousel sp-light-carousel owl-theme">--}}
{{--                    <div class="item">--}}
{{--                        <div class="card border-transparent p-0 bg-transparent">--}}
{{--                            <div class="sp-content">--}}
{{--                                <h4 class="fw-500 text-theme-light">Emaar EBD 75A</h4>--}}
{{--                                <p class="text-theme-soft-light">Emaar Business District 75A, A, Sector 75, Gurugram,--}}
{{--                                    Haryana 122004</p>--}}
{{--                            </div>--}}
{{--                            <div class="card-header position-relative p-0">--}}
{{--                                <img data-src="{{asset('frontend/assets/images/sp-light-item1.svg')}}"--}}
{{--                                     class="w-100 h-220 lazy"--}}
{{--                                     alt="">--}}
{{--                                <div class="card-inner-section">--}}
{{--                                    <p class="bg-yellow">Under Construction</p>--}}
{{--                                    <div class="d-flex">--}}
{{--                                        <button class="btn btn-heart me-2"><img--}}
{{--                                                class="lazy"--}}
{{--                                                data-src="{{asset('frontend/assets/images/heart.svg')}}"--}}
{{--                                                alt="">--}}
{{--                                        </button>--}}
{{--                                        <button class="btn btn-heart"><i class="bi bi-plus-lg mt-0"></i></button>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="card-body p-0">--}}
{{--                                <div--}}
{{--                                    class="d-flex justify-content-end border-bottom align-items-center border-white mb-2 border-opacity-75">--}}
{{--                                    <span><img data-src="{{asset('frontend/assets/images/sign-light.svg')}}" height="16"--}}
{{--                                               class="me-1 lazy"--}}
{{--                                               alt=""></span><span class="fw-500 fs-5 text-theme-light">6 Lakh per sq. yds</span>--}}
{{--                                </div>--}}
{{--                                <div class="bg-black px-3 d-flex justify-content-between py-2 mb-3">--}}
{{--                                    <p class="text-white mb-0">Details</p>--}}
{{--                                    <button class="btn p-0"><img--}}
{{--                                            src="{{asset('frontend/assets/images/arrow-right.svg')}}"--}}
{{--                                            class="arrow-width "--}}
{{--                                            alt=""></button>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="item">--}}
{{--                        <div class="card border-transparent p-0 bg-transparent">--}}
{{--                            <div class="sp-content">--}}
{{--                                <h4 class="fw-500 text-theme-light">Signature Global City 93</h4>--}}
{{--                                <p class="text-theme-soft-light">Sector 93, Gurugram, <br>Haryana, India</p>--}}
{{--                            </div>--}}
{{--                            <div class="card-header position-relative p-0">--}}
{{--                                <img data-src="{{asset('frontend/assets/images/sp-light-item2.svg')}}"--}}
{{--                                     class="w-100 h-220 lazy"--}}
{{--                                     alt="">--}}
{{--                                <div class="card-inner-section">--}}
{{--                                    <p class="bg-yellow">Under Construction</p>--}}
{{--                                    <div class="d-flex">--}}
{{--                                        <button class="btn btn-heart me-2"><img--}}
{{--                                                class="lazy"--}}
{{--                                                data-src="{{asset('frontend/assets/images/heart.svg')}}"--}}
{{--                                                alt="">--}}
{{--                                        </button>--}}
{{--                                        <button class="btn btn-heart"><i class="bi bi-plus-lg mt-0"></i></button>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="card-body p-0">--}}
{{--                                <div--}}
{{--                                    class="d-flex justify-content-end border-bottom align-items-center border-white mb-2 border-opacity-75">--}}
{{--                                    <span><img data-src="{{asset('frontend/assets/images/sign-light.svg')}}" height="16"--}}
{{--                                               class="me-1 lazy"--}}
{{--                                               alt=""></span><span class="fw-500 fs-5 text-theme-light">Rs.83.48 Lac Onwards*</span>--}}
{{--                                </div>--}}
{{--                                <div class="bg-black px-3 d-flex justify-content-between py-2 mb-3">--}}
{{--                                    <p class="text-white mb-0">Details</p>--}}
{{--                                    <button class="btn p-0"><img--}}
{{--                                            src="{{asset('frontend/assets/images/arrow-right.svg')}}"--}}
{{--                                            class="arrow-width "--}}
{{--                                            alt=""></button>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="item">--}}
{{--                        <div class="card border-transparent p-0 bg-transparent">--}}
{{--                            <div class="sp-content">--}}
{{--                                <h4 class="fw-500 text-theme-light">Emaar EBD 75A</h4>--}}
{{--                                <p class="text-theme-soft-light">Emaar Business District 75A, A, Sector 75, Gurugram,--}}
{{--                                    Haryana 122004</p>--}}
{{--                            </div>--}}
{{--                            <div class="card-header position-relative p-0">--}}
{{--                                <img data-src="{{asset('frontend/assets/images/sp-light-item1.svg')}}"--}}
{{--                                     class="w-100 h-220 lazy"--}}
{{--                                     alt="">--}}
{{--                                <div class="card-inner-section">--}}
{{--                                    <p class="bg-yellow">Under Construction</p>--}}
{{--                                    <div class="d-flex">--}}
{{--                                        <button class="btn btn-heart me-2"><img--}}
{{--                                                class="lazy"--}}
{{--                                                data-src="{{asset('frontend/assets/images/heart.svg')}}"--}}
{{--                                                alt="">--}}
{{--                                        </button>--}}
{{--                                        <button class="btn btn-heart"><i class="bi bi-plus-lg mt-0"></i></button>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="card-body p-0">--}}
{{--                                <div--}}
{{--                                    class="d-flex justify-content-end border-bottom align-items-center border-white mb-2 border-opacity-75">--}}
{{--                                    <span><img data-src="{{asset('frontend/assets/images/sign-light.svg')}}" height="16"--}}
{{--                                               class="me-1 lazy"--}}
{{--                                               alt=""></span><span class="fw-500 fs-5 text-theme-light">6 Lakh per sq. yds</span>--}}
{{--                                </div>--}}
{{--                                <div class="bg-black px-3 d-flex justify-content-between py-2 mb-3">--}}
{{--                                    <p class="text-white mb-0">Details</p>--}}
{{--                                    <button class="btn p-0"><img--}}
{{--                                            src="{{asset('frontend/assets/images/arrow-right.svg')}}"--}}
{{--                                            class="arrow-width "--}}
{{--                                            alt=""></button>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="item">--}}
{{--                        <div class="card border-transparent p-0 bg-transparent">--}}
{{--                            <div class="sp-content">--}}
{{--                                <h4 class="fw-500 text-theme-light">Signature Global City 93</h4>--}}
{{--                                <p class="text-theme-soft-light">Sector 93, Gurugram, <br>Haryana, India</p>--}}
{{--                            </div>--}}
{{--                            <div class="card-header position-relative p-0">--}}
{{--                                <img data-src="{{asset('frontend/assets/images/sp-light-item2.svg')}}"--}}
{{--                                     class="w-100 h-220 lazy"--}}
{{--                                     alt="">--}}
{{--                                <div class="card-inner-section">--}}
{{--                                    <p class="bg-yellow">Under Construction</p>--}}
{{--                                    <div class="d-flex">--}}
{{--                                        <button class="btn btn-heart me-2"><img--}}
{{--                                                class="lazy"--}}
{{--                                                data-src="{{asset('frontend/assets/images/heart.svg')}}"--}}
{{--                                                alt="">--}}
{{--                                        </button>--}}
{{--                                        <button class="btn btn-heart"><i class="bi bi-plus-lg mt-0"></i></button>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="card-body p-0">--}}
{{--                                <div--}}
{{--                                    class="d-flex justify-content-end border-bottom align-items-center border-white mb-2 border-opacity-75">--}}
{{--                                    <span><img data-src="{{asset('frontend/assets/images/sign-light.svg')}}" height="16"--}}
{{--                                               class="me-1 lazy"--}}
{{--                                               alt=""></span><span class="fw-500 fs-5 text-theme-light">Rs.83.48 Lac Onwards*</span>--}}
{{--                                </div>--}}
{{--                                <div class="bg-black px-3 d-flex justify-content-between py-2 mb-3">--}}
{{--                                    <p class="text-white mb-0">Details</p>--}}
{{--                                    <button class="btn p-0"><img--}}
{{--                                            src="{{asset('frontend/assets/images/arrow-right.svg')}}"--}}
{{--                                            class="arrow-width "--}}
{{--                                            alt=""></button>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
<div class="client-section" style="background-image: url({{asset('frontend/assets/images/client-bg.svg')}})">
    <div class="client-inner-section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div
                        class="text-center border-theme-light-left border-theme-light-right w-max-content px-4 mx-auto my-5">
                        <h1 class="text-theme-light">Our Happy</h1>
                        <p class="text-theme-light">Customers</p>
                    </div>
                </div>
                <div class="col-12">
                    <div class="client-slick-slider">
                        @if(count($testimonials) > 0)
                            @foreach($testimonials as $testimonial)
                                <div>
                                    <div class="px-2 mb-3">
                                        <div class="d-flex gap-3 align-items-center mb-3">
                                            <div class="img-theme"></div>
                                            <div>
                                                <h5 class="text-theme-light">{{$testimonial->heading ?? ''}}</h5>
                                                <p class="text-theme-light fs-14 mb-0">{{$testimonial->subheading ?? ''}}</p>
                                            </div>
                                        </div>
                                        <p class="text-theme-light">{{$testimonial->description ?? ''}}</p>
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
<div class="properties my-5">
    <div class="container">
        <div class="row">
            <div class="col-12 px-sm-0">
                <div class="d-flex align-items-end justify-content-between">
                    <div class="border-start border-2 border-black border-opacity-75 mt-5 ps-3">
                        <h1 class="text-uppercase main-heading">BLOGS</h1>
                        <p class="desc">View our featured properties</p>
                    </div>
                    <div>
                        <button class="btn view-btn">View All</button>
                    </div>
                </div>
            </div>
            <div class="col-12 px-sm-0 my-5">
                <div class="owl-carousel properties-carousel owl-theme">
                    @if(count($blogs) > 0)
                        @foreach($blogs as $blog)
                            <div class="item">
                                <div class="card border-transparent shadow p-0 bg-card">
                                    <div class="card-header position-relative p-0">
                                        <img
                                            data-src="{{!empty($blog->image) ? asset($blog->image) : 'https://via.placeholder.com/1000x1000'}}"
                                            class="w-100 h-220 lazy" alt="">
                                    </div>
                                    <div class="card-body p-0">
                                        <div
                                            class="d-flex justify-content-end border-bottom align-items-center border-black border-opacity-75">
                                            <span class="fw-500 my-2">{{$blog->created_at->format('M d, Y')}}</span>
                                        </div>
                                        <div class="my-3 px-3">
                                            <h5 class="fw-500 title-length">{{$blog->title ?? ''}}</h5>
                                        </div>
                                        <a href="{{route('blogs.single',$blog->slug)}}" class="text-decoration-none">
                                            <div class="bg-black px-3 d-flex justify-content-between py-2 mb-3">
                                                <p class="text-white mb-0">Details</p>
                                                <button type="button" class="btn p-0"><img
                                                        src="{{asset('frontend/assets/images/arrow-right.svg')}}"
                                                        class="arrow-width"
                                                        alt=""></button>
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
@include('frontend.includes.footer')
@include('frontend.includes.scripts')
<script>
    $(document).ready(function () {
        const cards = document.querySelectorAll('.title-length');
        let maxHeight = 0;
        // Loop through each card to find the maximum height
        cards.forEach(card => {
            const cardHeight = card.clientHeight;
            if (cardHeight > maxHeight) {
                maxHeight = cardHeight;
            }
        });
        cards.forEach(card => {
            card.style.height = `${maxHeight}px`;
        });
        let header = $('#header');
        let headerOffSet = header.offset().top;
        if ($(window).width() <= 992) {
            header.addClass('sticky-header');
            $('.main-slider-section').addClass('mt-110')
        } else {
            $(window).on('scroll', function () {
                let scrollPosition = $(window).scrollTop();
                if (scrollPosition >= headerOffSet) {
                    header.addClass('sticky-header');
                } else {
                    header.removeClass('sticky-header');
                }
            })
        }
    });
</script>
</body>
</html>
