<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;

    protected $table = 'galleries';

    public function scopeImage($query)
    {
        return $query->where('type', 'image');
    }

    public function scopeVideo($query)
    {
        return $query->where('type', 'video');
    }
}
