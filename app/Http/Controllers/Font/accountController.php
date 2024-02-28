<?php

namespace App\Http\Controllers\Font;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class accountController extends Controller
{
    //create a method account 
    public function Registration()
    {
        return view('Font.account.registration');
    }
    public function ProcessRegistration(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:250',
            'email' => 'required|email|max:250|unique:users',
            'password' => 'required|min:8|confirmed',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $credentials = $request->only('email', 'password');
        Auth::attempt($credentials);
        $request->session()->regenerate();
        return redirect()->route('login')->withSuccess('You have successfully registered & logged in!');
    }

    public function Dashboard()
    {
        if (Auth::check()) {
            return view('Font.account.dashboard');
        }

        return redirect()->route('login')
            ->withErrors([
                'email' => 'Please login to access the dashboard.',
            ])->onlyInput('email');
    }


    public function Login()
    {
        return view('Font.account.login');
    }
    public function authenticate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if ($validator->passes()) {
            if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
                // Authentication successful, show success Toast message and then redirect
                return redirect()->route('account.profile')->with('success', 'Logged in successfully!');
            } else {
                // Authentication failed, show error Toast message and redirect to login page
                return redirect()->route('login')->with('error', 'Email & Password do not match');
            }
        } else {
            // Validation failed, redirect back to the login page with errors and input data
            return redirect()->route('account.profile')
                ->withErrors($validator)
                ->withInput($request->only('email'));
        }
    }


    public function Profile()
    {
        return view('Font.account.profile');
    }
    public function Logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
