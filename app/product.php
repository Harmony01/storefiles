<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    public function category(){
    	return $this->belongsTo('App\category');
    }

    public function manufacturer(){
    	return $this->belongsTo('App\manufacturer');
    }

    public function images(){
    	return $this->hasMany('App\image');
    }
}
