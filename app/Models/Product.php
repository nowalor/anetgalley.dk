<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'name',
        'price' ,
        'description',
        'image_url',
        'has_additional_info',
        'dimensions',
        'weight',
        'material',
        'condition'
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
