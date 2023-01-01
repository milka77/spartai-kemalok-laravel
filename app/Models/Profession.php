<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profession extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
    ];

    public function craft()
    {
        return $this->belongsToMany(Craft::class);
    }
}
