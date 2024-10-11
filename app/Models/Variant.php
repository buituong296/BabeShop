<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Variant extends Model
{
    use HasFactory;
    protected $fillable = ['product_id', 'color_id', 'size_id', 'stock', 'list_price', 'sale_price', 'import_price'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    public function color()
    {
        return $this->belongsTo(Color::class); // Mối quan hệ với model Color
    }

    public function size()
    {
        return $this->belongsTo(Size::class); // Mối quan hệ với model Size
    }
    public function category()
    {
        return $this->belongsTo(Category::class); // Mối quan hệ với model Category
    }
}
