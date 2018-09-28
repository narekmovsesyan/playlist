<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Playlist extends Model
{
    /**
     * @var string
     */
    protected $table = 'playlists';

    /**
     * @var array
     */
    protected $fillable = ['title' ,'creator_id'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function playlistSongs(){
        return $this->hasMany('App\PlaylistSong', 'playlist_id', 'id');
    }
}
