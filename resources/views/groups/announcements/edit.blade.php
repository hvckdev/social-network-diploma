<x-app-layout>
    <x-card-layout>
        <x-slot name="title">Edit Announcement</x-slot>
        @include('groups.announcements.components.form', ['action' => route('groups.announcements.update', [$group->id, $announcement->id]), 'method' => 'PUT'])
    </x-card-layout>
</x-app-layout>
