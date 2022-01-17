<?php

namespace App\Http\Controllers;


use App\Models\ImageGallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ImageGalleryController extends Controller
{
    public function pridat(Request $request)
    {

        $request->validate([
            'url' => 'required',
            'description' => 'required',
        ]);

        ImageGallery::create(array(
            'url' => $request->url,
            'description' => $request->description,

        ));

        return back();
    }
    public function getImages()
    {
        $images = DB::select('select * from image_galleries');

        return view('galeria', ['images' => $images]);

    }

    public function getToAdd ()
    {
        if (Auth::check()) {
            return view('novyObrazok');
        }
    }


}
