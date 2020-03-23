<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Category;

class Link extends Model
{
    protected $guarded=['id'];

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function tags()
    {
        return $this->morphToMany('App\Tag', 'taggable');
    }
}
