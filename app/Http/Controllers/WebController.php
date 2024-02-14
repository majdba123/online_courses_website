<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Cache;
use App\Models\Web;
use App\Models\Achievements;
use App\Models\Goals;
use Illuminate\Http\Request;

class WebController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function forgetSession(Request $request)
    {
        $request->session()->forget('majd');
        return response()->json(['message' => 'Session forgotten']);
    }
    public function createsession(Request $request)
    {
        #$request->session()->forget('majd');
        return 2;
    }
    public function index()
    {
        //
    }
    public function about()
    {
        $goal = Goals::paginate(4);
        $achievement = Achievements::paginate(4);

        return view('web.about.index' , compact('achievement' , 'goal'));
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Web $web)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Web $web)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Web $web)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Web $web)
    {
        //
    }
}
