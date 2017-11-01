<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class districtPrice extends Model
{
    protected $fillable = ['Dprice','disctrict_id'];

    public function district(){
       return $this->belongsTo(disctrict::class, 'disctrict_id');
    }
}
