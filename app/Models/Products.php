<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Categories;

class Products extends Model
{
    protected $table = 'products';

    protected $fillable = [
        'category_id',
        'image_id',
        'name',
        'description',
    ];

    public function category()
    {
        return $this->belongsTo(Categories::class, 'category_id', 'id');
    }

    public function images()
    {
        return $this->belongsTo(Images::class, 'image_id', 'id');
    }
}
