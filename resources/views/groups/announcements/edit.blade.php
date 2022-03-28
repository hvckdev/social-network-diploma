<x-app-layout>
    <x-card-layout>
        <x-slot name="title">Edit Announcement</x-slot>
        @include('groups.announcements.components.form', [
            'action' => route('groups.announcements.update', [$group->id, $announcement->id]),
            'method' => 'PUT',
            'text' => $announcement->text
        ])
        <form method="POST" action="{{ route('groups.announcements.destroy', [$group, $announcement]) }}">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger">Delete</button>
        </form>
    </x-card-layout>
</x-app-layout>
