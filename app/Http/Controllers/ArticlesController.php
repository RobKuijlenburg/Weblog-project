<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreArticleRequest;
use App\Models\Category;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ArticlesController extends Controller
{
    public function index(Article $article){
        
        return view('main/index', ['articles' => Article::all(), 'categories' => Category::all(), 'selectedCategories' => $article->load('categories')->pluck('id')->toArray()]);
    
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

    
    public function store(StoreArticleRequest $request){
     

        $validated = $request->validated();
    
        $validated['user_id'] = Auth::user()->id;

        $validated['premium'] = $validated['premium'] ? true : false;
        Article::create($validated);

        return view('main/index', ['articles' => Article::all()]);
    }

    public function update(Article $article, StoreArticleRequest $request){
        $validated = $request->validated();
        
        $validated['premium'] = $validated['premium'] ? true : false;
        $article->update($validated);
      
        return view('main/index', ['articles' => Article::all()]);
        
    }

    public function destroy(Article $article){

        $article->comments()->delete();
        $article->delete();
        $articles = Article::all();
        return view('main.index', ['articles' => $articles]); 

    }

    public function search(Request $request)
    {

      
        
        // dd($categories);
        
        $key = trim($request->get('q'));

        // $articles = Article::query()
        //     ->where('title', 'like', "%{$key}%")
        //     ->wherePivot('article_categories', [1, 2])
        //     ->get();
    
        $articles = Category::where('id', $request->categories)
        ->with(['articles' => function($query) use ($key){
            $query->where('title', 'like', '%'.$key.'%');
        }])->get();

        //  dd($categories);
    //   inhoud van de cards laad niet moet nog naar gekeken worden
        return view('main/index', ['articles' => $articles, 'categories' => Category::all(), 'selectedCategories' => $article->load('categories')->pluck('id')->toArray()]);
    }

}
