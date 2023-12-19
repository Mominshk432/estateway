<?php

namespace App\Http\Controllers;

use App\Models\about_us;
use App\Models\about_us_director_message;
use App\Models\about_us_our_moto;
use App\Models\about_us_why_choose_us;
use App\Models\Blogs;
use App\Models\Contact;
use App\Models\ContactedUsers;
use App\Models\HomepageSlider;
use App\Models\PrivacyPolicy;
use App\Models\Project;
use App\Models\SeoSettings;
use App\Models\Site_Visit;
use App\Models\Testimonial;
use Carbon\Carbon;
use Illuminate\Http\Request;

class GlobalController extends Controller
{
    public function homepage()
    {
        $banners = HomepageSlider::latest()->get();
        $blogs = Blogs::latest()->get();
        $projects = Project::latest()->get();
        $testimonials = Testimonial::latest()->get();
        $seo = SeoSettings::where('page', 'homepage')->first();
        return view('frontend.homepage', compact('banners', 'blogs', 'projects', 'testimonials', 'seo'));
    }

    public function about()
    {
        $about_us = about_us::first();
        $director_message = about_us_director_message::first();
        $why_choose_us = about_us_why_choose_us::first();
        $our_moto = about_us_our_moto::first();
        $seo = SeoSettings::where('page', 'about')->first();
        return view('frontend.about_us', compact('about_us', 'director_message', 'why_choose_us', 'our_moto', 'seo'));
    }

    public function contact()
    {
        $contact = Contact::first();
        $seo = SeoSettings::where('page', 'contact')->first();
        return view('frontend.contact-us', compact('contact', 'seo'));
    }

    public function contactPost(Request $request)
    {
        if ($request->captcha != $request->captcha_enter) {
            return json_encode([
                'error' => true,
                'message' => 'Incorrect Captcha'
            ]);
        }
        $create = ContactedUsers::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'message' => $request->message
        ]);

        return json_encode([
            'error' => false,
            'message' => 'Message has been sent successfully'
        ]);
    }

    public function storeSiteVisit(Request $request)
    {
        $store = Site_Visit::create([
            'property_id' => $request->property_id,
            'date_time' => Carbon::parse($request->date_time),
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'message' => $request->message,
        ]);

        return json_encode([
            'error' => false,
            'message' => 'Site visit confirmed.'
        ]);
    }

    public function global_search(Request $request)
    {
        $html = "";
        if (!empty($request->keyword)) {
            $projects = Project::where('heading', 'like', '%' . $request->keyword . '%')->get();
            foreach ($projects as $project) {
                $html .= ' <li class="list-group-item"><a href="' . route('project.single', $project->slug) . '" class="text-black text-decoration-none">' . $project->heading ?? "" . '</a></li>';
            }
        } else {
            $html = '<li class="list-group-item"><a href="javascript:void(0)" class="text-black text-decoration-none text-center">No records found!</a></li>';
        }

        return json_encode([
            'error' => false,
            'html' => $html
        ]);
    }

    public function sitemap()
    {
        $homepage = SeoSettings::where('page', 'homepage')->first();
        $about_page = SeoSettings::where('page', 'about')->first();
        $contact_page = SeoSettings::where('page', 'contact')->first();
        $blog_page = SeoSettings::where('page', 'blog')->first();
        $projects_page = SeoSettings::where('page', 'projects')->first();
        $blogs = Blogs::latest()->get();
        $projects = Project::latest()->get();
        return view('frontend.sitemap', compact('homepage', 'about_page', 'contact_page', 'blog_page', 'projects_page', 'blogs', 'projects'));
    }

    public function getPrivacyPolicy()
    {
        $privacy_policy = PrivacyPolicy::first();
        $seo = SeoSettings::where('page', 'privacy-policy')->first();
        return view('frontend.privacy-policy', compact('privacy_policy', 'seo'));
    }
}
