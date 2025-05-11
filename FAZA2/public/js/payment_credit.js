document.addEventListener('DOMContentLoaded', function () {
    const searchIcon = document.querySelector('.search-icon');
    const searchBar = document.querySelector('.search-bar');
    let isSearchVisible = false;
  
    searchIcon.addEventListener('click', function () {
      isSearchVisible = !isSearchVisible;
      if (isSearchVisible) {
        searchBar.classList.add('active');
        searchBar.focus();
      } else {
        searchBar.classList.remove('active');
      }
    });
  
    document.addEventListener('click', function (event) {
      if (!searchBar.contains(event.target) && !searchIcon.contains(event.target)) {
        searchBar.classList.remove('active');
        isSearchVisible = false;
      }
    });
  });
  
  function validateAndContinue() {
    window.location.href = '/order-info?payment=credit&delivery=home';
  }
  