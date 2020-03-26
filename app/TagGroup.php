<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TagGroup extends Model
{
    protected $guarded=['id'];

    public function tags()
    {
        return $this->belongsToMany('App\Tag');
    }

}
