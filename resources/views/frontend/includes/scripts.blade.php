<script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="{{asset('frontend/assets/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('frontend/assets/js/owl.carousel.min.js')}}"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<script src="{{asset('admin/assets/vendor/growl/jquery.growl.js')}}" type="text/javascript"></script>
<!-- cdnjs -->
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery.lazy/1.7.10/jquery.lazy.min.js"></script>
<script type="text/javascript"
        src="//cdnjs.cloudflare.com/ajax/libs/jquery.lazy/1.7.10/jquery.lazy.plugins.min.js"></script>


<script>
    $(document).ready(function () {
        $(function ($) {
            $("img.lazy").Lazy();
            console.log('loading lazy');
        });
        $('.toggle-btn').click(function () {
            $('.mobile-navigation').fadeIn();
        });
        $('.mobile-navigation-inner button').click(function () {
            $('.mobile-navigation').fadeOut();
        });
        $('.main-slick-slider').slick({
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
                        slidesToShow: 1
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
    $('.search-btn').on('click', function () {
        const navigation = $('.top-navigation');
        const search = $('.search-sec');
        if (search.hasClass("d-none")) {
            navigation.addClass('d-none');
            search.removeClass('d-none')
        } else {
            navigation.removeClass('d-none');
            search.addClass('d-none')
        }
    })
    $('.search-btn-mob').on('click', function () {

        if ($('.search-sec-mob').hasClass('d-none')) {
            $('.search-sec-mob').removeClass('d-none')
        } else {
            $('.search-sec-mob').addClass('d-none')
        }
    })
    $('#search_input').on("keyup", function () {
        var keyword = $(this).val();
        if (keyword != '') {
            $(this).next().removeClass('d-none');
        } else {
            $(this).next().addClass('d-none');
        }
        $.ajax({
            type: 'POST',
            url: '{{route('global.search')}}',
            dataType: 'json',
            data: {
                keyword: keyword,
                _token: '{{csrf_token()}}'
            },
            success: function (res) {
                if (res.error == false) {
                    $('#append_search_results').html(res.html);
                }

            },
            error: function (e) {


            }

        });
    });
</script>
