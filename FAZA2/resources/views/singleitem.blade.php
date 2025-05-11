<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>{{ $product->name ?? 'Product Page' }}</title>
  <link rel="stylesheet" href="{{ asset('css/singleitem.css') }}">
  <script src="{{ asset('js/singleitem.js') }}" defer></script>
</head>
  <header>
    <div class="logo">
      <a href="{{ url('/') }}">
        <img src="{{ asset('images/blacklogo.png') }}" alt="Aura Attire Logo">
      </a>
    </div>
    <div class="icons">
      <input type="text" placeholder="Search..." />
      <a href="{{ url('/cart') }}"><img src="{{ asset('images/cart.png') }}" alt="cart"></a>
      <a href="{{ url('/login') }}"><img src="{{ asset('images/profile.png') }}" alt="profile"></a>
      <a href="{{ route('wishlist.index') }}"><img src="{{ asset('images/wishlist.png') }}" alt="wishlist"></a>
    </div>
  </header>

  <div class="product-container">
    <div class="product-images">
        <div class="main-image" style="position: relative;">
            <button id="prevImage" style="position: absolute; top: 50%; left: 0; transform: translateY(-50%);">⟨</button>
            <img id="productImage" src="{{ asset($product->image) }}" alt="{{ $product->name }}" data-image1="{{ asset($product->image) }}" data-image2="{{ asset($product->image2) }}" style="max-width: 100%; display: block; margin: auto;">
            <button id="nextImage" style="position: absolute; top: 50%; right: 0; transform: translateY(-50%);">⟩</button>
        </div>
    </div>


    <div class="product-details">
      <h2>{{ $product->name }}</h2>
      <div class="price">€{{ number_format($product->price, 2) }} <del>€{{ number_format($product->price * 1.2, 2) }}</del></div>
      <p><strong>Availability:</strong> In stock</p>
      <p><strong>Category:</strong> {{ $product->category }}</p>


      <div class="sizes">
        <label>Size</label>
        <select>
          @for ($i = 46; $i >= 37; $i--)
            <option>{{ $i }}</option>
          @endfor
        </select>
      </div>

      <div class="quantity">
        <button onclick="changeQty(-1)">-</button>
        <span id="qty">1</span>
        <button onclick="changeQty(1)">+</button>
      </div>

      <div class="actions">
        <form method="POST" action="{{ route('cart.add') }}">
          @csrf
          <input type="hidden" name="product_id" value="{{ $product->id }}">
          <input type="hidden" name="quantity" id="cart-qty" value="1">
          <input type="hidden" name="size" id="selected-size" value="46">
          <button type="submit">Add To Cart</button>
        </form>
        <form method="POST" action="{{ route('wishlist.store', $product->id) }}" style="display:inline;">
            @csrf
            <button type="submit">♡</button>
        </form>

      </div>

    </div>
  </div>

  <div class="tabs">
    <div>Product Information</div>
  </div>

  <div class="description">
      <h3 style="text-align:center">Product Description</h3>
      <p>{{ $product->description }}</p>

  </div>


  <div class="related">
      <h3 style="text-align:center">Related products</h3>
      <div class="related-products">
          @forelse ($relatedProducts as $related)
              <a href="{{ url('product/' . $related->id) }}" class="related-product">
                  <img src="{{ asset($related->image) }}" alt="{{ $related->name }}" style="max-height:80px; display:block; margin:auto;">
                  <div>{{ $related->name }}</div>
                  <div>€{{ number_format($related->price, 2) }}</div>
              </a>
          @empty
              <p style="text-align:center;">No related products found.</p>
          @endforelse
      </div>
  </div>


  <div class="footer">
    <div class="social-icons">
      <a href="#"><img src="{{ asset('images/instagram.png') }}" alt="Instagram"></a>
      <a href="#"><img src="{{ asset('images/twitter.png') }}" alt="Twitter"></a>
      <a href="#"><img src="{{ asset('images/youtube.png') }}" alt="YouTube"></a>
    </div>
    <p class="footer-text">Kontakt | Obchodné podmienky | Platba | Doprava | Reklamácia | Predajne</p>
  </div>
</body>
</html>
