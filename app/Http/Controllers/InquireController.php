<?php

namespace App\Http\Controllers;
use App\Models\inquire;
use Illuminate\Http\Request;
use App\Models\User;
use Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
class InquireController extends Controller
{
    public function index()
    {
        $inquire = inquire::latest()->paginate(10);
        $user = Cache::remember('user', 60, function () {
            return User::paginate(4);
        });

        $i=0;
        return view('admin.inquire.show',compact('inquire','user','i'));
        return view('admin.inquire.index',compact('inquire'));
    }
    public function index_web()
    {
        return view('web.contact.index');
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'subject' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'discription' => 'required|string|max:65535',
         ]);
         if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $user_id=Auth::user()->id;
         $inquire= new inquire([
            'user_id' => $user_id,
            'subject' => $request->get('subject'),
            'email' => $request->get('email'),
            'discription' => $request->get('discription'),
            ]);
            $inquire->save();
            Cache::forget('inquire');
         return redirect()->back()->with(['success'=>'your inquire done']);
    }
    public function search(Request $request )
    {
        Cache::forget('inquire');
        $validator = Validator::make($request->all(), [
            'quiry' => 'required',
         ]);
         $search = $request->input('quiry');
         $userr=User::where('name', 'like', "%$search%")->first();
         if($userr)
         {
            $inquire=inquire::where('user_id', 'like', "%$userr->id%")->paginate(4);
            $user=User::paginate(4);
            $i=0 ;
            return view('admin.inquire.show',compact('inquire','user','i'));
         }else{
            return redirect()->back()->with(['error'=>'not_found']);
         }
    }
    public function delete($id)
    {
        $inquire=inquire::where('id','=',$id)->delete();
        Cache::forget('inquire');
        return redirect()->back()->with(['success'=>'delete inquire done']);
    }

}
