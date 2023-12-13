<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8"/>
    <title>Estateway - Sitemap</title>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport"/>
    <style type="text/css">
        body {
            background-color: #fff;
            font-family: "Roboto", "Helvetica", "Arial", sans-serif;
            margin: 0;
        }

        #top {

            background-color: #b1d1e8;
            font-size: 16px;
            padding-bottom: 40px;
        }

        nav {
            font-size: 24px;

            margin: 0px 30px 0px;
            border-bottom-left-radius: 6px;
            border-bottom-right-radius: 6px;
            background-color: #f3f3f3;
            color: #666;
            box-shadow: 0 10px 20px -12px rgba(0, 0, 0, 0.42), 0 3px 20px 0px rgba(0, 0, 0, 0.12), 0 8px 10px -5px rgba(0, 0, 0, 0.2);
            padding: 10px 0;
            text-align: center;
            z-index: 1;
        }

        h3 {
            margin: auto;
            padding: 10px;
            max-width: 600px;
            color: #666;
        }

        h3 span {
            float: right;
        }

        h3 a {
            font-weight: normal;
            display: block;
        }


        #cont {
            position: relative;
            border-radius: 6px;
            box-shadow: 0 16px 24px 2px rgba(0, 0, 0, 0.14), 0 6px 30px 5px rgba(0, 0, 0, 0.12), 0 8px 10px -5px rgba(0, 0, 0, 0.2);

            background: #f3f3f3;

            margin: -20px 30px 0px 30px;
            padding: 20px;
        }

        a:link,
        a:visited {
            color: #0180AF;
            text-decoration: underline;
        }

        a:hover {
            color: #666;
        }


        #footer {
            padding: 10px;
            text-align: center;
        }

        ul {
            margin: 0px;

            padding: 0px;
            list-style: none;
        }

        li {
            margin: 0px;
        }

        li ul {
            margin-left: 20px;
        }

        .lhead {
            background: #ddd;
            padding: 10px;
            margin: 10px 0px;
        }

        .lcount {
            padding: 0px 10px;
        }

        .lpage {
            border-bottom: #ddd 1px solid;
            padding: 5px;
        }

        .last-page {
            border: none;
        }

        .d-none {
            display: none;
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.7.1.js"
            integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
</head>

<body>
<div id="top">
    <nav>Estateway - Sitemap</nav>
</div>
<div id="cont">
    <ul class="level-0">


        <li class="lpage"><a href="{{route('homepage')}}"
                             title="{{$homepage->seo_title ?? 'homepage'}}">{{$homepage->seo_title ?? 'homepage'}}</a>
        </li>

        <li class="lpage"><a href="{{route('about')}}"
                             title="{{$about_page->seo_title ?? 'about'}}">{{$about_page->seo_title ?? 'about'}}</a>
        </li>
        <li class="lpage"><a href="{{route('contact')}}"
                             title="{{$contact_page->seo_title ?? 'contact'}}">{{$contact_page->seo_title ?? 'contact'}}</a>
        </li>
        <li class="lpage"><a href="{{route('blogs')}}"
                             title="{{$blog_page->seo_title ?? 'blogs'}}">{{$blog_page->seo_title ?? 'blogs'}}</a>
        </li>
        <li class="lpage"><a href="{{route('projects')}}"
                             title="{{$projects_page->seo_title ?? 'projects'}}">{{$projects_page->seo_title ?? 'projects'}}</a>
        </li>

        <li>
            <ul class="level-1">

                <li onclick="$(this).siblings().toggleClass('d-none')" class="lhead">Blogs</li>
                @if(count($blogs) > 0)
                    @foreach($blogs as $blog)
                        <li class="lpage d-none"><a
                                href="{{route('blogs.single',$blog->slug)}}"
                                title="{{$blog->seo_title ?? ''}}">{{$blog->seo_title ?? ''}}</a>
                        </li>
                    @endforeach
                @endif
            </ul>
            <ul class="level-1">

                <li onclick="$(this).siblings().toggleClass('d-none')" class="lhead">Projects</li>
                @if(count($projects) > 0)
                    @foreach($projects as $project)
                        <li class="lpage d-none"><a
                                href="{{route('project.single',$project->slug)}}"
                                title="{{$project->seo_title ?? ''}}">{{$project->seo_title ?? ''}}</a>
                        </li>
                    @endforeach
                @endif
            </ul>
        </li>
    </ul>
    <!--
Please note:
You are not allowed to remove the copyright notice below.
Thank you!
www.xml-sitemaps.com
-->
</div>

</body>

</html>
