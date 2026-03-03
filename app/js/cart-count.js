function updateCartCount() {
  const lunchboxItems = JSON.parse(localStorage.getItem('lunchboxItems') || '[]');
  const totalItems = lunchboxItems.reduce((sum, item) => sum + item.quantity, 0);
  
  const cartCountElements = document.querySelectorAll('.cart-count');
  
  cartCountElements.forEach(countElement => {
    if (totalItems === 0) {
      countElement.style.display = 'none';
    } else {
      countElement.style.display = 'flex';
      countElement.textContent = totalItems > 9 ? '9+' : totalItems.toString();
    }
  });
}

document.addEventListener('DOMContentLoaded', updateCartCount);

window.addEventListener('storage', (e) => {
  if (e.key === 'lunchboxItems') {
    updateCartCount();
  }
});

if (typeof module !== 'undefined' && module.exports) {
  module.exports = { updateCartCount };
}