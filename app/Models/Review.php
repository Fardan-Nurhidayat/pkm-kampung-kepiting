<?php

namespace App\Models;

use Illuminate\Support\Facades\Cache;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Review extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'review',
        'visit_date',
        'photo',
    ];

    public static $oneDayInSeconds = 86400; 

    public static function getCacheReview()
    {
        return Cache::remember('reviews', self::$oneDayInSeconds, function () {
            return self::all();
        });
    }
    
}
