<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use SebastianBergmann\CodeCoverage\Report\Xml\Unit;

class Product extends Model
{
    use HasFactory;

    protected  $guarded=[];

    
    public function category(): BelongsTo
    {
        return $this->belongsTo(Categories::class, 'categories_id', 'id');
    }

    public function detailProduct(): HasMany
    {
        return $this->hasMany(detailProduct::class, 'product_id', 'id');
    }

    public function shops(): BelongsTo
    {
        return $this->belongsTo(Shop::class, 'shop_id', 'id');
    }

    public function units(): BelongsTo
    {
        return $this->belongsTo(units::class, 'unit_id', 'id');
    }


    
}