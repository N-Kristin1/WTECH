<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>My Wishlist</title>
    <link rel="stylesheet" href="{{ asset('css/categories.css') }}"> 
</head>
<body>

<header>
    <div class="logo">
        <a href="{{ url('/') }}"><img src="{{ asset('images/blacklogo.png') }}" alt="Aura Attire Logo"></a>
    </div>
    <div class="icons">
        <a href="{{ url('/cart') }}"><img src="{{ asset('images/cart.png') }}" alt="cart"></a>
        <a href="{{ url('/wishlist') }}"><img src="{{ asset('images/wishlist.png') }}" alt="wishlist"></a>
        <a href="{{ url('/login') }}"><img src="{{ asset('images/profile.png') }}" alt="profile"></a>
    </div>
</header>

<h2 style="text-align:center; margin-top:20px;">Your Wishlist</h2>

<div style="max-width:800px; margin:0 auto; padding:20px;">
    @forelse($wishlist as $item)
        <div style="border:1px solid #ccc; border-radius:5px; padding:10px; margin-bottom:15px; display:flex; align-items:center;">
            <img src="{{ asset($item->product->image) }}" alt="{{ $item->product->name }}" style="height:80px; width:auto; margin-right:15px;">
            <div style="flex-grow:1;">
                <strong>{{ $item->product->name }}</strong><br>
                €{{ number_format($item->product->price, 2) }}
            </div>
            <form action="{{ route('wishlist.destroy', $item->id) }}" method="POST" style="margin-left:10px;">
                @csrf
                @method('DELETE')
                <button type="submit" style="padding:6px 12px; background:#6B8F71; color:white; border:none; border-radius:4px;">Remove</button>
            </form>
        </div>
    @empty
        <p style="text-align:center;">Your wishlist is empty.</p>
    @endforelse
</div>
<link rel="stylesheet" href="{{ asset('css/wishlist.css') }}">


</body>
</html>
