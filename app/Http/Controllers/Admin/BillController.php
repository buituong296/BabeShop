<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Bill;
use App\Models\BillHistory;
use App\Models\BillItem;
use App\Models\BillStatus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BillController extends Controller
{
    public function index(){
        $bills = Bill::get();
        return view('admin.bills.index')->with([
            'bills'   => $bills
        ]);
    }
    public function edit($id){
        $bill = Bill::where('id', $id)->first();
        $billProducts = BillItem::where('bill_id', $bill->id)->get();
        $billHistories = BillHistory::where('bill_id', $bill->id)->get();
        $billStatuses = BillStatus::get();
        $total = 0;
        return view('admin.bills.edit')->with([
            'bill'   => $bill,
            'billProducts' => $billProducts,
            'billHistories' => $billHistories,
            'billStatuses' => $billStatuses,
            'total' => $total
        ]);;
    }
    public function update(Request $req, $id){
        $req->validate([
            'toStatus' => 'required|different:fromStatus',
            'note' => 'max:50'
        ], [
            'toStatus.different' => 'Trạng thái mới phải khác với trạng thái hiện tại.',
            'note.max' => 'Ghi chú không được vượt quá 50 ký tự.'
        ]);

        $billData = [
            'bill_status' => $req->toStatus,
            
        ];

        //nếu giao hàng thành công + thanh toán bằng cod thì mặc định là đã thanh toán thành công
        if ($req->toStatus == 4 && $req->methodId == 1) {
            $billData['payment_status'] = '1';
        }

        $billHistoryData = [
            'bill_id' => $id,
            'from_status' => $req->fromStatus,
            'to_status' => $req->toStatus,
            'note' => $req->note,
            'by_user' => Auth::id(),
            'at_datetime' => now()
        ];
        Bill::where('id', $id)->update($billData);
        BillHistory::create($billHistoryData);
        return redirect()->route('bills.index')->with([
            'message' => 'Sửa thành công'
        ]);;

    }
    public function destroy($id){
        BillHistory::where('bill_id', $id)->delete();
        BillItem::where('bill_id', $id)->delete();
        Bill::where('id', $id)->delete();
        return redirect()->route('bills.index')->with([
            'message' => 'Xóa thành công'
        ]);
    }
    public function show($id){
        $bill = Bill::where('id', $id)->first();
        $billProducts = BillItem::where('bill_id', $bill->id)->get();
        $billHistories = BillHistory::where('bill_id', $bill->id)->get();        $total = 0;
        return view('admin.bills.show')->with([
            'bill'   => $bill,
            'billProducts' => $billProducts,
            'billHistories' => $billHistories,
            'total' => $total
        ]);;
    }
}
