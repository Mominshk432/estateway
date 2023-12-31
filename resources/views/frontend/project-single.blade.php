@extends('frontend.layout.layout')
@section('title')
    Project
@endsection
@if(!empty($seo))
    @section('seo')
        <title>{{$project->seo_title}}</title>
        <meta name="keywords" content="{{convertKeyword($project->seo_keywords)}}">
        <meta name="description" content="{{ $project->seo_description }}">
    @endsection
@endif
@section('body')

    <div class="mt-110">
        <div class="container project-detail-main"
             style="background-image: url({{asset('frontend/assets/images/project-details-banner.svg')}});">
            <div class="row align-items-center position-relative">
                <div class="col-md-6">
                    <div class="about-main-heading">
                        <h1 class="text-uppercase">{{$project->heading ?? ''}}</h1>
                        <p class="mb-0">{{$project->address ?? ''}}</p>

                    </div>
                </div>
                <div class="col-md-6">
                    <h5 class="badge-yellow ms-auto">
                        <img class="lazy" data-src="{{asset('frontend/assets/images/rupee-svgrepo-com.svg')}}"
                             width="24" alt="img">
                        <span>{{$project->price ?? '0'}} {{$project->price_type ?? ''}}. Onward</span>
                    </h5>
                </div>
            </div>
        </div>
    </div>
    <div class="container property-detail">
        <div class="row">
            <div class="col-12">
                <div class="row flex-column-reverse flex-lg-row">
                    <div class="col-lg-2">
                        <div class="d-block d-lg-flex left-slider">
                            <div class="slider-nav details-nav">
                                @if(count($project->images) > 0)
                                    @foreach($project->images as $image)
                                        <div><img
                                                data-src="{{!empty($image->image) ? asset($image->image) : 'https://via.placeholder.com/1000x1000'}}"
                                                class="slider-nav-img lazy"
                                                alt="Image 1">
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-10">
                        <div class="slider-for">
                            @if(count($project->images) > 0)
                                @foreach($project->images as $image)
                                    <div><img
                                            data-src="{{!empty($image->image) ? asset($image->image) : 'https://via.placeholder.com/1000x1000'}}"
                                            class="slider-img lazy" alt="Image 1">
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="my-2 my-sm-4 d-flex w-100 justify-content-between">
                    <div class="d-block d-md-flex align-items-center flex-wrap gap-3 gap-lg-5">
                        @if(!empty($project->getStatus))
                            <button class="btn btn-move">{{$project->getStatus->title ?? ''}}</button>
                        @endif
                        <div class="d-flex my-3 my-sm-0 gap-2 align-items-center">
                            <img src="{{asset('frontend/assets/images/bed-room.svg')}}" width="20" alt="">
                            <p class="desc mb-0">
                                Bedrooms: {{$project->no_of_bedrooms ?? '0'}}
                            </p>
                        </div>
                        <div class="d-flex my-3 my-sm-0 gap-2 align-items-center">
                            <img src="{{asset('frontend/assets/images/washroom.svg')}}" width="20" alt="">
                            <p class="desc mb-0">
                                Bathrooms: {{$project->no_of_bathrooms ?? '0'}}
                            </p>
                        </div>
                        <div class="d-flex my-3 my-sm-0 gap-2 align-items-center">
                            <img src="{{asset('frontend/assets/images/square-fit.svg')}}" width="20" alt="">
                            <p class="desc mb-0">
                                Size: {{$project->size ?? ''}} sq.ft.
                            </p>
                        </div>
                        @if(count($project->custom_specs) > 0)
                            @foreach($project->custom_specs as $customSpec)
                                <div class="d-flex my-3 my-sm-0 gap-2 align-items-center">
                                    <img style="width: 21px;
  height: 21px;
  object-fit: contain;"
                                         src="{{!empty($customSpec->icon) ? asset($customSpec->icon) : 'https://via.placeholder.com/1000x1000'}}"
                                         alt="">
                                    <p class="desc mb-0">
                                        {{$customSpec->title ?? ''}}: {{$customSpec->value ?? ''}}
                                    </p>
                                </div>
                            @endforeach
                        @endif
                    </div>
                    <div class="d-flex gap-3">
                        <button class="btn project-add">
                            <i class="bi bi-heart"></i>
                        </button>
                        <button class="btn project-add">
                            <i class="bi bi-plus-lg"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="property-text">
        <div class="container mt-md-4">
            <p>{!! $project->description !!}</p>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-12 location">
                    <h3 class="about-main-heading">Location</h3>
                    <iframe class="w-100"
                            src="{{$project->google_map ?? ''}}"
                            style="border:0;" allowfullscreen="img" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
                <div class="col-md-6 col-sm-12 location">
                    <h3 class="about-main-heading">Site</h3>
                    <img class="img-fluid"
                         src="{{!empty($project->site_plan) ? asset($project->site_plan) : 'https://via.placeholder.com/1000x1000'}}"
                         alt="img">
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-md-6 col-sm-12">
                    <div class="col-sm-12">
                        <h2 class="location main-heading about-main-heading">HIGHLIGHTS</h2>

                        @if(!empty($project->highlights))
                            {!! $project->highlights !!}
                        @endif

                    </div>
                    <div class="col-sm-12">
                        <h2 class="location main-heading about-main-heading mt-3">AMENITIES</h2>
                        @if(!empty($project->amenities))
                            {!! $project->amenities !!}
                        @endif

                    </div>
                </div>
                <div class="main-heading col-md-6 col-sm-10 ">
                    <div class="project_form rounded-3">
                        <h2 class="about-content_form text-white">Site Visit</h2>
                        <form id="site_visit_form">
                            @csrf
                            <input type="hidden" name="property_id" value="{{$project->id}}">
                            <div class="m-5">
                                <div class="form-group">
                                    <input autocomplete="off" required name="date_time" type="datetime-local"
                                           class="form-control"
                                           placeholder="Date">
                                </div>
                            </div>
                            <hr/>
                            <div class="m-5 form2">
                                <div class="form-group">
                                    <input autocomplete="off" required name="name" type="text" class="form-control"
                                           placeholder="Your Name">
                                </div>
                                <div class="form-group mt-3">
                                    <input autocomplete="off" required name="email" type="email" class="form-control"
                                           placeholder="Your Email">
                                </div>
                                <div class="form-group mt-3">
                                    <input autocomplete="off" required name="phone" type="number" class="form-control"
                                           placeholder="Phone No.">
                                </div>
                                <div class="form-group mt-3">
                                    <textarea autocomplete="off" required name="message" class="form-control" rows="3"
                                              placeholder="Message"></textarea>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="form-control btn btn-warning rounded-1 mt-2 submitBtn">
                                        Send Message
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="properties mt-5">
            <div class="container">
                <div class="row">
                    <div class="col-12 px-sm-0">
                        <div class="d-flex align-items-end justify-content-between">
                            <div class="border-start border-2 border-black border-opacity-75 mt-5 ps-3">
                                <h1 class="text-uppercase main-heading">OTHER PROJECTS</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 px-sm-0 my-5">
                        <div class="owl-carousel properties-carousel owl-theme">
                            @if(count($otherProjects) > 0)
                                @foreach($otherProjects as $otherProject)
                                    <div class="item">
                                        <div class="card border-transparent shadow p-0 bg-card">
                                            <div class="card-header position-relative p-0">
                                                <img data-src="{{!empty($otherProject->images[0]->image) ? asset($otherProject->images[0]->image) : 'https://via.placeholder.com/1000x1000
                                                '}}" class="w-100 h-220 lazy" alt="img">
                                                <div class="card-inner-section">
                                                    @if(!empty($project->getStatus))
                                                        <p class="bg-yellow">{{$project->getStatus->title ?? ''}}</p>
                                                    @endif
                                                    <div class="d-flex">
                                                        <button class="btn btn-heart me-2"><img
                                                                src="{{asset('frontend/assets/images/heart.svg')}}"
                                                                alt="img"></button>
                                                        <button class="btn btn-heart"><i class="bi bi-plus-lg mt-0"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-body p-0">
                                                <div
                                                    class="d-flex justify-content-end border-bottom align-items-center border-black border-opacity-75 mx-3">
                                        <span><img src="{{asset('frontend/assets/images/sign.svg')}}" height="16"
                                                   class="me-1"
                                                   alt="img"></span><span class="fw-500 fs-5">{{$otherProject->price ?? '0'}}. Onwards</span>
                                                </div>
                                                <div class="my-3 px-3">
                                                    <h4 class="fw-500 title-length">{{$otherProject->heading ?? ''}}</h4>
                                                    <p class="desc min-48">{{$otherProject->address ?? ''}}</p>
                                                </div>
                                                <a href="{{route('project.single',$otherProject->slug)}}"
                                                   class="text-decoration-none">
                                                    <div class="bg-black px-3 d-flex justify-content-between py-2 mb-3">
                                                        <p class="text-white mb-0">Details</p>
                                                        <button class="btn p-0"><img
                                                                src="{{asset('frontend/assets/images/arrow-right.svg')}}"
                                                                class="arrow-width" alt="img"></button>
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
@endsection
@section('custom-scripts')
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
            $('.toggle-btn').click(function () {
                $('.mobile-navigation').fadeIn();
            });
            $('.mobile-navigation-inner button').click(function () {
                $('.mobile-navigation').fadeOut();
            });
            $('.client-slick-slider').slick({
                dots: true,
                speed: 300,
                arrows: false,
                infinite: true,
                slidesToShow: 2,
                slidesToScroll: 1,
                autoplay: true,
                autoplaySpeed: 3000,
                responsive: [
                    {
                        breakpoint: 768,
                        settings: {
                            arrows: false,
                            slidesToShow: 2
                        }
                    },
                    {
                        breakpoint: 480,
                        settings: {
                            arrows: false,
                            slidesToShow: 1
                        }
                    }
                ]
            });
            let $spanElement = $(".owl-carousel .owl-prev span");
            let $newDivElement = $("<i>").addClass("bi bi-chevron-left");
            let $spanElementRight = $(".owl-carousel .owl-next span");
            let $newDivElementRight = $("<i>").addClass("bi bi-chevron-right");
            $spanElement.replaceWith($newDivElement);
            $spanElementRight.replaceWith($newDivElementRight);
        })
        $('.properties-carousel').owlCarousel({
            loop: true,
            margin: 30,
            nav: true,
            dots: false,
            responsive: {
                0: {
                    autoplay: true,
                    autoplayTimeout: 3000,
                    autoplayHoverPause: true,
                    center: true,
                    items: 1,
                    nav: false,
                },
                600: {
                    items: 2
                },
                1000: {
                    items: 3
                }
            }
        })
        $('.sp-light-carousel').owlCarousel({
            loop: true,
            margin: 30,
            nav: true,
            dots: false,
            responsive: {
                0: {
                    items: 1,
                    nav: false,
                },
                600: {
                    items: 2
                },
                1000: {
                    items: 3
                }
            }
        })

        $('.slider-for').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: false,
            fade: true,
            asNavFor: '.slider-nav'
        });
        $('.slider-nav').slick({
            slidesToShow: 2,
            slidesToScroll: 1,
            vertical: true,
            verticalSwiping: true,
            asNavFor: '.slider-for',
            dots: false,
            focusOnSelect: true,
            autoplay: true,
            autoplaySpeed: 3000,
            responsive: [
                {
                    breakpoint: 992,
                    settings: {
                        slidesToShow: 2,
                        arrows: false,
                        vertical: false,
                        verticalSwiping: false,
                        centerMode: true,
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        vertical: false,
                        verticalSwiping: false,
                        centerMode: true,
                        arrows: false,
                        slidesToShow: 1
                    }
                }
            ]
        });

        $('#site_visit_form').on("submit", function (e) {
            e.preventDefault()
            var form = $('#site_visit_form')[0];
            var formdata = new FormData(form);
            $('.submitBtn').html('<span class="me-2"><i class="fa fa-spinner fa-spin"></i></span> Processing');
            $('.submitBtn').prop('disabled', true);
            $.ajax({
                type: 'POST',
                url: '{{route('site.visit.post')}}',
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
