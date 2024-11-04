<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Product;
use App\Models\Variant;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index()
    {
        $comments = Comment::get();
        return view('admin.comments.index')->with([
            'comments' => $comments
        ]);
    }
    public function show($id)
    {
        $comment = Comment::where('id', $id)->first();
        $product = Product::where('id', $comment->product_id)->first();
        $variant = Variant::where('id',$comment->variant_id)->first();
        return view('admin.comments.show')->with([
            'product' => $product,
            'variant' => $variant,
            'comment' => $comment
        ]);
    }
}
