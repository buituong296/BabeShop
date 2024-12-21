<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Variant extends Model
{
    use HasFactory;

    use SoftDeletes;
    protected $fillable = ['product_id', 'color_id', 'size_id', 'stock', 'list_price', 'sale_price', 'import_price'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    public function color()
{
    return $this->belongsTo(Color::class)->withTrashed();
}

public function size()
{
    return $this->belongsTo(Size::class)->withTrashed();
}

    public function category()
    {
        return $this->belongsTo(Category::class); // Mối quan hệ với model Category
    }
}
