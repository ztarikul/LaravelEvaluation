<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    // public function __construct(){

    // }

    public function index(){
        $product = Product::orderBy('id', 'ASC')->get();
        return view('products_list', compact('product'));
    }

    public function addProduct(Request $request){
        $product = new Product();
        $product->title = $request->title;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->thumbnail = $request->thumbnail;
    
        $product->save();

        $subcategories = new Subcategory();
        $subcategories->subcategory = $request->subcategory;
        $product->subcategories()->save($subcategories);

        return view('add_product', compact('product'));
    }

    public function deleteProduct($id){
        $product = new Product();
        $product->find($id)->delete();
        return back()->with('product_deleted', 'Product has been deleted');
    }
}
