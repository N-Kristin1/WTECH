function changeQty(change) {
  const qtySpan = document.getElementById('qty');
  let currentQty = parseInt(qtySpan.textContent);
  currentQty = Math.max(1, currentQty + change);
  qtySpan.textContent = currentQty;

  document.getElementById('cart-qty').value = currentQty;
}

document.addEventListener('DOMContentLoaded', () => {
  const sizeSelect = document.querySelector('select');
  const sizeInput = document.getElementById('selected-size');

  if (sizeSelect && sizeInput) {
    sizeSelect.addEventListener('change', () => {
      sizeInput.value = sizeSelect.value;
    });
  }

  const img = document.getElementById("productImage");
  const prev = document.getElementById("prevImage");
  const next = document.getElementById("nextImage");

  if (img && prev && next) {
    let current = 1; 

    function updateImage() {
      if (current === 1) {
        img.src = img.getAttribute('data-image1');
      } else {
        img.src = img.getAttribute('data-image2');
      }
    }

    prev.addEventListener("click", function() {
      current = current === 1 ? 2 : 1;
      updateImage();
    });

    next.addEventListener("click", function() {
      current = current === 1 ? 2 : 1;
      updateImage();
    });
  }
});

function addToCart() {
  alert("Item added to cart!");
}
