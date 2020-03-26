<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Category;

class Link extends Model
{
    protected $guarded=['id'];
    
    protected $casts = [
        'phone_is_primary' => 'boolean',
    ];
    

    // =====================================
    // RELATIONSHIPS
    // =====================================
    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function tags()
    {
        return $this->morphToMany('App\Tag', 'taggable');
    }

    // ========================================
    //              attributes
    // ========================================

    // this is mostly for use in tel: links, but were ommitting the 
    // "tel:" from this function since it may be handy in other places
    public function getNumericalPhoneAttribute(){
        return preg_replace("/[^0-9]/", "", $this->phone );
    }

    // this is mainly for phone numbers that have letters in them
    // ie, 1-800-safe-auto
    public function getPhoneStringAttribute(){
        if($this->attributes['phone_string']) 
            return $this->attributes['phone_string'];
        
        // this way we are always returning a string
        if(!$this->phone) return "";

        return $this->phone;
    }
}
