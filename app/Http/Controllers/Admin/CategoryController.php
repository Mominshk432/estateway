<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class CategoryController extends Controller
{
    public function list()
    {
        $categories = Category::latest()->get();
        return view('admin.projects.category', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => ['required']
        ]);

        if ($validated) {
            $store = Category::create([
                'title' => $request->title
            ]);


            return json_encode([
                'error' => false,
                'message' => 'Category created successfully'
            ]);
        }
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'title' => ['required']
        ]);

        $update = Category::where('id', $request->id)->update([
            'title' => $request->title
        ]);


        return json_encode([
            'error' => false,
            'message' => 'Category updated successfully'
        ]);
    }

    public function delete(Request $request)
    {
        $delete = Category::where('id', $request->id)->delete();
        return json_encode([
            'error' => false,
            'message' => 'Category deleted successfully'
        ]);
    }
}
