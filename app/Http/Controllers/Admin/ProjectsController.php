<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Project;
use App\Models\ProjectImages;
use Illuminate\Http\Request;

class ProjectsController extends Controller
{
    public function add()
    {
        $categories = Category::latest()->get();
        return view('admin.projects.add', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'heading' => ['required'],
            'address' => ['required'],
            'description' => ['required'],
            'highlights' => ['required'],
            'amenities' => ['required'],
            'category' => ['required'],
            'no_of_bedrooms' => ['required', 'integer'],
            'no_of_bathrooms' => ['required', 'integer'],
            'price' => ['required', 'integer'],
            'size' => ['required', 'integer'],
            'google_map' => ['required'],
            'image' => ['required'],
            'site_plan' => ['required']
        ]);
        if ($validated) {
            $store = Project::create([
                'heading' => $request->heading,
                'address' => $request->address,
                'description' => $request->description,
                'highlights' => $request->highlights,
                'amenities' => $request->amenities,
                'category_id' => $request->category,
                'no_of_bedrooms' => $request->no_of_bedrooms,
                'no_of_bathrooms' => $request->no_of_bathrooms,
                'price' => $request->price,
                'size' => $request->size,
                'google_map' => $request->google_map,
                'site_plan' => saveFiles($request->site_plan, 'project-site-plans'),
            ]);

            if ($request->has('image')) {
                foreach ($request->image as $img) {
                    $storeImgs = ProjectImages::create([
                        'project_id' => $store->id,
                        'image' => saveFiles($img, 'project-images')
                    ]);
                }
            }

            return json_encode([
                'error' => false,
                'message' => 'Project saved successfully'
            ]);
        }
    }

    public function list()
    {
        $projects = Project::latest()->get();
        return view('admin.projects.list', compact('projects'));
    }

    public function edit($slug)
    {
        $project = Project::where('slug', $slug)->first();
        $categories = Category::latest()->get();
        return view('admin.projects.edit', compact('project', 'categories'));
    }

    public function update(Request $request)
    {
        $project = Project::where('id', $request->id)->first();
        $images = [];
        $validated = $request->validate([
            'heading' => ['required'],
            'address' => ['required'],
            'description' => ['required'],
            'highlights' => ['required'],
            'amenities' => ['required'],
            'category' => ['required'],
            'no_of_bedrooms' => ['required', 'integer'],
            'no_of_bathrooms' => ['required', 'integer'],
            'price' => ['required', 'integer'],
            'size' => ['required', 'integer'],
            'google_map' => ['required'],
        ]);
        if ($request->has('oldImages')) {
            foreach ($request->oldImages as $oldImage) {
                $images[] = $oldImage;
            }
        }

        if ($request->has('image')) {
            foreach ($request->image as $img) {
                $images[] = saveFiles($img, 'project-images');
            }
        }

        if ($validated) {
            $data = [
                'heading' => $request->heading,
                'address' => $request->address,
                'description' => $request->description,
                'highlights' => $request->highlights,
                'amenities' => $request->amenities,
                'category_id' => $request->category,
                'no_of_bedrooms' => $request->no_of_bedrooms,
                'no_of_bathrooms' => $request->no_of_bathrooms,
                'price' => $request->price,
                'size' => $request->size,
                'google_map' => $request->google_map,
            ];
            if ($request->has('site_plan')) {
                $data['site_plan'] = saveFiles($request->site_plan, 'project-site-plans');
            }
            $store = Project::where('id', $request->id)->update($data);
            if (count($project->images) > 0) {
                $project->images->each(function ($value) {
                    $value->delete();
                });
            }
            if (count($images) > 0) {
                foreach ($images as $img) {
                    $storeImgs = ProjectImages::create([
                        'project_id' => $request->id,
                        'image' => $img
                    ]);
                }
            }
        }

        return json_encode([
            'error' => false,
            'message' => 'Project updated successfully'
        ]);
    }

    public function delete(Request $request)
    {
        $project = Project::where('id', $request->id)->first();
        if (count($project->images) > 0) {
            $project->images->each(function ($value) {
                $value->delete();
            });
        }
        $project->delete();

        return json_encode([
            'error' => false,
            'message' => 'Project deleted successfully'
        ]);
    }
}
