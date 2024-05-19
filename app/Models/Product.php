<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function category()
    {
        return $this->belongsTo(Categories::class, 'categories_id','id');
    }
    

    public function detailProduct (): HasMany
    {
        return $this->hasMany(DetailProduct::class, 'product_id', 'id');
    } 
 
}