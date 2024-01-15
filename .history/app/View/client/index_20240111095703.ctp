

<h1>Client Information</h1>

<table>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <!-- Add more columns as needed -->
    </tr>

    <?php foreach ($client as $client): ?>
        <tr>
            <td><?= $client->id ?></td>
            <td><?= $client->name ?></td>
            <td><?= $client->email ?></td>
            <!-- Add more columns as needed -->
        </tr>
    <?php endforeach; ?>
</table>