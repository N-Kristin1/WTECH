document.addEventListener('DOMContentLoaded', () => {
  const products = Array.from(document.querySelectorAll('.product'));
  const loadMoreBtn = document.getElementById('loadMore');
  const sortButtons = document.querySelectorAll('.sort-buttons button');
  const searchInput = document.getElementById('searchInput');

  let visibleCount = 8;
  let currentSort = 'new';

  const getCheckedValues = (sectionTitle) => {
    const container = Array.from(document.querySelectorAll('h4'))
      .find(h => h.textContent.trim() === sectionTitle)?.parentElement;

    if (!container) return [];

    const checkboxes = container.querySelectorAll('input[type="checkbox"]');
    return Array.from(checkboxes)
      .filter(cb => cb.checked)
      .map(cb => cb.parentElement.textContent.trim().toLowerCase());
  };

  const updateVisibility = () => {
      const selectedCategories = getCheckedValues('Category');
      const selectedColors = getCheckedValues('Color');
      const searchQuery = searchInput.value.trim().toLowerCase();

      let filtered = products.filter(product => {
          const category = product.dataset.category.toLowerCase();
          const color = product.dataset.color.toLowerCase();
          const name = product.dataset.name.toLowerCase();

          const matchCategory = selectedCategories.length ? selectedCategories.includes(category) : true;
          const matchColor = selectedColors.length ? selectedColors.includes(color) : true;
          const matchSearch = name.includes(searchQuery);

          return matchCategory && matchColor && matchSearch;
      });

      const safeParse = val => parseFloat(val.replace(/[^\d.-]/g, '')) || 0;

      if (currentSort === 'asc') {
          filtered.sort((a, b) => safeParse(a.dataset.price) - safeParse(b.dataset.price));
      } else if (currentSort === 'desc') {
          filtered.sort((a, b) => safeParse(b.dataset.price) - safeParse(a.dataset.price));
      }

      const grid = document.getElementById('product-grid');
      filtered.forEach(product => grid.appendChild(product));

      products.forEach(p => (p.style.display = 'none'));

      filtered.forEach((product, index) => {
          product.style.display = index < visibleCount ? 'block' : 'none';
      });

      loadMoreBtn.style.display = filtered.length > visibleCount ? 'block' : 'none';
  };


  document.querySelectorAll('input[type="checkbox"]').forEach(cb => {
    cb.addEventListener('change', () => {
      visibleCount = 8;
      updateVisibility();
    });
  });

  loadMoreBtn.addEventListener('click', () => {
    visibleCount += 8;
    updateVisibility();
  });

  sortButtons.forEach(button => {
    button.addEventListener('click', () => {
      currentSort = button.dataset.sort;
      visibleCount = 8;
      updateVisibility();
    });
  });

  searchInput.addEventListener('input', () => {
    visibleCount = 8;
    updateVisibility();
  });

  updateVisibility();
});
