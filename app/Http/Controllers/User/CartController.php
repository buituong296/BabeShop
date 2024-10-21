<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Variant;

class CartController extends Controller
{
    public function index()
    {
        $userId = auth()->id(); // Get the currently authenticated user's ID
        $cartItems = Cart::where('user_id', $userId)->with('variant')->get(); // Fetch cart items
        $userId = auth()->id();
        $cartItems = Cart::where('user_id', $userId)->with('variant')->get();
        $products = Product::with('variants', 'category')->latest('id')->paginate(4);
        $page = 2;
        $products_2 = Product::with('variants', 'category')
            ->latest('id')
            ->paginate(4, ['*'], 'page', $page);

        $products_3 = Product::inRandomOrder()->paginate(4, ['*'], 'page', $page);
        $totalAmount = $cartItems->sum(function ($item) {
            return $item->variant->sale_price * $item->quantity;
        });
        return view('user.cart', compact('products', 'products_2', 'page', 'products_3', 'cartItems', 'totalAmount'));
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
    public function update(Request $request, $id)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1',
        ]);

        $cartItem = Cart::findOrFail($id);
        $cartItem->quantity = $request->input('quantity');
        $cartItem->save();

        return redirect()->back()->with('success', 'Cập nhật số lượng thành công.');
    }
    public function destroy($id)
    {
        $cartItem = Cart::findOrFail($id);
        $cartItem->delete();

        return redirect()->back()->with('success', 'Đã xóa sản phẩm khỏi giỏ hàng.');
    }



}
