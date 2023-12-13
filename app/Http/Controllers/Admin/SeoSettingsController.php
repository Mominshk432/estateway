<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SeoSettings;
use Illuminate\Http\Request;

class SeoSettingsController extends Controller
{
    public function saveSeoSetting(Request $request)
    {
        $validated = $request->validate([
            'seo_title' => ['required'],
            'seo_keywords' => ['required'],
            'seo_description' => ['required']
        ]);

        if ($validated) {
            $exist = SeoSettings::where('page', $request->page)->first();
            if (!empty($exist)) {
                $exist->update([
                    'seo_title' => $request->seo_title,
                    'seo_keywords' => $request->seo_keywords,
                    'seo_description' => $request->seo_description
                ]);
            } else {
                $create = SeoSettings::create([
                    'seo_title' => $request->seo_title,
                    'seo_keywords' => $request->seo_keywords,
                    'seo_description' => $request->seo_description,
                    'page' => $request->page
                ]);
            }

            return json_encode([
                'error' => false,
                'message' => 'Seo settings updated successfully'
            ]);
        }
    }
}
