<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Models\Blog\Article;
use App\Models\Blog\Blog;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $user = Auth::user();

        if ($user !== null) {
            $articles = $user->blog->articles ?? null;
        }

        return view('blog.index', compact('user', 'articles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $request->user()->blog()->create();

        if ($request->input('public')) {
            $request->user()->blog()->update(['is_closed' => false]);
        }

        return redirect()->route('blog.index');
    }

    /**
     * Display the specified resource.
     *
     * @param Blog $blog
     * @return Application|Factory|View
     */
    public function show(Blog $blog)
    {
        $articles = $blog->articles()->orderByDesc('id')->paginate(10);

        return view('blog.show', compact('blog', 'articles'));
    }

    /**
     * @return Application|Factory|View
     */
    public function showAll()
    {
        $articles = Article::whereRelation('blog', 'is_closed', '=', '0')->paginate();
        $user = Auth::user();

        return view('blog.index', compact('articles', 'user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Blog $blog
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Blog $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Blog $blog)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Blog $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {
        //
    }
}
