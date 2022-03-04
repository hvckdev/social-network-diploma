<x-app-layout>
    <div class="card">
        <h1 class="card-title"><a href="">{{ $blog->user->name }}</a>'s blog</h1>
        <div class="row row-cols-2">
            @if(! empty($articles))
                @foreach($articles as $article)
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
                                    {{ $article->created_at }},
                                    <a href="{{ route('users.show', $article->blog->user ) }}">
                                        {{ $article->blog->user->name }}
                                    </a>
                                </small>
                            </div>
                            <a href="{{ route('blog.article.show', [$blog, $article]) }}" class="btn btn-primary">Go
                                to article</a>
                        </div>
                    </div>
                @endforeach
            @else
                <h5>Empty</h5>
            @endif
        </div>

    </div>
</x-app-layout>
