<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Order Confirmation - Aura Attire</title>
  <link rel="stylesheet" href="{{ asset('css/order_confirmation.css') }}">
  <script src="{{ asset('js/order_confirmation.js') }}" defer></script>
</head>
<body>
  <div class="header">
    <a href="{{ url('/') }}" class="logo">
      <img src="{{ asset('images/logo.png') }}" alt="Aura Attire Logo">
    </a>
    <div class="header-icons">
      <div class="header-icon search-container">
        <input type="text" class="search-bar" placeholder="Search...">
        <img src="{{ asset('images/search.png') }}" alt="Search" class="search-icon">
      </div>
      <div class="header-icon">
        <a href="{{ url('/login') }}"><img src="{{ asset('images/profile.png') }}" alt="Profile"></a>
      </div>
    </div>
  </div>

  <div class="progress-steps">
    <div class="step active">1</div>
    <div class="step-line"></div>
    <div class="step">2</div>
    <div class="step-line"></div>
    <div class="step">3</div>
  </div>

  <form class="order-form" method="POST" action="{{ route('orders.store') }}">
    @csrf
    <div class="personal-info">
      <input name="first_name" type="text" class="form-input" placeholder="First Name" required
            value="{{ Auth::check() ? Auth::user()->first_name : '' }}">

      <input name="last_name" type="text" class="form-input" placeholder="Last Name" required
            value="{{ Auth::check() ? Auth::user()->last_name : '' }}">

      <input name="email" type="email" class="form-input" placeholder="Email Address" required
            value="{{ Auth::check() ? Auth::user()->email : '' }}">

      <input name="address" type="text" class="form-input" placeholder="Address for Delivery" required
            value="{{ Auth::check() ? Auth::user()->address : '' }}">

      <input name="phone" type="tel" class="form-input" placeholder="Phone Number" required
            value="{{ Auth::check() ? Auth::user()->phone : '' }}">
    </div>

    <div class="options">
      <div class="payment-options">
        <div class="option-header">Payment Method</div>

        <label class="payment-option">
          <div style="display: flex; align-items: center; gap: 10px;">
            <img src="{{ asset('images/credit.png') }}" alt="Credit Card"> Credit Card
          </div>
          <input type="radio" name="payment" value="credit_card" required>
        </label>

        <label class="payment-option">
          <div style="display: flex; align-items: center; gap: 10px;">
            <img src="{{ asset('images/cash.png') }}" alt="Cash"> Cash
          </div>
          <input type="radio" name="payment" value="cash">
        </label>

        <label class="payment-option">
          <div style="display: flex; align-items: center; gap: 10px;">
            <img src="{{ asset('images/bank.png') }}" alt="Bank Transfer"> Bank Transfer
          </div>
          <input type="radio" name="payment" value="bank_transfer">
        </label>
      </div>

      <div class="delivery-options">
        <div class="option-header">Delivery Options</div>

        <label class="delivery-option">
          Home Address
          <input type="radio" name="delivery" value="home" required>
        </label>

        <label class="delivery-option">
          Z-BOX
          <input type="radio" name="delivery" value="zbox">
        </label>
      </div>
    </div>

    <button type="submit" class="go-to-payment">Go to Payment</button>
  </form>

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
