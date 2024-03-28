<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Progression extends Model
{
    use HasFactory ,Sluggable;

    protected $fillable = [
        'title',
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
        'user_id',


    ];
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
    public function getRouteKeyName()
    {
        return 'slug';
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
