<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Project;
use App\Models\SeoSettings;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function projects(Request $request)
    {

        $projects = Project::query();
        if ($request->has('category')) {
            $category = Category::select('id')->where('slug', $request->category)->first();
            $projects->where('category_id', $category->id);
        }
        $categories = Category::latest()->get();
        $projects = $projects->latest()->paginate(10);
        $seo = SeoSettings::where('page', 'blogs')->first();
        return view('frontend.project_list', compact('projects', 'categories', 'seo'));
    }

    public function project_single($projectSlug)
    {
        $project = Project::where('slug', $projectSlug)->first();
        $otherProjects = Project::latest()->get();
        $seo = SeoSettings::where('page', 'blogs')->first();
        return view('frontend.project-single', compact('project', 'otherProjects', 'seo'));
    }


}
