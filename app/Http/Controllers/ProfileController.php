<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Validator;
use App\Models\Order;
use App\Models\Courses;
use App\Models\Favorite;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('web.profile.index',compact('user'));
    }
    public function edit($id)
    {
        $user = Auth::user();
        return view('web.profile.edit',compact('user'));
    }
    public function update(Request $request, $id)
    {
        // Validate the incoming request data
        $validator = Validator::make($request->all(), [
            'name' => 'sometimes|string|max:255',
            'email' => 'sometimes|email|max:255',
            'password' => 's sometimes|min:8|max:255',
            'phone' => 's sometimes|numeric|digits:10',
            'address' => 's sometimes|string|max:65535',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'age' => 's sometimes|integer|min:1|max:120',
         ]);
         if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Find the user by id
        $user = User::findOrFail($id);
        // Update the user's profile data
        if ($request->input('name')) {
            $user->name = $request->input('name');
        }
        if ($request->input('email')) {
            $user->email = $request->input('email');
        }
        if ($request->input('password')) {
            $user->password = $request->input('password');
        }
        if ($request->input('address')) {
            $user->address = $request->input('address');
        }
        if ($request->input('phone')) {
            $user->phone = $request->input('phone');
        }
        $imageName = null;
        if ($request->hasFile('image')) {
            $imageName = time().'.'.$request->file('imge')->getClientOriginalExtension();
            $request->image->move(public_path('imageprfile'), $imageName);
            $user->image = $imageName;
        }
        if ($request->input('age')) {
            $user->age = $request->input('age');
        }
         $user->save();
        return redirect()->back()->with('success', 'Profile updated successfully.');
    }
    public function course()
    {
        $user = Auth::user();
        $courseIds = Order::where('user_id', $user->id)->where('status', 1)->pluck('courses_id');
        $courses = Courses::whereIn('id', $courseIds)->get();
        return view('web.profile.couesrs',compact('courses'));
    }
    public function history()
    {
        $user = Auth::user();
        $order = Order::where('user_id', $user->id)->get();
        return view('web.profile.history',compact('order'));
    }
    public function favourite()
    {
        $user = Auth::user();
        $courseIds = Favorite::where('user_id', $user->id)->pluck('courses_id');
        $courses = Courses::whereIn('id', $courseIds)->get();
        return view('web.profile.favourite',compact('courses'));
    }
}
