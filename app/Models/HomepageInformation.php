<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomepageInformation extends Model
{
    use HasFactory;

    protected $fillable = ['image_name'];

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
}
