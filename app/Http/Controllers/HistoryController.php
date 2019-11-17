<?php

namespace App\Http\Controllers;

use App\History;
use App\Http\Resources\HistoryResourceCollection;
use Illuminate\Http\Request;

class HistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() : HistoryResourceCollection
    {
        return new HistoryResourceCollection(History::all());
    }
}
