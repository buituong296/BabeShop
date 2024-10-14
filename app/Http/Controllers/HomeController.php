<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Product;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $categories = Category::all();
        $products = Product::with('variants', 'category')->latest('id')->paginate(4);
        $page = 2;
        $products_2 = Product::with('variants', 'category')
            ->latest('id')
            ->paginate(4, ['*'], 'page', $page);

        return view('home',compact('products','products_2','page', 'categories'));
    }
    public function product()
    {
        $products = Product::all();
        return view('user.product', compact('products'));
    }
}
