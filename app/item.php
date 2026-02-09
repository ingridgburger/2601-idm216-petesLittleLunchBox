<?php
require_once '../data/includes/db.php';

if (!isset($_GET['id'])) {
  die('Missing item ID');
}

$item_id = (int) $_GET['id'];

$item_sql = "SELECT * FROM idm216_menu_items WHERE id = $item_id LIMIT 1";
$item_result = mysqli_query($connection, $item_sql);
$item = mysqli_fetch_assoc($item_result);

if (!$item) {
  die('Item not found');
}

$category_id = (int) $item['category_id'];

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

$category_folder = $category_folders[$category_id] ?? 'misc';

$item_image = "app-images/menu-item-images/$category_folder/" .
              htmlspecialchars($item['menu_item_image_filename']);

$show_bagel    = in_array($category_id, [1]);
$show_bread    = in_array($category_id, [6,7,8,9,10,11]);
$show_cheese   = in_array($category_id, [1,6,7,8,9,10,11]);
$show_dressing = in_array($category_id, [5]);
$show_toppings = in_array($category_id, [1,5,6,7,8,9,10,11]);
$show_size     = in_array($category_id, [4,5]);

if ($show_bagel) {
  $bagels = mysqli_query($connection, "SELECT * FROM idm216_bagel_options");
}
if ($show_bread) {
  $breads = mysqli_query($connection, "SELECT * FROM idm216_bread_options");
}
if ($show_cheese) {
  $cheeses = mysqli_query($connection, "SELECT * FROM idm216_cheese_options");
}
if ($show_dressing) {
  $dressings = mysqli_query($connection, "SELECT * FROM idm216_dressing_options");
}
if ($show_toppings) {
  $toppings = mysqli_query($connection, "SELECT * FROM idm216_topping_options");
}
if ($show_size) {
  $sizes = mysqli_query($connection, "SELECT * FROM idm216_size_options");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title><?= htmlspecialchars($item['item_name']) ?></title>

  <link rel="stylesheet" href="css/stylesheet.css">
  <link rel="stylesheet" href="css/components.css">
  <link rel="stylesheet" href="css/item.css">
</head>

<body>
<div class="app-shell">


<header class="app-header header--white header--compact has-back has-cart">
  <button class="icon-btn back-btn" onclick="history.back()" aria-label="Go back">←</button>
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

<main class="container">


<section class="item-header">
  <img src="<?= $item_image ?>" alt="<?= htmlspecialchars($item['item_name']) ?>">

  <h2 class="item-name"><?= htmlspecialchars($item['item_name']) ?></h2>
  <p><?= htmlspecialchars($item['description']) ?></p>

  <p>
    <strong>$<?= number_format($item['base_price'], 2) ?></strong>
    · <?= (int) $item['calories'] ?> cal
  </p>

  <div class="divider">
    <img src="app-images/misc/star.svg" alt="" class="divider-star-img">
  </div>
</section>


<?php if ($show_size): ?>
<section class="selector">
  <h4>Size</h4>
  <?php while ($size = mysqli_fetch_assoc($sizes)): ?>
    <label class="option">
      <input type="radio" name="size">
      <div class="option-info">
        <span class="option-name"><?= htmlspecialchars($size['size_name']) ?></span>
        <span class="option-meta"><?= $size['calories'] ?> cal</span>
      </div>
      <span class="checkmark"></span>
    </label>
  <?php endwhile; ?>
</section>
<?php endif; ?>


<?php if ($show_bagel): ?>
<section class="selector">
  <h4>Bagel</h4>
  <?php while ($bagel = mysqli_fetch_assoc($bagels)): ?>
    <label class="option">
      <input type="radio" name="bagel">
      <img src="app-images/bagel-options/<?= $bagel['bagel_type_image_filename'] ?>">
      <div class="option-info">
        <span class="option-name"><?= htmlspecialchars($bagel['bagel_type']) ?></span>
        <span class="option-meta"><?= $bagel['calories'] ?> cal</span>
      </div>
      <span class="checkmark"></span>
    </label>
  <?php endwhile; ?>
</section>
<?php endif; ?>


<?php if ($show_bread): ?>
<section class="selector">
  <h4>Bread</h4>
  <?php while ($bread = mysqli_fetch_assoc($breads)): ?>
    <label class="option">
      <input type="radio" name="bread">
      <img src="app-images/bread-options/<?= $bread['bread_type_image_filename'] ?>">
      <div class="option-info">
        <span class="option-name"><?= htmlspecialchars($bread['bread_type']) ?></span>
        <span class="option-meta"><?= $bread['calories'] ?> cal</span>
      </div>
      <span class="checkmark"></span>
    </label>
  <?php endwhile; ?>
</section>
<?php endif; ?>


<?php if ($show_cheese): ?>
<section class="selector">
  <h4>Cheese</h4>
  <?php while ($cheese = mysqli_fetch_assoc($cheeses)): ?>
    <label class="option">
      <input type="radio" name="cheese">
      <img src="app-images/cheese-options/<?= $cheese['cheese_type_image_filename'] ?>">
      <div class="option-info">
        <span class="option-name"><?= htmlspecialchars($cheese['cheese_type']) ?></span>
        <span class="option-meta"><?= $cheese['calories'] ?> cal</span>
      </div>
      <span class="checkmark"></span>
    </label>
  <?php endwhile; ?>
</section>
<?php endif; ?>


<?php if ($show_toppings): ?>
<section class="selector">
  <h4>Toppings</h4>
  <?php while ($topping = mysqli_fetch_assoc($toppings)): ?>
    <label class="option">
      <input type="checkbox" name="toppings[]">
      <img src="app-images/topping-options/<?= $topping['topping_type_image_filename'] ?>">
      <div class="option-info">
        <span class="option-name">
          <?= htmlspecialchars($topping['topping_type']) ?>
          <?php if ($topping['extra_charge'] > 0): ?>
            (+<?= number_format($topping['extra_charge'], 2) ?>)
          <?php endif; ?>
        </span>
        <span class="option-meta"><?= $topping['calories'] ?> cal</span>
      </div>
      <span class="checkmark"></span>
    </label>
  <?php endwhile; ?>
</section>
<?php endif; ?>


<?php if ($show_dressing): ?>
<section class="selector">
  <h4>Dressing</h4>
  <?php while ($dressing = mysqli_fetch_assoc($dressings)): ?>
    <label class="option">
      <input type="checkbox" name="dressings[]">
      <img src="app-images/dressing-options/<?= $dressing['dressing_type_image_filename'] ?>">
      <div class="option-info">
        <span class="option-name"><?= htmlspecialchars($dressing['dressing_name']) ?></span>
        <span class="option-meta"><?= $dressing['calories'] ?> cal</span>
      </div>
      <span class="checkmark"></span>
    </label>
  <?php endwhile; ?>
</section>
<?php endif; ?>


<div class="add-bar">
  <div class="qty-selector">
    <button class="qty-btn minus">−</button>
    <span class="qty">1</span>
    <button class="qty-btn plus">+</button>
  </div>
  <button id="addBtn" disabled>Add to Lunchbox</button>
</div>

</main>
</div>

<script src="js/item-page.js"></script>
</body>
</html>
