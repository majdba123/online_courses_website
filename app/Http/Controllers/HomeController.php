<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Benefits;
use App\Models\Rating;
use App\Models\Courses;
use App\Models\QFA;
use Illuminate\Http\Request;

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
        $course=Courses::all();
        $benefit=Benefits::all();
        $rate=Rating::all();
        $qfa=QFA::all();
        $i=0;
        return view('web.homepage',compact('course','benefit','rate','qfa','i'));
    }
    public function user()
    {
        $user=User::all();
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
    public function search(Request $request )
    {
        $validator = Validator::make($request->all(), [
            'quiry' => 'required',
         ]);
         $search = $request->input('quiry');
         $user=User::where('name', 'like', "%$search%")->get();
         $i=0 ;
         return view('admin.user.index',compact('user','i'));
    }
}
