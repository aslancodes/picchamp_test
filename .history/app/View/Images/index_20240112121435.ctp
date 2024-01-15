<h2>Uploaded Images</h2>

<?php if ($images): ?>
    <ul>
        <?php foreach ($images as $image): ?>
            <li>
                <strong>Filename:</strong> <?php echo h($image['Image']['fiel']); ?><br>
                <strong>Description:</strong> <?php echo h($image['Image']['description']); ?>
            </li>
        <?php endforeach; ?>
    </ul>
<?php else: ?>
    <p>No images uploaded yet.</p>
<?php endif; ?>

<hr>