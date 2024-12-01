<?php

namespace App\Http\Controllers;


use App\Models\BillItem;
use App\Models\Category;
use App\Models\Color;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Size;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
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

        // $products_3 = Product::inRandomOrder()->paginate(4, ['*'], 'page', $page);

        $topProductIds = BillItem::select('product_id', DB::raw('COUNT(*) as count'))
            ->groupBy('product_id')
            ->orderByDesc('count')
            ->take(4)
            ->pluck('product_id'); 
        $products_3 = Product::whereIn('id', $topProductIds)->get();
      
        return view('home', compact( 'categories', 'products', 'products_2', 'page','products_3'));
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        $categories = Category::all();
        $sizes = Size::all();
        $colors = Color::all();

        $products = Product::where('name', 'LIKE', "%{$query}%");

        $total = $products->count();

        $products = $products->paginate(9);

        return view('user.product', compact('products', 'query', 'categories', 'sizes', 'colors', 'total'));
    }

    public function product(Request $request)
    {
        // dd($request->all());
        $products = Product::query();
        $categories = Category::all();
        $sizes = Size::all();
        $colors = Color::all();

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

        $total=$products->count();
        $products = $products->paginate(9);


        return view('user.product', compact('products', 'categories', 'sizes', 'colors', 'total'));
    }

}
