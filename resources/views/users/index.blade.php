
    <h1>User List</h1>

<a href="/create">Create New User</a>

@if(session('success'))
    <p>{{ session('success') }}</p>
@endif

<table border="1" cellpadding="10">
    <tr>
        <th>ID</th>
        <th>Email</th>
        <th>Created At</th>
    </tr>

    @foreach($users as $user)
    <tr>
        <td>{{ $user->user_id }}</td>
        <td>{{ $user->email }}</td>
        <td>{{ $user->create_at }}</td>
        {{-- <td>
            <a href="/users/{{ $user->user_id }}/edit">Edit</a> |
            <a href="/users/{{ $user->user_id }}/delete" onclick="return confirm('Delete user?')">Delete</a>
        </td> --}}
    </tr>
    @endforeach
</table>
