<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class HomepageInformation extends Model
{
    use HasFactory;

    protected $fillable = [
        'image_name',
        'title_en',
        'title_dk',
        'tagline_en',
        'tagline_dk',
    ];

    public $timestamps = false;

    public function url(): Attribute
    {
        return Attribute::make(
          get: function() {
              if($this->image_name) {
                  return asset('/storage/homepage/cta/' . $this->image_name);
              } else {
                  return null;
              }
            }
        );
    }

    public function title(): Attribute
    {
        return Attribute::make(
            get: function() {
                if(app()->getLocale() === 'en') {
                    return $this->getAttribute('title_en');
                } else if(app()->getLocale() === 'dk') {
                    return $this->getAttribute('title_dk');
                }
            }
        );
    }

    public function tagline(): Attribute
    {
        return Attribute::make(
            get: function() {
                if(app()->getLocale() === 'en') {
                    return $this->getAttribute('tagline_en');
                } else if(app()->getLocale() === 'dk') {
                    return $this->getAttribute('tagline_dk');
                }
            }
        );
    }
}
