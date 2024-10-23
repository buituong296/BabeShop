<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Bill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BillController extends Controller
{
    public function index(){
        $user_id = Auth::id();
        $bills = Bill::with(['billitems']) 
        ->where('user_id', $user_id)
        
        ->get();

        return view('user.bill.bill',compact('bills','user_id'));
    }
    public function details($id) {
        $bill = Bill::with(['billitems']) // Eager load user and bill items
            ->findOrFail($id); // Find the bill by ID or fail with a 404 error
    
        return view('user.bill.details', compact('bill'));
    }
}
