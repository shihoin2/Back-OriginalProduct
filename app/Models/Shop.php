<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    use HasFactory;

    public function products()
    {
        // return $this->belongsToMany(Product::class);
        return $this->belongsToMany(Product::class, 'shop_products', 'shops_id', 'products_id');
    }
    protected $fillable = [
        'id',
        'name',
        'address',
        'tel',
        'latitude',
        'longitude',
        'created_at',
        'updated_at',
    ];
}
