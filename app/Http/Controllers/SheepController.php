<?php

namespace App\Http\Controllers;

use App\Corral;
use App\Http\Resources\SheepResource;
use App\Sheep;
use Illuminate\Http\Request;

class SheepController extends Controller
{
    /**
     * @param Sheep $sheep
     * @return SheepResource
     */
    public function show(Sheep $sheep) : SheepResource
    {
        return new SheepResource($sheep);
    }

    /**
     * @param Request $request
     * @return SheepResource
     */
    public function store(Request $request) : SheepResource
    {
        $id = Sheep::all()->last()->id + 1;

        $sheep = new Sheep();
        $sheep->name = "Овечка {$id}";
        $sheep->corral_id = Corral::inRandomOrder()->first()->id;
        $sheep->save();

        return new SheepResource($sheep);
    }

    /**
     * @param Sheep $sheep
     * @param Request $request
     * @return SheepResource
     */
    public function update(Sheep $sheep, Request $request) : SheepResource
    {
        $sheep->update(['corral_id' => $request->corral_id]);

        return new SheepResource($sheep);
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy()
    {
        Sheep::inRandomOrder()->first()->delete();

        return response()->json(['deleted' => 'success'], 200);
    }
}
