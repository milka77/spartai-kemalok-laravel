<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recruitment extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'race_id',
        'playable_class_id',
        'comment',
        'is_active',
    ];

    // Relationship With User Model
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relationship With Spec Model
    public function spec()
    {
        return $this->belongsTo(Spec::class);
    }

    // Relationship With PlayableClass Model
    public function playable_class()
    {
        return $this->belongsTo(PlayableClass::class);
    }

}
