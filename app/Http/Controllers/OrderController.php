<?php

namespace App\Http\Controllers;
use Validator;
use App\Models\Order;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Courses;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $order=Order::all();
        $i=0;
        $courses=Courses::all();
        $user=User::all();

        return view('admin.order.show',compact('order','i','courses','user'));
    }
    public function search(Request $request )
    {
        $validator = Validator::make($request->all(), [
            'quiry' => 'required',
         ]);
         $search = $request->input('quiry');
         $userr=User::where('name', 'like', "%$search%")->first();
         if($userr)
         {
            $order=Order::where('user_id', 'like', "%$userr->id%")->get();
            $courses=Courses::all();
            $user=User::all();
            $i=0 ;
            return view('admin.order.show',compact('order','courses','user','i'));
         }else{
            return redirect()->back()->with(['error'=>'not_found']);
         }
    }
    public function delete($id)
    {
        $order=Order::where('id','=',$id)->delete();
        return redirect()->back()->with(['success'=>'delete order done']);
    }

    public function uporder($id)
    {
        $order=Order::find($id);
        if($order)
        {
            if($order->status == 1) // use double equals sign for comparison
            {
                $order->status=0;
            }elseif($order->status == 0) // use double equals sign for comparison
            {
                $order->status= 1;
            }
            $order->save();
        }
        return redirect()->back();
    }
    public function index2($id)
    {
        $courses=Courses::where('id', 'like', "%$id%")->first();
        return view('web.order.index',compact('courses'));
    }
    public function store(Request $request , $id)
    {
        $validator = Validator::make($request->all(), [
            'imge' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
         ]);
         if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $imageOrder = null;
        if ($request->hasFile('imge')) {
            $imageOrder = time().'.'.$request->file('imge')->getClientOriginalExtension();
            $request->imge->move(public_path('Order_file'), $imageOrder);
        }
        $user = Auth::user();
        $courses=Courses::findOrfail($id);
        $order = new Order([
            'courses_id'=> $courses->id,
            'user_id' => $user->id,
            'image' => $imageOrder,
            'price' =>$courses->price,
        ]);
        $order->save();
        return redirect()->back()->with('success','your order has placed');
    }


}
