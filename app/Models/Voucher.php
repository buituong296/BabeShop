<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voucher extends Model
{
    use HasFactory;

    // Khai báo các thuộc tính có thể gán hàng loạt
    protected $fillable = [
        'code',
        'percentage',
        'description',
        'start',
        'end',
        'quantity',
        'used_quantity',
    ];

    // Định nghĩa quan hệ với bảng bills
    public function bills()
    {
        return $this->hasMany(Bill::class, 'voucher_id');
    }
}
