<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = ['name'];
    public function variants()
    {
        return $this->hasMany(Variant::class);
    }
    public function products()
    {
        return $this->hasMany(Product::class); // Mối quan hệ với model Product
    }
}
