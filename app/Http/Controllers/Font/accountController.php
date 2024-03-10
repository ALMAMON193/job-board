<?php

namespace App\Http\Controllers\Font;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
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
        return redirect()->route('account.login')->withSuccess('You have successfully registered & logged in!');
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
                return redirect()->route('account.login')->with('error', 'Email & Password do not match');
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
        $id = Auth::user()->id;
        $user = User::where('id', $id)->first();

        return view('Font.account.profile', [
            'user' => $user
        ]);
    }
    public function ProfileUpdate(Request $request)
    {
        $id = Auth::user()->id;

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => [
                'required',
                'email',
                Rule::unique('users')->ignore($id),
            ],
            'mobile' => 'nullable|string|max:20',
            'designation' => 'nullable|string|max:255',
        ]);

        $user = User::find($id);
        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
        $user->mobile = $validatedData['mobile'];
        $user->designation = $validatedData['designation'];
        $user->save();

        return redirect()->route('account.profile')->with('success', 'Profile updated successfully!');
    }
    public function ProfilePictureUpdate(Request $request)
    {

        $id = Auth::user()->id;

        $validatedData = $request->validate([
            'profile_picture' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        $user = User::find($id);

        if ($request->hasFile('profile_picture')) {
            $imageData = file_get_contents($request->file('profile_picture'));
            $user->profile_picture = base64_encode($imageData);
            $user->save();
        }

        return redirect()->route('account.profile')->with('success', 'Profile picture updated successfully!');
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('account.login')->with('success', 'Logout Successfully');
    }
}
