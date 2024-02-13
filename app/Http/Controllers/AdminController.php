<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Web;
use App\Models\Courses;
use App\Models\Order;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function index()
    {
        $webs = Web::findOrFail(1);
        $courses = Courses::paginate(4);
        $userCount = User::count();
        $userRegister = Order::where('status', 1)->count();
        return view('admin.dashboard', compact('userCount', 'webs', 'userRegister', 'courses'));
    }

    public function search(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'courses_id' => 'required|exists:courses,id',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $course_id = $request->input('courses_id');
        $course = Courses::findOrFail($course_id);
        $orderCount = Order::where('courses_id', $course->id)->where('status', 1)->count();

        // Store the search result in a session
        session(['course' => $orderCount]);
        return redirect()->back();
    }

    public function store(Request $request)
    {
        //
    }

    public function show(string $id)
    {
        //
    }

    public function edit($id)
    {
        $web = Web::findOrFail($id);
        return view('admin.editweb', compact('web'));
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'introduction' => 'sometimes|nullable|url|max:255',
            'youtube' => 'sometimes|nullable|url|max:255',
            'facebook' => 'sometimes|nullable|url|max:255',
            'linkedin' => 'sometimes|nullable|url|max:255',
            'phone' => 'sometimes|nullable|digits:10|min:10',
            'gmail' => 'sometimes|nullable|email|max:255',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $web = Web::findOrFail($id);

        if ($request->input('introduction')) {
            $web->introduction = $request->input('introduction');
        }

        if ($request->input('youtube')) {
            $web->youtube = $request->input('youtube');
        }

        if ($request->input('facebook')) {
            $web->facebook = $request->input('facebook');
        }

        if ($request->input('linkedin')) {
            $web->linkedin = $request->input('linkedin');
        }

        if ($request->input('phone')) {
            $web->phone = $request->input('phone');
        }

        if ($request->input('gmail')) {
            $web->gmail = $request->input('gmail');
        }

        $web->save();

        return redirect()->back()->with(['success' => 'update web done']);
    }

    public function destroy(string $id)
    {
        //
    }
}
