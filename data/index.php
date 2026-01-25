<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pete's Little Lunch Box | Data</title>
    <link rel="stylesheet" href="stylesheet.css">
    <link rel="icon" type="image/svg+xml" href="../team/images/flare-logo-dark.svg">
</head>
<body>

    <?php require_once 'includes/db.php'; ?>

    <?php 
    $menu_data = mysqli_query($connection, "SELECT * FROM idm216_menu_items");
    $menu_item = mysqli_fetch_all($menu_data, MYSQLI_ASSOC);
     ?>

    <?php require_once 'includes/header.php';?>

    <main>
        <table>
            <thead>
                <tr><th colspan="8" class="table-heading">MENU ITEMS</th></tr>
                <tr class="table-column-headings">
                    <th>ID</th>
                    <th>Category ID</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Base Price</th>
                    <th>Calories</th>
                    <th>Image URL</th>
                    <th>Is Active</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($menu_item as $row): ?>
                <tr>
                    <td data-label="ID"><?php echo htmlspecialchars($row['id']); ?></td>
                    <td data-label="Category ID"><?php echo htmlspecialchars($row['category_id']); ?></td>
                    <td class="col-name" data-label="Name"><?php echo htmlspecialchars($row['item_name']); ?></td>
                    <td class="col-description" data-label="Description"><?php echo htmlspecialchars($row['description']); ?></td>
                    <td data-label="Base Price"><?php echo htmlspecialchars($row['base_price']); ?></td>
                    <td data-label="Calories"><?php echo htmlspecialchars($row['calories']); ?></td>
                    <td class="col-image-url" data-label="Image URL"><?php echo htmlspecialchars($row['menu_item_image_filename']); ?></td>
                    <td data-label="Is Active"><?php echo htmlspecialchars($row['is_active']); ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </main>
    <a href="#top" class="back-to-top-btn">BACK TO TOP?</a>
    
    <footer>
        <div class='footer-logo'>
            <img class='logo-image' src='../team/images/flare-logo-light.svg' alt='Flare Logo'>
        </div>
    </footer>

    <?php require_once 'includes/close-db.php'; ?>
</body>
</html>
