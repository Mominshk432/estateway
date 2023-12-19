@php
    $footer = \App\Models\Footer::first();
@endphp
<div class="footer">
    <div class="container position-relative">
        <div class="row border-bottom border-light-theme pb-5 position-relative z-2">
            <div class="col-md-7 mb-3 mb-md-0">
                <h4 class="text-theme-light fw-semibold-custom ls-2">{{$footer->heading ?? ''}}</h4>
                <p class="footer-desc mt-md-5">{{$footer->description ?? ''}}
                </p>
            </div>
            <div class="col-md-5">
                <h4 class="text-theme-light border-theme-light-left ps-3 ls-2">CONTACT</h4>
                <div class="mt-4 mt-md-5">
                    <div class="d-flex align-items-start gap-2 mb-3">
                        <img src="{{asset('frontend/assets/images/loction.svg')}}" alt="" width="20">
                        <p class="mb-0 text-theme-light">{{$footer->address ?? ''}}
                        </p>
                    </div>
                    <div class="d-flex align-items-start gap-2 mb-3">
                        <img src="{{asset('frontend/assets/images/phone.svg')}}" alt="" width="20">
                        <p class="mb-0 text-theme-light">{{$footer->phone ?? ''}}</p>
                    </div>
                    <div class="d-flex align-items-start gap-2 mb-3">
                        <img src="{{asset('frontend/assets/images/mail.svg')}}" alt="" width="20">
                        <p class="mb-0 text-theme-light">{{$footer->email ?? ''}}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row py-3 align-items-center position-relative z-2 flex-column-reverse flex-md-row">
            <div class="col-md-7">
                <p class="text-theme-light mb-0 text-center text-md-start mt-3 mt-md-0"><span class="pe-2">Copyright &copy; 2023</span>
                    <span class="d-none text-theme-light d-md-inline-flex ps-2 border-theme-light-left"><a
                                href="{{route('getPrivacyPolicy')}}"
                                class="text-decoration-none text-theme-light">Privacy Policy</a></span></p>
            </div>
            <div class="col-md-5">
                <div class="d-flex gap-4 justify-content-evenly justify-content-md-start">
                    <div>
                        <a href="{{$footer->f_link ?? 'javascript:void(0)'}}" class="btn footer-links"><img
                                    src="{{asset('frontend/assets/images/fb-icon.svg')}}"
                                    class="footer-links-img" alt=""></a>
                    </div>
                    <div>
                        <a href="{{$footer->ig_link ?? 'javascript:void(0)'}}" class="btn footer-links"><img
                                    src="{{asset('frontend/assets/images/insta-icon.svg')}}"
                                    class="footer-links-img" alt=""></a>
                    </div>
                    <div>
                        <a href="{{$footer->t_link ?? 'javascript:void(0)'}}" class="btn footer-links"><img
                                    src="{{asset('frontend/assets/images/twitter-icon.svg')}}"
                                    class="footer-links-img" alt=""></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bg">
            <img src="{{asset('frontend/assets/images/footer-bg.svg')}}" alt="">
        </div>
    </div>
</div>
