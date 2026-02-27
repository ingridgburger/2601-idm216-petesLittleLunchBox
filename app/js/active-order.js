const ACTIVE_ORDER_DURATION = 5 * 60 * 1000;

function checkAndDisplayActiveOrder() {
  const activeOrderSection = document.getElementById('activeOrder');
  if (!activeOrderSection) return;

  const checkoutTimestamp = localStorage.getItem('checkoutTimestamp');
  
  if (!checkoutTimestamp) {
    activeOrderSection.style.display = 'none';
    return;
  }

  const timeSinceCheckout = Date.now() - Number(checkoutTimestamp);

  if (timeSinceCheckout < ACTIVE_ORDER_DURATION) {
    activeOrderSection.style.display = 'block';
    
    const remainingTime = ACTIVE_ORDER_DURATION - timeSinceCheckout;
    setTimeout(() => {
      activeOrderSection.style.display = 'none';
      localStorage.removeItem('checkoutTimestamp');
    }, remainingTime);
  } else {
    activeOrderSection.style.display = 'none';
    localStorage.removeItem('checkoutTimestamp');
  }
}

checkAndDisplayActiveOrder();