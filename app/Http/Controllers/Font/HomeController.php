<?php

namespace App\Http\Controllers\Font;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //create a method
    public function Home()
    {
        return view('Font.home');
    }
}
