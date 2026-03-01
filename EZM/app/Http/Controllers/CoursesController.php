<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCourseRequest;
use App\Http\Requests\UpdateCourseRequest;
use App\Models\Courses;
use App\Models\Discount;
use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Validator;



class CoursesController extends Controller
{
    public function index()
    {
        $courses =Courses::latest()->paginate(4);
        $i=0 ;
        $doctor =Doctor::all();
        $discount = Discount::all();
        return view('admin.courses.show',compact('doctor','discount','courses','i'));
    }
    public function index2()
    {
        $i=0 ;
        $courses = Courses::with('video')->latest()->paginate(4);
        return view('web.courses.index',compact('courses','i'));
    }
    public function search(Request $request )
    {
        Cache::forget('courses');
        $validator = Validator::make($request->all(), [
            'query' => 'required|string|min:1|max:255',
        ]);
        $search = $request->input('query');
         $courses = Courses::where('name', 'like', "%$search%")->paginate(4);
         $i=0 ;
         $doctor=Doctor::paginate(4);
         $discount=Discount::paginate(4);
         return view('admin.courses.show',compact('courses','i','doctor','discount'));
    }
    public function edit($id)
    {
        $courses=Courses::findOrfail($id);
        $doctor=Doctor::paginate(4);
        $discount=Discount::paginate(4);
        return view('admin.courses.edit',compact('doctor','discount','courses'));
    }
    public function store(StoreCourseRequest $request)
    {
        Courses::create($request->validated());
        Cache::forget('courses');

        return redirect()->back()->with('success', 'تم إضافة الدورة بنجاح');
    }

    public function update(UpdateCourseRequest $request, $id)
    {
        $course = Courses::findOrFail($id);
        $course->update($request->validated());
        Cache::forget('courses');

        return redirect()->back()->with('success', 'تم تحديث الدورة بنجاح');
    }

    public function delete($id)
    {
        $courses=Courses::where('id','=',$id)->delete();
        Cache::forget('courses');
        return redirect()->back()->with(['success'=>'delete courses done']);
    }
}
