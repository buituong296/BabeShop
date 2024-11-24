<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
class UserController extends Controller
{
    // Hiển thị danh sách tài khoản
    public function index()
    {
        $users = User::select('id', 'name', 'email', 'role_id', 'is_locked')->get();

        return view('admin.users.index', compact('users'));
    }

    // Khóa hoặc mở khóa tài khoản
    public function lock($id)
    {
        $user = User::findOrFail($id);
        $user->is_locked = !$user->is_locked; // Đảo trạng thái
        $user->save();

        return redirect()->route('admin.users.index')->with('success', 'Cập nhật trạng thái thành công.');
    }
}
