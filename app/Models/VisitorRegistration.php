<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VisitorRegistration extends Model
{
    protected $fillable = [
        'establishment_id',
        'visitor_number',
        'visit_date',
        'visitor_name',
        'gender',
        'origin_type',
        'residency_code',
        'remarks',
    ];

    protected $casts = [
        'visit_date' => 'date',
    ];

    public function establishment()
    {
        return $this->belongsTo(Establishment::class);
    }
}
