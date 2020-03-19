<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Category;

class Link extends Model
{
    protected $guarded=['id'];
    protected $fillable=['name', 'url', 'description'];
    public function category(){
        return $this->belongsTo(Category::class);
    }
}
