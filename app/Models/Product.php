<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $fillable = [
        'product_name',
        'product_description',
        'product_price',
        'product_sale_price',
        'product_category',
        'product_available_quantity',
        'sale_out_of_stock'
    ];

    public function galleries()
    {
        return $this->hasMany(ProductGallery::class, 'product_id');
    }

    public function category()
    {
        return $this->belongsTo(
            ProductCategory::class,
            'product_category',
            'id'
        );
    }
}
