<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreArticleRequest;
use App\Models\Category;
use App\Models\Article;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ArticlesController extends Controller
{
    public function index(){
        
        return view('main/index', ['articles' => Article::all(), 'categories' => Category::all()]);
    
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
    
            return view('main/index', ['articles' => Article::where('user_id', Auth::user()->id)->get(), 'categories' => Category::all()]);
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
        $path = Storage::putFile('public', $request->file('img'));
    
        $validated['img'] = $path;
    
        Article::create($validated);

        return view('main/index', ['articles' => Article::all(), 'categories' => Category::all()]);
    }



    public function update(Article $article, StoreArticleRequest $request){
        $validated = $request->validated();
        
        $validated['premium'] = $validated['premium'] ? true : false;
        $article->update($validated);
      
        return view('main/index', ['articles' => Article::all()]);
        
    }

    public function destroy(Article $article){
        Storage::delete($article->img);
        $article->comments()->delete();
        $article->delete();
        $articles = Article::all();
        return view('main.index', ['articles' => $articles, 'categories' => Category::all()]); 

    }

    public function searchText(Request $request)
    {

        
        $key = trim($request->get('q'));

        $articles = Article::query()
            ->where('title', 'like', "%{$key}%")

            ->get();
    
        return view('main/index', ['articles' => $articles, 'categories' => Category::all(), 'selectedCategories' => $request->categories]);
    }

    public function searchCategories(Request $request)
    {
    
        $articles = Category::where('id', $request->categories)
        ->with(['articles'])->get();

        return view('main/index', ['articles' => $articles[0]->articles, 'categories' => Category::all(), 'selectedCategories' => $request->categories]);
    }

}
