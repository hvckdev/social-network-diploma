<form method="POST" action="{{ $route }}">
    @csrf

    @if ($method ?? '' === 'PUT')
        @method('PUT')
    @endif

    <div class="form-row row-eq-spacing-sm">
        <div class="col-sm">
            <label for="name">Name</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                   value="{{ $name ?? '' }}" placeholder="Name"
                   required="required"/>
            <x-jet-input-error for="name"></x-jet-input-error>
        </div>
        <div class="col-sm">
            <label for="name">Course</label>
            <input type="number" min="1" max="4" class="form-control @error('course') is-invalid @enderror" id="course"
                   name="course" value="{{ $group->course ?? '' }}" placeholder="Course"
                   required="required"/>
            <x-jet-input-error for="name"></x-jet-input-error>
        </div>
    </div>
    <div class="form-row row-eq-spacing-sm">
        <div class="col-sm">
            <label for="curator">Curator</label>
            <select class="form-control @error('curator_id') is-invalid @enderror" id="curator" name="curator_id">
                <option value="" selected="selected" disabled="disabled">Choose a curator...</option>
                @foreach($users as $user)
                    <option @if($group->curator_id === $user->id) selected
                            @endif value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>
            <x-jet-input-error for="curator_id"></x-jet-input-error>
        </div>
    </div>

    <div class="d-flex justify-content-end">
        <button type="submit" class="btn btn-dark">{{ $buttonName }}</button>
    </div>
</form>
