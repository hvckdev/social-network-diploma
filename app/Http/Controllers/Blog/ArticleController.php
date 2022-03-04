<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateArticleRequest;
use App\Http\Requests\UpdateArticleRequest;
use App\Models\Blog\Article;
use App\Models\Blog\Blog;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class ArticleController extends Controller
{
    /**
     * Create the controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->authorizeResource(Article::class);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create(Blog $blog)
    {
        return view('blog.article.create', compact('blog'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Blog $blog
     * @param CreateArticleRequest $request
     * @return RedirectResponse
     */
    public function store(Blog $blog, CreateArticleRequest $request): RedirectResponse
    {
        $blog->articles()->create($request->validated());

        return redirect()->route('blog.index');
    }

    /**
     * Display the specified resource.
     *
     * @param Blog $blog
     * @param Article $article
     * @return Application|Factory|View
     */
    public function show(Blog $blog, Article $article)
    {
        return view('blog.article.view', compact('blog', 'article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Blog $blog
     * @param Article $article
     * @return Application|Factory|View
     */
    public function edit(Blog $blog, Article $article)
    {
        return view('blog.article.edit', compact('blog', 'article'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateArticleRequest $request
     * @param Blog $blog
     * @param Article $article
     * @return RedirectResponse
     */
    public function update(UpdateArticleRequest $request, Blog $blog, Article $article): RedirectResponse
    {
        $article->update($request->validated());

        return redirect()->route('blog.article.show', [$blog, $article]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Article $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        //
    }
}
