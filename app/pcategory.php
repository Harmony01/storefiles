<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pcategory extends Model
{
    public function category(){
    	return $this->hasMany('App\category');
    }

    public function thumbnail()
    {
    	return $this->belongsTo(thumbnail::class);
    }
}
