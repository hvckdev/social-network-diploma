<x-app-layout>
    <x-card-layout>
        <x-slot name="title">Create Group</x-slot>
        @include('groups.components.form', ['buttonName' => 'Create', 'route' => route('groups.store')])
    </x-card-layout>
</x-app-layout>
