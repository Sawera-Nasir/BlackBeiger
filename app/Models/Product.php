<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model       
{
    use HasFactory;
    protected $fillable = [
        'title',
        'slug',
        'description',
        'image',
        'price',
        'compare_price',
        'discount',
        'sku',
        'barcode',
        'track_qty',
        'qty',
        'status',
        'productSection',
        'is_featured',
    ];
    public function getComparePriceAttribute($value)
    {
        if ($this->discount) {
            return $this->price + ($this->price * $this->discount / 100);
        }

        return $value;
    }

}
