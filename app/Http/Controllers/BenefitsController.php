<?php

namespace App\Http\Controllers;

use App\Models\Benefits;
use Illuminate\Http\Request;
use Validator;
class BenefitsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $benefit=Benefits::all();
        $i=0;
        return view('admin.benefit.show',compact('benefit','i'));
    }
    public function search(Request $request )
    {
        $validator = Validator::make($request->all(), [
            'quiry' => 'required',
         ]);
         $search = $request->input('quiry');
         $benefit=Benefits::where('benefits', 'like', "%$search%")->get();
         $i=0 ;
         return view('admin.benefit.show',compact('benefit','i'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'benefits' => 'required|string|max:65535',
         ]);
         if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $web_id=1;
        $benefit = new Benefits([
            'title'=> $request->input('title'),
            'benefits' => $request->input('benefits'),
            'web_id' => $web_id,
        ]);
        $benefit->save();
        return redirect()->back()->with(['success'=>'add benefit done']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Benefits $benefits)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $benefit=Benefits::findOrfail($id);
        return view('admin.benefit.edit',compact('benefit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'benefits' => 'required',
         ]);
         if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $benefit=Benefits::find($id);
        if ($request->input('title')) {
            $benefit->title = $request->input('title');
        }
        if ($request->input('benefits')) {
            $benefit->benefits = $request->input('benefits');
        }
         $benefit->save();
         return redirect()->back()->with(['success'=>'updtae benefit done']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {
        $benefit=Benefits::where('id','=',$id)->delete();
        return redirect()->back()->with(['success'=>'delete Benefits done']);
    }
}
