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
    $products = Product::query();
    $categories = Category::all();
    $sizes = Size::all();
    $color = Color::all();

    // Danh mục đã chọn (nếu có)
    $selectedCategories = collect(); // Tạo một collection rỗng nếu không có danh mục được chọn

    if ($request->has('category')) {
        // Lọc sản phẩm theo danh mục
        $products->whereHas('category', function ($query) use ($request) {
            $query->whereIn('id', $request->category);
        });

        // Lấy danh sách danh mục đã chọn từ ID trong request
        $selectedCategories = Category::whereIn('id', $request->category)->get();
    }

    // Lọc sản phẩm theo kích cỡ
    if ($request->has('size')) {
        $products->whereHas('variants', function ($query) use ($request) {
            $query->whereIn('size_id', $request->size);
        });
    }

    // Lọc sản phẩm theo màu sắc
    if ($request->has('color')) {
        $products->whereHas('variants', function ($query) use ($request) {
            $query->whereIn('color_id', $request->color);
        });
    }

    // Lọc theo khoảng giá
    if ($request->has('min') && $request->has('max')) {
        $products->whereBetween('price', [$request->min, $request->max]);
    }

    $products = $products->paginate(9);

    // Truyền thêm danh sách danh mục đã chọn sang view
    return view('user.product', compact('products', 'categories', 'sizes', 'color', 'selectedCategories'));
}


}
