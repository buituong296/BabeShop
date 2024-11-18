<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    public function notification() {
        $user_id = Auth::id();
        $noti = Notification::where('user_id', $user_id)->latest('id')->get();
    
        return view('user.info.notification', compact('noti'));
    }
}
