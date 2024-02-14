<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Cache;
use Illuminate\Http\Request;
use App\Models\Courses;
use Validator;
use App\Models\Discount;

class DiscountController extends Controller
{
    public function index()
    {
        $discount = Cache::remember('discount', 60, function () {
            return Discount::paginate(4);
        });
        $i=0;
        return view('admin.discount.show',compact('discount','i'));
    }
    public function edit($id)
    {
        $discount=Discount::findOrfail($id);
        return view('admin.discount.edit',compact('discount'));
    }
    public function search(Request $request )
    {
        Cache::forget('discount');
        $validator = Validator::make($request->all(), [
            'quiry' => 'required',
         ]);
         $search = $request->input('quiry');
         $discount = Discount::where('discount_percentage', 'like', "%$search%")->paginate(4);
         $i=0 ;
         return view('admin.discount.show',compact('discount','i'));
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'discount_percentage' => 'required|numeric|min:0|max:100',
            'expired_at' => 'required|date|after:now',
         ]);
         if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

         $discount=Discount::create($request->all());
         Cache::forget('discount');
         return redirect()->back()->with(['success'=>'Add Discount done']);
    }
    public function update(Request $request,$id)
    {
        $validator = Validator::make($request->all(), [
            'discount_percentage' => 'required',
            'expired_at' => 'required',
         ]);
         if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
         $discount=Discount::find($id);
        if ($request->input('discount_percentage')) {
            $discount->discount_percentage = $request->input('discount_percentage');
        }
        if ($request->input('expired_at')) {
            $discount->expired_at = $request->input('expired_at');
        }
         $discount->save();
         Cache::forget('discount');
         return redirect()->back()->with(['success'=>'Updtae Discount done']);
    }

    public function delete($id)
    {
        $discount= Discount::where('id','=',$id)->delete();
        Cache::forget('discount');
        return redirect()->back()->with(['success'=>'delete Discount done']);
    }

}
