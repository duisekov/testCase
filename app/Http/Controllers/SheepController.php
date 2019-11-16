<?php

namespace App\Http\Controllers;

use App\Corral;
use App\Http\Resources\SheepResource;
use App\Http\Resources\SheepResourceCollection;
use App\Sheep;
use Illuminate\Http\Request;

class SheepController extends Controller
{
    /**
     * @return SheepResourceCollection
     */
    public function index():SheepResourceCollection
    {
        return new SheepResourceCollection(Sheep::paginate());
    }

    /**
     * @param Sheep $sheep
     * @return SheepResource
     */
    public function show(Sheep $sheep):SheepResource
    {
        return new SheepResource($sheep);
    }

    /**
     * @param Request $request
     * @return SheepResource
     */
    public function store(Request $request):SheepResource
    {
        $corrals = Corral::all();
        $id = Sheep::all()->last()->id + 1;
        $temp = PHP_INT_MAX;
        $temp_corral = $corrals->first();


        foreach ($corrals as $corral){
            if (count($corral->sheeps) < $temp){
                $temp = count($corral->sheeps);
                $temp_corral = $corral;
            }
        }

        $sheep = new Sheep();
        $sheep->name = "Овечка {$id}";
        $sheep->corral_id = $temp_corral->id;
        $sheep->save();

        return new SheepResource($sheep);
    }

    public function update(Sheep $sheep, Request $request):SheepResource
    {
        $sheep->update(['corral_id' => $request->corral_id]);

        return new SheepResource($sheep);
    }

    /**
     * @param Sheep $sheep
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function destroy(Sheep $sheep){
        $sheep->delete();

        return response()->json();
    }
}
