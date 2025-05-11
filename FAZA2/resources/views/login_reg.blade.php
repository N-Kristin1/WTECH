<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Login a Register | Aura Attire</title>
  <link rel="stylesheet" href="{{ asset('css/login_reg.css') }}">
</head>
<body>

<header>
  <div class="logo">
    <a href="{{ url('/') }}"><img src="{{ asset('images/blacklogo.png') }}" alt="Aura Attire Logo"></a>
  </div>

@auth
  <div style="position: absolute; top: 10px; right: 20px; display: flex; align-items: center; gap: 10px;">
    <span style="font-weight: bold;">Vitaj, {{ Auth::user()->first_name }}!</span>
    <form method="POST" action="{{ route('logout') }}">
      @csrf
      <button type="submit" style="
        background-color: #28a745; 
        color: white; 
        border: none; 
        padding: 6px 12px; 
        border-radius: 4px;
        cursor: pointer;
      ">Odhlásiť sa</button>
    </form>
  </div>
@endauth

  @guest
  @endguest
</header>


  <div class="main-content">
    <div class="form-container login-container">
      <h2>Sign In</h2>
      <form id="login-form" method="POST" action="{{ route('login') }}">
        @csrf

        <label for="email">Email</label>
        <input type="email" id="email" name="email" placeholder="Enter your email address" required>

        <label for="password">Password</label>
        <input type="password" id="password" name="password" placeholder="Enter your password" required>

        <a href="#">Reset your password</a>

        <button type="submit" class="submit-btn">Sign In</button>  
      </form>
    </div>

    <div class="divider"></div>

    <div class="form-container register-container">
      <h2>Register</h2>
      <form method="POST" action="{{ route('register') }}">
        @csrf

        <label for="first_name">First name</label>
        <input type="text" name="first_name" id="first_name" placeholder="Enter first name" required>

        <label for="last_name">Last name</label>
        <input type="text" name="last_name" id="last_name" placeholder="Enter last name" required>

        <label for="email_register">Email</label>
        <input type="email" name="email" id="email_register" placeholder="Enter your email" required>

        <label for="password_register">Password</label>
        <input type="password" name="password" id="password_register" placeholder="Enter your password" required>

        <label for="password_confirmation">Re-enter Password</label>
        <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Re-enter your password" required>

        <label for="address">Address</label>
        <input type="text" name="address" id="address" placeholder="Enter your address" required>

        <label for="phone">Phone number</label>
        <input type="tel" name="phone" id="phone" placeholder="Enter your phone number" required>

        <button type="submit" class="submit-btn">Sign Up</button>  
      </form>
    </div>
  </div>

  <div class="footer">
    <div class="social-icons">
      <a href="#"><img src="{{ asset('images/instagram.png') }}" alt="Instagram"></a>
      <a href="#"><img src="{{ asset('images/twitter.png') }}" alt="Twitter"></a>
      <a href="#"><img src="{{ asset('images/youtube.png') }}" alt="YouTube"></a>
    </div>
    <p class="footer-text">Kontakt | Obchodné podmienky | Platba | Doprava | Reklamácia | Predajne</p>
    <p class="footer-text" style="font-size: 12px; color: #666; margin-top: 10px;">
        [Development Only] Admin Login: admin@auraattire.com / admin123
    </p>
  </div>

</body>
</html>
