<div id="header">
        <div class="container">
            <nav class="navbar navbar-expand-lg">
                <div class="container-fluid">
                    <a class="navbar-brand main-logo" href="{{route('homepage')}}"><img src="{{asset('frontend/assets/images/logo.svg')}}"
                                                                                        alt=""></a>
                    <div class="d-flex align-items-center gap-2">
                        <button class="btn border border-white d-block d-lg-none search-btn-mob">
                            <img src="{{asset('frontend/assets/images/sreach-bar.svg')}}" width="18" alt="">
                        </button>
                        <button class="navbar-toggler toggle-btn" type="button">
                            <i class="bi bi-list"></i>
                        </button>
                    </div>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <form action="#" class="w-100 search-sec d-none position-relative">
                            <input type="search" class="form-control w-75 ms-auto py-2 search-box" placeholder="search here...">
                            <div class="search-menu d-none w-75 end-0 position-absolute top-100">
                                <ul class="list-group">
                                    <li class="list-group-item"><a href="#" class="text-black text-decoration-none">An item</a></li>
                                    <li class="list-group-item"><a href="#" class="text-black text-decoration-none">An item</a></li>
                                    <li class="list-group-item"><a href="#" class="text-black text-decoration-none">An item</a></li>
                                    <li class="list-group-item"><a href="#" class="text-black text-decoration-none">An item</a></li>
                                    <li class="list-group-item"><a href="#" class="text-black text-decoration-none">An item</a></li>
                                </ul>
                            </div>
                        </form>
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0 mt-lg-3 header-nav top-navigation">
                            <li class="nav-item">
                                <a class="nav-link {{request()->routeIs('homepage') ? 'active' : ''}}" aria-current="page"
                                   href="{{route('homepage')}}">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{request()->routeIs('about') ? 'active' : ''}}" aria-current="page"
                                   href="{{route('about')}}">About us</a>
                            </li>
                            <li class="nav-item project-link">
                                <a class="nav-link text-center {{request()->routeIs('projects') ? 'active' : ''}}"
                                   aria-current="page" href="{{route('projects')}}"><p
                                        class="mb-0">Projects</p><img
                                        src="{{asset('frontend/assets/images/dropdown.png')}}" height="14" width="14"
                                        alt=""></a>
                                <div class="dropdown-project">
                                    @php
                                        $categories = \App\Models\Category::latest()->get();
                                    @endphp
                                    <ul>
                                        @if(count($categories) > 0)
                                            @foreach($categories as $category)
                                                <li>
                                                    <a href="{{route('projects',["category" => $category->slug])}}">{{$category->title ?? ''}}</a>
                                                </li>
                                            @endforeach
                                        @endif
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{request()->routeIs('blogs') ? 'active' : ''}}" aria-current="page"
                                   href="{{route('blogs')}}">Blogs</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{request()->routeIs('contact') ? 'active' : ''}}" aria-current="page"
                                   href="{{route('contact')}}">Contact</a>
                            </li>
                        </ul>
                    </div>
                    <div class="search-section">
                        <button class="btn search-btn">
                            <img src="{{asset('frontend/assets/images/sreach-bar.svg')}}" width="22" alt="">
                        </button>
                    </div>
                </div>
            </nav>
        </div>
    <form action="#" class="search-sec-mob d-none mt-3 position-relative">
        <input type="search" class="form-control py-2 search-box" placeholder="search here...">
        <div class="search-menu d-none">
            <ul class="list-group">
                <li class="list-group-item"><a href="#" class="text-black text-decoration-none">An item</a></li>
                <li class="list-group-item"><a href="#" class="text-black text-decoration-none">An item</a></li>
                <li class="list-group-item"><a href="#" class="text-black text-decoration-none">An item</a></li>
                <li class="list-group-item"><a href="#" class="text-black text-decoration-none">An item</a></li>
                <li class="list-group-item"><a href="#" class="text-black text-decoration-none">An item</a></li>
            </ul>
        </div>
    </form>
    </div>

