<?php

namespace App\Http\Controllers;
use App\Models\Doctor;
use Illuminate\Support\Facades\Cache;
use Validator;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    public function index()
    {
        $doctor =Doctor::latest()->paginate(10);
        $i=0 ;
        return view('admin.doctor.show',compact('doctor','i'));
    }

    public function search(Request $request )
    {
        Cache::forget('doctor');
        $validator = Validator::make($request->all(), [
            'quiry' => 'required',
         ]);
         $search = $request->input('quiry');
         $doctor = Doctor::where('name', 'like', "%$search%")->paginate(4);
         $i=0 ;
         return view('admin.doctor.show',compact('doctor','i'));
    }

    public function edit($id)
    {
        $doctor=Doctor::findOrfail($id);
        return view('admin.doctor.edit',compact('doctor'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'spicification' => 'required|string|max:65535',
            'university' => 'required|string|max:255',
            'age' => 'required|integer|min:1|max:120',
         ]);
         if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

         $doctor=Doctor::create($request->all());
         Cache::forget('doctor');
         return redirect()->back()->with(['success'=>'add doctor done']);
    }


    public function update(Request $request,$id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'sometimes',
            'spicification' => 'sometimes',
            'university' => 'sometimes',
            'age' => 'sometimes',
         ]);
         if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
         $doctor=Doctor::find($id);
        if ($request->input('name')) {
            $doctor->name = $request->input('name');
        }
        if ($request->input('spicification')) {
            $doctor->spicification = $request->input('spicification');
        }
        if ($request->input('university')) {
            $doctor->university = $request->input('university');
        }
        if ($request->input('age')) {
            $doctor->age = $request->input('age');
        }
         $doctor->save();
         Cache::forget('doctor');
         return redirect()->back()->with(['success'=>'updtae doctor done']);
    }

    public function delete($id)
    {
        $doctor= Doctor::where('id','=',$id)->delete();
        Cache::forget('doctor');
        return redirect()->back()->with(['success'=>'delete doctor done']);
    }

}
