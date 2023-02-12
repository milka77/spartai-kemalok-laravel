<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewsCommentController extends Controller
{
    // Storing comments in the DB
    public function store()
    {
        // Input validation
        request()->validate([
            'body' => 'required|string',
        ]);

        try
        {
            $comment = new NewsComment();
            $comment->user_id = Auth()->user()->id;
            $comment->news_id = request('news_id');
            $comment->body = request('body');
            $comment->save();

            return redirect()->back();
        }
        catch(Exeption $e)
        {
            $e->getCode();
        }
    }
}
