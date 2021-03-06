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
            get: fn() => $this->starts_at->format('m/d/Y') . ' - ' . $this->ends_at->format('m/d/Y'),
        );
    }

    public function imageUrl(): Attribute
    {
        return Attribute::make(
            get: fn() => asset("storage/event-images/$this->id/$this->image_name"),
        );
    }
}
