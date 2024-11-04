<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    /**
     * Get the category that owns the product.
     */

    protected $fillable = ['name', 'category_id', 'description', 'price', 'quantity', 'sku'];
    
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
