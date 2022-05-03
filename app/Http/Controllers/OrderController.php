<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function Order(Request $req, $delivery){
        if (!$req->session()->has('cart')) {
            return redirect()->route('cart.list')->with('success', 'Корзина пуста');
        }

        $Order = new Order();
        $Order->name = $req->input('name');
        $Order->last_name = $req->input('last_name');
        $Order->login = $req->input('login');
        $Order->email = $req->input('email');
        $Order->address = $req->input('address');
        $Order->country = $req->input('country');
        $Order->city = $req->input('city');
        $Order->zip_code = $req->input('zip_code');
        $Order->user_id = Auth::id();
        $Order->delivery = $delivery;

        $oldCart = $req->session()->get('cart');
        $Order->cart = serialize($oldCart);

        $req->session()->forget('cart');

        $Order->save();

        return redirect()->route('userpage')->with('success', 'Заказ оформлен');
    }

    public function getOrders() {
        $orders = Order::with('user')->where('user_id','=',Auth::id())->get();
        return view('orders', ['orders' => $orders]);
    }
    
    public function getAllOrders() {
        $this->authorize('admin');
        $orders = Order::with('user')->get();
        return view('orders', ['orders' => $orders]);
    }
}
