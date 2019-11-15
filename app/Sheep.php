<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sheep extends Model
{
    public $timestamps = false;

    protected $table = 'sheeps';

    protected $fillable = ['corral_id'];
}
