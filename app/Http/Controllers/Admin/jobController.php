<?php

namespace App\Http\Controllers\Admin;

use App\Models\JobType;
use App\Models\Category;
use App\Models\Job;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class jobController extends Controller
{
    public function index()
    {
        $categories = Category::where('status', 1)->orderBy('name', 'ASC')->get();
        $job_types = JobType::where('status', 1)->orderBy('name', 'ASC')->get();

        $jobs = Job::where('status', 1)
            ->orderBy('created_at', 'DESC')->paginate(10);
        return view('admin.job.view-job', [
            'categories' => $categories,
            'job_types' => $job_types,
            'jobs' => $jobs,
        ]);
    }
}
