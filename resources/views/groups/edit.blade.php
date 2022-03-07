<x-app-layout>
    <x-card-layout>
        <x-slot name="title">Edit Group {{ $group->name }}</x-slot>
        @include('groups.components.form', ['buttonName' => 'Update', 'route' => route('groups.update', $group), 'method' => 'PUT', 'name' => $group->name])
    </x-card-layout>

    <x-card-layout>
        <x-slot name="title">Add Users To Group {{ $group->name }}</x-slot>
        <livewire:group.forms.add-user-to-group :group="$group" />
    </x-card-layout>

    <x-card-layout>
        <x-slot name="title">Delete Users From Group {{ $group->name }}</x-slot>
        <livewire:group.forms.delete-user-from-group :group="$group" />
    </x-card-layout>
</x-app-layout>
