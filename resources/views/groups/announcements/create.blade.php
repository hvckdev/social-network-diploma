<x-app-layout>
    <x-card-layout>
        <x-slot name="title">Create Announcement For Group {{ $group->name }}</x-slot>
        @include('groups.announcements.components.form',['action' => route('groups.announcements.store', $group->id)])
    </x-card-layout>
</x-app-layout>
