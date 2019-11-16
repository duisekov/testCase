<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Corral extends Model
{
    public $timestamps = false;

    public function sheeps()
    {
        return $this->hasMany('App\Sheep');
    }
}
