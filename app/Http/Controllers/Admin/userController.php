<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class userController extends Controller
{
    public function index()
    {
        $users = User::orderBy('created_at', 'DESC')->paginate(10);
        return view('admin.users.user_list', [
            'users' => $users,
        ]);
    }
    public function edit($id)
    {
        $users = User::find($id);
        return view('admin.users.user_edit', [
            'users' => $users,
        ]);
    }
    public function update(Request $request, $id)
    {
        $validator = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'mobile' => 'required|max:11', // Removed incorrect 'mobile' rule
        ]);

        $user = User::findOrFail($id); // Using findOrFail to throw a 404 error if user is not found
        $user->name = $request->name;
        $user->email = $request->email;
        $user->mobile = $request->mobile;
        $user->save();

        $notification = [
            'message' => 'User Updated Successfully',
            'alert-type' => 'success'
        ];

        return redirect()->route('admin.users.list')->with($notification);
    }

    public function delete($id)
    {
        $user = User::findOrFail($id); // Find the user by ID
        $user->delete(); // Delete the user

        $notification = [
            'message' => 'User Deleted Successfully',
            'alert-type' => 'success'
        ];

        return redirect()->route('admin.users.list')->with($notification);
    }
}
