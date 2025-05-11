<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use App\Models\Product;

class AdminProductController extends Controller
{
    public function index() {
        return response()->json(Product::all());
    }

    public function store(Request $request) {
        Product::create($request->all());
        return response()->json(['success' => true]);
    }

    public function update(Request $request, $id) {
        $product = Product::findOrFail($id);
        $product->update($request->all());
        return response()->json(['success' => true]);
    }

    public function destroy($id) {
        $product = Product::findOrFail($id);


        if ($product->image) {
            $imagePath = public_path($product->image);
            if (File::exists($imagePath)) {
                File::delete($imagePath);
            }
        }


        if ($product->image2) {
            $image2Path = public_path($product->image2);
            if (File::exists($image2Path)) {
                File::delete($image2Path);
            }
        }

        $product->delete();
        return response()->json(['success' => true]);
    }

    public function deleteImage($id) {
        $product = Product::findOrFail($id);

        if ($product->image) {
            $imagePath = public_path($product->image);
            if (File::exists($imagePath)) {
                File::delete($imagePath);
            }
            $product->image = null;
            $product->save();
        }

        return response()->json(['success' => true]);
    }

}
