@php
    $footer = \App\Models\Footer::first();
@endphp
<div class="mobile-navigation">
    <div class="mobile-navigation-inner">
        <button class="btn border-white ms-auto mt-4">
            <i class="bi bi-arrow-right text-white fs-5"></i>
        </button>
        <ul>
            <li><a href="{{route('homepage')}}">Home</a></li>
            <li><a href="{{route('about')}}">About Us</a></li>
            <li><a href="{{route('projects')}}">Projects</a></li>
            <li><a href="{{route('blogs')}}">Blogs</a></li>
            <li><a href="{{route('contact')}}">Contact</a></li>
        </ul>
        <div class="d-flex gap-4 align-items-center justify-content-end mt-5 mt-md-0">
            <a href="{{$footer->f_link ?? 'javascript:void(0)'}}" class="btn btn-social-icon"><i
                    class="bi bi-facebook"></i></a>
            <a href="{{$footer->ig_link ?? 'javascript:void(0)'}}" class="btn btn-social-icon"><i
                    class="bi bi-instagram"></i></a>
            <a href="{{$footer->t_link ?? 'javascript:void(0)'}}" class="btn btn-social-icon"><i class="bi bi-twitter"></i></a>
        </div>
    </div>
</div>
