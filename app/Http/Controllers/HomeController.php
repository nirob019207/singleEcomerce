<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class HomeController extends Controller
{
    public function Index(){
        $allproducts=Product::latest()->get();
        $categories=Category::latest()->get();
        return view('user_temp.home',compact('allproducts','categories'));
    }
}
