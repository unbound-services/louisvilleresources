<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $guarded=['id'];

    public function categories()
    {
        return $this->morphedByMany('App\Category', 'taggable');
    }

    public function links()
    {
        return $this->morphedByMany('App\Link', 'taggable');
    }

    public function businesses()
    {
        return $this->morphedByMany('App\Business', 'taggable');
    }
}
