<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Size extends Model
{
    use HasFactory;

    use SoftDeletes;
    protected $fillable = ['name', 'width', 'height'];
    public function variants()
    {
        return $this->hasMany(Variant::class);
    }
}
