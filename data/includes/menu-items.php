<?php
    $menu_data = mysqli_query($connection, "SELECT * FROM idm216_menu_items");
    $menu_item = mysqli_fetch_all($menu_data, MYSQLI_ASSOC);
?>

<article class="content">
    <table>
        <thead>
            <tr><th id="menu-items-heading" colspan="14" class="table-heading">Menu Items</th></tr>
            <tr class="table-column-headings">
                <th id="id">ID</th>
                <th id="category-id">Category ID</th>
                <th id="name">Name</th>
                <th id="description">Description</th>
                <th id="base-price">Base Price</th>
                <th id="calories">Calories</th>
                <th id="image-file">Image File</th>
                <th id="bagel-options">Bagel</th>
                <th id="bread-options">Bread</th>
                <th id="cheese-options">Cheese</th>
                <th id="topping-options">Topping</th>
                <th id="dressing-options">Dressing</th>
                <th id="size-options">Size</th>
                <th id="filter-by">Filter By</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($menu_item as $row): ?>
                <tr>
                    <td data-label="ID"><?php echo htmlspecialchars($row['id']); ?></td>
                    <td data-label="Category ID"><?php echo htmlspecialchars($row['category_id']); ?></td>
                    <td data-label="Name"><?php echo htmlspecialchars($row['item_name']); ?></td>
                    <td data-label="Description"><?php echo htmlspecialchars($row['description']); ?></td>
                    <td data-label="Base Price"><?php echo htmlspecialchars($row['base_price']); ?></td>
                    <td data-label="Calories"><?php echo htmlspecialchars($row['calories']); ?></td>
                    <td data-label="Image File"><?php echo htmlspecialchars($row['menu_item_image_filename']); ?></td>
                    <td data-label="Bagel"><?php if ($row['bagel_options'] === "") { echo 'N/A'; } else { echo htmlspecialchars($row['bagel_options']); } ?></td>
                    <td data-label="Bread"><?php if ($row['bread_options'] === "") { echo 'N/A'; } else { echo htmlspecialchars($row['bread_options']); } ?></td>
                    <td data-label="Cheese"><?php if ($row['cheese_options'] === "") { echo 'N/A'; } else { echo htmlspecialchars($row['cheese_options']); } ?></td>
                    <td data-label="Topping"><?php if ($row['topping_options'] === "") { echo 'N/A'; } else { echo htmlspecialchars($row['topping_options']); } ?></td>
                    <td data-label="Dressing"><?php if ($row['dressing_options'] === "") { echo 'N/A'; } else { echo htmlspecialchars($row['dressing_options']); } ?></td>
                    <td data-label="Size"><?php if ($row['size_options'] === "") { echo 'N/A'; } else { echo htmlspecialchars($row['size_options']); } ?></td>
                    <td data-label="Filter By"><?php echo htmlspecialchars($row['filter_by']); ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</article>
