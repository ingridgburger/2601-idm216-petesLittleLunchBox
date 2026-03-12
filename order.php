<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pete's Little Lunch Box | Main Menu Ordering</title>
    <link rel="icon" type="image/svg+xml" href="./images/flare-logos/favicon.png">
    <link rel="stylesheet" href="css/main-menu.css">
    <link rel="stylesheet" href="css/stylesheet.css">
    <link rel="stylesheet" href="data/stylesheet.css">
    <link rel="stylesheet" href="css/order.css">
</head>

<body>
    <?php
    require_once 'data/includes/db.php';
    
    $menu_data = mysqli_query($connection, "SELECT * FROM idm216_menu_items");
    $menu_item = mysqli_fetch_all($menu_data, MYSQLI_ASSOC);
    
    $bread_options = mysqli_fetch_all(mysqli_query($connection, "SELECT * FROM idm216_bread_options"), MYSQLI_ASSOC);
    $size_options = mysqli_fetch_all(mysqli_query($connection, "SELECT * FROM idm216_size_options"), MYSQLI_ASSOC);
    $cheese_options = mysqli_fetch_all(mysqli_query($connection, "SELECT * FROM idm216_cheese_options"), MYSQLI_ASSOC);
    $bagel_options = mysqli_fetch_all(mysqli_query($connection, "SELECT * FROM idm216_bagel_options"), MYSQLI_ASSOC);
    $topping_options = mysqli_fetch_all(mysqli_query($connection, "SELECT * FROM idm216_topping_options"), MYSQLI_ASSOC);
    $dressing_options = mysqli_fetch_all(mysqli_query($connection, "SELECT * FROM idm216_dressing_options"), MYSQLI_ASSOC);
    ?>
<header class="site-header">
    <div class="header-content">
        <a href="#top">
            <img src="images/flare-logos/flare-logo-dark.svg" alt="Flare Logo" class="nav-logo">
        </a>
        <div class="button-wrapper">
            <button class="reset-btn" type="button">Reset</button>
            <button id="order-btn">Order (<span id="order-count">0</span>)</button>
                </div>
        </div>
</header>

<div id="order-modal">
    <div class="order-modal-content">
        <button id="close-order-modal">&times;</button>
        <h2>Order Summary</h2>
        <div id="order-summary-content"></div>
    </div>
</div>


<main>
     <section class="hero">
            <img src="./images/petes-logos/petes-logo.svg" alt="Pete's Little Lunch Box Logo" class="petes-logo">
            <h1 class="page-title">Main Menu Ordering</h1>
        </section>
    <article class="content" id="top">
        <table>
            <thead>
                <tr><th id="menu-items-heading" colspan="14" class="table-heading">Menu Items</th></tr>
                <tr class="table-column-headings">
                    <th id="id">ID</th>
                    <th id="name">Name</th>
                    <th id="description">Description</th>
                    <th id="base-price">Base Price</th>
                        <th id="image-file">Image</th>
                        <th id="actions">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($menu_item as $row): ?>
                    <tr>
                        <td data-label="ID"><?php echo htmlspecialchars($row['id']); ?></td>
                        <td data-label="Name"><?php echo htmlspecialchars($row['item_name']); ?></td>
                        <td data-label="Description"><?php echo htmlspecialchars($row['description']); ?></td>
                        <td data-label="Base Price"><?php echo htmlspecialchars($row['base_price']); ?></td>
                        <?php
                            $category_map = [
                                1 => 'breakfast_sandwiches',
                                2 => 'breakfast_platters',
                                3 => 'pastries_and_sides',
                                4 => 'drinks',
                                5 => 'fresh_salads',
                                6 => 'lunch_sandwiches',
                                7 => 'hoagies',
                                8 => 'burgers_and_hot_sandwiches',
                                9 => 'club_sandwiches',
                                10 => 'cheesesteaks',
                                11 => 'gyros'
                            ];
                            $image_path = isset($category_map[$row['category_id']]) ? $category_map[$row['category_id']] : 'unknown_category';
                        ?>
                                <td data-label="Image File"><img src="images/menu_item_images/<?= htmlspecialchars($image_path . '/' . $row['menu_item_image_filename']); ?>" alt="<?php echo htmlspecialchars($row['item_name']); ?>" class="item-image"></td>
                            <td data-label="Actions">
                                <div class="menu-checkbox-cell">
                                <input class="menu-item-checkbox" type="checkbox" name="select_item" value="<?php echo htmlspecialchars($row['id']); ?>" 
                                       data-item-name="<?php echo htmlspecialchars($row['item_name']); ?>"
                                       data-base-price="<?php echo htmlspecialchars($row['base_price']); ?>"
                                       data-bagel-options="<?php echo htmlspecialchars($row['bagel_options']); ?>"
                                       data-bread-options="<?php echo htmlspecialchars($row['bread_options']); ?>"
                                       data-cheese-options="<?php echo htmlspecialchars($row['cheese_options']); ?>"
                                       data-topping-options="<?php echo htmlspecialchars($row['topping_options']); ?>"
                                       data-dressing-options="<?php echo htmlspecialchars($row['dressing_options']); ?>"
                                       data-size-options="<?php echo htmlspecialchars($row['size_options']); ?>">
                                </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </article>
</main>

<div id="customization-modal">
    <div class="customization-modal-content">
        <button id="close-modal">&times;</button>
        <h2>Customize</h2>
        <form id="customization-form">
            <div id="options-container"></div>
            <div class="customization-buttons">
                <button type="button" id="cancel-btn">Cancel</button>
                <button type="button" id="add-to-order-btn">Add to Order</button>
            </div>
        </form>
    </div>
</div>

<footer class="site-footer">
        <img src="images/flare-logos/flare-logo-light.svg" alt="Flare Logo">
</footer>

<script>
window.optionData = {
    bread: <?php echo json_encode($bread_options); ?>,
    size: <?php echo json_encode($size_options); ?>,
    cheese: <?php echo json_encode($cheese_options); ?>,
    bagel: <?php echo json_encode($bagel_options); ?>,
    topping: <?php echo json_encode($topping_options); ?>,
    dressing: <?php echo json_encode($dressing_options); ?>
};
</script>
<script src="./data/script/table-pagination.js"></script>
<script src="./js/main-menu.js"></script>
<script src="./js/order.js"></script>

</body>
</html>