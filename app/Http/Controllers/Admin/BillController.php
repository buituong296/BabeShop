<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Bill;
use App\Models\BillHistory;
use App\Models\BillItem;
use App\Models\BillStatus;
use App\Models\CommentUser;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Traits\Searchable;

class BillController extends Controller
{
    use Searchable;
    public function index(Request $request)
    {
        $query = $request->input('query'); // Lấy từ khóa tìm kiếm từ request
        $bills = $this->search(Bill::class, $query, ['bill_code', 'user_name', 'user_tel']); // Dùng trait
        return view('admin.bills.index')->with([
            'bills' => $bills,
            'query'
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
            3 => [1, 2, 6, 7, 8],
            4 => [1, 2, 3, 5, 6, 8],
            5 => [1, 2, 3, 4, 6, 7, 8],
            6 => [1, 2, 3, 4, 5, 8],
            7 => [1, 2, 3, 4, 5, 6, 8],
            8 => [1, 2, 3, 4, 5, 6, 7, 8]
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
                        3 => [1, 2, 6, 7, 8],
                        4 => [1, 2, 3, 5, 6, 8],
                        5 => [1, 2, 3, 4, 6, 7, 8],
                        6 => [1, 2, 3, 4, 5, 8],
                        7 => [1, 2, 3, 4, 5, 6, 8],
                        8 => [1, 2, 3, 4, 5, 6, 7, 8]
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
        $cancel = Bill::where('id', $id)->select('bill_status')->first();
        if ($req->toStatus == '5' && $req->note == null) {
            return back()->withErrors(

'Sửa thất bại do thiếu ghi chú'
            );
        } else if ($cancel->bill_status == '5') {
            return redirect()->route('bills.index')->withErrors(

'Sửa thất bại do khách hàng đã hủy đơn'
            );
        } else{
            Bill::where('id', $id)->update($billData);
            BillHistory::create($billHistoryData);
            return redirect()->route('bills.index')->with([
                'message' => 'Sửa thành công'
            ]);
        }
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
    // Lấy thông tin hóa đơn
    $bill = Bill::where('id', $id)->first();

    // Lấy các sản phẩm trong hóa đơn và include cả những biến thể đã bị soft delete
    $billProducts = BillItem::where('bill_id', $bill->id)
        ->with(['variants' => function ($query) {
            $query->withTrashed(); // Bao gồm cả các biến thể đã bị soft delete
        }])
        ->get();

    // Lấy lịch sử của hóa đơn
    $billHistories = BillHistory::where('bill_id', $bill->id)->get();

    $total = 0;

    return view('admin.bills.show')->with([
        'bill' => $bill,
        'billProducts' => $billProducts,
        'billHistories' => $billHistories,
        'total' => $total
    ]);
}

    public function filterBills(Request $request)
    {
        $query = Bill::query(); // Tạo query builder cho model Bill

        // Lọc theo giá
        if ($request->filled('price_from') && $request->filled('price_to')) {
            $query->whereBetween('total', [$request->input('price_from'), $request->input('price_to')]);
        } elseif ($request->filled('price_from')) {
            $query->where('total', '>=', $request->input('price_from'));
        } elseif ($request->filled('price_to')) {
            $query->where('total', '<=', $request->input('price_to'));
        }

        // Lọc theo trạng thái
        if ($request->filled('status') && in_array($request->input('status'), [1, 2, 3, 4, 5, 7])) {
            $query->where('bill_status', $request->input('status'));
        }

        // Lọc theo ngày
        if ($request->filled('start_date') && $request->filled('end_date')) {
            $query->whereBetween('updated_at', [$request->input('start_date'), $request->input('end_date')]);
        } elseif ($request->filled('start_date')) {
            $query->where('updated_at', '>=', $request->input('start_date'));
        } elseif ($request->filled('end_date')) {
            $query->where('updated_at', '<=', $request->input('end_date'));
        }

        // Lấy các đơn hàng đã lọc
        $bills = $query->get();

        return view('admin.bills.index', compact('bills'));
    }

}
