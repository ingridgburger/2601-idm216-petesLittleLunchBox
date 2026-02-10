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
  <section class="confirmation-section center">
    <p class="script red-text small">order number</p>
    <h2 class="order-number">15947</h2>
  </section>

  <div class="divider">
    <img src="app-images/misc/star.svg" alt="" class="divider-star-img">
  </div>

  <!-- PICKUP INFO -->
  <section class="confirmation-section center">
    <h3>pickup at 3:30 PM</h3>
    <p class="gray-text">11 N 33rd St Philadelphia, PA 19104</p>
    <p class="reward-text">You've earned 100 pts with this order!</p>
  </section>

  <div class="divider">
    <img src="app-images/misc/star.svg" alt="" class="divider-star-img">
  </div>

  <!-- ORDER DETAILS -->
  <section class="confirmation-section">
    <h4 class="section-label">Order Details</h4>

    <div class="cart-item">
      <img src="app-images/menu-item-images/breakfast-sandwiches/egg_and_cheese.webp"
           alt="Egg & Cheese"
           class="cart-item-img">

      <div class="cart-item-info">
        <div class="cart-item-details">
          <h4>Egg & Cheese</h4>
          <span class="price">$4.50</span>
        </div>

        <p class="customizations">
          Regular Bagel,<br>
          American Cheese, Egg
        </p>

        <p class="qty-right">1×</p>
      </div>
    </div>

    <!-- TOTALS -->
    <div class="totals">
      <div class="total-details">
        <p>Subtotal</p>
        <p>$4.50</p>
      </div>

      <div class="total-details">
        <p>Tax</p>
        <p>$1.50</p>
      </div>

      <div class="total-details">
        <p>Tip</p>
        <p>$1.50</p>
      </div>

      <div class="total-details total-final">
        <h4>Total</h4>
        <span class="price">$7.50</span>
      </div>
    </div>
  </section>

</main>

<!-- BACK HOME BUTTON -->
<section class="wide-btn-wrapper-bottom">
  <a href="home.php" class="primary-btn--checkout-btn--active">
    Back to Home
  </a>
</section>

</div>
</body>
</html>
