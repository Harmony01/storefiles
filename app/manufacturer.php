<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class manufacturer extends Model
{
   protected $fillable =['name'];

    public function product(){
    	return $this->hasMany('App\product');
    }
}
