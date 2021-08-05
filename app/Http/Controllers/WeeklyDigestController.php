<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Mail\WeeklyDigest;
use App\Models\Article;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class WeeklyDigestController extends Controller
{
    public function index(Request $request)
    {
        foreach(User::all() as $user) {
            Mail::to($user->email)->send(new WeeklyDigest());
            sleep(1);
        }
    }
}
