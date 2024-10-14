<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Color;
use App\Models\Product;
use App\Models\Size;
use App\Models\Variant;
use Illuminate\Http\Request;

class ProductDetailController extends Controller
{
    public function productdetail($id)
    {
        $product = Product::where('id', $id)->first();
        $category = Category::where('id', $product->category_id)->first();
        $colors = Variant::join('colors', 'colors.id', '=', 'variants.color_id')->where('product_id', $id)->select('colors.*')->distinct('colors.id')->get();
        $sizes = Variant::join('sizes', 'sizes.id', '=', 'variants.size_id')->where('product_id', $id)->select('sizes.*')->distinct('sizes.id')->get();
        $productCategory = Product::where('category_id', $category->id)->where('id', '!=', $id)->get();
        $productNewest = Product::where('id', '!=', $id)->latest('id')->paginate(6);
        return view('user.product_detail')->with([
            'product'   => $product,
            'category' => $category,
            'colors' => $colors,
            'sizes' => $sizes,
            'productCategory' => $productCategory,
            'productNewest' => $productNewest
        ]);
    }
}
