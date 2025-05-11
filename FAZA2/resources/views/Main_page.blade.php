<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Aura Attire</title>
    <link rel="stylesheet" href="{{ asset('css/main_page.css') }}">
</head>
<body>
    <div class="header">
        <div class="header-left">
            <div class="logo"><img src="{{ asset('images/logo.png') }}" alt="Aura Attire Logo"></div>
            <a href="{{ url('/cart') }}">
            <img src="{{ asset('images/cart.png') }}" alt="Cart Icon" class="cart-icon">
            </a>
            <div class="nav-links">
                <a href="{{ url('/categories') }}">Women</a>
                <a href="{{ url('/categories') }}">Men</a>
                <a href="{{ url('/categories') }}">Kids</a>
            </div>
        </div>
        <div class="header-icons">
            <input class="search-bar" type="text" placeholder="Search">
            <img src="{{ asset('images/search.png') }}" alt="Search Icon">
            <a href="{{ url('/login') }}">
                <img src="{{ asset('images/profile.png') }}" alt="User Icon">
            </a>
        </div>
    </div>

    <div class="main-title">Aura Attire</div>
    <div class="image-banner">
        <img src="{{ asset('images/img1.jpg') }}" alt="Banner Image">
    </div>

    <div class="collection">Newest Collection</div>
    <div class="newest-collection">
        <img src="{{ asset('images/img2.jpg') }}" alt="Newest Collection">
        <div class="advertisement">
            <div class="ad-content">
                <h2>Spring Collection 2025</h2>
                <p>Exclusive styles now available. Refresh your wardrobe with our latest designs.</p>
                <a href="{{ url('/categories') }}" class="shop-now">Shop Now</a>
            </div>
        </div>
    </div>

    <div class="ad-banner">
        <img src="{{ asset('images/ad.png') }}" alt="Advertisement">
    </div>

    <div class="collection">For you</div>
    <div class="products-container">
        <div class="products">
            <div class="product-pic"><img src="{{ asset('images/greenshirt.webp') }}" alt="Product 1"></div>
            <div class="product-pic"><img src="{{ asset('images/jeans.webp') }}" alt="Product 2"></div>
            <div class="product-pic"><img src="{{ asset('images/leatherjacket.jpg') }}" alt="Product 3"></div>
            <div class="product-pic"><img src="{{ asset('images/whiteshirt.webp') }}" alt="Product 4"></div>
            <div class="product-pic"><img src="{{ asset('images/shoes.png') }}" alt="Product 5"></div>
            <div class="product-pic"><img src="{{ asset('images/purplesweat.webp') }}" alt="Product 6"></div>
            <div class="product-pic"><img src="{{ asset('images/beanie.webp') }}" alt="Product 7"></div>
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
