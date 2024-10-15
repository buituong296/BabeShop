<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class FilterController extends Controller
{
    public function index(){
        $categories = Category::all();
        $products = Product::all();
        return view('user.product',compact('categories','products'));
    }
}
