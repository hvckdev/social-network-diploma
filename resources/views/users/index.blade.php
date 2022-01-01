<x-app-layout>
    <div class="content">
        <div class="card">
            <div class="card-title">Users</div>
            <div class="card-body">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Username</th>
                        <th>Group</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <th>{{ $user->id }}</th>
                            <td><a href="{{ route('users.show', $user->id) }}">{{ $user->name }}</a></td>
                            <td>{{ 'soon' }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="d-flex justify-content-center">
        {{ $users->links() }}
    </div>
</x-app-layout>
