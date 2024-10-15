<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductAlbum extends Model
{
    use HasFactory;
    protected $fillable = ['product_id', 'image']; // Thêm trường 'image' vào fillable
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
