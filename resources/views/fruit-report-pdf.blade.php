<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Fruit Report</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; font-size: 12px; }
        h2 { margin-bottom: 12px; }
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid #000; padding: 6px; }
        th { background: #f3f3f3; }
        .center { text-align: center; }
    </style>
</head>
<body>
    <h2>Fruit Report</h2>
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
                    <td class="center">{{ $fruit->id }}</td>
                    <td class="center">{{ $fruit->fruit_name }}</td>
                    <td class="center">{{ $fruit->category }}</td>
                    <td class="center">{{ $fruit->price }}</td>
                    <td class="center">{{ $fruit->stock_quantity }}</td>
                    <td class="center">{{ $fruit->is_available }}</td>
                </tr>
            @empty
                <tr>
                    <td class="center" colspan="6">No fruit records found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</body>
</html>