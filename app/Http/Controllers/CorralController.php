<?php

namespace App\Http\Controllers;

use App\Corral;
use App\History;
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
            DB::table('history')->truncate();

            while(Corral::withCount('sheeps')->orderBy('sheeps_count', 'asc')->first()->sheeps_count < 1) {
                DB::table('sheeps')->truncate();
                DB::table('history')->truncate();

                for ($i = 1; $i < 11; $i++) {
                    factory(Sheep::class)->create([
                        'name' => "Овечка {$i}"
                    ]);

                    $sheep = Sheep::find($i);

                    $history = new History();
                    $history->description = "{$sheep->name} была добавлена в загон {$sheep->corral_id}";
                    $history->save();
                }
            }
        }

        $corral_id1 = Corral::withCount('sheeps')->orderBy('sheeps_count', 'asc')->first()->id;
        /**
         * Complete corral with 1 sheep
         */
        if (Corral::withCount('sheeps')->orderBy('sheeps_count', 'asc')->first()->sheeps_count == 1) {
            $corral_id2 = (Corral::withCount('sheeps')->orderBy('sheeps_count', 'desc')->first()->id);
            $sheep = Sheep::where('corral_id', '=', $corral_id2)->firstOrFail();
            $sheep->update(['corral_id' => $corral_id1]);
        }

        return new CorralResourceCollection(Corral::with('sheeps')->get());
    }
}
