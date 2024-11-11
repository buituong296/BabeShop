<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;

    // Specify the table name if it's not the default (optional)
    // protected $table = 'notifications';

    // Specify the fillable attributes for mass assignment
    protected $fillable = [
        'type',
        'message',
        'user_id',
        'is_read',
    ];

    // Define any relationships if needed (e.g., with the User model)
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
