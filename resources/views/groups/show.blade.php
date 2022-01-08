<x-app-layout>
    <x-card-layout>
        <x-slot name="title">
            {{ $group->name }}
            @can('delete', $group)
                <a class="btn btn-danger float-right btn-sm ml-5">Delete</a>
            @endcan
            @can('edit', $group)
                <a class="btn btn-dark float-right btn-sm" href="{{ route('groups.edit', $group) }}">Edit</a>
            @endcan
        </x-slot>
        <p><span class="text-muted small">Course</span><br>{{ $group->course }}</p>

        <table class="table table-borderless">
            <thead>
            <tr>
                <th scope="row">Users in group</th>
            </tr>
            </thead>
            <tbody>
            @foreach($group->users as $userInfo)
                <tr>
                    <td><a href="{{ route('users.show', $userInfo->user->id) }}">{{ $userInfo->user->name }}</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </x-card-layout>
</x-app-layout>
