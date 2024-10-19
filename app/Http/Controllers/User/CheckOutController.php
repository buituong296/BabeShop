<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class CheckOutController extends Controller
{
    public function checkout()
    {
        $products = Product::with('variants', 'category')->latest('id')->paginate(4);
        return view('user.checkout.checkout', compact('products'));
    }
    public function checkout_payment()
    {
        $products = Product::with('variants', 'category')->latest('id')->paginate(4);
        return view('user.checkout.checkout_payment', compact('products'));
    }
    public function checkout_done()
    {
        $products = Product::inRandomOrder()->paginate(2);
        return view('user.checkout.checkout_done', compact('products'));
    }
}
