<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    public function setPremium(Article $article, User $user) {
        $user->premium = true;
        $user->save();
        return view('main/index', ['articles' => Article::all(), 'categories' => Category::all(), 'selectedCategories' => $article->load('categories')->pluck('id')->toArray()]);
    }

}
