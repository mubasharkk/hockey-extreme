<?php

namespace App\Http\Controllers\Hockey;

use App\Federation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FederationController extends Controller
{
    public function index()
    {
        $federations = Federation::all();

        return view('pages.federations.index',[
            'federations' => $federations
        ]);
    }
}
