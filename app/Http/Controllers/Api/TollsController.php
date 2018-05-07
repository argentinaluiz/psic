<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Painel\Tool;

class TollsController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('q');
        return $search ?Tool::where('title','LIKE', '%'.$search.'%')->get():[];
    }
}
