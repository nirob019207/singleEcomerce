<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function Index(){
        return view("admin.dashboard");
    }
    public function Category(){
        return view('admin.allcategory');
    }
}
