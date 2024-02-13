<?php

namespace App\Http\Controllers;
use App\Models\video;
use App\Models\Rating;
use Illuminate\Support\Facades\Response;
use App\Models\Courses;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;


class VideoController extends Controller
{
    public function index()
    {
        $video=Video::all();
        $courses = Courses::all();
        $i=0;
        return view ('admin.video.show',compact('video','courses','i'));
    }
    public function index2($id)
    {
        $rating=Rating::where('courses_id', $id)->get();
        $video = Video::where('courses_id', $id)->get();
        $i=0;
        $id_course=$id;
        return view('web.videos.index',compact('video','rating','i','id_course'));

    }
    public function edit($id)
    {
        $video=Video::findOrfail($id);
        $courses=Courses::all();
        return view('admin.video.edit',compact('video','courses'));
    }
    public function search(Request $request )
    {
        $validator = Validator::make($request->all(), [
            'quiry' => 'required',
         ]);
         $search = $request->input('quiry');
         $video=Video::where('name', 'like', "%$search%")->get();
         $courses=Courses::all();
         $i=0 ;
         return view ('admin.video.show',compact('video','courses','i'));
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'discription' => ['sometimes', 'required', 'string', 'max:65535'],
            'time_of_video' => ['required', 'integer', 'min:1', 'max:25', 'regex:/^[0-9]+$/'],
            'video_url'=>'required|mimes:mp4,mov,ogg|max:1000000000',
            'courses_id' => ['required', 'integer', 'min:1'],
         ]);
         if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $file=$request->file('video_url');
        $path=$file->store('videos');
        $video_name = basename($path);
        $video = new Video([
            'name' => $request->input('name'),
            'discription' => $request->input('discription'),
            'time_of_video'=> $request->input('time_of_video'),
            'video_url'=>$video_name,
            'courses_id'=> $request->input('courses_id')
        ]);
        $video->save();
         return redirect()->back()->with(['success'=>'add video done']);
    }


    public function update(Request $request,$id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'sometimes',
            'video_url' => 'sometimes',
            'discription' => 'sometimes',
            'time_of_video' => 'sometimes',
            'courses_id' => 'sometimes',

         ]);
         if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
         $video=video::find($id);
        if ($request->input('name')) {
            $video->name = $request->input('name');
        }
        if ($request->input('video_url')) {
            $video->video_url = $request->input('video_url');
        }
        if ($request->input('discription')) {
            $video->discription = $request->input('discription');
        }
        if ($request->input('time_of_video')) {
            $video->time_of_video = $request->input('time_of_video');
        }
        if ($request->input('courses_id')) {
            $video->courses_id = $request->input('courses_id');
        }
         $video->save();
         return redirect()->back()->with(['success'=>'updtae Video done']);
    }
    public function delete($id)
    {
        $video=video::where('id','=',$id)->delete();
        return redirect()->back()->with(['success'=>'delete Video done']);
    }
    public function show2($videoName)
    {
        $path = storage_path('app/videos/' . $videoName);
        if (!File::exists($path)) {
            abort(404);
        }
        $type = File::mimeType($path);
        $file = File::get($path);
        $response = Response::make(file_get_contents($path), 200);
        $response->header("Content-Type", $type);
        $response->header("Accept-Ranges", "bytes");
        $response->header("Content-Disposition", "inline; filename=" . basename($path));
        $response->header("Content-Length", strlen($file));
        return $response;

    }
}
