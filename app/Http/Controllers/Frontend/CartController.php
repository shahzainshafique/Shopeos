<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class CartController extends Controller
{
    public function addProduct(Request $request){
     $product_id=$request->input('product_id');
     $product_qtv=$request->input('product_qtv');

     if(auth::check()){
      $prod_check=Product::where('id',$product_id)->first();
      if($prod_check){

        if(Cart::where('prod_id',$product_id)->where('user_id',Auth::id())->exists())
        {
            return response()->jason(['status'=>$prod_check->name."Already Add to Cart"]);
        }
        else
        {
          $cart_item=new Cart();
          $cart_item->prod_id=$product_id;
          $cart_item->user_id=Auth::id();
          $cart_item->user_qtv=$product_qtv;
          $cart_item->save();
          return response()->jason(['status'=>$prod_check->name."Add to Cart"]);
        }
      }
    

    }
    else
    {
        return response()->jason(['status'=>"login to continue"]);
    }
}
}