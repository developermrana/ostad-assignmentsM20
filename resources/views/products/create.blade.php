<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Product</title>
</head>
<body>
    <h1>Create New Product</h1>

    <form action="{{ route('products.store') }}" method="POST">
        @csrf
        <label for="product_id">Product ID</label>
        <input type="text" name="product_id" id="product_id" required><br>

        <label for="name">Name</label>
        <input type="text" name="name" id="name" required><br>

        <label for="description">Description</label>
        <textarea name="description" id="description"></textarea><br>

        <label for="price">Price</label>
        <input type="number" step="0.01" name="price" id="price" required><br>

        <label for="stock">Stock</label>
        <input type="number" name="stock" id="stock"><br>

        <label for="image">Image</label>
        <input type="text" name="image" id="image"><br>

        <button type="submit">Create Product</button>
    </form>
</body>
</html>
