<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'name',
        'image_name',
        'short_description',
        'starts_at',
        'ends_at',
        'event_url'
    ];

    public function getDates()
    {
        return [
            'starts_at',
            'ends_at',
        ];
    }

    public function formattedFromToDate(): Attribute
    {
        return Attribute::make(
            get: fn() => $this->starts_at->format('d/m/Y') . '-' . $this->ends_at->format('d/m/Y'),
        );
    }
}
