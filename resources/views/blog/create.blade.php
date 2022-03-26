<div class="card">
    <h5 class="card-header">Are u sure to create own blog?</h5>
    <form method="POST" action="{{ route('blog.store') }}">
        @csrf
        <div class="form-group">
            <div class="custom-checkbox">
                <input type="checkbox" id="checkbox-1" name="public" value="1">
                <label for="checkbox-1">Make it public</label>
            </div>
        </div>
        <button class="btn btn-primary">I'm sure</button>
    </form>
</div>
