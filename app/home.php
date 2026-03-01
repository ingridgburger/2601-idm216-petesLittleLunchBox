<?php
require_once '../data/includes/db.php';

$query = "SELECT * FROM idm216_menu_categories ORDER BY id";
$result = mysqli_query($connection, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Pete's Little Lunch Box</title>
    <link rel="stylesheet" href="css/stylesheet.css">
    <link rel="stylesheet" href="css/components.css">
    <link rel="stylesheet" href="css/home.css">
</head>

<body>
<div class="app-shell">

  <?php include 'includes/header.php'; ?>

  <main class="container home-main">

    <section class="home-hero">
        <div class="carousel">
            <img src="app-images/carousel/carousel-1.webp" alt="" class="carousel-img active">
            <img src="app-images/carousel/carousel-2.webp" alt="" class="carousel-img">
            <img src="app-images/carousel/carousel-3.webp" alt="" class="carousel-img">
        </div>
    </section>

    <section class="active-order" id="activeOrder" style="display: none;">
        <h4>Active Orders</h4>
        <a href="orders.php" class="order-link-card">
            <div class="order-card">
                <span class="order-status">Received</span>
                <div>
                <strong>Order #15947</strong>
                <p>pickup 3:30 pm</p>
                </div>
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M9 18L15 12L9 6" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </div>
        </a>
    </section>

    <div class="divider" id="activeDivider" style="display: none;">
      <span></span>
      <svg
      class="divider-star-img"
      width="15"
      height="16"
      viewBox="0 0 15 16"
      fill="currentColor"
      xmlns="http://www.w3.org/2000/svg"
    >
      <path
        d="M8.62937 9.53717C8.43117 9.33897 8.43117 9.01762 8.62937 8.81942C8.82758 8.62122 9.14892 8.62122 9.34713 8.81942C9.54533 9.01762 9.54533 9.33897 9.34713 9.53717C9.14892 9.73537 8.82758 9.73537 8.62937 9.53717Z"
        fill="#currentColor"
      />
      <path
        d="M9.77778 9.96782C10.1367 9.60894 11.744 10.6421 12.6488 11.5469C13.5536 12.4517 14.5867 14.059 14.2278 14.4179C13.869 14.7768 12.2616 13.7436 11.3568 12.8388C10.452 11.934 9.4189 10.3267 9.77778 9.96782Z"
        fill="#currentColor"
      />
      <path
        d="M6.24465 9.53717C6.44285 9.33897 6.44285 9.01762 6.24465 8.81942C6.04645 8.62122 5.7251 8.62122 5.5269 8.81942C5.3287 9.01762 5.3287 9.33897 5.5269 9.53717C5.7251 9.73537 6.04645 9.73537 6.24465 9.53717Z"
        fill="#currentColor"
      />
      <path
        d="M5.09625 9.96782C4.73737 9.60894 3.13005 10.6421 2.22524 11.5469C1.32044 12.4517 0.287314 14.059 0.646189 14.4179C1.00507 14.7768 2.61239 13.7436 3.51719 12.8388C4.422 11.934 5.45512 10.3267 5.09625 9.96782Z"
        fill="#currentColor"
      />
      <path
        d="M6.24465 5.52671C6.44285 5.72491 6.44285 6.04625 6.24465 6.24446C6.04645 6.44266 5.7251 6.44266 5.5269 6.24446C5.3287 6.04625 5.3287 5.72491 5.5269 5.52671C5.7251 5.3285 6.04645 5.3285 6.24465 5.52671Z"
        fill="#currentColor"
      />
      <path
        d="M5.09625 5.09605C4.73737 5.45493 3.13005 4.42181 2.22524 3.517C1.32044 2.61219 0.287314 1.00487 0.646189 0.645997C1.00507 0.287121 2.61239 1.32024 3.51719 2.22505C4.422 3.12986 5.45512 4.73718 5.09625 5.09605Z"
        fill="#currentColor"
      />
      <path
        d="M8.62937 5.52671C8.43117 5.72491 8.43117 6.04625 8.62937 6.24446C8.82758 6.44266 9.14892 6.44266 9.34713 6.24446C9.54533 6.04625 9.54533 5.72491 9.34713 5.52671C9.14892 5.3285 8.82758 5.3285 8.62937 5.52671Z"
        fill="#currentColor"
      />
      <path
        d="M9.77778 5.09605C10.1367 5.45493 11.744 4.42181 12.6488 3.517C13.5536 2.61219 14.5867 1.00487 14.2278 0.645997C13.869 0.287121 12.2616 1.32024 11.3568 2.22505C10.452 3.12986 9.4189 4.73718 9.77778 5.09605Z"
        fill="#currentColor"
      />
      </svg>
      <span></span>
    </div>

<div>

    <section class="store-info">
        <div class="store-status">
            <h4>Open</h4>
            <span class="dot">•</span>
            <p>11 N 33rd St Philadelphia, PA 19104</p>
        </div>
        <p class="wait-time">Current Wait: 11 minutes</p>
    </section>

    <?php include 'includes/divider.php'; ?>

    <section class="favorites-section">
        <h4>Pete's Favorites</h4>
        <div class="horizontal-scroll">
            <a href="item.php?id=26" class="item-card">
            <img src="app-images/menu-item-images/drinks/iced_coffee.webp" alt="Iced Coffee">
            <h5>Iced Coffee</h5>
            <p class="price">$3.50</p>
            </a>
            <a href="item.php?id=21" class="item-card">
            <img src="app-images/menu-item-images/pastries-and-sides/muffin.webp" alt="Muffin">
            <h5>Muffin</h5>
            <p class="price">$2.50</p>
            </a>
            <a href="item.php?id=22" class="item-card">
            <img src="app-images/menu-item-images/pastries-and-sides/jelly_toast.webp" alt="Jelly Toast">
            <h5>Jelly Toast</h5>
            <p class="price">$2.50</p>
            </a>
            <a href="item.php?id=1" class="item-card">
            <img src="app-images/menu-item-images/breakfast-sandwiches/egg_and_cheese.webp" alt="Egg & Cheese">
            <h5>Egg & Cheese</h5>
            <p class="price">$4.50</p>
            </a>
        </div>
    </section>

    <section class="bestsellers-section">
        <h4>Best Sellers</h4>
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

    <?php include 'includes/divider.php'; ?>

    <section class="categories">
        <h2 class="script red">menu</h2>

        <?php while ($row = mysqli_fetch_assoc($result)): ?>
            <?php
            $name = $row['category_name'];
            $slug = strtolower(str_replace([' ', '&'], ['_', 'and'], $name));
            $image = "app-images/category-images/{$slug}_category_image.webp";
            ?>

            <a href="category.php?category=<?= urlencode($row['id']) ?>" class="category-card">
            <img src="<?= $image ?>" alt="<?= htmlspecialchars($name) ?>">
            <span class="category-title"><?= htmlspecialchars($name) ?></span>
            </a>
        <?php endwhile; ?>
    </section>

    <div id="addToast" class="add-toast hidden">
        <div class="toast-content">
            <span>ADDED TO LUNCHBOX</span>
            <span class="check">✓</span>
            <a href="lunchbox.php" class="toast-link">VIEW</a>
        </div>
  </div>

  </main>

  <?php $current_page = basename($_SERVER['PHP_SELF']); ?>

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

<script src="js/home-carousel.js"></script>
<script src="js/active-order.js"></script>
</body>
</html>