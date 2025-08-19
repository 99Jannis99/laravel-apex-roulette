<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Character extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'image_url',
        'description',
        'type'
    ];

    /**
     * Get a random character
     */
    public static function getRandom()
    {
        return self::inRandomOrder()->first();
    }


}
