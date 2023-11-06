<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comic extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'thumb', 'price', 'series', 'sale_date', 'type', 'artist', 'writers'];


    protected function thumb(): Attribute
    {
        return Attribute::make(

            get: function ($value) {
                if (strstr($value, 'http') !== false) {
                    return $value;
                } else {
                    return asset('storage/' . $value);
                }
            }
        );
    }
}
