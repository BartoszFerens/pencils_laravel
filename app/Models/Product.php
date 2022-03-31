<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;


    protected $fillable = [
        'name',
        'description',
        'created_by' ,
        'price',
        'brand_id',
        'image',

    ];

    public function media()
    {
        return $this->hasMany(ProductMedia::class);
    }

    /**
     * Get brand from product
     */
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
}
