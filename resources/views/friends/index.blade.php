<x-app-layout>
    @if($requests->first() !== null )
        <div class="card">
            <details class="collapse-panel mw-full">
                <!-- w-400 = width: 40rem (400px), mw-full = max-width: 100% -->
                <summary class="collapse-header">
                    Friend requests
                    <livewire:acquaintances.components.requests-badge/>
                </summary>
                <div class="collapse-content">
                    @foreach($requests as $request)
                        <div>
                            <img src="{{ $request->sender->profile_photo_url }}" alt="" width="30" height="30">
                            <a href="{{ route('users.show', $request->sender) }}">{{ $request->sender->name }}</a>
                            <div class="text-right">
                                <livewire:acquaintances.friend-requests-button :sender="$request->sender"/>
                            </div>
                        </div>
                    @endforeach
                </div>
            </details>
        </div>
    @endif

    <x-alert/>

    <x-content.table>
        <x-slot name="name">My friends - {{ $friends->count() }}</x-slot>
        <x-slot name="head">
            <tr>
                <th scope="row">Name</th>
                <th scope="row">Send message</th>
                <th scope="row">Delete</th>
            </tr>
        </x-slot>

        <x-slot name="body">
            @foreach($friends as $friend)
                <tr>
                    <td>
                        <img src="{{ $friend->profile_photo_url }}" alt="" width="30" height="30">
                        <a href="{{ route('users.show', $friend) }}">
                            {{ $friend->name }}
                        </a>
                    </td>
                    <td><livewire:messenger.send-message-modal :friend-id="$friend->id" :recipient="$friend"/></td>
                    <td>
                        <livewire:acquaintances.friend-delete-button :friend="$friend"/>
                    </td>
                </tr>
            @endforeach
        </x-slot>
    </x-content.table>
</x-app-layout>
