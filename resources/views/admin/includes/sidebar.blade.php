<div class="leftside-menu">

    <!-- Brand Logo Light -->
    <a href="javascript:void(0)" class="logo logo-light">
                    <span class="logo-lg">
                        <img style="height: 55px" src="{{asset('logo.png')}}" alt="logo">
                    </span>
        <span class="logo-sm">
                        <img style="height: 21px;margin-left: -11px;" src="{{asset('logo.png')}}" alt="small logo">
                    </span>
    </a>

    <!-- Brand Logo Dark -->
    <a href="javascript:void(0)" class="logo logo-dark">
                    <span class="logo-lg">
                        <img style="height: 55px" src="{{asset('logo.png')}}" alt="dark logo">
                    </span>
        <span class="logo-sm">
                        <img style="height: 21px;  margin-left: -11px;" src="{{asset('logo.png')}}" alt="small logo">
                    </span>
    </a>

    <!-- Sidebar -left -->
    <div class="h-100" id="leftside-menu-container" data-simplebar>
        <!--- Sidemenu -->
        <ul class="side-nav">
            <li class="side-nav-item">
                <a href="{{route('admin.dashboard')}}" class="side-nav-link">
                    <i class="ri-dashboard-3-line"></i>
                    <span> Dashboard </span>
                </a>
            </li>
            <li class="side-nav-item">
                <a href="{{route('admin.about')}}" class="side-nav-link">
                    <i class="ri-information-line"></i>
                    <span> About Us </span>
                </a>
            </li>
            <li class="side-nav-item">
                <a href="{{route('admin.site_visits')}}" class="side-nav-link">
                    <i class="ri-map-2-fill"></i>
                    <span> Site Visits </span>
                </a>
            </li>
            <li class="side-nav-item">
                <a href="{{route('admin.footer_settings')}}" class="side-nav-link">
                    <i class="ri-settings-2-line"></i>
                    <span> Footer </span>
                </a>
            </li>
            <li class="side-nav-item">
                <a href="{{route('admin.contact_settings')}}" class="side-nav-link">
                    <i class="ri-settings-2-line"></i>
                    <span> Contact </span>
                </a>
            </li>
            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarPages" aria-expanded="false" aria-controls="sidebarPages"
                   class="side-nav-link">
                    <i class="ri-home-2-line"></i>
                    <span> Homepage </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarPages">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="{{route('admin.homepageSliderSettings')}}">Slider</a>
                        </li>
                        <li>
                            <a href="{{route('admin.testimonials')}}">Testimonials</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarPage" aria-expanded="false" aria-controls="sidebarPages"
                   class="side-nav-link">
                    <i class="ri-book-read-line"></i>
                    <span> Blogs </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarPage">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="{{route('admin.blogs.add')}}">Add</a>
                        </li>
                        <li>
                            <a href="{{route('admin.blogs.list')}}">List</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#projects" aria-expanded="false" aria-controls="sidebarPages"
                   class="side-nav-link">
                    <i class="ri-home-line"></i>
                    <span> Projects </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="projects">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="{{route('admin.category.list')}}">Category</a>
                        </li>
                        <li>
                            <a href="{{route('admin.project.add')}}">Add</a>
                        </li>
                        <li>
                            <a href="{{route('admin.project.list')}}">List</a>
                        </li>
                    </ul>
                </div>
            </li>

        </ul>
        <!--- End Sidemenu -->

        <div class="clearfix"></div>
    </div>
</div>
