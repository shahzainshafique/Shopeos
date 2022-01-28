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
      $prod_check=Product::where('id',$product_id)->exists();
      if($prod_check){

        if(Cart::where('prod_id',$product_id)->where('user_id',Auth::id())->where('prod_qtv',$product_qtv)->first())
        {
            return response()->json(['status'=>$prod_check->name."Already Added to Cart"]);
        }
        else
        {
          $cartitem=new Cart();
          $cartitem->prod_id=$product_id;
          $cartitem->user_id=Auth::id();
          $cartitem->prod_qtv=$product_qtv;
          $cartitem->save();
          return response()->json(['status'=>$prod_check->name."Add to Cart"]);
        }
      }
    

    }
    else
    {
        return response()->json(['status'=>"login to continue"]);
    }
}
}