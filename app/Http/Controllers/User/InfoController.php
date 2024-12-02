<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User; // Import the User model
use Illuminate\Support\Facades\Hash;

class InfoController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('user.info.index', compact('user'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();
        $request->validate([
            'name' => 'required|string|max:255',
         
        ]);
        $user->update($request->all());
        return redirect()->route('user-info')->with('success', 'Tên đã được cập nhât');
    }
    public function updateContact(Request $request)
    {
        $user = Auth::user();
        $request->validate([
            'email' => 'required|string|max:255|unique:users,email,' . $user->id,
            'tel' => 'required|numeric|digits_between:10,11',
        ], [
            'email.unique' => 'Email đã được sử dụng.',
        ]);
        $user->update($request->all());
        return redirect()->route('user-info')->with('success', 'Địa chỉ liên lạc đã được cập nhật');
    }
    public function updatePassword(Request $request)
    {
        $user = Auth::user();
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:8|confirmed',
        ]);
        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'Mật khẩu hiện tại không đúng.']);
        }
        
        Auth::user()->update([
            'password' => Hash::make($request->new_password),
        ]);
       
        return redirect()->route('user-info')->with('success', 'Mật khẩu mới đã được cập nhật');

    }
    public function delete()
    {
        $user = Auth::user();

        if ($user) {
   
            $user->is_locked = 2;
            $user->save();
            Auth::logout();

            return redirect('/')->with('status', 'Account locked successfully.');
        }

        return redirect()->back()->with('error', 'User not found.');
    }
}
