<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Validator;
use App\Models\Order;
use Illuminate\Support\Facades\Hash;
use App\Models\Courses;
use Illuminate\Http\RedirectResponse;
use App\Models\Favorite;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $courseIds = Order::where('user_id', $user->id)->where('status', 1)->pluck('courses_id');
        $courses = Courses::whereIn('id', $courseIds)->paginate(4);
        $cou = Favorite::where('user_id', $user->id)->pluck('courses_id');
        $couu = Courses::whereIn('id', $cou)->paginate(4);
        $order = Order::where('user_id', $user->id)->paginate(4);
        $i=0;
        $m=0;
        return view('web.profile.index',compact('user','courses','i','couu','order','m'));
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
            'phone' => 'sometimes|numeric|digits:10',
            'address' => 'sometimes|string|max:65535',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'age' => 'sometimes|integer|min:1|max:120',
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
        if ($request->input('address')) {
            $user->address = $request->input('address');
        }
        if ($request->input('phone')) {
            $user->phone = $request->input('phone');
        }
        $imageName = null;
        if ($request->hasFile('image')) {
            $imageName = time().'.'.$request->file('image')->getClientOriginalExtension();
            $request->image->move(public_path('imageprfile'), $imageName);
            $user->image = $imageName;
        }
        if ($request->input('age')) {
            $user->age = $request->input('age');
        }
         $user->save();
        return redirect()->back()->with('success', 'Profile updated successfully.');
    }

    public function history()
    {
        $user = Auth::user();
        $order = Order::where('user_id', $user->id)->paginate(4);
        return view('web.profile.history',compact('order'));
    }
    public function update1(Request $request, $id): RedirectResponse
    {
        $user = User::findOrFail($id);

        $validatedData = Validator::make($request->all(), [
            'current_password' => ['required', function ($attribute, $value, $fail) {
                $user = Auth::user();
                if (!Hash::check($value, $user->password)) {
                    $fail(__('The current password is incorrect.'));
                }
            }],
            'new_password' => ['required', 'min:8', 'confirmed'],
        ]);

        if ($validatedData->fails()) {
            return redirect()->back()
                ->withErrors($validatedData)
                ->withInput();
        }

        $user->password = Hash::make($request->new_password);
        $user->save();

        return redirect()->route('profile.index')->with('success', 'Password updated successfully!');
    }

}
