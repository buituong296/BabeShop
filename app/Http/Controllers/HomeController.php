<?php

namespace App\Http\Controllers;


use App\Models\Category;
use App\Models\Color;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Size;

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
        $products = Product::with('variants', 'category')->latest('id')->paginate(4);
        $page = 2;
        $products_2 = Product::with('variants', 'category')
            ->latest('id')
            ->paginate(4, ['*'], 'page', $page);

        return view('home', compact('products', 'products_2', 'page'));
    }
    public function product(Request $request)
    {
        // dd($request->all());
        $products = Product::query();
        $categories = Category::all();
        $sizes = Size::all();
        $color = Color::all();

        
        if ($request->has('category')) {
            $products->whereHas('category', function ($query) use ($request) {
                $query->whereIn('id', $request->category);
            });
        }
    
        if ($request->has('size')) {
            $products->whereHas('variants', function ($query) use ($request) {
                $query->whereIn('size_id', $request->size);
            });
        }
    
        if ($request->has('color')) {
            $products->whereHas('variants', function ($query) use ($request) {
                $query->whereIn('color_id', $request->color);
            });
        }
    
        if ($request->has('min') && $request->has('max')) {
            $products->whereBetween('price', [$request->min, $request->max]);
        }
    
        $products = $products->paginate(9);
       
    
        return view('user.product', compact('products', 'categories', 'sizes', 'color'));
    }

}
