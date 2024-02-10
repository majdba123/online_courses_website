<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Video;
use Illuminate\Support\Str;
class UrlGeneratorController extends Controller
{
    public function generateUrl($id)
    {
        $video = Video::findOrFail($id);
        $videoPath= $video->video_url;
        $content_url =  $videoPath;


        $expiration_time = time() + 5  ; // Expiration time: 5 minutes from now
        $unique_id = bin2hex(random_bytes(10)); // Generate a unique ID
        // Store the unique ID and expiration time in a file
        Storage::disk('local')->put("url_expiration_times/{$unique_id}.json", json_encode([
            'expiration_time' => $expiration_time,
        ]));
        // Store the content URL in the session
        $encoded_content_url = base64_encode($content_url);
        session(['content_url' => $encoded_content_url , 'requested_id' => $id]);
        $expired_url = url("expired_url?id={$unique_id}");
        return redirect($expired_url);
    }
    public function checkUrlExpiration(Request $request)
    {
        $unique_id = $request->input('id') ?? "";
        $expiration_time = 0; // Initialize the expiration time

        // Retrieve the expiration time from a file using the unique ID
        $url_expiration_time_file = "url_expiration_times/{$unique_id}.json";
        if (Storage::disk('local')->exists($url_expiration_time_file)) {
            $url_expiration_time_data = json_decode(Storage::disk('local')->get($url_expiration_time_file), true);
            $expiration_time = $url_expiration_time_data['expiration_time'] ?? 0;
        }

        if (time() > $expiration_time) {
            // URL has expired, show an error message or redirect the user
            $requested_id = session('requested_id');
            return redirect()->route('generate_url', ['id' => $requested_id]);
        }

        // Retrieve the content URL from the session
        $encoded_content_url = session('content_url');
        // Decode the content URL
        $content_url = base64_decode($encoded_content_url);
        session(['majd' => 'bayer']);
        // Display the content by including the original URL in an iframe
       return view('web.videos.show',compact('content_url'));

    }
}
