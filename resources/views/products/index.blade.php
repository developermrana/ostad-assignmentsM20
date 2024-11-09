<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product List</title>
</head>
<body>
    <h1>Products</h1>

    <form action="{{ route('products.index') }}" method="GET">
        <input type="text" name="search" value="{{ request('search') }}" placeholder="Search by Product ID or Description">
        <button type="submit">Search</button>
    </form>

    <table>
        <thead>
            <tr>
                <th><a href="{{ route('products.index', ['sort_by' => 'name', 'order' => request('order') === 'asc' ? 'desc' : 'asc']) }}">Name</a></th>
                <th><a href="{{ route('products.index', ['sort_by' => 'price', 'order' => request('order') === 'asc' ? 'desc' : 'asc']) }}">Price</a></th>
                <th>Product ID</th>
                <th>Description</th>
                <th>Stock</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->price }}</td>
                    <td>{{ $product->product_id }}</td>
                    <td>{{ $product->description }}</td>
                    <td>{{ $product->stock }}</td>
                    <td>
                        <a href="{{ route('products.show', $product->id) }}">View</a>
                        <a href="{{ route('products.edit', $product->id) }}">Edit</a>
                        <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $products->links() }}
</body>
</html>

