<x-app-layout>
    <x-card-layout>
        <x-slot name="title">
            {{ $group->name }}
            @can('delete', $group)
                <a class="btn btn-danger float-right btn-sm ml-5">Delete</a>
            @endcan
            @can('edit', $group)
                <a class="btn btn-dark float-right btn-sm ml-5" href="{{ route('groups.edit', $group) }}">Edit</a>
            @endcan
            <a class="btn btn-primary float-right btn-sm" href="{{ route('groups.edit', $group) }}">Create announcement</a>
        </x-slot>

        <p><span class="text-muted small">Course</span><br>{{ $group->course }}</p>
        <p><span class="text-muted small">Curator</span><br>
            <img src="{{ $group->curator->profile_photo_url }}" alt="" width="30" height="30">
            <a href="{{ route('users.show', $group->curator->id) }}">
                {{ $group->curator->name }}</a></p>

        <div class="row">
            <table class="col table table-borderless">
                <thead>
                <tr>
                    <th scope="row">Users in group</th>
                </tr>
                </thead>
                <tbody>
                @foreach($group->users as $userInfo)
                    <tr>
                        <td>
                            <img src="{{ $userInfo->user->profile_photo_url }}" alt="" width="30" height="30">
                            <a href="{{ route('users.show', $userInfo->user->id) }}">{{ $userInfo->user->name }}</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            <div class="col overflow-auto">
                <p class="font-weight-bold">Announcements</p>
                @foreach($group->announcements as $announcement)
                    <p>{{ $announcement->text }}</p>
                    <small class="text-muted">{{ $announcement->created_at }}</small>
                @endforeach
            </div>
        </div>
    </x-card-layout>
</x-app-layout>
