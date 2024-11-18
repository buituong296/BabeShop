<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory;

    use SoftDeletes;
    protected $fillable = ['name', 'price', 'image', 'description', 'category_id', 'quantity', 'is_leftover', 'rating'];

    public function variants()
    {
        return $this->hasMany(Variant::class);
    }
    public function category()
    {
        return $this->belongsTo(Category::class); // Mối quan hệ với model Category
    }
    public function album()
    {
        return $this->hasMany(ProductAlbum::class);
    }
    public function variant()
{
    return $this->hasOne(Variant::class);
}
public function comments()
{
    return $this->hasMany(Comment::class, 'product_id');
}

}
