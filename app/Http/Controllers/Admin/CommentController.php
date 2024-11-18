<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Notification;
use App\Models\Product;
use App\Models\Variant;
use Illuminate\Http\Request;
use App\Traits\Searchable;
use App\Models\User;

class CommentController extends Controller
{
    use Searchable;
    public function index(Request $request)
    {
        $query = $request->input('query'); // Lấy từ khóa tìm kiếm từ request
        $comments = $this->search(Comment::class, $query, ['product_id']); // Dùng trait

        $products = $this->search(Product::class, $query, ['name']); // Dùng trait
        // $commentTotal = $comments->count();
        return view('admin.comments.index')->with([
            'comments' => $comments,
            'products' => $products,
            'query'
            // 'ratings' => $ratings,
            // 'commentTotal' => $commentTotal,
            // 'ratings' => $ratings,
            // 'commentTotal' => $commentTotal,
        ]);
    }

    public function list($id)
    {
        $comments = Comment::where('product_id', $id)->with('product')->get();
        $name = Product::where('id', $id)->pluck('name')->first();
        return view('admin.comments.list')->with([
            'comments' => $comments,
            'name' => $name,
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
    public function destroy(Request $request, $id)
    {
        $comment = Comment::findOrFail($id);

        // Capture the reason from the request
        $message = $request->input('message');

        $comment->status = 1;
        $comment->save();

        Notification::create([
            'type' => 'Bình luận của bạn đã bị xóa',
            'message' => "Bình luận ' {$comment->comment} ' đã bị xóa. Lí do: {$message}",
            'user_id' => $comment->user_id, // Assuming the notification is related to the comment's user
            'is_read' => true, // Default to unread
        ]);

        return redirect()->route('comments.index')->with('status', "Comment status changed successfully. Reason:");
    }

}
