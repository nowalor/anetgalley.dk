<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $fillable = ['order_id', 'buyer_name', 'buyer_email', 'buyer_phone'];

    protected function dueDate(): Attribute {
        return Attribute::make(
            get: fn() => $this->created_at->addDays(30),
        );
    }
}
