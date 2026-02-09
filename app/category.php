<?php
require_once '../data/includes/db.php';

if (!isset($_GET['category'])) {
  die('Missing category');
}

$category_id = (int) $_GET['category'];

$category_folders = [
  1  => 'breakfast-sandwiches',
  2  => 'breakfast-platters',
  3  => 'pastries-and-sides',
  4  => 'drinks',
  5  => 'fresh-salads',
  6  => 'lunch-sandwiches',
  7  => 'hoagies',
  8  => 'burgers-and-hot-sandwiches',
  9  => 'club-sandwiches',
  10 => 'cheesesteaks',
  11 => 'gyros'
];

if (!isset($category_folders[$category_id])) {
  die('Invalid category');
}

$category_slug = $category_folders[$category_id];

$cat_query = "
  SELECT category_name 
  FROM idm216_menu_categories 
  WHERE id = $category_id
  LIMIT 1
";
$cat_result = mysqli_query($connection, $cat_query);
$category = mysqli_fetch_assoc($cat_result);

if (!$category) {
  die('Category not found');
}

$item_query = "
  SELECT *
  FROM idm216_menu_items
  WHERE category_id = $category_id
  ORDER BY item_name
";
$items = mysqli_query($connection, $item_query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title><?= htmlspecialchars($category['category_name']) ?></title>

  <link rel="stylesheet" href="css/stylesheet.css">
  <link rel="stylesheet" href="css/components.css">
  <link rel="stylesheet" href="css/category.css">
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
    <a href="lunchbox.php" class="icon-btn cart-btn" aria-label="Lunchbox">
      <svg
        width="36"
        height="36"
        viewBox="0 0 36 36"
        fill="none"
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
</a>
  </section>
  <h1 class="header-title">
    <?= htmlspecialchars($category['category_name']) ?>
  </h1>
</header>

<main class="category-list">

<?php while ($item = mysqli_fetch_assoc($items)): ?>
  <a
    href="item.php?id=<?= $item['id'] ?>"
    class="menu-item"
  >
    <img
      src="app-images/menu-item-images/<?= $category_slug ?>/<?= htmlspecialchars($item['menu_item_image_filename']) ?>"
      alt="<?= htmlspecialchars($item['item_name']) ?>"
    >

    <div class="menu-item-info">
      <h4><?= htmlspecialchars($item['item_name']) ?></h4>
      <span class="price">$<?= number_format($item['base_price'], 2) ?></span>
    </div>

    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M9 18L15 12L9 6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
    </svg>
  </a>

  <div class="divider">
    <img src="app-images/misc/star.svg" alt="" class="divider-star-img">
  </div>
<?php endwhile; ?>

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
</body>
</html>
