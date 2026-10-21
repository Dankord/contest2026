<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ShopController extends Controller
{
    public function index()
    {
    //     // $products = Product::orderBy('price,', 'asc')->get();

    //     return view('shop.index', compact('products'));
    // }

    // public function reserve(Request $request)
    // {
    //     $validated = $request->validate([
    //         'product_id' => 'required|exists:products,id',
    //         'payment_option' => 'required|string|max:50',
    //     ]);

    //     $product = Product::findOrFail($validated['product_id']);

    //     if ($product->stock < 1) {
    //         return back()->withErrors([
    //             'product_id' => 'This product is out of stock.',
    //         ]);
    //     }

    //     // $order = Order::create([
    //     //     'reference_code' => 'COMMIT-' . strtoupper(Str::random(6)),
    //     //     'user_id' => Auth::id(),
    //     //     'product_id' => $product->id,
    //     //     'quantity' => 1,
    //     //     'final_price' => $product->price,
    //     //     'payment_option' => $validated['payment_option'],
    //     //     'order_status' => 'Reserved for Pickup',
    //     // ]);

    //     $product->decrement('stock');

    //     return redirect()->route('shop.index')->with([
    //         'success' => 'Your reservation was successful!',
    //         // 'reference_code' => $order->reference_code,
    //     ]);
    }
}