<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BillHistory extends Model
{
    use HasFactory;
    protected $fillable = [
        'bill_id',
        'from_status',
        'to_status',
        'note',
        'by_user',
        'at_datetime'
    ];
}
