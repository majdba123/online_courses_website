<?php

namespace App\Http\Controllers;

use App\Models\Achievements;
use Illuminate\Http\Request;
use Validator;

class AchievementsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $achievement=Achievements::all();
        $i=0;
        return view('admin.achievement.show',compact('achievement','i'));
    }
    public function search(Request $request )
    {
        $validator = Validator::make($request->all(), [
            'quiry' => 'required',
         ]);
         $search = $request->input('quiry');
         $achievement=Achievements::where('achievement', 'like', "%$search%")->get();
         $i=0 ;
         return view('admin.achievement.show',compact('achievement','i'));
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
            'title' => 'required|max:255',
            'achievement' => 'required|string|max:65535'
         ]);
         if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $web_id=1;
        $achievement = new Achievements([
            'title' => $request->input('title'),
            'achievement'  => $request->input('achievement'),
            'web_id' => $web_id,
        ]);
        $achievement->save();
        return redirect()->back()->with(['success'=>'add achievement done']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Achievements $achievements)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $achievement=Achievements::findOrfail($id);
        return view('admin.achievement.edit',compact('achievement'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'achievement' => 'required',
         ]);
         if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $achievement=Achievements::find($id);
        if ($request->input('title')) {
            $achievement->title = $request->input('title');
        }
        if ($request->input('achievement')) {
            $achievement->achievement = $request->input('achievement');
        }
         $achievement->save();
         return redirect()->back()->with(['success'=>'updtae achievement done']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {
        $achievement=Achievements::where('id','=',$id)->delete();
        return redirect()->back()->with(['success'=>'delete Achievements done']);
    }
}
