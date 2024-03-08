<?php

namespace App\Models;

use App\Models\User;
use App\Models\Video;
use App\Models\Playlist;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Channel extends Model
{
    use HasFactory;

    protected static $relationships = ['user', 'playlists', 'videos'];

    public function playlists()
    {
        return $this->hasMany(Playlist::class);
    }
    public function videos()
    {
        return $this->hasMany(Video::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scopeSearch($query, ?string $name)
    {

       return  $query->where('name', 'like', "%$name%");

    }

}   
