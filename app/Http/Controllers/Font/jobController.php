<?php

namespace App\Http\Controllers\Font;

use App\Models\JobType;
use App\Models\Category;
use App\Models\Job;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class jobController extends Controller
{
    public function CreateJob()
    {
        $categories = Category::orderBy('name', 'ASC')->where('status', 1)->get();
        $job_type = JobType::orderBy('name', 'ASC')->where('status', 1)->get();
        return view('Font.Job.job-post', [
            'categories' => $categories,
            'job_type' => $job_type

        ]);
    }

    public function storeJob(Request $request)
    {
        // Validation rules
        $rules = [
            'title' => 'required|string|max:255',
            'category' => 'required|exists:categories,id',
            'job_type_id' => 'required|exists:job_types,id',
            'vacancy' => 'required|integer|min:1',
            'salary' => 'required|integer',
            'location' => 'required|string|max:255',
            'experience' => 'required|string|max:255',
            'description' => 'required|string',
            'qualifications' => 'required|string',
            'benefits' => 'required|string',
            'responsibility' => 'required|string',
            'keywords' => 'required|string',
            'company_name' => 'required|string|max:255',
            'company_location' => 'required|string|max:255',
            'company_website' => 'required|string',


        ];

        $messages = [
            'category.exists' => 'The selected category is invalid.',
            'job_type_id.exists' => 'The selected job type is invalid.',
        ];

        // Validate the request
        $validatedData = $request->validate($rules, $messages);

        // Create a new job instance
        $job = new Job();
        $job->title = $validatedData['title'];
        $job->category_id = $validatedData['category'];
        $job->job_type_id = $validatedData['job_type_id'];
        $job->user_id = Auth::user()->id;
        $job->vacancy = $validatedData['vacancy'];
        $job->salary = $validatedData['salary'];
        $job->location = $validatedData['location'];
        $job->experience = $validatedData['experience'];
        $job->description = $validatedData['description'];
        $job->qualifications = $validatedData['qualifications'];
        $job->benefits = $validatedData['benefits'];
        $job->responsibility = $validatedData['responsibility'];

        $job->keywords = $validatedData['keywords'];
        $job->company_name = $validatedData['company_name'];
        $job->company_location = $validatedData['company_location'];
        $job->company_website = $validatedData['company_website'];

        // Save the job
        $job->save();

        // Redirect back with success message
        return redirect()->back()->with('success', 'Job posted successfully!');
    }

    public function MyJob()
    {
        $jobs = Job::where('user_id', Auth::user()->id)
            ->with('jobType')
            ->paginate(10);
        return view('Font.Job.my-job', [
            'jobs' => $jobs

        ]);
    }
    // public function editJob($id)
    // {
    //     $data['editJob'] = Job::find($id);
    //     return view('Font.Job.edit-job', $data);
    // }

    // public function UpdateJob(Request $request, $id)
    // {
    //     $validatedData = $request->validate([
    //         'title' => 'required|string|max:255',
    //         'job_type_id' => 'required|exists:job_types,id',
    //         'location' => 'required|string|max:255',
    //         'experience' => 'required|string|max:255',
    //         'description' => 'required|string',
    //         'qualifications' => 'required|string',
    //         'benefits' => 'required|string',
    //         'salary' => 'required|string|max:255',
    //         'company_name' => 'required|string|max:255',
    //         'company_website' => 'required|string|max:255'
    //     ]);

    //     $job = Job::find($id);

    //     return redirect()->route('my-job')->with('success', 'Job updated successfully!');
    // }


    public function FindJobs()
    {
        $categories = Category::where('status', 1)->orderBy('name', 'ASC')->get();
        $job_types = JobType::where('status', 1)->orderBy('name', 'ASC')->get();

        $jobs = Job::where('status', 1)
            ->orderBy('created_at', 'DESC')->paginate(10);

        return view('Font.Job.find-job', [
            'categories' => $categories,
            'job_types' => $job_types,
            'jobs' => $jobs,
        ]);
    }
}
