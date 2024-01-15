<!-- app/View/Images/search.ctp -->

<h2>Search Images</h2>

<?php
echo $this->Form->create('Image', array('action' => 'search'));
echo $this->Form->input('keyword', array('label' => 'Search by Description'));
echo $this->Form->submit('Search');
echo $this->Form->end();
?>

<?php if ($keyword): ?>
    <h3>Search Results for "<?php echo h($keyword); ?>"</h3>
<?php endif; ?>

<?php if ($images): ?>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Filename</th>
                <th>Description</th>
                <th>Created At</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($images as $image): ?>
                <tr>
                    <td><?php echo $image['Image']['id']; ?></td>
                    <td><?php echo $image['Image']['filename']; ?></td>
                    <td><?php echo $image['Image']['description']; ?></td>
                    <td><?php echo $image['Image']['created_at']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php else: ?>
    <p>No images found.</p>
<?php endif; ?>
