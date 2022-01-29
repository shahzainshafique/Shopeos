<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
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
}
