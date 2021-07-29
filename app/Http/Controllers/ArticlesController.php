<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreArticleRequest;
use App\Models\Category;
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

    public function authorshow(){
        if (Auth::user()->author) {
    
            return view('main/index', ['articles' => Article::where('user_id', Auth::user()->id)->get()]);
        } 
        else {
            return view('main/index', ['articles' => Article::all()]);
        }
    }

    public function edit(Article $article){
        return view('admin/edit', ['article' => $article, 'categories' => Category::all(), 'selectedCategories' => $article->load('categories')->pluck('id')->toArray()]); 
    }

    public function create(){
        return view('admin/create', ['categories' => Category::all()]); 
    }

    
    public function store(){
 
        Article::create($this->validateArticle());

        return view('articles/index', ['articles' => Article::all()]);
    }

    public function update(Article $articles, StoreArticleRequest $request){
        $validated = $request->validated();
        dd($validated);
        $articles->update($validated);

        return view('articles/index', ['articles' => Article::all()]);
        
    }

    public function destroy(Article $article){

        $article->delete();
        $articles = Article::all();
        return view('Article.index', ['articles' => $articles]); 

    }

    public function validateArticle()
    {
        return request()->validate([

        ]);
    }
}
