
    <h1>Create User</h1>

    <form action="/create" method="POST">
        @csrf

        <label>Email:</label>
        <input type="email" name="email" required><br><br>

        <label>Password:</label>
        <input type="password" name="password" required><br><br>

        <button type="submit">Save</button>
    </form>

    <a href="/users">Back to List</a>