<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\Product;

class FrontendController extends Controller
{
    public function index()
    {
        $featured_products=Product::where('trending','1')->take(15)->get();
        $trending_category=Category::where('popular','1')->take(15)->get();
       return view('frontend.index',compact('featured_products','trending_category'));
    }
    public function category(){
        $category=Category::where('status','0')->get();
        return view('frontend.category',compact('category'));
    }

}
