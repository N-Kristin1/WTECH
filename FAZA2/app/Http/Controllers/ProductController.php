<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{

    public function show($id) {
        $product = Product::findOrFail($id);

        $relatedProducts = Product::where('category', $product->category)
                                ->where('id', '!=', $product->id)
                                ->take(4)
                                ->get();

        
        return view('singleitem', [
            'product' => $product,
            'relatedProducts' => $relatedProducts
        ]);
    }

}
