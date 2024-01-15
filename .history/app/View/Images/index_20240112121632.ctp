<h2>Uploaded Images</h2>

<?php if ($images): ?>
    <table>
    <tr>

<th>file name </th>
<th>Description </th>
</tr>

        <?php foreach ($images as $image): ?>
            
                <strong>Filename:</strong> <?php echo h($image['Image']['filename']); ?><br>
                <strong>Description:</strong> <?php echo h($image['Image']['description']); ?>
           
        <?php endforeach; ?>
        </table>
<?php else: ?>
    <p>No images uploaded yet.</p>
<?php endif; ?>

<hr>