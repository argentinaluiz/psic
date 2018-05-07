<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Painel\SubRank;

class SubRanksController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('q');
        return $search ?SubRank::where('name','LIKE', '%'.$search.'%')->get():[];
    }
}
