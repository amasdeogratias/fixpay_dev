<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Cart;

class CartController extends Controller
{
    public function getCart()
    {
        return view('site.pages.cart');
    }

    public function removeItem($id)
    {
        Cart::remove($id);

        if (Cart::isEmpty()) {
            return redirect('/');
        }
        return redirect()->back()->with('message', 'Item removed from cart successfully.');
    }

    public function clearCart()
    {
        Cart::clear();

        return redirect('/');
    }

    public function increaseItemQuantity($id)
    {
        Cart::update($id, [
            'quantity' => 1
        ]);
        return redirect()->back()->with('message', 'Item updated from cart successfully.');
    }

    public function decreaseItemQuantity($id)
    {
        Cart::update($id, [
            'quantity' => -1
        ]);
        return redirect()->back()->with('message', 'Item updated from cart successfully.');
    }
}
