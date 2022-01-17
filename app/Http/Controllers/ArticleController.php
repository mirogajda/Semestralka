<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Region;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class ArticleController extends Controller
{
    //
    public function getByRegion($regionName)
    {
        if ($regionName === null) {
            return view('tipyNaVylet');
        }

        $articles = Article::where('region', '=', $regionName)->get();

        return view('clanky', ['articles' => $articles]);
    }

    public function getToCreate()
    {
        if (Auth::check()) {
            return view('novyClanok', ['options' => Region::all()]);
        }
    }

    public function vytvorit(Request $request)
    {

        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'hashtag' => 'required',
        ]);

        Article::create(array(
            'title' => $request->title,
            'content' => $request['content'],
            'hashtag' => $request->hashtag,
            'region' => $request->region,
            'user_id' => Auth::id()

        ));


//        return route('tipyNaVyletPage');
        return back();
    }

    public function getByUser()
    {
        
    }


}
