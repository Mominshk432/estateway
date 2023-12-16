@extends('frontend.layout.layout')
@section('title')
    Projects
@endsection
@if(!empty($seo))
    @section('seo')
        <title>{{$seo->seo_title}}</title>
        <meta name="keywords" content="{{convertKeyword($seo->seo_keywords)}}">
        <meta name="description" content="{{ $seo->seo_description }}">
    @endsection
@endif
@section('body')
    <div class="project-main">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-5">
                    <div class="project-list-content">
                        <h1>Projects</h1>
                        <p>View what we have to offer you</p>
                    </div>
                </div>
                <div class="col-md-7">
                    <img data-src="{{asset('frontend/assets/images/banner-main.svg')}}" class="w-100 lazy" alt="">
                </div>
            </div>
        </div>

        <div class="project-listing">
            <ul class="project-section">
                <li>
                    <a href="{{route('projects')}}"
                       class="{{request('category') == null  ? 'active' : ''}}">All</a>
                </li>
                @if(count($categories) > 0)
                    @foreach($categories as $category)
                        <li>
                            <a href="{{route('projects',["category" => $category->slug])}}"
                               class="{{request('category') != null && request('category') == $category->slug ? 'active' : ''}}">{{$category->title ?? ''}}</a>
                        </li>
                    @endforeach
                @endif
                <li class="d-none d-sm-block">
                    <select aria-label="Default select example">
                        <option selected>Featured First</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                </li>
            </ul>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <select class="form-select theme-select" aria-label="Default select example">
                    <option selected>Featured First</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                </select>
            </div>
        </div>
    </div>
    @if(count($projects) > 0)
        @foreach($projects as $project)
            <div class="projects-content">
                <div class="container">
                    <div class="row align-items-center py-5">
                        <div class="col-md-4">
                            <div class="project-img">
                                <img class="lazy"
                                    data-src="{{!empty($project->images[0]->image)  ? asset($project->images[0]->image) : 'https://via.placeholder.com/1000x1000' }}"
                                    alt="">
                                <div class="project-absolute">
                                    @if(!empty($project->getStatus))
                                        <p class="bg-yellow">{{$project->getStatus->title ?? ''}}</p>
                                    @endif
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
                        <div class="col-md-8">
                            <div class="project-title">
                                <h5 class="my-2 my-md-0">{{$project->heading ?? ''}}</h5>
                                <h5 class="d-flex my-2 align-items-center gap-2 justify-content-end"><img
                                       class="lazy" data-src="{{asset('frontend/assets/images/sign.svg')}}" width="18" alt=""><span>{{$project->price ?? '0'}} . Onwards</span>
                                </h5>
                            </div>
                            <p class="desc my-3">{{$project->address ?? ''}}</p>
                            <div class="d-flex gap-3 my-3 flex-wrap">
                                <div class="d-flex gap-2">
                                    <img src="{{asset('frontend/assets/images/bed-room.svg')}}" width="20" alt="">
                                    <p class="desc mb-0">
                                        Bedrooms: {{$project->no_of_bedrooms ?? '0'}}
                                    </p>
                                </div>
                                <div class="d-flex gap-2">
                                    <img src="{{asset('frontend/assets/images/washroom.svg')}}" width="20" alt="">
                                    <p class="desc mb-0">
                                        Bathrooms: {{$project->no_of_bathrooms ?? '0'}}
                                    </p>
                                </div>
                                <div class="d-flex gap-2">
                                    <img src="{{asset('frontend/assets/images/square-fit.svg')}}" width="20" alt="">
                                    <p class="desc mb-0">
                                        {{$project->size ?? '0'}} sq.ft.
                                    </p>
                                </div>
                                @if(count($project->custom_specs) > 0)
                                    @foreach($project->custom_specs as $customSpec)
                                        <div class="d-flex gap-2">
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
                            <a href="{{route('project.single',$project->slug)}}" class="btn btn-black mt-4">
                                <span>Details</span>
                                <img src="{{asset('frontend/assets/images/arrow-right.svg')}}" width="30" alt="">
                            </a>
                        </div>
                    </div>

                </div>
            </div>
            <div class="project-bar py-3">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <span class="full-bar"></span>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    @endif
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="d-flex justify-content-center justify-content-sm-end my-5">
                    <div class="pagination">
                        {{ $projects->links('pagination') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
