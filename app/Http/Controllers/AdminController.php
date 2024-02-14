<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use App\Models\Web;
use App\Models\Courses;
use App\Models\Order;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function index()

    {
        $webs = Cache::remember('web', 60, function () {
            return Web::findOrFail(1);
        });
        $courses = Cache::remember('courses', 60, function () {
            return Courses::paginate(4);
        });
        $userCount = Cache::remember('user_count', 60, function () {
            return User::count();
        });
        $userRegister = Cache::remember('user_register', 60, function () {
            return Order::where('status', 1)->count();
        });
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
        $orderCount = Cache::remember("order_count_{$course->id}", 60, function () use ($course) {
            return Order::where('courses_id', $course->id)->where('status', 1)->count();
        });
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
        $web = Cache::remember('web_' . $id, 60, function () use ($id) {
            return Web::findOrFail($id);
        });
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
        $web = Cache::get('web_' . $id, function () use ($id) {
            return Web::findOrFail($id);
        });
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
        Cache::put('web_' . $id, $web, 60);
        return redirect()->back()->with(['success' => 'update web done']);
    }


    public function destroy(string $id)
    {
        //
    }
}
