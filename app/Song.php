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
    protected $fillable = ['id', 'name', 'file_name', 'creator_id', 'genre_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function genres(){
        return $this->belongsToMany('App\Genre');
    }
}
