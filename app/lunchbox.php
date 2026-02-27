

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title><?= htmlspecialchars($category['category_name']) ?></title>

  <link rel="stylesheet" href="css/stylesheet.css">
  <link rel="stylesheet" href="css/components.css">
  <link rel="stylesheet" href="css/item.css">
  <link rel="stylesheet" href="css/category.css">
  <link rel="stylesheet" href="css/home.css">
  <link rel="stylesheet" href="css/lunchbox.css">
</head>

<body>
<div class="app-shell">

<header class="app-header header--tall header--red has-back has-cart">
  <section class="header-icons">
    <button class="icon-btn back-btn" onclick="history.back()" aria-label="Go back">
      <svg class="icon" width="36" height="36" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg">
        <mask id="mask0_143_1645" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="0" y="0" width="36" height="36"><rect width="36" height="36" fill="currentColor"/></mask>
        <g mask="url(#mask0_143_1645)">
          <path d="M2.18362 18L13.7565 29.5732C13.9778 29.7943 14.087 30.0586 14.0842 30.3664C14.0812 30.6741 13.9691 30.9385 13.7479 31.1595C13.5269 31.3808 13.2625 31.4914 12.9548 31.4914C12.647 31.4914 12.3826 31.3808 12.1616 31.1595L0.697874 19.7048C0.455624 19.4625 0.27875 19.1924 0.16725 18.8944C0.0557497 18.5961 0 18.298 0 18C0 17.702 0.0557497 17.4039 0.16725 17.1056C0.27875 16.8076 0.455624 16.5375 0.697874 16.2952L12.1616 4.83187C12.3826 4.61062 12.6485 4.5015 12.9592 4.5045C13.2697 4.50725 13.5355 4.61925 13.7565 4.8405C13.9778 5.0615 14.0884 5.32587 14.0884 5.63363C14.0884 5.94138 13.9778 6.20575 13.7565 6.42675L2.18362 18Z" fill="currentColor"/>
        </g>
      </svg>
    </button>
  </section>
  <h1 class="header-title">
    Lunchbox
  </h1>
</header>

<main class="container" style="margin-bottom: 48px; margin-top: 0;">
    <section class="empty-cart-section" style="display: none;">
        <h4 class="cart-empty-message" style="text-align: center;">
            Nothing here yet.
        </h4>
        <p class="cart-empty-submessage" style="text-align: center; margin-bottom: 36px;">
            Add something delicious to your lunchbox and we’ll get cooking!
        </p>
    </section>
    <section class="cart-section">
        <div class="cart-item">
            <img src="app-images/menu-item-images/breakfast-sandwiches/egg_and_cheese.webp" alt="Egg & Cheese" class="cart-item-img">
            <div class="cart-item-info">
                <div class="cart-item-details">
                    <h4>Egg & Cheese</h4>
                    <span class="price">$5.00</span>
                </div>
                <p class="customizations">
                    Everything Bagel, Cheddar Cheese, Egg
                </p>
                <div class="cart-item-actions" >
                    <button class="icon-btn edit-btn" aria-label="Edit item">
                        Edit
                    </button>
                    <div class="qty-selector">
                        <button class="qty-btn minus" style="width: 24px; height: 24px; border-width: 1px; font-weight: 500;">
                            −
                        </button>
                        <span class="qty">1</span>
                        <button class="qty-btn plus" style="width: 24px; height: 24px; border-width: 1px; font-weight: 500;">
                            +
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="divider">
        <img src="app-images/misc/star.svg" alt="" class="divider-star-img">
    </div>
    <section class="add-items-section" style="padding: 20px 0;">
        <h4 style="text-align: center;">Available Rewards • 2,530 pts</h4>
        <div class="horizontal-scroll">
            <a href="item.php?id=26" class="item-card">
                <img src="app-images/menu-item-images/drinks/iced_coffee.webp" alt="Iced Coffee">
                <h5>Iced Coffee</h5>
                <p class="price">50 PTS</p>
            </a>
            <a href="item.php?id=21" class="item-card">
                <img src="app-images/menu-item-images/pastries-and-sides/muffin.webp" alt="Muffin">
                <h5>Muffin</h5>
                <p class="price">100 PTS</p>
            </a>
            <a href="item.php?id=22" class="item-card">
                <img src="app-images/menu-item-images/pastries-and-sides/jelly_toast.webp" alt="Jelly Toast">
                <h5>Jelly Toast</h5>
                <p class="price">150 PTS</p>
            </a>
            <a href="item.php?id=1" class="item-card">
                <img src="app-images/menu-item-images/breakfast-sandwiches/egg_and_cheese.webp" alt="Cheeseburger">
                <h5>Egg & Cheese</h5>
                <p class="price">450 PTS</p>
            </a>
        </div>
    </section>

    <section class="bestsellers-section" style="padding: 20px 0;">
        <h4 style="text-align: center;">Add another item?</h4>
        <div class="horizontal-scroll">
            <a href="item.php?id=60" class="item-card">
                <img src="app-images/menu-item-images/club-sandwiches/turkey_club.webp" alt="Turkey Club">
                <h5>Turkey Club</h5>
                <p class="price">$8.00</p>
            </a>
            <a href="item.php?id=30" class="item-card">
                <img src="app-images/menu-item-images/drinks/thai_iced_tea.webp" alt="Thai Tea">
                <h5>Thai Tea</h5>
                <p class="price">$3.00</p>
            </a>
            <a href="item.php?id=10" class="item-card">
                <img src="app-images/menu-item-images/breakfast-sandwiches/blt_wheat_white.webp" alt="B.L.T.">
                <h5>B.L.T.</h5>
                <p class="price">$6.00</p>
            </a>
            <a href="item.php?id=31" class="item-card">
                <img src="app-images/menu-item-images/drinks/hot_chocolate.webp" alt="Hot Chocolate">
                <h5>Hot Chocolate</h5>
                <p class="price">$1.00</p>
            </a>
        </div>
    </section>
</main>

<?php $current_page = basename($_SERVER['PHP_SELF']); ?>

<section class="wide-btn-wrapper">
    <a href="checkout.php" class="primary-btn--checkout-btn--active" <?= ($current_page == 'lunchbox.php') ? '' : 'disabled' ?>>
        Checkout
    </a>
</section>
<nav class="bottom-nav">
    <a href="home.php" class="<?= ($current_page == 'home.php' || $current_page == 'category.php' || $current_page == 'item.php') ? 'active' : '' ?>">
        <img src="app-images/nav/menu-<?= ($current_page == 'home.php' || $current_page == 'category.php' || $current_page == 'item.php') ? 'active' : 'inactive' ?>.svg" alt="Menu">
        <span>Menu</span>
    </a>
    <a href="orders.php" class="<?= ($current_page == 'orders.php') ? 'active' : '' ?>">
        <img src="app-images/nav/order-<?= ($current_page == 'orders.php') ? 'active' : 'inactive' ?>.svg" alt="Orders">
        <span>Orders</span>
    </a>
    <a href="account.php" class="<?= ($current_page == 'account.php') ? 'active' : '' ?>">
        <img src="app-images/nav/account-<?= ($current_page == 'account.php') ? 'active' : 'inactive' ?>.svg" alt="Account">
        <span>Account</span>
    </a>
</nav>

</div>
</body>
</html>
