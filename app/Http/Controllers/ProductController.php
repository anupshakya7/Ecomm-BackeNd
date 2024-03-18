<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function addProduct(Request $request)
    {
        $product = new Product();
        $product->name = $request->name;
        $product->file_path = $request->file('image')->store('products');
        $product->description = $request->description;
        $product->price = $request->price;
        $product->save();
        return $product;
    }

    public function list()
    {
        $product = Product::all();
        return $product;
    }

    public function delete($id)
    {
        $product = Product::where('id', $id)->delete();
        if($product) {
            return ["result" => "Product has been Deleted"];
        } else {
            return ["result" => "Error"];
        }
    }

    public function getProduct($id)
    {
        $product = Product::find($id);
        if($product) {
            return $product;
        } else {
            return ["result" => "Error"];
        }

    }

    public function updateProduct($id, Request $request)
    {
        $product = Product::find($id);
        $product->name = $request->name;
        if($request->file('image')) {
            $product->file_path = $request->file('image')->store('products');
        }
        $product->description = $request->description;
        $product->price = $request->price;
        $product->save();
        return $product;
    }

    public function search($key){
        $product = Product::where('name','LIKE','%'.$key.'%')->get();
        if($product){
            return $product;
        }else{
            return ["result"=>"Result Not Found"];
        }
        
    }

    //Test Query Log Function
    public function queryLog(){
        DB::enableQueryLog();
        $users = DB::table('users')->get();
        $product = DB::table('products')->get();
        $queries = DB::getQueryLog();
        dd($queries);
    }
}
