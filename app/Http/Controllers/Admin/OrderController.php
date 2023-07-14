<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function Pending(){
        return view('admin.pendingOreder');
    }
    public function Completed(){
        return view('admin.completed');
    }
    public function Cancalled(){
        return view('admin.cancalled');
    }
}
