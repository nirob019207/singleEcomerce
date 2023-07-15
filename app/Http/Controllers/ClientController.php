<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Shipping;
use App\Models\Order;
use Auth;

class ClientController extends Controller
{
   public function CategoryPage($id){


    $category=Category::findOrFail($id);
    $products=Product::where('product_category_id',$id)->latest()->get();



    return view('user_temp.category',compact('category','products'));
   }

   public function SinglePage($id){
    $products=Product::findOrFail($id);
    $subcat_id=Product::where('id',$id)->value('product_subcategory_id');
    $related_products=Product::where('product_subcategory_id',$subcat_id)->latest()->get();
    return view('user_temp.single_page',compact('products','related_products'));
   }

   public function Add_To_Cart(){
    $user_id=Auth::id();
    $cart_item=Cart::where('user_id',$user_id)->latest()->get();
    return view('user_temp.add_to_cart',compact('cart_item'));
   }
   public function Add_To_Cart_Product(Request $request){
    $product_price=$request->price;
    $quantity=$request->quantity;
    $price=$product_price*$quantity;

    Cart::insert([
        'product_id'=>$request->product_id,
        'user_id'=>Auth::id(),
        'quantity'=>$request->quantity,
        'price'=>$price,


    ]);
    return redirect()->route('addtocart')->with('message',"your item added to cart successfully");

   }
   public function RemoveCart($id){
    Cart::findOrFail($id)->delete();
    return redirect()->route('addtocart')->with('message',"your item remove to cart successfull");
}


public function Shipping(){
    return view('user_temp.shipping');
}
public function AddShipping(Request $request){


    Shipping::insert([
        'city'=>$request->city,
        'user_id'=>Auth::id(),
        'phone_number'=>$request->phone_number,
        'postal_code'=>$request->postal_code,


    ]);
    return redirect()->route('checkout');

   }

   public function UserProfile(){
    return view('user_temp.user_profile');
   }
   public function Checkout(){


    $user_id=Auth::id();
    $shipping_address=Shipping::where('user_id',$user_id)->first();
    $cart_item=Cart::where('user_id',$user_id)->latest()->get();


    return view('user_temp.checkout',compact('cart_item','shipping_address'));
   }

   public function PlaceOrder(){
    $user_id=Auth::id();
    $shipping_address=Shipping::where('user_id',$user_id)->first();
    $cart_item=Cart::where('user_id',$user_id)->latest()->get();


    foreach($cart_item as $item){
        Order::insert([
            'userid'=>$user_id,
            'phone_number'=>$shipping_address->phone_number,
            'city'=>$shipping_address->city,
            'postal_code'=>$shipping_address->postal_code,
            'product_id'=>$item->product_id,
            'quantity'=>$item->quantity,
            'total_price'=>$item->price,

        ]

        );
        $id=$item->id;
        Cart::findOrFail($id)->delete();


    }
    return redirect()->route('pendingoders')->with('message','your order placed successfully');

   }
   public function NewRelease(){
    return view('user_temp.new_release');
   }
   public function TodayIdea(){
    return view('user_temp.today_idea');
   }
   public function Customar(){
    return view('user_temp.caustomar');
   }
   public function PendingOrders(){
    return view('user_temp.pending_orders');
   }
   public function History(){
    return view('user_temp.history');
   }
}
