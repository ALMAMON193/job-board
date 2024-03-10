<?php

namespace App\Http\Controllers\Font;

use App\Models\Category;
use App\Models\Job;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    //create a method
    public function Home()
    {
        $categories = Category::where('status', 1)->orderBy('name', 'ASC')->take(8)->get();
        $featuredJobs = Job::where('status', 1)
            ->where('isFeatured', 1)
            ->orderBy('created_at', 'DESC')
            ->take(6)
            ->get();

        $latestJobs = Job::where('status', 1)
            ->orderBy('created_at', 'DESC')
            ->take(6)->get();

        return view('Font.home', [
            'categories' => $categories,
            'featuredJobs' => $featuredJobs,
            'latestJobs' => $latestJobs,
        ]);
    }
}
