<?php

namespace App\Http\Controllers\Admin;
use App\Models\Category;
use App\Models\SubCategory;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SubcategoryController extends Controller
{
    public function Index(){
        $subcategories=SubCategory::latest()->get();
        return view('admin.allSubcategory',compact('subcategories'));
    }
    public function AddSubCategory(){
        $categories=Category::latest()->get();
        return view('admin.addSubCategory',compact('categories'));
    }
    public function StoreSubCat( Request $request){
        $request->validate([
            'subcategory_name'=>'required|unique:sub_categories',
            'category_id'=>'required'
        ]);
        $category_id=$request->category_id;
        $category_name=Category::where('id',$category_id)->value('category_name');
        SubCategory::insert([
            'subcategory_name'=>$request->subcategory_name,
            'slug'=>strtolower(str_replace('','-',$request->subcategory_name)),
            'category_id'=>$category_id,
            'category_name'=>$category_name
        ]);
        Category::where('id',$category_id)->increment('subcategory_count',1);
        return redirect()->route('allsubcategory')->with('message',"SubCategory added succesfully!");

    }
    public function EditSubCategory($id){
        $subcategory_info=SubCategory::FindOrFail($id);
        return view('admin.editsubcategory',compact('subcategory_info'));
    }

    public function UpdateSubCat(Request $request){
        $request->validate([
            'subcategory_name'=>'required|unique:sub_categories',

        ]);
        $subcatid=$request->subcatid;
        SubCategory::findOrFail($subcatid)->update([
            'subcategory_name'=>$request->subcategory_name,
            'slug'=>strtolower(str_replace('','-',$request->subcategory_name)),

        ]);
        return redirect()->route('allsubcategory')->with('message',"SubCategory Updated succesfully!");
    }
    public function DeleteSubCategory($id){
       $cat_id= Subcategory::where('id',$id)->value('category_id');
        SubCategory::findOrFail($id)->delete();
        Category::where('id',$cat_id)->decrement('subcategory_count',1);
        return redirect()->route('allcategory')->with('message',"subcategory delete succesfully");
    }
}
