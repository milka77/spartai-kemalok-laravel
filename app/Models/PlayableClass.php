<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlayableClass extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
    ];

    public function recruitment()
    {
        $this->belongsToMany(Recruitment::class);
    }
}
