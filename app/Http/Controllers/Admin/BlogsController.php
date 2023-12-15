<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blogs;
use App\Models\SeoSettings;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BlogsController extends Controller
{
    public function add()
    {
        return view('admin.blogs.add');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => ['required'],
            'short_description' => ['required', 'max:200'],
            'content' => ['required'],
            'image' => ['required'],
            'seo_title' => ['required'],
            'seo_keywords' => ['required'],
            'seo_description' => ['required'],
        ]);

        if ($validated) {
            $create = Blogs::create([
                'title' => $request->title,
                'short_description' => $request->short_description,
                'content' => $request['content'],
                'image' => saveFiles($request->image, 'blog-images'),
                'seo_title' => $request->seo_title,
                'seo_keywords' => $request->seo_keywords,
                'seo_description' => $request->seo_description,
                'created_at' => !empty($request->timestamp) ? Carbon::parse($request->timestamp) : now()
            ]);


            return json_encode([
                'error' => false,
                'message' => 'Blog saved successfully'
            ]);
        }
    }

    public function list()
    {
        $blogs = Blogs::latest()->get();
        return view('admin.blogs.list', compact('blogs'));
    }

    public function edit($slug)
    {
        $blog = Blogs::where('slug', $slug)->first();
        return view('admin.blogs.edit', compact('blog'));
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'title' => ['required'],
            'short_description' => ['required', 'max:200'],
            'content' => ['required'],
            'seo_title' => ['required'],
            'seo_keywords' => ['required'],
            'seo_description' => ['required'],
            'slug' => ['required', 'unique:blogs,slug,"' . $request->id . '"'],
        ]);

        if ($validated) {
            $data = [
                'title' => $request->title,
                'short_description' => $request->short_description,
                'content' => $request['content'],
                'seo_title' => $request->seo_title,
                'seo_keywords' => $request->seo_keywords,
                'seo_description' => $request->seo_description,
                'slug' => $request->slug,
                'created_at' => !empty($request->timestamp) ? Carbon::parse($request->timestamp) : now()
            ];

            if ($request->has('image')) {
                $data['image'] = saveFiles($request->image, 'blog - images');
            }

            $update = Blogs::where('id', $request->id)->update($data);

            return json_encode([
                'error' => false,
                'message' => 'Blog updated successfully'
            ]);
        }
    }

    public function delete(Request $request)
    {
        $delete = Blogs::where('id', $request->id)->delete();
        return json_encode([
            'error' => false,
            'message' => 'Blog deleted successfully'
        ]);
    }

    public function getBlogPageSeoSettings()
    {
        $seoSetting = SeoSettings::where('page', 'blogs')->first();
        return view('admin.blogs.seo-settings', compact('seoSetting'));

    }
}
