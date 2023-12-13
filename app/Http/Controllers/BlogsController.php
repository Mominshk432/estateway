<?php

namespace App\Http\Controllers;

use App\Models\Blogs;
use App\Models\SeoSettings;
use Illuminate\Http\Request;

class BlogsController extends Controller
{
    public function blogs()
    {
        $blogs = Blogs::latest()->paginate(10);
        $recent_posts = Blogs::latest()->take(3)->get();
        $seo = SeoSettings::where('page', 'blogs')->first();
        return view('frontend.blogs', compact('blogs', 'recent_posts', 'seo'));
    }

    public function blog_single($blogSlug)
    {
        $blog = Blogs::where('slug', $blogSlug)->first();
        $otherBlogs = Blogs::latest()->get();
        return view('frontend.blog-single', compact('blog', 'otherBlogs'));
    }
}
