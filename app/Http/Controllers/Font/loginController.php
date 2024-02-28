<?php

namespace App\Http\Controllers\Font;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class loginController extends Controller
{
    //create login method
    public function Login()
    {
        return view('Font.account.login');
    }
}
