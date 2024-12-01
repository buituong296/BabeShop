<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WallofTextController extends Controller
{
    public function support(){
        return view('user.pages.support');
    }
    public function addresses(){
        return view('user.pages.address');
    }
    public function terms(){
        return view('user.pages.terms');
    }
    public function contact(){
        return view('user.pages.contact');
    }
    public function about(){
        return view('user.pages.about');
    }
}
