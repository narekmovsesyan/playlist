<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Genre;


class Song extends Model
{
    /**
     * @var string
     */
    protected $table = 'songs';


    /**
     * @var array
     */
    protected $fillable = ['id', 'title', 'singer', 'file_name', 'creator_id', 'genre_id'];

    /**
     * @param $query
     * @return mixed
     */
    public function scopeInfo($query)
    {
        return $query->with('genre', 'creator');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function genre(){
        return $this->belongsTo('App\Genre', 'genre_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function creator(){
        return $this->belongsTo('App\User', 'creator_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function playlistSong(){
        return $this->belongsTo('App\PlaylistSong', 'song_id', 'id');
    }
}
