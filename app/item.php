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

$bread_options = mysqli_fetch_all(mysqli_query($connection, "SELECT * FROM idm216_bread_options"), MYSQLI_ASSOC);
$size_options = mysqli_fetch_all(mysqli_query($connection, "SELECT * FROM idm216_size_options"), MYSQLI_ASSOC);
$cheese_options = mysqli_fetch_all(mysqli_query($connection, "SELECT * FROM idm216_cheese_options"), MYSQLI_ASSOC);
$bagel_options = mysqli_fetch_all(mysqli_query($connection, "SELECT * FROM idm216_bagel_options"), MYSQLI_ASSOC);
$topping_options = mysqli_fetch_all(mysqli_query($connection, "SELECT * FROM idm216_topping_options"), MYSQLI_ASSOC);
$dressing_options = mysqli_fetch_all(mysqli_query($connection, "SELECT * FROM idm216_dressing_options"), MYSQLI_ASSOC);

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
       dressing_type,
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

include 'includes/category-folders.php';

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
</section>
<?php include 'includes/divider.php'; ?>

<section class="selector col-2">
  <h4>Quantity</h4>
  <div class="qty-selector">
    <button class="qty-btn minus">−</button>
    <span class="qty" id="qtyValue">1</span>
    <button class="qty-btn plus">+</button>
  </div>
</section>

<?php if ($show_size || $show_bagel || $show_bread || $show_cheese || $show_toppings || $show_dressing): ?>
<?php include 'includes/divider.php'; ?>
<?php endif; ?>

<?php if ($show_size): ?>
<section class="selector">
  <h4>Size</h4>
  <?php while ($size = mysqli_fetch_assoc($sizes)): ?>
    <label class="option">
      <input type="radio" name="size" value="<?= htmlspecialchars($size['size_type']) ?>" data-extra-charge="<?= htmlspecialchars($size['extra_charge'] ?? 0) ?>" data-calories="<?= htmlspecialchars($size['calories']) ?>">
      <div class="option-info">
        <span class="option-name"><?= htmlspecialchars($size['size_type']) ?>
        <?php if ($size['extra_charge'] > 0): ?>
          (+$<?= number_format($size['extra_charge'], 2) ?>)
        <?php endif; ?>
        </span>
        <span class="option-meta"><?= $size['calories'] ?> cal</span>
      </div>
      <span class="checkmark"></span>
    </label>
  <?php endwhile; ?>
</section>
<?php if ($show_bagel || $show_bread || $show_cheese || $show_toppings || $show_dressing): ?>
<?php include 'includes/divider.php'; ?>
<?php endif; ?>
<?php endif; ?>


<?php if ($show_bagel): ?>
<section class="selector">
  <h4>Bagel</h4>
  <?php while ($bagel = mysqli_fetch_assoc($bagels)): ?>
    <label class="option">
      <input type="radio" name="bagel" value="<?= htmlspecialchars($bagel['bagel_type']) ?>" data-extra-charge="<?= htmlspecialchars($bagel['extra_charge'] ?? 0) ?>" data-calories="<?= htmlspecialchars($bagel['calories']) ?>">
      <img src="app-images/bagel-options/<?= $bagel['bagel_type_image_filename'] ?>">
      <div class="option-info">
        <span class="option-name"><?= htmlspecialchars($bagel['bagel_type']) ?>
        <?php if ($bagel['extra_charge'] > 0): ?>
          (+$<?= number_format($bagel['extra_charge'], 2) ?>)
        <?php endif; ?>
        </span>
        <span class="option-meta"><?= $bagel['calories'] ?> cal</span>
      </div>
      <span class="checkmark"></span>
    </label>
  <?php endwhile; ?>
</section>
<?php if ($show_bread || $show_cheese || $show_toppings || $show_dressing): ?>
<?php include 'includes/divider.php'; ?>
<?php endif; ?>
<?php endif; ?>


<?php if ($show_bread): ?>
<section class="selector">
  <h4>Bread</h4>
  <?php while ($bread = mysqli_fetch_assoc($breads)): ?>
    <label class="option">
      <input type="radio" name="bread" value="<?= htmlspecialchars($bread['bread_type']) ?>" data-extra-charge="<?= htmlspecialchars($bread['extra_charge'] ?? 0) ?>" data-calories="<?= htmlspecialchars($bread['calories']) ?>">
      <img src="app-images/bread-options/<?= $bread['bread_type_image_filename'] ?>">
      <div class="option-info">
        <span class="option-name"><?= htmlspecialchars($bread['bread_type']) ?>
        <?php if ($bread['extra_charge'] > 0): ?>
          (+$<?= number_format($bread['extra_charge'], 2) ?>)
        <?php endif; ?>
        </span>
        <span class="option-meta"><?= $bread['calories'] ?> cal</span>
      </div>
      <span class="checkmark"></span>
    </label>
  <?php endwhile; ?>
</section>
<?php if ($show_cheese || $show_toppings || $show_dressing): ?>
<?php include 'includes/divider.php'; ?>
<?php endif; ?>
<?php endif; ?>


