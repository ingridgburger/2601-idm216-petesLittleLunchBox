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

$bagel_list    = str_replace(', ', ',', $item['bagel_options'] ?? '');
$bread_list    = str_replace(', ', ',', $item['bread_options'] ?? '');
$cheese_list   = str_replace(', ', ',', $item['cheese_options'] ?? '');
$topping_list  = str_replace(', ', ',', $item['topping_options'] ?? '');
$dressing_list = str_replace(', ', ',', $item['dressing_options'] ?? '');
$size_list     = str_replace(', ', ',', $item['size_options'] ?? '');

$show_bagel = $show_bread = $show_cheese = $show_toppings = $show_dressing = $show_size = false;

if ($bagel_list !== '') {
  $bagels = mysqli_query(
    $connection,
    "SELECT *
     FROM idm216_bagel_options
     WHERE FIND_IN_SET(
       bagel_type,
       '" . mysqli_real_escape_string($connection, $bagel_list) . "'
     )"
  );
  $show_bagel = $bagels && mysqli_num_rows($bagels) > 0;
}

if ($bread_list !== '') {
  $breads = mysqli_query(
    $connection,
    "SELECT *
     FROM idm216_bread_options
     WHERE FIND_IN_SET(
       bread_type,
       '" . mysqli_real_escape_string($connection, $bread_list) . "'
     )"
  );
  $show_bread = $breads && mysqli_num_rows($breads) > 0;
}


if ($cheese_list !== '') {
  $cheeses = mysqli_query(
    $connection,
    "SELECT *
     FROM idm216_cheese_options
     WHERE FIND_IN_SET(
       cheese_type,
       '" . mysqli_real_escape_string($connection, $cheese_list) . "'
     )"
  );
  $show_cheese = $cheeses && mysqli_num_rows($cheeses) > 0;
}


if ($topping_list !== '') {
  $toppings = mysqli_query(
    $connection,
    "SELECT *
     FROM idm216_topping_options
     WHERE FIND_IN_SET(
       topping_type,
       '" . mysqli_real_escape_string($connection, $topping_list) . "'
     )"
  );
  $show_toppings = $toppings && mysqli_num_rows($toppings) > 0;
}


if ($dressing_list !== '') {
  $dressings = mysqli_query(
    $connection,
    "SELECT *
     FROM idm216_dressing_options
     WHERE FIND_IN_SET(
       dressing_name,
       '" . mysqli_real_escape_string($connection, $dressing_list) . "'
     )"
  );
  $show_dressing = $dressings && mysqli_num_rows($dressings) > 0;
}


if ($size_list !== '') {
  $sizes = mysqli_query(
    $connection,
    "SELECT *
     FROM idm216_size_options
     WHERE FIND_IN_SET(
       size_type,
       '" . mysqli_real_escape_string($connection, $size_list) . "'
     )"
  );
  $show_size = $sizes && mysqli_num_rows($sizes) > 0;
}

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


<?php include 'includes/header-w-logo.php'; ?>

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
        <span class="option-name"><?= htmlspecialchars($size['size_type']) ?></span>
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

</main>
</div>

<div class="add-toast hidden" id="addToast">
  <span class="toast-text">Added to Lunchbox</span>
  <a href="lunchbox.php" class="toast-action">View</a>
</div>

<div class="add-bar">
  <div class="qty-selector">
    <button class="qty-btn minus">−</button>
    <span class="qty" id="qtyValue">1</span>
    <button class="qty-btn plus">+</button>
  </div>
  <button id="addBtn" class="add-btn">Add to Lunchbox</button>

</div>

<script src="js/item-page.js"></script>
</body>
</html>