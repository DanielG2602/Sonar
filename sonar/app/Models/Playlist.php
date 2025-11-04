<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Playlist extends Model
{
    protected $fillable = [
        'user_id',
        'name',
        'description',
    ];

    public function users() : BelongsTo {
        return $this->belongsTo(UserSystem::class);
    }

    public function songs() : BelongsToMany{
        return $this->belongsToMany(Song::class,
            'playlists_songs'
        )->withPivot('order_index')
        ->orderBy('playlists_songs.order_index');
    }

}
