<x-app-layout>
    <div class="card">
        <h5 class="card-header">Article creation</h5>
        <form method="POST" action="{{ route('blog.article.store', $blog) }}">
            @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" class="form-control">
            </div>
            <div class="form-group">
                <label for="text">Text</label>
                <textarea id="text" name="text"></textarea>
            </div>
            <div class="text-right">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
    @push('head-scripts')
        <script src="https://cdn.tiny.cloud/1/d56rykklj5y1bm7uu9ne1y85wul764jijcoyvdh1ta22gnim/tinymce/5/tinymce.min.js"
                referrerpolicy="origin"></script>
    @endpush
    @push('scripts')
        <script>
            tinymce.init({
                height : '480',
                selector: 'textarea',
                menu: {
                    insert: {
                        title: 'Insert',
                        items: 'image link media'
                    }
                },
                menubar: 'insert',
                plugins: 'advlist media autolink lists link image charmap print preview hr anchor pagebreak',
                toolbar_mode: 'floating',
            });
        </script>
    @endpush
</x-app-layout>
