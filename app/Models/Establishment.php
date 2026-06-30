<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Establishment extends Model
{
    protected $fillable = [
        'uuid',
        'name',
        'category',
        'municipality',
        'owner_name',
        'owner_phone',
        'rating',
        'status',
        'description',
        'location',
        'lat',
        'lng',
        'image',
    ];

    protected $casts = [
        'rating' => 'decimal:1',
        'lat' => 'decimal:6',
        'lng' => 'decimal:6',
    ];

    protected static function booted()
    {
        static::creating(function ($establishment) {
            if (empty($establishment->uuid)) {
                $establishment->uuid = (string) Str::uuid();
            }
        });
    }

    public function feedbacks()
    {
        return $this->hasMany(Feedback::class);
    }

    public function visitorRegistrations()
    {
        return $this->hasMany(VisitorRegistration::class);
    }
}
