<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Voucher;
use Illuminate\Http\Request;

class UserVoucherController extends Controller
{
    public function applyVoucher(Request $request)
    {
        $request->validate([
            'voucher_code' => 'required|string|max:10',
        ]);

        // Kiểm tra xem mã giảm giá có tồn tại và hợp lệ hay không
        $voucher = Voucher::where('code', $request->input('voucher_code'))
                          ->where('start', '<=', now())
                          ->where('end', '>=', now())
                          ->first();

        if (!$voucher) {
            return redirect()->back()->with('error', 'Mã giảm giá không hợp lệ hoặc đã hết hạn.');
        }

        // Lấy danh sách các mã giảm giá đã áp dụng từ session
        $appliedVouchers = session()->get('applied_vouchers', []);

        // Kiểm tra xem mã giảm giá đã được áp dụng chưa
        if (array_key_exists($voucher->code, $appliedVouchers)) {
            return redirect()->route('cart')->with('error', 'Mã giảm giá không hợp lệ hoặc đã được áp dụng.');
        }

        // Thêm mã giảm giá vào session
        $appliedVouchers[$voucher->code] = $voucher->percentage;
        session()->put('applied_vouchers', $appliedVouchers);

        // Tính tổng tiền giỏ hàng
        $userId = auth()->id();
        $cartItems = Cart::where('user_id', $userId)->with('variant')->get();
        $totalAmount = $cartItems->sum(function ($item) {
            return $item->variant->sale_price * $item->quantity;
        });

        // Tính tổng mức giảm giá từ tất cả các mã đã áp dụng
        $totalDiscount = 0;
        foreach ($appliedVouchers as $percentage) {
            $totalDiscount += $totalAmount * ($percentage / 100);
        }
        $totalAfterDiscount = $totalAmount - $totalDiscount;


        // Store cart and voucher info in session for checkout view
        session()->put('total_amount', $totalAmount);
        session()->put('total_after_discount', $totalAfterDiscount);
        session()->put('total_discount', $totalDiscount);


        return view('user.cart', compact('cartItems', 'totalAmount', 'totalAfterDiscount', 'totalDiscount'))
            ->with('success', 'Áp dụng mã giảm giá thành công.');
    }
}
