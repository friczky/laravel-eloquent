<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Products;

class Categories extends Model
{
    protected $table = 'categories';

    protected $fillable = [
        'name'
    ];

    public function products()
    {
        return $this->hasMany(Products::class, 'category_id');
    }
}
