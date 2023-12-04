<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Site_Visit;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function getDashboard()
    {
        $total_projects = Project::count();
        $total_site_visits = Site_Visit::count();
        $site_visits_this_month = Site_Visit::whereMonth('created_at', now())->count();
        $projects = Project::latest()->get();
        return view('admin.dashboard', compact('total_projects', 'total_site_visits', 'site_visits_this_month', 'projects'));
    }
}
