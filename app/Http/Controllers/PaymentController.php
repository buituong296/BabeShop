<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
use App\Models\Bill;

class PaymentController extends Controller
{
    protected $vnp_TmnCode;
    protected $vnp_HashSecret;
    protected $vnp_Url;
    protected $vnp_ReturnUrl;
    public function showVNPayForm(Request $request)
    {
        $cartItems = Cart::where('user_id', Auth::id())->get();
        // Check if there's a discount applied and use it; otherwise, use the regular total.
        $total = session()->has('total_after_discount') ? session('total_after_discount') : $cartItems->sum(function($item) {
            return $item->variant->sale_price * $item->quantity;
        });

        return view('user.checkout.checkout_online', compact('total', 'cartItems'));
    }


    public function __construct()
    {
        // Load VNPay configuration from environment or config
        $this->vnp_TmnCode = env('VNP_TMN_CODE');
        $this->vnp_HashSecret = env('VNP_HASH_SECRET');
        $this->vnp_Url = env('VNP_URL');
        $this->vnp_ReturnUrl = env('VNP_RETURN_URL');
    }

    public function createPayment(Request $request)
    {
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        // Gather payment details
        $vnp_TxnRef = uniqid(); // Unique transaction ID
        $vnp_Amount = $request->input('amount') * 100; // Convert to cents
        $vnp_Locale = $request->input('language', 'vn'); // Payment locale
        $vnp_BankCode = $request->input('bankCode'); // Optional bank code
        $vnp_IpAddr = $request->ip(); // Customer's IP address
        $totalAmount = $request->input('total_amount') * 100; // Nhân 100 để chuyển thành VND

        // Prepare data for VNPay
        $inputData = [
            "vnp_Version" => "2.1.0",
            "vnp_TmnCode" => $this->vnp_TmnCode,
            "vnp_Amount" => $vnp_Amount,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => now()->format('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => "Payment for order: " . $vnp_TxnRef,
            "vnp_OrderType" => "other",
            "vnp_ReturnUrl" => $this->vnp_ReturnUrl,
            "vnp_TxnRef" => $vnp_TxnRef,
            "vnp_ExpireDate" => now()->addMinutes(15)->format('YmdHis')
        ];

        if ($vnp_BankCode) {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
        }

        // Sort data and create query
        ksort($inputData);
        $query = '';
        $hashData = '';
        foreach ($inputData as $key => $value) {
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
            $hashData .= urlencode($key) . "=" . urlencode($value) . '&';
        }
        $query = rtrim($query, '&');
        $hashData = rtrim($hashData, '&');

        // Generate secure hash
        $vnpSecureHash = hash_hmac('sha512', $hashData, $this->vnp_HashSecret);
        $vnp_Url = $this->vnp_Url . "?" . $query . '&vnp_SecureHash=' . $vnpSecureHash;

        // Redirect to VNPay
        return redirect($vnp_Url);
    }

    public function paymentReturn(Request $request)
    {
        // Retrieve all payment data from the return URL
        $vnp_SecureHash = $request->input('vnp_SecureHash');
        $inputData = $request->except('vnp_SecureHash', 'vnp_SecureHashType');

        // Validate secure hash
        ksort($inputData);
        $hashData = '';
        foreach ($inputData as $key => $value) {
            $hashData .= urlencode($key) . "=" . urlencode($value) . '&';
        }
        $hashData = rtrim($hashData, '&');
        $calculatedHash = hash_hmac('sha512', $hashData, $this->vnp_HashSecret);

        if ($vnp_SecureHash === $calculatedHash) {
            // Hash is valid, check response code
            if ($request->input('vnp_ResponseCode') == '00') {
                // Payment successful
                return view('user.checkout.vnpay_return', [
                    'transactionId' => $request->input('vnp_TransactionNo'),
                    'orderInfo' => $request->input('vnp_OrderInfo'),
                    'amount' => $request->input('vnp_Amount') / 100,
                    'bankCode' => $request->input('vnp_BankCode'),
                    'payDate' => $request->input('vnp_PayDate')
                ]);
            } else {
                // Payment failed
                return view('user.payment.fail', [
                    'message' => 'Payment was not successful. Response Code: ' . $request->input('vnp_ResponseCode')
                ]);
            }
        } else {
            // Invalid hash
            return view('user.payment.fail', [
                'message' => 'Invalid signature. Payment cannot be verified.'
            ]);
        }
    }
}
