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
    protected $fillable = ['id', 'name', 'genre_id'];

    /**
     * @var bool
     */
    public  $timestamps = false;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function genres(){
        return $this->belongsToMany('App\Genre');
    }
}
