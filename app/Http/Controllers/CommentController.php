<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Idea;

class CommentController extends Controller
{
    public function store(Idea $idea){
        $comment  = new Comment();
        $comment->idea_id = $idea->id;
        $comment->user_id = auth()->id();
        $comment->content= request()->get('content');
        $comment->save();

        return redirect()->route('idea.show',$idea->id)->with('success','Comment posted successfully!');
    }
}
