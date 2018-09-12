<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    /**
     * @var string
     */
    protected $table = 'genres';


    /**
     * @var array
     */
    protected $fillable = ['id', 'title'];

    /**
     * @var bool
     */
    public $timestamps = false;


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function song(){
        return $this->hasMany('App\Song');
    }
}
