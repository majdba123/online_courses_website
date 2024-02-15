<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Validator;
use App\Models\Courses;
use App\Models\Favorite;
use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    public function store(Request $request, $id)
    {
        $user = Auth::user();
        // Check if the user has already added the course to their favorites
        $existingFavorite = Favorite::where('user_id',$user->id )
            ->where('courses_id', $id)
            ->first();

        if ($existingFavorite) {
            // If the course is already in the favorites, return an error response
            return redirect()->back()
                ->withErrors(['error' => 'Course already in favorites']);
        }

        // Create a new favorite record
        $favorite = new Favorite;
        $favorite->user_id = $user->id;
        $favorite->courses_id = $id;
        $favorite->discription = "none";
        $favorite->save();
        // Redirect the user back to the previous page with a success message
        return redirect()->back()
            ->with('success', 'Course added to favorites');
    }

}
