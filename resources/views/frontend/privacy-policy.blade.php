@extends('frontend.layout.layout')
@section('title')
    Contact Us
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
                        <h1>Privacy policy</h1>
                    </div>
                </div>
                <div class="col-md-6">
                    <img src="{{asset('frontend/assets/images/contact-us-main.svg')}}" class="w-100" alt="">
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <p class="my-3">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium ad aliquid ea error in natus, nemo sint voluptas? Amet consequatur deleniti eaque fugiat harum id illo ipsam ipsum iste, laboriosam magnam nisi odio perferendis placeat provident quasi sequi! Accusamus adipisci animi autem consequuntur doloremque dolores ea eveniet facere id inventore labore laboriosam, laborum libero maiores natus non odio odit pariatur quam quo quod reiciendis repellat repellendus suscipit vitae voluptas voluptatem voluptates. At debitis dolore dolores odio. A accusantium adipisci aspernatur consequuntur, corporis cumque dolor dolorem error esse facere facilis harum ipsam laborum minima minus molestias natus nemo nobis obcaecati odit optio perferendis perspiciatis quam quo repellendus reprehenderit sint suscipit veniam voluptatibus voluptatum. Aliquid expedita ipsum magni, neque possimus recusandae veniam veritatis. Aut dolorem et eum exercitationem nesciunt similique tempora velit! Accusantium ad alias animi aperiam, blanditiis culpa dignissimos dolore ducimus excepturi expedita fuga fugit harum in incidunt magnam molestiae natus necessitatibus nostrum odio quae quam qui quia quisquam quo reiciendis repudiandae saepe sit, soluta tempora voluptatem. Ad architecto corporis dicta dignissimos eaque eos eum, fugit in itaque labore nemo pariatur praesentium sit tempora voluptas? Amet blanditiis deserunt, dicta expedita, explicabo incidunt laboriosam non praesentium quas, quidem soluta voluptatem. Maiores, non?</p>
                </div>
            </div>
        </div>
    </div>
@endsection
