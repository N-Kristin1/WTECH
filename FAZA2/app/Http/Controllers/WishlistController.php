<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    public function index() {
        $wishlist = Auth::user()->wishlist()->with('product')->get();
        return view('wishlist', compact('wishlist'));
    }

    public function store($productId) {
        $user = Auth::user();

        Wishlist::firstOrCreate([
            'user_id' => $user->id,
            'product_id' => $productId
        ]);

        return redirect()->back()->with('success', 'Product added to wishlist.');
    }

    public function destroy($id) {
        Wishlist::where('id', $id)->where('user_id', Auth::id())->delete();
        return redirect()->back()->with('success', 'Product removed from wishlist.');
    }
}
