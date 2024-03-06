<?php

namespace App\Models;

use App\Models\Video;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;

    public function videos()
    {
        return $this->belongsToMany(Video::class);
    }
    public function scopeSearch($query, ?string $name)
    {

       return  $query->where('name', 'like', "%$name%");

    }
}
