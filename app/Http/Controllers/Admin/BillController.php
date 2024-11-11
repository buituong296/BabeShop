<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Bill;
use App\Models\BillHistory;
use App\Models\BillItem;
use App\Models\BillStatus;
use App\Models\CommentUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BillController extends Controller
{
    public function index()
    {
        $bills = Bill::orderBy('created_at', 'desc')->get();
        return view('admin.bills.index')->with([
            'bills' => $bills
        ]);
    }
    public function edit($id)
    {
        $bill = Bill::where('id', $id)->first();
        $billProducts = BillItem::where('bill_id', $bill->id)->get();
        $billHistories = BillHistory::where('bill_id', $bill->id)->get();
        $billStatuses = BillStatus::get();
        $total = 0;
        $restrictedStatuses = [
            1 => [3, 4, 6, 7, 8],
            2 => [1, 4, 5, 6, 7, 8],
            3 => [1, 2, 6, 7],
            4 => [1, 2, 3, 5, 8],
            5 => [1, 2, 3, 4, 6, 7, 8],
            6 => [1, 2, 3, 4, 5],
            7 => [1, 2, 3, 4, 5, 6, 8],
            8 => [1, 2, 3, 4, 5, 6, 7]
        ];
        $blockedOptions = $restrictedStatuses[$bill->bill_status] ?? [];
        return view('admin.bills.edit')->with([
            'bill' => $bill,
            'billProducts' => $billProducts,
            'billHistories' => $billHistories,
            'billStatuses' => $billStatuses,
            'total' => $total,
            'blockedOptions' => $blockedOptions
        ]);
    }
    public function update(Request $req, $id)
    {
        $req->validate([
            'toStatus' => [
                'required',
                'different:fromStatus',
                function ($attribute, $value, $fail) use ($req) {
                    $fromStatus = $req->input('fromStatus');
                    $invalidStatus = [
                        1 => [3, 4, 6, 7, 8],
                        2 => [1, 4, 5, 6, 7, 8],
                        3 => [1, 2, 6, 7],
                        4 => [1, 2, 3, 5, 8],
                        5 => [1, 2, 3, 4, 6, 7, 8],
                        6 => [1, 2, 3, 4, 5],
                        7 => [1, 2, 3, 4, 5, 6, 8],
                        8 => [1, 2, 3, 4, 5, 6, 7]
                    ];
                    if (isset($invalidStatus[$fromStatus]) && in_array($value, $invalidStatus[$fromStatus])) {
                        $fail('Thay đổi không hợp lệ.');
                    }
                },
            ],
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
        if ($req->toStatus == 7) {
            $billItemIds = BillItem::where('bill_id', $id)->select('product_id')->get();
            foreach ($billItemIds as $item) {
                $exists = CommentUser::where('user_id', Auth::id())
                    ->where('product_id', $item->product_id)
                    ->exists();
                if (!$exists) {
                    $commentUser = [
                        'user_id' => Auth::id(),
                        'product_id' => $item->product_id
                    ];
                    CommentUser::create($commentUser);
                }

            }
            ;
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
        ]);
        ;

    }
    public function destroy($id)
    {
        BillHistory::where('bill_id', $id)->delete();
        BillItem::where('bill_id', $id)->delete();
        Bill::where('id', $id)->delete();
        return redirect()->route('bills.index')->with([
            'message' => 'Xóa thành công'
        ]);
    }
    public function show($id)
    {
        $bill = Bill::where('id', $id)->first();
        $billProducts = BillItem::where('bill_id', $bill->id)->get();
        $billHistories = BillHistory::where('bill_id', $bill->id)->get();
        $total = 0;
        return view('admin.bills.show')->with([
            'bill' => $bill,
            'billProducts' => $billProducts,
            'billHistories' => $billHistories,
            'total' => $total
        ]);
        ;
    }

}
