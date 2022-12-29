<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WeeklyMythic extends Model
{
    use HasFactory;

    protected $fillable = [
        'prev_week',
        'current_week',
    ];
}
