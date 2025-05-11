
document.addEventListener('DOMContentLoaded', loadProducts);

function loadProducts() {
    fetch('/admin/products')
        .then(response => response.json())
        .then(data => {
            const tbody = document.getElementById('products-table-body');
            tbody.innerHTML = '';
            data.forEach(product => {
            let row = `<tr id="row-${product.id}">
                <td>${product.id}</td>
                <td>${product.name}</td>
                <td>${product.description}</td>
                <td>${product.category}</td>
                <td>${product.price}</td>
                <td>${product.color}</td>
                <td>${product.stock}</td>
                <td>${product.image ? product.image + '<br><img src="/' + product.image + '" alt="image" style="max-height:60px; margin-top:5px;">' : 'No image'}<br>
                    ${product.image ? `<button onclick="deleteImage(${product.id})">Delete Image</button>` : ''}
                </td>
                <td>${product.image2 ? product.image2 + '<br><img src="/' + product.image2 + '" alt="image2" style="max-height:60px; margin-top:5px;"><br><button onclick="deleteImage2(${product.id})">Delete Image2</button>' : 'No image2'}</td>
                <td>
                    <button onclick="editProduct(${product.id})">Edit</button>
                    <button onclick="deleteProduct(${product.id})">Delete</button>
                </td>
            </tr>`;
                tbody.innerHTML += row;
            });
        });
}


function addProduct() {
    const data = {
        name: document.getElementById('name').value,
        description: document.getElementById('description').value,
        category: document.getElementById('category').value,
        price: document.getElementById('price').value,
        color: document.getElementById('color').value,
        stock: document.getElementById('stock').value,
        image: document.getElementById('image').value,
        image2: document.getElementById('image2').value,
    };

    fetch('/admin/products', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: JSON.stringify(data)
    }).then(() => {
        loadProducts();
        document.querySelectorAll('#product-form input').forEach(input => input.value = '');
    });
}

function deleteProduct(id) {
    if (!confirm("Are you sure you want to delete this product?")) return;

    fetch(`/admin/products/${id}`, {
        method: 'DELETE',
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        }
    }).then(() => loadProducts());
}

function editProduct(id) {
    const row = document.getElementById(`row-${id}`);
    const cells = row.querySelectorAll('td');
    const values = Array.from(cells).slice(1, 9).map(cell => cell.innerText);

    row.innerHTML = `
        <td>${id}</td>
        <td><input value="${values[0]}"></td>
        <td><input value="${values[1]}"></td>
        <td><input value="${values[2]}"></td>
        <td><input type="number" step="0.01" value="${values[3]}"></td>
        <td><input value="${values[4]}"></td>
        <td><input type="number" value="${values[5]}"></td>
        <td><input value="${values[6]}"></td>
        <td><input value="${values[7]}"></td>
        <td>
            <button onclick="saveProduct(${id})">Save</button>
            <button onclick="loadProducts()">Cancel</button>
        </td>
    `;
}

function saveProduct(id) {
    const row = document.getElementById(`row-${id}`);
    const inputs = row.querySelectorAll('input');

    const data = {
        name: inputs[0].value,
        description: inputs[1].value,
        category: inputs[2].value,
        price: inputs[3].value,
        color: inputs[4].value,
        stock: inputs[5].value,
        image: inputs[6].value,
        image2: inputs[7].value,
    };

    fetch(`/admin/products/${id}`, {
        method: 'PUT',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: JSON.stringify(data)
    }).then(() => loadProducts());
}
function deleteImage(id) {
    if (!confirm("Are you sure you want to delete the image?")) return;

    fetch(`/admin/products/${id}/image`, {
        method: 'DELETE',
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        }
    }).then(() => loadProducts());
}

function deleteImage2(id) {
    if (!confirm("Are you sure you want to delete image2?")) return;

    fetch(`/admin/products/${id}/image2`, {
        method: 'DELETE',
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        }
    }).then(() => loadProducts());
}

