<x-app-layout>
    @if($requests->first() !== null )
        <div class="content">
            <div class="card">
                <details class="collapse-panel mw-full">
                    <!-- w-400 = width: 40rem (400px), mw-full = max-width: 100% -->
                    <summary class="collapse-header">
                        Friend requests <span class="badge badge-danger badge-pill">{{ $requests->count() }}</span>
                    </summary>
                    <div class="collapse-content">
                        @foreach($requests as $request)
                            <div>
                                <a href="{{ route('users.show', $request->sender) }}">{{ $request->sender->name }}</a>
                                <livewire:acquaintances.friend-requests-button :sender="$request->sender"/>
                            </div>
                        @endforeach
                    </div>
                </details>
            </div>
        </div>
    @endif

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
                    <td><a href="{{ route('users.show', $friend) }}">{{ $friend->name }}</a></td>
                    <td><a href="#" class="btn btn-sm btn-primary">Send message</a></td>
                    <td>
                        <livewire:acquaintances.friend-delete-button :friend="$friend" />
                    </td>
                </tr>
            @endforeach
        </x-slot>
    </x-content.table>
</x-app-layout>
