<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommentAlbum extends Model
{
    use HasFactory;
    protected $fillable = ['comment_id', 'image'];
    public function Comment()
    {
        return $this->belongsTo(Comment::class);
    }
}
