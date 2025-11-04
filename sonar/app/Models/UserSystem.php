<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class UserSystem extends Authenticatable
{
    protected $table = 'user_systems';

    protected $fillable = [
        'name',
        'email',
        'password'
    ];

    protected $hidden = [
        'password',
        'remember_token'
    ];

    public function playlists() : HasMany {
        return $this->hasMany(Playlist::class);
    }

    public function favoriteSongs() : BelongsToMany {
        return $this->belongsToMany(
            Song::class,
            'user_favorite_songs',
            'user_id',
            'song_id'
        );
    }
}
