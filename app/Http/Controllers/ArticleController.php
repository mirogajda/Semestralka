<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Region;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        return view('novyClanok', ['options' => Region::all()]);
    }

    public function vytvorit(Request $request)
    {
        error_log($request->title);

        Article::create(array(
            'title' => $request->title,
            'content' => $request['content'],
            'hashtag' => $request->hashtag,
            'region' => $request->region,
        ));

        return route('tipyNaVyletPage');
    }


}
