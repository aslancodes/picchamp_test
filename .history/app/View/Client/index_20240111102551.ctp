
<h1>Client Information</h1>

<table>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>bt client id</th>
        <th>brand</th>
        <!-- Add more columns as needed -->
    </tr>

    <?php foreach ($clients as $client): ?>
        <tr>
            <td><?php echo $client['Client']['id']; ?></td>
            <td><?php echo $client['Client']['name']; ?></td>
            <td><?php echo $client['Client']['bt_client_id']; ?></td>
            <td><?php echo $client['Client']['brand']; ?></td>

            <!-- Add more columns as needed -->
        </tr>
    <?php endforeach; ?>
    <?php unset($client); ?>
</table>


