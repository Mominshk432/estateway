<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HomepageSlider;
use Illuminate\Http\Request;

class HomepageController extends Controller
{
    public function getSliderSettings()
    {
        $sliders = HomepageSlider::latest()->get();
        return view('admin.homepage.slider-settings', compact('sliders'));
    }

    public function storeSlider(Request $request)
    {
        $validated = $request->validate([
            'image' => ['required', 'image']
        ]);

        if ($validated) {
            $store = HomepageSlider::create([
                'heading' => $request->heading,
                'description' => $request->description,
                'image' => saveFiles($request->image, 'homepage-slider-images')
            ]);

            return json_encode([
                'error' => false,
                'message' => 'Setting saved successfully'
            ]);
        }
    }

    public function updateSlider(Request $request)
    {
        $data = [
            'heading' => $request->heading,
            'description' => $request->description,
        ];

        if ($request->has('image')) {
            $data['image'] = saveFiles($request->image, 'homepage-slider-images');
        }

        $update = HomepageSlider::where('id', $request->id)->update($data);

        return json_encode([
            'error' => false,
            'message' => 'Settings updated successfully'
        ]);
    }

    public function deleteSlider(Request $request)
    {
        $delete = HomepageSlider::where('id', $request->id)->delete();
        return json_encode([
            'error' => false,
            'message' => 'Slider deleted successfully'
        ]);
    }
}
