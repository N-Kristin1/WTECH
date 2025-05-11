<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required',
            'last_name'  => 'required',
            'email'      => 'required|email',
            'phone'      => 'required',
            'address'    => 'required',
            'payment'    => 'required|in:credit_card,cash,bank_transfer',
            'delivery'   => 'required|in:home,zbox',
        ]);

        $cart = Session::get('cart', []);
        if (empty($cart)) {
            return redirect()->back()->withErrors(['cart' => 'Your cart is empty.']);
        }

        $subtotal = collect($cart)->sum(fn($item) => $item['price'] * $item['quantity']);
        $shipping = 3.89;

        $order = Order::create([
            'first_name' => $validated['first_name'],
            'last_name' => $validated['last_name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'address' => $validated['address'],
            'payment_method' => $validated['payment'],
            'delivery_method' => $validated['delivery'],
            'total_price' => $subtotal + $shipping,
            'payment_status' => 'pending',
        ]);

        foreach ($cart as $productId => $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $productId,
                'quantity' => $item['quantity'],
                'unit_price' => $item['price'],
            ]);
        }
        session(['last_order_id' => $order->id]);
        

        Session::forget('cart');

        return redirect()->route('order.info');
        
    }

    public function orderInfo()
{
    $orderId = session('last_order_id');
    if (!$orderId) {
        return redirect('/')->withErrors('No order found.');
    }

    $order = Order::with('items.product')->findOrFail($orderId);

    return view('order_info', [
        'order' => $order,
    ]);
}
}
