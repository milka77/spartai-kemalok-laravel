<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class RaidTax extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'raid_tax_category_id',
        'raid_tax_difficulty_id',
        'boss_name',
        'slug',
        'title_1',
        'body_1',
        'mythic_1',
        'file_path_1',
        'title_2',
        'body_2',
        'mythic_2',
        'file_path_2',
        'title_3',
        'body_3',
        'mythic_3',
        'file_path_3',
        'title_4',
        'body_4',
        'mythic_4',
        'file_path_4',
        'title_5',
        'body_5',
        'file_path_5',
        'mythic_5',
    ];

    // Relationship With User Model
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relationship with Raid Tax Category Model
    public function raidTaxCategory()
    {
        return $this->belongsTo(RaidTaxCategory::class);
    }

    //Relationship with Raid Tax Difficulty Model
    public function raidTaxDifficulty()
    {
        return $this->belongsTo(RaidTaxDifficulty::class);
    }

    // Get the images file paths
    public function getFilePath1Attribute($value)
    {
        if(!empty($value)) {
            if(strpos($value, 'https://') !== FALSE || strpos($value, 'http://') !== FALSE) {
                return $value;
            }    
            return Storage::disk('s3')->url($value);
        }
    }

    public function getFilePath2Attribute($value)
    {
        if(!empty($value)) {
            if(strpos($value, 'https://') !== FALSE || strpos($value, 'http://') !== FALSE) {
                return $value;
            }    
            return Storage::disk('s3')->url($value);
        }
    }

    public function getFilePath3Attribute($value)
    {
        if(!empty($value)) {
            if(strpos($value, 'https://') !== FALSE || strpos($value, 'http://') !== FALSE) {
                return $value;
            }    
            return Storage::disk('s3')->url($value);
        }
    }

    public function getFilePath4Attribute($value)
    {
        if(!empty($value)) {
            if(strpos($value, 'https://') !== FALSE || strpos($value, 'http://') !== FALSE) {
                return $value;
            }    
            return Storage::disk('s3')->url($value);
        }
    }

    public function getFilePath5Attribute($value)
    {
        if(!empty($value)) {
            if(strpos($value, 'https://') !== FALSE || strpos($value, 'http://') !== FALSE) {
                return $value;
            }    
            return Storage::disk('s3')->url($value);
        }
    }
}
