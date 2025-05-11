<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Shopping Cart</title>
  <link rel="stylesheet" href="{{ asset('css/shop_cart.css') }}">
</head>
<body>
  <div class="header">
    <div class="logo">
      <a href="{{ url('/') }}">
        <img src="{{ asset('images/logo.png') }}" alt="Aura Attire">
      </a>
    </div>
    <div class="header-icons">
      <div class="header-icon search-container">
        <input type="text" class="search-bar" placeholder="Search...">
        <img src="{{ asset('images/search.png') }}" alt="Search" class="search-icon">
      </div>
      <div class="header-icon">
        <a href="{{ url('/login') }}">
          <img src="{{ asset('images/profile.png') }}" alt="Profile">
        </a>
      </div>
    </div>
  </div>

  <div class="main-container">
    <div class="suggested-products">
      <h2>Recommended Products</h2>
      <div class="product-grid">
        @foreach ($recommendedProducts as $product)
          <form action="{{ route('cart.add.old', ['id' => $product->id]) }}" method="POST">
          @csrf
          <div class="product-card">
            <img src="{{ asset($product->image) }}" alt="{{ $product->name }}">
            <h3>{{ $product->name }}</h3>
            <div class="price">€{{ number_format($product->price, 2) }}</div>
            <button type="submit" class="add-to-cart-btn">Add to Cart</button>
          </div>
        </form>
        @endforeach
      </div>
    </div>

    <div class="cart-container">
      <div class="cart-header">
        <div>Products</div>
        <div>Quantity</div>
        <div>SUBTOTAL</div>
      </div>

      @php
        $cart = session('cart', []);
        $cartSubtotal = 0;
      @endphp

      @foreach ($cart as $productId => $item)
        @php
          $subtotal = $item['price'] * $item['quantity'];
          $cartSubtotal += $subtotal;
        @endphp

        <div class="cart-item">
          <div class="product-info">
            <img src="{{ asset($item['image']) }}" alt="{{ $item['name'] }}" class="product-image">
            <div class="product-details">
              <div class="product-name">{{ $item['name'] }}</div>
              <div class="product-price">€{{ number_format($item['price'], 2) }}</div>
            </div>
          </div>

          <div class="quantity-control">
            <form action="{{ route('cart.update', ['id' => $productId, 'action' => 'decrease']) }}" method="POST" style="display:inline;">
              @csrf
              <button type="submit">-</button>
            </form>

            <div class="quantity">{{ $item['quantity'] }}</div>

            <form action="{{ route('cart.update', ['id' => $productId, 'action' => 'increase']) }}" method="POST" style="display:inline;">
              @csrf
              <button type="submit">+</button>
            </form>
          </div>

          <div class="subtotal">€{{ number_format($subtotal, 2) }}</div>

          <form action="{{ route('cart.remove', $productId) }}" method="POST">
            @csrf
            <button type="submit" class="remove-btn">✖</button>
          </form>
        </div>
      @endforeach

      @php $shipping = 3.89; @endphp

      <div class="cart-summary">
        <div class="cart-subtotal">Cart Subtotal: €{{ number_format($cartSubtotal, 2) }}</div>
        <div class="shipping-fee">Shipping fee: €{{ number_format($shipping, 2) }}</div>
        <div class="order-total"><strong>Order Total: €{{ number_format($cartSubtotal + $shipping, 2) }}</strong></div>
        <a href="{{ url('/order-confirmation') }}" class="continue-btn" style="text-decoration: none;">Continue</a>
      </div>
    </div>
  </div>

  <script src="{{ asset('js/shop_cart.js') }}"></script>
</body>
</html>
