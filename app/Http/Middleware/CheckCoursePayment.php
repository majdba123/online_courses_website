<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use App\Http\Models\User;
use App\Models\Order;
class CheckCoursePayment
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        $courseId = $request->route()->parameter('id'); // Get the course ID from the route
        $order = Order::where('courses_id', $courseId)->where('user_id', auth()->id())->first(); // Fetch the order from the database
        if (auth()->check() && $order && $order->status != 0) {
            // Redirect the user to an error page or show a message
            return $next($request);

        }elseif(auth()->check() && $order && $order->status != 1) {
            return redirect()->back();
        }else{
            return redirect()->route('order.place', ['id' => $courseId]);
        }

    }
}
