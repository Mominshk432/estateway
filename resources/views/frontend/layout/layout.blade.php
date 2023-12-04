<!doctype html>
<html lang="en">
@php
    $footer = \App\Models\Footer::first();
@endphp
@include('frontend.includes.head')

<body>
@include('frontend.includes.mobile-nav')

@include('frontend.includes.header')
<!--about us-->
@yield('body')
@include('frontend.includes.footer')
@include('frontend.includes.scripts')
@yield('custom-scripts')
</body>
</html>
