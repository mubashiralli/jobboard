<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job\Job;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
   

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $jobs = Job::orderby('id', 'desc')->take(5)->get();
        ;
        $totalJobs = Job::all()->count();
        return view('home', compact('jobs', 'totalJobs'));
    }
}
