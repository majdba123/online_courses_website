<?php

namespace App\Http\Controllers;

use App\Models\Achievements;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\Cache;

class AchievementsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $achievement = Cache::remember('achievements', 60, function () {
            return Achievements::paginate(4);
        });
        $i = 0;
        return view('admin.achievement.show', compact('achievement', 'i'));
    }

    public function search(Request $request)
    {
        Cache::forget('achievements');
        $validator = Validator::make($request->all(), [
            'quiry' => 'required|string|max:255',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $search = $request->input('quiry');
        $achievement = Cache::remember("achievements_search_{$search}", 60, function () use ($search) {
            return Achievements::where('achievement', 'like', "%$search%")->get();
        });
        $i = 0;
        return view('admin.achievement.show', compact('achievement', 'i'));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'achievement' => 'required|string|max:65535',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $web_id = 1;
        $achievement = new Achievements([
            'title' => $request->input('title'),
            'achievement' => $request->input('achievement'),
            'web_id' => $web_id,
        ]);
        $achievement->save();
        // Store the newly created achievement in the cache
        Cache::forget('achievements');
        return redirect()->back()->with(['success' => 'add achievement done']);
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

        $achievement = Achievements::findOrFail($id);

         return view('admin.achievement.edit', compact('achievement'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'achievement' => 'required|string|max:65535',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $achievement = Achievements::find($id);
        if ($request->input('title')) {
            $achievement->title = $request->input('title');
        }
        if ($request->input('achievement')) {
            $achievement->achievement = $request->input('achievement');
        }
        $achievement->save();
        // Store the updated achievement in the cache
        Cache::forget('achievements');
       return redirect()->back()->with(['success' => 'update achievement done']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {
        $achievement = Achievements::where('id', '=', $id)->delete();
        // Remove the achievement from the cache
        Cache::forget('achievements');
        return redirect()->back()->with(['success' => 'delete achievement done']);
    }
}
