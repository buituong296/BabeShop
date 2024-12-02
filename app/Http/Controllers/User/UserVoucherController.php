<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\BillItem;
use App\Models\Cart;
use App\Models\Product;
use App\Models\Voucher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserVoucherController extends Controller
{
        public function applyVoucher(Request $request)
    {


        $topProductIds = BillItem::select('product_id', DB::raw('COUNT(*) as count'))
        ->groupBy('product_id')
        ->orderByDesc('count')
        ->take(4)
        ->pluck('product_id');
        $products_3 = Product::whereIn('id', $topProductIds)->get();
        $request->validate([
            'voucher_code' => 'required|string|max:10',
        ]);

        // Kiểm tra mã giảm giá hợp lệ
        $voucher = Voucher::where('code', $request->input('voucher_code'))
                        ->where('start', '<=', now())
                        ->where('end', '>=', now())
                        ->first();

        if (!$voucher || $voucher->quantity <= 0) {
            return redirect()->back()->with('error', 'Mã giảm giá không hợp lệ, đã hết hạn, hoặc đã hết số lượt sử dụng.');
        }

        // Lấy danh sách mã giảm giá từ session
        $appliedVouchers = session()->get('applied_vouchers', []);

        // Kiểm tra mã giảm giá đã áp dụng chưa
        if (array_key_exists($voucher->code, $appliedVouchers)) {
            return redirect()->route('cart')->with('error', 'Mã giảm giá đã được áp dụng.');
        }

        // Thêm mã giảm giá vào session
        $appliedVouchers[$voucher->code] = $voucher->percentage;
        session()->put('applied_vouchers', $appliedVouchers);

        // Tính toán tổng tiền và giảm giá
        $userId = auth()->id();
        $cartItems = Cart::where('user_id', $userId)->with('variant')->get();
        $totalAmount = $cartItems->sum(function ($item) {
            return $item->variant->sale_price * $item->quantity;
        });

        // Tính toán tổng tiền và giảm giá
        $totalDiscount = 0;
        foreach ($appliedVouchers as $percentage) {
            $totalDiscount += $totalAmount * ($percentage / 100);
        }

        // Giới hạn tổng giảm giá không vượt quá tổng tiền
        $totalDiscount = min($totalDiscount, $totalAmount);

        // Tính tổng thanh toán sau giảm giá
        $totalAfterDiscount = max($totalAmount - $totalDiscount, 0); // Không để giá trị âm


        // Cập nhật session
        session()->put('total_amount', $totalAmount);
        session()->put('total_after_discount', $totalAfterDiscount);
        session()->put('total_discount', $totalDiscount);

        // Giảm `quantity` và tăng `used_quantity` cho voucher
        $voucher->decrement('quantity', 1);
        $voucher->increment('used_quantity', 1);



        return view('user.cart', compact('cartItems', 'totalAmount', 'totalAfterDiscount', 'products_3','totalDiscount'))
            ->with('success', 'Áp dụng mã giảm giá thành công.');
    }


    public function removeVoucher(Request $request)
{
    $voucherCode = $request->input('voucher_code');
    $appliedVouchers = session()->get('applied_vouchers', []);

    // Kiểm tra và xóa mã giảm giá khỏi session
    if (isset($appliedVouchers[$voucherCode])) {
        unset($appliedVouchers[$voucherCode]);
        session()->put('applied_vouchers', $appliedVouchers);

        // Tính lại tổng giảm giá và tổng thanh toán sau khi xóa mã
        $totalAmount = session('total_amount', 0);
        $totalDiscount = 0;
        foreach ($appliedVouchers as $percentage) {
            $totalDiscount += $totalAmount * ($percentage / 100);
        }
        $totalDiscount = min($totalDiscount, $totalAmount);
        $totalAfterDiscount = $totalAmount - $totalDiscount;

        // Cập nhật lại session với các giá trị mới
        session()->put('total_discount', $totalDiscount);
        session()->put('total_after_discount', $totalAfterDiscount);

        return redirect()->route('cart')->with('success', 'Đã xóa mã giảm giá thành công.');
    }

    return redirect()->route('cart')->with('error', 'Mã giảm giá không hợp lệ.');
}





}
