<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>

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