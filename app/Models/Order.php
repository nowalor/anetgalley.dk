<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Str;

class Order extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'uuid',
        'product_id',
        'method',
        'completed_at',
        'quantity',
        'delivery_type',
        'country_id',
        'city',
        'zip_code',
        'address',
        'buyer_name',
        'buyer_phone',
        'buyer_email',
    ];

    const DELIVERY_TYPE_LOCATION_A = 'location_a';
    const DELIVERY_TYPE_LOCATION_B = 'location_B';
    const DELIVERY_TYPE_DELIVERY_DENMARK = 'delivery_denmark';
    const DELIVERY_TYPE_DELIVERY_OUTSIDE_DENMARK = 'delivery_outside_denmark';

    const DELIVERY_TYPES = [
        self::DELIVERY_TYPE_LOCATION_A,
        self::DELIVERY_TYPE_LOCATION_B,
        self:: DELIVERY_TYPE_DELIVERY_DENMARK,
        self::DELIVERY_TYPE_DELIVERY_OUTSIDE_DENMARK,
    ];

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function invoice(): HasOne
    {
        return $this->hasOne(Invoice::class);
    }

    public function country(): BelongsTo
    {
        return $this->belongsTo(Country::class);
    }

    public static function createUUID(): mixed
    {
        $uuid = Str::random(20);

        if(self::where('uuid', $uuid)->exists()) {
            return self::createUUID();
        }

        return $uuid;
    }
}
