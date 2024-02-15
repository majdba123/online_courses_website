<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Order;
use App\Models\video;

class CheckUserStatus
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        $vedioId = $request->route()->parameter('id'); // Get the course ID from the route
        $vedio = video::find($vedioId);
        $courseId=$vedio->courses_id;
        $order = Order::where('courses_id', $courseId)->where('user_id', auth()->id())->first(); // Fetch the order from the database
        if (auth()->check() && $order && $order->status != 0) {
            return $next($request);
        }elseif(auth()->check() && $order && $order->status != 1) {
            session()->flash('success', 'Your order is in process.');
            return redirect()->back();
        }else{
            return redirect()->route('order.place', ['id' => $courseId]);
        }
    }
}
