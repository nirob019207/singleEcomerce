<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function Index(){
        $categories=Category::latest()->get();
        return view('admin.allcategory',compact('categories'));
    }
    public function AddCategory(){
        return view('admin.addCategory');
    }
    public function StoreCat(Request $request){
        $request->validate([
            'category_name'=>'required|unique:categories'
        ]);
        Category::insert([
            'category_name'=>$request->category_name,
            'slug'=>strtolower(str_replace('','-',$request->category_name)),
        ]);
        return redirect()->route('allcategory')->with('message',"Category added succesfully!");




    }
    public function EditCategory($id){
        $category_info=Category::FindOrFail($id);
        return view('admin.editcategory',compact('category_info'));
    }
    public function Updatecat(Request $request){
        $category_id=$request->category_id;
        $request->validate([
            'category_name'=>'required|unique:categories'
        ]);
Category::findOrFail($category_id)->update([
           'category_name'=>$request->category_name,
            'slug'=>strtolower(str_replace('','-',$request->category_name)),

]);
return redirect()->route('allcategory')->with('message',"Category Updated succesfully!");
    }


    public function DeleteCategory($id){
        Category::findOrFail($id)->delete();
        return redirect()->route('allcategory')->with('message',"category delete succesfully");
    }
}
