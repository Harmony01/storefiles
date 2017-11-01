<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class disctrict extends Model
{

    public function region(){
    return	$this->belongsTo('App\region');
    }

     public function price(){
    return	$this->hasMany(districtPrice::class,'disctrict_id');
    }

    public function order()
    {
    	return $this->hasMany(order::class);
    }
}
