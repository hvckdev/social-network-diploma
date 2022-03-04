<x-app-layout>
    @if($user->has_blog)
        <div class="card">
            <div class="card-header text-right">
                <a href="{{ route('blog.article.create', $user->blog->id) }}" class="btn btn-primary">
                    Create article
                </a>
            </div>
            <div class="row row-cols-2">
                @if(! empty($user->blog->articles))
                    @foreach($user->blog->articles as $article)
                        <div class="col-sm-6">
                            <div class="content">
                                <h2 class="content-title">
                                    {{ $article->name }}
                                </h2>
                                <p>
                                    {{ $article->description }}
                                </p>
                                <hr>
                                <div class="float-right">
                                    <small class="text-muted">
                                        {{ $article->created_at }}
                                    </small>
                                </div>
                                <a href="{{ route('blog.article.show', [$user->blog, $article]) }}" class="btn btn-primary">Go to article</a>
                            </div>
                        </div>
                    @endforeach
                @else
                    <h5>Empty</h5>
                @endif
            </div>
            @else
                @include('blog.create')
            @endif
        </div>
</x-app-layout>
