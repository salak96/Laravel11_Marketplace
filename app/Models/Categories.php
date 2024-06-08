<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Categories extends Model
{
    use HasFactory;
    //file yang masuk database kalau banyak protected $guardted = [];
    protected $guarded = [];
    
    public function products():HasMany
    {
    return $this->hasMany(Product::class,'categories_id','id'); 

    }
}