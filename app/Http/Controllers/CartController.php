<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AddBook;

class CartController extends Controller
{
    public function addToCart($id, Request $request)
    {
        $book = AddBook::find($id);
        if(!$book) {
            abort(404);
        }
        $cart = session()->get('cart');
        // if cart is empty then this the first product
        if(!$cart) {
            $cart = [
                    $id => [
                        "title" => $book->title,
                        "author" => $book->author,
                        "quantity" => 1,
                        "price" => $book->price,
                        "image" => $book->image
                    ]
            ];
            session()->put('cart', $cart);
            return redirect()->back()->with('success', 'Книга добавлена в корзину!');
        }

        // if cart not empty then check if this product exist then increment quantity
        if(isset($cart[$id])) {
            $cart[$id]['quantity']++;
            session()->put('cart', $cart);
            return redirect()->back()->with('success', 'Книга добавлена в корзину!');
        }
        // if item not exist in cart then add to cart with quantity
        $cart[$id] = [
            "title" => $book->title,
            "author" => $book->author,
            "quantity" => 1,
            "price" => $book->price,
            "image" => $book->image
        ];
        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Книга добавлена в корзину!');
    }

    public function updateCart(Request $request)
    {
        
        if($request->id and $request->quantity)
        {
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('success', 'Корзина обновлена');
        }

    }

    public function removeCart($id)
    {
        if($id) {
            $cart = session()->get('cart');
            if(isset($cart[$id])) {
                unset($cart[$id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Книга удалена');
            return redirect()->back()->with('success', 'Книга удалена!');
        }
    }

    public function checkout(Request $request) {
        return view('checkout', ['delivery' => $request->delivery_select]);
    }
}
