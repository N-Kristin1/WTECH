document.addEventListener('DOMContentLoaded', function() {
    const searchIcon = document.querySelector('.search-icon');
    const searchBar = document.querySelector('.search-bar');
    let isSearchVisible = false;

    searchIcon.addEventListener('click', function() {
        isSearchVisible = !isSearchVisible;
        if (isSearchVisible) {
            searchBar.classList.add('active');
            searchBar.focus();
        } else {
            searchBar.classList.remove('active');
        }
    });

    document.addEventListener('click', function(event) {
        if (!searchBar.contains(event.target) && !searchIcon.contains(event.target)) {
            searchBar.classList.remove('active');
            isSearchVisible = false;
        }
    });

    const urlParams = new URLSearchParams(window.location.search);
    const paymentMethod = urlParams.get('payment');
    const deliveryMethod = urlParams.get('delivery');

    const creditInfo = document.getElementById('credit-payment-info');
    const cashInfo = document.getElementById('cash-payment-info');
    const bankInfo = document.getElementById('bank-payment-info');

    creditInfo.style.display = 'none';
    cashInfo.style.display = 'none';
    bankInfo.style.display = 'none';

    if (paymentMethod === 'cash') {
        cashInfo.style.display = 'block';
    } else if (paymentMethod === 'bank') {
        bankInfo.style.display = 'block';
    } else {
        creditInfo.style.display = 'block';
    }

    const homeDeliveryInfo = document.getElementById('home-delivery-info');
    const zboxDeliveryInfo = document.getElementById('zbox-delivery-info');

    homeDeliveryInfo.style.display = 'none';
    zboxDeliveryInfo.style.display = 'none';

    if (deliveryMethod === 'zbox') {
        zboxDeliveryInfo.style.display = 'block';
    } else {
        homeDeliveryInfo.style.display = 'block';
    }
});
