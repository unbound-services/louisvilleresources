<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Link;

class Category extends Model
{
    protected $guarded=['id'];


    public function links(){
        return $this->hasMany(Link::class);
    }
}
