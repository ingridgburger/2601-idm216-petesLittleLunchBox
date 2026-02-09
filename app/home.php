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
    <header class="app-header header--white has-cart">
        <div></div>
        <div></div>
        <button class="icon-btn cart-btn-dark" aria-label="Lunchbox">
            <svg
                width="36"
                height="36"
                viewBox="0 0 36 36"
                xmlns="http://www.w3.org/2000/svg"
            >
                <path
                d="M13.5 11.4502V9.45017C13.5 8.91974 13.7634 8.41103 14.2322 8.03596C14.7011 7.66089 15.337 7.45017 16 7.45017H21C21.663 7.45017 22.2989 7.66089 22.7678 8.03596C23.2366 8.41103 23.5 8.91974 23.5 9.45017V11.4502"
                stroke="currentColor"
                stroke-linecap="square"
                stroke-linejoin="round"
                />
                <path
                d="M15.5996 19.9499V26.6501C15.5995 27.1536 15.3998 27.6367 15.0439 27.9929C14.6877 28.3492 14.204 28.5495 13.7002 28.5495H8.90039C8.39648 28.5495 7.91296 28.3492 7.55664 27.9929C7.20062 27.6367 7.0001 27.1537 7 26.6501V19.9499H15.5996ZM30 19.9499V26.6501C29.9999 27.1537 29.7994 27.6367 29.4434 27.9929C29.087 28.3492 28.6035 28.5495 28.0996 28.5495H15.8877C16.3441 28.0239 16.5995 27.3508 16.5996 26.6501V19.9499H30ZM11.2998 12.7497C12.4401 12.7497 13.5344 13.2032 14.3408 14.0095C15.1469 14.8157 15.5994 15.9095 15.5996 17.0495V18.9499H7V17.0495C7.00018 15.9094 7.45352 14.8157 8.25977 14.0095C9.0661 13.2033 10.1596 12.7498 11.2998 12.7497ZM25.7002 12.7497C26.8404 12.7498 27.9339 13.2033 28.7402 14.0095C29.5465 14.8157 29.9998 15.9094 30 17.0495V18.9499H16.5996V17.0495C16.5994 15.6443 16.0415 14.2962 15.0479 13.3025C14.845 13.0996 14.6263 12.9152 14.3965 12.7497H25.7002Z"
                fill="currentColor"
                />
            </svg>
        </button>

    </header>

    <section class="home-hero">
    <img src="app-images/carousel/carousel-1.webp" alt="">
    </section>

    <section class="active-order">
    <h4>Active Orders</h4>
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

    <section class="rewards-section">
        <div class="rewards-points">
            <h2 class="script red-text">2,530 pts</h2>
            <a href="rewards.php" class="view-rewards-link">View Rewards</a>
        </div>
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
                <img src="app-images/menu-item-images/breakfast-sandwiches/egg_and_cheese.webp" alt="Cheeseburger">
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
        <img src="app-images/star.svg" alt="" class="divider-star-img">
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
    <a href="rewards.php" class="<?= ($current_page == 'rewards.php') ? 'active' : '' ?>">
        <img src="app-images/nav/rewards-<?= ($current_page == 'rewards.php') ? 'active' : 'inactive' ?>.svg" alt="Rewards">
        <span>Rewards</span>
    </a>
    <a href="account.php" class="<?= ($current_page == 'account.php') ? 'active' : '' ?>">
        <img src="app-images/nav/account-<?= ($current_page == 'account.php') ? 'active' : 'inactive' ?>.svg" alt="Account">
        <span>Account</span>
    </a>
</nav>
</div>

<script src="js/home-carousel.js"></script>
</body>
</html>