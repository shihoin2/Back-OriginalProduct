<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    use HasFactory;

    public function products()
    {
        return $this->belongsToMany(Product::class, 'shops_products', 'products_id', 'shops_id');
    }
    protected $fillable = [
        'id',
        'name',
        'address',
        'latitude',
        'longitude',
        'created_at',
        'updated_at',
    ];
}
