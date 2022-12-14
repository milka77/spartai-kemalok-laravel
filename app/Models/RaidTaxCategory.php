<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RaidTaxCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'initials',
    ];

    // Relationship with RaidTax Model
    public function raidTax()
    {
        return $this->belongsToMany(RaidTax::class);
    }
}
