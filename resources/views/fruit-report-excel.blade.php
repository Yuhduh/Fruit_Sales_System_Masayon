<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
</head>
<body>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Category</th>
                <th>Price</th>
                <th>Stock Quantity</th>
                <th>Availability</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($fruits as $fruit)
                <tr>
                    <td>{{ $fruit->id }}</td>
                    <td>{{ $fruit->fruit_name }}</td>
                    <td>{{ $fruit->category }}</td>
                    <td>{{ $fruit->price }}</td>
                    <td>{{ $fruit->stock_quantity }}</td>
                    <td>{{ $fruit->is_available }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="6">No fruit records found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</body>
</html>