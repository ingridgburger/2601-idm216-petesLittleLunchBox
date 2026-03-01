

<?php
require_once '../data/includes/db.php';

$recommended_ids = [71, 41, 14, 34, 47 ];
$id_list = implode(',', $recommended_ids);
$recommended_sql = "SELECT * FROM idm216_menu_items WHERE id IN ($id_list)";
$recommended_result = mysqli_query($connection, $recommended_sql);
$recommended_items = mysqli_fetch_all($recommended_result, MYSQLI_ASSOC);

include 'includes/category-folders.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Lunchbox</title>

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
      <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="currentColor"><path d="m112.77-480 308.61 308.62q8.85 8.84 8.74 21.15-.12 12.31-8.97 21.15-8.84 8.85-21.15 8.85-12.31 0-21.15-8.85L73.15-434.54q-9.69-9.69-14.15-21.61-4.46-11.93-4.46-23.85 0-11.92 4.46-23.85 4.46-11.92 14.15-21.61l305.7-305.69q8.84-8.85 21.27-8.73 12.42.11 21.26 8.96 8.85 8.84 8.85 21.15 0 12.31-8.85 21.15L112.77-480Z"/></svg>
    </button>
  </section>
  <h1 class="header-title">
    Lunchbox
  </h1>
</header>

<main class="container" style="margin-bottom: 60px; margin-top: 0;">
    <section class="empty-cart-section" style="display: none;">
        <h4 class="cart-empty-message">
            Nothing here yet.
        </h4>
        <p class="cart-empty-submessage">
            Add something delicious to your lunchbox and we’ll get cooking!
        </p>
    </section>

    <section class="cart-section">
    </section>

    <?php include 'includes/divider.php'; ?>

    <section class="bestsellers-section" style="padding: 20px 0;">
        <h4 style="text-align: center;">You might like these</h4>
        <div class="horizontal-scroll">
            <?php foreach ($recommended_items as $rec_item): ?>
                <?php 
                    $category_folder = $category_folders[$rec_item['category_id']] ?? 'misc';
                    $item_image_path = "app-images/menu-item-images/$category_folder/" . htmlspecialchars($rec_item['menu_item_image_filename']);
                ?>
                <a href="item.php?id=<?= $rec_item['id'] ?>" class="item-card">
                    <img src="<?= $item_image_path ?>" alt="<?= htmlspecialchars($rec_item['item_name']) ?>">
                    <h5><?= htmlspecialchars($rec_item['item_name']) ?></h5>
                    <p class="price">$<?= number_format($rec_item['base_price'], 2) ?></p>
                </a>
            <?php endforeach; ?>
        </div>
    </section>
     <?php include 'includes/divider.php'; ?>
    <div class="summary-row">
        <h4>Subtotal</h4>
        <span class="price">$0.00</span>
    </div>
</main>

<?php $current_page = basename($_SERVER['PHP_SELF']); ?>

<section class="wide-btn-wrapper">
    <button class="primary-btn--checkout-btn--active center" id="checkoutBtn">
        Checkout
    </button>
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
<script src="js/item-page.js"></script>
</body>
</html>
