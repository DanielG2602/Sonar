<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Song extends Model{

    protected $fillable = [
        'title',
        'artist',
        'album',
        'duration_seconds'
    ];

    public function playlists() : BelongsToMany{
        return $this->belongsToMany(
            Playlist::class,
            'playlists_songs'
        )->withPivot('order_index');
    }

    public function favoriteByID() : BelongsToMany{
        return $this->belongsToMany(
            UserSystem::class,
            'user_favorite_songs'
        );
    }
}
