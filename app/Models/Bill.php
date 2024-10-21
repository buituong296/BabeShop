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

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function bankMethod()
    {
        return $this->belongsTo(BankMethod::class, 'method_id');
    }
    public function billStatus()
    {
        return $this->belongsTo(BillStatus::class, 'bill_status');
    }
}
