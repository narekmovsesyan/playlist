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

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function playlist(){
        return $this->belongsTo('App\Playlist', 'id','playlist_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function songs(){
        return $this->hasMany('App\Song', 'id','song_id');
    }
}
