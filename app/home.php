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

  <main class="container">

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

    <div class="divider">
        <img src="app-images/misc/star.svg" alt="" class="divider-star-img">
    </div>

    <section class="store-info">
        <div class="store-status">
            <h4>Open</h4>
            <span class="dot">•</span>
            <p>11 N 33rd St Philadelphia, PA 19104</p>
        </div>
        <p class="wait-time">Current Wait: 11 minutes</p>
    </section>

    <div class="divider">
        <img src="app-images/misc/star.svg" alt="" class="divider-star-img">
    </div>

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

    <div class="divider">
        <img src="app-images/misc/star.svg" alt="" class="divider-star-img">
    </div>

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

  <div id="addToast" class="add-toast hidden">
        <div class="toast-content">
            <span>ADDED TO LUNCHBOX</span>
            <span class="check">✓</span>
            <a href="lunchbox.php" class="toast-link">VIEW</a>
        </div>
  </div>

</div>

<script src="js/home-carousel.js"></script>
<script src="js/active-order.js"></script>
</body>
</html>