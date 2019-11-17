<?php

namespace App\Http\Controllers;

use App\Corral;
use App\Http\Resources\CorralResourceCollection;
use App\Sheep;
use \Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CorralController extends Controller
{
    /**
     * @param Request $request
     * @return CorralResourceCollection
     */
    public function index(Request $request) : CorralResourceCollection
    {
        /**
         * Creates 10 sheep with random corral_id
         * Corrals cannot be empty
         */
        if ($request->query('random')){
            DB::table('sheeps')->truncate();

            while(Corral::withCount('sheeps')->orderBy('sheeps_count', 'asc')->first()->sheeps_count < 2) {
                DB::table('sheeps')->truncate();
                for ($i = 1; $i < 11; $i++) {
                    factory(Sheep::class)->create([
                        'name' => "Овечка {$i}"
                    ]);
                }
            }
        }

        return new CorralResourceCollection(Corral::with('sheeps')->get());
    }
}
