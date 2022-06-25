<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
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
        'condition',
        'quantity',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function productAdditionalImages()
    {
        return $this->hasMany(ProductAdditionalImage::class);
    }

    public function productImageUrl(): Attribute
    {
        return Attribute::make(
            get: fn($value) => asset('storage/product-images/' . $this->id . '/' . $this->image_url),
        );
    }
}
