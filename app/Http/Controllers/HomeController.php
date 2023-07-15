<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Auth;
use App\Models\User;

class HomeController extends Controller
{


    public function redirect()
{
    if (Auth::check()) {
        $usertype = Auth::user()->usertype;
        $allproducts = Product::latest()->get();
        $categories = Category::latest()->get();

        if ($usertype == '1') {
            return view('admin.dashboard');
        } else {
            return view('user_temp.home', compact('allproducts', 'categories'));
        }
    } else {
        // Handle the case when no user is authenticated
        // For example, redirect to a login page or display an error message
        return redirect()->route('login');
    }
}
}
