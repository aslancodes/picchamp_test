<?php echo $this->Form->create('Client', array('url' => array('action' => 'search'))); ?>
    <?php echo $this->Form->input('search', array('label' => 'Search')); ?>
    <?php echo $this->Form->end(__('Search')); ?>
    
    <?php if (!empty($clients)): ?>
        <h2>Search Results</h2>
        <ul>
            <?php foreach ($clients as $client): ?>
                <li><?php echo $client['Client']['name']; ?></li>
            <?php endforeach; ?>
        </ul>
    <?php elseif ($searchTerm): ?>
        <p>No matching clients found.</p>
    <?php endif; ?>