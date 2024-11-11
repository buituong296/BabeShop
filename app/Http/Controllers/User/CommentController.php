<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\CommentUser;
use App\Models\Product;
use App\Models\Variant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use function Laravel\Prompts\select;

class CommentController extends Controller
{
    public function index(){
        $products = Product::join('comment_users','products.id','=','comment_users.product_id')
        ->where('user_id', Auth::id())->select('products.image','products.name','products.id','comment_users.is_comment')->get();
        return view('user.comment.user_index')->with([
            'products' => $products
        ]);
    }
    public function addComment($id){
        $product = Product::where('id', $id)->first();
        $variants = Variant::where('product_id',$id)->get();
        return view('user.comment.user_add')->with([
            'product' => $product,
            'variants' => $variants
        ]);
    }
    public function addPostComment(Request $req){
        $req->validate([
            'rating' => 'required',
            'comment' => 'required| max:300',
        ], [
            'rating.required' => 'Vui lòng chịn đánh giá.',
            'comment.max' => 'bình luận không được vượt quá 300 ký tự.'
        ]);
    
        $comment = Comment::create([
            'user_id' => Auth::id(),
            'product_id' => $req->product_id,
            'variant_id' => $req->variant_id,
            'rating' => $req->rating,
            'comment' => $req->comment
        ]);

        $commentUser = CommentUser::where('user_id', Auth::id())->where('product_id', $req->product_id)->first();
        $commentUser->update([
            'is_comment' => 1
        ]);

        $productRating = Product::where('id', $req->product_id)->first();
        $averageRating = Comment::where('product_id', $req->product_id)->avg('rating');
        $averageRating = round($averageRating, 2);
        $productRating->rating = $averageRating;
        $productRating->save();
        
        if ($req->hasFile('album')) {
            foreach ($req->file('album') as $albumImage) {
                $albumPath = $albumImage->store('public/albums');
                $comment->album()->create(['image' => basename($albumPath)]);
            }
        }
    
        return redirect()->route('comment')->with('success', 'Sản phẩm đã được thêm thành công!');
    }
    public function detailComment($id){
        $comment = Comment::where('product_id', $id)->first();
        $product = Product::where('id', $id)->first();
        $variant = Variant::where('id',$comment->variant_id)->first();
        return view('user.comment.user_detail')->with([
            'product' => $product,
            'variant' => $variant,
            'comment' => $comment
        ]);
    }
}
