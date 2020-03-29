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

    //return businesses that are within radius of user address
    public function scopeDistance($query, $lat, $long, $range) {
        return $query->having('distance', '<', $range)
             ->select(\DB::raw("*,
                     (3959 * ACOS(COS(RADIANS($lat))
                           * COS(RADIANS(latitude))
                           * COS(RADIANS($long) - RADIANS(longitude))
                           + SIN(RADIANS($lat))
                           * SIN(RADIANS(latitude)))) AS distance")
             )
              ->get();
    }


}
