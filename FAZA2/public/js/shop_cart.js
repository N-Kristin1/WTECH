function updateQuantity(button, change) {
    const quantityDiv = button.parentElement.querySelector('.quantity');
    const currentQuantity = parseInt(quantityDiv.textContent);
    const newQuantity = Math.max(1, currentQuantity + change);
    quantityDiv.textContent = newQuantity;

    const cartItem = button.closest('.cart-item');
    const price = parseFloat(cartItem.querySelector('.product-price').textContent);
    const subtotalDiv = cartItem.querySelector('.subtotal');
    const newSubtotal = (price * newQuantity).toFixed(2);
    subtotalDiv.textContent = '€' + newSubtotal;

    updateCartTotal();
}

function removeItem(button) {
    const cartItem = button.closest('.cart-item');
    cartItem.remove();
    updateCartTotal();
    checkIfCartIsEmpty();
}

function updateCartTotal() {
    const subtotals = document.querySelectorAll('.subtotal');
    let total = 0;
    subtotals.forEach(subtotal => {
        total += parseFloat(subtotal.textContent.replace('€', ''));
    });

    const shippingFee = 3.89;
    const orderTotal = total + shippingFee;

    document.querySelector('.cart-subtotal').textContent = 'Cart Subtotal: €' + total.toFixed(2);
    document.querySelector('.order-total').textContent = 'Order Total: €' + orderTotal.toFixed(2);

    const shippingElement = document.querySelector('.shipping-fee');
    if (shippingElement) {
        shippingElement.textContent = 'Shipping fee: €' + shippingFee.toFixed(2);
    }
}

function checkIfCartIsEmpty() {
    const cartItems = document.querySelectorAll('.cart-item');
    if (cartItems.length === 0) {
        const cartContainer = document.querySelector('.cart-container');
        const cartHeader = document.querySelector('.cart-header');
        const emptyMessage = document.createElement('div');
        emptyMessage.classList.add('empty-message');
        emptyMessage.textContent = 'Your cart is empty';
        emptyMessage.style.textAlign = 'center';
        emptyMessage.style.padding = '20px';
        emptyMessage.style.color = '#666';
        cartHeader.insertAdjacentElement('afterend', emptyMessage);
    }
}

function addToCart(button) {
    const productCard = button.closest('.product-card');
    const productName = productCard.querySelector('h3').textContent;
    const price = parseFloat(productCard.querySelector('.price').textContent.replace('€', ''));
    const imageSrc = productCard.querySelector('img')?.getAttribute('src') || '';

    const cartItem = document.createElement('div');
    cartItem.className = 'cart-item';
    cartItem.innerHTML = `
        <div class="product-info">
            <img src="${imageSrc}" alt="${productName}" class="product-image">
            <div class="product-details">
                <div class="product-name">${productName}</div>
                <div class="product-price">${price}</div>
            </div>
        </div>
        <div class="quantity-control">
            <button class="quantity-btn" onclick="updateQuantity(this, -1)">-</button>
            <div class="quantity">1</div>
            <button class="quantity-btn" onclick="updateQuantity(this, 1)">+</button>
        </div>
        <div class="subtotal">€${price.toFixed(2)}</div>
        <button class="remove-btn" onclick="removeItem(this)">✖</button>
    `;

    const emptyMessage = document.querySelector('.cart-container .empty-message');
    if (emptyMessage) {
        emptyMessage.remove();
    }

    const cartContainer = document.querySelector('.cart-container');
    const cartSummary = document.querySelector('.cart-summary');
    cartContainer.insertBefore(cartItem, cartSummary);

    updateCartTotal();
}


document.addEventListener('DOMContentLoaded', function () {
    const searchIcon = document.querySelector('.search-icon');
    const searchBar = document.querySelector('.search-bar');
    let isSearchVisible = false;

    if (searchIcon && searchBar) {
        searchIcon.addEventListener('click', function () {
            isSearchVisible = !isSearchVisible;
            searchBar.classList.toggle('active', isSearchVisible);
            if (isSearchVisible) searchBar.focus();
        });

        document.addEventListener('click', function (event) {
            if (!searchBar.contains(event.target) && !searchIcon.contains(event.target)) {
                searchBar.classList.remove('active');
                isSearchVisible = false;
            }
        });
    }
});
