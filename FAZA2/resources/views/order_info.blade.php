<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Information - Aura Attire</title>
    <link rel="stylesheet" href="{{ asset('css/order_info.css') }}">
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
        <div class="step">1</div>
        <div class="step-line"></div>
        <div class="step">2</div>
        <div class="step-line"></div>
        <div class="step active">3</div>
    </div>

    <div class="order-container">
        <div class="thank-you">
            <h1>Thank you for your purchase!</h1>
            <p>You will receive a confirmation email shortly.</p>
        </div>

        <div class="order-details">
            <h2 class="section-title">Order Information</h2>
            <div class="info-grid">
                <div class="info-section">
                    <h3>Personal Information</h3>
                    <p><strong>Name:</strong> {{ $order->first_name }} {{ $order->last_name }}</p>
                    <p><strong>Email:</strong> {{ $order->email }}</p>
                    <p><strong>Phone:</strong> {{ $order->phone_number }}</p>
                </div>

                <div class="info-section">
                    <h3>Delivery Information</h3>
                    <p><strong>Delivery Method:</strong> {{ ucfirst(str_replace('_', ' ', $order->delivery_method)) }}</p>
                    <p><strong>Address:</strong> {{ $order->address }}</p>
                    <p><strong>Estimated Delivery:</strong>
                        {{ $order->delivery_method === 'zbox' ? '2-3 business days' : '3-5 business days' }}
                    </p>
                </div>

                <div class="info-section">
                    <h3>Payment Information</h3>
                    <p><strong>Payment Method:</strong> {{ ucfirst(str_replace('_', ' ', $order->payment_method)) }}</p>
                    @if ($order->payment_method === 'credit_card')
                        <p><strong>Card Number:</strong> **** **** **** 1234</p>
                    @elseif ($order->payment_method === 'cash')
                        <p><strong>Amount Due:</strong> €{{ number_format($order->total_price, 2) }}</p>
                        <p><strong>Pay at:</strong> Delivery</p>
                    @elseif ($order->payment_method === 'bank_transfer')
                        <p><strong>IBAN:</strong> SK12 3456 7890 1234 5678 9012</p>
                        <p><strong>SWIFT:</strong> GIBASKBX</p>
                        <p><strong>Variable Symbol:</strong> {{ $order->id }}</p>
                        <p><strong>Amount:</strong> €{{ number_format($order->total_price, 2) }}</p>
                    @endif
                </div>

                <div class="info-section">
                    <h3>Order Summary</h3>
                    @php
                        $subtotal = $order->total_price - 3.89;
                    @endphp
                    <p><strong>Subtotal:</strong> €{{ number_format($subtotal, 2) }}</p>
                    <p><strong>Shipping:</strong> €3.89</p>
                    <p><strong>Total:</strong> €{{ number_format($order->total_price, 2) }}</p>
                </div>

                <div class="info-section" style="grid-column: span 2;">
                    <h3>Products Ordered</h3>
                    <ul>
                        @foreach ($order->items as $item)
                            <li>
                                {{ $item->product->name }} × {{ $item->quantity }}
                                — €{{ number_format($item->unit_price * $item->quantity, 2) }}
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>

        <div class="signature">
            <p>Sincerely yours,</p>
            <img src="{{ asset('images/logo.png') }}" alt="Aura Attire">
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
