<?php

namespace App\Models;

use Illuminate\Support\Facades\Cache;
use Illuminate\Database\Eloquent\Model;

class Galeri extends Model
{
    protected $fillable = [
        'title',
        'image',
    ];

    public static $oneDayInSeconds = 86400; // 24 hours in seconds
    public static function getGaleriCache(){
        return Cache::remember('galeris', self::$oneDayInSeconds, function () {
            return self::all();
        });
    }
}
