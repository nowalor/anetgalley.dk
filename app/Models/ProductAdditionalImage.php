<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class ProductAdditionalImage extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = ['product_id', 'name'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function url(): Attribute
    {
        return Attribute::make(
            get: fn($value) => asset('storage/product-images/' . $this->product_id . '/additional/' . $this->id . '/' . $this->name),
        );
    }
}
