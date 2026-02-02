<?php
    $category_data = mysqli_query($connection, "SELECT * FROM idm216_menu_categories");
    $category = mysqli_fetch_all($category_data, MYSQLI_ASSOC);
?>

<article class="content">
    <table>
        <thead>
            <tr><th id="menu-categories-heading" colspan="8" class="table-heading">Menu Categories</th></tr>
            <tr class="table-column-headings">
                <th id="id">ID</th>
                <th id="category-name">Category Name</th>
                <th id="image-file">Image File</th>
                <th id="category-order">Category Order</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($category as $row): ?>
                <tr>
                    <td data-label="ID"><?php echo htmlspecialchars($row['id']); ?></td>
                    <td data-label="Category Name"><?php echo htmlspecialchars($row['category_name']); ?></td>
                    <td data-label="Image File"><?php echo htmlspecialchars($row['category_image_filename']); ?></td>
                    <td data-label="Category Order"><?php echo htmlspecialchars($row['category_order']); ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</article>
