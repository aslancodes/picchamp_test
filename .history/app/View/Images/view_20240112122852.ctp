<h2>View Image</h2>

<?php
if (isset($image['Image']['filename'])) {
    $base64Data = base64_encode($image['Image']['filename']);
    echo '<img src="data:image/png;base64,' . $base64Data . '" alt="Image">';
} else {
    echo 'No image found.';
}
?>