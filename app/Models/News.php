<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class News extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'body',
        'user_id',
        'category_id',
        'file_path'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // Get the image file path
    public function getFilePathAttribute($value)
    {
        if(!empty($value)) {
            if(strpos($value, 'https://') !== FALSE || strpos($value, 'http://') !== FALSE) {
                return $value;
            }
    
            return Storage::disk('s3')->url($value);
        }
    }
}
