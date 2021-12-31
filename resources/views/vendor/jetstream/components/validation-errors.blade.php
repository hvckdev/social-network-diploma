@if ($errors->any())
    <div {!! $attributes->merge(['class' => 'invalid-feedback']) !!} role="alert">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
