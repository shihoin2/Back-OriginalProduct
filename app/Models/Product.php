<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function shops()
    {
        // return $this->belongsToMany(Shop::class);
        return $this->belongsToMany(Shop::class, 'shop_products', 'products_id', 'shops_id');
    }

    protected $fillable = [
        'id',
        'name',
        'manufacturer',
        'image_name',
        'imaeg_path',
        'JDD2021_code',
        'FFPWD_code',
        'UDF_code',
        'SCF_code',
        'reviews_id',
        'created_at',
        'updated_at',
    ];
}
