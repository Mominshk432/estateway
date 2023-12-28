<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\Footer;
use App\Models\PrivacyPolicy;
use App\Models\SeoSettings;
use App\Models\Site_Visit;
use Illuminate\Http\Request;

class GlobalController extends Controller
{
    public function site_visits()
    {
        $visits = Site_Visit::latest()->get();
        return view('admin.site_visits', compact('visits'));
    }

    public function getFooterSettings()
    {
        $footer = Footer::first();
        return view('admin.footer-settings', compact('footer'));
    }

    public function saveFooterSettings(Request $request)
    {
        $update = Footer::where('id', $request->id)->update([
            'heading' => $request->heading,
            'description' => $request->description,
            'address' => $request->address,
            'phone' => $request->phone,
            'email' => $request->email,
            'f_link' => $request->f_link,
            't_link' => $request->t_link,
            'ig_link' => $request->ig_link,
        ]);

        return json_encode([
            'error' => false,
            'message' => 'Footer setings updated successfully'
        ]);
    }

    public function get_contact_setting()
    {
        $contact = Contact::first();
        $seoSetting = SeoSettings::where('page', 'contact')->first();
        return view('admin.contact_settings', compact('contact', 'seoSetting'));
    }

    public function save_contact_settings(Request $request)
    {

        $data = [
            'phone' => $request->phone,
            'another_phone' => $request->another_phone,
            'email' => $request->email,
            'address' => $request->address,
            'map_link' => $request->map_link,
        ];
        if ($request->has('image')) {
            $data['image'] = saveFiles($request->image, 'contact_page_images');
        }
        $update = Contact::where('id', $request->id)->update($data);

        return json_encode([
            'error' => false,
            'message' => 'Contact settings saved successfully'
        ]);
    }

    public function getPrivacyPolicySettings()
    {
        $settings = PrivacyPolicy::first();
        $seoSetting = SeoSettings::where('page', 'privacy-policy')->first();
        return view('admin.privacy-policy.privacy-policy-settings', compact('settings', 'seoSetting'));
    }

    public function updatePrivacyPolicy(Request $request)
    {
        $update = PrivacyPolicy::where('id', $request->id)->update([
            'heading' => $request->heading,
            'content' => $request['content']
        ]);

        return json_encode([
            'error' => false,
            'message' => 'Settings updated successfully'
        ]);
    }
}
