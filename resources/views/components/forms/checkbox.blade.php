<input type="hidden" name="{{ $attributes['name'] }}" value="0">
<input type="checkbox" {!! $attributes->merge(['value' => '1']) !!} {{ $value ? 'checked' : '' }}>
