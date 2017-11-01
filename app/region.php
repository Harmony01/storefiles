<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class region extends Model
{
    public function district(){
    return	$this->hasMany('App\disctrict');
    }

    public function order(){
    	return $this->hasMany(order::class);
    }
}
