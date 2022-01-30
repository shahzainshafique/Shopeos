<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;
use App\Models\Category;
use App\Models\OrderItem;
use App\Models\Cart;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
class CheckoutController extends Controller
{
    
  public function index(){
        $oldcartitems=Cart::where('user_id',Auth::id())->get();
        foreach ($oldcartitems as $item) {
          if(!Product::where('id',$item->prod_id)->where('qty','>=',$item->prod_qtv)->exists()){
            $removeitem=Cart::where('user_id',Auth::id())->where('prod_id',$item->prod_id)->first();
            $removeitem->delete();
          }
        }
        $cartitems=Cart::where('user_id',Auth::id())->get();
        return view('frontend.checkout',compact('cartitems'));
    } 
    public function placeorder(Request $request)
    {
          $order=new Order();
          $order->user_id=Auth::id();
          $order->fname=$request->input('fname');
          $order->lname=$request->input('lname');
          $order->email=$request->input('email');
          $order->phone=$request->input('phone');
          $order->address1=$request->input('address1');
          $order->address2=$request->input('address2');
          $order->city=$request->input('city');
          $order->country=$request->input('country');
          $order->pincode=$request->input('pincode');
          $order->state=$request->input('state');
          $order->tracking_no='ehtisham'.rand(1111,9999);
          $order->save();

          $order->id;

          $oldcartitems=Cart::where('user_id',Auth::id())->get();
              foreach($oldcartitems as $item){

                OrderItem::create([
                 'order_id'=>  $order->id,
                 'prod_id' =>  $item->prod_id,
                 'qtv'=>$item->prod_qtv,
                 'price'=>$item->products->selling_price
                ]);
                $prod=Product::where('id',$item->prod_id)->first();
                
                $prod->update();
              }
              if(Auth::user()->address1==NULL)
              {
                $user=User::where('id', Auth::id())->first();
                $user->name=$request->input('fname');
                $user->lname=$request->input('lname');
                $user->phone=$request->input('phone');
                $user->address1=$request->input('address1');
                $user->address2=$request->input('address2');
                $user->city=$request->input('city');
                $user->country=$request->input('country');
                $user->pincode=$request->input('pincode');
                $user->state=$request->input('state');
                $user->update();
              }

              $oldcartitems=Cart::where('user_id',Auth::id())->get();
              Cart::destroy($oldcartitems);
              return redirect('/')->with('status','Order Place Succesfully');
    }
}
