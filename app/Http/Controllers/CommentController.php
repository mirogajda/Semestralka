<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpParser\Error;

class CommentController extends Controller
{
    //

    public function store(Request $request)
    {
        $form_data = array(
            'content' => $request->input('content'),
            'user_id' => Auth::id(),
            'article_id' => $request->input('article_id')
        );

        Comment::create($form_data);


        return back()->with('message', ['Komentár úspešne pridaný.']);
    }

    public function update(Request $request)
    {
        $comment = Comment::findOrFail($request->input('id'));;

        if ($comment == null) {
            throw new Error('Comment not found!');
        }

        $comment->content = $request->input('content');
        $comment->save();

        return response()->json(['message' => 'Úspešne upravené.']);
    }

    public function remove(Request $request)
    {
        $comment = Comment::findOrFail($request->input('id'));

        if ($comment == null) {
            throw new Error('Comment not found!');
        }

        $comment->delete();

        return response()->json(['message' => 'Úspešne vymazané.']);
    }
}
