<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Address;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AddressController extends Controller
{
    public function address() {
        $user_id = Auth::id();
        $addresses = Address::where('user_id', $user_id)->get();
    
        return view('user.info.address', compact('addresses'));
    }
    public function update(Request $request, $id)
{
    $user_id = Auth::id();

    // Validate request
    $request->validate([
        'city' => 'required|string|max:255',
        'address' => 'required|string|max:255',
        'primary' => 'nullable|boolean', // Ensure this is a boolean
    ]);

    // Update address
    $address = Address::where('user_id', $user_id)->findOrFail($id);
    $address->city = $request->city;
    $address->address = $request->address;

    // Check if the primary checkbox is checked
    if ($request->has('primary') && $request->primary == '1') {
        // Set all other addresses to not primary
        Address::where('user_id', $user_id)->update(['status' => 0]);
        $address->status = 1; // Set current address as primary
    } else {
        $address->status = 0; // If unchecked, ensure it's not primary
    }

    $address->save();

    return redirect()->back()->with('success', 'Địa chỉ đã được cập nhật.');
}

public function setPrimary(Request $request, $id)
{
    $user_id = Auth::id();

    // Set all addresses of the user to status 0 (not primary)
    Address::where('user_id', $user_id)->update(['status' => 0]);

    // Set the selected address to status 1 (primary)
    $address = Address::where('user_id', $user_id)->findOrFail($id);
    $address->status = 1;
    $address->save();

    return redirect()->back()->with('success', 'Địa chỉ chính đã được cập nhật.');
}


    
}
