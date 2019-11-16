<?php

namespace App\Http\Controllers;

use App\Corral;
use App\Http\Resources\CorralResourceCollection;
use App\Sheep;

class CorralController extends Controller
{
    /**
     * @return CorralResourceCollection
     */
    public function index():CorralResourceCollection
    {
        $sheeps = Sheep::all();
        $corrals = Corral::all();

        foreach($sheeps as $sheep){
            $sheep->corral_id = $corrals->random()->id;
            $sheep->save();
        }

        return new CorralResourceCollection(Corral::with('sheeps')->paginate());
    }
}
