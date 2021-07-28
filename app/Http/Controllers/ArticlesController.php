<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ArticlesController extends Controller
{
    public function index(){
        
        return view('main/index', ['articles' => Article::all()]);
    
    }

    public function show(Article $article){
    
        if ($article->premium) {
            if(!Auth::user()){
                return view('auth.login');
            }
            if(!Auth::user()->premium) {
                return view('main/premium');
            }
        } 
        return view('main/show', ['article' => $article]);
    }
}
