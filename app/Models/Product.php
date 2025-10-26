<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    // ✅ Allow mass assignment for these fields
    protected $fillable = ['name', 'price', 'category_id'];

    // ✅ Relationship: A product belongs to one category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
