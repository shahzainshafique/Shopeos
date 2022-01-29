<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
class CartController extends Controller
{
    public function addProduct(Request $request)
    {
     $product_id=$request->input('product_id');
     $product_qtv=$request->input('product_qtv');

     if(Auth::check()){
      $prod_check=Product::where('id',$product_id)->first();
      if($prod_check){

        if(Cart::where('prod_id',$product_id)->where('user_id',Auth::id())->exists())
        {
            return response()->json(['status'=>$prod_check->name." already added to Cart!"]);
        }
        else
        {
          $cartitem=new Cart();
          $cartitem->prod_id=$product_id;
          $cartitem->user_id=Auth::id();
          $cartitem->prod_qtv=$product_qtv;
          $cartitem->save();
          return response()->json(['status'=>$prod_check->name." added to Cart!"]);
        }
      }
    

    }
    else
    {
        return response()->json(['status'=>"Please login to continue"]);
    }
}
public function viewcart()
{
  $cartitems=Cart::where('user_id',Auth::id())->get();
  return view('frontend.cart',compact('cartitems'));
}
public function deleteproduct(Request $request)
    {
        if(Auth::check()){
       $prod_id=$request->input('prod_id');
       if(Cart::where('prod_id',$prod_id)->where('user_id',Auth::id())->exists()){
         $cartitem=Cart::where('prod_id',$prod_id)->where('user_id',Auth::id())->first();
         $cartitem->delete();
        return response()->json(['status'=>"Product deleted successfully from cart!"]);

       }
      }
       else{
                 return response()->json(['status'=>"Please login to continue"]);
       }
    }
}