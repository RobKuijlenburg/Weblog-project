<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{
    public function index(){
        
        return view('main/index', ['articles' => Article::all()]);
    
    }

    public function show(Article $article){
        
    return view('main/show', ['article' => $article]);

    }
}
