<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

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
    return view('user_temp.add_to_cart');
   }

   public function UserProfile(){
    return view('user_temp.user_profile');
   }
   public function Checkout(){
    return view('user_temp.checkout');
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
}
