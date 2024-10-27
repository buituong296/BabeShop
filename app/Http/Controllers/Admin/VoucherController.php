<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Voucher;
use Illuminate\Http\Request;

class VoucherController extends Controller
{
    public function index()
    {
        $vouchers = Voucher::all(); // Lấy tất cả vouchers
        return view('admin.vouchers.index', compact('vouchers'));
    }

        public function create()
    {
        return view('admin.vouchers.create'); // Hiển thị form thêm voucher
    }

        public function store(Request $request)
    {
        // Xác thực dữ liệu đầu vào
        $request->validate([
            'code' => 'required|string|max:10|unique:vouchers,code',
            'percentage' => 'required|integer|min:1|max:100',
            'quantity' => 'required|integer|min:1',
            'start' => 'required|date',
            'end' => 'required|date|after:start',
        ]);

        // Tạo voucher mới
        Voucher::create([
            'code' => $request->code,
            'percentage' => $request->percentage,
            'description' => $request->description,
            'start' => $request->start,
            'end' => $request->end,
            'quantity' => $request->quantity,
            'used_quantity' => 0,
        ]);

        return redirect()->route('vouchers.index')->with('success', 'Thêm mã giảm giá thành công.');
    }

        public function edit($id)
    {
        $voucher = Voucher::findOrFail($id); // Tìm voucher theo ID
        return view('admin.vouchers.edit', compact('voucher'));
    }

        public function update(Request $request, $id)
    {
        // Xác thực dữ liệu đầu vào
        $request->validate([
            'code' => 'required|string|max:10|unique:vouchers,code,' . $id,
            'percentage' => 'required|integer|min:1|max:100',
            'quantity' => 'required|integer|min:1',
            'start' => 'required|date',
            'end' => 'required|date|after:start',
        ]);

        // Cập nhật voucher
        $voucher = Voucher::findOrFail($id);
        $voucher->update([
            'code' => $request->code,
            'percentage' => $request->percentage,
            'description' => $request->description,
            'start' => $request->start,
            'end' => $request->end,
            'quantity' => $request->quantity,
        ]);

        return redirect()->route('vouchers.index')->with('success', 'Cập nhật mã giảm giá thành công.');
    }

        public function destroy($id)
    {
        $voucher = Voucher::findOrFail($id);
        $voucher->delete();

        return redirect()->route('vouchers.index')->with('success', 'Xóa mã giảm giá thành công.');
    }
}
