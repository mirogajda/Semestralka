<?php

namespace App\Http\Controllers;

use App\Models\Picture;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class IntroController extends Controller
{
    //

    public function index()
    {
        $randomPicture = Picture::inRandomOrder()->limit(1)->get();
        return view('intro.intro', ['randomPicture' => $randomPicture]);
    }
}
