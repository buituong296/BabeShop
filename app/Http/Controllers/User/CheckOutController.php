<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use App\Models\Bill;
use App\Models\BillHistory;
use App\Models\BillItem;
use App\Models\User;

class CheckOutController extends Controller
{
    public function checkout()
    {
        $products = Product::with('variants', 'category')->latest('id')->paginate(4);
        $user_info = Auth::user();
        $address = Auth::user()->addresses()->where('status', 1)->first();
        
        
        return view('user.checkout.checkout', compact('products','user_info','address'));
    }
    public function checkout_payment()
    {
        $products = Product::with('variants', 'category')->latest('id')->paginate(4);
        return view('user.checkout.checkout_payment', compact('products'));
    }
    public function checkout_done()
    {
        $products = Product::inRandomOrder()->paginate(2);
        return view('user.checkout.checkout_done', compact('products'));
    }
    // app/Http/Controllers/CheckoutController.php

public function showCustomerInfoForm()
{
    return view('user.checkout.checkout');
}

public function storeCustomerInfo(Request $request)
{
    // Validate request
    $validatedData = $request->validate([
        'user_name' => 'required|string|max:255',
        'tel' => 'required|string|max:15',
        'city' => 'required|string|max:255',
        'district' => 'required|string|max:255',
        'commune' => 'required|string|max:255',
        'address' => 'required|string|max:255',
    ]);

    // Store customer information in session
    session([
        'checkout.customer_info' => $validatedData
    ]);
    // dd($request->all());
    // Redirect to payment method selection
    return redirect()->route('checkout.payment-method');
}
public function showPaymentMethodForm()
{
    $bill = Bill::where('user_id', Auth::id())->latest()->first();
    if (!$bill) {
            return redirect()->back()->with('error', 'Không tìm thấy hóa đơn.');
        }
    return view('user.checkout.checkout_payment',compact('bill'));
}

public function storePaymentMethod(Request $request)
{

    // Validate payment method
    $validatedData = $request->validate([
        'method_id' => 'required|exists:bank_methods,id',
    ]);


    // Store payment method in session
    session([
        'checkout.payment_method' => $validatedData['method_id']
    ]);

    // Redirect to bill summary
    return redirect()->route('checkout.bill-summary');
}
public function showBillSummary()
{
    // Retrieve stored session data
    $customerInfo = session('checkout.customer_info');
    $paymentMethod = session('checkout.payment_method');
    $cartItems = Cart::where('user_id', Auth::id())->get(); // Lấy sản phẩm trong giỏ hàng
    $total = $cartItems->sum(function($item) {
        return $item->variant->sale_price * $item->quantity;
    });

    return view('user.checkout.checkout_done', compact('customerInfo', 'paymentMethod', 'cartItems', 'total'));
}
public function storeBill()
{
    // Lấy thông tin khách hàng và phương thức thanh toán từ session
    $customerInfo = session('checkout.customer_info');
    $paymentMethod = session('checkout.payment_method');
    $cartItems = Cart::where('user_id', Auth::id())->get();
    $total = $cartItems->sum(function($item) {
        return $item->variant->sale_price * $item->quantity;
    });

    // Tạo hóa đơn mới
    $bill = Bill::create([
        'bill_code' => uniqid('BILL-'),
        'bill_status' => 1, // Chờ xác nhận
        'user_id' => Auth::id(),
        'user_name' => $customerInfo['user_name'],
        'user_address' => $customerInfo['user_address'],
        'user_tel' => $customerInfo['user_tel'],
        'total' => $total,
        'payment_status' => 0, // Chưa thanh toán
        'method_id' => $paymentMethod,
    ]);

    // Lưu các mục hóa đơn (bill items)
    foreach ($cartItems as $item) {
        BillItem::create([
            'bill_id' => $bill->id,
            'variant_list_price' => $item->variant->list_price,
            'variant_sale_price' => $item->variant->sale_price,
            'variant_import_price' => $item->variant->import_price,
            'quantity' => $item->quantity,
            'variant_id' => $item->variant_id,
            'product_id' => $item->variant->product_id,
            'product_name' => $item->variant->product->name,
            'product_image' => $item->variant->product->image,
        ]);
    }

    // Lưu lịch sử hóa đơn
    BillHistory::create([
        'bill_id' => $bill->id,
        'from_status' => null,
        'to_status' => 1, // Chờ xác nhận
        'note' => 'Khách hàng đã tạo đơn hàng và chọn phương thức thanh toán.',
        'by_user' => Auth::id(),
        'at_datetime' => now(),
    ]);

    // Xóa giỏ hàng
    Cart::where('user_id', Auth::id())->delete();
    
    // Xóa session mã giảm giá và tổng giảm giá
    session()->forget(['applied_vouchers', 'total_discount', 'total_after_discount', 'total_amount']);

    // Redirect hoặc thông báo thành công
    return redirect()->route('home')->with('success', 'Thành công!');
}



}
