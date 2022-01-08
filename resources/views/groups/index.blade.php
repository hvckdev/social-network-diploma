<x-app-layout>
    <x-content.table>
        <x-slot name="name">
            Groups
            @can('create')
                <a class="btn btn-dark float-right btn-sm" href="{{ route('groups.create') }}">Create</a>
            @endcan
        </x-slot>
        <x-slot name="head">
            <th>#</th>
            <th>Name</th>
            <th>Curator</th>
        </x-slot>

        <x-slot name="body">
            @foreach($groups as $group)
                <tr>
                    <td>{{ $group->id }}</td>
                    <td><a href="{{ route('groups.show', $group) }}">{{ $group->name }}</a></td>
                    <td><a href="{{ route('users.show', $group->curator) }}">{{ $group->curator->name }}</a></td>
                </tr>
            @endforeach
        </x-slot>

        <x-slot name="links">
            {{ $groups->links() }}
        </x-slot>
    </x-content.table>
</x-app-layout>
