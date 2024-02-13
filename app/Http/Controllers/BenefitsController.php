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
        $benefits = Benefits::paginate(4);
        return view('admin.benefit.show', compact('benefits'));
    }

    public function search(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'quiry' => 'required|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $search = $request->input('quiry');
        $benefits = Benefits::where('benefits', 'like', "%$search%")->get();
        return view('admin.benefit.show', compact('benefits'));
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

        $web_id = 1;
        $benefit = Benefits::create([
            'title' => $request->input('title'),
            'benefits' => $request->input('benefits'),
            'web_id' => $web_id,
        ]);

        return redirect()->back()->with(['success' => 'add benefit done']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Benefits $benefit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $benefit = Benefits::findOrFail($id);
        return view('admin.benefit.edit', compact('benefit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'benefits' => 'required|string|max:65535',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $benefit = Benefits::findOrFail($id);

        if ($request->input('title')) {
            $benefit->title = $request->input('title');
        }

        if ($request->input('benefits')) {
            $benefit->benefits = $request->input('benefits');
        }

        $benefit->save();
        return redirect()->back()->with(['success' => 'update benefit done']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {
        $benefit = Benefits::findOrFail($id);
        $benefit->delete();
        return redirect()->back()->with(['success' => 'delete Benefits done']);
    }
}
