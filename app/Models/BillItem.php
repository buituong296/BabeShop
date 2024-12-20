<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BillItem extends Model
{
    use HasFactory;
    protected $fillable = [
        'bill_id',
        'variant_list_price',
        'variant_sale_price',
        'variant_import_price',
        'quantity',
        'variant_id',
        'product_id',
        'product_name',
        'product_image'
    ];


    public function bills() {
        return $this->belongsTo(Bill::class);
    }
    public function variants()
    {
        return $this->belongsTo(Variant::class,'variant_id');
    }

}
