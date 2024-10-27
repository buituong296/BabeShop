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
        ->select('products.image','products.name','products.id','comment_users.is_comment')->get();
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
            'comment' => 'required| max:100',
        ], [
            'rating.required' => 'Vui lòng chịn đánh giá.',
            'comment.max' => 'Ghi chú không được vượt quá 100 ký tự.'
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
        $productRating->update([
                'rating' => $averageRating
            ]);
        
        if ($req->hasFile('album')) {
            foreach ($req->file('album') as $albumImage) {
                $albumPath = $albumImage->store('public/albums');
                $comment->album()->create(['image' => basename($albumPath)]);
            }
        }
    
        return redirect()->route('comment')->with('success', 'Sản phẩm đã được thêm thành công!');
    }
    public function detailComment(){
        
    }
}
