<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'product_id', 'bill_id', 'variant_id', 'rating', 'comment'];
    public function album()
    {
        return $this->hasMany(CommentAlbum::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
