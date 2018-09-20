<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PlaylistSong extends Model
{
    /**
     * @var string
     */
    protected $table = 'playlists_songs';

    /**
     * @var array
     */
    protected $fillable = ['song_id', 'playlist_id'];
}
