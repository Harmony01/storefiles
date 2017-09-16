<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class region extends Model
{
    public function district(){
    	$this->belongsTo('App\district');
    }
}
