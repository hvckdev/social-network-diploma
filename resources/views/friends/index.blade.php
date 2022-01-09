<x-app-layout>
    <x-content.table>
        <x-slot name="name">My friends</x-slot>

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
                    <td>{{ $friend->name }}</td>
                    <td><a href="#">Send message</a></td>
                    <td><button class="btn btn-sm btn-danger">Delete</button></td>
                </tr>
            @endforeach
        </x-slot>
    </x-content.table>
</x-app-layout>
