<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Cache;
use App\Models\Goals;
use Illuminate\Http\Request;
use Validator;

class GoalsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $goal = Cache::remember('goal', 60, function () {
            return Goals::paginate(4);
        });
        $i=0;
        return view('admin.goal.show',compact('goal','i'));
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
            'golas' => 'required|string|max:65535',
         ]);
         if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $web_id=1;
        $goal = new Goals([
            'title' => $request->input('title'),
            'golas'  => $request->input('golas'),
            'web_id' => $web_id,
        ]);
        $goal->save();
        Cache::forget('goal');
        return redirect()->back()->with(['success'=>'add goal done']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Goals $goals)
    {
        //
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $goal=Goals::findOrfail($id);
        return view('admin.goal.edit',compact('goal'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'golas' => 'required',
         ]);
         if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $goal=Goals::find($id);
        if ($request->input('title')) {
            $goal->title = $request->input('title');
        }
        if ($request->input('golas')) {
            $goal->golas = $request->input('golas');
        }
         $goal->save();
         Cache::forget('goal');

         return redirect()->back()->with(['success'=>'updtae Goals done']);
    }

    public function search(Request $request )
    {
        Cache::forget('goal');
        $validator = Validator::make($request->all(), [
            'quiry' => 'required',
         ]);
         $search = $request->input('quiry');
         $goal=Goals::where('title', 'like', "%$search%")->paginate(4);
         $i=0 ;
         return view('admin.goal.show',compact('goal','i'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {
        $goal=Goals::where('id','=',$id)->delete();
        Cache::forget('goal');
        return redirect()->back()->with(['success'=>'delete Goals done']);
    }
}
