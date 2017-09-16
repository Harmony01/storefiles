<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class role extends Model
{
     public function admin()
    {
        return $this->belongsToMany('App\role','admin_roles');
    }
}
