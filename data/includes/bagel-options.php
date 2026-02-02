<?php
    $bagel_data = mysqli_query($connection, "SELECT * FROM idm216_bagel_options");
    $bagel = mysqli_fetch_all($bagel_data, MYSQLI_ASSOC);
?>

<article class="content">
    <table>
        <thead>
            <tr><th id="bagel-heading" colspan="8" class="table-heading">Bagel Options</th></tr>
            <tr class="table-column-headings">
                <th id="id">ID</th>
                <th id="bagel-type">Bagel Type</th>
                <th id="extra-charge">Extra Charge</th>
                <th id="calories">Calories</th>
                <th id="image-file">Image File</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($bagel as $row): ?>
                <tr>
                    <td data-label="ID"><?php echo htmlspecialchars($row['id']); ?></td>
                    <td data-label="Bagel Type"><?php echo htmlspecialchars($row['bagel_type']); ?></td>
                    <td data-label="Extra Charge"><?php echo htmlspecialchars($row['extra_charge']); ?></td>
                    <td data-label="Calories"><?php echo htmlspecialchars($row['calories']); ?></td>
                    <td data-label="Image File"><?php echo htmlspecialchars($row['bagel_type_image_filename']); ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</article>
