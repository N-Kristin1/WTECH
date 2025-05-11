<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Payment - Aura Attire</title>
  <link rel="stylesheet" href="{{ asset('css/payment_credit.css') }}">
  <script src="{{ asset('js/payment_credit.js') }}" defer></script>
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

  <div class="main-content">
    <div class="payment-container">
      <div class="progress-steps">
        <div class="step">1</div>
        <div class="step-line"></div>
        <div class="step active">2</div>
        <div class="step-line"></div>
        <div class="step">3</div>
      </div>

      <div class="payment-form">
        <div class="card-preview">
          <img src="{{ asset('images/credit.png') }}" alt="Credit Card">
        </div>

        <div class="card-inputs">
          <div class="input-group">
            <input type="text" placeholder="Card Number" maxlength="19">
          </div>

          <div class="expiry-cvv">
            <div class="input-group">
              <input type="text" placeholder="Expiry" maxlength="5">
            </div>
            <div class="input-group">
              <input type="text" placeholder="CVV" maxlength="3">
            </div>
          </div>

          <div class="input-group">
            <input type="text" placeholder="Holder Name">
          </div>

          <div class="save-card">
            <input type="checkbox" id="save-card">
            <label for="save-card">Save this credit card</label>
          </div>

          <button type="button" class="continue-btn" onclick="validateAndContinue()">Continue</button>
        </div>
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
</body>
</html>
