<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Bill;
use App\Models\BillHistory;
use App\Models\BillItem;
use App\Models\CommentUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BillController extends Controller
{
    public function index()
    {
        $user_id = Auth::id();
        $bills = Bill::with(['billitems'])
            ->where('user_id', $user_id)
            ->latest('id')
            ->paginate(5);


        return view('user.bill.bill', compact('bills', 'user_id'));
    }
    public function details($id)
    {
        $bill = Bill::with(['billitems']) // Eager load user and bill items
            ->findOrFail($id); // Find the bill by ID or fail with a 404 error

        return view('user.bill.details', compact('bill'));
    }

    public function billCancel($id)
    {
        $oldStatus = Bill::where('id', $id)->select('bill_status')->first();
        if ($oldStatus == '1') {
            $billData = [
                'bill_status' => 5,
            ];
            $billHistoryData = [
                'bill_id' => $id,
                'from_status' => 1,
                'to_status' => 5,
                'note' => 'Khách hàng xác nhận hủy đơn hàng',
                'by_user' => Auth::id(),
                'at_datetime' => now()
            ];
            Bill::where('id', $id)->update($billData);
            BillHistory::create($billHistoryData);
            return redirect()->route('bill-detail', ['id' => $id])->with([
                'message' => 'Hủy đơn hàng thành công'
            ]);
        } else {
            return redirect()->route('bill-detail', ['id' => $id])->withErrors(['bill_status' => 'Không thể hủy do đơn hàng đã được xác nhận'])->withInput();
        }
    }
    public function billSuccess($id)
    {
        $billData = [
            'bill_status' => 7,

        ];
        $billHistoryData = [
            'bill_id' => $id,
            'from_status' => 4,
            'to_status' => 7,
            'note' => 'Khách hàng xác nhận đã nhận được hàng',
            'by_user' => Auth::id(),
            'at_datetime' => now()
        ];
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
        Bill::where('id', $id)->update($billData);
        BillHistory::create($billHistoryData);

        return redirect()->route('bill-detail', ['id' => $id])->with([
            'message' => 'Xác nhận đơn hàng thành công'
        ]);
        ;
    }
    public function billReturn($id)
    {
        $billData = [
            'bill_status' => 6,
        ];
        $billHistoryData = [
            'bill_id' => $id,
            'from_status' => 4,
            'to_status' => 6,
            'note' => 'Khách hàng xác nhận hoàn trả hàng',
            'by_user' => Auth::id(),
            'at_datetime' => now()
        ];
        Bill::where('id', $id)->update($billData);
        BillHistory::create($billHistoryData);
        return redirect()->route('bill-detail', ['id' => $id])->with([
            'message' => 'Xác nhận trả hàng thành công'
        ]);
    }


}
