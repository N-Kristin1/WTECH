<?php

namespace App\Http\Controllers;

use App\Models\Product;

class CategoryController extends Controller
{
    public function index()
    {
        $products = Product::all();     
        return view('categories', compact('products'));
    }
}
