<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class CartController extends Controller
{
    public function addToCart(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['quantity'] += 1;
        } else {
            $cart[$id] = [
                'name' => $product->name,
                'image' => $product->image,
                'price' => $product->price,
                'quantity' => 1,
            ];            
        }

        session(['cart' => $cart]);

        return redirect()->back()->with('success', 'Product added to cart!');
    }

    public function add(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
            'size' => 'required|string',
        ]);

        $product = Product::findOrFail($request->product_id);
        $cart = session()->get('cart', []);

        $key = $product->id . '_' . $request->size;

        if (isset($cart[$key])) {
            $cart[$key]['quantity'] += $request->quantity;
        } else {
            $cart[$key] = [
                'product_id' => $product->id,
                'name' => $product->name,
                'image' => $product->image,
                'price' => $product->price,
                'size' => $request->size,
                'quantity' => $request->quantity,
            ];
        }

        session(['cart' => $cart]);

        return redirect()->back()->with('success', 'Product added to cart!');
    }

    public function showCart()
    {
        $recommendedProducts = Product::inRandomOrder()->take(4)->get();
        $cart = session()->get('cart', []);

        return view('shop_cart', [
            'recommendedProducts' => $recommendedProducts,
            'cart' => $cart
        ]);
    }

    public function updateQuantity(Request $request, $id, $action)
    {
        $cart = session()->get('cart', []);

        if (!isset($cart[$id])) {
            return redirect()->back();
        }

        if ($action === 'increase') {
            $cart[$id]['quantity'] += 1;
        } elseif ($action === 'decrease') {
            $cart[$id]['quantity'] = max(1, $cart[$id]['quantity'] - 1);
        }

        session(['cart' => $cart]);
        return redirect()->back();
    }

    public function remove($id)
    {
        $cart = session()->get('cart', []);
        unset($cart[$id]);
        session(['cart' => $cart]);
        return redirect()->back();
    }
}
