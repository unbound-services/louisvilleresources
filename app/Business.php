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

    public function scopeZipcodeRange($query, $zipcode, $range)
    {
        $path = storage_path() . "\app\zipcodes.json"; 
		$zipcodes = json_decode(file_get_contents($path), true); 

        return $zipcodes;
    }
}
