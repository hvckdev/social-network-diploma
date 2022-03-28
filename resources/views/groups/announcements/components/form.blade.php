<form method="POST" action="{{ $action }}">
    @csrf
    @method($method ?? 'POST')
    <div class="form-group">
        <label for="text">Text</label>
        <textarea class="form-control @error('text') is-invalid @enderror" id="text" name="text"
                  placeholder="Some news here..."
                  required="required">{{ $text ?? '' }}</textarea>
        <x-jet-input-error for="text"></x-jet-input-error>
    </div>
    <div class="form-group">
        <button class="btn btn-primary">Submit</button>
    </div>
</form>
