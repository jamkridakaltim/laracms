<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function scopePostImage($query, $type)
    {
        return $query->where([['fileable_type', 'post'],['fileable_id', $type]]);
    }
}
