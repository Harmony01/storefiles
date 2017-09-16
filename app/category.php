<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    protected $fillable =['name','pcategory_id'];

    public function product(){
    	return $this->hasMany('App\product');
    }

    public function pcategory(){
    	return $this->belongsTo('App\pcategory');
    }
}
