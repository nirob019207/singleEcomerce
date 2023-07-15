<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    public function Pending(){
        $pending_orders=Order::where('status','pending')->latest()->get();
        return view('admin.pendingOreder',compact('pending_orders'));
    }
    public function Completed(){
        return view('admin.completed');
    }
    public function Cancalled(){
        return view('admin.cancalled');
    }
}
