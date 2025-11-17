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
<h1 class="mb-4">Create User</h1>

<form action="/create" method="POST" class="max-w-md p-4 p-md-5 bg-white shadow rounded mx-auto">
    @csrf

    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" name="email" id="email" required class="form-control">
    </div>

    <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" name="password" id="password" required class="form-control">
    </div>

    <button type="submit" class="btn btn-primary w-100">
        Save
    </button>
</form>

<div class="mt-3 text-center">
    <a href="/" class="text-decoration-none text-primary">
        ← Back to List
    </a>
</div>
<!-- Bootstrap JS CDN (optional, for components like modals, dropdowns) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
