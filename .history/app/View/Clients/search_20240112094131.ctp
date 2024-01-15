<?php echo $this->Html->script('https://code.jquery.com/jquery-3.6.4.min.js'); ?>
<?php echo $this->Html->scriptBlock('
    jQuery(document).ready(function() {
        jQuery("#ClientSearchForm").submit(function(event) {
            event.preventDefault(); // Prevent the form from submitting normally
            
            var searchValue = jQuery("#ClientSearch").val();
            window.location.href = "' . $this->Html->url(array('action' => 'search')) . '/?search=" + encodeURIComponent(searchValue);
        });
    });
'); ?>


<?php echo $this->Form->create('Client', array('id' => 'ClientSearchForm', 'url' => array('action' => 'search'))); ?>
    <?php echo $this->Form->input('search', array('id' => 'ClientSearch', 'label' => 'Search')); ?>
<?php echo $this->Form->end(__('')); ?>
    
<?php if (!empty($clients)): ?>
    <h2>Search Results</h2>
    <ul>
        <?php foreach ($clients as $client): ?>

            <table>
            <li><?php echo $client['Client']['name']; ?></li>
            <li><?php echo $client['Client']['name']; ?></li>
            <table/>
        <?php endforeach; ?>
    </ul>
<?php elseif ($searchTerm): ?>
    <p>No matching clients found.</p>
<?php endif; ?>