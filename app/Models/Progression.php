<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Progression extends Model
{
    use HasFactory;

    protected $fillable = [
        'poids',
        'weight',
        'height',
        'chest_Measurement',
        'biceps_Measurement',
        'waist_Measurement',
        'hip_Measurement',
        'squat',
        'deadlift',
        'pushUp',
        'status',
        'date',

    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
