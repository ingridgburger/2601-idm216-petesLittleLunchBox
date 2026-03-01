const ACTIVE_ORDER_DURATION = 5 * 60 * 1000;

function checkAndDisplayActiveOrder() {
  const activeOrderSection = document.getElementById('activeOrder');
  const activeDivider = document.getElementById('activeDivider');
  if (!activeOrderSection) return;

  const checkoutTimestamp = localStorage.getItem('checkoutTimestamp');
  const orderData = JSON.parse(localStorage.getItem('confirmationOrder') || 'null');
  
  if (!checkoutTimestamp || !orderData) {
    activeOrderSection.style.display = 'none';
    if (activeDivider) activeDivider.style.display = 'none';
    return;
  }

  const timeSinceCheckout = Date.now() - Number(checkoutTimestamp);

  if (timeSinceCheckout < ACTIVE_ORDER_DURATION) {
    updateActiveOrderContent(orderData, timeSinceCheckout);
    
    activeOrderSection.style.display = 'block';
    if (activeDivider) activeDivider.style.display = 'flex';
    
    const remainingTime = ACTIVE_ORDER_DURATION - timeSinceCheckout;
    setTimeout(() => {
      activeOrderSection.style.display = 'none';
      if (activeDivider) activeDivider.style.display = 'none';
      localStorage.removeItem('checkoutTimestamp');
      localStorage.removeItem('confirmationOrder');
    }, remainingTime);
  } else {
    activeOrderSection.style.display = 'none';
    if (activeDivider) activeDivider.style.display = 'none';
    localStorage.removeItem('checkoutTimestamp');
    localStorage.removeItem('confirmationOrder');
  }
}

function updateActiveOrderContent(orderData, timeSinceCheckout) {
  const orderNumberElement = document.querySelector('#activeOrder strong');
  if (orderNumberElement) {
    orderNumberElement.textContent = `Order #${orderData.orderNumber}`;
  }
  
  const pickupTimeElement = document.querySelector('#activeOrder p');
  if (pickupTimeElement) {
    const pickupText = `pickup ${orderData.pickupTime}`;
    pickupTimeElement.textContent = pickupText;
  }
  
  const statusElement = document.querySelector('#activeOrder .order-status');
  if (statusElement) {
    const twoMinutes = 2 * 60 * 1000;
    const fourMinutes = 4 * 60 * 1000;
    
    if (timeSinceCheckout < twoMinutes) {
      statusElement.textContent = 'Received';
    } else if (timeSinceCheckout < fourMinutes) {
      statusElement.textContent = 'Preparing';
    } else {
      statusElement.textContent = 'Ready';
    }
  }
}

checkAndDisplayActiveOrder();