<?php

namespace App\Http\Controllers;
use App\Models\Web;
use App\Models\Courses;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Validator;


class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $webs=Web::findOrfail(1);
        $courses = Courses::all();
        $userCount = User::count();
        $userRegister = Order::where('status', 1)->count();
        return view('admin.dashboard',compact('userCount','webs','userRegister','courses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function search(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'courses_id' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $course_id = $request->input('courses_id'); // Replace this with the user input
        $course = Courses::findOrfail($course_id);
        if ($course) {
            $orderCount = Order::where('courses_id', $course->id)->where('status', 1)->count();
            // Store the search result in a session
            session(['course' => $orderCount]);
            return redirect()->back();

        } else {
            return redirect()->back()->with(['error'=>'not_found']);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $id)
    {
        $web=Web::findOrfail($id);
        return view('admin.editweb',compact('web'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
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
        $web=Web::findOrfail($id);
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
        if ($request->input('introduction')) {
            $web->introduction = $request->input('introduction');
        }
        if ($request->input('phone')) {
            $web->phone = $request->input('phone');
        }
        if ($request->input('gmail')) {
            $web->phone = $request->input('gmail');
        }
         $web->save();
         return redirect()->back()->with(['success'=>'updtae  web  done']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
