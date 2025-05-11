document.addEventListener('DOMContentLoaded', function () {
    const searchIcon = document.querySelector('.search-icon');
    const searchBar = document.querySelector('.search-bar');
    let isSearchVisible = false;
  
    if (searchIcon && searchBar) {
      searchIcon.addEventListener('click', function () {
        isSearchVisible = !isSearchVisible;
        searchBar.classList.toggle('active', isSearchVisible);
        if (isSearchVisible) searchBar.focus();
      });
  
      document.addEventListener('click', function (event) {
        if (!searchBar.contains(event.target) && !searchIcon.contains(event.target)) {
          searchBar.classList.remove('active');
          isSearchVisible = false;
        }
      });
    }
  });
  