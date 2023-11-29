<?php

namespace App\Http\Controllers;

use App\Models\Cake;
use App\Models\Cart;
use App\Models\CaterCart;
use App\Models\Package;
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
        $carts = Cart::where('cart_id', Auth::user()->id)->get();
        $totalPrice = $this->calculateTotalPrice($carts);

        return view('user.cart', compact('carts', 'totalPrice'));
    }

    public function addQuantity(Request $request)
    {


        $id = $request->id;
        $cart = Cart::where('id', $id)->where('cart_id', Auth::user()->id)->first();
        $cart->quantity = $request->quantity;
        $cart->save();

        $cart_item = $cart->item_id;
        $cake = Cake::find($cart_item);

        // total price
        $carts = Cart::where('cart_id', Auth::user()->id)->get();
        $totalPrice = $this->calculateTotalPrice($carts);

        return response()->json([
            'price' => $cart->quantity * $cake->price,
            'total' => $totalPrice
        ]);
    }

    private function calculateTotalPrice($carts)
    {
        $totalPrice = 0;

        foreach ($carts as $cart) {
            $cake = Cake::find($cart->item_id);

            // Check if the cake is found
            if ($cake) {
                $price = $cake->price * $cart->quantity;
                $totalPrice += $price;
            }
        }

        return $totalPrice;
    }

    public function removeCart(Request $request)
    {
        $id = $request->id;
        $cart = Cart::find($id);
        $cart->delete();
        return response()->json([
            'error' => 'Deleted!'
        ]);
    }
    public function caterInfo(Request $request)
    {
        $id = $request->id;
        $cater = Package::find($id);
        return response()->json([
            'cater' => $cater
        ]);
    }
    public function addCaterCart(Request $request)
    {

        $existing = CaterCart::where('item_id', $request->item_id)
            ->where('cart_id', $request->cart_id)->first();
        if ($existing) {
            return response()->json([
                'error' => "This package is already on your rental package!"
            ]);
        }
        $cart = new CaterCart();
        $cart->item_id = $request->item_id;
        $cart->cart_id = $request->cart_id;
        $cart->save();
        return response()->json([
            'success' => "Added to rental package!"
        ]);
    }
    public function myRentals()
    {
        $carts = CaterCart::where('cart_id', Auth::user()->id)->get();
        // $totalPrice = $this->calculateTotalPrice($carts);

        return view('user.cater-cart', compact('carts'));
    }

    public function removeCaterCart(Request $request)
    {
        $id = $request->id;
        $cart = CaterCart::find($id);
        $cart->delete();
        return response()->json([
            'error' => 'Deleted!'
        ]);
    }
}
