
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin - Manage Products</title>
    <link rel="stylesheet" href="{{ asset('css/admin_main.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
    <h1>Admin - Product Management</h1>

    <section id="product-form">
        <h2>Add New Product</h2>
        <input type="text" id="name" placeholder="Name">
        <input type="text" id="description" placeholder="Description">
        <input type="text" id="category" placeholder="Category">
        <input type="number" step="0.01" id="price" placeholder="Price">
        <input type="text" id="color" placeholder="Color">
        <input type="number" id="stock" placeholder="Stock">
        <input type="text" id="image" placeholder="Image Path">
        <input type="text" id="image2" placeholder="Image2 Path">
        <button onclick="addProduct()">Add Product</button>
    </section>

    <section id="product-list">
        <h2>All Products</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th><th>Name</th><th>Description</th><th>Category</th>
                    <th>Price</th><th>Color</th><th>Stock</th><th>Image</th><th>Image2</th><th>Actions</th>
                </tr>
            </thead>
            <tbody id="products-table-body">
            </tbody>
        </table>
    </section>

    <script src="{{ asset('js/admin_main.js') }}"></script>
</body>
</html>
