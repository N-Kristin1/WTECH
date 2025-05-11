<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Product Grid</title>
  <link rel="stylesheet" href="{{ asset('css/categories.css') }}">
</head>
<body>

  <header>
    <div class="logo">
      <a href="{{ url('/') }}"><img src="{{ asset('images/blacklogo.png') }}" alt="Aura Attire Logo"></a>
    </div>
    <div class="icons">
      <input type="text" placeholder="Search..." id="searchInput" />
      <a href="{{ url('/cart') }}"><img src="{{ asset('images/cart.png') }}" alt="cart" class="link-icon"></a>
      <a href="{{  url('/login')  }}"><img src="{{ asset('images/profile.png') }}" alt="profile icon" class="link-icon"></a>
      <a href="{{ route('wishlist.index') }}"><img src="{{ asset('images/wishlist.png') }}" alt="wishlist"></a>
    </div>
  </header>

  <nav>
    <button>Home</button>
    <button>Men</button>
    <button>Women</button>
    <button>Children</button>
  </nav>

  <div class="container">
    <div class="sidebar">
      <h4>Category</h4>
      @foreach (['Tshirts','Pants','Shorts','Jackets','Shoes','Headwear'] as $item)
        <label class="custom-checkbox">
          <input type="checkbox" checked><span class="checkmark"></span>{{ $item }}
        </label><br>
      @endforeach

      <h4>Color</h4>
      @foreach (['Blue','Brown','White','Green','Black','Red','Purple'] as $color)
        <label class="custom-checkbox">
          <input type="checkbox" checked><span class="checkmark"></span>{{ $color }}
        </label><br>
      @endforeach

      <h4>Size</h4>
      @foreach (['S','M','L'] as $size)
        <label class="custom-checkbox">
          <input type="checkbox" checked><span class="checkmark"></span>{{ $size }}
        </label><br>
      @endforeach
    </div>

    <div class="content">
      <div class="search-sort">
      <div class="sort-buttons">
        <button data-sort="new">New</button>
        <button data-sort="asc">Price ascending</button>
        <button data-sort="desc">Price descending</button>
      </div>
      </div>

      <div class="products" id="product-grid">
        @foreach ($products as $index => $product)
          <a href="{{ url('product/' . $product->id) }}"
            class="product"
            data-category="{{ strtolower($product->category) }}"
            data-color="{{ strtolower($product->color) }}"
            data-price="{{ number_format($product->price, 2, '.', '') }}"
            data-stock="{{ $product->stock }}"
            data-name="{{ strtolower($product->name) }}"
            style="{{ $index >= 8 ? 'display: none;' : '' }}">
            <img src="{{ asset($product->image) }}">
            <p>{{ $product->name }}<br>€{{ $product->price }}</p>
          </a>
        @endforeach
      </div>
      <div class="load-more">
        <button id="loadMore">Load More</button>
      </div>
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

  <script src="{{ asset('js/categories.js') }}"></script>

</body>
</html>