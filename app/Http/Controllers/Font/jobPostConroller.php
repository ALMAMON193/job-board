<?php

namespace App\Http\Controllers\Font;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class jobPostConroller extends Controller
{
    //create a method
    public function Job_post()
    {
        return view('Font.job.job-post');
    }
}
