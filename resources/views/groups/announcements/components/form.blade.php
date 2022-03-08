<form method="POST" action="{{ $action }}">
    @csrf
    @method($method ?? 'POST')
    <label for="text">Text</label>
    <textarea class="form-control @error('text') is-invalid @enderror" id="text" name="text"
              placeholder="Some news here... s"
              required="required">{{ $text ?? '' }}</textarea>
    <x-jet-input-error for="text"></x-jet-input-error>
</form>
