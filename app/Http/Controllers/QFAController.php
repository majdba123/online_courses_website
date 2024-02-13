<?php

namespace App\Http\Controllers;

use App\Models\QFA;
use Illuminate\Http\Request;
use Validator;

class QFAController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $qfa=QFA::paginate(4);
        $i=0;
        return view('admin.qfa.show',compact('qfa','i'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function search(Request $request )
    {
        $validator = Validator::make($request->all(), [
            'quiry' => 'required',
         ]);
         $search = $request->input('quiry');
         $qfa=QFA::where('quastion', 'like', "%$search%")->paginate(4);
         $i=0 ;
         return view('admin.qfa.show',compact('qfa','i'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'quastion' => 'required',
            'answee' => 'required',
         ]);
         if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $web_id=1;
        $qfa = new QFA([
            'quastion'  =>  $request->input('quastion'),
            'answee'    => $request->input('answee'),
            'web_id'    => $web_id,
        ]);
        $qfa->save();
        return redirect()->back()->with(['success'=>'add QFA done']);
    }

    /**
     * Display the specified resource.
     */
    public function show(QFA $qFA)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $qfa=QFA::findOrfail($id);
        return view('admin.qfa.edit',compact('qfa'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'quastion' => 'required',
            'answee' => 'required',
         ]);
         if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $qfa=QFA::find($id);
        if ($request->input('quastion')) {
            $qfa->quastion = $request->input('quastion');
        }
        if ($request->input('answee')) {
            $qfa->answee = $request->input('answee');
        }
         $qfa->save();
         return redirect()->back()->with(['success'=>'updtae QFA done']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {
        $qfa=QFA::where('id','=',$id)->delete();
        return redirect()->back()->with(['success'=>'delete QFA done']);
    }
}
