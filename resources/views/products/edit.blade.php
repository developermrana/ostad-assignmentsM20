<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
</head>
<body>
    <h1>Edit Product</h1>

    <form action="{{ route('products.update', $product->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <label for="product_id">Product ID</label>
        <input type="text" name="product_id" id="product_id" value="{{ old('product_id', $product->product_id) }}" required><br>

        <label for="name">Name</label>
        <input type="text" name="name" id="name" value="{{ old('name', $product->name) }}" required><br>

        <label for="description">Description</label>
        <textarea name="description" id="description">{{ old('description', $product->description) }}</textarea><br>

        <label for="price">Price</label>
        <input type="number" step="0.01" name="price" id="price" value="{{ old('price', $product->price) }}" required><br>

        <label for="stock">Stock</label>
        <input type="number" name="stock" id="stock" value="{{ old('stock', $product->stock) }}"><br>

        <label for="image">Image</label>
        <input type="text" name="image" id="image" value="{{ old('image', $product->image) }}"><br>

        <button type="submit">Update Product</button>
    </form>

    <a href="{{ route('products.index') }}">Back to Product List</a>
</body>
</html>
