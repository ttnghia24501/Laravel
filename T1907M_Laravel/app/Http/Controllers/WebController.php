<?php

namespace App\Http\Controllers;

use App\Brand;
use App\category;
use App\product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class WebController extends Controller
{
    public  function  demoRouting(){
        return view("demo");
    }
    public function layout(){
        return view("components.layout");
    }
    public function listCategory(){
//        $categories = category::all();
        $categoriess = category::paginate(20);
        //$categories = category::where('category_name','LIKE','N%')->get(); condition start from 'N'
        return view('category.list_category',compact('categoriess'));
    }
    public function newCategory(){
        return view('category.new');
    }
    public function saveCategory(Request $request){
        $request->validate([
           'category_name'=>'required| string | min:6 | unique:categories'
        ]);
    try{
        category::create([
            'category_name'=> $request->get('category_name')
        ]);
    }catch (\Exception $exception){
        return redirect()->back();
    }
    return redirect()->to('/list-category');
    }
    public function editCategory($id){
//        $category = category::find($id);
//        if(is_null($category))
//            abort(404);
        $category = category::findOrFail($id);
        return view("category.edit",["category"=>$category]);
    }
    public function updateCategory($id,Request $request){
        $category = category::findOrFail($id);
        $request -> validate([
            "category_name"=>"required| min:6|unique:categories,category_name,{$id}"
        ]);
        //die("passed");
        try{
            $category->update([
                "category_name"=>$request->get("category_name")
            ]);
        }catch (\Exception $exception){
            return redirect()->back();
        }
        return redirect()->to("/list-category");
    }
    public function deleteCategory($id){
        $category = category::findOrFail($id);
        try{
            $category->delete();
        }catch (\Exception $exception){

        }
        return redirect()->to("/list-category");
    }
    public function listProduct(){
        $products = product::paginate(20);
        return view("product.list",["products"=>$products]);
    }
    public function newProduct(){
        $categories = category::all();
        $brands = Brand::all();
        return view("product.new",[
            "categories"=>$categories,
            "brands"=>$brands
        ]);
    }
}
