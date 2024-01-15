<!-- app/View/Images/index.ctp -->

<h2>All Images</h2>

<?php if ($images): ?>
    <ul>
        <?php foreach ($images as $image): ?>
            <li>
                <?php
                if (isset($image['Image']['filename'])) {
                    $base64Data = base64_encode($image['Image']['filename']);
                    echo '<img src="data:image/png;base64,' . $base64Data . '" alt="Image">';
                } else {
                    echo 'No image found.';
                }
                ?>
            </li>
        <?php endforeach; ?>
    </ul>
<?php else: ?>
    <p>No images found.</p>
<?php endif; ?>
