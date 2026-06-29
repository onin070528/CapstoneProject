<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    protected $table = 'feedbacks';

    protected $fillable = [
        'establishment_id',
        'tourist_name',
        'rating',
        'feedback_text',
        'visit_date',
    ];

    public function establishment()
    {
        return $this->belongsTo(Establishment::class);
    }
}
