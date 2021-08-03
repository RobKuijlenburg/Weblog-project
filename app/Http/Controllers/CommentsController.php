<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCommentRequest;
use App\Models\Article;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentsController extends Controller
{
    public function store(StoreCommentRequest $request){
     
    
        $validated = $request->validated();
    
        $validated['user_id'] = Auth::user()->id;
        $article = Article::where('id', $validated['article_id'])->first();
        Comment::create($validated);

        return view('main/show', ['article' => $article]);
    }

    
    public function destroy(Comment $comment){
        
        $article = Article::where('id', $comment->article_id)->first();
      
        $comment->delete();

        return view('main/show', ['article' => $article]); 

    }
}
