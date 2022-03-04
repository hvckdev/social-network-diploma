<x-app-layout>
    <div class="card">
        <h5 class="card-title">
            {{ $article->name }}
            <a href="{{ route('blog.article.edit', [$blog, $article]) }}" class="btn btn-sm btn-primary float-right">Edit</a>
        </h5>
        <div>
            {!! $article->text !!}
        </div>
        <hr>
        <div class="float-right">
            <small class="text-muted">
                {{ $article->created_at }},
                <a href="{{ route('users.show', $article->blog->user ) }}">
                    {{ $article->blog->user->name }}
                </a>
            </small>
        </div>
    </div>
</x-app-layout>
