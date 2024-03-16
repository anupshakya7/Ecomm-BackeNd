<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

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
}
