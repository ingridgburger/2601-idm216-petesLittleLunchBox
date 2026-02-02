<?php
    $bread_data = mysqli_query($connection, "SELECT * FROM idm216_bread_options");
    $bread = mysqli_fetch_all($bread_data, MYSQLI_ASSOC);
?>

<article class="content">
    <table>
        <thead>
            <tr><th id="bread-heading" colspan="8" class="table-heading">Bread Options</th></tr>
            <tr class="table-column-headings">
                <th id="id">ID</th>
                <th id="bread-type">Bread Type</th>
                <th id="extra-charge">Extra Charge</th>
                <th id="calories">Calories</th>
                <th id="image-file">Image File</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($bread as $row): ?>
                <tr>
                    <td data-label="ID"><?php echo htmlspecialchars($row['id']); ?></td>
                    <td data-label="Bread Type"><?php echo htmlspecialchars($row['bread_type']); ?></td>
                    <td data-label="Extra Charge"><?php echo htmlspecialchars($row['extra_charge']); ?></td>
                    <td data-label="Calories"><?php echo htmlspecialchars($row['calories']); ?></td>
                    <td data-label="Image File"><?php echo htmlspecialchars($row['bread_type_image_filename']); ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</article>
