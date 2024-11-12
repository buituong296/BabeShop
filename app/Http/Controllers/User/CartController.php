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
    $userId = auth()->id();
    $cartItems = Cart::where('user_id', $userId)->with('variant')->get();
    $products = Product::with('variants', 'category')->latest('id')->paginate(4);
    $page = 2;
    $products_2 = Product::with('variants', 'category')
        ->latest('id')
        ->paginate(4, ['*'], 'page', $page);

    $products_3 = Product::inRandomOrder()->paginate(4, ['*'], 'page', $page);

    // Tính tổng tiền giỏ hàng
    $totalAmount = $cartItems->sum(function ($item) {
        return $item->variant->sale_price * $item->quantity;
    });

    // Lưu tổng tiền giỏ hàng vào session cho `order_summary.blade.php` sử dụng
    session()->put('total_amount', $totalAmount);

    return view('user.cart', compact('products', 'products_2', 'page', 'products_3', 'cartItems', 'totalAmount'));
    }

    public function addToCart(Request $request)
    {
        $request->validate([
            'variant_id' => 'required|exists:variants,id',
            'quantity' => 'required|integer|min:1',
        ]);

        $variantId = $request->input('variant_id');
        $quantity = $request->input('quantity');
        $userId = auth()->id(); // Lấy ID của người dùng đã đăng nhập

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



    public function updateAjax(Request $request, $id)
{
    $cartItem = Cart::find($id);
    if ($cartItem) {
        $cartItem->quantity = $request->input('quantity');
        $cartItem->save();

        // Tính tổng tiền của sản phẩm hiện tại
        $updatedTotalPrice = $cartItem->variant->sale_price * $cartItem->quantity;

        // Tính tổng tiền giỏ hàng
        $userId = auth()->id();
        $cartItems = Cart::where('user_id', $userId)->with('variant')->get();
        $totalAmount = $cartItems->sum(function ($item) {
            return $item->variant->sale_price * $item->quantity;
        });

        // Tính tổng giảm giá
        $totalDiscount = 0;
        if (session()->has('applied_vouchers')) {
            foreach (session('applied_vouchers') as $percentage) {
                $totalDiscount += $totalAmount * ($percentage / 100);
            }
        }

        // Tính tổng thanh toán sau khi giảm giá
        $totalAfterDiscount = $totalAmount - $totalDiscount;

        return response()->json([
            'success' => true,
            'message' => 'Cập nhật số lượng thành công',
            'totalPrice' => number_format($updatedTotalPrice),
            'totalAmount' => number_format($totalAmount),
            'totalDiscount' => number_format($totalDiscount),
            'totalAfterDiscount' => number_format($totalAfterDiscount),
        ]);
    }

    return response()->json(['success' => false, 'message' => 'Không tìm thấy sản phẩm']);
}






}
