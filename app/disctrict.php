<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class disctrict extends Model
{

	protected $fillable = ['name', 'region_id'];
    public function region(){
    	$this->belongsTo('App\region');
    }
}
