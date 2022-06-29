<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        return view('home');
    }

    public function why_us()
    {
        return view('why-us');
    }

    public function our_team()
    {
        return view('our-team');
    }

    public function analytics()
    {
        return view('analytics');
    }

    public function collaborate()
    {
        return view('collaborate');
    }

    public function listen_monitor()
    {
        return view('listen-monitor');
    }

    public function engage()
    {
        return view('engage');
    }

    public function great_reports()
    {
        return view('great-reports');
    }

    public function stopDashboard()
    {
        return view('stop-dashboard');
    }

    public function publish_scheduling()
    {
        return view('publish-scheduling');
    }

    public function pricing()
    {
        return view('pricing');
    }

    public function case_studies()
    {
        return view('case-studies');
    }

    public function privacyPolicy()
    {
        return view('privacy-policy');
    }

    public function termsAndConditions()
    {
        return view('terms-and-conditions');
    }
}
