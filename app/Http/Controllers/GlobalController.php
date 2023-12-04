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
use App\Models\Project;
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
        return view('frontend.homepage', compact('banners', 'blogs', 'projects', 'testimonials'));
    }

    public function about()
    {
        $about_us = about_us::first();
        $director_message = about_us_director_message::first();
        $why_choose_us = about_us_why_choose_us::first();
        $our_moto = about_us_our_moto::first();
        return view('frontend.about_us', compact('about_us', 'director_message', 'why_choose_us', 'our_moto'));
    }

    public function contact()
    {
        $contact = Contact::first();
        return view('frontend.contact-us', compact('contact'));
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
}