<?php if ($show_cheese): ?>
<section class="selector">
  <h4>Cheese</h4>
  <?php while ($cheese = mysqli_fetch_assoc($cheeses)): ?>
    <label class="option">
      <input type="radio" name="cheese" value="<?= htmlspecialchars($cheese['cheese_type']) ?>" data-extra-charge="<?= htmlspecialchars($cheese['extra_charge'] ?? 0) ?>" data-calories="<?= htmlspecialchars($cheese['calories']) ?>">
      <img src="app-images/cheese-options/<?= $cheese['cheese_type_image_filename'] ?>">
      <div class="option-info">
        <span class="option-name"><?= htmlspecialchars($cheese['cheese_type']) ?>
        <?php if ($cheese['extra_charge'] > 0): ?>
          (+$<?= number_format($cheese['extra_charge'], 2) ?>)
        <?php endif; ?>
        </span>
        <span class="option-meta"><?= $cheese['calories'] ?> cal</span>
      </div>
      <span class="checkmark"></span>
    </label>
  <?php endwhile; ?>
</section>
<?php if ($show_toppings || $show_dressing): ?>
<?php include 'includes/divider.php'; ?>
<?php endif; ?>
<?php endif; ?>


<?php if ($show_toppings): ?>
<section class="selector">
  <h4>Toppings</h4>
  <?php while ($topping = mysqli_fetch_assoc($toppings)): ?>
    <label class="option">
      <input type="checkbox" name="toppings[]" value="<?= htmlspecialchars($topping['topping_type']) ?>" data-extra-charge="<?= htmlspecialchars($topping['extra_charge'] ?? 0) ?>" data-calories="<?= htmlspecialchars($topping['calories']) ?>">
      <img src="app-images/topping-options/<?= $topping['topping_type_image_filename'] ?>">
      <div class="option-info">
        <span class="option-name">
          <?= htmlspecialchars($topping['topping_type']) ?>
          <?php if ($topping['extra_charge'] > 0): ?>
            (+$<?= number_format($topping['extra_charge'], 2) ?>)
          <?php endif; ?>
        </span>
        <span class="option-meta"><?= $topping['calories'] ?> cal</span>
      </div>
      <span class="checkmark"></span>
    </label>
  <?php endwhile; ?>
</section>
<?php if ($show_dressing): ?>
<?php include 'includes/divider.php'; ?>
<?php endif; ?>
<?php endif; ?>


<?php if ($show_dressing): ?>
<section class="selector">
  <h4>Dressing</h4>
  <?php while ($dressing = mysqli_fetch_assoc($dressings)): ?>
    <label class="option">
      <input type="radio" name="dressing" value="<?= htmlspecialchars($dressing['dressing_type']) ?>" data-extra-charge="<?= htmlspecialchars($dressing['extra_charge'] ?? 0) ?>" data-calories="<?= htmlspecialchars($dressing['calories']) ?>">
      <img src="app-images/dressing-options/<?= $dressing['dressing_type_image_filename'] ?>">
      <div class="option-info">
        <span class="option-name"><?= htmlspecialchars($dressing['dressing_type']) ?>
        <?php if ($dressing['extra_charge'] > 0): ?>
          (+$<?= number_format($dressing['extra_charge'], 2) ?>)
        <?php endif; ?>
        </span>
        <span class="option-meta"><?= $dressing['calories'] ?> cal</span>
      </div>
      <span class="checkmark"></span>
    </label>
  <?php endwhile; ?>
</section>
<?php endif; ?>

</main>
<div class="add-toast hidden" id="addToast">
  <span class="toast-text">Added to Lunchbox</span>
  <a href="lunchbox.php" class="toast-action">View</a>
</div>

<div class="add-bar">
  <button id="addBtn" class="add-btn" data-item-id="<?= $item['id'] ?>" data-item-name="<?= htmlspecialchars($item['item_name']) ?>" data-base-price="<?= $item['base_price'] ?>">
    Add to Lunchbox
    <span>$<?= number_format($item['base_price'], 2) ?></span>
  </button>
</div>
</div>

<script>
window.itemData = {
  id: <?= $item['id'] ?>,
  name: <?= json_encode($item['item_name']) ?>,
  basePrice: <?= $item['base_price'] ?>,
  categoryId: <?= $item['category_id'] ?>,
  imageFilename: <?= json_encode($item['menu_item_image_filename']) ?>,
  bagelOptions: <?= json_encode($item['bagel_options']) ?>,
  breadOptions: <?= json_encode($item['bread_options']) ?>,
  cheeseOptions: <?= json_encode($item['cheese_options']) ?>,
  toppingOptions: <?= json_encode($item['topping_options']) ?>,
  dressingOptions: <?= json_encode($item['dressing_options']) ?>,
  sizeOptions: <?= json_encode($item['size_options']) ?>
};

window.optionData = {
  bread: <?= json_encode($bread_options) ?>,
  size: <?= json_encode($size_options) ?>,
  cheese: <?= json_encode($cheese_options) ?>,
  bagel: <?= json_encode($bagel_options) ?>,
  topping: <?= json_encode($topping_options) ?>,
  dressing: <?= json_encode($dressing_options) ?>
};
</script>
<script src="js/lunchbox.js"></script>
<script src="js/item-page.js"></script>
</body>
</html>