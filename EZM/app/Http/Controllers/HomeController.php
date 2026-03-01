<?php

namespace App\Http\Controllers;

use App\Models\Courses;
use App\Models\Benefits;
use App\Models\QFA;
use App\Models\Rating;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $course = Cache::remember('coursesss', 60, function () {
            return Courses::paginate(6);
        });
        $benefit =Benefits::paginate(10);
        $qfa = QFA::latest()->paginate(10);
        $rate =Rating::latest()->paginate(9);
        $i=0;
        return view('web.homepage',compact('course','benefit','rate','qfa','i'));
    }
    public function user()
    {
        $user=User::latest()->paginate(4);
        $i=0;
        return view('admin.user.index',compact('user','i'));
    }
    public function delete($id)
    {
        $user=User::where('id','=',$id)->delete();
        return redirect()->back()->with(['success'=>'delete user done']);
    }
    public function upuser($id)
    {
        $user=User::find($id);
        if($user)
        {
            if($user->status == 1) // use double equals sign for comparison
            {
                $user->status=0;
            }elseif($user->status == 0) // use double equals sign for comparison
            {
                $user->status=1;
            }
            $user->save();
        }
        return redirect()->back();
    }
    public function search(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'query' => 'required|string|min:1',
        ]);

        if ($validator->fails()) {
            return redirect()->route('search.user')->withErrors($validator)->withInput();
        }

        $search = $request->input('query');
        $user = User::where('name', 'like', "%{$search}%")->paginate(4);
        $i = 0;

        return view('admin.user.index', compact('user', 'i'));
    }
}
