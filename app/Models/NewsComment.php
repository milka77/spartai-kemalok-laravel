<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewsComment extends Model
{
    use HasFactory;

    protected $fillable = [
        'news_id',
        'user_id',
        'body',
    ];

    // Relationship with News model
    public function news()
    {
        return $this->belongsTo(News::class);
    }
    
    // Relationship with user model
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
