<?php
    $size_data = mysqli_query($connection, "SELECT * FROM idm216_size_options");
    $size = mysqli_fetch_all($size_data, MYSQLI_ASSOC);
?>

<article class="content">
    <table>
        <thead>
            <tr><th id="size-heading" colspan="8" class="table-heading">Size Options</th></tr>
            <tr class="table-column-headings">
                <th id="id">ID</th>
                <th id="size-type">Size Type</th>
                <th id="extra-charge">Extra Charge</th>
                <th id="calories">Calories</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($size as $row): ?>
                <tr>
                    <td data-label="ID"><?php echo htmlspecialchars($row['id']); ?></td>
                    <td data-label="Size Type"><?php echo htmlspecialchars($row['size_type']); ?></td>
                    <td data-label="Extra Charge"><?php echo htmlspecialchars($row['extra_charge']); ?></td>
                    <td data-label="Calories"><?php echo htmlspecialchars($row['calories']); ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</article>
