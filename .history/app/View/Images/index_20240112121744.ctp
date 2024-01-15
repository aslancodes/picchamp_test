<h2>Uploaded Images</h2>

<?php if ($images): ?>
    <table>
    <tr>

<th>file name </th>
<th>Description </th>
</tr>

        <?php foreach ($images as $image): ?>
            <tr>
                <td>  <?php echo h($image['Image']['filename']); ?></td>
                <td>   <?php echo h($image['Image']['description']); ?> </td>
            </tr>
               
        <?php endforeach; ?>
        </table>
<?php else: ?>
    <p>No images uploaded yet.</p>
<?php endif; ?>

<hr>