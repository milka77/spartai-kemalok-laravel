<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NewsComment;
use Brian2694\Toastr\Facades\Toastr;

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

            Toastr::success('Comment added successfuly!', 'System message');

            return redirect()->back();
        }
        catch(Exeption $e)
        {
            $e->getCode();
        }
    }

    // Update a NewsComment record
    public function update(NewsComment $newsComment)
    {
        // Input validation
        request()->validate([
            'body' => 'required|string'
        ]);

        try
        {
            $newsComment->body = request('body');
            $newsComment->save();

            Toastr::success('Comment updated successfuly!', 'System message');

            return redirect()->back();
        }
        catch(Exeption $e)
        {
            $e->getCode();
        }
    }

    // Deleting a NewsComment
    public function destroy(NewsComment $newsComment)
    {
        try
        {
            $newsComment->delete();
            
            return redirect()->back();
        }
        catch(Exeption $e)
        {
            $e->getCode();
        }
        

    }
}
