<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use App\Models\Category\Category;
use App\Models\Job\Job;

use Illuminate\Http\Request;

class Categories extends Controller
{
    //
    public function categoriesListing(Request $request)
    {
        $name = $request->name;

        $jobs = Job::where('category', $name)->get();
        $totalJobs = $jobs->count();
        return view('categories.category', compact("jobs","name","totalJobs"));

    }
}
