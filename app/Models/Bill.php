<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    use HasFactory;
    protected $fillable = [
        'bill_code',
        'bill_status',
        'user_id',
        'user_name',
        'user_address',
        'user_tel',
        'total',
        'payment_status',
        'method_id'
    ];

    public function billitems() {
        return $this->hasMany(BillItem::class); 
    }
}
