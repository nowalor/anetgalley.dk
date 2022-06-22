<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductAdditionalImage extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = ['product_id', 'name'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
