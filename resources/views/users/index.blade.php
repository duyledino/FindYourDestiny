<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Date page</title>
    <!-- Bootstrap CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-4">

    <h1 class="mb-4">User List</h1>

    <a href="/create" class="btn btn-primary mb-4">
        Create New User
    </a>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="table-responsive">
        <table class="table table-striped table-bordered align-middle">
            <thead class="table-light">
                <tr>
                    <th>ID</th>
                    <th>Email</th>
                    <th>Created At</th>
                    {{-- <th>Actions</th> --}}
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr>
                    <td>{{ $user->user_id }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->create_at }}</td>
                    {{-- <td>
                        <a href="/users/{{ $user->user_id }}/edit" class="text-primary text-decoration-none">Edit</a> |
                        <a href="/users/{{ $user->user_id }}/delete" class="text-danger text-decoration-none" onclick="return confirm('Delete user?')">Delete</a>
                    </td> --}}
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Bootstrap JS CDN (optional, for components like modals, dropdowns) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
