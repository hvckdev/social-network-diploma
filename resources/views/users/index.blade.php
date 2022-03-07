<x-app-layout>
    <div class="content">
        <x-alert />
    </div>

    <x-content.table>
        <x-slot name="name">
            Users
        </x-slot>

        <x-slot name="head">
            <th>#</th>
            <th>Username</th>
            <th>Group</th>
            <th>Action</th>
        </x-slot>

        <x-slot name="body">
            @foreach($users as $user)
                <tr>
                    <th>{{ $user->id }}</th>
                    <td>
                        <img src="{{ $user->profile_photo_url }}" alt="" width="30" height="30">
                        <a href="{{ route('users.show', $user->id) }}">{{ $user->name }}</a>
                    </td>
                    <td><a href="{{ ! empty($user->information->group->id) ? route('groups.show', $user->information->group->id) : '#' }}">{{ $user->information->group->name ?? 'Not in group' }}</a></td>
                    <td><livewire:acquaintances.profile-friend-button :recipient="$user" /></td>
                </tr>
            @endforeach
        </x-slot>

        <x-slot name="links">
            {{ $users->links() }}
        </x-slot>
    </x-content.table>
</x-app-layout>
