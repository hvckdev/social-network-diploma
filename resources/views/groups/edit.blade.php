<x-app-layout>
    <x-card-layout>
        <x-slot name="title">Edit Group {{ $group->name }}</x-slot>
        @include('groups.components.form', ['buttonName' => 'Update', 'route' => route('groups.update', $group), 'method' => 'PUT', 'name' => $group->name])
    </x-card-layout>

    <x-card-layout>
        <x-slot name="title">Add Users To Group {{ $group->name }}</x-slot>
        <form method="POST" action="{{ route('groups.add-users', $group) }}">
            @csrf
            <div class="form-row row-eq-spacing-sm">
                <div class="col-sm">
                    <label for="user-select">User</label>
                    <select class="form-control" id="user-select" multiple="multiple" name="users[]" size="3">
                        @foreach($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-dark">Add</button>
            </div>
        </form>
    </x-card-layout>
</x-app-layout>
