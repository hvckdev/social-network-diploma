<?php

namespace App\Http\Controllers;

use App\Models\Blog\Article;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $articles = Article::query()->whereRelation('blog', 'is_closed', '=', '0')
            ->orderByDesc('id')->limit(3)->get();

        $userArticles = auth()->user()->blog()->first() ?? false;
        $userArticlesCount = $userArticles ? $userArticles->articles()->count() : 0;

        return view('dashboard', compact('articles', 'userArticlesCount'));
    }
}
