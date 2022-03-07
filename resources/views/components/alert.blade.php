<div class="container">
    <div {{ $attributes->merge(['class' => 'mb-10']) }} >
        @if (session()->has('message'))
            <div class="alert alert-success">
                <h4 class="alert-heading">Success!</h4>
                {{ session('message') }}
            </div>
        @endif

        @error($handled ?? '')
        <div class="alert alert-danger">
            <h4 class="alert-heading">Error!</h4>
            {{ $message }}
        </div>
        @enderror
    </div>
</div>
