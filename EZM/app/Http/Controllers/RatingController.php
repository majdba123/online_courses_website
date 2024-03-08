<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Courses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use App\Models\Rating;
use App\Models\User;
use Validator;
class RatingController extends Controller
{
    public function index()
    {
        $rating = Rating::latest()->paginate(10);
        $courses = Cache::remember('courses', 60, function () {
            return Courses::paginate(4);
        });
        $user = Cache::remember('user', 60, function () {
            return User::paginate(4);
        });

        $i=0;
        return view('admin.rating.show',compact('rating','courses','user','i'));
    }
    public function search(Request $request )
    {
        Cache::forget('rating');
        $validator = Validator::make($request->all(), [
            'quiry' => 'required',
         ]);
         $search = $request->input('quiry');
         $userr=User::where('name', 'like', "%$search%")->first();
         if($userr)
         {
            $rating=Rating::where('user_id', 'like', "%$userr->id%")->paginate(4);
            $courses=Courses::paginate(4);
            $user=User::paginate(4);
            $i=0 ;
            return view('admin.rating.show',compact('rating','courses','user','i'));
        }
         else{
            return redirect()->back()->with(['error'=>'not_found']);

         }
    }
    public function store(Request $request , $id)
    {
        $user=Auth::id();
        $validator = Validator::make($request->all(), [
            'comment' => 'required|string|max:65535',
         ]);
         if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $review = new Rating();
        $review->courses_id = $id;
        $review->comment = $request->input('comment');
        $review->user_id = $user;
        $review->save();
        Cache::forget('rating');
        return redirect()->back()->with('success', 'Review added successfully.');
    }
    public function update(Request $request, $id)
    {
        $user = Auth::id();
        $validator = Validator::make($request->all(), [
            'courses_id' => 'sometimes',
            'comment' => 'sometimes|string',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $review = Rating::find($id);
        if ($request->input('courses_id')) {
            $review->courses_id = $request->input('courses_id');
        }
        if ($request->input('comment')) {
            $review->comment = $request->input('comment');
        }
        $review->user_id = $user;
        $review->save();
        Cache::forget('rating');
        return redirect()->back()->with(['success' => 'Review updated successfully.']);
    }
    public function destroy($id)
    {
        $review = Rating::find($id);
        if (!$review) {
            return redirect()->back()->withErrors(['error' => 'Review not found.']);
        }
        $review->delete();
        Cache::forget('rating');
        return redirect()->back()->with(['success' => 'Review deleted successfully.']);
    }
}
