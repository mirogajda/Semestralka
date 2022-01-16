<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegionController extends Controller
{
    public function getAll()
    {
        return Region::all();
    }
}
