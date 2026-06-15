<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome all crazy boy</title>
</head>
<body>
    <ul>
        <li><a href="{{ route('users.index') }}">Users</a></li>
        <li><a href="{{ route('customers.index') }}">Customers</a></li>
        <li><a href="{{ route('categories.index') }}">Categories</a></li>
        <li><a href="{{ route('students.index') }}">Students</a></li>
    </ul>
</body>
</html>