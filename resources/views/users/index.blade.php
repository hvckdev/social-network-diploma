<x-app-layout>
    <x-content.table>
        <x-slot name="name">
            Users
        </x-slot>

        <x-slot name="head">
            <th>#</th>
            <th>Username</th>
            <th>Group</th>
        </x-slot>

        <x-slot name="body">
            @foreach($users as $user)
                <tr>
                    <th>{{ $user->id }}</th>
                    <td><a href="{{ route('users.show', $user->id) }}">{{ $user->name }}</a></td>
                    <td><a href="{{ route('groups.show', $user->information->group->id) }}">{{ $user->information->group->name }}</a></td>
                </tr>
            @endforeach
        </x-slot>

        <x-slot name="links">
            {{ $users->links() }}
        </x-slot>
    </x-content.table>
</x-app-layout>
