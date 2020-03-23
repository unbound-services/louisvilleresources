<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    public function categories()
    {
        return $this->morphedByMany('App\Category', 'taggable');
    }

    public function links()
    {
        return $this->morphedByMany('App\Link', 'taggable');
    }
}
