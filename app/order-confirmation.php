<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Order Confirmation</title>

  <link rel="stylesheet" href="css/stylesheet.css">
  <link rel="stylesheet" href="css/components.css">
  <link rel="stylesheet" href="css/item.css">
  <link rel="stylesheet" href="css/category.css">
  <link rel="stylesheet" href="css/home.css">
  <link rel="stylesheet" href="css/lunchbox.css">
  <link rel="stylesheet" href="css/checkout.css">
  <link rel="stylesheet" href="css/order-confirmation.css">
</head>

<body>
<div class="app-shell" style="padding:0;">

<header class="confirmation-header">
  <h1>
    Thanks for<br>
    ordering <span class="script red-text">pete's.</span>
  </h1>
</header>

<main class="confirmation-container">

  <!-- ORDER NUMBER -->
  <section class="confirmation-section">
    <p class="script red-text small">order number</p>
    <h2 class="order-number" id="orderNumber">-</h2>
  </section>

  <?php include 'includes/divider.php'; ?>

  <!-- PICKUP INFO -->
  <section class="confirmation-section">
    <h3 id="pickupTime">pickup time</h3>
    <p class="gray-text">11 N 33rd St Philadelphia, PA 19104</p>
  </section>

  <?php include 'includes/divider.php'; ?>

  <!-- ORDER DETAILS -->
  <section class="confirmation-section">
    <h4 class="section-label">Order Details</h4>

    <div id="orderItems"></div>

    <?php include 'includes/divider.php'; ?>
    <!-- TOTALS -->
    <div class="totals" id="orderTotals">

    </div>
  </section>

</main>

<!-- BACK HOME BUTTON -->
<section class="wide-btn-wrapper-bottom">
  <a href="home.php" class="primary-btn--checkout-btn--active center">
    Back to Home
  </a>
</section>

</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    loadOrderConfirmation();
});

function loadOrderConfirmation() {
    const orderData = JSON.parse(localStorage.getItem('confirmationOrder') || 'null');
    
    if (!orderData) {
        document.getElementById('orderNumber').textContent = 'N/A';
        document.getElementById('pickupTime').textContent = 'pickup time unavailable';
        document.getElementById('orderItems').innerHTML = '<p>Order details unavailable</p>';
        document.getElementById('orderTotals').innerHTML = '<p>Total unavailable</p>';
        return;
    }
    
    document.getElementById('orderNumber').textContent = orderData.orderNumber;
    
    const pickupText = orderData.pickupTime === 'ASAP' ? 'pickup ASAP' : `pickup at ${orderData.pickupTime}`;
    document.getElementById('pickupTime').textContent = pickupText;
    
    renderConfirmationItems(orderData.items);
    
    renderConfirmationTotals(orderData);
}

function renderConfirmationItems(items) {
    const orderItemsContainer = document.getElementById('orderItems');
    
    if (!items || items.length === 0) {
        orderItemsContainer.innerHTML = '<p>No items found</p>';
        return;
    }
    
    const categoryFolders = {
        1: 'breakfast-sandwiches', 2: 'breakfast-platters', 3: 'pastries-and-sides',
        4: 'drinks', 5: 'fresh-salads', 6: 'lunch-sandwiches', 7: 'hoagies',
        8: 'burgers-and-hot-sandwiches', 9: 'club-sandwiches', 10: 'cheesesteaks', 11: 'gyros'
    };
    
    const itemsHTML = items.map(item => {
        const categoryFolder = categoryFolders[item.categoryId] || 'breakfast-sandwiches';
        const filename = item.imageFilename || 'egg_and_cheese.webp';
        const imagePath = `app-images/menu-item-images/${categoryFolder}/${filename}`;
        
        // Format customizations
        const customizations = [];
        if (item.selectedOptions && item.selectedOptions.bagel) customizations.push(item.selectedOptions.bagel.value);
        if (item.selectedOptions && item.selectedOptions.bread) customizations.push(item.selectedOptions.bread.value);
        if (item.selectedOptions && item.selectedOptions.cheese) customizations.push(item.selectedOptions.cheese.value);
        if (item.selectedOptions && item.selectedOptions.size) customizations.push(item.selectedOptions.size.value);
        if (item.selectedOptions && item.selectedOptions.toppings) {
            item.selectedOptions.toppings.forEach(topping => customizations.push(topping.value));
        }
        if (item.selectedOptions && item.selectedOptions.dressings) {
            item.selectedOptions.dressings.forEach(dressing => customizations.push(dressing.value));
        }
        
        const customizationText = customizations.length > 0 ? customizations.join(',<br>') : '';
        
        return `
            <div class="cart-item">
                <img src="${imagePath}" alt="${item.name}" class="cart-item-img">
                <div class="cart-item-info">
                    <div class="cart-item-details">
                        <h4>${item.name}</h4>
                        <span class="price">$${item.totalPrice.toFixed(2)}</span>
                    </div>
                    ${customizationText ? `<p class="customizations">${customizationText}</p>` : ''}
                    <p class="qty-right">${item.quantity}×</p>
                </div>
            </div>
        `;
    }).join('');
    
    orderItemsContainer.innerHTML = itemsHTML;
}

function renderConfirmationTotals(orderData) {
    const orderTotalsContainer = document.getElementById('orderTotals');
    
    orderTotalsContainer.innerHTML = `
        <div class="total-details">
            <p>Subtotal</p>
            <p>$${orderData.subtotal.toFixed(2)}</p>
        </div>
        <div class="total-details">
            <p>Tax</p>
            <p>$${orderData.tax.toFixed(2)}</p>
        </div>
        <div class="total-details">
            <p>Tip</p>
            <p>$${orderData.tip.toFixed(2)}</p>
        </div>
        <div class="total-details total-final">
            <h4>Total</h4>
            <span class="price">$${orderData.total.toFixed(2)}</span>
        </div>
    `;
}
</script>
</body>
</html>
