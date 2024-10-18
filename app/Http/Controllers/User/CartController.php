<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $products = Product::with('variants', 'category')->latest('id')->paginate(4);
        $page = 2;
        $products_2 = Product::with('variants', 'category')
            ->latest('id')
            ->paginate(4, ['*'], 'page', $page);
        
        $products_3 = Product::inRandomOrder()->paginate(4, ['*'], 'page', $page);
        return view('user.cart', compact('products', 'products_2', 'page','products_3'));
    }
}
