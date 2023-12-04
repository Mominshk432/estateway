<script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="{{asset('frontend/assets/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('frontend/assets/js/owl.carousel.min.js')}}"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<script src="{{asset('admin/assets/vendor/growl/jquery.growl.js')}}" type="text/javascript"></script>
<script>
    $(document).ready(function () {
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
</script>
