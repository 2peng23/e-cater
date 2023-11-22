<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function addCart(Request $request)
    {
        $existing = Cart::where('item_id', $request->item_id)
            ->where('cart_id', $request->cart_id)->first();
        if ($existing) {
            $existing->quantity = $existing->quantity + $request->quantity;
            $existing->save();
            return response()->json([
                'success' => "Added to Cart!"
            ]);
        }
        $cart = new Cart();
        $cart->item_id = $request->item_id;
        $cart->cart_id = $request->cart_id;
        $cart->quantity = $request->quantity;
        $cart->save();
        return response()->json([
            'success' => "Added to Cart!"
        ]);
    }
    public function cartItems()
    {
        $carts = Cart::where('cart_id', Auth::user()->id);
        // dd($carts->count());
        return view('user.cart', compact('carts'));
    }
}
