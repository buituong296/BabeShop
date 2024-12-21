<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Color;
use App\Models\Comment;
use App\Models\Product;
use App\Models\ProductAlbum;
use App\Models\Size;
use App\Models\Variant;
use Illuminate\Http\Request;

class ProductDetailController extends Controller
{
    public function productdetail($id)
{
    $product = Product::withTrashed()->where('id', $id)->firstOrFail();

    $category = Category::withTrashed()->where('id', $product->category_id)->first();

    $colors = Variant::join('colors', 'colors.id', '=', 'variants.color_id')
        ->where('product_id', $id)
        ->select('colors.*')
        ->distinct('colors.id')
        ->withTrashed() // Bao gồm cả màu đã bị xóa mềm
        ->get();

    $sizes = Variant::join('sizes', 'sizes.id', '=', 'variants.size_id')
        ->where('product_id', $id)
        ->select('sizes.*')
        ->distinct('sizes.id')
        ->withTrashed() // Bao gồm cả kích thước đã bị xóa mềm
        ->get();

    $productCategory = collect(); // Tạo một collection trống
    if ($product->category) {
        $productCategory = Product::withTrashed()
            ->where('category_id', $product->category->id)
            ->where('id', '!=', $id)
            ->get();
    }

    $productCategoryTotal = $productCategory->count();
    $productNewest = Product::withTrashed()
        ->where('id', '!=', $id)
        ->latest('id')
        ->paginate(6);

    $productNewestTotal = $productNewest->count();
    $productAlbum = ProductAlbum::where('product_id', '=', $id)->get();
    $comments = Comment::where('product_id', $id)->get();
    $commentTotal = $comments->count();

    $product->view += 1;
    $product->save();

    return view('user.product_detail')->with([
        'product' => $product,
        'category' => $category,
        'colors' => $colors,
        'sizes' => $sizes,
        'productCategory' => $productCategory,
        'productCategoryTotal' => $productCategoryTotal,
        'productNewest' => $productNewest,
        'productNewestTotal' => $productNewestTotal,
        'productAlbum' => $productAlbum,
        'comments' => $comments,
        'commentTotal' => $commentTotal
    ]);
}

    public function getVariantQuantity(Request $request)
    {
        $productId = $request->input('product_id');
        $colorId = $request->input('color_id');
        $sizeId = $request->input('size_id');

        // Tìm biến thể dựa trên product_id, color_id và size_id
        $variant = Variant::where('product_id', $productId)
            ->where('color_id', $colorId)
            ->where('size_id', $sizeId)
            ->first();

        // Nếu biến thể tồn tại, trả về số lượng, nếu không thì số lượng là 0
        $quantity = $variant ? $variant->stock : 0;
        $price = $variant ? $variant->sale_price : 0;

        return response()->json(['quantity' => $quantity, 'price' => $price]);
    }

    public function addToCart(Request $request)
    {
        $request->validate([
            // 'variant_id' => 'required|exists:variants,id',
            'quantity' => 'required|integer|min:1',
        ]);

        $color = $request->input('color_id');
        $size = $request->input('size_id');

        $productId = $request->input('product_id');
        $variant = Variant::where('product_id', $productId)
            ->where('size_id', $size)
            ->where('color_id', $color)
            ->where('stock', '>', '0')
            ->select('id', 'stock')->first();


        if ($variant == null) {

            return redirect()->back()->with('error', 'Sản phẩm đã hết hàng hoặc không tồn tại');
        } else {

            $variantId = $variant->id;
            $userId = auth()->id(); // Lấy ID của người dùng đã đăng nhập

            //kiểm tra quantity nhập vào
            $quantity = $request->input('quantity');
            if ($quantity > $variant->stock) {
                return redirect()->back()->with('error', 'Số lượng đã chọn vượt quá số lượng sản phẩm ');
            } else {
                // Kiểm tra xem sản phẩm đã có trong giỏ hàng chưa
                $cartItem = Cart::where('user_id', $userId)->where('variant_id', $variantId)->first();

                if ($cartItem) {
                    // Nếu đã có thì tăng số lượng
                    $cartItem->quantity += $quantity;
                    $cartItem->save();
                } else {
                    // Nếu chưa có thì tạo mới
                    Cart::create([
                        'user_id' => $userId,
                        'variant_id' => $variantId,
                        'quantity' => $quantity,
                    ]);
                }

                return redirect()->back()->with('success', 'Sản phẩm đã được thêm vào giỏ hàng!');
            }
        }
    }
}
