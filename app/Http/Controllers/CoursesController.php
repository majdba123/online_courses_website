<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Cache;
use Illuminate\Http\Request;
use App\Models\Courses;
use App\Models\Doctor;
use App\Models\Discount;
use Validator;



class CoursesController extends Controller
{
    public function index()
    {
        $courses =Courses::paginate(4);
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
            'quiry' => 'required',
         ]);
         $search = $request->input('quiry');
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
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'discription' => 'required|string|max:65535',
            'time_of_course' => 'required|string|max:255',
            'doctor_id' => 'sometimes|required|integer|exists:doctors,id',
            'discount_id' => 'sometimes|required|integer|exists:discounts,id',
         ]);
         if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $courses = new Courses([
            'name' => $request->input('name'),
            'price' =>$request->input('price'),
            'discription'=> $request->input('discription'),
            'time_of_course'=> $request->input('time_of_course'),
            'doctor_id'=>$request->input('doctor_id'),
            'discount_id'=> $request->input('discount_id')
        ]);
        $courses->save();
        Cache::forget('courses');
         return redirect()->back()->with(['success'=>'add COURSES done']);
    }

    public function update(Request $request,$id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'discription' => 'required|string|max:65535',
            'time_of_course' => 'required|string|max:255',
            'doctor_id' => 'sometimes|required|integer|exists:doctors,id',
            'discount_id' => 'sometimes|required|integer|exists:discounts,id',
         ]);
         if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $courses=Courses::findorfail($id);
        if ($request->input('name')) {
            $courses->name = $request->input('name');
        }
        if ($request->input('price')) {
            $courses->price = $request->input('price');
        }
        if ($request->input('discription')) {
            $courses->discription = $request->input('discription');
        }
        if ($request->input('time_of_course')) {
            $courses->time_of_course = $request->input('time_of_course');
        }
        if ($request->input('doctor_id')) {
            $courses->doctor_id = $request->input('doctor_id');
        }
        if ($request->input('discount_id')) {
            $courses->discount_id = $request->input('discount_id');
        }
         $courses->save();
         Cache::forget('courses');
         return redirect()->back()->with(['success'=>'updtae  COURSES or done']);
    }

    public function delete($id)
    {
        $courses=Courses::where('id','=',$id)->delete();
        Cache::forget('courses');
        return redirect()->back()->with(['success'=>'delete courses done']);
    }
}
