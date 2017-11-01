<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class thumbnail extends Model
{
    protected $fillable = ['name','caption'];

    public function pcategory()
    {
    	return $this->hasMany(pcategory::class);
    }
}
