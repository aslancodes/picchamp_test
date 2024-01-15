<h2>Uploaded Images</h2>

<?php if ($images): ?>
    <table>
    <tr>

<th>file name </th>
<th>Description </th>
</tr>

        <?php foreach ($images as $image): ?>
            <tr>
                <td> <strong>Filename:</strong> <?php echo h($image['Image']['filename']); ?></td>
                <td></td>
            </tr>
               <br>
                <strong>Description:</strong> <?php echo h($image['Image']['description']); ?>
           
        <?php endforeach; ?>
        </table>
<?php else: ?>
    <p>No images uploaded yet.</p>
<?php endif; ?>

<hr>