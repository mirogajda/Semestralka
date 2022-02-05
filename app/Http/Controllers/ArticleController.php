<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Comment;
use App\Models\Picture;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\View\View;
use Intervention\Image\Facades\Image;
use PhpParser\Error;

class ArticleController extends Controller
{

    public function index(Request $request)
    {
        $articles = Article::select(['articles.*', 'pictures.picture as picture']);

        if ($request->createdByMe) {
            $articles = $articles->where('articles.user_id', \Auth::id());
        }

        $articles = $articles->join('pictures', 'pictures.id', '=', 'articles.picture_id')
            ->get();

        return view('article.article-list', ['articles' => $articles]);
    }

    public function create()
    {
        return view('article.new-article');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'picture' => 'required|image|max:4086',
            'description' => 'required'
        ]);

        $form_data = array(
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'user_id' => \Auth::id(),
        );

        $article = Article::create($form_data);

        $tempPicture = Image::make($request->file('picture'));
        Response::make($tempPicture->encode('jpeg'));

        $form_data = array(
            'user_id' => \Auth::id(),
            'picture' => $tempPicture,
            'name'=> $request->file('picture')->getClientOriginalName(),
            'article_id' => $article->id
        );

        $picture = Picture::create($form_data);

        $article->picture_id = $picture->id;
        $article->save();

        return redirect()->route('article-list')->with('message', ['Článok úspešne pridaný.']);
    }

    public function show(Request $request): View
    {
        $article = $this->getArticle($request->id);

        $article->comments = Comment::select('comments.*', 'users.name as name')
            ->join('users', 'users.id', '=', 'comments.user_id')
            ->where('article_id', '=', $request->id)
            ->get();

        return view('article.article-detail', ['article' => $article]);
    }

    public function edit(Request $request): View
    {
        $model = $this->getArticle($request->id);
        return view('article.new-article', ['article' => $model]);
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required'
        ]);

        $article = Article::findOrFail($request->input('id'));

        if ($article == null) {
            throw new Error('Nenašiel som článok.');
        }

        $article->name = $request->input('name');
        $article->description = $request->input('description');

        if ($request->file('picture') != null) {
            Picture::findOrFail($article->picture_id)->delete();

            $tempPicture = Image::make($request->file('picture'));
            Response::make($tempPicture->encode('jpeg'));

            $form_data = array(
                'user_id' => \Auth::id(),
                'picture' => $tempPicture,
                'name'=> $request->file('picture')->getClientOriginalName(),
                'article_id' => $article->id
            );

            $picture = Picture::create($form_data);
            $article->picture_id = $picture->id;
        }

        $article->save();

        return redirect()->route('article-list')->with('message', ['Úspešne upravené']);
    }

    public function remove(Request $request)
    {
        $id = $request->input('id');
        Comment::where('article_id', $id)->delete();
        Picture::where('article_id', $id)->delete();
        Article::where('id', $id)->delete();

        return response()->json(['message' => 'Článok úspešne vymazaný']);
    }

    private function getArticle($id)
    {
        return Article::select(['articles.*', 'pictures.picture as picture'])
            ->join('pictures', 'pictures.id', '=', 'articles.picture_id')
            ->where('articles.id', '=', $id)
            ->first();
    }

}
