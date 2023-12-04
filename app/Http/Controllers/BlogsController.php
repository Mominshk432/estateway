<?php

namespace App\Http\Controllers;

use App\Models\Blogs;
use Illuminate\Http\Request;

class BlogsController extends Controller
{
    public function blogs()
    {
        $blogs = Blogs::latest()->paginate(10);
        $recent_posts = Blogs::latest()->take(3)->get();
        return view('frontend.blogs', compact('blogs', 'recent_posts'));
    }

    public function blog_single($blogSlug)
    {
        $blog = Blogs::where('slug', $blogSlug)->first();
        $otherBlogs = Blogs::latest()->get();
        return view('frontend.blog-single', compact('blog', 'otherBlogs'));
    }
}
