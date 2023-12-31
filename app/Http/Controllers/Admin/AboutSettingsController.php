<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\about_us;
use App\Models\about_us_director_message;
use App\Models\about_us_our_moto;
use App\Models\about_us_why_choose_us;
use App\Models\SeoSettings;
use Illuminate\Http\Request;

class AboutSettingsController extends Controller
{
    public function aboutSettings()
    {
        $about_us = about_us::first();
        $director_message = about_us_director_message::first();
        $why_choose_us = about_us_why_choose_us::first();
        $our_moto = about_us_our_moto::first();
        $seoSetting = SeoSettings::where('page', 'about')->first();
        return view('admin.about-settings', compact('about_us', 'director_message', 'why_choose_us', 'our_moto','seoSetting'));
    }

    public function update_about_us(Request $request)
    {

        $validated = $request->validate([
            'description' => ['required'],
            'about_heading' => ['required'],
            'about_subheading' => ['required']
        ]);

        if ($validated) {
            $update = about_us::where('id', $request->id)->update([
                'description' => $request->description,
                'heading' => $request->about_heading,
                'subheading' => $request->about_subheading
            ]);

            return json_encode([
                'error' => false,
                'message' => 'Settings updated successfully'
            ]);
        }
    }

    public function update_director_message(Request $request)
    {
        $validated = $request->validate([
            'heading' => ['required'],
            'subheading' => ['required'],
            'description' => ['required'],
            'director_section_heading' => ['required']
        ]);

        $data = [
            'heading' => $request->heading,
            'subheading' => $request->subheading,
            'description' => $request->description,
            'section_heading' => $request->director_section_heading
        ];

        if ($request->has('image')) {
            $data['image'] = saveFiles($request->image, 'homepage-images');
        }

        $update = about_us_director_message::where('id', $request->id)->update($data);

        return json_encode([
            'error' => false,
            'message' => 'Settings updated successfully'
        ]);
    }

    public function update_why_choose_us(Request $request)
    {
        $data = [
            'heading_1' => $request->heading1,
            'content_1' => $request->content1,
            'heading_2' => $request->heading2,
            'content_2' => $request->content2,
            'heading_3' => $request->heading3,
            'content_3' => $request->content3,
            'heading_4' => $request->heading4,
            'content_4' => $request->content4,
            'main_heading' => $request->main_heading,
            'main_subheading' => $request->main_subheading
        ];

        if ($request->has('image')) {
            $data['image'] = saveFiles($request->image, 'about-images');
        }
        $update = about_us_why_choose_us::where('id', $request->id)->update($data);

        return json_encode([
            'error' => false,
            'message' => 'Settings updated successfully'
        ]);
    }

    public function update_our_moto(Request $request)
    {
        $data = [
            'heading_1' => $request->heading1,
            'content_1' => $request->content1,
            'heading_2' => $request->heading2,
            'content_2' => $request->content2,
            'heading_3' => $request->heading3,
            'content_3' => $request->content3,
        ];

        $update = about_us_our_moto::where('id', $request->id)->update($data);

        return json_encode([
            'error' => false,
            'message' => 'Settings updated successfully'
        ]);
    }
}
