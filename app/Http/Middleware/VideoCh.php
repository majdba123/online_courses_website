<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use App\Http\Models\User;
use App\Models\Order;
use App\Models\video;
use App\Models\Courses;


class VideoCh
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {
        $videoName = $request->route()->parameter('videoName');
        $video = video::where('video_url', $videoName)->first();
        $courseId = $video->courses_id;
        if (auth()->check()&& $video) {
            $order = Order::where('courses_id', $courseId)->where('user_id', auth()->id())->first();
            if ($order && $order->status != 0) {
                // Redirect the user to an error page or show a message
                return $next($request);
            }
        }
        return redirect()->route('order.place', ['id' => $courseId]);
    }
}
