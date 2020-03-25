<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Business extends Model
{
    protected $guarded=['id'];

    public function tags()
    {
        return $this->morphToMany('App\Tag', 'taggable');
    }
}
