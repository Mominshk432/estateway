<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class TestimonialsController extends Controller
{
    public function testimonials()
    {
        $testimonials = Testimonial::latest()->get();
        return view('admin.testimonials.list', compact('testimonials'));
    }

    public function add(Request $request)
    {
        $create = Testimonial::create([
            'heading' => $request->heading,
            'subheading' => $request->subheading,
            'description' => $request->description
        ]);

        return json_encode([
            'error' => false,
            'message' => 'Testimonial stored successfully'
        ]);
    }

    public function update(Request $request)
    {
        $update = Testimonial::where('id', $request->id)->update([
            'heading' => $request->heading,
            'subheading' => $request->subheading,
            'description' => $request->description
        ]);

        return json_encode([
            'error' => false,
            'message' => 'Testimonial updated successfully'
        ]);
    }

    public function delete(Request $request)
    {
        $delete = Testimonial::where('id', $request->id)->delete();
        return json_encode([
            'error' => false,
            'message' => 'Testimonial deleted successfully'
        ]);
    }
}
